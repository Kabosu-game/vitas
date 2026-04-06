<?php

namespace App\Http\Controllers\Backend;

use App\Enums\TxnStatus;
use App\Enums\TxnType;
use App\Http\Controllers\Controller;
use App\Models\LoanRequest;
use App\Models\User;
use App\Traits\NotifyTrait;
use Illuminate\Http\Request;
use Txn;

class LoanRequestController extends Controller
{
    use NotifyTrait;
    public function index(Request $request)
    {
        $status  = $request->get('status', 'all');
        $search  = $request->get('search');

        $query = LoanRequest::latest();

        if ($status !== 'all') {
            $query->where('status', $status);
        }

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('first_name', 'like', "%$search%")
                  ->orWhere('last_name',  'like', "%$search%")
                  ->orWhere('email',      'like', "%$search%")
                  ->orWhere('reference',  'like', "%$search%");
            });
        }

        $loanRequests = $query->paginate(15)->withQueryString();
        $counts = [
            'all'       => LoanRequest::count(),
            'pending'   => LoanRequest::where('status', 'pending')->count(),
            'reviewing' => LoanRequest::where('status', 'reviewing')->count(),
            'approved'  => LoanRequest::where('status', 'approved')->count(),
            'rejected'  => LoanRequest::where('status', 'rejected')->count(),
        ];

        return view('backend.loan-request.index', compact('loanRequests', 'status', 'counts', 'search'));
    }

    public function show(LoanRequest $loanRequest)
    {
        $users = User::orderBy('first_name')->get(['id', 'first_name', 'last_name', 'email', 'username']);

        return view('backend.loan-request.show', compact('loanRequest', 'users'));
    }

    public function update(Request $request, LoanRequest $loanRequest)
    {
        $request->validate([
            'status'      => ['required', 'in:pending,reviewing,approved,rejected'],
            'admin_notes' => ['nullable', 'string', 'max:1000'],
        ]);

        $loanRequest->update([
            'status'      => $request->status,
            'admin_notes' => $request->admin_notes,
        ]);

        notify()->success(__('Loan request updated.'), 'Success');

        return redirect()->route('admin.loan-request.show', $loanRequest);
    }

    public function credit(Request $request, LoanRequest $loanRequest)
    {
        $request->validate([
            'user_id'         => ['required', 'exists:users,id'],
            'approved_amount' => ['required', 'numeric', 'min:1'],
        ]);

        $user   = User::findOrFail($request->user_id);
        $amount = (float) $request->approved_amount;

        $loanRequest->update([
            'status'          => 'approved',
            'user_id'         => $user->id,
            'approved_amount' => $amount,
        ]);

        $user->increment('balance', $amount);

        Txn::new(
            $amount, 0, $amount,
            'System',
            'Loan Approved - Ref: '.$loanRequest->reference,
            TxnType::Loan,
            TxnStatus::Success,
            'System', null,
            $user->id, null, 'User'
        );

        // Send email to user when loan request is approved and credited
        $shortcodes = [
            '[[full_name]]'  => $user->full_name,
            '[[reference]]'  => $loanRequest->reference,
            '[[loan_amount]]'=> $amount.' '.setting('site_currency', 'global'),
            '[[site_title]]' => setting('site_title', 'global'),
            '[[site_url]]'   => route('home'),
            '[[message]]'    => 'Votre prêt a été approuvé et le montant crédité sur votre compte.',
        ];
        $this->mailNotify($user->email, 'loan_request_approved', $shortcodes);
        $this->pushNotify('loan_request_approved', $shortcodes, route('user.loan.details', $loanRequest->reference), $user->id);
        $this->smsNotify('loan_request_approved', $shortcodes, $user->phone);

        notify()->success(__('Amount credited to user account successfully.'), 'Success');

        return redirect()->route('admin.loan-request.show', $loanRequest);
    }
}
