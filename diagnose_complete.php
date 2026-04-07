<?php

/**
 * Script de diagnostic complet pour trouver la cause exacte de l'erreur 500
 */

set_time_limit(300);
ini_set('memory_limit', '512M');

echo "=== DIAGNOSTIC COMPLET ERREUR 500 ===\n\n";

require_once __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Log;

echo "1. Vérification de l'environnement\n";
echo "   APP_ENV: " . config('app.env') . "\n";
echo "   APP_DEBUG: " . (config('app.debug') ? 'true' : 'false') . "\n";
echo "   Base de données: " . config('database.default') . "\n\n";

echo "2. Test de connexion à la base de données\n";
try {
    DB::select('SELECT 1');
    echo "   SUCCESS: Connexion DB OK\n";
} catch (Exception $e) {
    echo "   ERREUR: " . $e->getMessage() . "\n";
    exit;
}

echo "\n3. Vérification des tables critiques\n";

$criticalTables = [
    'users' => ['id', 'name', 'email', 'password', 'civility', 'gender', 'id_number', 'email_otp'],
    'settings' => ['id', 'name', 'val'],
    'email_templates' => ['id', 'code', 'subject', 'title'],
    'languages' => ['id', 'name', 'locale', 'status'],
    'migrations' => ['id', 'migration', 'batch']
];

$allTablesOK = true;

foreach ($criticalTables as $tableName => $requiredColumns) {
    $exists = Schema::hasTable($tableName);
    echo "   {$tableName}: " . ($exists ? 'EXISTS' : 'MISSING');
    
    if ($exists) {
        try {
            $columns = Schema::getColumnListing($tableName);
            $missingColumns = array_diff($requiredColumns, $columns);
            if (!empty($missingColumns)) {
                echo " - COLONNES MANQUANTES: " . implode(', ', $missingColumns);
                $allTablesOK = false;
            } else {
                echo " - OK";
            }
        } catch (Exception $e) {
            echo " - ERREUR COLONNES: " . $e->getMessage();
            $allTablesOK = false;
        }
    } else {
        $allTablesOK = false;
    }
    echo "\n";
}

echo "\n4. Vérification des données essentielles\n";

try {
    // Vérifier les settings
    $settingsCount = DB::table('settings')->count();
    echo "   Settings: {$settingsCount} enregistrements\n";
    
    $siteTitle = DB::table('settings')->where('name', 'site_title')->first();
    if ($siteTitle) {
        echo "   site_title: " . $siteTitle->val . "\n";
    } else {
        echo "   site_title: MANQUANT\n";
        $allTablesOK = false;
    }
    
    // Vérifier les langues
    $languagesCount = DB::table('languages')->where('status', true)->count();
    echo "   Langues actives: {$languagesCount}\n";
    
    // Vérifier les templates email
    $templatesCount = DB::table('email_templates')->count();
    echo "   Templates email: {$templatesCount}\n";
    
    $emailVerification = DB::table('email_templates')->where('code', 'email_verification')->first();
    if ($emailVerification) {
        echo "   Template email_verification: OK\n";
    } else {
        echo "   Template email_verification: MANQUANT\n";
        $allTablesOK = false;
    }
    
} catch (Exception $e) {
    echo "   ERREUR: " . $e->getMessage() . "\n";
    $allTablesOK = false;
}

echo "\n5. Vérification des permissions et fichiers\n";

$importantFiles = [
    '.env' => 'Configuration',
    'vendor/autoload.php' => 'Autoloader',
    'bootstrap/cache/config.php' => 'Config cache',
    'storage/framework/cache/data' => 'Cache storage',
    'storage/logs/laravel.log' => 'Log file'
];

foreach ($importantFiles as $file => $description) {
    $exists = file_exists(__DIR__ . '/' . $file);
    $readable = $exists && is_readable(__DIR__ . '/' . $file);
    echo "   {$file}: " . ($exists ? 'EXISTS' : 'MISSING') . " - " . ($readable ? 'READABLE' : 'NOT READABLE') . " ({$description})\n";
}

echo "\n6. Test des routes critiques\n";

try {
    $router = app('router');
    
    $criticalRoutes = [
        'home' => '/',
        'register' => '/register',
        'register.step2' => '/register/step2',
        'login' => '/login',
    ];
    
    foreach ($criticalRoutes as $name => $path) {
        try {
            $route = $router->getRoutes()->match(app('request')->create($path));
            echo "   Route {$name}: OK\n";
        } catch (Exception $e) {
            echo "   Route {$name}: ERREUR - " . $e->getMessage() . "\n";
            $allTablesOK = false;
        }
    }
} catch (Exception $e) {
    echo "   ERREUR ROUTER: " . $e->getMessage() . "\n";
    $allTablesOK = false;
}

echo "\n7. Test du modèle User\n";

try {
    $user = new \App\Models\User();
    echo "   Modèle User: OK\n";
    
    // Test de création d'utilisateur (sans sauvegarder)
    $testUser = [
        'name' => 'Test User',
        'email' => 'test' . time() . '@test.com',
        'password' => bcrypt('password'),
        'civility' => 'civility_mr',
        'gender' => 'gender_male',
        'id_number' => 'TEST123'
    ];
    
    $user->fill($testUser);
    echo "   Validation User: OK\n";
    
} catch (Exception $e) {
    echo "   ERREUR User: " . $e->getMessage() . "\n";
    $allTablesOK = false;
}

echo "\n8. Analyse des logs Laravel récents\n";

$logFile = storage_path('logs/laravel.log');

if (file_exists($logFile)) {
    $lines = file($logFile);
    $recentLines = array_slice($lines, -50);
    
    $errorCount = 0;
    $lastError = '';
    
    foreach ($recentLines as $line) {
        if (strpos($line, 'ERROR') !== false || 
            strpos($line, 'Exception') !== false ||
            strpos($line, '500') !== false) {
            $errorCount++;
            $lastError = trim($line);
        }
    }
    
    echo "   Erreurs récentes: {$errorCount}\n";
    if ($lastError) {
        echo "   Dernière erreur: " . substr($lastError, 0, 100) . "...\n";
    }
} else {
    echo "   Fichier de log: MANQUANT\n";
}

echo "\n9. Test d'inscription simulée\n";

try {
    // Simuler les données d'inscription
    $registrationData = [
        'first_name' => 'Test',
        'last_name' => 'User',
        'email' => 'test' . time() . '@test.com',
        'phone' => '1234567890',
        'password' => 'Password123!',
        'password_confirmation' => 'Password123!',
        'civility' => 'civility_mr',
        'gender' => 'gender_male',
        'id_number' => 'TEST123456',
        'g-recaptcha-response' => 'test'
    ];
    
    // Test de validation
    $request = new \Illuminate\Http\Request($registrationData);
    
    // Créer une instance du controller pour tester
    $controller = new \App\Http\Controllers\Auth\RegisteredUserController();
    
    echo "   Données inscription: OK\n";
    echo "   Controller registration: OK\n";
    
} catch (Exception $e) {
    echo "   ERREUR inscription: " . $e->getMessage() . "\n";
    $allTablesOK = false;
}

echo "\n10. Vérification des services essentiels\n";

$services = [
    'cache' => 'Cache',
    'session' => 'Session', 
    'mail' => 'Mail',
    'queue' => 'Queue'
];

foreach ($services as $service => $name) {
    try {
        app($service);
        echo "   Service {$name}: OK\n";
    } catch (Exception $e) {
        echo "   Service {$name}: ERREUR - " . $e->getMessage() . "\n";
        $allTablesOK = false;
    }
}

echo "\n11. Test de requête SQL directe\n";

try {
    $testQuery = DB::select('SELECT COUNT(*) as count FROM users');
    echo "   Requête SQL test: OK (" . $testQuery[0]->count . " utilisateurs)\n";
} catch (Exception $e) {
    echo "   Requête SQL test: ERREUR - " . $e->getMessage() . "\n";
    $allTablesOK = false;
}

echo "\n12. Vérification de la mémoire PHP\n";

echo "   Memory limit: " . ini_get('memory_limit') . "\n";
echo "   Memory usage: " . number_format(memory_get_usage(true) / 1024 / 1024, 2) . " MB\n";
echo "   Memory peak: " . number_format(memory_get_peak_usage(true) / 1024 / 1024, 2) . " MB\n";

echo "\n=== RÉSULTAT DU DIAGNOSTIC ===\n";

if ($allTablesOK) {
    echo "STATUT: TOUS LES SYSTÈMES SONT OK\n";
    echo "L'erreur 500 pourrait venir de:\n";
    echo "- Configuration serveur (Apache/Nginx)\n";
    echo "- Permissions de fichiers\n";
    echo "- Configuration PHP (memory_limit, max_execution_time)\n";
    echo "- Module manquant (ex: mod_rewrite)\n";
    echo "- Fichier .htaccess manquant ou incorrect\n";
    echo "- Virtual host mal configuré\n";
} else {
    echo "STATUT: PROBLÈMES DÉTECTÉS\n";
    echo "Veuillez corriger les problèmes listés ci-dessus.\n";
}

echo "\n=== RECOMMANDATIONS ===\n";
echo "1. Vérifiez les permissions du dossier storage (755)\n";
echo "2. Vérifiez les permissions du dossier bootstrap/cache (755)\n";
echo "3. Assurez-vous que mod_rewrite est activé (Apache)\n";
echo "4. Vérifiez la configuration du virtual host\n";
echo "5. Consultez les logs du serveur web (error_log)\n";
echo "6. Vérifiez le fichier .htaccess à la racine\n";
echo "7. Testez avec APP_DEBUG=true dans .env pour voir l'erreur détaillée\n";

echo "\n=== DIAGNOSTIC TERMINÉ ===\n";
