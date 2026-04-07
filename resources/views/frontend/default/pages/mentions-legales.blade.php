@extends('frontend::pages.index')
@section('title') {{ __('legal_title') }} @endsection
@section('meta_keywords') {{ __('legal_meta_keywords') }} @endsection
@section('meta_description') {{ __('legal_meta_description') }} @endsection
@section('page-content')
<section class="section-space">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-9">
                <div class="frontend-editor-data">
                    <h3>{{ __('legal_section1_title') }}</h3>
                    <p>{!! __('legal_section1_text') !!}</p>
                    <ul>
                        <li><strong>{{ __('legal_headquarters') }}:</strong> {{ __('legal_headquarters_address') }}</li>
                        <li><strong>{{ __('legal_phone') }}:</strong> {{ __('legal_phone_number') }}</li>
                        <li><strong>{{ __('legal_email') }}:</strong> contact@eurovitas.de</li>
                        <li><strong>{{ __('legal_director') }}:</strong> {{ __('legal_director_name') }}</li>
                        <li><strong>{{ __('legal_vat') }}:</strong> {{ __('legal_vat_number') }}</li>
                    </ul>

                    <h3>{{ __('legal_section2_title') }}</h3>
                    <p>{!! __('legal_section2_text') !!}</p>

                    <h3>{{ __('legal_section3_title') }}</h3>
                    <p>{{ __('legal_section3_text') }}</p>
                    <ul>
                        <li><strong>{{ __('legal_hosting_company') }}</strong></li>
                        <li>{{ __('legal_hosting_address') }}</li>
                        <li>{{ __('legal_hosting_phone') }}</li>
                        <li><a href="https://www.ovhcloud.com" target="_blank">www.ovhcloud.com</a></li>
                    </ul>

                    <h3>{{ __('legal_section4_title') }}</h3>
                    <p>{!! __('legal_section4_text') !!}</p>

                    <h3>{{ __('legal_section5_title') }}</h3>
                    <p>{!! __('legal_section5_text') !!}</p>

                    <h3>{{ __('legal_section6_title') }}</h3>
                    <p>{!! __('legal_section6_text') !!}</p>

                    <h3>{{ __('legal_section7_title') }}</h3>
                    <p>{!! __('legal_section7_text') !!}</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
