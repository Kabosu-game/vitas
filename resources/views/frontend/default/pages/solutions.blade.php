@extends('frontend::pages.index')
@section('title') {{ __('sol.page_title') }} @endsection
@section('meta_keywords') {{ __('sol.meta_keywords') }} @endsection
@section('meta_description') {{ __('sol.meta_description') }} @endsection
@section('page-content')
    <section class="services-area position-relative fix section-space">
        <div class="inner-pages-shapes">
            <div class="shape-one"><img src="{{ asset('global/images/znfE5sYjSUaJOzr6JYfh.png') }}" alt="shape not found"></div>
            <div class="shape-two"><img data-parallax='{"y" : -120, "smoothness": 20}' src="{{ asset('global/images/tHFYWG0GCVA1aTss7YKD.png') }}" alt="shape not found"></div>
        </div>
        <div class="container"><div class="row"><div class="col-xxl-12"><div class="services-grid">
            <div class="services-item" data-aos="fade-up" data-aos-duration="1000"><div class="content"><div class="icon"><span><i class="fa-regular fa-circle-plus"></i></span></div><h3 class="title">{{ __('sol.s1_title') }}</h3><p class="description">{{ __('sol.s1_desc') }}</p></div></div>
            <div class="services-item" data-aos="fade-up" data-aos-duration="1000"><div class="content"><div class="icon"><span><i class="fa-light fa-paper-plane"></i></span></div><h3 class="title">{{ __('sol.s2_title') }}</h3><p class="description">{{ __('sol.s2_desc') }}</p></div></div>
            <div class="services-item" data-aos="fade-up" data-aos-duration="1000"><div class="content"><div class="icon"><span><i class="fa-light fa-box-archive"></i></span></div><h3 class="title">{{ __('sol.s3_title') }}</h3><p class="description">{{ __('sol.s3_desc') }}</p></div></div>
            <div class="services-item" data-aos="fade-up" data-aos-duration="1000"><div class="content"><div class="icon"><span><i class="fa-regular fa-triangle-exclamation"></i></span></div><h3 class="title">{{ __('sol.s4_title') }}</h3><p class="description">{{ __('sol.s4_desc') }}</p></div></div>
            <div class="services-item" data-aos="fade-up" data-aos-duration="1000"><div class="content"><div class="icon"><span><i class="fa-regular fa-circle-exclamation"></i></span></div><h3 class="title">{{ __('sol.s5_title') }}</h3><p class="description">{{ __('sol.s5_desc') }}</p></div></div>
            <div class="services-item" data-aos="fade-up" data-aos-duration="1000"><div class="content"><div class="icon"><span><i class="fa-regular fa-user-group"></i></span></div><h3 class="title">{{ __('sol.s6_title') }}</h3><p class="description">{{ __('sol.s6_desc') }}</p></div></div>
        </div></div></div></div>
    </section>
@endsection
