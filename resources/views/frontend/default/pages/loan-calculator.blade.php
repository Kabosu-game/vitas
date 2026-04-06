@extends('frontend::pages.index')

@section('title') {{ __("loan_calculator_title") }} @endsection
@section('meta_keywords') {{ __("loan_calculator_keywords") }} @endsection
@section('meta_description') {{ __("loan_calculator_description") }} @endsection

@section('page-content')
<section class="section-space position-relative">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-8 col-lg-10">

                <div class="section-title-wrapper text-center mb-50">
                    <span class="section-subtitle">{{ __("loan_calculator_subtitle") }}</span>
                    <h2 class="section-title">{{ __("loan_calculator_title") }}</h2>
                    <p class="mt-10" style="color:var(--clr-body-text,#6b7280)">{{ __("loan_calculator_desc") }}</p>
                </div>

                <div class="calc-card">

                    {{-- Montant --}}
                    <div class="calc-field">
                        <div class="calc-label-row">
                            <label>{{ __("loan_amount") }}</label>
                            <span class="calc-badge" id="displayAmount">10 000 €</span>
                        </div>
                        <input type="range" id="rangeAmount" min="1000" max="100000" step="500" value="10000" class="calc-range">
                        <div class="calc-range-limits"><span>1 000 €</span><span>100 000 €</span></div>
                    </div>

                    {{-- Durée --}}
                    <div class="calc-field">
                        <div class="calc-label-row">
                            <label>{{ __("loan_duration") }}</label>
                            <span class="calc-badge" id="displayDuration">24 mois</span>
                        </div>
                        <input type="range" id="rangeDuration" min="6" max="120" step="6" value="24" class="calc-range">
                        <div class="calc-range-limits"><span>6 mois</span><span>120 mois</span></div>
                    </div>

                    {{-- Taux --}}
                    <div class="calc-field">
                        <div class="calc-label-row">
                            <label>{{ __("loan_rate") }}</label>
                            <span class="calc-badge" id="displayRate">5,0 %</span>
                        </div>
                        <input type="range" id="rangeRate" min="1" max="25" step="0.5" value="5" class="calc-range">
                        <div class="calc-range-limits"><span>1 %</span><span>25 %</span></div>
                    </div>

                    <div class="calc-divider"></div>

                    {{-- Résultats --}}
                    <div class="calc-results">
                        <div class="calc-result-item featured">
                            <div class="calc-result-label">{{ __("loan_monthly_payment") }}</div>
                            <div class="calc-result-value" id="resMensualite">—</div>
                        </div>
                        <div class="calc-result-item">
                            <div class="calc-result-label">{{ __("loan_total_interest") }}</div>
                            <div class="calc-result-value" id="resInterets">—</div>
                        </div>
                        <div class="calc-result-item">
                            <div class="calc-result-label">{{ __("loan_total_payment") }}</div>
                            <div class="calc-result-value" id="resTotal">—</div>
                        </div>
                    </div>

                    <div class="text-center mt-40">
                        <a href="{{ route('loan-request.create') }}" class="tp-btn">{{ __("loan_request_btn") }}</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

@section('script')
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
@endsection