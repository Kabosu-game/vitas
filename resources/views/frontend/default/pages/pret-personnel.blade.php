@extends('frontend::pages.index')
@section('title') Prêt Personnel @endsection
@section('meta_keywords') prêt personnel, crédit personnel, financement personnel, Eurovitas @endsection
@section('meta_description') Financez vos projets personnels avec le prêt personnel Eurovitas. Réponse en 24h, taux compétitifs, sans justificatif d'utilisation. @endsection

@section('page-content')

<section class="section-space">
    <div class="container">
        <div class="row gy-40 align-items-center">
            <div class="col-lg-6" data-aos="fade-right" data-aos-duration="1200">
                <span class="section-subtitle">Financement flexible</span>
                <h2 class="section-title mb-20">Prêt Personnel</h2>
                <p class="description mb-20">Le <strong>prêt personnel Eurovitas</strong> est la solution idéale pour financer tous vos projets sans avoir à justifier l'utilisation des fonds. Voyage, rénovation, mariage, équipement électroménager ou dépense imprévue — vous disposez librement des fonds versés sur votre compte.</p>
                <p class="description mb-20">Avec un processus entièrement en ligne et une réponse de principe sous 24 heures, nous vous garantissons une expérience rapide, transparente et sans stress. Nos conseillers sont disponibles 7j/7 pour vous accompagner dans le choix du montant et de la durée les mieux adaptés à votre budget.</p>
                <p class="description">Aucun frais de dossier caché. Aucune pénalité en cas de remboursement anticipé. C'est le prêt pensé pour votre liberté.</p>
            </div>
            <div class="col-lg-6" data-aos="fade-left" data-aos-duration="1200">
                @include('frontend::pages._pret_sidebar', ['montant_min'=>'1 000 €', 'montant_max'=>'50 000 €', 'duree'=>'6 à 84 mois', 'taux'=>'Dès 3,9 % TAEG', 'delai'=>'24 à 72 heures', 'justif'=>'Aucun justificatif d\'utilisation'])
            </div>
        </div>

        <div class="row gy-30 mt-50">
            <div class="col-12"><h3 class="section-title" style="font-size:22px;">Pourquoi choisir notre Prêt Personnel ?</h3></div>
            @foreach([
                ['icon'=>'wallet','title'=>'Liberté totale d\'utilisation','desc'=>'Aucune restriction sur l\'affectation des fonds. Vous utilisez votre prêt comme vous l\'entendez, sans avoir à fournir de justificatifs.'],
                ['icon'=>'clock','title'=>'Réponse en 24h','desc'=>'Grâce à notre système de scoring digital, votre dossier est analysé en temps réel et vous obtenez une réponse de principe sous 24 heures ouvrées.'],
                ['icon'=>'percent','title'=>'Taux fixes garantis','desc'=>'Votre taux est fixé dès la signature et ne changera jamais. Vous connaissez exactement le montant de chaque mensualité jusqu\'au dernier remboursement.'],
                ['icon'=>'file-check','title'=>'Dossier simplifié','desc'=>'Pièce d\'identité, justificatif de revenus et RIB — c\'est tout ce dont nous avons besoin. Pas de paperasse inutile, pas de déplacement en agence.'],
                ['icon'=>'shield-check','title'=>'Remboursement anticipé gratuit','desc'=>'Vous pouvez rembourser votre prêt en avance à tout moment, partiellement ou en totalité, sans aucune pénalité ni frais supplémentaires.'],
                ['icon'=>'headphones','title'=>'Support dédié 7j/7','desc'=>'Nos conseillers sont disponibles tous les jours pour répondre à vos questions, vous aider à constituer votre dossier ou ajuster votre plan de remboursement.'],
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
