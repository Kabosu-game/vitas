@extends('frontend::pages.index')
@section('title') {{ __('lr.page_title') }} @endsection
@section('meta_description') {{ __('lr.meta_description') }} @endsection
@section('meta_keywords') {{ __('lr.meta_keywords') }} @endsection

@section('page-content')

{{-- ═══ INTRO ═══ --}}
<section class="section-space">
    <div class="container">
        <div class="row gy-40 align-items-center">
            <div class="col-lg-6" data-aos="fade-right" data-aos-duration="1200">
                <div class="section-title-wrapper mb-30">
                    <span class="section-subtitle">{{ __('lr.intro_subtitle') }}</span>
                    <h2 class="section-title mb-20">{{ __('lr.intro_title') }}</h2>
                    <p class="description mb-20">{{ __('lr.intro_description') }}</p>
                </div>
                <div class="d-flex gap-20 flex-wrap mt-30">
                    <div class="about-stat-box">
                        <h3 class="stat-number">24h</h3>
                        <p class="stat-label">{{ __('lr.stat_response') }}</p>
                    </div>
                    <div class="about-stat-box">
                        <h3 class="stat-number">0 €</h3>
                        <p class="stat-label">{{ __('lr.stat_fees') }}</p>
                    </div>
                    <div class="about-stat-box">
                        <h3 class="stat-number">100%</h3>
                        <p class="stat-label">{{ __('lr.stat_online') }}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-left" data-aos-duration="1200">
                <div class="row gy-20">
                    @foreach([
                        ['icon'=>'file-text','title'=>__('lr.step1_title'),'desc'=>__('lr.step1_desc')],
                        ['icon'=>'search','title'=>__('lr.step2_title'),'desc'=>__('lr.step2_desc')],
                        ['icon'=>'banknote','title'=>__('lr.step3_title'),'desc'=>__('lr.step3_desc')],
                    ] as $i => $step)
                    <div class="col-12" data-aos="fade-up" data-aos-duration="{{ 800 + $i * 200 }}">
                        <div class="value-card d-flex gap-3 align-items-start" style="padding:20px 24px">
                            <div class="value-icon flex-shrink-0" style="margin-bottom:0">
                                <i data-lucide="{{ $step['icon'] }}"></i>
                            </div>
                            <div>
                                <h4 style="font-size:15px;margin-bottom:6px">{{ $step['title'] }}</h4>
                                <p style="margin:0;font-size:13px">{{ $step['desc'] }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ═══ FORMULAIRE ═══ --}}
<section class="section-space" style="background:var(--clr-bg-light,#f8fafc);">
    <div class="container">
        <div class="row justify-content-center mb-50">
            <div class="col-lg-7 text-center">
                <span class="section-subtitle" data-aos="fade-up">{{ __('lr.form_subtitle') }}</span>
                <h2 class="section-title" data-aos="fade-up" data-aos-duration="1200">{{ __('lr.form_title') }}</h2>
                <p class="description mt-10" data-aos="fade-up" data-aos-duration="1400">{{ __('lr.form_required_note') }}</p>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-xl-8 col-lg-10">

                @if($errors->any())
                <div class="alert alert-danger mb-4" data-aos="fade-up">
                    <ul class="mb-0 ps-3">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <form method="POST" action="{{ route('loan-request.store') }}" enctype="multipart/form-data">
                    @csrf

                    {{-- Section 1 --}}
                    <div class="timeline-content mb-4" data-aos="fade-up" data-aos-duration="800">
                        <div class="lr-section-title mb-4">
                            <div class="timeline-year" style="position:static;width:42px;height:42px;font-size:16px;flex-shrink:0">1</div>
                            <h4 style="margin:0;font-size:1.1rem;font-weight:700">{{ __('lr.section1_title') }}</h4>
                        </div>
                        <div class="row g-3">
                            <div class="col-md-3">
                                <label class="form-label">{{ __('lr.civility') }} <span style="color:#ef4444">*</span></label>
                                <select name="civility" class="form-control" required>
                                    <option value="">--</option>
                                    @foreach(['M.','Mme','Dr.','Me.'] as $civ)
                                        <option value="{{ $civ }}" @selected(old('civility')==$civ)>{{ $civ }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">{{ __('lr.first_name') }} <span style="color:#ef4444">*</span></label>
                                <input type="text" name="first_name" class="form-control" value="{{ old('first_name') }}" required>
                            </div>
                            <div class="col-md-5">
                                <label class="form-label">{{ __('lr.last_name') }} <span style="color:#ef4444">*</span></label>
                                <input type="text" name="last_name" class="form-control" value="{{ old('last_name') }}" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">{{ __('lr.email') }} <span style="color:#ef4444">*</span></label>
                                <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">{{ __('lr.phone') }} <span style="color:#ef4444">*</span></label>
                                <input type="tel" name="phone" class="form-control" value="{{ old('phone') }}" placeholder="+33 6 12 34 56 78" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">{{ __('lr.country') }}</label>
                                <input type="text" name="country" class="form-control" value="{{ old('country') }}" placeholder="France">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">{{ __('lr.id_number') }} <span style="color:#ef4444">*</span></label>
                                <input type="text" name="id_number" class="form-control" value="{{ old('id_number') }}" placeholder="Passeport, CNI, Titre de séjour" required>
                            </div>

                            {{-- Documents --}}
                            <div class="col-12">
                                <div class="lr-doc-separator">
                                    <i data-lucide="paperclip" style="width:16px;height:16px"></i>
                                    {{ __('lr.docs_required') }} <span style="color:#ef4444">*</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">{{ __('lr.id_recto') }} <span style="color:#ef4444">*</span></label>
                                <div class="lr-file-zone" id="zone-recto">
                                    <input type="file" name="id_doc_recto" id="id_doc_recto" class="lr-file-input" accept=".jpg,.jpeg,.png,.pdf" required>
                                    <label for="id_doc_recto" class="lr-file-label">
                                        <i data-lucide="upload-cloud"></i>
                                        <span class="lr-file-text">{{ __('lr.upload_click') }}</span>
                                        <span class="lr-file-hint">{{ __('lr.upload_hint') }}</span>
                                    </label>
                                    <span class="lr-file-name" id="name-recto"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">{{ __('lr.id_verso') }} <span style="color:#ef4444">*</span></label>
                                <div class="lr-file-zone" id="zone-verso">
                                    <input type="file" name="id_doc_verso" id="id_doc_verso" class="lr-file-input" accept=".jpg,.jpeg,.png,.pdf" required>
                                    <label for="id_doc_verso" class="lr-file-label">
                                        <i data-lucide="upload-cloud"></i>
                                        <span class="lr-file-text">{{ __('lr.upload_click') }}</span>
                                        <span class="lr-file-hint">{{ __('lr.upload_hint') }}</span>
                                    </label>
                                    <span class="lr-file-name" id="name-verso"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">{{ __('lr.address_proof') }} <span style="color:#ef4444">*</span></label>
                                <div class="lr-file-zone" id="zone-address">
                                    <input type="file" name="address_proof" id="address_proof" class="lr-file-input" accept=".jpg,.jpeg,.png,.pdf" required>
                                    <label for="address_proof" class="lr-file-label">
                                        <i data-lucide="upload-cloud"></i>
                                        <span class="lr-file-text">{{ __('lr.address_proof_hint') }}</span>
                                        <span class="lr-file-hint">{{ __('lr.upload_hint') }}</span>
                                    </label>
                                    <span class="lr-file-name" id="name-address"></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Section 2 --}}
                    <div class="timeline-content mb-4" data-aos="fade-up" data-aos-duration="900">
                        <div class="lr-section-title mb-4">
                            <div class="timeline-year" style="position:static;width:42px;height:42px;font-size:16px;flex-shrink:0">2</div>
                            <h4 style="margin:0;font-size:1.1rem;font-weight:700">{{ __('lr.section2_title') }}</h4>
                        </div>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">{{ __('lr.loan_type') }} <span style="color:#ef4444">*</span></label>
                                <select name="loan_type" class="form-control" required>
                                    <option value="">{{ __('lr.select') }}</option>
                                    @foreach($loanTypes as $key => $label)
                                        <option value="{{ $label }}" @selected(old('loan_type')==$label)>{{ $label }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">{{ __('lr.amount') }} <span style="color:#ef4444">*</span></label>
                                <div class="input-group lr-amount-group">
                                    <select name="currency" id="lrCurrency" class="form-control lr-currency-select" style="max-width:110px;border-right:0;border-radius:8px 0 0 8px">
                                        @foreach(['EUR'=>'€ EUR','USD'=>'$ USD','GBP'=>'£ GBP','CHF'=>'Fr CHF','CAD'=>'$ CAD'] as $code => $label)
                                            <option value="{{ $code }}" @selected(old('currency','EUR')===$code)>{{ $label }}</option>
                                        @endforeach
                                    </select>
                                    <input type="number" name="amount" id="lrAmount" class="form-control"
                                           value="{{ old('amount') }}" min="100" max="9999999999" step="1"
                                           placeholder="{{ __('lr.amount_placeholder') }}" required
                                           style="border-left:0;border-radius:0 8px 8px 0">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">{{ __('lr.duration') }} <span style="color:#ef4444">*</span></label>
                                <select name="duration_months" id="lrDuration" class="form-control" required>
                                    <option value="">{{ __('lr.select') }}</option>
                                    @foreach([3,6,12,18,24,36,48,60,72,84,96,120,180,240,300] as $m)
                                        <option value="{{ $m }}" @selected(old('duration_months')==$m)>{{ $m }} {{ __('lr.months') }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">{{ __('lr.employment') }}</label>
                                <select name="employment_status" class="form-control">
                                    <option value="">{{ __('lr.select') }}</option>
                                    @foreach([__('lr.emp_employee'),__('lr.emp_self'),__('lr.emp_civil'),__('lr.emp_ceo'),__('lr.emp_unemployed'),__('lr.emp_retired'),__('lr.emp_student')] as $emp)
                                        <option value="{{ $emp }}" @selected(old('employment_status')==$emp)>{{ $emp }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">{{ __('lr.monthly_income') }}</label>
                                <input type="number" name="monthly_income" class="form-control"
                                       value="{{ old('monthly_income') }}" min="0" max="9999999999" step="1" placeholder="{{ __('lr.income_placeholder') }}">
                            </div>
                            <div class="col-12">
                                <label class="form-label">{{ __('lr.purpose') }}</label>
                                <textarea name="purpose" class="form-control" rows="3"
                                    placeholder="{{ __('lr.purpose_placeholder') }}">{{ old('purpose') }}</textarea>
                            </div>
                        </div>
                    </div>

                    {{-- Simulation --}}
                    <div class="value-card mb-4" id="lrRecap" style="display:none" data-aos="fade-up">
                        <div class="lr-section-title mb-3">
                            <div class="value-icon" style="margin-bottom:0;flex-shrink:0"><i data-lucide="calculator"></i></div>
                            <h4 style="margin:0;font-size:1rem">{{ __('lr.simulation_title') }}</h4>
                        </div>
                        <div class="row g-3 text-center">
                            <div class="col-4">
                                <div class="about-stat-box">
                                    <p class="stat-label">{{ __('lr.simulation_amount') }}</p>
                                    <h3 class="stat-number" id="recapAmount" style="font-size:1.2rem">—</h3>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="about-stat-box">
                                    <p class="stat-label">{{ __('lr.simulation_duration') }}</p>
                                    <h3 class="stat-number" id="recapDuration" style="font-size:1.2rem">—</h3>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="about-stat-box">
                                    <p class="stat-label">{{ __('lr.simulation_monthly') }}</p>
                                    <h3 class="stat-number" id="recapMonthly" style="font-size:1.2rem">—</h3>
                                </div>
                            </div>
                        </div>
                        <p class="text-muted mt-3 mb-0" style="font-size:12px;text-align:center">{{ __('lr.simulation_note') }}</p>
                    </div>

                    <div class="inputs centered mt-2" data-aos="fade-up">
                        <button type="submit" class="site-btn primary-btn w-100" style="font-size:1rem;padding:16px 24px">
                            <i data-lucide="send"></i> {{ __('lr.submit') }}
                        </button>
                        <p class="text-center text-muted mt-3 mb-0" style="font-size:13px">
                            {{ __('lr.submit_note') }}
                        </p>
                    </div>
                </form>

            </div>
        </div>
    </div>
</section>

<style>
.lr-section-title { display:flex; align-items:center; gap:14px; }
.form-control { border:2px solid rgba(0,0,0,.12); border-radius:8px; padding:10px 14px; font-size:15px; background:transparent; }
.dark .form-control { border-color:rgba(255,255,255,.15); color:#fff; }
.form-control:focus { border-color:var(--clr-theme-1,#4f46e5); box-shadow:none; }
/* Réutilise les styles about-us */
.about-stat-box { background:var(--clr-bg-light,#f8fafc); border-radius:12px; padding:20px 24px; border:1px solid rgba(0,0,0,.07); min-width:100px; }
.dark .about-stat-box { background:rgba(255,255,255,.05); border-color:rgba(255,255,255,.08); }
.stat-number { font-size:28px; font-weight:800; color:var(--clr-theme-1,#4f46e5); margin:0; }
.stat-label { font-size:13px; color:#6b7280; margin:4px 0 0; }
.gap-20 { gap:20px; }
.value-card { background:#fff; border:1px solid rgba(0,0,0,.07); border-radius:14px; padding:30px; transition:box-shadow .3s; }
.dark .value-card { background:rgba(255,255,255,.04); border-color:rgba(255,255,255,.08); }
.value-icon { width:48px; height:48px; background:rgba(79,70,229,.1); border-radius:12px; display:flex; align-items:center; justify-content:center; margin-bottom:16px; color:var(--clr-theme-1,#4f46e5); }
.value-icon svg { width:24px; height:24px; }
.timeline-content { background:#fff; border:1px solid rgba(0,0,0,.07); border-radius:12px; padding:28px; }
.dark .timeline-content { background:rgba(255,255,255,.04); border-color:rgba(255,255,255,.08); }
.timeline-year { width:42px; height:42px; background:var(--clr-theme-1,#4f46e5); color:#fff; border-radius:50%; display:flex; align-items:center; justify-content:center; font-weight:800; font-size:16px; flex-shrink:0; }
.mb-30 { margin-bottom:30px; } .mb-50 { margin-bottom:50px; } .mt-10 { margin-top:10px; } .mt-30 { margin-top:30px; }
/* Amount + currency group */
.lr-amount-group { display:flex; align-items:stretch; }
.lr-currency-select { border-right:none !important; border-radius:8px 0 0 8px !important; }
.lr-amount-group input { border-radius:0 8px 8px 0 !important; }
/* Doc separator */
.lr-doc-separator { display:flex; align-items:center; gap:8px; font-size:13px; font-weight:600; color:#6b7280; text-transform:uppercase; letter-spacing:.06em; padding:8px 0 4px; border-top:1px solid rgba(0,0,0,.08); margin-top:4px; }
.dark .lr-doc-separator { border-color:rgba(255,255,255,.1); color:#9ca3af; }
/* File upload zone */
.lr-file-zone { position:relative; border:2px dashed rgba(79,70,229,.35); border-radius:10px; background:rgba(79,70,229,.03); transition:border-color .2s, background .2s; }
.lr-file-zone:hover, .lr-file-zone.dragover { border-color:var(--clr-theme-1,#4f46e5); background:rgba(79,70,229,.07); }
.lr-file-zone.has-file { border-color:#22c55e; background:rgba(34,197,94,.05); }
.dark .lr-file-zone { background:rgba(79,70,229,.06); }
.lr-file-input { position:absolute; inset:0; opacity:0; cursor:pointer; width:100%; height:100%; z-index:2; }
.lr-file-label { display:flex; flex-direction:column; align-items:center; justify-content:center; gap:6px; padding:22px 12px; cursor:pointer; pointer-events:none; color:#6b7280; }
.lr-file-label svg { width:28px; height:28px; color:var(--clr-theme-1,#4f46e5); }
.lr-file-text { font-size:13px; font-weight:600; color:#374151; text-align:center; }
.dark .lr-file-text { color:#e5e7eb; }
.lr-file-hint { font-size:11px; color:#9ca3af; }
.lr-file-name { display:block; text-align:center; font-size:12px; color:#22c55e; font-weight:600; padding:0 12px 10px; min-height:0; }
</style>

@section('script')
<script>
(function(){
    // ── Simulation ──────────────────────────────────────────────
    const amountInput    = document.getElementById('lrAmount');
    const currencySelect = document.getElementById('lrCurrency');
    const durationSelect = document.getElementById('lrDuration');
    const recap          = document.getElementById('lrRecap');
    const recapAmount    = document.getElementById('recapAmount');
    const recapDuration  = document.getElementById('recapDuration');
    const recapMonthly   = document.getElementById('recapMonthly');

    const currencySymbols = { EUR:'€', USD:'$', GBP:'£', CHF:'Fr', CAD:'$' };

    function update() {
        const amount   = parseFloat(amountInput.value);
        const duration = parseInt(durationSelect.value);
        const currency = currencySelect ? currencySelect.value : 'EUR';
        const symbol   = currencySymbols[currency] || currency;
        if (!amount || !duration) { recap.style.display = 'none'; return; }
        const rate    = 0.045 / 12;
        const monthly = amount * rate / (1 - Math.pow(1 + rate, -duration));
        recap.style.display = '';
        recapAmount.textContent   = symbol + ' ' + amount.toLocaleString('fr-FR');
        recapDuration.textContent = duration + ' mois';
        recapMonthly.textContent  = symbol + ' ' + monthly.toFixed(2).replace('.', ',');
    }
    amountInput.addEventListener('input', update);
    durationSelect.addEventListener('change', update);
    if (currencySelect) currencySelect.addEventListener('change', update);
    update();

    // ── File upload UX ──────────────────────────────────────────
    [
        ['id_doc_recto',  'zone-recto',   'name-recto'],
        ['id_doc_verso',  'zone-verso',   'name-verso'],
        ['address_proof', 'zone-address', 'name-address'],
    ].forEach(function([inputId, zoneId, nameId]) {
        const input = document.getElementById(inputId);
        const zone  = document.getElementById(zoneId);
        const label = document.getElementById(nameId);
        if (!input || !zone) return;

        input.addEventListener('change', function() {
            if (input.files && input.files[0]) {
                label.textContent = input.files[0].name;
                zone.classList.add('has-file');
            } else {
                label.textContent = '';
                zone.classList.remove('has-file');
            }
        });

        zone.addEventListener('dragover', function(e) {
            e.preventDefault();
            zone.classList.add('dragover');
        });
        zone.addEventListener('dragleave', function() {
            zone.classList.remove('dragover');
        });
        zone.addEventListener('drop', function(e) {
            e.preventDefault();
            zone.classList.remove('dragover');
            if (e.dataTransfer.files.length) {
                input.files = e.dataTransfer.files;
                input.dispatchEvent(new Event('change'));
            }
        });
    });
})();
</script>
@endsection
@endsection
