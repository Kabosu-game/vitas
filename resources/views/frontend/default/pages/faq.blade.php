@extends('frontend::pages.index')
@section('title') FAQ @endsection
@section('meta_keywords') FAQ, Eurovitas Finanzen, questions fréquentes @endsection
@section('meta_description') Réponses aux questions fréquentes sur Eurovitas Finanzen @endsection
@section('page-content')
    @include('frontend::home.include.__faq')
    @include('frontend::home.include.__whychooseus')
@endsection
