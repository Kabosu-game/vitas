<?php

/**
 * Script pour vérifier la structure de la table settings
 */

require_once __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';

$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);

$kernel->bootstrap();

use Illuminate\Support\Facades\DB;

echo "=== Vérification de la table settings ===\n\n";

try {
    // Vérifier si la table settings existe
    $tables = DB::select("SHOW TABLES LIKE 'settings'");
    
    if (empty($tables)) {
        echo "ERREUR: Table 'settings' non trouvée.\n";
        exit;
    }
    
    echo "SUCCESS: Table 'settings' trouvée.\n";
    
    // Afficher la structure
    $columns = DB::select("SHOW COLUMNS FROM settings");
    
    echo "\nStructure de la table 'settings':\n";
    foreach ($columns as $column) {
        echo "- {$column->Field}: {$column->Type} (Null: " . ($column->Null == 'YES' ? 'Oui' : 'Non') . ")\n";
    }
    
    // Vérifier les données existantes
    $settings = DB::select("SELECT * FROM settings LIMIT 5");
    
    if (!empty($settings)) {
        echo "\nExemples de données existantes:\n";
        foreach ($settings as $setting) {
            echo "- " . json_encode($setting) . "\n";
        }
    } else {
        echo "\nAucune donnée dans la table settings.\n";
    }
    
} catch (Exception $e) {
    echo "ERREUR: " . $e->getMessage() . "\n";
}

echo "\n=== Solution pour configurer SMTP Hostinger ===\n";
echo "1. Allez dans l'admin: /admin/settings/mail\n";
echo "2. Configurez manuellement:\n";
echo "   - Driver: smtp\n";
echo "   - SMTP Host: smtp.hostinger.com\n";
echo "   - SMTP Port: 587\n";
echo "   - SMTP Secure: tls\n";
echo "   - Username: votre email Hostinger\n";
echo "   - Password: votre mot de passe\n";
echo "   - From: contact@eurovitas.de\n";
echo "   - From Name: Eurovitas Finanzen\n";

echo "\n=== Opération terminée ===\n";
