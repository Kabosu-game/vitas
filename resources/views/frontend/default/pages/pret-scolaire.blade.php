@extends('frontend::pages.index')
@section('title') Prêt Scolaire @endsection
@section('meta_keywords') prêt scolaire, crédit étudiant, financement études, bourse Eurovitas Finanzen @endsection
@section('meta_description') Financez vos études ou celles de vos enfants avec le prêt scolaire Eurovitas Finanzen. Taux préférentiels, remboursement différé, réponse rapide. @endsection

@section('page-content')

<section class="section-space">
    <div class="container">
        <div class="row gy-40 align-items-center">
            <div class="col-lg-6" data-aos="fade-right" data-aos-duration="1200">
                <span class="section-subtitle">Investir dans l'avenir</span>
                <h2 class="section-title mb-20">Prêt Scolaire</h2>
                <p class="description mb-20">L'éducation est le meilleur investissement que vous puissiez faire. Le <strong>prêt scolaire Eurovitas Finanzen</strong> est conçu pour financer les frais de scolarité, le logement étudiant, le matériel pédagogique, les formations professionnelles ou les études à l'étranger — pour vous ou pour vos enfants.</p>
                <p class="description mb-20">Nous proposons des conditions spécialement adaptées aux étudiants et aux familles : taux préférentiels, possibilité de différer le début des remboursements jusqu'à la fin des études, et mensualités allégées pendant la période de formation.</p>
                <p class="description">Parce qu'aucun projet éducatif ne devrait être compromis par un manque de financement, Eurovitas Finanzen s'engage à vos côtés dès le premier cours jusqu'à l'obtention de votre diplôme.</p>
            </div>
            <div class="col-lg-6" data-aos="fade-left" data-aos-duration="1200">
                @include('frontend::pages._pret_sidebar', ['montant_min'=>'500 €', 'montant_max'=>'30 000 €', 'duree'=>'12 à 120 mois', 'taux'=>'Dès 2,9 % TAEG', 'delai'=>'24 à 48 heures', 'justif'=>'Justificatif de scolarité / inscription'])
            </div>
        </div>

        <div class="row gy-30 mt-50">
            <div class="col-12"><h3 class="section-title" style="font-size:22px;">Ce que couvre notre Prêt Scolaire</h3></div>
            @foreach([
                ['icon'=>'graduation-cap','title'=>'Frais de scolarité','desc'=>'Universités, grandes écoles, BTS, lycées privés, formations professionnelles ou certifications : tous les établissements agréés sont éligibles.'],
                ['icon'=>'home','title'=>'Logement étudiant','desc'=>'Caution, premier loyer, résidence universitaire ou colocation — nous finançons votre installation pour que vous puissiez vous concentrer sur vos études.'],
                ['icon'=>'plane','title'=>'Études à l\'étranger','desc'=>'Erasmus, semestre international, double diplôme : nos prêts couvrent les frais d\'inscription, de visa, de transport et de séjour à l\'étranger.'],
                ['icon'=>'book-open','title'=>'Matériel pédagogique','desc'=>'Ordinateur, logiciels, livres, fournitures professionnelles — tout ce qui est nécessaire à votre réussite académique peut être financé.'],
                ['icon'=>'calendar','title'=>'Remboursement différé','desc'=>'Commencez à rembourser uniquement à la fin de vos études. Pendant votre formation, vous ne payez que les intérêts, voire rien du tout selon votre dossier.'],
                ['icon'=>'trending-up','title'=>'Taux préférentiels étudiants','desc'=>'Nos taux pour les prêts scolaires sont parmi les plus compétitifs du marché, avec des conditions spécialement négociées pour les profils étudiants.'],
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
