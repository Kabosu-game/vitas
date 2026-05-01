@extends('frontend::pages.index')
@section('title') {{ __('Portfolios') }} @endsection

@section('page-content')
@php
    $portfolios = \App\Models\Portfolio::where('status', 1)->orderBy('minimum_transactions')->get();
@endphp
<section class="portfolio-area section-space">
    <div class="container">
        <div class="col-xxl-6 col-xl-6 col-lg-8 mb-50">
            <div class="section-title-wrapper section-title-space">
                <span data-aos="fade-up" data-aos-duration="1000" class="section-subtitle">{{ __('Portfolios') }}</span>
                <h2 data-aos="fade-up" data-aos-duration="1500" class="section-title">{{ __('Nos Niveaux de Portfolio') }}</h2>
            </div>
        </div>
        <div class="row gy-4">
            @forelse($portfolios as $portfolio)
            <div class="col-xxl-4 col-xl-4 col-lg-6" data-aos="fade-up" data-aos-duration="1000">
                <div class="plan-item text-center p-40">
                    <div class="plan-icon mb-20">
                        <i class="{{ $portfolio->icon }} fa-3x"></i>
                    </div>
                    <h3 class="plan-title mb-10">{{ $portfolio->portfolio_name }}</h3>
                    <div class="plan-badge mb-15">{{ $portfolio->level }}</div>
                    <p class="mb-15">{{ $portfolio->description }}</p>
                    <div class="plan-info">
                        <span>{{ __('Transactions min.') }}: <strong>{{ $portfolio->minimum_transactions }}</strong></span>
                        @if($portfolio->bonus > 0)
                        <span class="ms-3">{{ __('Bonus') }}: <strong>{{ $portfolio->bonus }}%</strong></span>
                        @endif
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center py-5">
                <p>{{ __('Aucun portfolio disponible pour le moment.') }}</p>
            </div>
            @endforelse
        </div>
    </div>
</section>
    @include('frontend::home.include.__cta')
@endsection
