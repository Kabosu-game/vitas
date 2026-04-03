@extends('frontend::layouts.user')
@section('title') Demande de Retrait @endsection

@push('style')
<style>
/* ─── Balance header ─── */
.wd-header {
    background: linear-gradient(135deg, #1a1a2e 0%, #16213e 50%, #0f3460 100%);
    border-radius: 18px;
    padding: 28px 32px;
    margin-bottom: 24px;
    color: #fff;
    display: flex;
    justify-content: space-between;
    align-items: center;
    position: relative;
    overflow: hidden;
}
.wd-header::before {
    content: '';
    position: absolute;
    top: -50px; right: -50px;
    width: 180px; height: 180px;
    border-radius: 50%;
    background: rgba(255,255,255,.04);
}
.wd-header__left { position: relative; z-index: 1; }
.wd-header__label {
    font-size: 11px;
    text-transform: uppercase;
    letter-spacing: .12em;
    color: rgba(255,255,255,.55);
    margin-bottom: 6px;
}
.wd-header__amount {
    font-size: 36px;
    font-weight: 800;
    letter-spacing: -1px;
}
.wd-header__right { position: relative; z-index: 1; text-align: right; }
.wd-header__name { font-size: 13px; color: rgba(255,255,255,.6); margin-bottom: 2px; }
.wd-header__account { font-size: 14px; font-weight: 600; }

/* ─── Alert info ─── */
.wd-alert {
    display: flex;
    align-items: flex-start;
    gap: 12px;
    background: rgba(59,130,246,.06);
    border-left: 4px solid #3b82f6;
    border-radius: 0 10px 10px 0;
    padding: 14px 18px;
    font-size: 13px;
    color: #1e40af;
    margin-bottom: 28px;
    line-height: 1.6;
}
.dark .wd-alert { color: #93c5fd; background: rgba(59,130,246,.08); }
.wd-alert svg { width: 16px; height: 16px; flex-shrink: 0; margin-top: 2px; }

/* ─── Section title ─── */
.wd-section-title {
    font-size: 11px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: .1em;
    color: #9ca3af;
    margin-bottom: 14px;
    padding-bottom: 8px;
    border-bottom: 1px solid rgba(0,0,0,.06);
}
.dark .wd-section-title { border-color: rgba(255,255,255,.06); }

/* ─── Input field ─── */
.wd-field { margin-bottom: 20px; }
.wd-field label {
    display: block;
    font-size: 13px;
    font-weight: 600;
    color: #374151;
    margin-bottom: 7px;
}
.dark .wd-field label { color: #d1d5db; }
.wd-field .req { color: #ef4444; margin-left: 2px; }
.wd-field .opt { color: #9ca3af; font-weight: 400; font-size: 12px; }
.wd-input {
    width: 100%;
    height: 48px;
    padding: 0 14px;
    background: #f9fafb;
    border: 1.5px solid #e5e7eb;
    border-radius: 10px;
    font-size: 14px;
    color: #111827;
    transition: border-color .2s, box-shadow .2s;
    outline: none;
}
.dark .wd-input { background: rgba(255,255,255,.05); border-color: rgba(255,255,255,.1); color: #f3f4f6; }
.wd-input:focus { border-color: #4f46e5; box-shadow: 0 0 0 3px rgba(79,70,229,.12); background: #fff; }
.dark .wd-input:focus { background: rgba(255,255,255,.08); }
.wd-input::placeholder { color: #9ca3af; }
.wd-input-mono { font-family: 'Courier New', monospace; letter-spacing: .06em; }
.wd-textarea {
    width: 100%;
    padding: 12px 14px;
    background: #f9fafb;
    border: 1.5px solid #e5e7eb;
    border-radius: 10px;
    font-size: 14px;
    color: #111827;
    resize: vertical;
    min-height: 80px;
    transition: border-color .2s, box-shadow .2s;
    outline: none;
}
.dark .wd-textarea { background: rgba(255,255,255,.05); border-color: rgba(255,255,255,.1); color: #f3f4f6; }
.wd-textarea:focus { border-color: #4f46e5; box-shadow: 0 0 0 3px rgba(79,70,229,.12); background: #fff; }
.wd-textarea::placeholder { color: #9ca3af; }

/* ─── Amount field with suffix ─── */
.wd-amount-wrap { position: relative; }
.wd-amount-wrap .wd-input { padding-right: 60px; }
.wd-amount-suffix {
    position: absolute;
    right: 0; top: 0; bottom: 0;
    display: flex; align-items: center;
    padding: 0 16px;
    font-size: 13px;
    font-weight: 700;
    color: #6b7280;
    border-left: 1.5px solid #e5e7eb;
}
.dark .wd-amount-suffix { border-color: rgba(255,255,255,.1); }
.wd-amount-hint { font-size: 12px; color: #9ca3af; margin-top: 5px; }

/* ─── Summary box ─── */
.wd-summary {
    background: #f9fafb;
    border: 1.5px solid #e5e7eb;
    border-radius: 12px;
    overflow: hidden;
    margin-top: 8px;
}
.dark .wd-summary { background: rgba(255,255,255,.03); border-color: rgba(255,255,255,.08); }
.wd-summary__row {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 13px 18px;
    font-size: 14px;
    color: #4b5563;
    border-bottom: 1px solid #f0f0f0;
}
.dark .wd-summary__row { color: #9ca3af; border-color: rgba(255,255,255,.05); }
.wd-summary__row:last-child { border-bottom: none; background: rgba(79,70,229,.04); font-size: 15px; font-weight: 700; color: #111827; }
.dark .wd-summary__row:last-child { color: #f3f4f6; }

/* ─── Submit button ─── */
.wd-btn {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    width: 100%;
    padding: 15px 24px;
    background: linear-gradient(135deg, #4f46e5, #6366f1);
    color: #fff;
    border: none;
    border-radius: 12px;
    font-size: 15px;
    font-weight: 700;
    cursor: pointer;
    margin-top: 24px;
    transition: opacity .2s, transform .15s;
}
.wd-btn:hover { opacity: .92; transform: translateY(-1px); }
.wd-btn svg { width: 18px; height: 18px; }

/* ─── Steps sidebar ─── */
.wd-steps { display: flex; flex-direction: column; gap: 0; }
.wd-step {
    display: flex;
    align-items: flex-start;
    gap: 16px;
    padding: 18px 0;
    border-bottom: 1px solid rgba(0,0,0,.06);
    position: relative;
}
.dark .wd-step { border-color: rgba(255,255,255,.06); }
.wd-step:last-child { border-bottom: none; padding-bottom: 0; }
.wd-step:first-child { padding-top: 0; }
.wd-step__num {
    width: 36px; height: 36px;
    border-radius: 50%;
    display: flex; align-items: center; justify-content: center;
    font-size: 13px; font-weight: 800;
    flex-shrink: 0;
}
.wd-step__title { font-size: 14px; font-weight: 700; margin-bottom: 3px; }
.wd-step__desc { font-size: 12px; color: #9ca3af; line-height: 1.5; }

/* ─── Info box sidebar ─── */
.wd-infobox {
    background: #fff;
    border: 1px solid rgba(0,0,0,.07);
    border-radius: 16px;
    padding: 24px;
}
.dark .wd-infobox { background: rgba(255,255,255,.03); border-color: rgba(255,255,255,.08); }
.wd-infobox__title {
    font-size: 14px;
    font-weight: 700;
    margin-bottom: 18px;
    padding-bottom: 12px;
    border-bottom: 1px solid rgba(0,0,0,.06);
}
.dark .wd-infobox__title { border-color: rgba(255,255,255,.06); }
</style>
@endpush

@section('content')
<div class="row">

    {{-- ═══ FORMULAIRE ═══ --}}
    <div class="col-xl-8 col-lg-8 col-md-12">

        {{-- Balance header --}}
        <div class="wd-header">
            <div class="wd-header__left">
                <div class="wd-header__label">{{ __('Available Balance') }}</div>
                <div class="wd-header__amount">
                    {{ setting('currency_symbol','global') }}{{ number_format(auth()->user()->balance, 2) }}
                </div>
            </div>
            <div class="wd-header__right">
                <div class="wd-header__name">{{ auth()->user()->full_name }}</div>
                <div class="wd-header__account">N° {{ auth()->user()->account_number }}</div>
            </div>
        </div>

        <div class="site-card">
            <div class="site-card-header">
                <div class="title">{{ __('Bank Transfer Request') }}</div>
                <div class="card-header-links">
                    <a href="{{ route('user.withdraw.log') }}" class="card-header-link">
                        <i data-lucide="clock"></i> {{ __('History') }}
                    </a>
                </div>
            </div>
            <div class="site-card-body">

                <div class="wd-alert">
                    <i data-lucide="info"></i>
                    {{ __('Fill in the bank details of the recipient account. The request remains pending until validated by our team within 24-48 hours.') }}
                </div>

                <form action="{{ route('user.withdraw.bank') }}" method="POST">
                    @csrf

                    <div class="wd-section-title">{{ __('Bank Details') }}</div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="wd-field">
                                <label>{{ __('Account Holder Name') }} <span class="req">*</span></label>
                                <input type="text" name="holder_name" class="wd-input"
                                    value="{{ old('holder_name') }}" placeholder="Jean Dupont" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="wd-field">
                                <label>{{ __('Bank Name') }} <span class="req">*</span></label>
                                <input type="text" name="bank_name" class="wd-input"
                                    value="{{ old('bank_name') }}" placeholder="BNP Paribas, Société Générale..." required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="wd-field">
                                <label>{{ __('IBAN') }} <span class="req">*</span></label>
                                <input type="text" name="iban" class="wd-input wd-input-mono"
                                    value="{{ old('iban') }}" placeholder="FR76 3000 4028 3798 7654 3210 943" required>
                            </div>
                        </div>
                    </div>

                    <div class="wd-section-title mt-2">{{ __('Withdrawal Request') }}</div>

                    <div class="wd-field">
                        <label>{{ __('Amount') }} <span class="req">*</span></label>
                        <div class="wd-amount-wrap">
                            <input type="number" name="amount" id="wdAmount" class="wd-input"
                                value="{{ old('amount') }}" placeholder="0.00"
                                min="1" max="{{ auth()->user()->balance }}" step="0.01" required>
                            <span class="wd-amount-suffix">{{ $currency }}</span>
                        </div>
                        <div class="wd-amount-hint">
                            {{ __('Maximum') }} : <strong>{{ setting('currency_symbol','global') }}{{ number_format(auth()->user()->balance, 2) }}</strong>
                        </div>
                    </div>

                    {{-- Récapitulatif dynamique --}}
                    <div class="wd-summary" id="wdSummary" style="display:none; margin-bottom:4px;">
                        <div class="wd-summary__row">
                            <span>{{ __('Withdrawal Request') }}</span>
                            <span id="sAmount">—</span>
                        </div>
                        <div class="wd-summary__row">
                            <span>{{ __('Processing Fee') }}</span>
                            <span style="color:#10b981;font-weight:600;">{{ __('Free') }}</span>
                        </div>
                        <div class="wd-summary__row">
                            <span>{{ __('Total Deducted') }}</span>
                            <span id="sTotal">—</span>
                        </div>
                    </div>

                    <div class="wd-section-title mt-4">{{ __('Note') }} <span class="opt">({{ __('optional') }})</span></div>

                    <div class="wd-field">
                        <textarea name="note" class="wd-textarea" rows="2"
                            placeholder="Motif, référence de paiement, instructions...">{{ old('note') }}</textarea>
                    </div>

                    <button type="submit" class="wd-btn">
                        <i data-lucide="send"></i>
                        {{ __('Submit Withdrawal Request') }}
                    </button>
                </form>

            </div>
        </div>
    </div>

    {{-- ═══ SIDEBAR ═══ --}}
    <div class="col-xl-4 col-lg-4 col-md-12">
        <div class="wd-infobox">
            <div class="wd-infobox__title">
                <i data-lucide="list-checks" style="width:16px;height:16px;vertical-align:middle;margin-right:6px;color:#4f46e5;"></i>
                {{ __('Processing Steps') }}
            </div>
            <div class="wd-steps">
                <div class="wd-step">
                    <div class="wd-step__num" style="background:rgba(79,70,229,.1);color:#4f46e5;">1</div>
                    <div>
                        <div class="wd-step__title">{{ __('Request Submitted') }}</div>
                        <div class="wd-step__desc">{{ __('Your balance is reserved and the request is sent to our team.') }}</div>
                    </div>
                </div>
                <div class="wd-step">
                    <div class="wd-step__num" style="background:rgba(245,158,11,.1);color:#f59e0b;">2</div>
                    <div>
                        <div class="wd-step__title">{{ __('Verification') }}</div>
                        <div class="wd-step__desc">{{ __('Our team verifies bank details within 24-48 hours.') }}</div>
                    </div>
                </div>
                <div class="wd-step">
                    <div class="wd-step__num" style="background:rgba(16,185,129,.1);color:#10b981;">3</div>
                    <div>
                        <div class="wd-step__title">{{ __('Transfer Executed') }}</div>
                        <div class="wd-step__desc">{{ __('Funds are transferred to your bank account. You receive a notification.') }}</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="wd-infobox mt-4">
            <div class="wd-infobox__title">
                <i data-lucide="shield-check" style="width:16px;height:16px;vertical-align:middle;margin-right:6px;color:#10b981;"></i>
                {{ __('Security and Delays') }}
            </div>
            <div style="display:flex;flex-direction:column;gap:12px;">
                <div style="display:flex;gap:10px;align-items:flex-start;font-size:13px;color:#4b5563;">
                    <i data-lucide="clock" style="width:15px;height:15px;flex-shrink:0;margin-top:1px;color:#6366f1;"></i>
                    <span>{{ __('Processing within 24-48 business hours') }}</span>
                </div>
                <div style="display:flex;gap:10px;align-items:flex-start;font-size:13px;color:#4b5563;">
                    <i data-lucide="lock" style="width:15px;height:15px;flex-shrink:0;margin-top:1px;color:#6366f1;"></i>
                    <span>{{ __('Secure SSL 256-bit connection') }}</span>
                </div>
                <div style="display:flex;gap:10px;align-items:flex-start;font-size:13px;color:#4b5563;">
                    <i data-lucide="ban" style="width:15px;height:15px;flex-shrink:0;margin-top:1px;color:#6366f1;"></i>
                    <span>{{ __('Zero fees on outgoing transfers') }}</span>
                </div>
                <div style="display:flex;gap:10px;align-items:flex-start;font-size:13px;color:#4b5563;">
                    <i data-lucide="undo-2" style="width:15px;height:15px;flex-shrink:0;margin-top:1px;color:#6366f1;"></i>
                    <span>{{ __('Automatic refund if refused') }}</span>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection

@section('script')
<script>
"use strict";
const sym = @json(setting('currency_symbol','global'));
const cur = @json($currency);

$('#wdAmount').on('input', function() {
    const val = parseFloat($(this).val());
    if (isNaN(val) || val <= 0) { $('#wdSummary').hide(); return; }
    const fmt = sym + val.toFixed(2) + ' ' + cur;
    $('#sAmount').text(fmt);
    $('#sTotal').text(fmt);
    $('#wdSummary').show();
});
</script>
@endsection
