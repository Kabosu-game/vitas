@extends('frontend::pages.index')
@section('title') Protection des Données (RGPD) @endsection
@section('meta_keywords') RGPD, protection données, DPO, Eurovitas Finanzen, vie privée @endsection
@section('meta_description') Politique de protection des données personnelles d'Eurovitas Finanzen conforme au RGPD. Vos droits, nos engagements, comment nous protégeons vos données. @endsection
@section('page-content')
<section class="section-space">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-9">
                <div class="frontend-editor-data">
                    <p><em>Conformément au Règlement Général sur la Protection des Données (RGPD — Règlement UE 2016/679) et à la loi Informatique et Libertés n°78-17 du 6 janvier 1978 modifiée, Eurovitas Finanzen SAS s'engage à protéger vos données personnelles.</em></p>

                    <h3>1. Responsable du traitement</h3>
                    <p><strong>Eurovitas Finanzen SAS</strong> — 14 Rue de la Paix, 75002 Paris<br>
                    Délégué à la Protection des Données (DPO) : <a href="mailto:admin@eurovitas.de">admin@eurovitas.de</a></p>

                    <h3>2. Données collectées</h3>
                    <p>Dans le cadre de nos services de prêt en ligne, nous collectons les données suivantes :</p>
                    <ul>
                        <li><strong>Données d'identité :</strong> nom, prénom, date de naissance, nationalité, pièce d'identité</li>
                        <li><strong>Données de contact :</strong> adresse email, numéro de téléphone, adresse postale</li>
                        <li><strong>Données financières :</strong> revenus, charges, relevés bancaires, IBAN</li>
                        <li><strong>Données de connexion :</strong> adresse IP, données de navigation, logs de connexion</li>
                        <li><strong>Données comportementales :</strong> pages visitées, durée de session (anonymisées)</li>
                    </ul>

                    <h3>3. Finalités et bases légales</h3>
                    <ul>
                        <li><strong>Exécution du contrat :</strong> traitement de votre demande de prêt, gestion de votre compte, suivi de vos remboursements</li>
                        <li><strong>Obligation légale :</strong> lutte contre le blanchiment (LCB-FT), conformité réglementaire ACPR, déclarations fiscales</li>
                        <li><strong>Intérêt légitime :</strong> prévention de la fraude, amélioration de nos services, sécurité informatique</li>
                        <li><strong>Consentement :</strong> envoi de communications marketing, cookies non essentiels (retirable à tout moment)</li>
                    </ul>

                    <h3>4. Durée de conservation</h3>
                    <ul>
                        <li>Données contractuelles : 5 ans après la fin du contrat de prêt</li>
                        <li>Données comptables : 10 ans (obligation légale)</li>
                        <li>Données LCB-FT : 5 ans après la fin de la relation commerciale</li>
                        <li>Données de prospects : 3 ans après le dernier contact</li>
                        <li>Logs de connexion : 12 mois</li>
                    </ul>

                    <h3>5. Vos droits</h3>
                    <p>Conformément au RGPD, vous disposez des droits suivants :</p>
                    <ul>
                        <li><strong>Droit d'accès</strong> (art. 15) : obtenir une copie de vos données</li>
                        <li><strong>Droit de rectification</strong> (art. 16) : corriger des données inexactes</li>
                        <li><strong>Droit à l'effacement</strong> (art. 17) : supprimer vos données sous certaines conditions</li>
                        <li><strong>Droit à la portabilité</strong> (art. 20) : recevoir vos données dans un format structuré</li>
                        <li><strong>Droit d'opposition</strong> (art. 21) : vous opposer au traitement à des fins de marketing</li>
                        <li><strong>Droit à la limitation</strong> (art. 18) : restreindre temporairement le traitement</li>
                    </ul>
                    <p>Pour exercer vos droits : <a href="mailto:admin@eurovitas.de">admin@eurovitas.de</a> ou par courrier à notre DPO, 14 Rue de la Paix, 75002 Paris. Réponse garantie sous 30 jours. Vous disposez également du droit de déposer une réclamation auprès de la <strong>CNIL</strong> : <a href="https://www.cnil.fr" target="_blank">www.cnil.fr</a></p>

                    <h3>6. Sécurité des données</h3>
                    <p>Nous mettons en œuvre des mesures techniques et organisationnelles appropriées : chiffrement SSL 256 bits, pseudonymisation, contrôle d'accès strict, audits de sécurité réguliers, hébergement certifié ISO 27001. En cas de violation de données, vous serez notifié dans les 72 heures si cela présente un risque élevé pour vos droits.</p>

                    <h3>7. Transferts hors UE</h3>
                    <p>Vos données sont hébergées dans l'Union Européenne. Tout transfert vers un pays tiers n'intervient que dans le cadre de garanties appropriées (clauses contractuelles types de la Commission européenne) et est documenté dans notre registre des traitements.</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
