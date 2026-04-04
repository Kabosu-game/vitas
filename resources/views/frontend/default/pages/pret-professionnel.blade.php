@extends('frontend::pages.index')
@section('title') Prêt Professionnel @endsection
@section('meta_keywords') prêt professionnel, crédit entreprise, financement TPE, prêt indépendant, Eurovitas Finanzen @endsection
@section('meta_description') Financez le développement de votre activité professionnelle avec Eurovitas Finanzen. Prêt professionnel adapté aux TPE, indépendants et auto-entrepreneurs. @endsection

@section('page-content')

<section class="section-space">
    <div class="container">
        <div class="row gy-40 align-items-center">
            <div class="col-lg-6" data-aos="fade-right" data-aos-duration="1200">
                <span class="section-subtitle">Développez votre activité</span>
                <h2 class="section-title mb-20">Prêt Professionnel</h2>
                <p class="description mb-20">Que vous soyez auto-entrepreneur, artisan, commerçant, professionnel libéral ou dirigeant de TPE/PME, le <strong>prêt professionnel Eurovitas Finanzen</strong> est conçu pour accompagner toutes les étapes de la vie de votre entreprise : création, développement, acquisition de matériel ou renforcement de trésorerie.</p>
                <p class="description mb-20">Nous comprenons que l'accès au financement professionnel est souvent un parcours du combattant pour les petites structures. C'est pourquoi nous avons simplifié notre processus de demande et adapté nos critères d'éligibilité à la réalité des entrepreneurs d'aujourd'hui.</p>
                <p class="description">Avec Eurovitas Finanzen, votre projet d'entreprise bénéficie d'une analyse personnalisée, d'un conseiller dédié et d'une réponse rapide — parce que les opportunités professionnelles n'attendent pas.</p>
            </div>
            <div class="col-lg-6" data-aos="fade-left" data-aos-duration="1200">
                @include('frontend::pages._pret_sidebar', ['montant_min'=>'5 000 €', 'montant_max'=>'500 000 €', 'duree'=>'12 à 120 mois', 'taux'=>'Dès 4,2 % TAEG', 'delai'=>'48 à 96 heures', 'justif'=>'Kbis + bilans comptables (2 ans)'])
            </div>
        </div>

        <div class="row gy-30 mt-50">
            <div class="col-12"><h3 class="section-title" style="font-size:22px;">Nos financements professionnels</h3></div>
            @foreach([
                ['icon'=>'rocket','title'=>'Création d\'entreprise','desc'=>'Lancez votre activité sereinement : nous finançons votre fonds de roulement initial, vos premiers équipements et vos frais de démarrage pour les 12 premiers mois.'],
                ['icon'=>'trending-up','title'=>'Développement commercial','desc'=>'Recrutement, prospection, ouverture d\'une nouvelle agence, développement d\'un site e-commerce — financez votre croissance sans diluer votre capital.'],
                ['icon'=>'cpu','title'=>'Équipement & matériel','desc'=>'Machines, outils, informatique, logiciels métier, véhicules professionnels — amortissez vos investissements sur la durée de vie réelle de vos équipements.'],
                ['icon'=>'refresh-cw','title'=>'Trésorerie & BFR','desc'=>'Gérez vos décalages de trésorerie, financement du besoin en fonds de roulement, avance sur commandes clients ou gestion de saisonnalité.'],
                ['icon'=>'store','title'=>'Rachat de fonds de commerce','desc'=>'Reprise d\'une entreprise, achat d\'un fonds de commerce ou rachat de parts sociales : nous structurons le financement adapté à votre opération.'],
                ['icon'=>'leaf','title'=>'Transition digitale & RSE','desc'=>'Financement de votre transformation numérique, mise aux normes environnementales, certifications et audits de conformité pour pérenniser votre activité.'],
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
