@extends('frontend::pages.index')
@section('title') Prêt Agricole @endsection
@section('meta_keywords') prêt agricole, crédit agriculteur, financement exploitation, Eurovitas Finanzen @endsection
@section('meta_description') Financez votre exploitation agricole avec le prêt agricole Eurovitas Finanzen. Conditions adaptées aux cycles saisonniers, montants élevés, taux compétitifs. @endsection

@section('page-content')

<section class="section-space">
    <div class="container">
        <div class="row gy-40 align-items-center">
            <div class="col-lg-6" data-aos="fade-right" data-aos-duration="1200">
                <span class="section-subtitle">Soutenir l'agriculture</span>
                <h2 class="section-title mb-20">Prêt Agricole</h2>
                <p class="description mb-20">L'agriculture est un secteur d'activité aux contraintes financières uniques : saisonnalité des revenus, besoins en équipements lourds, aléas climatiques et délais entre investissement et récolte. Le <strong>prêt agricole Eurovitas Finanzen</strong> a été conçu spécifiquement pour répondre à ces réalités du terrain.</p>
                <p class="description mb-20">Que vous soyez agriculteur exploitant, maraîcher, éleveur, viticulteur ou en cours d'installation, notre offre s'adapte à votre cycle d'activité. Nous proposons des remboursements calés sur vos rentrées de trésorerie et des montants suffisants pour couvrir des investissements structurants.</p>
                <p class="description">Nos chargés de clientèle spécialisés comprennent les enjeux du monde agricole et vous accompagnent avec une approche humaine et pragmatique, loin des modèles rigides des banques classiques.</p>
            </div>
            <div class="col-lg-6" data-aos="fade-left" data-aos-duration="1200">
                @include('frontend::pages._pret_sidebar', ['montant_min'=>'5 000 €', 'montant_max'=>'200 000 €', 'duree'=>'12 à 180 mois', 'taux'=>'Dès 3,5 % TAEG', 'delai'=>'48 à 96 heures', 'justif'=>'Bilan exploitation / Kbis'])
            </div>
        </div>

        <div class="row gy-30 mt-50">
            <div class="col-12"><h3 class="section-title" style="font-size:22px;">Nos financements agricoles couvrent</h3></div>
            @foreach([
                ['icon'=>'tractor','title'=>'Matériel agricole','desc'=>'Tracteurs, moissonneuses, semoirs, irrigation, serres — financez vos équipements agricoles avec des remboursements adaptés à votre cycle de production.'],
                ['icon'=>'land-plot','title'=>'Achat de terres','desc'=>'Acquisition de parcelles agricoles, agrandissement d\'exploitation ou reprise d\'une ferme : nous finançons votre projet foncier à des conditions avantageuses.'],
                ['icon'=>'warehouse','title'=>'Bâtiments d\'exploitation','desc'=>'Construction ou rénovation de hangars, silos, étables, caves viticoles — tous vos bâtiments agricoles peuvent bénéficier d\'un financement sur-mesure.'],
                ['icon'=>'sprout','title'=>'Semences & intrants','desc'=>'Anticipez vos besoins en semences, engrais, produits phytosanitaires et intrants avant la saison, sans peser sur votre trésorerie courante.'],
                ['icon'=>'sun','title'=>'Énergie & transition écologique','desc'=>'Panneaux solaires, méthanisation, agriculture biologique, irrigation raisonnée — nous soutenons votre transition vers une agriculture durable.'],
                ['icon'=>'refresh-cw','title'=>'Remboursement saisonnier','desc'=>'Vos mensualités s\'adaptent à vos rentrées de trésorerie : remboursements modulables selon les saisons de récolte, sans pénalité de report.'],
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
