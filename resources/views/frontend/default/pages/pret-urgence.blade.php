@extends('frontend::pages.index')
@section('title') {{ __('loan.emergency.page_title') }} @endsection
@section('meta_keywords') {{ __('loan.emergency.meta_keywords') }} @endsection
@section('meta_description') {{ __('loan.emergency.meta_description') }} @endsection

@section('page-content')

<section class="section-space">
    <div class="container">
        <div class="row gy-40 align-items-center">
            <div class="col-lg-6" data-aos="fade-right" data-aos-duration="1200">
                <span class="section-subtitle">{{ __('loan.emergency.subtitle') }}</span>
                <h2 class="section-title mb-20">{{ __('loan.emergency.title') }}</h2>
                <p class="description mb-20">{!! __('loan.emergency.desc1') !!}</p>
                <p class="description mb-20">{!! __('loan.emergency.desc2') !!}</p>
                <p class="description">{!! __('loan.emergency.desc3') !!}</p>
            </div>
            <div class="col-lg-6" data-aos="fade-left" data-aos-duration="1200">
                @include('frontend::pages._pret_sidebar', ['montant_min'=>'500 €', 'montant_max'=>'10 000 €', 'duree'=>'3 à 36 mois', 'taux'=>'Dès 5,9 % TAEG', 'delai'=>'Sous 24 heures', 'justif'=>__('loan.emergency.required_docs')])
            </div>
        </div>

        <div class="row gy-30 mt-50">
            <div class="col-12"><h3 class="section-title" style="font-size:22px;">{{ __('loan.emergency.why_title') }}</h3></div>
            @foreach([
                ['icon'=>'zap','title'=>__('loan.emergency.feature1_title'),'desc'=>__('loan.emergency.feature1_desc')],
                ['icon'=>'banknote','title'=>__('loan.emergency.feature2_title'),'desc'=>__('loan.emergency.feature2_desc')],
                ['icon'=>'file-text','title'=>__('loan.emergency.feature3_title'),'desc'=>__('loan.emergency.feature3_desc')],
                ['icon'=>'calendar','title'=>__('loan.emergency.feature4_title'),'desc'=>__('loan.emergency.feature4_desc')],
                ['icon'=>'clock','title'=>__('loan.emergency.feature5_title'),'desc'=>__('loan.emergency.feature5_desc')],
                ['icon'=>'lock','title'=>__('home.feature6_title'),'desc'=>__('home.feature6_desc')],
            ] as $item)
            <div class="col-lg-4 col-md-6" data-aos="fade-up">
                @include('frontend::pages._pret_feature', $item)
            </div>
            @endforeach
        </div>

        @include('frontend::pages._pret_cta')
    </div>
</section>

@endsection
