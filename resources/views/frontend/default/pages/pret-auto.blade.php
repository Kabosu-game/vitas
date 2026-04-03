@extends('frontend::pages.index')
@section('title') Prêt Auto @endsection
@section('meta_keywords') prêt auto, crédit voiture, financement véhicule, achat voiture, Eurovitas @endsection
@section('meta_description') Financez votre véhicule neuf ou d'occasion avec le prêt auto Eurovitas. Taux compétitifs, sans apport obligatoire, réponse en 24h. @endsection

@section('page-content')

<section class="section-space">
    <div class="container">
        <div class="row gy-40 align-items-center">
            <div class="col-lg-6" data-aos="fade-right" data-aos-duration="1200">
                <span class="section-subtitle">Prenez le volant</span>
                <h2 class="section-title mb-20">Prêt Auto</h2>
                <p class="description mb-20">Voiture neuve, véhicule d'occasion, deux-roues ou utilitaire — le <strong>prêt auto Eurovitas</strong> finance l'achat de votre véhicule quelle que soit sa nature. Nous vous proposons un financement rapide, sans apport obligatoire, avec des taux parmi les plus compétitifs du marché.</p>
                <p class="description mb-20">Contrairement au crédit-bail ou à la LOA, notre prêt auto classique vous rend immédiatement propriétaire de votre véhicule. Vous négociez votre achat comme si vous payiez comptant — ce qui vous permet souvent d'obtenir une remise supplémentaire chez le concessionnaire.</p>
                <p class="description">Véhicule électrique, hybride ou thermique, chez un particulier ou un professionnel : notre prêt auto s'adapte à toutes les situations, y compris les achats à l'étranger dans l'espace européen.</p>
            </div>
            <div class="col-lg-6" data-aos="fade-left" data-aos-duration="1200">
                @include('frontend::pages._pret_sidebar', ['montant_min'=>'3 000 €', 'montant_max'=>'80 000 €', 'duree'=>'12 à 84 mois', 'taux'=>'Dès 3,2 % TAEG', 'delai'=>'24 à 48 heures', 'justif'=>'Bon de commande / carte grise'])
            </div>
        </div>

        <div class="row gy-30 mt-50">
            <div class="col-12"><h3 class="section-title" style="font-size:22px;">Tous vos projets automobile</h3></div>
            @foreach([
                ['icon'=>'car','title'=>'Véhicule neuf','desc'=>'Financez votre voiture neuve chez n\'importe quel concessionnaire agréé en Europe. Devenez propriétaire immédiat et profitez de toutes les garanties constructeur.'],
                ['icon'=>'search','title'=>'Véhicule d\'occasion','desc'=>'Achat chez un professionnel ou un particulier, véhicule jusqu\'à 10 ans et 150 000 km — nous finançons votre voiture d\'occasion aux meilleures conditions.'],
                ['icon'=>'zap','title'=>'Véhicule électrique','desc'=>'Bénéficiez de nos conditions préférentielles pour l\'achat d\'un véhicule 100 % électrique ou hybride rechargeable, cumulables avec les aides gouvernementales.'],
                ['icon'=>'truck','title'=>'Utilitaire & professionnel','desc'=>'Camionnette, fourgon, utilitaire de chantier — notre prêt auto professionnel finance vos véhicules de travail avec des mensualités déductibles fiscalement.'],
                ['icon'=>'dollar-sign','title'=>'Sans apport obligatoire','desc'=>'Vous n\'avez pas d\'apport ? Pas de problème. Nous finançons jusqu\'à 100 % du montant de votre véhicule selon votre profil et votre capacité de remboursement.'],
                ['icon'=>'refresh-cw','title'=>'Rachat de crédit auto','desc'=>'Votre crédit auto actuel est trop cher ? Nous le rachetons et vous proposons un nouveau taux plus compétitif pour alléger vos mensualités immédiatement.'],
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
