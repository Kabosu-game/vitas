<?php

require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$app->make(\Illuminate\Contracts\Console\Kernel::class)->bootstrap();

$langs = ['de', 'es', 'pt', 'et', 'lv', 'lt', 'fr', 'en'];

$section2 = [
    'de' => 'Eurovitas Finanzen GmbH ist ein Kreditinstitut, das von der <strong>Deutschen Bundesbank<\/strong> zugelassen ist. Genehmigungsnummer: <strong>BANK-001<\/strong>. Unsere Genehmigung ermöglicht uns die Kreditvergabe in mehreren Ländern dank unserer Partnerschaft mit der <strong>Weltbank<\/strong>.',
    'fr' => 'Eurovitas Finanzen GmbH est un établissement de crédit agréé par la <strong>Banque Centrale Allemande (Deutsche Bundesbank)<\/strong>. Numéro d\'agrément : <strong>BANK-001<\/strong>. Notre autorisation nous permet d\'accorder des prêts dans plusieurs pays grâce à notre partenariat avec la <strong>Banque Mondiale<\/strong>.',
    'es' => 'Eurovitas Finanzen GmbH es una entidad de crédito autorizada por el <strong>Banco Central Alemán (Deutsche Bundesbank)<\/strong>. Número de autorización: <strong>BANK-001<\/strong>. Nuestra autorización nos permite conceder préstamos en varios países gracias a nuestra asociación con el <strong>Banco Mundial<\/strong>.',
    'pt' => 'A Eurovitas Finanzen GmbH é uma instituição de crédito autorizada pelo <strong>Banco Central Alemão (Deutsche Bundesbank)<\/strong>. Número de autorização: <strong>BANK-001<\/strong>. A nossa autorização permite-nos conceder empréstimos em vários países graças à nossa parceria com o <strong>Banco Mundial<\/strong>.',
    'et' => 'Eurovitas Finanzen GmbH on krediidiasutus, mille on heaks kiitnud <strong>Saksa Keskpank (Deutsche Bundesbank)<\/strong>. Loa number: <strong>BANK-001<\/strong>. Meie luba võimaldab anda laene mitmes riigis tänu meie partnerlusele <strong>Maailmapangaga<\/strong>.',
    'lv' => 'Eurovitas Finanzen GmbH ir kredītiestāde, ko atļāvusi <strong>Vācijas Bundesbanka<\/strong>. Atļaujas numurs: <strong>BANK-001<\/strong>. Mūsu atļauja ļauj izsniegt aizdevumus vairākās valstīs, pateicoties mūsu partnerībai ar <strong>Pasaules Banku<\/strong>.',
    'lt' => 'Eurovitas Finanzen GmbH yra kredito įstaiga, kurią licenciavo <strong>Vokietijos Bundesbankas<\/strong>. Licencijos numeris: <strong>BANK-001<\/strong>. Mūsų licencija leidžia teikti paskolas keliose šalyse dėl mūsų partnerystės su <strong>Pasaulio Banku<\/strong>.',
    'en' => 'Eurovitas Finanzen GmbH is a credit institution authorized by the <strong>German Central Bank (Deutsche Bundesbank)<\/strong>. Authorization number: <strong>BANK-001<\/strong>. Our authorization allows us to grant loans in several countries through our partnership with the <strong>World Bank<\/strong>.',
];

$section7 = [
    'de' => 'Eurovitas Finanzen bietet ein Schlichtungsverfahren für die außergerichtliche Beilegung von Streitigkeiten an. Bei Unstimmigkeiten können Sie unser Kundenservice-Team unter contact@eurovitas.de kontaktieren, bevor Sie rechtliche Schritte einleiten.',
    'fr' => 'Eurovitas Finanzen propose un dispositif de médiation pour le règlement amiable des litiges. En cas de différend, vous pouvez contacter notre service client à l\'adresse contact@eurovitas.de avant tout recours judiciaire.',
    'es' => 'Eurovitas Finanzen ofrece un procedimiento de mediación para la resolución extrajudicial de conflictos. En caso de desacuerdo, puede ponerse en contacto con nuestro servicio de atención al cliente en contact@eurovitas.de antes de emprender acciones legales.',
    'pt' => 'A Eurovitas Finanzen oferece um procedimento de mediação para a resolução extrajudicial de litígios. Em caso de desacordo, pode contactar o nosso serviço de apoio ao cliente em contact@eurovitas.de antes de intentar ações legais.',
    'et' => 'Eurovitas Finanzen pakub vahendusmenetlust vaidluste kohtuväliseks lahendamiseks. Erimeelsuste korral võtke ühendust meie klienditoega aadressil contact@eurovitas.de enne kohtumenetluse algatamist.',
    'lv' => 'Eurovitas Finanzen piedāvā mediācijas procedūru strīdu ārpustiesas risināšanai. Domstarpību gadījumā sazinieties ar mūsu klientu apkalpošanas dienestu contact@eurovitas.de pirms tiesvedības uzsākšanas.',
    'lt' => 'Eurovitas Finanzen siūlo tarpininkavimo procedūrą ginčams spręsti ne teismo keliu. Nesutarimų atveju susisiekite su mūsų klientų aptarnavimo tarnyba contact@eurovitas.de prieš inicijuodami teisinius veiksmus.',
    'en' => 'Eurovitas Finanzen offers a mediation procedure for out-of-court dispute resolution. In case of disagreement, please contact our customer service at contact@eurovitas.de before initiating legal proceedings.',
];

foreach ($langs as $lang) {
    $file = __DIR__ . "/resources/lang/{$lang}.json";
    if (!file_exists($file)) {
        echo "Ignoré : {$lang}.json (fichier inexistant)\n";
        continue;
    }

    $data = json_decode(file_get_contents($file), true);
    if (!$data) {
        echo "Erreur JSON : {$lang}.json\n";
        continue;
    }

    if (isset($section2[$lang])) {
        $data['legal_section2_text'] = $section2[$lang];
    }
    if (isset($section7[$lang])) {
        $data['legal_section7_text'] = $section7[$lang];
    }

    file_put_contents($file, json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES));
    echo "Mis à jour : {$lang}.json\n";
}

echo "\nTerminé.\n";
