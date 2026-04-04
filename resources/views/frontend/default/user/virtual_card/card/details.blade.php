@extends('frontend::layouts.user')
@section('title') Détails de la carte @endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-xl-6 col-lg-7">
        <div class="site-card">
            <div class="site-card-header">
                <a href="{{ route('user.card.index') }}" class="me-2" style="color:inherit"><i data-lucide="arrow-left"></i></a>
                <div class="title-small d-inline">Détails de la carte</div>
            </div>
            <div class="site-card-body">

                {{-- Visual card --}}
                <div class="vc-card-visual mb-4 {{ $card->statusValue === 'pending' ? 'pending' : ($card->statusValue === 'inactive' ? 'inactive' : '') }}">
                    <div class="vc-card-brand">Eurovitas Finanzen</div>
                    <div class="vc-card-number">
                        @if($card->statusValue === 'pending')
                            •••• •••• •••• ••••
                        @else
                            {{ implode(' ', str_split($card->card_number, 4)) }}
                        @endif
                    </div>
                    <div class="vc-card-bottom">
                        <div>
                            <div class="vc-card-label">Titulaire</div>
                            <div class="vc-card-value">{{ strtoupper($card->cardholder_name ?? '—') }}</div>
                        </div>
                        <div>
                            <div class="vc-card-label">Expiration</div>
                            <div class="vc-card-value">
                                @if($card->statusValue === 'pending') --/---- @else {{ str_pad($card->expiration_month, 2, '0', STR_PAD_LEFT) }}/{{ $card->expiration_year }} @endif
                            </div>
                        </div>
                        <div>
                            <div class="vc-card-label">CVV</div>
                            <div class="vc-card-value">
                                @if($card->statusValue === 'pending') ••• @else {{ $card->cvc }} @endif
                            </div>
                        </div>
                        <div>
                            @if($card->statusValue === 'pending')
                                <span class="vc-badge pending">En attente d'activation</span>
                            @elseif($card->statusValue === 'active')
                                <span class="vc-badge active">Active</span>
                            @else
                                <span class="vc-badge inactive">Inactive</span>
                            @endif
                        </div>
                    </div>
                </div>

                {{-- Info table --}}
                <table class="table table-borderless" style="font-size:14px">
                    <tr><th style="width:160px;color:#9ca3af;font-weight:500">Référence</th><td><code>{{ $card->card_id }}</code></td></tr>
                    <tr><th style="color:#9ca3af;font-weight:500">Devise</th><td>{{ $card->currency }}</td></tr>
                    <tr><th style="color:#9ca3af;font-weight:500">Créée le</th><td>{{ $card->created_at->format('d/m/Y H:i') }}</td></tr>
                    @if($card->statusValue !== 'pending')
                    <tr><th style="color:#9ca3af;font-weight:500">4 derniers chiffres</th><td><strong>•••• {{ $card->last_four_digits }}</strong></td></tr>
                    @endif
                </table>

                @if($card->statusValue === 'pending')
                <div class="alert" style="background:rgba(245,158,11,.08);border:1px solid rgba(245,158,11,.3);border-radius:10px;font-size:13px;color:#92400e">
                    <i data-lucide="clock" style="width:14px;height:14px;margin-right:6px"></i>
                    Votre carte est en cours d'activation. Notre équipe la validera sous 24h. Vous serez notifié par email.
                </div>
                @endif

            </div>
        </div>
    </div>
</div>

<style>
.vc-card-visual {
    background: linear-gradient(135deg, #1a1a2e 0%, #16213e 60%, #0f3460 100%);
    border-radius:16px; padding:24px 28px; color:#fff; position:relative; overflow:hidden;
}
.vc-card-visual.pending { background: linear-gradient(135deg, #374151 0%, #4b5563 100%); }
.vc-card-visual.inactive { background: linear-gradient(135deg, #6b7280 0%, #9ca3af 100%); }
.vc-card-visual::before { content:''; position:absolute; top:-30px; right:-30px; width:140px; height:140px; border-radius:50%; background:rgba(255,255,255,.05); }
.vc-card-brand { font-size:15px; font-weight:800; letter-spacing:1px; margin-bottom:22px; opacity:.9; }
.vc-card-number { font-size:20px; font-weight:700; letter-spacing:4px; font-family:monospace; margin-bottom:22px; }
.vc-card-bottom { display:flex; justify-content:space-between; align-items:flex-end; flex-wrap:wrap; gap:10px; }
.vc-card-label { font-size:10px; text-transform:uppercase; letter-spacing:.08em; color:rgba(255,255,255,.5); margin-bottom:2px; }
.vc-card-value { font-size:13px; font-weight:700; color:#fff; }
.vc-badge { display:inline-block; padding:3px 10px; border-radius:20px; font-size:11px; font-weight:700; }
.vc-badge.active { background:rgba(34,197,94,.2); color:#4ade80; }
.vc-badge.pending { background:rgba(245,158,11,.2); color:#fbbf24; }
.vc-badge.inactive { background:rgba(239,68,68,.2); color:#f87171; }
</style>
@endsection
