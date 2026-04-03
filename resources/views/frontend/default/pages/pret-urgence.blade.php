@extends('frontend::pages.index')
@section('title') Prêt d'Urgence @endsection
@section('meta_keywords') prêt urgence, crédit rapide, financement express, prêt immédiat, Eurovitas @endsection
@section('meta_description') Besoin de liquidités rapidement ? Le prêt d'urgence Eurovitas est versé sous 24h. Montants de 500 à 10 000 €, dossier simplifié, réponse immédiate. @endsection

@section('page-content')

<section class="section-space">
    <div class="container">
        <div class="row gy-40 align-items-center">
            <div class="col-lg-6" data-aos="fade-right" data-aos-duration="1200">
                <span class="section-subtitle">Quand chaque heure compte</span>
                <h2 class="section-title mb-20">Prêt d'Urgence</h2>
                <p class="description mb-20">Une panne de voiture, une urgence médicale, une facture imprévue, un loyer en retard — la vie réserve parfois des situations qui exigent des liquidités immédiates. Le <strong>prêt d'urgence Eurovitas</strong> a été spécialement conçu pour ces moments : processus ultra-simplifié, réponse en quelques heures, versement des fonds sous 24h.</p>
                <p class="description mb-20">Notre priorité absolue est la rapidité sans compromettre la sécurité. Grâce à notre système d'analyse automatisé, votre dossier est traité en temps réel. Une fois validé, les fonds sont virés directement sur votre compte bancaire dans les meilleurs délais.</p>
                <p class="description">Le prêt d'urgence Eurovitas est disponible 7 jours sur 7, y compris les week-ends et jours fériés. Parce que les urgences ne connaissent pas les horaires de bureau.</p>
            </div>
            <div class="col-lg-6" data-aos="fade-left" data-aos-duration="1200">
                @include('frontend::pages._pret_sidebar', ['montant_min'=>'500 €', 'montant_max'=>'10 000 €', 'duree'=>'3 à 36 mois', 'taux'=>'Dès 5,9 % TAEG', 'delai'=>'Sous 24 heures', 'justif'=>'Pièce d\'identité + RIB uniquement'])
            </div>
        </div>

        <div class="row gy-30 mt-50">
            <div class="col-12"><h3 class="section-title" style="font-size:22px;">Pourquoi faire confiance à Eurovitas en urgence ?</h3></div>
            @foreach([
                ['icon'=>'zap','title'=>'Réponse en quelques heures','desc'=>'Notre algorithme de scoring analyse votre dossier automatiquement et vous donne une réponse de principe en 2 à 4 heures après soumission, même le week-end.'],
                ['icon'=>'banknote','title'=>'Virement sous 24h','desc'=>'Dès que votre dossier est validé et votre contrat signé électroniquement, les fonds sont virés sur votre compte bancaire sous 24 heures ouvrées.'],
                ['icon'=>'file-text','title'=>'Dossier minimal','desc'=>'Pièce d\'identité valide et RIB — c\'est tout ce dont nous avons besoin pour un prêt d\'urgence. Pas de justificatif d\'utilisation, pas de caution exigée.'],
                ['icon'=>'calendar','title'=>'Remboursement flexible','desc'=>'Choisissez librement la durée de remboursement entre 3 et 36 mois. Vous pouvez ajuster vos mensualités selon votre capacité financière du moment.'],
                ['icon'=>'clock','title'=>'Disponible 7j/7','desc'=>'Notre plateforme traite les demandes de prêt d\'urgence tous les jours de la semaine, y compris samedi, dimanche et jours fériés. L\'urgence n\'a pas d\'horaires.'],
                ['icon'=>'lock','title'=>'Sécurisé & confidentiel','desc'=>'Toutes vos données sont chiffrées et protégées. Votre demande de prêt d\'urgence est traitée dans la plus stricte confidentialité, sans aucun impact sur votre entourage.'],
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
