@extends('frontend::layouts.app')
@section('title') {{ __('Home') }} @endsection
@section('meta_keywords') Prêt en ligne, Eurovitas, prêt rapide, prêt sécurisé @endsection
@section('meta_description') Plateforme de prêt en ligne Eurovitas pour tous vos besoins financiers @endsection

@section('content')
    @include('frontend::home.include.__hero')
    @include('frontend::home.include.__bankingsolution')
    @include('frontend::home.include.__workstepsection')
    @include('frontend::home.include.__pretsection')
    @include('frontend::home.include.__powerfulsection')
    @include('frontend::home.include.__loancalculatorsection')
    @include('frontend::home.include.__experiencesection')
    @include('frontend::home.include.__faq')
    @include('frontend::home.include.__testimonialsection')
    @include('frontend::home.include.__whychooseus')
    @include('frontend::home.include.__cta')
@endsection
