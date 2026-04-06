<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\LoanRequest;
use App\Traits\NotifyTrait;
use Illuminate\Http\Request;

class LoanRequestController extends Controller
{
    use NotifyTrait;
    public function create()
    {
        $loanTypes = [
            'personal'     => __('Pret Personnel'),
            'school'       => __('Pret Scolaire'),
            'agricultural' => __('Pret Agricole'),
            'realEstate'   => __('Pret Immobilier'),
            'auto'         => __('Pret Auto'),
            'professional' => __('Pret Professionnel'),
            'emergency'    => __('Pret d\'Urgence'),
        ];

        return view('frontend::loan-request.create', compact('loanTypes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'civility'          => ['required', 'in:M.,Mme,Dr.,Me.'],
            'first_name'        => ['required', 'string', 'max:100'],
            'last_name'         => ['required', 'string', 'max:100'],
            'email'             => ['required', 'email', 'max:255'],
            'phone'             => ['required', 'string', 'max:30'],
            'country'           => ['nullable', 'string', 'max:100'],
            'id_number'         => ['required', 'string', 'max:50'],
            'id_doc_recto'      => ['required', 'file', 'mimes:jpg,jpeg,png,pdf', 'max:5120'],
            'id_doc_verso'      => ['required', 'file', 'mimes:jpg,jpeg,png,pdf', 'max:5120'],
            'address_proof'     => ['required', 'file', 'mimes:jpg,jpeg,png,pdf', 'max:5120'],
            'loan_type'         => ['required', 'string'],
            'amount'            => ['required', 'numeric', 'min:100', 'max:9999999999'],
            'currency'          => ['required', 'in:EUR,USD,GBP,CHF,CAD'],
            'duration_months'   => ['required', 'integer', 'min:3', 'max:300'],
            'purpose'           => ['nullable', 'string', 'max:1000'],
            'employment_status' => ['nullable', 'string'],
            'monthly_income'    => ['nullable', 'numeric', 'min:0', 'max:9999999999'],
        ]);

        $loanRequest = LoanRequest::create([
            'reference'         => LoanRequest::generateReference(),
            'civility'          => $request->civility,
            'first_name'        => $request->first_name,
            'last_name'         => $request->last_name,
            'email'             => $request->email,
            'phone'             => $request->phone,
            'country'           => $request->country,
            'id_number'         => $request->id_number,
            'id_doc_recto'      => $request->file('id_doc_recto')->store('loan-docs', 'public'),
            'id_doc_verso'      => $request->file('id_doc_verso')->store('loan-docs', 'public'),
            'address_proof'     => $request->file('address_proof')->store('loan-docs', 'public'),
            'loan_type'         => $request->loan_type,
            'amount'            => $request->amount,
            'currency'          => $request->currency,
            'duration_months'   => $request->duration_months,
            'purpose'           => $request->purpose,
            'employment_status' => $request->employment_status,
            'monthly_income'    => $request->monthly_income,
            'status'            => 'pending',
        ]);

        // Send email to user and admin for loan request
        $shortcodes = [
            '[[full_name]]' => $request->first_name . ' ' . $request->last_name,
            '[[reference]]' => $loanRequest->reference,
            '[[loan_type]]' => $request->loan_type,
            '[[loan_amount]]' => $request->amount . ' ' . $request->currency,
            '[[duration_months]]' => $request->duration_months,
            '[[purpose]]' => $request->purpose,
            '[[email]]' => $request->email,
            '[[phone]]' => $request->phone,
            '[[site_title]]' => setting('site_title', 'global'),
            '[[site_url]]' => route('home'),
        ];
        
        // Email to user — confirmation de réception
        $this->mailNotify($request->email, 'withdraw_request_user', $shortcodes);

        // Email to admin — nouvelle demande
        $this->mailNotify(setting('site_email', 'global'), 'withdraw_request', $shortcodes);

        return redirect()->route('loan-request.confirmation', $loanRequest->reference);
    }

    public function confirmation(string $reference)
    {
        $loanRequest = LoanRequest::where('reference', $reference)->firstOrFail();

        return view('frontend::loan-request.confirmation', compact('loanRequest'));
    }
}
