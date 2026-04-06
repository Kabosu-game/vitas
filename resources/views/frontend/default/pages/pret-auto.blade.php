@extends('frontend::pages.index')
@section('title') {{ __('loan.auto.page_title') }} @endsection
@section('meta_keywords') {{ __('loan.auto.meta_keywords') }} @endsection
@section('meta_description') {{ __('loan.auto.meta_description') }} @endsection

@section('page-content')

<section class="section-space">
    <div class="container">
        <div class="row gy-40 align-items-center">
            <div class="col-lg-6" data-aos="fade-right" data-aos-duration="1200">
                <span class="section-subtitle">{{ __('loan.auto.subtitle') }}</span>
                <h2 class="section-title mb-20">{{ __('loan.auto.title') }}</h2>
                <p class="description mb-20">{!! __('loan.auto.desc1') !!}</p>
                <p class="description mb-20">{!! __('loan.auto.desc2') !!}</p>
                <p class="description">{!! __('loan.auto.desc3') !!}</p>
            </div>
            <div class="col-lg-6" data-aos="fade-left" data-aos-duration="1200">
                @include('frontend::pages._pret_sidebar', ['montant_min'=>'3 000 €', 'montant_max'=>'80 000 €', 'duree'=>'12 à 84 mois', 'taux'=>'Dès 3,2 % TAEG', 'delai'=>'24 à 48 heures', 'justif'=>__('loan.auto.required_docs')])
            </div>
        </div>

        <div class="row gy-30 mt-50">
            <div class="col-12"><h3 class="section-title" style="font-size:22px;">{{ __('loan.auto.why_title') }}</h3></div>
            @foreach([
                ['icon'=>'car','title'=>__('loan.auto.feature1_title'),'desc'=>__('loan.auto.feature1_desc')],
                ['icon'=>'search','title'=>__('loan.auto.feature2_title'),'desc'=>__('loan.auto.feature2_desc')],
                ['icon'=>'zap','title'=>__('loan.auto.feature3_title'),'desc'=>__('loan.auto.feature3_desc')],
                ['icon'=>'truck','title'=>__('loan.auto.feature4_title'),'desc'=>__('loan.auto.feature4_desc')],
                ['icon'=>'dollar-sign','title'=>__('loan.auto.feature5_title'),'desc'=>__('loan.auto.feature5_desc')],
                ['icon'=>'refresh-cw','title'=>__('loan.auto.feature6_title'),'desc'=>__('loan.auto.feature6_desc')],
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
