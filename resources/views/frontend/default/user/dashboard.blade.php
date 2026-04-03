@extends('frontend::layouts.user')
@section('title')
    {{ __('Dashboard') }}
@endsection
@section('content')

    <div class="row">
        <div class="col-xl-4 col-lg-12 col-md-12 col-12">
            <input type="hidden" id="refLink" value="{{ auth()->user()->account_number }}">
            @php
                $last_login = auth()->user()->activities->last();
                $browser = getBrowser($last_login?->agent);
            @endphp
            <div class="ev-balance-card">
                <div class="ev-balance-card__top">
                    <div class="ev-balance-card__logo">Eurovitas</div>
                    @if (setting('user_portfolio', 'permission') && Auth::user()->portfolio_status && auth()->user()->portfolio_id != null)
                        <a href="{{ route('user.portfolio') }}" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="{{ auth()->user()->portfolio?->portfolio_name }}">
                            <img src="{{ asset(auth()->user()->portfolio?->icon) }}" alt="" style="height:28px;">
                        </a>
                    @endif
                </div>

                <div class="ev-balance-card__label">{{ __('Available Balance') }}</div>
                <div class="ev-balance-card__amount" id="passo">
                    {{ setting('currency_symbol', 'global') }}{{ number_format($user->balance, 2) }}
                </div>

                <div class="ev-balance-card__divider"></div>

                <div class="ev-balance-card__meta">
                    <div class="ev-balance-card__meta-item">
                        <span class="ev-balance-card__meta-label">{{ __('Account Holder') }}</span>
                        <span class="ev-balance-card__meta-value">{{ auth()->user()->full_name }}</span>
                    </div>
                    <div class="ev-balance-card__meta-item">
                        <span class="ev-balance-card__meta-label">{{ __('Account No:') }}</span>
                        <span class="ev-balance-card__meta-value">
                            {{ auth()->user()->account_number }}
                            <span id="copy" style="cursor:pointer;margin-left:4px;" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="{{ __('Copy') }}"><i data-lucide="copy" style="width:13px;height:13px;"></i></span>
                        </span>
                    </div>
                    @if ($last_login)
                    <div class="ev-balance-card__meta-item">
                        <span class="ev-balance-card__meta-label">{{ __('Last Login') }}</span>
                        <span class="ev-balance-card__meta-value">{{ $last_login->created_at->format('d M, H:i') }}</span>
                    </div>
                    @endif
                </div>

                <div class="ev-balance-card__actions">
                    <a href="{{ route('user.deposit.amount') }}" class="ev-balance-card__btn ev-balance-card__btn--primary">
                        <i data-lucide="plus-circle"></i> {{ __('Deposit Funds') }}
                    </a>
                    <a href="{{ route('user.withdraw.view') }}" class="ev-balance-card__btn ev-balance-card__btn--outline">
                        <i data-lucide="arrow-up-right"></i> {{ __('Withdraw Funds') }}
                    </a>
                </div>
            </div>

            <style>
            .ev-balance-card {
                background: linear-gradient(135deg, #1a1a2e 0%, #16213e 50%, #0f3460 100%);
                border-radius: 20px;
                padding: 28px;
                color: #fff;
                position: relative;
                overflow: hidden;
                box-shadow: 0 20px 60px rgba(15,52,96,.5);
                height: 100%;
                min-height: 320px;
                display: flex;
                flex-direction: column;
                justify-content: space-between;
            }
            .ev-balance-card::before {
                content: '';
                position: absolute;
                top: -60px; right: -60px;
                width: 200px; height: 200px;
                border-radius: 50%;
                background: rgba(255,255,255,.04);
            }
            .ev-balance-card::after {
                content: '';
                position: absolute;
                bottom: -40px; left: -40px;
                width: 150px; height: 150px;
                border-radius: 50%;
                background: rgba(79,70,229,.15);
            }
            .ev-balance-card__top {
                display: flex;
                justify-content: space-between;
                align-items: center;
                margin-bottom: 24px;
            }
            .ev-balance-card__logo {
                font-size: 16px;
                font-weight: 800;
                letter-spacing: 1px;
                color: #fff;
                opacity: .9;
            }
            .ev-balance-card__label {
                font-size: 12px;
                text-transform: uppercase;
                letter-spacing: .1em;
                color: rgba(255,255,255,.6);
                margin-bottom: 6px;
            }
            .ev-balance-card__amount {
                font-size: 36px;
                font-weight: 800;
                color: #fff;
                letter-spacing: -1px;
                margin-bottom: 20px;
            }
            .ev-balance-card__divider {
                height: 1px;
                background: rgba(255,255,255,.12);
                margin-bottom: 16px;
            }
            .ev-balance-card__meta {
                display: flex;
                flex-direction: column;
                gap: 8px;
                margin-bottom: 24px;
            }
            .ev-balance-card__meta-item {
                display: flex;
                justify-content: space-between;
                align-items: center;
                font-size: 13px;
            }
            .ev-balance-card__meta-label { color: rgba(255,255,255,.5); }
            .ev-balance-card__meta-value { color: #fff; font-weight: 600; display:flex; align-items:center; gap:4px; }
            .ev-balance-card__actions {
                display: flex;
                gap: 8px;
                flex-wrap: wrap;
                position: relative;
                z-index: 1;
            }
            .ev-balance-card__btn {
                display: inline-flex;
                align-items: center;
                gap: 5px;
                padding: 8px 16px;
                border-radius: 8px;
                font-size: 13px;
                font-weight: 600;
                text-decoration: none;
                transition: all .2s;
            }
            .ev-balance-card__btn svg { width:14px; height:14px; }
            .ev-balance-card__btn--primary {
                background: rgba(255,255,255,.95);
                color: #0f3460;
            }
            .ev-balance-card__btn--primary:hover { background:#fff; color:#0f3460; }
            .ev-balance-card__btn--outline {
                background: rgba(255,255,255,.1);
                color: #fff;
                border: 1px solid rgba(255,255,255,.2);
            }
            .ev-balance-card__btn--outline:hover { background: rgba(255,255,255,.2); color:#fff; }
            </style>
        </div>
        {{-- Colonne droite : My Loan --}}
        <div class="col-xl-8 col-lg-12 col-md-12 col-12">
            @if (setting('user_loan', 'permission'))
            <div class="ev-info-card h-100">
                <div class="ev-info-card__header">
                    <div class="ev-info-card__icon"><i data-lucide="credit-card"></i></div>
                    <div>
                        <div class="ev-info-card__title">{{ __('My Active Loan') }}</div>
                        <div class="ev-info-card__sub">{{ __('Repayment Tracking') }}</div>
                    </div>
                    <a href="{{ route('user.loan.history') }}" class="ev-info-card__link ms-auto"><i data-lucide="arrow-up-right"></i></a>
                </div>
                <div class="ev-info-card__amount">
                    {{ $currencySymbol . number_format($total_running_loan > 0 ? $total_loan_amount : 0, 2) }}
                </div>
                <div class="ev-info-card__body">
                    @if ($total_running_loan > 0)
                        @foreach ($user->loan->whereIn('status', [\App\Enums\LoanStatus::Running, \App\Enums\LoanStatus::Due])->take(3) as $loan)
                        <div class="ev-info-card__row">
                            <span>{{ $loan->plan?->name }}</span>
                            <span class="ev-info-card__badge">
                                {{ $loan->last_date ? $loan->last_date->format('d M Y') : 'N/A' }}
                            </span>
                        </div>
                        @endforeach
                    @else
                        <p class="ev-info-card__empty">{{ __('No active loan.') }}</p>
                    @endif
                </div>
            </div>
            @endif
        </div>
    </div>

    {{-- ═══ BLOC STATISTIQUES ═══ --}}
    <div class="row gy-20 mt-10">
        <div class="col-xl-3 col-lg-3 col-md-6 col-12">
            <div class="ev-stat-card">
                <div class="ev-stat-card__icon" style="background:rgba(79,70,229,.1);color:#4f46e5;"><i data-lucide="list"></i></div>
                <div class="ev-stat-card__info">
                    <div class="ev-stat-card__value">{{ $total_transaction }}</div>
                    <div class="ev-stat-card__label">{{ __('Transactions') }}</div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-6 col-12">
            <div class="ev-stat-card">
                <div class="ev-stat-card__icon" style="background:rgba(16,185,129,.1);color:#10b981;"><i data-lucide="chevrons-down"></i></div>
                <div class="ev-stat-card__info">
                    <div class="ev-stat-card__value">{{ $total_deposit }} {{ $currency }}</div>
                    <div class="ev-stat-card__label">{{ __('Total Deposits') }}</div>
                </div>
            </div>
        </div>
        @if (setting('transfer_status', 'permission'))
        <div class="col-xl-3 col-lg-3 col-md-6 col-12">
            <div class="ev-stat-card">
                <div class="ev-stat-card__icon" style="background:rgba(245,158,11,.1);color:#f59e0b;"><i data-lucide="send"></i></div>
                <div class="ev-stat-card__info">
                    <div class="ev-stat-card__value">{{ $total_transfer }} {{ $currency }}</div>
                    <div class="ev-stat-card__label">{{ __('Total Transfers') }}</div>
                </div>
            </div>
        </div>
        @endif
        <div class="col-xl-3 col-lg-3 col-md-6 col-12">
            <div class="ev-stat-card">
                <div class="ev-stat-card__icon" style="background:rgba(239,68,68,.1);color:#ef4444;"><i data-lucide="arrow-up-right"></i></div>
                <div class="ev-stat-card__info">
                    <div class="ev-stat-card__value">{{ $total_withdraw }} {{ $currency }}</div>
                    <div class="ev-stat-card__label">{{ __('Total Withdrawals') }}</div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-6 col-12">
            <div class="ev-stat-card">
                <div class="ev-stat-card__icon" style="background:rgba(99,102,241,.1);color:#6366f1;"><i data-lucide="gift"></i></div>
                <div class="ev-stat-card__info">
                    <div class="ev-stat-card__value">{{ $total_referral_profit }} {{ $currency }}</div>
                    <div class="ev-stat-card__label">{{ __('Referral Bonus') }}</div>
                </div>
            </div>
        </div>
        @if (setting('user_loan', 'permission'))
        <div class="col-xl-3 col-lg-3 col-md-6 col-12">
            <div class="ev-stat-card">
                <div class="ev-stat-card__icon" style="background:rgba(239,68,68,.1);color:#ef4444;"><i data-lucide="credit-card"></i></div>
                <div class="ev-stat-card__info">
                    <div class="ev-stat-card__value">{{ $total_loan }}</div>
                    <div class="ev-stat-card__label">{{ __('Total Loans') }}</div>
                </div>
            </div>
        </div>
        @endif
        @if (setting('sign_up_referral', 'permission'))
        <div class="col-xl-3 col-lg-3 col-md-6 col-12">
            <div class="ev-stat-card">
                <div class="ev-stat-card__icon" style="background:rgba(16,185,129,.1);color:#10b981;"><i data-lucide="users"></i></div>
                <div class="ev-stat-card__info">
                    <div class="ev-stat-card__value">{{ $total_referral }}</div>
                    <div class="ev-stat-card__label">{{ __('Total Referrals') }}</div>
                </div>
            </div>
        </div>
        @endif
        <div class="col-xl-3 col-lg-3 col-md-6 col-12">
            <div class="ev-stat-card">
                <div class="ev-stat-card__icon" style="background:rgba(245,158,11,.1);color:#f59e0b;"><i data-lucide="ticket"></i></div>
                <div class="ev-stat-card__info">
                    <div class="ev-stat-card__value">{{ $total_tickets }}</div>
                    <div class="ev-stat-card__label">{{ __('Total Tickets') }}</div>
                </div>
            </div>
        </div>

        <style>
        .ev-info-card { background:#fff; border:1px solid rgba(0,0,0,.07); border-radius:16px; padding:24px; display:flex; flex-direction:column; gap:16px; }
        .dark .ev-info-card { background:rgba(255,255,255,.04); border-color:rgba(255,255,255,.08); }
        .ev-info-card__header { display:flex; align-items:center; gap:12px; }
        .ev-info-card__icon { width:40px; height:40px; border-radius:10px; background:rgba(79,70,229,.1); color:#4f46e5; display:flex; align-items:center; justify-content:center; flex-shrink:0; }
        .ev-info-card__icon svg { width:20px; height:20px; }
        .ev-info-card__title { font-size:15px; font-weight:700; }
        .ev-info-card__sub { font-size:12px; color:#9ca3af; }
        .ev-info-card__link { width:32px; height:32px; border-radius:8px; background:rgba(0,0,0,.04); display:flex; align-items:center; justify-content:center; color:#374151; }
        .ev-info-card__link svg { width:16px; height:16px; }
        .ev-info-card__amount { font-size:28px; font-weight:800; color:#111827; }
        .dark .ev-info-card__amount { color:#f3f4f6; }
        .ev-info-card__body { display:flex; flex-direction:column; gap:8px; }
        .ev-info-card__row { display:flex; justify-content:space-between; align-items:center; font-size:13px; padding:8px 0; border-bottom:1px solid rgba(0,0,0,.05); }
        .dark .ev-info-card__row { border-color:rgba(255,255,255,.05); }
        .ev-info-card__badge { background:rgba(79,70,229,.08); color:#4f46e5; padding:2px 10px; border-radius:20px; font-size:12px; font-weight:600; }
        .ev-info-card__empty { font-size:13px; color:#9ca3af; margin:0; }
        .ev-stat-card { background:#fff; border:1px solid rgba(0,0,0,.07); border-radius:14px; padding:20px; display:flex; align-items:center; gap:14px; }
        .dark .ev-stat-card { background:rgba(255,255,255,.04); border-color:rgba(255,255,255,.08); }
        .ev-stat-card__icon { width:44px; height:44px; border-radius:12px; display:flex; align-items:center; justify-content:center; flex-shrink:0; }
        .ev-stat-card__icon svg { width:20px; height:20px; }
        .ev-stat-card__value { font-size:18px; font-weight:800; color:#111827; line-height:1.2; }
        .dark .ev-stat-card__value { color:#f3f4f6; }
        .ev-stat-card__label { font-size:12px; color:#9ca3af; margin-top:2px; }
        .gy-20 { row-gap: 20px; }
        .mt-10 { margin-top: 10px; }
        </style>
        <div class="col-xl-12 col-lg-12 col-md-12 col-12">
            <div class="site-card">
                <div class="site-card-header">
                    <div class="title-small">{{ __('Recent Transactions') }}</div>
                    <div class="card-header-links">
                        <a href="{{ route('user.transactions') }}" class="card-header-link"><i
                                data-lucide="eye"></i>{{ __('See All') }}</a>
                    </div>
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
                            @foreach ($recentTransactions as $transaction)
                                <div class="site-table-list">
                                    <div class="site-table-col">
                                        <div class="description">
                                            <div class="event-icon">
                                                @if ($transaction->type->value == 'deposit' || $transaction->type->value == 'manual_deposit')
                                                    <i data-lucide="chevrons-down"></i>
                                                @elseif(Str::startsWith($transaction->type->value, 'dps'))
                                                    <i data-lucide="archive"></i>
                                                @elseif(Str::startsWith($transaction->type->value, 'fdr'))
                                                    <i data-lucide="book"></i>
                                                @elseif(Str::startsWith($transaction->type->value, 'loan'))
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
                                                    @if (!in_array($transaction->approval_cause, ['none', '']))
                                                        <span class="msg" data-bs-toggle="tooltip"
                                                            data-bs-custom-class="custom-tooltip" data-bs-placement="top"
                                                            data-bs-title="{{ $transaction->approval_cause }}"><i
                                                                data-lucide="message-square"></i>
                                                        </span>
                                                    @endif
                                                </div>
                                                <div class="date">{{ $transaction->created_at }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="site-table-col">
                                        <div class="trx fw-bold">{{ $transaction->tnx }}</div>
                                    </div>
                                    <div class="site-table-col">
                                        <div class="type site-badge badge-primary">
                                            {{ ucfirst(str_replace('_', ' ', $transaction->type->value)) }}</div>
                                    </div>
                                    <div class="site-table-col">
                                        <div @class([
                                            'fw-bold',
                                            'green-color' => isPlusTransaction($transaction->type) == true,
                                            'red-color' => isPlusTransaction($transaction->type) == false,
                                        ])>
                                            {{ isPlusTransaction($transaction->type) == true ? '+' : '-' }}{{ $transaction->amount . ' ' . transaction_currency($transaction) }}
                                        </div>
                                    </div>
                                    <div class="site-table-col">
                                        <div class="fw-bold red-color">
                                            -{{ $transaction->charge . ' ' . transaction_currency($transaction) }}</div>
                                    </div>
                                    <div class="site-table-col">
                                        @if ($transaction->status->value == 'failed')
                                            <div class="type site-badge badge-failed">{{ $transaction->status->value }}
                                            </div>
                                        @elseif($transaction->status->value == 'success')
                                            <div class="type site-badge badge-success">{{ $transaction->status->value }}
                                            </div>
                                        @elseif($transaction->status->value == 'pending')
                                            <div class="type site-badge badge-pending">{{ $transaction->status->value }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="site-table-col">
                                        <div class="fw-bold">
                                            {{ $transaction->method !== '' ? ucfirst(str_replace('-', ' ', $transaction->method)) : __('System') }}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        @if (count($recentTransactions) == 0)
                            <div class="no-data-found">{{ __('No Data Found') }}</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
@section('script')
    <script>
        $('#copy').on('click', function() {
            copyRef();
        });

        function copyRef() {
            /* Get the text field */
            var textToCopy = $('#refLink').val();
            // Create a temporary input element
            var tempInput = $('<input>');
            $('body').append(tempInput);
            tempInput.val(textToCopy).select();
            // Copy the text from the temporary input
            document.execCommand('copy');
            // Remove the temporary input element
            tempInput.remove();

            // Set tooltip as copied
            var tooltip = bootstrap.Tooltip.getInstance('#copy');
            tooltip.setContent({
                '.tooltip-inner': 'Copied'
            });

            setTimeout(() => {
                tooltip.setContent({
                    '.tooltip-inner': 'Copy'
                });
            }, 4000);
        }
    </script>
@endsection
