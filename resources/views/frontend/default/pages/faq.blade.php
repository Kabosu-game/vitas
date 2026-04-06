@extends('frontend::pages.index')
@section('title') {{ __('faq.page_title') }} @endsection
@section('meta_keywords') {{ __('faq.meta_keywords') }} @endsection
@section('meta_description') {{ __('faq.meta_description') }} @endsection
@section('page-content')
    @include('frontend::home.include.__faq')
    @include('frontend::home.include.__whychooseus')
@endsection
