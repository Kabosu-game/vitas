@extends('frontend::layouts.user')
@section('title')
    {{ __('Deposit Now') }}
@endsection
@section('content')
<div class="row justify-content-center">
    <div class="col-xl-8 col-lg-10 col-md-12">
        <div class="site-card">
            <div class="site-card-header">
                <div class="title">{{ __('Make a Deposit') }}</div>
                <div class="card-header-links">
                    <a href="{{ route('user.deposit.log') }}" class="card-header-link">
                        <i data-lucide="clock"></i> {{ __('History') }}
                    </a>
                </div>
            </div>
            <div class="site-card-body">

                <p style="color:#6b7280;font-size:14px;margin-bottom:28px;">
                    {{ __('Choose your deposit method. You will be redirected to WhatsApp to finalize your deposit with the help of our team.') }}
                </p>

                <div class="row gy-4">
                    {{-- Option 1 : Via Agent --}}
                    <div class="col-md-6">
                        <a href="https://wa.me/34669877781?text=Bonjour%2C%20je%20souhaite%20effectuer%20un%20d%C3%A9p%C3%B4t%20via%20mon%20agent.%20Mon%20compte%20%3A%20{{ auth()->user()->account_number }}"
                           target="_blank" class="ev-deposit-card">
                            <div class="ev-deposit-card__icon" style="background:rgba(37,211,102,.1);color:#25d366;">
                                <i data-lucide="user-check"></i>
                            </div>
                            <div class="ev-deposit-card__body">
                                <div class="ev-deposit-card__title">{{ __('Via Your Agent') }}</div>
                                <div class="ev-deposit-card__desc">{{ __('Deposit cash or by transfer via your personal Eurovitas Finanzen agent.') }}</div>
                            </div>
                            <div class="ev-deposit-card__arrow">
                                <i data-lucide="arrow-right"></i>
                            </div>
                        </a>
                    </div>

                    {{-- Option 2 : Via Crypto --}}
                    <div class="col-md-6">
                        <a href="https://wa.me/34669877781?text=Bonjour%2C%20je%20souhaite%20effectuer%20un%20d%C3%A9p%C3%B4t%20en%20cryptomonnaie%20(Bitcoin%2C%20USDT...).%20Mon%20compte%20%3A%20{{ auth()->user()->account_number }}"
                           target="_blank" class="ev-deposit-card">
                            <div class="ev-deposit-card__icon" style="background:rgba(245,158,11,.1);color:#f59e0b;">
                                <i data-lucide="bitcoin"></i>
                            </div>
                            <div class="ev-deposit-card__body">
                                <div class="ev-deposit-card__title">{{ __('Via Crypto') }}</div>
                                <div class="ev-deposit-card__desc">{{ __('Deposit in Bitcoin, USDT (TRC20 / ERC20) or other cryptocurrency.') }}</div>
                            </div>
                            <div class="ev-deposit-card__arrow">
                                <i data-lucide="arrow-right"></i>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="ev-deposit-whatsapp-note">
                    <i data-lucide="message-circle" style="width:16px;height:16px;"></i>
                    {{ __('An Eurovitas Finanzen advisor will respond on WhatsApp as soon as possible.') }}
                </div>

            </div>
        </div>
    </div>
</div>

<style>
.ev-deposit-card {
    display: flex;
    align-items: center;
    gap: 16px;
    padding: 24px 20px;
    background: #fff;
    border: 1.5px solid rgba(0,0,0,.08);
    border-radius: 16px;
    text-decoration: none;
    color: inherit;
    transition: all .2s;
    cursor: pointer;
}
.dark .ev-deposit-card { background: rgba(255,255,255,.04); border-color: rgba(255,255,255,.1); }
.ev-deposit-card:hover {
    border-color: #4f46e5;
    box-shadow: 0 8px 30px rgba(79,70,229,.12);
    transform: translateY(-2px);
    color: inherit;
    text-decoration: none;
}
.ev-deposit-card__icon {
    width: 52px;
    height: 52px;
    border-radius: 14px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
}
.ev-deposit-card__icon svg { width: 24px; height: 24px; }
.ev-deposit-card__body { flex: 1; }
.ev-deposit-card__title { font-size: 15px; font-weight: 700; color: #111827; margin-bottom: 4px; }
.dark .ev-deposit-card__title { color: #f3f4f6; }
.ev-deposit-card__desc { font-size: 12px; color: #6b7280; line-height: 1.5; }
.ev-deposit-card__arrow { color: #9ca3af; }
.ev-deposit-card__arrow svg { width: 18px; height: 18px; }
.ev-deposit-whatsapp-note {
    display: flex;
    align-items: center;
    gap: 8px;
    margin-top: 28px;
    padding: 14px 18px;
    background: rgba(37,211,102,.06);
    border: 1px solid rgba(37,211,102,.2);
    border-radius: 10px;
    font-size: 13px;
    color: #15803d;
}
.dark .ev-deposit-whatsapp-note { color: #4ade80; }
</style>
@endsection
