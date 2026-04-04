@extends('frontend::layouts.app')
@section('title', 'Demande envoyée')

@section('content')
<section class="section-space">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-7 text-center">

                <div class="confirmation-card">
                    <div class="confirmation-icon">
                        <i data-lucide="circle-check-big"></i>
                    </div>
                    <h2>Demande envoyée !</h2>
                    <p class="text-muted mb-4">
                        Votre demande de prêt a bien été reçue. Notre équipe l'examinera dans les 24-48 heures et vous contactera par email à <strong>{{ $loanRequest->email }}</strong>.
                    </p>

                    <div class="ref-box mb-4">
                        <div class="ref-label">Numéro de référence</div>
                        <div class="ref-value">{{ $loanRequest->reference }}</div>
                        <div class="ref-hint">Conservez ce numéro pour le suivi de votre demande.</div>
                    </div>

                    <div class="summary-grid mb-4">
                        <div class="summary-item">
                            <span class="s-label">Type de prêt</span>
                            <span class="s-value">{{ $loanRequest->loan_type }}</span>
                        </div>
                        <div class="summary-item">
                            <span class="s-label">Montant demandé</span>
                            <span class="s-value">{{ setting('currency_symbol','global') }}{{ number_format($loanRequest->amount, 2) }}</span>
                        </div>
                        <div class="summary-item">
                            <span class="s-label">Durée</span>
                            <span class="s-value">{{ $loanRequest->duration_months }} mois</span>
                        </div>
                        <div class="summary-item">
                            <span class="s-label">Statut</span>
                            <span class="s-value"><span class="badge bg-warning text-dark">En attente</span></span>
                        </div>
                    </div>

                    <div class="d-flex gap-3 justify-content-center">
                        <a href="{{ route('home') }}" class="site-btn secondary-btn">
                            <i data-lucide="home"></i> Retour à l'accueil
                        </a>
                        <a href="{{ route('loan-request.create') }}" class="site-btn primary-btn">
                            <i data-lucide="plus-circle"></i> Nouvelle demande
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

<style>
.confirmation-card { background:#fff; border:1px solid rgba(0,0,0,.07); border-radius:20px; padding:48px 36px; }
.dark .confirmation-card { background:rgba(255,255,255,.04); border-color:rgba(255,255,255,.08); }
.confirmation-icon { width:80px; height:80px; border-radius:50%; background:rgba(34,197,94,.12); display:flex; align-items:center; justify-content:center; margin:0 auto 24px; color:#22c55e; }
.confirmation-icon svg { width:42px; height:42px; }
.confirmation-card h2 { font-weight:800; margin-bottom:12px; }
.ref-box { background:rgba(79,70,229,.06); border:1px dashed rgba(79,70,229,.3); border-radius:12px; padding:20px; }
.dark .ref-box { background:rgba(79,70,229,.12); }
.ref-label { font-size:12px; color:#9ca3af; text-transform:uppercase; letter-spacing:.05em; margin-bottom:4px; }
.ref-value { font-size:1.8rem; font-weight:800; color:var(--clr-theme-1,#4f46e5); font-family:monospace; }
.ref-hint { font-size:12px; color:#9ca3af; margin-top:6px; }
.summary-grid { display:grid; grid-template-columns:1fr 1fr; gap:12px; text-align:left; }
.summary-item { background:rgba(0,0,0,.03); border-radius:10px; padding:14px 16px; }
.dark .summary-item { background:rgba(255,255,255,.04); }
.s-label { display:block; font-size:12px; color:#9ca3af; margin-bottom:4px; }
.s-value { font-weight:700; font-size:15px; }
</style>
@endsection
