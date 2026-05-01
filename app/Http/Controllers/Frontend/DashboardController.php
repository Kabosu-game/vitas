<?php

namespace App\Http\Controllers\Frontend;

use App\Enums\LoanStatus;
use App\Http\Controllers\Controller;
use App\Models\LoanRequest;
use App\Models\Transaction;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard(Request $request)
    {
        $user = auth()->user();

        $transactions = Transaction::where('user_id', $user->id);

        $recentTransactions = $transactions->latest()->take(5)->get();

        $dataCount = [
            'total_transaction' => $transactions->count(),
            'total_deposit' => $user->totalDeposit(),
            'total_profit' => $user->totalProfit(),
            'profit_last_7_days' => $user->totalProfit(7),
            'total_withdraw' => $user->totalWithdraw(),
            'total_transfer' => $user->totalTransfer(),
            'total_running_loan' => LoanRequest::where('user_id', $user->id)->where('status', 'approved')->count(),
            'total_loan' => LoanRequest::where('user_id', $user->id)->count(),
            'deposit_bonus' => $user->totalDepositBonus(),
            'portfolio_achieved' => $user->portfolioAchieved(),
            'total_tickets' => $user->ticket->count(),
            'recentTransactions' => $recentTransactions,
            'user' => $user,
            'total_loan_amount' => LoanRequest::where('user_id', $user->id)->where('status', 'approved')->sum('approved_amount'),
            'approved_loan_requests' => LoanRequest::where('user_id', $user->id)->where('status', 'approved')->latest()->take(3)->get(),
        ];

        return view('frontend::user.dashboard', $dataCount);
    }
}
