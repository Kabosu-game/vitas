<!-- Testimonial area start -->
<section class="testimonial-area section-space">
    <div class="container">
        <div class="row section-title-space justify-content-center">
            <div class="col-xxl-6 col-xl-6 col-lg-6">
                <div class="section-title-wrapper text-center">
                    <span data-aos="fade-up" data-aos-duration="1000" class="section-subtitle">Témoignages</span>
                    <h2 data-aos="fade-up" data-aos-duration="1500" class="section-title">Avis Vérifiés de Nos Clients</h2>
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
                                ['name' => 'Marie L.', 'poste' => 'Infirmière', 'note' => 5, 'msg' => 'Demande traitée en moins de 24h. Le processus en ligne est vraiment simple et le service client m\'a guidée à chaque étape. Je recommande vivement Eurovitas.'],
                                ['name' => 'Thomas B.', 'poste' => 'Artisan', 'note' => 5, 'msg' => 'J\'avais besoin d\'un financement urgent pour mon atelier. Eurovitas a répondu présent avec un taux très compétitif. Parfait.'],
                                ['name' => 'Nadia K.', 'poste' => 'Enseignante', 'note' => 5, 'msg' => 'Interface claire, aucun jargon compliqué. J\'ai obtenu mon prêt en quelques jours seulement. Très satisfaite.'],
                                ['name' => 'Julien M.', 'poste' => 'Chef de projet IT', 'note' => 4, 'msg' => 'Très bonne expérience globale. Les conditions sont transparentes et le remboursement flexible. Je n\'ai pas eu de mauvaise surprise.'],
                                ['name' => 'Sophie D.', 'poste' => 'Comptable', 'note' => 5, 'msg' => 'Dossier monté rapidement, réponse positive le lendemain. Chez les banques traditionnelles j\'attendais des semaines. Merci Eurovitas !'],
                                ['name' => 'Karim A.', 'poste' => 'Auto-entrepreneur', 'note' => 5, 'msg' => 'En tant qu\'indépendant, trouver un prêt était compliqué. Eurovitas a étudié mon dossier sérieusement et m\'a accordé ce dont j\'avais besoin.'],
                                ['name' => 'Isabelle R.', 'poste' => 'Responsable RH', 'note' => 5, 'msg' => 'Excellent suivi, conseiller disponible et à l\'écoute. Le tableau de bord en ligne pour suivre ses remboursements est très pratique.'],
                                ['name' => 'Marc P.', 'poste' => 'Commercial', 'note' => 4, 'msg' => 'Bon rapport qualité/prix. Le taux est honnête et les mensualités s\'adaptent à mon budget. Je recommande.'],
                                ['name' => 'Amina S.', 'poste' => 'Médecin', 'note' => 5, 'msg' => 'Service impeccable du début à la fin. J\'ai apprécié la totale transparence sur les coûts, aucun frais caché. Parfait.'],
                                ['name' => 'François G.', 'poste' => 'Ingénieur', 'note' => 5, 'msg' => 'J\'ai comparé plusieurs plateformes, Eurovitas offre les meilleures conditions. Versement rapide et sans complications.'],
                                ['name' => 'Laura V.', 'poste' => 'Graphiste', 'note' => 5, 'msg' => 'Simplicité et efficacité. Tout se fait en ligne, sans paperasse inutile. Mon prêt a été validé en un temps record.'],
                                ['name' => 'Rachid O.', 'poste' => 'Restaurateur', 'note' => 4, 'msg' => 'Bon service, conditions claires. J\'ai pu financer l\'équipement de mon restaurant sans stress. Je ferai à nouveau appel à Eurovitas.'],
                                ['name' => 'Chloé F.', 'poste' => 'Étudiante en master', 'note' => 5, 'msg' => 'Même en tant qu\'étudiante, j\'ai pu obtenir un prêt adapté à mes besoins. L\'équipe a su trouver la meilleure solution pour moi.'],
                                ['name' => 'David N.', 'poste' => 'Directeur commercial', 'note' => 5, 'msg' => 'Fiable, rapide et professionnel. Exactement ce qu\'on attend d\'une plateforme de financement moderne. Je n\'hésiterai pas à revenir.'],
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
                                                <h4 class="title">{{ $a['name'] }} <span class="verified-badge"><i class="fa-solid fa-circle-check"></i> Vérifié</span></h4>
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

