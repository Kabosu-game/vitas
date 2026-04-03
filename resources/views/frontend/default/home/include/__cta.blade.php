<!-- Newsletter area start -->
<section class="newsletter-area position-relative z-index-11 {{ request()->is('contact') ? 'section-space' : 'section-space-bottom' }}">
    <div class="container">
        <div class="newsletter-wrapper" data-background="{{ asset('/front/images/shapes/newsletter-mask.png') }}">
            <div class="newsletter-grid">
                <div data-aos="fade-up" data-aos-duration="1000" class="newsletter-content">
                    <h2 class="title text-white">Libérez votre temps pour vous concentrer sur d'autres projets importants.</h2>
                    <p class="description text-white">Rejoignez-nous aujourd'hui et découvrez la puissance des prêts en ligne !</p>
                </div>
                <div data-aos="fade-up" data-aos-duration="1500" class="button">
                    <a class="gradient-btn" href="{{ route('register') }}" target="_self"><span><i class="fa-solid fa-user-plus"></i></span>Rejoignez-Nous</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Newsletter area end -->
