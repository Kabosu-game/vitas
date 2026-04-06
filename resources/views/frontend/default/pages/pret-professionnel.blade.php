@extends('frontend::pages.index')
@section('title') {{ __('loan.professional.page_title') }} @endsection
@section('meta_keywords') {{ __('loan.professional.meta_keywords') }} @endsection
@section('meta_description') {{ __('loan.professional.meta_description') }} @endsection

@section('page-content')

<section class="section-space">
    <div class="container">
        <div class="row gy-40 align-items-center">
            <div class="col-lg-6" data-aos="fade-right" data-aos-duration="1200">
                <span class="section-subtitle">{{ __('loan.professional.subtitle') }}</span>
                <h2 class="section-title mb-20">{{ __('loan.professional.title') }}</h2>
                <p class="description mb-20">{!! __('loan.professional.desc1') !!}</p>
                <p class="description mb-20">{!! __('loan.professional.desc2') !!}</p>
                <p class="description">{!! __('loan.professional.desc3') !!}</p>
            </div>
            <div class="col-lg-6" data-aos="fade-left" data-aos-duration="1200">
                @include('frontend::pages._pret_sidebar', ['montant_min'=>'5 000 €', 'montant_max'=>'500 000 €', 'duree'=>'12 à 120 mois', 'taux'=>'Dès 4,2 % TAEG', 'delai'=>'48 à 96 heures', 'justif'=>__('loan.professional.required_docs')])
            </div>
        </div>

        <div class="row gy-30 mt-50">
            <div class="col-12"><h3 class="section-title" style="font-size:22px;">{{ __('loan.professional.why_title') }}</h3></div>
            @foreach([
                ['icon'=>'rocket','title'=>__('loan.professional.feature1_title'),'desc'=>__('loan.professional.feature1_desc')],
                ['icon'=>'trending-up','title'=>__('loan.professional.feature2_title'),'desc'=>__('loan.professional.feature2_desc')],
                ['icon'=>'cpu','title'=>__('loan.professional.feature3_title'),'desc'=>__('loan.professional.feature3_desc')],
                ['icon'=>'refresh-cw','title'=>__('loan.professional.feature4_title'),'desc'=>__('loan.professional.feature4_desc')],
                ['icon'=>'store','title'=>__('loan.professional.feature5_title'),'desc'=>__('loan.professional.feature5_desc')],
                ['icon'=>'leaf','title'=>__('home.feature6_title'),'desc'=>__('home.feature6_desc')],
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
