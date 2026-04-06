<div class="pret-sidebar">
    <h4 class="pret-sidebar-title">{{ __('loan_sidebar_title') }}</h4>
    <ul class="pret-sidebar-list">
        <li>
            <span class="pret-sidebar-label"><i data-lucide="arrow-down-circle"></i> {{ __('loan_min_amount_label') }}</span>
            <span class="pret-sidebar-value">{{ $montant_min }}</span>
        </li>
        <li>
            <span class="pret-sidebar-label"><i data-lucide="arrow-up-circle"></i> {{ __('loan_max_amount_label') }}</span>
            <span class="pret-sidebar-value">{{ $montant_max }}</span>
        </li>
        <li>
            <span class="pret-sidebar-label"><i data-lucide="calendar"></i> {{ __('loan_duration_label') }}</span>
            <span class="pret-sidebar-value">{{ $duree }}</span>
        </li>
        <li>
            <span class="pret-sidebar-label"><i data-lucide="percent"></i> {{ __('loan_rate_label') }}</span>
            <span class="pret-sidebar-value">{{ $taux }}</span>
        </li>
        <li>
            <span class="pret-sidebar-label"><i data-lucide="clock"></i> {{ __('loan_disbursement_label') }}</span>
            <span class="pret-sidebar-value">{{ $delai }}</span>
        </li>
        <li>
            <span class="pret-sidebar-label"><i data-lucide="file-text"></i> {{ __('loan_required_docs_label') }}</span>
            <span class="pret-sidebar-value">{{ $justif }}</span>
        </li>
    </ul>
    <a href="{{ route('loan-request.create') }}" class="tp-btn w-100 text-center mt-20" style="display:block;">{{ __('loan_apply_button') }}</a>
    <a href="{{ url('loan-calculator') }}" class="pret-sim-link mt-10">
        <i data-lucide="calculator" style="width:14px;height:14px;"></i> {{ __('loan_simulate_link') }}
    </a>
</div>

<style>
.pret-sidebar { background:#fff; border:1px solid rgba(0,0,0,.08); border-radius:16px; padding:32px; box-shadow:0 4px 24px rgba(0,0,0,.06); }
.dark .pret-sidebar { background:rgba(255,255,255,.04); border-color:rgba(255,255,255,.08); }
.pret-sidebar-title { font-size:18px; font-weight:700; margin-bottom:24px; color:var(--clr-theme-1,#4f46e5); border-bottom:2px solid var(--clr-theme-1,#4f46e5); padding-bottom:12px; }
.pret-sidebar-list { list-style:none; padding:0; margin:0; }
.pret-sidebar-list li { display:flex; justify-content:space-between; align-items:flex-start; padding:12px 0; border-bottom:1px solid rgba(0,0,0,.06); gap:12px; }
.dark .pret-sidebar-list li { border-color:rgba(255,255,255,.06); }
.pret-sidebar-list li:last-child { border-bottom:none; }
.pret-sidebar-label { display:flex; align-items:center; gap:6px; font-size:13px; color:#6b7280; flex-shrink:0; }
.pret-sidebar-label svg { width:14px; height:14px; color:var(--clr-theme-1,#4f46e5); }
.pret-sidebar-value { font-size:13px; font-weight:600; text-align:right; }
.pret-sim-link { display:flex; align-items:center; justify-content:center; gap:6px; font-size:13px; color:var(--clr-theme-1,#4f46e5); text-decoration:none; margin-top:10px; }
.pret-sim-link:hover { text-decoration:underline; }
.mt-20 { margin-top:20px; }
.mt-10 { margin-top:10px; }
.w-100 { width:100%; }
</style>