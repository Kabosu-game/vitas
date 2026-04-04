@extends('frontend::layouts.user')
@section('title') Carte Virtuelle @endsection

@section('content')
<div class="row gy-4">

    {{-- Demande de carte --}}
    <div class="col-xl-4 col-lg-5">
        <div class="site-card h-100">
            <div class="site-card-header vc-toggle-header" id="vc-form-toggle" style="cursor:pointer">
                <div class="title-small">Nouvelle carte virtuelle</div>
                <span class="vc-toggle-icon ms-auto d-lg-none"><i data-lucide="chevron-down" id="vc-chevron" style="width:18px;height:18px;transition:transform .3s"></i></span>
            </div>
            <div class="site-card-body" id="vc-form-body">

                <div class="vc-fee-info mb-4">
                    <div class="vc-fee-icon"><i data-lucide="credit-card"></i></div>
                    <div>
                        <div class="vc-fee-label">Frais de création</div>
                        <div class="vc-fee-amount">€ 10,00</div>
                        <div class="vc-fee-note">Déduit immédiatement de votre solde principal</div>
                    </div>
                </div>

                @if(auth()->user()->balance < 10)
                <div class="alert alert-danger" style="font-size:13px;border-radius:10px">
                    <i data-lucide="alert-triangle" style="width:14px;height:14px;margin-right:6px"></i>
                    Solde insuffisant. Vous avez besoin d'au moins <strong>€ 10,00</strong>.
                </div>
                @else
                <form action="{{ route('user.card.store') }}" method="POST">
                    @csrf
                    <div class="inputs mb-3">
                        <label class="input-label">Nom sur la carte <span class="required">*</span></label>
                        <input type="text" name="cardholder_name" class="form-control"
                               value="{{ old('cardholder_name', auth()->user()->full_name) }}"
                               placeholder="Ex : JEAN DUPONT" style="text-transform:uppercase" required>
                        <small class="text-muted">Entrez votre nom tel qu'il apparaîtra sur la carte.</small>
                    </div>

                    <div class="vc-confirm-row mb-4">
                        <span>Solde disponible</span>
                        <span class="fw-bold">{{ $currencySymbol }}{{ number_format(auth()->user()->balance, 2) }}</span>
                    </div>
                    <div class="vc-confirm-row mb-4">
                        <span>Frais de carte</span>
                        <span class="fw-bold text-danger">- {{ $currencySymbol }}10,00</span>
                    </div>
                    <div class="vc-confirm-row mb-4" style="border-top:1px solid rgba(0,0,0,.08);padding-top:10px">
                        <span style="font-weight:700">Solde après</span>
                        <span class="fw-bold">{{ $currencySymbol }}{{ number_format(auth()->user()->balance - 10, 2) }}</span>
                    </div>

                    <button type="submit" class="site-btn-sm primary-btn w-100">
                        <i data-lucide="credit-card"></i> Demander ma carte
                    </button>
                </form>
                @endif

            </div>
        </div>
    </div>

    {{-- Liste des cartes --}}
    <div class="col-xl-8 col-lg-7">
        <div class="site-card">
            <div class="site-card-header">
                <div class="title-small">Mes cartes</div>
            </div>
            <div class="site-card-body p-0 overflow-x-auto">
                @forelse($cards as $card)
                <div class="vc-card-item {{ $card->statusValue }}">
                    <div class="vc-card-visual">
                        <div class="vc-card-brand">Eurovitas Finanzen</div>
                        <div class="vc-card-number">
                            @if($card->statusValue === 'pending')
                                •••• •••• •••• ••••
                            @else
                                {{ chunk_split($card->card_number, 4, ' ') }}
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
                                    @if($card->statusValue === 'pending')
                                        --/----
                                    @else
                                        {{ str_pad($card->expiration_month, 2, '0', STR_PAD_LEFT) }}/{{ $card->expiration_year }}
                                    @endif
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
                                    <span class="vc-badge pending">En attente</span>
                                @elseif($card->statusValue === 'active')
                                    <span class="vc-badge active">Active</span>
                                @else
                                    <span class="vc-badge inactive">Inactive</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="no-data-found">Aucune carte. Faites votre première demande →</div>
                @endforelse
            </div>
        </div>
    </div>

</div>

<style>
.vc-fee-info { display:flex; gap:14px; align-items:center; background:rgba(79,70,229,.05); border:1px solid rgba(79,70,229,.15); border-radius:12px; padding:16px; }
.vc-fee-icon { width:44px; height:44px; background:rgba(79,70,229,.1); border-radius:10px; display:flex; align-items:center; justify-content:center; color:var(--clr-theme-1,#4f46e5); flex-shrink:0; }
.vc-fee-icon svg { width:22px; height:22px; }
.vc-fee-label { font-size:11px; color:#9ca3af; text-transform:uppercase; letter-spacing:.06em; }
.vc-fee-amount { font-size:22px; font-weight:800; color:var(--clr-theme-1,#4f46e5); line-height:1.2; }
.vc-fee-note { font-size:11px; color:#6b7280; margin-top:2px; }
.vc-confirm-row { display:flex; justify-content:space-between; font-size:13px; color:#374151; }
.dark .vc-confirm-row { color:#e5e7eb; }

/* Card visual */
.vc-card-item { padding:16px 20px; border-bottom:1px solid rgba(0,0,0,.06); }
.dark .vc-card-item { border-color:rgba(255,255,255,.06); }
.vc-card-item:last-child { border-bottom:none; }
.vc-card-visual {
    background: linear-gradient(135deg, #1a1a2e 0%, #16213e 60%, #0f3460 100%);
    border-radius:16px; padding:22px 24px; color:#fff; position:relative; overflow:hidden;
}
.vc-card-item.pending .vc-card-visual { background: linear-gradient(135deg, #374151 0%, #4b5563 100%); }
.vc-card-item.inactive .vc-card-visual { background: linear-gradient(135deg, #6b7280 0%, #9ca3af 100%); }
.vc-card-visual::before { content:''; position:absolute; top:-30px; right:-30px; width:120px; height:120px; border-radius:50%; background:rgba(255,255,255,.05); }
.vc-card-brand { font-size:14px; font-weight:800; letter-spacing:1px; margin-bottom:20px; opacity:.9; }
.vc-card-number { font-size:18px; font-weight:700; letter-spacing:3px; font-family:monospace; margin-bottom:20px; }
.vc-card-bottom { display:flex; justify-content:space-between; align-items:flex-end; flex-wrap:wrap; gap:10px; }
.vc-card-label { font-size:10px; text-transform:uppercase; letter-spacing:.08em; color:rgba(255,255,255,.5); margin-bottom:2px; }
.vc-card-value { font-size:13px; font-weight:700; color:#fff; }
.vc-badge { display:inline-block; padding:3px 10px; border-radius:20px; font-size:11px; font-weight:700; }
.vc-badge.active { background:rgba(34,197,94,.2); color:#4ade80; }
.vc-badge.pending { background:rgba(245,158,11,.2); color:#fbbf24; }
.vc-badge.inactive { background:rgba(239,68,68,.2); color:#f87171; }
@media (max-width: 991px) {
    #vc-form-body { display: none; }
    #vc-form-body.open { display: block; }
    .vc-toggle-header { user-select: none; }
}
</style>
<script>
(function () {
    var header  = document.getElementById('vc-form-toggle');
    var body    = document.getElementById('vc-form-body');
    var chevron = document.getElementById('vc-chevron');
    if (!header || !body) return;

    function isMobile() { return window.innerWidth < 992; }

    header.addEventListener('click', function () {
        if (!isMobile()) return;
        var open = body.classList.toggle('open');
        if (chevron) chevron.style.transform = open ? 'rotate(180deg)' : 'rotate(0deg)';
    });

    window.addEventListener('resize', function () {
        if (!isMobile()) {
            body.classList.remove('open');
            body.style.display = '';
            if (chevron) chevron.style.transform = 'rotate(0deg)';
        }
    });
})();
</script>
@endsection
