@extends('frontend::pages.index')
@section('title') À Propos d'Eurovitas Finanzen @endsection
@section('meta_keywords') À propos, Eurovitas Finanzen, prêt en ligne, financement, confiance @endsection
@section('meta_description') Découvrez Eurovitas Finanzen, plateforme européenne de financement en ligne fondée sur la transparence, la rapidité et la confiance. @endsection

@section('page-content')

{{-- ═══ 1. INTRO ═══ --}}
<section class="about-area position-relative section-space">
    <div class="container">
        <div class="row gy-40 align-items-center">
            <div class="col-lg-6" data-aos="fade-right" data-aos-duration="1200">
                <div class="section-title-wrapper mb-30">
                    <span class="section-subtitle">Qui Nous Sommes</span>
                    <h2 class="section-title mb-20">Une plateforme de financement construite pour vous</h2>
                    <p class="description mb-20">Fondée en 2019, <strong>Eurovitas Finanzen</strong> est une plateforme européenne de prêt en ligne qui réinvente l'accès au crédit. Nous croyons que chaque individu mérite un accès rapide, transparent et équitable aux ressources financières — sans paperasse inutile, sans longue attente, sans mauvaises surprises.</p>
                    <p class="description mb-20">Notre mission est simple : mettre la technologie au service de l'humain pour offrir des solutions de financement adaptées à chaque situation de vie, qu'il s'agisse d'un besoin personnel, d'un projet professionnel ou d'une urgence imprévue.</p>
                    <p class="description">Avec plus de <strong>50 000 clients</strong> accompagnés dans toute l'Europe et un taux de satisfaction supérieur à <strong>97 %</strong>, Eurovitas Finanzen s'est imposée comme un acteur de référence du financement digital responsable.</p>
                </div>
                <div class="d-flex gap-20 flex-wrap mt-30">
                    <div class="about-stat-box">
                        <h3 class="stat-number">50 000+</h3>
                        <p class="stat-label">Clients accompagnés</p>
                    </div>
                    <div class="about-stat-box">
                        <h3 class="stat-number">97 %</h3>
                        <p class="stat-label">Taux de satisfaction</p>
                    </div>
                    <div class="about-stat-box">
                        <h3 class="stat-number">24h</h3>
                        <p class="stat-label">Délai de réponse moyen</p>
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
                <span class="section-subtitle" data-aos="fade-up">Nos Valeurs</span>
                <h2 class="section-title" data-aos="fade-up" data-aos-duration="1200">Ce qui nous guide chaque jour</h2>
            </div>
        </div>
        <div class="row gy-30">
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-duration="800">
                <div class="value-card">
                    <div class="value-icon"><i data-lucide="shield-check"></i></div>
                    <h4>Transparence totale</h4>
                    <p>Aucun frais caché, aucune clause ambiguë. Chaque condition de votre prêt vous est présentée clairement avant toute signature. Vous savez exactement ce que vous remboursez, quand et pourquoi.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-duration="1000">
                <div class="value-card">
                    <div class="value-icon"><i data-lucide="zap"></i></div>
                    <h4>Rapidité & Efficacité</h4>
                    <p>Notre processus 100 % digital vous permet d'obtenir une réponse de principe en moins de 24 heures. Le versement des fonds intervient sous 48 à 72 heures après validation de votre dossier.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-duration="1200">
                <div class="value-card">
                    <div class="value-icon"><i data-lucide="heart-handshake"></i></div>
                    <h4>Responsabilité</h4>
                    <p>Nous accordons des prêts de manière responsable en évaluant soigneusement chaque dossier. Notre objectif n'est pas de vendre du crédit, mais de proposer la solution la plus adaptée à votre situation réelle.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-duration="800">
                <div class="value-card">
                    <div class="value-icon"><i data-lucide="lock"></i></div>
                    <h4>Sécurité des données</h4>
                    <p>Vos informations personnelles et financières sont protégées par un chiffrement de niveau bancaire (SSL 256 bits). Nous sommes conformes au RGPD et ne revendons jamais vos données.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-duration="1000">
                <div class="value-card">
                    <div class="value-icon"><i data-lucide="users"></i></div>
                    <h4>Accessibilité pour tous</h4>
                    <p>Salariés, indépendants, étudiants ou retraités — Eurovitas Finanzen s'adapte à votre profil. Nous examinons chaque dossier individuellement, sans discrimination et avec bienveillance.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-duration="1200">
                <div class="value-card">
                    <div class="value-icon"><i data-lucide="trending-up"></i></div>
                    <h4>Innovation continue</h4>
                    <p>Notre équipe technique améliore constamment la plateforme pour vous offrir la meilleure expérience possible. Scoring intelligent, interface intuitive, suivi en temps réel de vos remboursements.</p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ═══ 3. NOTRE HISTOIRE ═══ --}}
<section class="section-space">
    <div class="container">
        <div class="row justify-content-center mb-50">
            <div class="col-lg-7 text-center">
                <span class="section-subtitle" data-aos="fade-up">Notre Histoire</span>
                <h2 class="section-title" data-aos="fade-up" data-aos-duration="1200">De l'idée à la réalité</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <div class="timeline">
                    <div class="timeline-item" data-aos="fade-up" data-aos-duration="800">
                        <div class="timeline-year">2019</div>
                        <div class="timeline-content">
                            <h4>Fondation d'Eurovitas Finanzen</h4>
                            <p>Trois entrepreneurs passionnés de fintech lancent Eurovitas Finanzen à Paris avec une vision claire : démocratiser l'accès au crédit en Europe grâce au numérique. La plateforme traite ses 500 premiers dossiers en quelques mois.</p>
                        </div>
                    </div>
                    <div class="timeline-item" data-aos="fade-up" data-aos-duration="900">
                        <div class="timeline-year">2020</div>
                        <div class="timeline-content">
                            <h4>Expansion & Agrément</h4>
                            <p>Eurovitas Finanzen obtient son agrément d'établissement de crédit auprès de l'Autorité de Contrôle Prudentiel et de Résolution (ACPR). Lancement de l'offre de prêt professionnel pour les indépendants et TPE.</p>
                        </div>
                    </div>
                    <div class="timeline-item" data-aos="fade-up" data-aos-duration="1000">
                        <div class="timeline-year">2021</div>
                        <div class="timeline-content">
                            <h4>10 000 clients franchis</h4>
                            <p>La confiance de nos clients nous propulse au cap symbolique des 10 000 dossiers financés. Lancement du tableau de bord client en temps réel et du module de remboursement anticipé sans pénalités.</p>
                        </div>
                    </div>
                    <div class="timeline-item" data-aos="fade-up" data-aos-duration="1100">
                        <div class="timeline-year">2022</div>
                        <div class="timeline-content">
                            <h4>Internationalisation</h4>
                            <p>Ouverture des services en Belgique, Suisse et Luxembourg. Intégration d'un moteur de scoring propriétaire basé sur l'intelligence artificielle pour des décisions plus justes et plus rapides.</p>
                        </div>
                    </div>
                    <div class="timeline-item" data-aos="fade-up" data-aos-duration="1200">
                        <div class="timeline-year">2024</div>
                        <div class="timeline-content">
                            <h4>Leader du financement digital</h4>
                            <p>Plus de 50 000 clients accompagnés, un taux de satisfaction de 97 % et une note moyenne de 4,8/5 sur les plateformes d'avis indépendantes. Eurovitas Finanzen continue d'innover pour vous.</p>
                        </div>
                    </div>
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
                <span class="section-subtitle">Pourquoi Eurovitas Finanzen</span>
                <h2 class="section-title mb-20">Ce qui nous différencie des banques traditionnelles</h2>
                <p class="description">Les banques classiques imposent des délais, des rendez-vous, des dossiers papier et des critères rigides. Chez Eurovitas Finanzen, tout est différent : nous avons conçu une expérience entièrement digitale, humaine et flexible.</p>
            </div>
            <div class="col-lg-7" data-aos="fade-left" data-aos-duration="1200">
                <div class="compare-table">
                    <div class="compare-row compare-header">
                        <div class="compare-cell"></div>
                        <div class="compare-cell text-center"><strong>Eurovitas Finanzen</strong></div>
                        <div class="compare-cell text-center"><strong>Banque traditionnelle</strong></div>
                    </div>
                    <div class="compare-row">
                        <div class="compare-cell">Délai de réponse</div>
                        <div class="compare-cell text-center compare-yes"><i class="fa-solid fa-check"></i> &lt; 24h</div>
                        <div class="compare-cell text-center compare-no">2 à 4 semaines</div>
                    </div>
                    <div class="compare-row">
                        <div class="compare-cell">Démarches 100 % en ligne</div>
                        <div class="compare-cell text-center compare-yes"><i class="fa-solid fa-check"></i> Oui</div>
                        <div class="compare-cell text-center compare-no"><i class="fa-solid fa-xmark"></i> Non</div>
                    </div>
                    <div class="compare-row">
                        <div class="compare-cell">Sans rendez-vous</div>
                        <div class="compare-cell text-center compare-yes"><i class="fa-solid fa-check"></i> Oui</div>
                        <div class="compare-cell text-center compare-no"><i class="fa-solid fa-xmark"></i> Non</div>
                    </div>
                    <div class="compare-row">
                        <div class="compare-cell">Frais cachés</div>
                        <div class="compare-cell text-center compare-yes"><i class="fa-solid fa-check"></i> Aucun</div>
                        <div class="compare-cell text-center compare-no">Fréquents</div>
                    </div>
                    <div class="compare-row">
                        <div class="compare-cell">Remboursement anticipé</div>
                        <div class="compare-cell text-center compare-yes"><i class="fa-solid fa-check"></i> Sans pénalité</div>
                        <div class="compare-cell text-center compare-no">Avec pénalité</div>
                    </div>
                    <div class="compare-row">
                        <div class="compare-cell">Support client dédié</div>
                        <div class="compare-cell text-center compare-yes"><i class="fa-solid fa-check"></i> 7j/7</div>
                        <div class="compare-cell text-center compare-no">Horaires limités</div>
                    </div>
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
                <span class="section-subtitle" data-aos="fade-up">L'Équipe</span>
                <h2 class="section-title" data-aos="fade-up" data-aos-duration="1200">Des experts à votre service</h2>
                <p class="description mt-10" data-aos="fade-up" data-aos-duration="1400">Notre équipe pluridisciplinaire réunit des experts en finance, technologie et relation client, tous animés par la même ambition : vous offrir la meilleure expérience de financement possible.</p>
            </div>
        </div>
        <div class="row gy-30 justify-content-center">
            @php
            $team = [
                ['name'=>'Alexandre Moreau','poste'=>'Co-fondateur & CEO','desc'=>'15 ans d\'expérience en banque d\'investissement. Ancien directeur chez BNP Paribas, Alexandre a fondé Eurovitas Finanzen pour rendre la finance plus accessible.'],
                ['name'=>'Sophie Laurent','poste'=>'Co-fondatrice & CTO','desc'=>'Ingénieure en informatique diplômée de l\'École Polytechnique. Sophie pilote l\'architecture technique et l\'IA de scoring de la plateforme.'],
                ['name'=>'Karim Benali','poste'=>'Directeur des Risques','desc'=>'Expert en analyse du risque crédit avec 12 ans d\'expérience. Karim garantit une gestion responsable et durable du portefeuille de prêts.'],
                ['name'=>'Marie Fontaine','poste'=>'Directrice Relation Client','desc'=>'Passionnée par l\'expérience client, Marie dirige une équipe de 30 conseillers dédiés à vous accompagner à chaque étape de votre projet.'],
            ];
            @endphp
            @foreach($team as $i => $member)
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


<style>
/* Stats */
.about-stat-box { background:var(--clr-bg-light,#f8fafc); border-radius:12px; padding:20px 24px; border:1px solid rgba(0,0,0,.07); min-width:130px; }
.dark .about-stat-box { background:rgba(255,255,255,.05); border-color:rgba(255,255,255,.08); }
.stat-number { font-size:28px; font-weight:800; color:var(--clr-theme-1,#4f46e5); margin:0; }
.stat-label { font-size:13px; color:#6b7280; margin:4px 0 0; }
.gap-20 { gap:20px; }

/* Values */
.value-card { background:#fff; border:1px solid rgba(0,0,0,.07); border-radius:14px; padding:30px; height:100%; transition:box-shadow .3s; }
.dark .value-card { background:rgba(255,255,255,.04); border-color:rgba(255,255,255,.08); }
.value-card:hover { box-shadow:0 8px 30px rgba(0,0,0,.1); }
.value-icon { width:48px; height:48px; background:rgba(79,70,229,.1); border-radius:12px; display:flex; align-items:center; justify-content:center; margin-bottom:16px; color:var(--clr-theme-1,#4f46e5); }
.value-icon svg { width:24px; height:24px; }
.value-card h4 { font-size:17px; font-weight:700; margin-bottom:10px; }
.value-card p { font-size:14px; color:#6b7280; margin:0; line-height:1.7; }

/* Timeline */
.timeline { position:relative; padding-left:60px; }
.timeline::before { content:''; position:absolute; left:28px; top:0; bottom:0; width:2px; background:rgba(79,70,229,.2); }
.timeline-item { position:relative; margin-bottom:40px; }
.timeline-item:last-child { margin-bottom:0; }
.timeline-year { position:absolute; left:-60px; top:0; width:56px; height:56px; background:var(--clr-theme-1,#4f46e5); color:#fff; border-radius:50%; display:flex; align-items:center; justify-content:center; font-weight:800; font-size:11px; text-align:center; line-height:1.2; }
.timeline-content { background:#fff; border:1px solid rgba(0,0,0,.07); border-radius:12px; padding:24px 28px; }
.dark .timeline-content { background:rgba(255,255,255,.04); border-color:rgba(255,255,255,.08); }
.timeline-content h4 { font-size:17px; font-weight:700; margin-bottom:8px; color:var(--clr-theme-1,#4f46e5); }
.timeline-content p { font-size:14px; color:#6b7280; margin:0; line-height:1.7; }

/* Compare table */
.compare-table { border-radius:14px; overflow:hidden; border:1px solid rgba(0,0,0,.08); }
.dark .compare-table { border-color:rgba(255,255,255,.08); }
.compare-row { display:grid; grid-template-columns:1fr 1fr 1fr; border-bottom:1px solid rgba(0,0,0,.06); }
.dark .compare-row { border-color:rgba(255,255,255,.06); }
.compare-row:last-child { border-bottom:none; }
.compare-header { background:var(--clr-theme-1,#4f46e5); color:#fff; }
.compare-header .compare-cell { color:#fff; font-size:14px; }
.compare-cell { padding:14px 16px; font-size:13px; display:flex; align-items:center; }
.compare-yes { color:#10b981; font-weight:600; justify-content:center; }
.compare-no { color:#ef4444; justify-content:center; }
.compare-row:nth-child(even) { background:rgba(0,0,0,.02); }
.dark .compare-row:nth-child(even) { background:rgba(255,255,255,.02); }

/* Team */
.team-card { background:#fff; border:1px solid rgba(0,0,0,.07); border-radius:14px; padding:30px 24px; text-align:center; height:100%; transition:box-shadow .3s; }
.dark .team-card { background:rgba(255,255,255,.04); border-color:rgba(255,255,255,.08); }
.team-card:hover { box-shadow:0 8px 30px rgba(0,0,0,.1); }
.team-avatar { width:64px; height:64px; border-radius:50%; background:var(--clr-theme-1,#4f46e5); color:#fff; display:flex; align-items:center; justify-content:center; font-size:26px; font-weight:800; margin:0 auto 16px; }
.team-name { font-size:17px; font-weight:700; margin-bottom:4px; }
.team-poste { font-size:13px; color:var(--clr-theme-1,#4f46e5); font-weight:600; margin-bottom:12px; }
.team-desc { font-size:13px; color:#6b7280; line-height:1.6; margin:0; }

/* CTA */
.tp-btn-white { background:#fff !important; color:var(--clr-theme-1,#4f46e5) !important; }
.mb-20 { margin-bottom:20px; }
.mb-30 { margin-bottom:30px; }
.mb-50 { margin-bottom:50px; }
.mt-10 { margin-top:10px; }
.mt-30 { margin-top:30px; }
</style>

@endsection
