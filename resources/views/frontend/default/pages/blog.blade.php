@extends('frontend::pages.index')
@section('title') Blog @endsection

@section('page-content')
<section class="blog-area section-space">
    <div class="container">
        <div class="col-xxl-6 col-xl-6 col-lg-8 mb-50">
            <div class="section-title-wrapper section-title-space">
                <span data-aos="fade-up" data-aos-duration="1000" class="section-subtitle">Blog</span>
                <h2 data-aos="fade-up" data-aos-duration="1500" class="section-title">{{ __('Dernières Nouvelles') }}</h2>
            </div>
        </div>
        @php
            $blogs = \App\Models\Blog::where('locale', app()->getLocale())->latest()->get();
            if ($blogs->isEmpty()) {
                $blogs = \App\Models\Blog::where('locale', defaultLocale())->latest()->get();
            }
        @endphp
        <div class="row gy-5">
            @forelse($blogs as $blog)
            <div class="col-xxl-4 col-xl-4 col-lg-6">
                <article class="blog-grid-item" data-aos="fade-up" data-aos-duration="1000">
                    <div class="blog-thumb">
                        <a href="{{ route('blog-details', $blog->id) }}">
                            <img src="{{ asset($blog->cover) }}" alt="{{ $blog->title }}">
                        </a>
                    </div>
                    <div class="blog-content">
                        <div class="blog-meta-inner">
                            <div class="date-badge"><span>{{ $blog->created_at->format('d M Y') }}</span></div>
                            <div class="blog-button">
                                <a class="blog-link" href="{{ route('blog-details', $blog->id) }}">
                                    <i class="fa-regular fa-arrow-up-right"></i>
                                </a>
                            </div>
                        </div>
                        <h4 class="blog-title">
                            <a href="{{ route('blog-details', $blog->id) }}">{{ $blog->title }}</a>
                        </h4>
                    </div>
                </article>
            </div>
            @empty
            <div class="col-12 text-center py-5">
                <p>{{ __('Aucun article disponible pour le moment.') }}</p>
            </div>
            @endforelse
        </div>
    </div>
</section>
@endsection
