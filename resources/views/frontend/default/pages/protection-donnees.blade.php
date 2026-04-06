@extends('frontend::pages.index')
@section('title') {{ __('gdpr_title') }} @endsection
@section('meta_keywords') {{ __('gdpr_meta_keywords') }} @endsection
@section('meta_description') {{ __('gdpr_meta_description') }} @endsection
@section('page-content')
<section class="section-space">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-9">
                <div class="frontend-editor-data">
                    <p><em>{{ __('gdpr_intro') }}</em></p>

                    <h3>{{ __('gdpr_section1_title') }}</h3>
                    <p>{!! __('gdpr_section1_text') !!}</p>

                    <h3>{{ __('gdpr_section2_title') }}</h3>
                    <p>{{ __('gdpr_section2_text') }}</p>
                    <ul>
                        <li><strong>{{ __('gdpr_identity_data') }}</strong></li>
                        <li><strong>{{ __('gdpr_contact_data') }}</strong></li>
                        <li><strong>{{ __('gdpr_financial_data') }}</strong></li>
                        <li><strong>{{ __('gdpr_connection_data') }}</strong></li>
                        <li><strong>{{ __('gdpr_behavioral_data') }}</strong></li>
                    </ul>

                    <h3>{{ __('gdpr_section3_title') }}</h3>
                    <ul>
                        <li><strong>{{ __('gdpr_contractual_purpose') }}</strong></li>
                        <li><strong>{{ __('gdpr_legal_purpose') }}</strong></li>
                        <li><strong>{{ __('gdpr_legitimate_purpose') }}</strong></li>
                        <li><strong>{{ __('gdpr_consent_purpose') }}</strong></li>
                    </ul>

                    <h3>{{ __('gdpr_section4_title') }}</h3>
                    <ul>
                        <li>{{ __('gdpr_contractual_data') }}</li>
                        <li>{{ __('gdpr_accounting_data') }}</li>
                        <li>{{ __('gdpr_aml_data') }}</li>
                        <li>{{ __('gdpr_prospect_data') }}</li>
                        <li>{{ __('gdpr_logs_data') }}</li>
                    </ul>

                    <h3>{{ __('gdpr_section5_title') }}</h3>
                    <p>{{ __('gdpr_section5_text') }}</p>
                    <ul>
                        <li><strong>{{ __('gdpr_right_access') }}</strong></li>
                        <li><strong>{{ __('gdpr_right_rectification') }}</strong></li>
                        <li><strong>{{ __('gdpr_right_erasure') }}</strong></li>
                        <li><strong>{{ __('gdpr_right_portability') }}</strong></li>
                        <li><strong>{{ __('gdpr_right_objection') }}</strong></li>
                        <li><strong>{{ __('gdpr_right_restriction') }}</strong></li>
                    </ul>
                    <p>{!! __('gdpr_rights_exercise') !!}</p>

                    <h3>{{ __('gdpr_section6_title') }}</h3>
                    <p>{{ __('gdpr_section6_text') }}</p>

                    <h3>{{ __('gdpr_section7_title') }}</h3>
                    <p>{{ __('gdpr_section7_text') }}</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
