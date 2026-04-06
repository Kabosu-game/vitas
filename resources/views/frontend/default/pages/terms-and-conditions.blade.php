@extends('frontend::pages.index')
@section('title') {{ __('terms_title') }} @endsection
@section('meta_keywords') {{ __('terms_meta_keywords') }} @endsection
@section('meta_description') {{ __('terms_meta_description') }} @endsection
@section('page-content')
    <section class="section-style">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-12">
                    <div class="frontend-editor-data">
                        <h4>{{ __('terms_intro_title') }}</h4>
                        <p>{{ __('terms_intro_text') }}</p>
                        <h4>{{ __('terms_intellectual_property_title') }}</h4>
                        <p>{{ __('terms_intellectual_property_text') }}</p>
                        <h4>{{ __('terms_restrictions_title') }}</h4>
                        <p>{{ __('terms_restrictions_text') }}</p>
                        <ul><li>{{ __('terms_restrictions_item1') }}</li><li>{{ __('terms_restrictions_item2') }}</li><li>{{ __('terms_restrictions_item3') }}</li></ul>
                        <h4>{{ __('terms_no_warranty_title') }}</h4>
                        <p>{!! __('terms_no_warranty_text') !!}</p>
                        <h4>{{ __('terms_limitation_title') }}</h4>
                        <p>{{ __('terms_limitation_text') }}</p>
                        <h4>{{ __('terms_governing_law_title') }}</h4>
                        <p>{{ __('terms_governing_law_text') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
