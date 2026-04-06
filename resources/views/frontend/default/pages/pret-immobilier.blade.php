@extends('frontend::pages.index')
@section('title') {{ __('loan.real_estate.page_title') }} @endsection
@section('meta_keywords') {{ __('loan.real_estate.meta_keywords') }} @endsection
@section('meta_description') {{ __('loan.real_estate.meta_description') }} @endsection

@section('page-content')

<section class="section-space">
    <div class="container">
        <div class="row gy-40 align-items-center">
            <div class="col-lg-6" data-aos="fade-right" data-aos-duration="1200">
                <span class="section-subtitle">{{ __('loan.real_estate.subtitle') }}</span>
                <h2 class="section-title mb-20">{{ __('loan.real_estate.title') }}</h2>
                <p class="description mb-20">{!! __('loan.real_estate.desc1') !!}</p>
                <p class="description mb-20">{!! __('loan.real_estate.desc2') !!}</p>
                <p class="description">{!! __('loan.real_estate.desc3') !!}</p>
            </div>
            <div class="col-lg-6" data-aos="fade-left" data-aos-duration="1200">
                @include('frontend::pages._pret_sidebar', ['montant_min'=>'30 000 €', 'montant_max'=>'1 000 000 €', 'duree'=>'5 à 25 ans', 'taux'=>'Dès 2,5 % TAEG', 'delai'=>'5 à 10 jours ouvrés', 'justif'=>__('loan.real_estate.required_docs')])
            </div>
        </div>

        <div class="row gy-30 mt-50">
            <div class="col-12"><h3 class="section-title" style="font-size:22px;">{{ __('loan.real_estate.why_title') }}</h3></div>
            @foreach([
                ['icon'=>'home','title'=>__('loan.real_estate.feature1_title'),'desc'=>__('loan.real_estate.feature1_desc')],
                ['icon'=>'building','title'=>__('loan.real_estate.feature2_title'),'desc'=>__('loan.real_estate.feature2_desc')],
                ['icon'=>'hammer','title'=>__('loan.real_estate.feature3_title'),'desc'=>__('loan.real_estate.feature3_desc')],
                ['icon'=>'key','title'=>__('loan.real_estate.feature4_title'),'desc'=>__('loan.real_estate.feature4_desc')],
                ['icon'=>'shield-check','title'=>__('loan.real_estate.feature5_title'),'desc'=>__('loan.real_estate.feature5_desc')],
                ['icon'=>'calculator','title'=>__('home.calculator_title'),'desc'=>__('home.calculator_subtitle')],
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
