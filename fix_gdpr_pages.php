<?php

require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$app->make(\Illuminate\Contracts\Console\Kernel::class)->bootstrap();

$langs = ['fr', 'de', 'es', 'pt', 'et', 'lv', 'lt', 'en'];

$fixes = [
    'fr' => [
        'gdpr_intro'          => 'Conformément au Règlement Général sur la Protection des Données (RGPD — Règlement UE 2016/679), Eurovitas Finanzen GmbH s\'engage à protéger vos données personnelles.',
        'gdpr_section1_text'  => '<strong>Eurovitas Finanzen GmbH</strong> — Allemagne<br>Délégué à la Protection des Données (DPO) : <a href="mailto:admin@eurovitas.de">admin@eurovitas.de</a>',
        'gdpr_legal_purpose'  => 'Obligation légale : lutte contre le blanchiment (AML/FT), conformité réglementaire BaFin / Deutsche Bundesbank, déclarations fiscales',
        'gdpr_rights_exercise'=> 'Pour exercer vos droits : <a href="mailto:admin@eurovitas.de">admin@eurovitas.de</a>. Réponse garantie sous 30 jours. Vous disposez également du droit d\'introduire une réclamation auprès de l\'autorité de protection des données compétente (<strong>BfDI</strong>) : <a href="https://www.bfdi.bund.de" target="_blank">www.bfdi.bund.de</a>',
        'gdpr_aml_data'       => 'Données AML/FT : 5 ans après fin de la relation d\'affaires',
    ],
    'de' => [
        'gdpr_intro'          => 'Gemäß der Datenschutz-Grundverordnung (DSGVO — EU-Verordnung 2016/679) verpflichtet sich Eurovitas Finanzen GmbH zum Schutz Ihrer personenbezogenen Daten.',
        'gdpr_section1_text'  => '<strong>Eurovitas Finanzen GmbH</strong> — Deutschland<br>Datenschutzbeauftragter (DSB) : <a href="mailto:admin@eurovitas.de">admin@eurovitas.de</a>',
        'gdpr_legal_purpose'  => 'Gesetzliche Verpflichtung: Geldwäschebekämpfung (GwG), regulatorische Compliance BaFin / Deutsche Bundesbank, Steuererklärungen',
        'gdpr_rights_exercise'=> 'Um Ihre Rechte auszuüben: <a href="mailto:admin@eurovitas.de">admin@eurovitas.de</a>. Antwort garantiert innerhalb von 30 Tagen. Sie haben auch das Recht, eine Beschwerde beim <strong>Bundesbeauftragten für den Datenschutz (BfDI)</strong> einzureichen: <a href="https://www.bfdi.bund.de" target="_blank">www.bfdi.bund.de</a>',
        'gdpr_aml_data'       => 'GwG-Daten: 5 Jahre nach Ende der Geschäftsbeziehung',
    ],
    'es' => [
        'gdpr_intro'          => 'De conformidad con el Reglamento General de Protección de Datos (RGPD — Reglamento UE 2016/679), Eurovitas Finanzen GmbH se compromete a proteger sus datos personales.',
        'gdpr_section1_text'  => '<strong>Eurovitas Finanzen GmbH</strong> — Alemania<br>Delegado de Protección de Datos (DPD): <a href="mailto:admin@eurovitas.de">admin@eurovitas.de</a>',
        'gdpr_legal_purpose'  => 'Obligación legal: lucha contra el blanqueo de capitales (AML/FT), cumplimiento normativo BaFin / Deutsche Bundesbank, declaraciones fiscales',
        'gdpr_rights_exercise'=> 'Para ejercer sus derechos: <a href="mailto:admin@eurovitas.de">admin@eurovitas.de</a>. Respuesta garantizada en 30 días. También tiene derecho a presentar una reclamación ante la autoridad de protección de datos (<strong>BfDI</strong>): <a href="https://www.bfdi.bund.de" target="_blank">www.bfdi.bund.de</a>',
        'gdpr_aml_data'       => 'Datos AML/FT: 5 años tras el fin de la relación comercial',
    ],
    'pt' => [
        'gdpr_intro'          => 'Em conformidade com o Regulamento Geral sobre a Proteção de Dados (RGPD — Regulamento UE 2016/679), a Eurovitas Finanzen GmbH compromete-se a proteger os seus dados pessoais.',
        'gdpr_section1_text'  => '<strong>Eurovitas Finanzen GmbH</strong> — Alemanha<br>Responsável pela Proteção de Dados (RPD): <a href="mailto:admin@eurovitas.de">admin@eurovitas.de</a>',
        'gdpr_legal_purpose'  => 'Obrigação legal: combate ao branqueamento de capitais (AML/FT), conformidade regulatória BaFin / Deutsche Bundesbank, declarações fiscais',
        'gdpr_rights_exercise'=> 'Para exercer os seus direitos: <a href="mailto:admin@eurovitas.de">admin@eurovitas.de</a>. Resposta garantida em 30 dias. Tem também o direito de apresentar uma reclamação à autoridade de proteção de dados (<strong>BfDI</strong>): <a href="https://www.bfdi.bund.de" target="_blank">www.bfdi.bund.de</a>',
        'gdpr_aml_data'       => 'Dados AML/FT: 5 anos após o fim da relação comercial',
    ],
    'et' => [
        'gdpr_intro'          => 'Vastavalt isikuandmete kaitse üldmäärusele (GDPR — EL määrus 2016/679) kohustub Eurovitas Finanzen GmbH kaitsma teie isikuandmeid.',
        'gdpr_section1_text'  => '<strong>Eurovitas Finanzen GmbH</strong> — Saksamaa<br>Andmekaitseametnik (DPO): <a href="mailto:admin@eurovitas.de">admin@eurovitas.de</a>',
        'gdpr_legal_purpose'  => 'Seaduslik kohustus: rahapesu tõkestamine (AML/FT), BaFin / Deutsche Bundesbanki regulatiivne vastavus, maksudeklaratsioonid',
        'gdpr_rights_exercise'=> 'Õiguste kasutamiseks: <a href="mailto:admin@eurovitas.de">admin@eurovitas.de</a>. Vastus garanteeritud 30 päeva jooksul. Teil on ka õigus esitada kaebus andmekaitseasutusele (<strong>BfDI</strong>): <a href="https://www.bfdi.bund.de" target="_blank">www.bfdi.bund.de</a>',
        'gdpr_aml_data'       => 'AML/FT andmed: 5 aastat pärast ärisuhte lõppemist',
    ],
    'lv' => [
        'gdpr_intro'          => 'Saskaņā ar Vispārīgo datu aizsardzības regulu (GDPR — ES regula 2016/679) Eurovitas Finanzen GmbH apņemas aizsargāt jūsu personas datus.',
        'gdpr_section1_text'  => '<strong>Eurovitas Finanzen GmbH</strong> — Vācija<br>Datu aizsardzības speciālists (DPO): <a href="mailto:admin@eurovitas.de">admin@eurovitas.de</a>',
        'gdpr_legal_purpose'  => 'Juridisks pienākums: cīņa pret nelikumīgi iegūtu līdzekļu legalizāciju (AML/FT), BaFin / Deutsche Bundesbank atbilstība, nodokļu deklarācijas',
        'gdpr_rights_exercise'=> 'Lai izmantotu savas tiesības: <a href="mailto:admin@eurovitas.de">admin@eurovitas.de</a>. Atbilde garantēta 30 dienu laikā. Jums ir arī tiesības iesniegt sūdzību datu aizsardzības iestādei (<strong>BfDI</strong>): <a href="https://www.bfdi.bund.de" target="_blank">www.bfdi.bund.de</a>',
        'gdpr_aml_data'       => 'AML/FT dati: 5 gadi pēc darījumu attiecību beigām',
    ],
    'lt' => [
        'gdpr_intro'          => 'Laikydamasi Bendrojo duomenų apsaugos reglamento (BDAR — ES reglamentas 2016/679), Eurovitas Finanzen GmbH įsipareigoja saugoti jūsų asmens duomenis.',
        'gdpr_section1_text'  => '<strong>Eurovitas Finanzen GmbH</strong> — Vokietija<br>Duomenų apsaugos pareigūnas (DPO): <a href="mailto:admin@eurovitas.de">admin@eurovitas.de</a>',
        'gdpr_legal_purpose'  => 'Teisinė prievolė: kova su pinigų plovimu (AML/FT), BaFin / Deutsche Bundesbank reikalavimų laikymasis, mokesčių deklaracijos',
        'gdpr_rights_exercise'=> 'Norėdami pasinaudoti savo teisėmis: <a href="mailto:admin@eurovitas.de">admin@eurovitas.de</a>. Atsakymas garantuotas per 30 dienų. Taip pat turite teisę pateikti skundą duomenų apsaugos institucijai (<strong>BfDI</strong>): <a href="https://www.bfdi.bund.de" target="_blank">www.bfdi.bund.de</a>',
        'gdpr_aml_data'       => 'AML/FT duomenys: 5 metai po verslo santykių pabaigos',
    ],
    'en' => [
        'gdpr_intro'          => 'In accordance with the General Data Protection Regulation (GDPR — EU Regulation 2016/679), Eurovitas Finanzen GmbH is committed to protecting your personal data.',
        'gdpr_section1_text'  => '<strong>Eurovitas Finanzen GmbH</strong> — Germany<br>Data Protection Officer (DPO): <a href="mailto:admin@eurovitas.de">admin@eurovitas.de</a>',
        'gdpr_legal_purpose'  => 'Legal obligation: anti-money laundering (AML/FT), BaFin / Deutsche Bundesbank regulatory compliance, tax filings',
        'gdpr_rights_exercise'=> 'To exercise your rights: <a href="mailto:admin@eurovitas.de">admin@eurovitas.de</a>. Response guaranteed within 30 days. You also have the right to lodge a complaint with the data protection authority (<strong>BfDI</strong>): <a href="https://www.bfdi.bund.de" target="_blank">www.bfdi.bund.de</a>',
        'gdpr_aml_data'       => 'AML/FT data: 5 years after end of business relationship',
    ],
];

foreach ($langs as $lang) {
    $file = __DIR__ . "/resources/lang/{$lang}.json";
    if (!file_exists($file)) continue;

    $data = json_decode(file_get_contents($file), true);
    if (!$data) { echo "Erreur JSON: {$lang}.json\n"; continue; }

    if (isset($fixes[$lang])) {
        foreach ($fixes[$lang] as $key => $value) {
            $data[$key] = $value;
        }
    }

    file_put_contents($file, json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES));
    echo "Mis à jour : {$lang}.json\n";
}

echo "\nTerminé.\n";
