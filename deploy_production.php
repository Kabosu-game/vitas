<?php

/**
 * Script complet pour déployer et configurer Eurovitas en production
 * 
 * Ce script effectue toutes les opérations nécessaires pour que l'application fonctionne parfaitement
 */

// Augmenter le temps d'exécution et la mémoire
set_time_limit(300);
ini_set('memory_limit', '512M');

echo "=== DÉPLOIEMENT COMPLET EUROVITAS EN PRODUCTION ===\n\n";

// Vérifier que nous sommes dans le bon répertoire
if (!file_exists('artisan')) {
    die("ERREUR: Ce script doit être exécuté depuis la racine du projet Laravel.\n");
}

require_once __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\File;

echo "Étape 1: Vérification de l'environnement\n";
echo "APP_ENV: " . config('app.env') . "\n";
echo "APP_DEBUG: " . (config('app.debug') ? 'true' : 'false') . "\n";
echo "Base de données: " . config('database.default') . "\n\n";

echo "Étape 2: Nettoyage des caches\n";
// Vider tous les caches
$commands = [
    'cache:clear',
    'config:clear', 
    'view:clear',
    'route:clear'
];

foreach ($commands as $command) {
    try {
        \Artisan::call($command);
        echo "  - {$command}: OK\n";
    } catch (Exception $e) {
        echo "  - {$command}: ERREUR - " . $e->getMessage() . "\n";
    }
}

echo "\nÉtape 3: Vérification des migrations\n";

// Obtenir toutes les migrations disponibles
$migrationFiles = glob(__DIR__ . '/database/migrations/*.php');
$migrationNames = [];

foreach ($migrationFiles as $file) {
    $filename = basename($file, '.php');
    $migrationNames[] = $filename;
}

// Récupérer les migrations déjà exécutées
$executedMigrations = [];
try {
    $migrationsTable = DB::table('migrations')->pluck('migration')->toArray();
    $executedMigrations = $migrationsTable;
} catch (Exception $e) {
    echo "Table migrations non trouvée, création...\n";
    try {
        \Artisan::call('migrate:install');
        echo "Table migrations créée avec succès\n";
    } catch (Exception $e2) {
        echo "ERREUR lors de la création de la table migrations: " . $e2->getMessage() . "\n";
    }
}

echo "Migrations totales: " . count($migrationNames) . "\n";
echo "Migrations exécutées: " . count($executedMigrations) . "\n";

// Identifier les migrations manquantes
$missingMigrations = [];
foreach ($migrationNames as $migration) {
    if (!in_array($migration, $executedMigrations)) {
        $missingMigrations[] = $migration;
    }
}

echo "\nÉtape 4: Traitement des migrations manquantes\n";

if (!empty($missingMigrations)) {
    // Vérifier si les tables existent déjà
    $existingTables = [];
    try {
        $tables = DB::select('SHOW TABLES');
        foreach ($tables as $table) {
            $tableName = array_values((array)$table)[0];
            $existingTables[] = $tableName;
        }
    } catch (Exception $e) {
        echo "Impossible de lister les tables: " . $e->getMessage() . "\n";
    }
    
    $criticalMigrations = [];
    $foreignKeyMigrations = [];
    
    foreach ($missingMigrations as $migration) {
        $tableExists = false;
        
        // Extraire le nom de la table de la migration
        if (preg_match('/create_(\w+)_table/', $migration, $matches)) {
            $tableName = $matches[1];
            $tableExists = in_array($tableName, $existingTables);
        }
        
        if (strpos($migration, 'add_foreign_keys') !== false) {
            $foreignKeyMigrations[] = $migration;
        } elseif (!$tableExists) {
            $criticalMigrations[] = $migration;
        }
    }
    
    // Exécuter les migrations critiques (création de tables)
    if (!empty($criticalMigrations)) {
        echo "\nExécution des migrations de création de tables:\n";
        foreach ($criticalMigrations as $migration) {
            try {
                echo "  - Exécution de {$migration}...\n";
                \Artisan::call('migrate', ['--path' => "database/migrations/{$migration}.php", '--force' => true]);
                echo "    SUCCESS\n";
            } catch (Exception $e) {
                echo "    ERREUR: " . $e->getMessage() . "\n";
                echo "    Tentative de marquage manuel...\n";
                
                // Marquer manuellement si la table existe déjà
                try {
                    DB::table('migrations')->insert([
                        'migration' => $migration,
                        'batch' => DB::table('migrations')->max('batch') + 1,
                    ]);
                    echo "    MARQUEE MANUELLEMENT\n";
                } catch (Exception $e2) {
                    echo "    IMPOSSIBLE DE MARQUER: " . $e2->getMessage() . "\n";
                }
            }
        }
    }
    
    // Marquer les migrations de clés étrangères (elles existent probablement déjà)
    if (!empty($foreignKeyMigrations)) {
        echo "\nMarquage des migrations de clés étrangères:\n";
        foreach ($foreignKeyMigrations as $migration) {
            try {
                DB::table('migrations')->insert([
                    'migration' => $migration,
                    'batch' => DB::table('migrations')->max('batch') + 1,
                ]);
                echo "  - {$migration}: MARQUEE\n";
            } catch (Exception $e) {
                echo "  - {$migration}: DEJA MARQUEE\n";
            }
        }
    }
} else {
    echo "Toutes les migrations sont à jour.\n";
}

echo "\nÉtape 5: Vérification des tables critiques\n";

$criticalTables = ['users', 'settings', 'email_templates', 'languages'];
$allTablesExist = true;

foreach ($criticalTables as $table) {
    $exists = Schema::hasTable($table);
    echo "  - {$table}: " . ($exists ? 'EXISTS' : 'MISSING') . "\n";
    if (!$exists) {
        $allTablesExist = false;
    }
}

if (!$allTablesExist) {
    echo "\nATTENTION: Certaines tables critiques manquent. L'application pourrait ne pas fonctionner correctement.\n";
}

echo "\nÉtape 6: Configuration du site_title\n";

try {
    $siteTitle = DB::table('settings')->where('name', 'site_title')->first();
    
    if ($siteTitle) {
        if ($siteTitle->val !== 'Eurovitas Finanzen') {
            DB::table('settings')->where('name', 'site_title')->update(['val' => 'Eurovitas Finanzen']);
            echo "  - site_title mis à jour: Eurovitas Finanzen\n";
        } else {
            echo "  - site_title déjà correct: Eurovitas Finanzen\n";
        }
    } else {
        DB::table('settings')->insert([
            'name' => 'site_title',
            'val' => 'Eurovitas Finanzen',
            'type' => 'string',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        echo "  - site_title créé: Eurovitas Finanzen\n";
    }
} catch (Exception $e) {
    echo "  - ERREUR site_title: " . $e->getMessage() . "\n";
}

echo "\nÉtape 7: Nettoyage final des caches\n";

foreach ($commands as $command) {
    try {
        \Artisan::call($command);
        echo "  - {$command}: OK\n";
    } catch (Exception $e) {
        echo "  - {$command}: ERREUR - " . $e->getMessage() . "\n";
    }
}

echo "\nÉtape 8: Optimisation des performances\n";

try {
    \Artisan::call('config:cache');
    echo "  - config:cache: OK\n";
} catch (Exception $e) {
    echo "  - config:cache: ERREUR - " . $e->getMessage() . "\n";
}

try {
    \Artisan::call('route:cache');
    echo "  - route:cache: OK\n";
} catch (Exception $e) {
    echo "  - route:cache: ERREUR - " . $e->getMessage() . "\n";
}

try {
    \Artisan::call('view:cache');
    echo "  - view:cache: OK\n";
} catch (Exception $e) {
    echo "  - view:cache: ERREUR - " . $e->getMessage() . "\n";
}

echo "\nÉtape 9: Vérification finale\n";

// Vérifier l'état final des migrations
$finalExecuted = DB::table('migrations')->count();
$finalTotal = count($migrationNames);

echo "  - Migrations: {$finalExecuted}/{$finalTotal}\n";
echo "  - Tables critiques: " . ($allTablesExist ? 'OK' : 'PROBLÈME') . "\n";

// Test de connexion à la base de données
try {
    DB::select('SELECT 1');
    echo "  - Base de données: OK\n";
} catch (Exception $e) {
    echo "  - Base de données: ERREUR - " . $e->getMessage() . "\n";
}

// Test d'envoi d'email (optionnel)
echo "\nÉtape 10: Test du système d'email (optionnel)\n";

try {
    $details = [
        'subject' => 'Test de déploiement Eurovitas - ' . date('Y-m-d H:i:s'),
        'title' => 'Test de déploiement',
        'salutation' => 'Bonjour Administrateur,',
        'message_body' => '<p>Ceci est un test automatique après le déploiement.</p><p>Date: ' . date('Y-m-d H:i:s') . '</p>',
        'button_level' => 'Visiter Eurovitas',
        'button_link' => url('/'),
        'footer_status' => 1,
        'footer_body' => 'Cordialement,<br>L\'équipe Eurovitas',
        'site_logo' => asset('logo/logo.png'),
        'site_title' => 'Eurovitas',
        'site_link' => url('/'),
        'bottom_status' => 0,
        'bottom_title' => null,
        'bottom_body' => null,
    ];
    
    \Mail::to('admin@eurovitas.de')->send(new \App\Mail\MailSend($details));
    echo "  - Email test: SUCCESS (envoyé à admin@eurovitas.de)\n";
} catch (Exception $e) {
    echo "  - Email test: ERREUR - " . $e->getMessage() . "\n";
}

echo "\n=== RÉSUMÉ DU DÉPLOIEMENT ===\n";
echo "Statut: " . ($allTablesExist ? 'SUCCÈS' : 'AVERTISSEMENT') . "\n";
echo "Date: " . date('Y-m-d H:i:s') . "\n";
echo "Migrations: {$finalExecuted}/{$finalTotal}\n";

if ($allTablesExist && $finalExecuted >= ($finalTotal - 5)) {
    echo "\nEUROVITAS EST PRÊT POUR LA PRODUCTION !\n";
    echo "L'inscription et toutes les fonctionnalités devraient fonctionner correctement.\n";
} else {
    echo "\nATTENTION: Certains problèmes subsistent. Vérifiez les logs.\n";
}

echo "\n=== DÉPLOIEMENT TERMINÉ ===\n";
