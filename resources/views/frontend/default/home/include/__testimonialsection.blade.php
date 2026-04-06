<!-- Testimonial area start -->
<section class="testimonial-area section-space">
    <div class="container">
        <div class="row section-title-space justify-content-center">
            <div class="col-xxl-6 col-xl-6 col-lg-6">
                <div class="section-title-wrapper text-center">
                    <span data-aos="fade-up" data-aos-duration="1000" class="section-subtitle">{{ __('home.testimonial_subtitle') }}</span>
                    <h2 data-aos="fade-up" data-aos-duration="1500" class="section-title">{{ __('home.testimonial_title') }}</h2>
                </div>
            </div>
        </div>
        <div class="wrapper position-relative">
            <div data-aos="fade-up" data-aos-duration="2500" class="row">
                <div class="col-xxl-12">
                    <div class="swiper testimonial-active">
                        <div class="swiper-wrapper">

                            @php
                            $avis = [
                                ['name' => 'Marie L.', 'poste' => 'Nurse', 'note' => 5, 'msg' => 'Application processed in less than 24h. The online process is really simple and customer service guided me every step. I highly recommend Eurovitas Finanzen.'],
                                ['name' => 'Thomas B.', 'poste' => 'Craftsman', 'note' => 5, 'msg' => 'I needed urgent financing for my workshop. Eurovitas Finanzen responded with a very competitive rate. Perfect.'],
                                ['name' => 'Nadia K.', 'poste' => 'Teacher', 'note' => 5, 'msg' => 'Clear interface, no complicated jargon. I got my loan in just a few days. Very satisfied.'],
                                ['name' => 'Julien M.', 'poste' => 'IT Project Manager', 'note' => 4, 'msg' => 'Very good overall experience. Conditions are transparent and repayment is flexible. I had no bad surprises.'],
                                ['name' => 'Sophie D.', 'poste' => 'Accountant', 'note' => 5, 'msg' => 'File assembled quickly, positive response the next day. With traditional banks I would have waited weeks. Thank you Eurovitas Finanzen!'],
                                ['name' => 'Karim A.', 'poste' => 'Freelancer', 'note' => 5, 'msg' => 'As a self-employed person, finding a loan was complicated. Eurovitas Finanzen studied my file seriously and granted me what I needed.'],
                                ['name' => 'Isabelle R.', 'poste' => 'HR Manager', 'note' => 5, 'msg' => 'Excellent follow-up, available and listening advisor. The online dashboard to track repayments is very practical.'],
                                ['name' => 'Marc P.', 'poste' => 'Salesperson', 'note' => 4, 'msg' => 'Good value for money. The rate is honest and monthly payments fit my budget. I recommend.'],
                                ['name' => 'Amina S.', 'poste' => 'Doctor', 'note' => 5, 'msg' => 'Impeccable service from start to finish. I appreciated the total transparency on costs, no hidden fees. Perfect.'],
                                ['name' => 'François G.', 'poste' => 'Engineer', 'note' => 5, 'msg' => 'I compared several platforms, Eurovitas Finanzen offers the best conditions. Fast and hassle-free payment.'],
                                ['name' => 'Laura V.', 'poste' => 'Graphic Designer', 'note' => 5, 'msg' => 'Simplicity and efficiency. Everything is done online, without unnecessary paperwork. My loan was approved in record time.'],
                                ['name' => 'Rachid O.', 'poste' => 'Restaurant Owner', 'note' => 4, 'msg' => 'Good service, clear conditions. I was able to finance my restaurant equipment without stress. I will use Eurovitas Finanzen again.'],
                                ['name' => 'Chloé F.', 'poste' => 'Master\'s Student', 'note' => 5, 'msg' => 'Even as a student, I was able to get a loan adapted to my needs. The team found the best solution for me.'],
                                ['name' => 'David N.', 'poste' => 'Sales Director', 'note' => 5, 'msg' => 'Reliable, fast and professional. Exactly what you expect from a modern financing platform. I will not hesitate to come back.'],
                            ];
                            @endphp

                            @foreach($avis as $a)
                            <div class="swiper-slide">
                                <div class="testimonial-item">
                                    <div class="testimonial-content">
                                        <div class="feedback-quote-wrap position-relative">
                                            <div class="feedback__quote">
                                                <svg width="65" height="44" viewBox="0 0 65 44" fill="none" xmlns="http://www.w3.org/2000/svg"><g opacity="0.2"><path d="M26.1065 0H0.532785C0.234282 0 0 0.235948 0 0.536572V26.292C0 26.5926 0.234282 26.8286 0.532785 26.8286H14.5338C12.6369 37.9672 4.60236 42.9472 4.51803 43.0119C4.32656 43.1197 4.21953 43.3772 4.28375 43.6132C4.34797 43.8275 4.56085 44 4.79514 44C20.3102 44 24.8066 32.9681 26.1066 26.4011C26.6394 23.8476 26.6394 22.0652 26.6394 22.0005V0.536451C26.6394 0.235827 26.405 0 26.1065 0Z" fill="#F49E57"/><path d="M64.4672 0H38.8934C38.5949 0 38.3606 0.235948 38.3606 0.536572V26.292C38.3606 26.5926 38.5949 26.8286 38.8934 26.8286H52.8944C50.9976 37.9672 42.963 42.9472 42.8787 43.0119C42.6872 43.1197 42.5801 43.3772 42.6444 43.6132C42.7086 43.8275 42.9215 44 43.1558 44C58.6708 44 63.1672 32.9681 64.4672 26.4011C65 23.8476 65 22.0652 65 22.0005V0.536451C65 0.235827 64.7657 0 64.4672 0Z" fill="#F49E57"/></g></svg>
                                            </div>
                                        </div>

                                        {{-- Étoiles --}}
                                        <div class="testi-stars mb-10">
                                            @for($i = 1; $i <= 5; $i++)
                                                @if($i <= $a['note'])
                                                    <i class="fa-solid fa-star" style="color:#f59e0b;font-size:13px;"></i>
                                                @else
                                                    <i class="fa-regular fa-star" style="color:#d1d5db;font-size:13px;"></i>
                                                @endif
                                            @endfor
                                        </div>

                                        <p class="description">{{ $a['msg'] }}</p>

                                        <div class="testimonial-author">
                                            <div class="testimonial-author-info">
                                                <h4 class="title">{{ $a['name'] }} <span class="verified-badge"><i class="fa-solid fa-circle-check"></i> {{ __('home.testimonial_verified') }}</span></h4>
                                                <p class="info">{{ $a['poste'] }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
            <div class="testimonial-navigation d-flex justify-content-md-end">
                <button class="testimonial-button-prev"><i class="fa-regular fa-arrow-left-long"></i></button>
                <button class="testimonial-button-next"><i class="fa-regular fa-arrow-right-long"></i></button>
            </div>
        </div>
    </div>
</section>
<!-- Testimonial area end -->

