@extends('frontend::pages.index')
@section('title') {{ __('Récompenses') }} @endsection

@section('page-content')
@php
    $programs = \App\Models\ReferralProgram::all();
@endphp
<section class="rewards-area section-space">
    <div class="container">
        <div class="col-xxl-6 col-xl-6 col-lg-8 mb-50">
            <div class="section-title-wrapper section-title-space">
                <span data-aos="fade-up" data-aos-duration="1000" class="section-subtitle">{{ __('Programme') }}</span>
                <h2 data-aos="fade-up" data-aos-duration="1500" class="section-title">{{ __('Récompenses & Parrainage') }}</h2>
            </div>
        </div>
        <div class="row gy-4">
            @forelse($programs as $program)
            <div class="col-xxl-4 col-xl-4 col-lg-6" data-aos="fade-up" data-aos-duration="1000">
                <div class="plan-item text-center p-40">
                    <h3 class="plan-title mb-15">{{ $program->name }}</h3>
                    <p>{{ $program->uri }}</p>
                </div>
            </div>
            @empty
            <div class="col-12 text-center py-5">
                <p>{{ __('Programme de récompenses bientôt disponible.') }}</p>
            </div>
            @endforelse
        </div>
    </div>
</section>
    @include('frontend::home.include.__cta')
@endsection
