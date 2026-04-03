@extends('frontend::pages.index')
@section('title') Prêt Immobilier @endsection
@section('meta_keywords') prêt immobilier, crédit immobilier, achat appartement, financement maison, Eurovitas @endsection
@section('meta_description') Réalisez votre projet immobilier avec Eurovitas. Prêt immobilier compétitif, accompagnement personnalisé, réponse rapide pour votre achat ou rénovation. @endsection

@section('page-content')

<section class="section-space">
    <div class="container">
        <div class="row gy-40 align-items-center">
            <div class="col-lg-6" data-aos="fade-right" data-aos-duration="1200">
                <span class="section-subtitle">Votre patrimoine, notre priorité</span>
                <h2 class="section-title mb-20">Prêt Immobilier</h2>
                <p class="description mb-20">Acquérir un bien immobilier est souvent le projet d'une vie. Le <strong>prêt immobilier Eurovitas</strong> vous accompagne à chaque étape : de la recherche du financement optimal jusqu'à la signature chez le notaire, avec des conditions transparentes et un accompagnement personnalisé.</p>
                <p class="description mb-20">Que vous souhaitiez acheter votre résidence principale, une résidence secondaire, un bien locatif ou financer des travaux de rénovation, nous étudions votre dossier de manière globale pour vous proposer la solution la plus adaptée à votre situation patrimoniale.</p>
                <p class="description">Taux fixes ou révisables, modulation des mensualités, assurance emprunteur compétitive — notre équipe de spécialistes vous guide vers le montage financier le plus avantageux.</p>
            </div>
            <div class="col-lg-6" data-aos="fade-left" data-aos-duration="1200">
                @include('frontend::pages._pret_sidebar', ['montant_min'=>'30 000 €', 'montant_max'=>'1 000 000 €', 'duree'=>'5 à 25 ans', 'taux'=>'Dès 2,5 % TAEG', 'delai'=>'5 à 10 jours ouvrés', 'justif'=>'Compromis de vente / devis travaux'])
            </div>
        </div>

        <div class="row gy-30 mt-50">
            <div class="col-12"><h3 class="section-title" style="font-size:22px;">Nos solutions immobilières</h3></div>
            @foreach([
                ['icon'=>'home','title'=>'Résidence principale','desc'=>'Financez l\'achat de votre maison ou appartement principal avec un prêt immobilier aux meilleures conditions, incluant la possibilité d\'un prêt à taux zéro complémentaire.'],
                ['icon'=>'building','title'=>'Investissement locatif','desc'=>'Développez votre patrimoine immobilier grâce à nos financements dédiés à l\'investissement locatif. Nous optimisons votre montage pour maximiser votre rendement.'],
                ['icon'=>'hammer','title'=>'Travaux & Rénovation','desc'=>'Rénovation énergétique, extension, aménagement — financer vos travaux avec un prêt immobilier vous permet de bénéficier de taux plus avantageux qu\'un prêt personnel.'],
                ['icon'=>'key','title'=>'Rachat de crédit immobilier','desc'=>'Vous avez déjà un prêt immobilier à taux élevé ? Nous pouvons le racheter et vous proposer un taux plus compétitif, réduisant ainsi vos mensualités.'],
                ['icon'=>'shield-check','title'=>'Assurance emprunteur','desc'=>'Nos contrats d\'assurance emprunteur sont négociés pour vous offrir une couverture optimale (décès, invalidité, perte d\'emploi) au meilleur tarif du marché.'],
                ['icon'=>'calculator','title'=>'Simulation gratuite','desc'=>'Utilisez notre calculateur en ligne pour simuler votre prêt immobilier en quelques secondes et obtenir une estimation précise de vos mensualités.'],
            ] as $item)
            <div class="col-lg-4 col-md-6" data-aos="fade-up">
                @include('frontend::pages._pret_feature', $item)
            </div>
            @endforeach
        </div>

        @include('frontend::pages._pret_cta')
    </div>
</section>

@endsection
