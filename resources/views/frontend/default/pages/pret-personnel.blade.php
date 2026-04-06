@extends('frontend::pages.index')
@section('title') {{ __('loan.personal.page_title') }} @endsection
@section('meta_keywords') {{ __('loan.personal.meta_keywords') }} @endsection
@section('meta_description') {{ __('loan.personal.meta_description') }} @endsection

@section('page-content')

<section class="section-space">
    <div class="container">
        <div class="row gy-40 align-items-center">
            <div class="col-lg-6" data-aos="fade-right" data-aos-duration="1200">
                <span class="section-subtitle">{{ __('loan.personal.subtitle') }}</span>
                <h2 class="section-title mb-20">{{ __('loan.personal.title') }}</h2>
                <p class="description mb-20">{!! __('loan.personal.desc1') !!}</p>
                <p class="description mb-20">{!! __('loan.personal.desc2') !!}</p>
                <p class="description">{!! __('loan.personal.desc3') !!}</p>
            </div>
            <div class="col-lg-6" data-aos="fade-left" data-aos-duration="1200">
                @include('frontend::pages._pret_sidebar', ['montant_min'=>'1 000 €', 'montant_max'=>'50 000 €', 'duree'=>'6 à 84 mois', 'taux'=>'Dès 3,9 % TAEG', 'delai'=>'24 à 72 heures', 'justif'=>__('loan.personal.required_docs')])
            </div>
        </div>

        <div class="row gy-30 mt-50">
            <div class="col-12"><h3 class="section-title" style="font-size:22px;">{{ __('loan.personal.why_title') }}</h3></div>
            @foreach([
                ['icon'=>'wallet','title'=>__('loan.personal.feature1_title'),'desc'=>__('loan.personal.feature1_desc')],
                ['icon'=>'clock','title'=>__('loan.personal.feature2_title'),'desc'=>__('loan.personal.feature2_desc')],
                ['icon'=>'percent','title'=>__('loan.personal.feature3_title'),'desc'=>__('loan.personal.feature3_desc')],
                ['icon'=>'file-check','title'=>__('loan.personal.feature4_title'),'desc'=>__('loan.personal.feature4_desc')],
                ['icon'=>'shield-check','title'=>__('loan.personal.feature5_title'),'desc'=>__('loan.personal.feature5_desc')],
                ['icon'=>'headphones','title'=>__('loan.personal.feature6_title'),'desc'=>__('loan.personal.feature6_desc')],
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
