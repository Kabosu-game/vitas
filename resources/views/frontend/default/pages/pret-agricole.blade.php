@extends('frontend::pages.index')
@section('title') {{ __('loan.agricultural.page_title') }} @endsection
@section('meta_keywords') {{ __('loan.agricultural.meta_keywords') }} @endsection
@section('meta_description') {{ __('loan.agricultural.meta_description') }} @endsection

@section('page-content')

<section class="section-space">
    <div class="container">
        <div class="row gy-40 align-items-center">
            <div class="col-lg-6" data-aos="fade-right" data-aos-duration="1200">
                <span class="section-subtitle">{{ __('loan.agricultural.subtitle') }}</span>
                <h2 class="section-title mb-20">{{ __('loan.agricultural.title') }}</h2>
                <p class="description mb-20">{!! __('loan.agricultural.desc1') !!}</p>
                <p class="description mb-20">{!! __('loan.agricultural.desc2') !!}</p>
                <p class="description">{!! __('loan.agricultural.desc3') !!}</p>
            </div>
            <div class="col-lg-6" data-aos="fade-left" data-aos-duration="1200">
                @include('frontend::pages._pret_sidebar', ['montant_min'=>'5 000 €', 'montant_max'=>'200 000 €', 'duree'=>'12 à 180 mois', 'taux'=>'Dès 3,5 % TAEG', 'delai'=>'48 à 96 heures', 'justif'=>__('loan.agricultural.required_docs')])
            </div>
        </div>

        <div class="row gy-30 mt-50">
            <div class="col-12"><h3 class="section-title" style="font-size:22px;">{{ __('loan.agricultural.why_title') }}</h3></div>
            @foreach([
                ['icon'=>'tractor','title'=>__('loan.agricultural.feature1_title'),'desc'=>__('loan.agricultural.feature1_desc')],
                ['icon'=>'land-plot','title'=>__('loan.agricultural.feature2_title'),'desc'=>__('loan.agricultural.feature2_desc')],
                ['icon'=>'warehouse','title'=>__('loan.agricultural.feature3_title'),'desc'=>__('loan.agricultural.feature3_desc')],
                ['icon'=>'sprout','title'=>__('loan.agricultural.feature4_title'),'desc'=>__('loan.agricultural.feature4_desc')],
                ['icon'=>'sun','title'=>__('loan.agricultural.feature5_title'),'desc'=>__('loan.agricultural.feature5_desc')],
                ['icon'=>'refresh-cw','title'=>__('home.calculator_duration_label'),'desc'=>__('home.calculator_duration_label')],
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
