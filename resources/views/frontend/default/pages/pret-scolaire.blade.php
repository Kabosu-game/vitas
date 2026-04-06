@extends('frontend::pages.index')
@section('title') {{ __('loan.school.page_title') }} @endsection
@section('meta_keywords') {{ __('loan.school.meta_keywords') }} @endsection
@section('meta_description') {{ __('loan.school.meta_description') }} @endsection

@section('page-content')

<section class="section-space">
    <div class="container">
        <div class="row gy-40 align-items-center">
            <div class="col-lg-6" data-aos="fade-right" data-aos-duration="1200">
                <span class="section-subtitle">{{ __('loan.school.subtitle') }}</span>
                <h2 class="section-title mb-20">{{ __('loan.school.title') }}</h2>
                <p class="description mb-20">{!! __('loan.school.desc1') !!}</p>
                <p class="description mb-20">{!! __('loan.school.desc2') !!}</p>
                <p class="description">{!! __('loan.school.desc3') !!}</p>
            </div>
            <div class="col-lg-6" data-aos="fade-left" data-aos-duration="1200">
                @include('frontend::pages._pret_sidebar', ['montant_min'=>'500 €', 'montant_max'=>'30 000 €', 'duree'=>'12 à 120 mois', 'taux'=>'Dès 2,9 % TAEG', 'delai'=>'24 à 48 heures', 'justif'=>__('loan.school.required_docs')])
            </div>
        </div>

        <div class="row gy-30 mt-50">
            <div class="col-12"><h3 class="section-title" style="font-size:22px;">{{ __('loan.school.why_title') }}</h3></div>
            @foreach([
                ['icon'=>'graduation-cap','title'=>__('loan.school.feature1_title'),'desc'=>__('loan.school.feature1_desc')],
                ['icon'=>'home','title'=>__('loan.school.feature2_title'),'desc'=>__('loan.school.feature2_desc')],
                ['icon'=>'plane','title'=>__('loan.school.feature3_title'),'desc'=>__('loan.school.feature3_desc')],
                ['icon'=>'book-open','title'=>__('loan.school.feature4_title'),'desc'=>__('loan.school.feature4_desc')],
                ['icon'=>'calendar','title'=>__('loan.school.feature5_title'),'desc'=>__('loan.school.feature5_desc')],
                ['icon'=>'trending-up','title'=>__('loan.school.feature1_title'),'desc'=>__('loan.school.feature1_desc')],
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
