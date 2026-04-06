@extends('frontend::pages.index')
@section('title') {{ __('about_intro_title') }} @endsection
@section('meta_keywords') {{ __('about_intro_title') }}, {{ __('about_intro_subtitle') }} @endsection
@section('meta_description') {{ __('about_intro_desc_1') }} @endsection

@section('page-content')

{{-- ═══ 1. INTRO ═══ --}}
<section class="about-area position-relative section-space">
    <div class="container">
        <div class="row gy-40 align-items-center">
            <div class="col-lg-6" data-aos="fade-right" data-aos-duration="1200">
                <div class="section-title-wrapper mb-30">
                    <span class="section-subtitle">{{ __('about_intro_subtitle') }}</span>
                    <h2 class="section-title mb-20">{{ __('about_intro_title') }}</h2>
                    <p class="description mb-20">{!! __('about_intro_desc_1') !!}</p>
                    <p class="description mb-20">{!! __('about_intro_desc_2') !!}</p>
                    <p class="description">{!! __('about_intro_desc_3') !!}</p>
                </div>
                <div class="d-flex gap-20 flex-wrap mt-30">
                    <div class="about-stat-box">
                        <h3 class="stat-number">50 000+</h3>
                        <p class="stat-label">{{ __('about_stat_clients') }}</p>
                    </div>
                    <div class="about-stat-box">
                        <h3 class="stat-number">97 %</h3>
                        <p class="stat-label">{{ __('about_stat_satisfaction') }}</p>
                    </div>
                    <div class="about-stat-box">
                        <h3 class="stat-number">24h</h3>
                        <p class="stat-label">{{ __('about_stat_response') }}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-left" data-aos-duration="1200">
                <div class="about-thum-wrap">
                    <div class="thumb">
                        <img src="{{ asset('global/images/G77LAQ2oFdN5Cj3TwFQT.png') }}" alt="Eurovitas Finanzen" style="width:100%;border-radius:16px;">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ═══ 2. NOS VALEURS ═══ --}}
<section class="section-space" style="background:var(--clr-bg-light,#f8fafc);">
    <div class="container">
        <div class="row justify-content-center mb-50">
            <div class="col-lg-7 text-center">
                <span class="section-subtitle" data-aos="fade-up">{{ __('values_subtitle') }}</span>
                <h2 class="section-title" data-aos="fade-up" data-aos-duration="1200">{{ __('values_title') }}</h2>
            </div>
        </div>
        <div class="row gy-30">
            @php
            $values = [
                ['icon'=>'shield-check','title'=>'value_transparency_title','desc'=>'value_transparency_desc'],
                ['icon'=>'zap','title'=>'value_speed_title','desc'=>'value_speed_desc'],
                ['icon'=>'heart-handshake','title'=>'value_responsibility_title','desc'=>'value_responsibility_desc'],
                ['icon'=>'lock','title'=>'value_security_title','desc'=>'value_security_desc'],
                ['icon'=>'users','title'=>'value_accessibility_title','desc'=>'value_accessibility_desc'],
                ['icon'=>'trending-up','title'=>'value_innovation_title','desc'=>'value_innovation_desc'],
            ];
            @endphp
            @foreach($values as $i => $v)
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-duration="{{ 800 + $i * 200 }}">
                <div class="value-card">
                    <div class="value-icon"><i data-lucide="{{ $v['icon'] }}"></i></div>
                    <h4>{{ __($v['title']) }}</h4>
                    <p>{{ __($v['desc']) }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ═══ 3. NOTRE HISTOIRE ═══ --}}
<section class="section-space">
    <div class="container">
        <div class="row justify-content-center mb-50">
            <div class="col-lg-7 text-center">
                <span class="section-subtitle" data-aos="fade-up">{{ __('history_subtitle') }}</span>
                <h2 class="section-title" data-aos="fade-up" data-aos-duration="1200">{{ __('history_title') }}</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <div class="timeline">
                    @php
                    $timeline = [
                        ['year'=>'2019','title'=>'timeline_2019_title','desc'=>'timeline_2019_desc'],
                        ['year'=>'2020','title'=>'timeline_2020_title','desc'=>'timeline_2020_desc'],
                        ['year'=>'2021','title'=>'timeline_2021_title','desc'=>'timeline_2021_desc'],
                        ['year'=>'2022','title'=>'timeline_2022_title','desc'=>'timeline_2022_desc'],
                        ['year'=>'2024','title'=>'timeline_2024_title','desc'=>'timeline_2024_desc'],
                    ];
                    @endphp
                    @foreach($timeline as $i => $t)
                    <div class="timeline-item" data-aos="fade-up" data-aos-duration="{{ 800 + $i * 100 }}">
                        <div class="timeline-year">{{ $t['year'] }}</div>
                        <div class="timeline-content">
                            <h4>{{ __($t['title']) }}</h4>
                            <p>{{ __($t['desc']) }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ═══ 4. POURQUOI NOUS CHOISIR ═══ --}}
<section class="section-space" style="background:var(--clr-bg-light,#f8fafc);">
    <div class="container">
        <div class="row gy-40 align-items-center">
            <div class="col-lg-5" data-aos="fade-right" data-aos-duration="1200">
                <span class="section-subtitle">{{ __('why_subtitle') }}</span>
                <h2 class="section-title mb-20">{{ __('why_title') }}</h2>
                <p class="description">{{ __('about_intro_desc_2') }}</p>
            </div>
            <div class="col-lg-7" data-aos="fade-left" data-aos-duration="1200">
                <div class="compare-table">
                    <div class="compare-row compare-header">
                        <div class="compare-cell"></div>
                        <div class="compare-cell text-center"><strong>Eurovitas Finanzen</strong></div>
                        <div class="compare-cell text-center"><strong>Traditional Bank</strong></div>
                    </div>
                    @php
                    $compare = [
                        ['label'=>'compare_response_time','yes'=>'compare_less_24h','no'=>'compare_2_4_weeks'],
                        ['label'=>'compare_online','yes'=>'compare_yes','no'=>'compare_no'],
                        ['label'=>'compare_no_appointment','yes'=>'compare_yes','no'=>'compare_no'],
                        ['label'=>'compare_no_fees','yes'=>'compare_yes','no'=>'compare_no'],
                        ['label'=>'compare_early_repayment','yes'=>'compare_without_penalty','no'=>'compare_with_penalty'],
                        ['label'=>'compare_customer_support','yes'=>'compare_7days','no'=>'compare_no'],
                    ];
                    @endphp
                    @foreach($compare as $row)
                    <div class="compare-row">
                        <div class="compare-cell">{{ __($row['label']) }}</div>
                        <div class="compare-cell text-center compare-yes">{{ __($row['yes']) }}</div>
                        <div class="compare-cell text-center compare-no">{{ __($row['no']) }}</div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ═══ 5. ÉQUIPE ═══ --}}
<section class="section-space">
    <div class="container">
        <div class="row justify-content-center mb-50">
            <div class="col-lg-7 text-center">
                <span class="section-subtitle">{{ __('team_subtitle') }}</span>
                <h2 class="section-title" data-aos="fade-up" data-aos-duration="1200">{{ __('team_title') }}</h2>
                <p class="description mt-10">{{ __('team_desc') }}</p>
            </div>
        </div>
        <div class="row gy-30 justify-content-center">
            @php
            $team_members = [
                ['name'=>'Alexandre Moreau','poste'=>'Co-founder & CEO','desc'=>"15 years in investment banking. Former BNP Paribas director, Alexandre founded Eurovitas Finanzen to make finance accessible."],
                ['name'=>'Sophie Laurent','poste'=>'Co-founder & CTO','desc'=>"Computer engineer graduated from École Polytechnique. Sophie manages platform architecture and scoring AI."],
                ['name'=>'Karim Benali','poste'=>'Risk Director','desc'=>"Credit risk expert with 12 years experience. Karim ensures responsible and sustainable loan portfolio management."],
                ['name'=>'Marie Fontaine','poste'=>'Customer Relations Director','desc'=>"Passionate about customer experience, Marie leads a team of 30 advisors supporting clients at every step."],
            ];
            @endphp
            @foreach($team_members as $i => $member)
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-duration="{{ 800 + $i * 150 }}">
                <div class="team-card">
                    <div class="team-avatar">{{ strtoupper(substr($member['name'], 0, 1)) }}</div>
                    <h4 class="team-name">{{ $member['name'] }}</h4>
                    <p class="team-poste">{{ $member['poste'] }}</p>
                    <p class="team-desc">{{ $member['desc'] }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

@endsection