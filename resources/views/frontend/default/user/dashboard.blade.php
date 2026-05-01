@extends('frontend::layouts.user')
@section('title') {{ __('Dashboard') }} @endsection

@section('style')
<style>
/* ── Welcome Banner ─────────────────────────────────────── */
.dash-welcome {
    background: linear-gradient(135deg, #0f3460 0%, #16213e 60%, #1a1a2e 100%);
    border-radius: 20px;
    padding: 28px 32px;
    color: #fff;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 16px;
    margin-bottom: 24px;
    position: relative;
    overflow: hidden;
}
.dash-welcome::before {
    content: '';
    position: absolute;
    top: -80px; right: -80px;
    width: 260px; height: 260px;
    border-radius: 50%;
    background: rgba(255,255,255,.04);
    pointer-events: none;
}
.dash-welcome::after {
    content: '';
    position: absolute;
    bottom: -60px; left: 30%;
    width: 180px; height: 180px;
    border-radius: 50%;
    background: rgba(79,70,229,.12);
    pointer-events: none;
}
.dash-welcome__text h2 { font-size: 22px; font-weight: 800; margin: 0 0 4px; color: #fff; }
.dash-welcome__text p { font-size: 13px; color: rgba(255,255,255,.6); margin: 0; }
.dash-welcome__actions { display: flex; gap: 10px; flex-shrink: 0; position: relative; z-index: 1; }
.dash-welcome__btn {
    display: inline-flex; align-items: center; gap: 6px;
    padding: 9px 18px; border-radius: 10px;
    font-size: 13px; font-weight: 600; text-decoration: none; transition: all .2s;
}
.dash-welcome__btn svg { width: 14px; height: 14px; }
.dash-welcome__btn--primary { background: rgba(255,255,255,.95); color: #0f3460; }
.dash-welcome__btn--primary:hover { background: #fff; color: #0f3460; }
.dash-welcome__btn--ghost { background: rgba(255,255,255,.1); color: #fff; border: 1px solid rgba(255,255,255,.2); }
.dash-welcome__btn--ghost:hover { background: rgba(255,255,255,.18); color: #fff; }

/* ── Cards ──────────────────────────────────────────────── */
.dash-card {
    background: #fff;
    border: 1px solid rgba(0,0,0,.07);
    border-radius: 16px;
    padding: 22px 24px;
    height: 100%;
    display: flex; flex-direction: column; gap: 14px;
}
.dark .dash-card { background: rgba(255,255,255,.04); border-color: rgba(255,255,255,.08); }
.dash-card__header { display: flex; align-items: flex-start; justify-content: space-between; gap: 12px; }
.dash-card__icon { width: 42px; height: 42px; border-radius: 12px; display: flex; align-items: center; justify-content: center; flex-shrink: 0; }
.dash-card__icon svg { width: 20px; height: 20px; }
.dash-card__label { font-size: 12px; text-transform: uppercase; letter-spacing: .06em; color: #9ca3af; font-weight: 600; }
.dash-card__value { font-size: 26px; font-weight: 800; color: #111827; line-height: 1.1; margin-top: 4px; }
.dark .dash-card__value { color: #f3f4f6; }
.dash-card__sub { font-size: 12px; color: #9ca3af; margin-top: 2px; }
.dash-card__divider { height: 1px; background: rgba(0,0,0,.06); }
.dark .dash-card__divider { background: rgba(255,255,255,.07); }
.dash-card__row { display: flex; justify-content: space-between; align-items: center; font-size: 13px; padding: 6px 0; }
.dash-card__row-label { color: #6b7280; display: flex; align-items: center; gap: 5px; }
.dash-card__row-label svg { width: 13px; height: 13px; }
.dash-card__row-value { font-weight: 600; color: #111827; display: flex; align-items: center; gap: 4px; }
.dark .dash-card__row-value { color: #f3f4f6; }

/* Balance card */
.dash-balance {
    background: linear-gradient(135deg, #1a1a2e 0%, #16213e 50%, #0f3460 100%);
    border: none; color: #fff; position: relative; overflow: hidden;
}
.dash-balance::before {
    content: ''; position: absolute; top: -50px; right: -50px;
    width: 180px; height: 180px; border-radius: 50%;
    background: rgba(255,255,255,.04); pointer-events: none;
}
.dash-balance .dash-card__label { color: rgba(255,255,255,.55); }
.dash-balance .dash-card__value { color: #fff; font-size: 32px; }
.dash-balance .dash-card__row-label { color: rgba(255,255,255,.5); }
.dash-balance .dash-card__row-value { color: #fff; }
.dash-balance .dash-card__divider { background: rgba(255,255,255,.12); }
.dash-balance__brand { font-size: 13px; font-weight: 800; letter-spacing: 1px; opacity: .85; }
.dash-balance__actions { display: flex; gap: 8px; flex-wrap: wrap; position: relative; z-index: 1; margin-top: auto; }
.dash-balance__btn {
    display: inline-flex; align-items: center; gap: 5px;
    padding: 8px 15px; border-radius: 8px; font-size: 12px; font-weight: 600;
    text-decoration: none; transition: all .2s; flex: 1; justify-content: center;
}
.dash-balance__btn svg { width: 13px; height: 13px; }
.dash-balance__btn--light { background: rgba(255,255,255,.92); color: #0f3460; }
.dash-balance__btn--light:hover { background: #fff; color: #0f3460; }
.dash-balance__btn--outline { background: rgba(255,255,255,.1); color: #fff; border: 1px solid rgba(255,255,255,.2); }
.dash-balance__btn--outline:hover { background: rgba(255,255,255,.18); color: #fff; }

/* Loan card */
.dash-loan__amount { font-size: 26px; font-weight: 800; color: #111827; margin-top: 4px; }
.dark .dash-loan__amount { color: #f3f4f6; }
.dash-loan__item {
    display: flex; justify-content: space-between; align-items: center;
    padding: 10px 0; border-bottom: 1px solid rgba(0,0,0,.05); font-size: 13px;
}
.dark .dash-loan__item { border-color: rgba(255,255,255,.05); }
.dash-loan__item:last-child { border-bottom: none; }
.dash-loan__ref { font-size: 11px; color: #9ca3af; margin-top: 2px; }
.dash-loan__badge { background: rgba(79,70,229,.08); color: #4f46e5; padding: 3px 10px; border-radius: 20px; font-size: 11px; font-weight: 600; }
.dash-loan__empty { font-size: 13px; color: #9ca3af; margin: 0; }

/* ── Quick Actions ───────────────────────────────────────── */
.dash-quick { margin: 0 0 20px; }
.dash-quick__grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(100px, 1fr)); gap: 12px; }
.dash-quick__item {
    background: #fff; border: 1px solid rgba(0,0,0,.07); border-radius: 14px;
    padding: 16px 12px; text-align: center; text-decoration: none; color: #374151;
    transition: all .2s; display: flex; flex-direction: column; align-items: center; gap: 8px;
}
.dark .dash-quick__item { background: rgba(255,255,255,.04); border-color: rgba(255,255,255,.08); color: #d1d5db; }
.dash-quick__item:hover { transform: translateY(-2px); box-shadow: 0 8px 24px rgba(0,0,0,.1); color: #111827; }
.dark .dash-quick__item:hover { color: #fff; }
.dash-quick__icon { width: 44px; height: 44px; border-radius: 12px; display: flex; align-items: center; justify-content: center; }
.dash-quick__icon svg { width: 20px; height: 20px; }
.dash-quick__label { font-size: 12px; font-weight: 600; }

/* ── Stats ───────────────────────────────────────────────── */
.dash-stat {
    background: #fff; border: 1px solid rgba(0,0,0,.07); border-radius: 14px;
    padding: 18px 20px; display: flex; align-items: center; gap: 14px;
}
.dark .dash-stat { background: rgba(255,255,255,.04); border-color: rgba(255,255,255,.08); }
.dash-stat__icon { width: 44px; height: 44px; border-radius: 12px; display: flex; align-items: center; justify-content: center; flex-shrink: 0; }
.dash-stat__icon svg { width: 20px; height: 20px; }
.dash-stat__val { font-size: 18px; font-weight: 800; color: #111827; line-height: 1.2; }
.dark .dash-stat__val { color: #f3f4f6; }
.dash-stat__lbl { font-size: 12px; color: #9ca3af; margin-top: 2px; }

/* ── Transactions ────────────────────────────────────────── */
.dash-txn { background: #fff; border: 1px solid rgba(0,0,0,.07); border-radius: 16px; overflow: hidden; }
.dark .dash-txn { background: rgba(255,255,255,.04); border-color: rgba(255,255,255,.08); }
.dash-txn__head {
    display: flex; align-items: center; justify-content: space-between;
    padding: 18px 24px; border-bottom: 1px solid rgba(0,0,0,.06);
}
.dark .dash-txn__head { border-color: rgba(255,255,255,.07); }
.dash-txn__title { font-size: 15px; font-weight: 700; color: #111827; }
.dark .dash-txn__title { color: #f3f4f6; }
.dash-txn__link { display: inline-flex; align-items: center; gap: 5px; font-size: 12px; font-weight: 600; color: #4f46e5; text-decoration: none; }
.dash-txn__link svg { width: 13px; height: 13px; }

@media(max-width:576px) {
    .dash-welcome { flex-direction: column; align-items: flex-start; }
    .dash-welcome__actions { width: 100%; }
    .dash-welcome__btn { flex: 1; justify-content: center; }
}
</style>
@endsection

@section('content')

<input type="hidden" id="refLink" value="{{ auth()->user()->account_number }}">
@php $last_login = auth()->user()->activities->last(); @endphp

{{-- WELCOME --}}
<div class="dash-welcome">
    <div class="dash-welcome__text">
        <h2>{{ grettings() }}, {{ auth()->user()->first_name }} 👋</h2>
        <p>{{ __('dashboard_welcome_overview') }} — {{ now()->format(__('dashboard_welcome_date_format')) }}</p>
    </div>
    <div class="dash-welcome__actions">
        <a href="{{ route('user.deposit.amount') }}" class="dash-welcome__btn dash-welcome__btn--primary">
            <i data-lucide="plus-circle"></i> {{ __('Deposit') }}
        </a>
        <a href="{{ route('loan-request.create') }}" class="dash-welcome__btn dash-welcome__btn--ghost">
            <i data-lucide="file-text"></i> {{ __('Loan Request') }}
        </a>
    </div>
</div>

{{-- TOP ROW --}}
<div class="row g-3 mb-3">

    {{-- Balance --}}
    <div class="col-xl-4 col-lg-6 col-12">
        <div class="dash-card dash-balance h-100">
            <div class="dash-card__header">
                <span class="dash-balance__brand">Eurovitas Finanzen</span>
                @if(setting('user_portfolio','permission') && Auth::user()->portfolio_status && auth()->user()->portfolio_id != null)
                    <a href="{{ route('user.portfolio') }}" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="{{ auth()->user()->portfolio?->portfolio_name }}">
                        <img src="{{ asset(auth()->user()->portfolio?->icon) }}" alt="" style="height:26px;">
                    </a>
                @endif
            </div>
            <div>
                <div class="dash-card__label">{{ __('Available Balance') }}</div>
                <div class="dash-card__value" id="passo">{{ setting('currency_symbol','global') }}{{ number_format($user->balance, 2) }}</div>
            </div>
            <div class="dash-card__divider"></div>
            <div>
                <div class="dash-card__row">
                    <span class="dash-card__row-label">{{ __('Account Holder') }}</span>
                    <span class="dash-card__row-value">{{ auth()->user()->full_name }}</span>
                </div>
                <div class="dash-card__row">
                    <span class="dash-card__row-label">{{ __('Account No') }}</span>
                    <span class="dash-card__row-value">
                        {{ auth()->user()->account_number }}
                        <span id="copy" style="cursor:pointer" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="{{ __('Copy') }}">
                            <i data-lucide="copy" style="width:12px;height:12px;opacity:.7"></i>
                        </span>
                    </span>
                </div>
                @if($last_login)
                <div class="dash-card__row">
                    <span class="dash-card__row-label">{{ __('Last Login') }}</span>
                    <span class="dash-card__row-value">{{ $last_login->created_at->format('d M, H:i') }}</span>
                </div>
                @endif
            </div>
            <div class="dash-balance__actions">
                <a href="{{ route('user.deposit.amount') }}" class="dash-balance__btn dash-balance__btn--light">
                    <i data-lucide="plus-circle"></i> {{ __('Deposit') }}
                </a>
                <a href="{{ route('user.withdraw.view') }}" class="dash-balance__btn dash-balance__btn--outline">
                    <i data-lucide="arrow-up-right"></i> {{ __('Withdraw') }}
                </a>
            </div>
        </div>
    </div>

    {{-- Account Summary --}}
    <div class="col-xl-4 col-lg-6 col-12">
        <div class="dash-card h-100">
            <div class="dash-card__header">
                <div>
                    <div class="dash-card__label">{{ __('Account Summary') }}</div>
                    <div class="dash-card__value">{{ setting('currency_symbol','global') }}{{ number_format($total_deposit - $total_withdraw, 2) }}</div>
                    <div class="dash-card__sub">{{ __('Net (deposits − withdrawals)') }}</div>
                </div>
                <div class="dash-card__icon" style="background:rgba(16,185,129,.1);color:#10b981;">
                    <i data-lucide="bar-chart-2"></i>
                </div>
            </div>
            <div class="dash-card__divider"></div>
            <div>
                <div class="dash-card__row">
                    <span class="dash-card__row-label"><i data-lucide="chevrons-down" style="color:#10b981"></i>{{ __('Total Deposits') }}</span>
                    <span class="dash-card__row-value" style="color:#10b981">+{{ $total_deposit }} {{ $currency }}</span>
                </div>
                @if(setting('transfer_status','permission'))
                <div class="dash-card__row">
                    <span class="dash-card__row-label"><i data-lucide="send" style="color:#f59e0b"></i>{{ __('Transfers') }}</span>
                    <span class="dash-card__row-value" style="color:#f59e0b">{{ $total_transfer }} {{ $currency }}</span>
                </div>
                @endif
                <div class="dash-card__row">
                    <span class="dash-card__row-label"><i data-lucide="arrow-up-right" style="color:#ef4444"></i>{{ __('Total Withdrawals') }}</span>
                    <span class="dash-card__row-value" style="color:#ef4444">-{{ $total_withdraw }} {{ $currency }}</span>
                </div>
                <div class="dash-card__row">
                    <span class="dash-card__row-label"><i data-lucide="list" style="color:#6366f1"></i>{{ __('Transactions') }}</span>
                    <span class="dash-card__row-value">{{ $total_transaction }}</span>
                </div>
            </div>
        </div>
    </div>

    {{-- Loans --}}
    <div class="col-xl-4 col-lg-12 col-12">
        <div class="dash-card h-100">
            <div class="dash-card__header">
                <div>
                    <div class="dash-card__label">{{ __('Active Loans') }}</div>
                    <div class="dash-loan__amount">{{ $currencySymbol }}{{ number_format($total_loan_amount, 2) }}</div>
                    <div class="dash-card__sub">{{ $total_running_loan }} {{ __('loan(s) in progress') }}</div>
                </div>
                <div class="dash-card__icon" style="background:rgba(79,70,229,.1);color:#4f46e5;">
                    <i data-lucide="banknote"></i>
                </div>
            </div>
            <div class="dash-card__divider"></div>
            <div style="flex:1;overflow-y:auto;max-height:150px;">
                @forelse($approved_loan_requests as $lr)
                <div class="dash-loan__item">
                    <div>
                        <div style="font-weight:600;font-size:13px">{{ $lr->loan_type }}</div>
                        <div class="dash-loan__ref">{{ __('ref_prefix') }} {{ $lr->reference }}</div>
                    </div>
                    <div style="text-align:right">
                        <div class="dash-loan__badge">{{ $lr->currency ?? 'EUR' }} {{ number_format($lr->approved_amount, 2) }}</div>
                        <div class="dash-loan__ref" style="margin-top:4px">{{ $lr->created_at->format('d M Y') }}</div>
                    </div>
                </div>
                @empty
                <p class="dash-loan__empty">{{ __('No active loan.') }} <a href="{{ route('loan-request.create') }}" style="color:#4f46e5">{{ __('Apply now →') }}</a></p>
                @endforelse
            </div>
            <a href="{{ route('loan-request.create') }}" style="display:flex;align-items:center;justify-content:center;gap:6px;padding:9px;border-radius:10px;background:#f9fafb;border:1px solid rgba(0,0,0,.08);color:#374151;font-size:12px;font-weight:600;text-decoration:none;">
                <i data-lucide="plus" style="width:14px;height:14px"></i> {{ __('New Loan Request') }}
            </a>
        </div>
    </div>

</div>

{{-- QUICK ACTIONS --}}
<div class="dash-quick">
    <div class="dash-quick__grid">
        <a href="{{ route('user.deposit.amount') }}" class="dash-quick__item">
            <div class="dash-quick__icon" style="background:rgba(16,185,129,.1);color:#10b981;"><i data-lucide="plus-circle"></i></div>
            <span class="dash-quick__label">{{ __('Deposit') }}</span>
        </a>
        <a href="{{ route('user.withdraw.view') }}" class="dash-quick__item">
            <div class="dash-quick__icon" style="background:rgba(239,68,68,.1);color:#ef4444;"><i data-lucide="arrow-up-right"></i></div>
            <span class="dash-quick__label">{{ __('Withdraw') }}</span>
        </a>
        @if(setting('transfer_status','permission'))
        <a href="{{ route('user.fund_transfer.index') }}" class="dash-quick__item">
            <div class="dash-quick__icon" style="background:rgba(245,158,11,.1);color:#f59e0b;"><i data-lucide="send"></i></div>
            <span class="dash-quick__label">{{ __('Transfer') }}</span>
        </a>
        @endif
        <a href="{{ route('loan-request.create') }}" class="dash-quick__item">
            <div class="dash-quick__icon" style="background:rgba(79,70,229,.1);color:#4f46e5;"><i data-lucide="file-text"></i></div>
            <span class="dash-quick__label">{{ __('Loan') }}</span>
        </a>
        <a href="{{ route('user.transactions') }}" class="dash-quick__item">
            <div class="dash-quick__icon" style="background:rgba(99,102,241,.1);color:#6366f1;"><i data-lucide="list"></i></div>
            <span class="dash-quick__label">{{ __('History') }}</span>
        </a>
        <a href="{{ route('user.ticket.index') }}" class="dash-quick__item">
            <div class="dash-quick__icon" style="background:rgba(156,163,175,.15);color:#6b7280;"><i data-lucide="help-circle"></i></div>
            <span class="dash-quick__label">{{ __('Support') }}</span>
        </a>
        <a href="{{ route('user.setting.show') }}" class="dash-quick__item">
            <div class="dash-quick__icon" style="background:rgba(156,163,175,.15);color:#6b7280;"><i data-lucide="settings"></i></div>
            <span class="dash-quick__label">{{ __('Settings') }}</span>
        </a>
    </div>
</div>

{{-- STATS --}}
<div class="row g-3 mb-3">
    <div class="col-xl-3 col-lg-3 col-md-6 col-6">
        <div class="dash-stat">
            <div class="dash-stat__icon" style="background:rgba(239,68,68,.1);color:#ef4444;"><i data-lucide="banknote"></i></div>
            <div><div class="dash-stat__val">{{ $total_loan }}</div><div class="dash-stat__lbl">{{ __('Total Loans') }}</div></div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-3 col-md-6 col-6">
        <div class="dash-stat">
            <div class="dash-stat__icon" style="background:rgba(245,158,11,.1);color:#f59e0b;"><i data-lucide="ticket"></i></div>
            <div><div class="dash-stat__val">{{ $total_tickets }}</div><div class="dash-stat__lbl">{{ __('Support Tickets') }}</div></div>
        </div>
    </div>
</div>

{{-- RECENT TRANSACTIONS --}}
<div class="dash-txn">
    <div class="dash-txn__head">
        <span class="dash-txn__title">{{ __('Recent Transactions') }}</span>
        <a href="{{ route('user.transactions') }}" class="dash-txn__link">
            <i data-lucide="eye"></i> {{ __('See All') }}
        </a>
    </div>
    <div class="site-card-body p-0 overflow-x-auto">
        <div class="site-custom-table">
            <div class="contents">
                <div class="site-table-list site-table-head">
                    <div class="site-table-col">{{ __('Description') }}</div>
                    <div class="site-table-col">{{ __('Transactions ID') }}</div>
                    <div class="site-table-col">{{ __('Type') }}</div>
                    <div class="site-table-col">{{ __('Amount') }}</div>
                    <div class="site-table-col">{{ __('Charge') }}</div>
                    <div class="site-table-col">{{ __('Status') }}</div>
                    <div class="site-table-col">{{ __('Method') }}</div>
                </div>
                @foreach($recentTransactions as $transaction)
                <div class="site-table-list">
                    <div class="site-table-col">
                        <div class="description">
                            <div class="event-icon">
                                @if($transaction->type->value == 'deposit' || $transaction->type->value == 'manual_deposit')
                                    <i data-lucide="chevrons-down"></i>
                                @elseif(Str::startsWith($transaction->type->value,'dps'))
                                    <i data-lucide="archive"></i>
                                @elseif(Str::startsWith($transaction->type->value,'fdr'))
                                    <i data-lucide="book"></i>
                                @elseif(Str::startsWith($transaction->type->value,'loan'))
                                    <i data-lucide="alert-triangle"></i>
                                @elseif($transaction->type->value == 'subtract')
                                    <i data-lucide="minus-circle"></i>
                                @elseif($transaction->type->value == 'receive_money')
                                    <i data-lucide="arrow-down-left"></i>
                                @else
                                    <i data-lucide="send"></i>
                                @endif
                            </div>
                            <div class="content">
                                <div class="title">
                                    {{ $transaction->description }}
                                    @if(!in_array($transaction->approval_cause,['none','']))
                                        <span class="msg" data-bs-toggle="tooltip" data-bs-custom-class="custom-tooltip" data-bs-placement="top" data-bs-title="{{ $transaction->approval_cause }}"><i data-lucide="message-square"></i></span>
                                    @endif
                                </div>
                                <div class="date">{{ $transaction->created_at }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="site-table-col"><div class="trx fw-bold">{{ $transaction->tnx }}</div></div>
                    <div class="site-table-col">
                        <div class="type site-badge badge-primary">{{ ucfirst(str_replace('_',' ',$transaction->type->value)) }}</div>
                    </div>
                    <div class="site-table-col">
                        <div @class(['fw-bold','green-color'=>isPlusTransaction($transaction->type),'red-color'=>!isPlusTransaction($transaction->type)])>
                            {{ isPlusTransaction($transaction->type) ? '+' : '-' }}{{ $transaction->amount.' '.transaction_currency($transaction) }}
                        </div>
                    </div>
                    <div class="site-table-col">
                        <div class="fw-bold red-color">-{{ $transaction->charge.' '.transaction_currency($transaction) }}</div>
                    </div>
                    <div class="site-table-col">
                        @if($transaction->status->value == 'failed')
                            <div class="type site-badge badge-failed">{{ $transaction->status->value }}</div>
                        @elseif($transaction->status->value == 'success')
                            <div class="type site-badge badge-success">{{ $transaction->status->value }}</div>
                        @elseif($transaction->status->value == 'pending')
                            <div class="type site-badge badge-pending">{{ $transaction->status->value }}</div>
                        @endif
                    </div>
                    <div class="site-table-col">
                        <div class="fw-bold">{{ $transaction->method !== '' ? ucfirst(str_replace('-',' ',$transaction->method)) : __('System') }}</div>
                    </div>
                </div>
                @endforeach
            </div>
            @if(count($recentTransactions) == 0)
                <div class="no-data-found">{{ __('No Data Found') }}</div>
            @endif
        </div>
    </div>
</div>

@endsection

@section('script')
<script>
$('#copy').on('click', function() {
    var textToCopy = $('#refLink').val();
    var tempInput = $('<input>');
    $('body').append(tempInput);
    tempInput.val(textToCopy).select();
    document.execCommand('copy');
    tempInput.remove();
    var tooltip = bootstrap.Tooltip.getInstance('#copy');
    tooltip.setContent({'.tooltip-inner': 'Copied'});
    setTimeout(() => tooltip.setContent({'.tooltip-inner': 'Copy'}), 4000);
});
</script>
@endsection
