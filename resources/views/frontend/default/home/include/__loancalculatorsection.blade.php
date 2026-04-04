<!-- Loan calculator area start -->
<section class="loan-calculator-area position-relative z-index-11 section-space">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section-title-wrapper section-title-space text-center">
                    <span data-aos="fade-up" data-aos-duration="1000" class="section-subtitle">Simulation gratuite</span>
                    <h2 data-aos="fade-up" data-aos-duration="1500" class="section-title">Calculateur de Prêt Eurovitas Finanzen</h2>
                </div>
            </div>
        </div>
        <div class="row justify-content-center" data-aos="fade-up" data-aos-duration="2000">
            <div class="col-xl-8 col-lg-10">
                <div class="calc-card">

                    {{-- Montant --}}
                    <div class="calc-field">
                        <div class="calc-label-row">
                            <label>Montant du prêt</label>
                            <span class="calc-badge" id="displayAmount">10 000 €</span>
                        </div>
                        <input type="range" id="rangeAmount" min="1000" max="100000" step="500" value="10000" class="calc-range">
                        <div class="calc-range-limits"><span>1 000 €</span><span>100 000 €</span></div>
                    </div>

                    {{-- Durée --}}
                    <div class="calc-field">
                        <div class="calc-label-row">
                            <label>Durée</label>
                            <span class="calc-badge" id="displayDuration">24 mois</span>
                        </div>
                        <input type="range" id="rangeDuration" min="6" max="120" step="6" value="24" class="calc-range">
                        <div class="calc-range-limits"><span>6 mois</span><span>120 mois</span></div>
                    </div>

                    {{-- Taux --}}
                    <div class="calc-field">
                        <div class="calc-label-row">
                            <label>Taux d'intérêt annuel</label>
                            <span class="calc-badge" id="displayRate">5,0 %</span>
                        </div>
                        <input type="range" id="rangeRate" min="1" max="25" step="0.5" value="5" class="calc-range">
                        <div class="calc-range-limits"><span>1 %</span><span>25 %</span></div>
                    </div>

                    <div class="calc-divider"></div>

                    {{-- Résultats --}}
                    <div class="calc-results">
                        <div class="calc-result-item featured">
                            <div class="calc-result-label">Mensualité</div>
                            <div class="calc-result-value" id="resMensualite">—</div>
                        </div>
                        <div class="calc-result-item">
                            <div class="calc-result-label">Total des intérêts</div>
                            <div class="calc-result-value" id="resInterets">—</div>
                        </div>
                        <div class="calc-result-item">
                            <div class="calc-result-label">Total à rembourser</div>
                            <div class="calc-result-value" id="resTotal">—</div>
                        </div>
                    </div>

                    <div class="text-center mt-40">
                        <a href="{{ route('register') }}" class="tp-btn">Faire une demande de prêt</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Loan calculator area end -->

<style>
.calc-card {
    background: var(--clr-common-white, #fff);
    border: 1px solid rgba(0,0,0,.08);
    border-radius: 16px;
    padding: 40px;
    box-shadow: 0 4px 32px rgba(0,0,0,.06);
}
.dark .calc-card {
    background: var(--clr-bg-2, #1e2235);
    border-color: rgba(255,255,255,.08);
}
.calc-field { margin-bottom: 32px; }
.calc-label-row { display:flex; justify-content:space-between; align-items:center; margin-bottom:12px; }
.calc-label-row label { font-weight:600; font-size:15px; margin:0; }
.calc-badge {
    background: var(--clr-theme-1, #4f46e5);
    color: #fff;
    padding: 4px 14px;
    border-radius: 20px;
    font-weight: 700;
    font-size: 14px;
    min-width: 90px;
    text-align: center;
}
.calc-range {
    -webkit-appearance: none;
    width: 100%;
    height: 6px;
    border-radius: 3px;
    background: #e5e7eb;
    outline: none;
    cursor: pointer;
}
.dark .calc-range { background: rgba(255,255,255,.15); }
.calc-range::-webkit-slider-thumb {
    -webkit-appearance: none;
    width: 20px;
    height: 20px;
    border-radius: 50%;
    background: var(--clr-theme-1, #4f46e5);
    cursor: pointer;
    box-shadow: 0 2px 8px rgba(79,70,229,.4);
}
.calc-range::-moz-range-thumb {
    width: 20px;
    height: 20px;
    border-radius: 50%;
    background: var(--clr-theme-1, #4f46e5);
    cursor: pointer;
    border: none;
    box-shadow: 0 2px 8px rgba(79,70,229,.4);
}
.calc-range-limits { display:flex; justify-content:space-between; font-size:12px; color:#9ca3af; margin-top:6px; }
.calc-divider { border:none; border-top:1px solid rgba(0,0,0,.08); margin:8px 0 32px; }
.dark .calc-divider { border-color:rgba(255,255,255,.08); }
.calc-results { display:grid; grid-template-columns:1fr 1fr 1fr; gap:16px; }
@media(max-width:600px){ .calc-results{ grid-template-columns:1fr; } }
.calc-result-item {
    background: #f9fafb;
    border-radius: 12px;
    padding: 20px 16px;
    text-align: center;
    border: 1px solid #e5e7eb;
}
.dark .calc-result-item { background:rgba(255,255,255,.04); border-color:rgba(255,255,255,.08); }
.calc-result-item.featured {
    background: var(--clr-theme-1, #4f46e5);
    border-color: transparent;
}
.calc-result-label { font-size:12px; text-transform:uppercase; letter-spacing:.05em; color:#6b7280; margin-bottom:8px; }
.calc-result-item.featured .calc-result-label { color:rgba(255,255,255,.8); }
.calc-result-value { font-size:22px; font-weight:700; color:#111827; }
.dark .calc-result-value { color:#f3f4f6; }
.calc-result-item.featured .calc-result-value { color:#fff; font-size:26px; }
.mt-40 { margin-top: 40px; }
</style>

@push('js')
<script>
(function() {
    var fmt = function(n) {
        return n.toLocaleString('fr-FR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' €';
    };

    function calc() {
        var P = parseFloat(document.getElementById('rangeAmount').value);
        var n = parseInt(document.getElementById('rangeDuration').value);
        var r = parseFloat(document.getElementById('rangeRate').value) / 100 / 12;

        var mensualite, totalRembourse, totalInterets;

        if (r === 0) {
            mensualite = P / n;
        } else {
            mensualite = P * r * Math.pow(1 + r, n) / (Math.pow(1 + r, n) - 1);
        }

        totalRembourse = mensualite * n;
        totalInterets  = totalRembourse - P;

        document.getElementById('resMensualite').textContent = fmt(mensualite);
        document.getElementById('resInterets').textContent   = fmt(totalInterets);
        document.getElementById('resTotal').textContent      = fmt(totalRembourse);

        document.getElementById('displayAmount').textContent =
            parseFloat(document.getElementById('rangeAmount').value).toLocaleString('fr-FR') + ' €';
        document.getElementById('displayDuration').textContent =
            document.getElementById('rangeDuration').value + ' mois';
        document.getElementById('displayRate').textContent =
            parseFloat(document.getElementById('rangeRate').value).toLocaleString('fr-FR', {minimumFractionDigits:1}) + ' %';
    }

    document.getElementById('rangeAmount').addEventListener('input', calc);
    document.getElementById('rangeDuration').addEventListener('input', calc);
    document.getElementById('rangeRate').addEventListener('input', calc);

    calc();
})();
</script>
@endpush
