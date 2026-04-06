@extends('frontend::pages.index')
@section('title') {{ __('contact_title') }} @endsection
@section('meta_keywords') {{ __('contact_keywords') }} @endsection
@section('meta_description') {{ __('contact_description') }} @endsection

@section('page-content')

{{-- ═══ 1. CONTACT CARDS ═══ --}}
<section class="contact-card-area fix position-relative section-space">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xxl-6 col-xl-6 col-lg-6">
                <div class="section-title-wrapper text-center section-title-space">
                    <span data-aos="fade-up" data-aos-duration="1000" class="section-subtitle">{{ __('contact_subtitle') }}</span>
                    <h2 data-aos="fade-up" data-aos-duration="1400" class="section-title mb-4">{{ __('contact_heading') }}</h2>
                </div>
            </div>
        </div>

        <div class="row gy-30 justify-content-center" data-aos="fade-up" data-aos-duration="2000">
            @php
            $contact_methods = [
                ['icon'=>'fa-regular fa-microphone','title'=>'contact_voice_title','desc'=>'contact_voice_desc'],
                ['icon'=>'fa-regular fa-circle-video','title'=>'contact_chat_title','desc'=>'contact_chat_desc'],
                ['icon'=>'fa-solid fa-phone','title'=>'contact_call_title','desc'=>'contact_call_desc'],
            ];
            @endphp

            @foreach($contact_methods as $method)
            <div class="col-xxl-4 col-xl-4 col-lg-4">
                <div class="contact-card">
                    <div class="content">
                        <div class="icon"><span><i class="{{ $method['icon'] }}"></i></span></div>
                        <h3 class="title">{{ __($method['title']) }}</h3>
                        <p class="description">{{ __($method['desc']) }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ═══ 2. CONTACT FORM ═══ --}}
<section class="contact-form-area gray-bg section-space include-bg" data-background="{{ asset('global/images/t7IuYIcCYMJHtqx0JZ3U.jpg') }}">
    <div class="container">
        <div class="row gy-30 justify-content-center">
            <div class="col-xxl-6 col-xl-6 col-lg-6">
                <div class="contact-form-content" data-aos="fade-up" data-aos-duration="1500">
                    <div class="section-title-wrapper">
                        <h2 class="section-title text-white mb-4">{{ __('contact_form_title') }}</h2>
                        <p class="description text-white-80">{{ __('contact_form_desc') }}</p>
                    </div>
                    <div class="contact-info">
                        <div class="item">
                            <div class="icon"><span><i class="fa-regular fa-envelope"></i></span></div>
                            <div class="content">
                                <h3 class="title">{{ __('contact_email_title') }}</h3>
                                <span class="info">{{ __('contact_email') }}</span>
                            </div>
                        </div>
                        <div class="item">
                            <div class="icon"><span><i class="fa-regular fa-phone"></i></span></div>
                            <div class="content">
                                <h3 class="title">{{ __('contact_whatsapp_title') }}</h3>
                                <span class="info">{{ __('contact_whatsapp') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xxl-6 col-xl-6 col-lg-6">
                <div class="contact-form" data-aos="fade-right" data-aos-duration="1000">
                    <form id="contact-form" action="{{ route('mail-send') }}" method="POST">
                        @csrf
                        <div class="contact-input-wrapper">
                            <div class="row">
                                <div class="col-xxl-12">
                                    <div class="contact-input-box">
                                        <div class="contact-input-title">
                                            <label for="name">{{ __('form_name') }}<span>*</span></label>
                                        </div>
                                        <div class="contact-input"><input name="name" id="name" type="text"></div>
                                    </div>
                                </div>
                                <div class="col-xxl-12">
                                    <div class="contact-input-box">
                                        <div class="contact-input-title">
                                            <label for="email">{{ __('form_email') }}<span>*</span></label>
                                        </div>
                                        <div class="contact-input"><input name="email" id="email" type="email"></div>
                                    </div>
                                </div>
                                <div class="col-xxl-12">
                                    <div class="contact-input-box">
                                        <div class="contact-input-title">
                                            <label for="subject">{{ __('form_subject') }}<span>*</span></label>
                                        </div>
                                        <div class="contact-input"><input name="subject" id="subject" type="text"></div>
                                    </div>
                                </div>
                                <div class="col-xxl-12">
                                    <div class="contact-input-box">
                                        <div class="contact-input-title">
                                            <label>{{ __('form_message') }}<span>*</span></label>
                                        </div>
                                        <div class="contact-input"><textarea name="msg"></textarea></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="contact-btn">
                            <button class="td-primary-btn" type="submit">{{ __('form_submit') }}</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</section>

@endsection