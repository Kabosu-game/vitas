<!-- Prêts section start -->
<section class="section-space" style="background:var(--clr-bg-light,#f8fafc);">
    <div class="container">
        <div class="row justify-content-center section-title-space">
            <div class="col-xxl-6 col-xl-6 col-lg-8 text-center">
                <span data-aos="fade-up" data-aos-duration="1000" class="section-subtitle">{{ __('home.prets_subtitle') }}</span>
                <h2 data-aos="fade-up" data-aos-duration="1500" class="section-title">{{ __('home.prets_title') }}</h2>
                <p data-aos="fade-up" data-aos-duration="2000" class="description mt-10">{{ __('home.prets_desc') }}</p>
            </div>
        </div>
        <div class="row gy-30">
            @php
            $prets = [
                ['icon'=>'user','title'=>__('personal_loan_title'),'desc'=>__('personal_loan_desc'),'slug'=>'pret-personnel','montant'=>__('personal_loan_amount'),'duree'=>__('personal_loan_duration'),'taux'=>__('personal_loan_rate')],
                ['icon'=>'graduation-cap','title'=>__('loans.school.title'),'desc'=>__('loans.school.desc'),'slug'=>'pret-scolaire','montant'=>__('loans.school.amount'),'duree'=>__('loans.school.duration'),'taux'=>__('loans.school.rate')],
                ['icon'=>'sprout','title'=>__('loans.agricultural.title'),'desc'=>__('loans.agricultural.desc'),'slug'=>'pret-agricole','montant'=>__('loans.agricultural.amount'),'duree'=>__('loans.agricultural.duration'),'taux'=>__('loans.agricultural.rate')],
                ['icon'=>'home','title'=>__('loans.realEstate.title'),'desc'=>__('loans.realEstate.desc'),'slug'=>'pret-immobilier','montant'=>__('loans.realEstate.amount'),'duree'=>__('loans.realEstate.duration'),'taux'=>__('loans.realEstate.rate')],
                ['icon'=>'car','title'=>__('loans.auto.title'),'desc'=>__('loans.auto.desc'),'slug'=>'pret-auto','montant'=>__('loans.auto.amount'),'duree'=>__('loans.auto.duration'),'taux'=>__('loans.auto.rate')],
                ['icon'=>'briefcase','title'=>__('loans.professional.title'),'desc'=>__('loans.professional.desc'),'slug'=>'pret-professionnel','montant'=>__('loans.professional.amount'),'duree'=>__('loans.professional.duration'),'taux'=>__('loans.professional.rate')],
                ['icon'=>'zap','title'=>__('loans.emergency.title'),'desc'=>__('loans.emergency.desc'),'slug'=>'pret-urgence','montant'=>__('loans.emergency.amount'),'duree'=>__('loans.emergency.duration'),'taux'=>__('loans.emergency.rate')],
            ];
            @endphp

            @foreach($prets as $i => $p)
            <div class="col-xl-4 col-lg-4 col-md-6" data-aos="fade-up" data-aos-duration="{{ 800 + ($i % 3) * 150 }}">
                <div class="pret-card">
                    <div class="pret-card-header">
                        <div class="pret-card-icon"><i data-lucide="{{ $p['icon'] }}"></i></div>
                        <h4 class="pret-card-title">{{ $p['title'] }}</h4>
                    </div>
                    <p class="pret-card-desc">{{ $p['desc'] }}</p>
                    <ul class="pret-card-meta">
                        <li><span class="meta-label">Montant</span><span class="meta-value">{{ $p['montant'] }}</span></li>
                        <li><span class="meta-label">Durée</span><span class="meta-value">{{ $p['duree'] }}</span></li>
                        <li><span class="meta-label">Taux</span><span class="meta-value highlight">{{ $p['taux'] }}</span></li>
                    </ul>
                    <a href="{{ url($p['slug']) }}" class="pret-card-btn">{{ __('home.learn_more') }} <i data-lucide="arrow-right"></i></a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- Prêts section end -->

<style>
.pret-card { background:#fff; border:1px solid rgba(0,0,0,.07); border-radius:16px; padding:28px; height:100%; display:flex; flex-direction:column; transition:box-shadow .3s,transform .3s; }
.dark .pret-card { background:rgba(255,255,255,.04); border-color:rgba(255,255,255,.08); }
.pret-card:hover { box-shadow:0 12px 36px rgba(0,0,0,.1); transform:translateY(-5px); }
.pret-card-header { display:flex; align-items:center; gap:14px; margin-bottom:14px; }
.pret-card-icon { width:46px; height:46px; border-radius:12px; background:rgba(79,70,229,.1); display:flex; align-items:center; justify-content:center; flex-shrink:0; color:var(--clr-theme-1,#4f46e5); }
.pret-card-icon svg { width:22px; height:22px; }
.pret-card-title { font-size:17px; font-weight:700; margin:0; }
.pret-card-desc { font-size:13px; color:#6b7280; line-height:1.7; margin-bottom:18px; flex:1; }
.pret-card-meta { list-style:none; padding:0; margin:0 0 20px; border-top:1px solid rgba(0,0,0,.06); padding-top:14px; display:flex; flex-direction:column; gap:8px; }
.dark .pret-card-meta { border-color:rgba(255,255,255,.06); }
.pret-card-meta li { display:flex; justify-content:space-between; align-items:center; font-size:13px; }
.meta-label { color:#9ca3af; }
.meta-value { font-weight:600; }
.meta-value.highlight { color:var(--clr-theme-1,#4f46e5); }
.pret-card-btn { display:inline-flex; align-items:center; gap:6px; font-size:14px; font-weight:600; color:var(--clr-theme-1,#4f46e5); text-decoration:none; margin-top:auto; transition:gap .2s; }
.pret-card-btn svg { width:16px; height:16px; transition:transform .2s; }
.pret-card:hover .pret-card-btn svg { transform:translateX(4px); }
.mt-10 { margin-top:10px; }
</style>
