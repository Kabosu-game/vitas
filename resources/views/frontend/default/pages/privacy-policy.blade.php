@extends('frontend::pages.index')

@section('title') {{ __('privacy_policy') }} @endsection
@section('meta_keywords') {{ __('meta_keywords_privacy') }} @endsection
@section('meta_description') {{ __('meta_description_privacy') }} @endsection

@section('page-content')
    <!-- Privacy policy area start -->
    <section class="faq-area position-relative section-space">
        <div class="container">
            <div class="privacy-policy-content">
                <div class="privacy-item">

                    <h2>{{ __('privacy_policy') }}</h2>

                    <p style="color:rgba(3,3,6,0.6);">
                        {{ __('privacy_intro') }}
                    </p>

                    <h3>{{ __('company_information_title') }}</h3>
                    <p style="color:rgba(3,3,6,0.6);">
                        {{ __('company_information_text') }}
                    </p>

                    <h3>{{ __('website_section_title') }}</h3>
                    <p style="color:rgba(3,3,6,0.6);">
                        {{ __('website_section_text') }}
                    </p>

                    <h3>{{ __('user_data_title') }}</h3>
                    <p style="color:rgba(3,3,6,0.6);">
                        {{ __('user_data_text') }}
                    </p>

                    <h3>{{ __('data_collection_title') }}</h3>
                    <p style="color:rgba(3,3,6,0.6);">
                        {{ __('data_collection_text') }}
                    </p>

                    <h3>{{ __('data_usage_title') }}</h3>
                    <p style="color:rgba(3,3,6,0.6);">
                        {{ __('data_usage_text') }}
                    </p>

                </div>
            </div>
        </div>
    </section>
    <!-- Privacy policy area end -->
@endsection