@extends('frontend::layouts.user')
@section('title') {{ __('Withdrawal History') }} @endsection

@push('style')
<link rel="stylesheet" href="{{ asset('front/css/daterangepicker.css') }}">
<style>
/* ── Filtres ── */
.wl-filters {
    display: flex;
    flex-wrap: wrap;
    align-items: flex-end;
    gap: 12px;
    padding: 20px 24px;
    border-bottom: 1px solid rgba(0,0,0,.06);
    background: #fafafa;
    border-radius: 16px 16px 0 0;
}
.dark .wl-filters { background: rgba(255,255,255,.02); border-color: rgba(255,255,255,.06); }
.wl-filter-group { display: flex; flex-direction: column; gap: 5px; }
.wl-filter-group label { font-size: 11px; font-weight: 600; text-transform: uppercase; letter-spacing: .07em; color: #9ca3af; }
.wl-filter-input {
    height: 38px;
    padding: 0 12px;
    background: #fff;
    border: 1.5px solid #e5e7eb;
    border-radius: 8px;
    font-size: 13px;
    color: #111827;
    min-width: 180px;
    outline: none;
    transition: border-color .2s;
}
.dark .wl-filter-input { background: rgba(255,255,255,.06); border-color: rgba(255,255,255,.1); color: #f3f4f6; }
.wl-filter-input:focus { border-color: #4f46e5; }
.wl-filter-btn {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    height: 38px;
    padding: 0 16px;
    border-radius: 8px;
    font-size: 13px;
    font-weight: 600;
    border: none;
    cursor: pointer;
    transition: opacity .2s;
}
.wl-filter-btn:hover { opacity: .85; }
.wl-filter-btn--primary { background: #4f46e5; color: #fff; }
.wl-filter-btn--reset   { background: #ef4444; color: #fff; }
.wl-filter-btn svg { width: 14px; height: 14px; }
.wl-filter-select {
    height: 38px;
    padding: 0 12px;
    background: #fff;
    border: 1.5px solid #e5e7eb;
    border-radius: 8px;
    font-size: 13px;
    color: #111827;
    outline: none;
    cursor: pointer;
}
.dark .wl-filter-select { background: rgba(255,255,255,.06); border-color: rgba(255,255,255,.1); color: #f3f4f6; }

/* ── Cards liste ── */
.wl-list { display: flex; flex-direction: column; gap: 0; }

.wl-card {
    border-bottom: 1px solid rgba(0,0,0,.06);
    transition: background .15s;
}
.dark .wl-card { border-color: rgba(255,255,255,.06); }
.wl-card:last-child { border-bottom: none; }
.wl-card:hover { background: rgba(79,70,229,.02); }

.wl-card__main {
    display: flex;
    align-items: center;
    gap: 16px;
    padding: 18px 24px;
    flex-wrap: wrap;
}

/* Icone */
.wl-card__icon {
    width: 44px; height: 44px;
    border-radius: 12px;
    display: flex; align-items: center; justify-content: center;
    flex-shrink: 0;
}
.wl-card__icon svg { width: 20px; height: 20px; }

/* Info principale */
.wl-card__info { flex: 1; min-width: 0; }
.wl-card__desc { font-size: 14px; font-weight: 600; color: #111827; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }
.dark .wl-card__desc { color: #f3f4f6; }
.wl-card__date { font-size: 12px; color: #9ca3af; margin-top: 2px; }
.wl-card__tnx  { font-size: 11px; color: #6b7280; font-family: monospace; margin-top: 1px; }

/* Montant */
.wl-card__amount {
    text-align: right;
    flex-shrink: 0;
}
.wl-card__amount-val { font-size: 18px; font-weight: 800; color: #ef4444; }
.wl-card__amount-charge { font-size: 11px; color: #9ca3af; margin-top: 2px; }

/* Badge */
.wl-badge {
    display: inline-flex;
    align-items: center;
    gap: 4px;
    padding: 4px 12px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 600;
    flex-shrink: 0;
}
.wl-badge svg { width: 12px; height: 12px; }
.wl-badge--pending { background: rgba(245,158,11,.1); color: #b45309; }
.wl-badge--success { background: rgba(16,185,129,.1); color: #065f46; }
.wl-badge--failed  { background: rgba(239,68,68,.1);  color: #991b1b; }
.dark .wl-badge--pending { color: #fcd34d; }
.dark .wl-badge--success { color: #6ee7b7; }
.dark .wl-badge--failed  { color: #fca5a5; }

/* Message admin */
.wl-card__msg {
    display: flex;
    align-items: flex-start;
    gap: 10px;
    margin: 0 24px 16px;
    padding: 12px 16px;
    border-radius: 10px;
    font-size: 13px;
    line-height: 1.55;
}
.wl-card__msg svg { width: 15px; height: 15px; flex-shrink: 0; margin-top: 1px; }
.wl-card__msg--pending { background: rgba(79,70,229,.06); color: #3730a3; border-left: 3px solid #4f46e5; }
.wl-card__msg--success { background: rgba(16,185,129,.06); color: #065f46; border-left: 3px solid #10b981; }
.wl-card__msg--failed  { background: rgba(239,68,68,.06);  color: #991b1b; border-left: 3px solid #ef4444; }
.dark .wl-card__msg--pending { color: #a5b4fc; }
.dark .wl-card__msg--success { color: #6ee7b7; }
.dark .wl-card__msg--failed  { color: #fca5a5; }

/* Empty */
.wl-empty {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    padding: 60px 20px;
    gap: 12px;
    color: #9ca3af;
}
.wl-empty svg { width: 48px; height: 48px; opacity: .35; }
.wl-empty__text { font-size: 15px; font-weight: 600; }
.wl-empty__sub { font-size: 13px; }

/* Pagination wrapper */
.wl-pagination { padding: 16px 24px; }
</style>
@endpush

@section('content')
<div class="row">
    <div class="col-xl-12">
        <div class="site-card" style="overflow:hidden;">

            {{-- Header --}}
            <div class="site-card-header">
                <div class="title">{{ __('Withdrawal History') }}</div>
                <div class="card-header-links">
                    <a href="{{ route('user.withdraw.view') }}" class="card-header-link">
                        <i data-lucide="plus-circle"></i> {{ __('New Withdrawal') }}
                    </a>
                </div>
            </div>

            {{-- Filtres --}}
            <form method="GET">
                <div class="wl-filters">
                    <div class="wl-filter-group">
                        <label>{{ __('Transaction ID') }}</label>
                        <input class="wl-filter-input" type="text" name="trx"
                            value="{{ request('trx') }}" placeholder="TRX..." autocomplete="off">
                    </div>
                    <div class="wl-filter-group">
                        <label>{{ __('Period') }}</label>
                        <input class="wl-filter-input" type="text" name="daterange"
                            value="{{ request('daterange') }}" autocomplete="off" style="min-width:220px;">
                    </div>
                    <div style="display:flex;align-items:flex-end;gap:8px;">
                        <button class="wl-filter-btn wl-filter-btn--primary" name="filter">
                            <i data-lucide="filter"></i> {{ __('Filter') }}
                        </button>
                        @if(request()->has('filter'))
                        <button type="button" class="wl-filter-btn wl-filter-btn--reset reset-filter">
                            <i data-lucide="x"></i> {{ __('Reset') }}
                        </button>
                        @endif
                    </div>
                    <div class="wl-filter-group ms-auto">
                        <label>{{ __('Show') }}</label>
                        <select name="limit" class="wl-filter-select" id="limitSelect">
                            <option value="15" @selected(request('limit',15)=='15')>{{ __('15 per page') }}</option>
                            <option value="30" @selected(request('limit')=='30')>{{ __('30 per page') }}</option>
                            <option value="50" @selected(request('limit')=='50')>{{ __('50 per page') }}</option>
                            <option value="100" @selected(request('limit')=='100')>{{ __('100 per page') }}</option>
                        </select>
                    </div>
                </div>
            </form>

            {{-- Liste --}}
            <div class="wl-list">
                @forelse ($withdraws as $w)
                @php
                    $status = $w->status->value;
                    $isSuccess = $status === App\Enums\TxnStatus::Success->value;
                    $isFailed  = $status === App\Enums\TxnStatus::Failed->value;
                    $isPending = $status === App\Enums\TxnStatus::Pending->value;
                    $hasMsg = !in_array($w->approval_cause, ['none', '', null]);
                @endphp
                <div class="wl-card">
                    <div class="wl-card__main">

                        {{-- Icone statut --}}
                        <div class="wl-card__icon"
                            style="background:{{ $isSuccess ? 'rgba(16,185,129,.1)' : ($isFailed ? 'rgba(239,68,68,.1)' : 'rgba(245,158,11,.1)') }};
                                   color:{{ $isSuccess ? '#10b981' : ($isFailed ? '#ef4444' : '#f59e0b') }};">
                            @if($isSuccess)
                                <i data-lucide="check-circle"></i>
                            @elseif($isFailed)
                                <i data-lucide="x-circle"></i>
                            @else
                                <i data-lucide="clock"></i>
                            @endif
                        </div>

                        {{-- Description --}}
                        <div class="wl-card__info">
                            <div class="wl-card__desc">{{ $w->description }}</div>
                            <div class="wl-card__date">{{ \Carbon\Carbon::parse($w->created_at)->format('d M Y, H:i') }}</div>
                            <div class="wl-card__tnx">{{ $w->tnx }}</div>
                        </div>

                        {{-- Méthode --}}
                        <div style="font-size:13px;color:#6b7280;flex-shrink:0;display:none;display:block;">
                            <span style="background:rgba(0,0,0,.05);padding:3px 10px;border-radius:6px;font-size:12px;font-weight:600;">
                                {{ $w->method }}
                            </span>
                        </div>

                        {{-- Montant --}}
                        <div class="wl-card__amount">
                            <div class="wl-card__amount-val">-{{ number_format($w->amount, 2) }} {{ $currency }}</div>
                            @if($w->charge > 0)
                            <div class="wl-card__amount-charge">{{ __('Fees:') }} {{ $w->charge }} {{ $currency }}</div>
                            @else
                            <div class="wl-card__amount-charge">{{ __('No fees') }}</div>
                            @endif
                        </div>

                        {{-- Badge statut --}}
                        <div>
                            @if($isPending)
                                <span class="wl-badge wl-badge--pending">
                                    <i data-lucide="clock"></i> {{ __('Pending') }}
                                </span>
                            @elseif($isSuccess)
                                <span class="wl-badge wl-badge--success">
                                    <i data-lucide="check"></i> {{ __('Approved') }}
                                </span>
                            @else
                                <span class="wl-badge wl-badge--failed">
                                    <i data-lucide="x"></i> {{ __('Refused') }}
                                </span>
                            @endif
                        </div>

                    </div>

                    {{-- Message admin --}}
                    @if($hasMsg)
                    <div class="wl-card__msg wl-card__msg--{{ $isSuccess ? 'success' : ($isFailed ? 'failed' : 'pending') }}">
                        <i data-lucide="message-square"></i>
                        <div><strong>{{ __('Eurovitas Finanzen message:') }}</strong> {{ $w->approval_cause }}</div>
                    </div>
                    @endif
                </div>
                @empty
                <div class="wl-empty">
                    <i data-lucide="inbox"></i>
                    <div class="wl-empty__text">{{ __('No withdrawal found') }}</div>
                    <div class="wl-empty__sub">{{ __('Your withdrawal requests will appear here.') }}</div>
                </div>
                @endforelse
            </div>

            {{-- Pagination --}}
            @if($withdraws->hasPages())
            <div class="wl-pagination">
                {{ $withdraws->withQueryString()->links() }}
            </div>
            @endif

        </div>
    </div>
</div>
@endsection

@push('js')
<script src="{{ asset('front/js/moment.min.js') }}"></script>
<script src="{{ asset('front/js/daterangepicker.min.js') }}"></script>
<script>
"use strict";
$('input[name="daterange"]').daterangepicker({ opens: 'left' });
@if(request('daterange') == null)
    $('input[name=daterange]').val('');
@endif
$('.reset-filter').on('click', function() {
    window.location.href = "{{ route('user.withdraw.log') }}";
});
$('#limitSelect').on('change', function() {
    const url = new URL(window.location.href);
    url.searchParams.set('limit', $(this).val());
    window.location.href = url.toString();
});
</script>
@endpush
