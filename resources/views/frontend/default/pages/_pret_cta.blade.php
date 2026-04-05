<div class="pret-cta-banner mt-60" data-aos="fade-up">
    <div class="row align-items-center gy-20">
        <div class="col-lg-8">
            <h3 class="pret-cta-title">Prêt à déposer votre demande ?</h3>
            <p class="pret-cta-desc">Complétez votre dossier en ligne en moins de 10 minutes. Réponse de principe sous 24h, sans engagement.</p>
        </div>
        <div class="col-lg-4 text-lg-end">
            <a href="{{ route('loan-request.create') }}" class="tp-btn">Faire une demande</a>
        </div>
    </div>
</div>

<style>
.pret-cta-banner { background:linear-gradient(135deg,var(--clr-theme-1,#4f46e5),#7c3aed); border-radius:16px; padding:36px 40px; margin-top:60px; }
.pret-cta-title { color:#fff; font-size:22px; font-weight:700; margin-bottom:8px; }
.pret-cta-desc { color:rgba(255,255,255,.85); font-size:15px; margin:0; }
.mt-60 { margin-top:60px; }
.gy-20 { row-gap:20px; }
</style>
