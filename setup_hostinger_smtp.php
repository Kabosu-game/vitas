<?php

/**
 * Script pour configurer SMTP Hostinger
 */

require_once __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';

$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);

$kernel->bootstrap();

use Illuminate\Support\Facades\DB;

echo "=== Configuration SMTP Hostinger ===\n\n";

try {
    // Configuration Hostinger recommandée
    $hostingerConfig = [
        'mail_host' => 'smtp.hostinger.com',
        'mail_port' => '587',
        'mail_secure' => 'tls',
        'mail_driver' => 'smtp',
        'mail_from' => 'contact@eurovitas.de',
        'mail_from_name' => 'Eurovitas Finanzen',
    ];

    echo "Configuration Hostinger à appliquer :\n";
    foreach ($hostingerConfig as $key => $value) {
        echo "- {$key}: {$value}\n";
    }

    echo "\n=== Mise à jour de la configuration ===\n";

    // Mettre à jour les settings dans la base de données
    foreach ($hostingerConfig as $key => $value) {
        $existing = DB::table('settings')->where('name', $key)->first();
        
        if ($existing) {
            DB::table('settings')->where('name', $key)->update(['value' => $value]);
            echo "UPDATED: {$key} = {$value}\n";
        } else {
            DB::table('settings')->insert([
                'name' => $key,
                'value' => $value,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            echo "INSERTED: {$key} = {$value}\n";
        }
    }

    echo "\n=== Configuration terminée ===\n";
    echo "IMPORTANT: Vous devez configurer manuellement :\n";
    echo "1. Username: votre email Hostinger (ex: contact@eurovitas.de)\n";
    echo "2. Password: votre mot de passe email Hostinger\n";
    echo "3. Allez dans l'admin : /admin/settings/mail\n";
    echo "4. Remplissez les champs Username et Password\n";
    echo "5. Cliquez sur 'Connection Check' pour tester\n";

    echo "\n=== Instructions Hostinger ===\n";
    echo "1. Connectez-vous à votre panneau Hostinger\n";
    echo "2. Allez dans Email -> Comptes email\n";
    echo "3. Créez un compte email si besoin\n";
    echo "4. Configurez les identifiants SMTP dans l'admin Laravel\n";

} catch (Exception $e) {
    echo "ERREUR: " . $e->getMessage() . "\n";
}

echo "\n=== Opération terminée ===\n";
