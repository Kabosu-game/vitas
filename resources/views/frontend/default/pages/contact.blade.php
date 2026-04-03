@extends('frontend::pages.index')
@section('title') Contact Us @endsection
@section('meta_keywords') Contact, Eurovitas, support @endsection
@section('meta_description') Contactez Eurovitas pour toute question @endsection
@section('page-content')
    <section class="contact-card-area fix position-relative section-space">
        <div class="container">
            <div class="row justify-content-center"><div class="col-xxl-6 col-xl-6 col-lg-6"><div class="section-title-wrapper text-center section-title-space"><span data-aos="fade-up" data-aos-duration="1000" class="section-subtitle">Contactez-Nous</span><h2 data-aos="fade-up" data-aos-duration="1400" class="section-title mb-4">Veuillez Nous Contacter Via les Moyens Ci-Dessous</h2></div></div></div>
            <div class="row gy-30 justify-content-center" data-aos="fade-up" data-aos-duration="2000">
                <div class="col-xxl-4 col-xl-4 col-lg-4"><div class="contact-card"><div class="content"><div class="icon"><span><i class="fa-regular fa-microphone"></i></span></div><h3 class="title">Envoyez-nous un message vocal</h3><p class="description">Notre essence réside dans la confiance, l'innovation et l'engagement envers nos clients.</p></div></div></div>
                <div class="col-xxl-4 col-xl-4 col-lg-4"><div class="contact-card"><div class="content"><div class="icon"><span><i class="fa-regular fa-circle-video"></i></span></div><h3 class="title">Chat en Direct</h3><p class="description">Notre essence réside dans la confiance, l'innovation et l'engagement envers nos clients.</p></div></div></div>
                <div class="col-xxl-4 col-xl-4 col-lg-4"><div class="contact-card"><div class="content"><div class="icon"><span><i class="fa-solid fa-phone"></i></span></div><h3 class="title">Parlez-Nous</h3><p class="description">Notre essence réside dans la confiance, l'innovation et l'engagement envers nos clients.</p></div></div></div>
            </div>
        </div>
    </section>
    <section class="contact-form-area gray-bg section-space include-bg" data-background="{{ asset('global/images/t7IuYIcCYMJHtqx0JZ3U.jpg') }}">
        <div class="container">
            <div class="row gy-30 justify-content-center">
                <div class="col-xxl-6 col-xl-6 col-lg-6">
                    <div class="contact-form-content" data-aos="fade-up" data-aos-duration="1500">
                        <div class="section-title-wrapper"><h2 class="section-title text-white mb-4">Entrer en Contact</h2><p class="description text-white-80">Eurovitas est là pour répondre à toutes vos questions concernant nos services de prêt. Contactez-nous pour une assistance personnalisée.</p></div>
                        <div class="contact-info">
                            <div class="item"><div class="icon"><span><i class="fa-regular fa-envelope"></i></span></div><div class="content"><h3 class="title">Adresse Email</h3><span class="info">contact@eurovitas.de</span></div></div>
                            <div class="item"><div class="icon"><span><i class="fa-regular fa-phone"></i></span></div><div class="content"><h3 class="title">WhatsApp</h3><span class="info">+34669877781</span></div></div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-6 col-xl-6 col-lg-6">
                    <div class="contact-form" data-aos="fade-right" data-aos-duration="1000">
                        <form id="contact-form" action="{{ route('mail-send') }}" method="POST">
                            @csrf
                            <div class="contact-input-wrapper"><div class="row">
                                <div class="col-xxl-12"><div class="contact-input-box"><div class="contact-input-title"><label for="Name">{{ __("Name") }}<span>*</span></label></div><div class="contact-input"><input name="name" id="name" type="text"></div></div></div>
                                <div class="col-xxl-12"><div class="contact-input-box"><div class="contact-input-title"><label for="email">{{ __("Email Address") }}<span>*</span></label></div><div class="contact-input"><input name="email" id="email" type="email"></div></div></div>
                                <div class="col-xxl-12"><div class="contact-input-box"><div class="contact-input-title"><label for="subject">{{ __("Subject") }}<span>*</span></label></div><div class="contact-input"><input name="subject" id="subject" type="text"></div></div></div>
                                <div class="col-xxl-12"><div class="contact-input-box"><div class="contact-input-title"><label>{{ __("Message") }}<span>*</span></label></div><div class="contact-input"><textarea name="msg"></textarea></div></div></div>
                            </div></div>
                            <div class="contact-btn"><button class="td-primary-btn" type="submit">{{ __("Submit Now") }}</button></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
