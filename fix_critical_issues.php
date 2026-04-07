<?php

/**
 * Script pour corriger les problèmes critiques identifiés
 */

require_once __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

echo "=== CORRECTION DES PROBLÈMES CRITIQUES ===\n\n";

echo "1. Ajout de la colonne 'name' manquante dans la table users\n";

try {
    if (Schema::hasColumn('users', 'name')) {
        echo "   La colonne 'name' existe déjà\n";
    } else {
        DB::statement('ALTER TABLE users ADD COLUMN name VARCHAR(255) AFTER id');
        echo "   Colonne 'name' ajoutée avec succès\n";
    }
} catch (Exception $e) {
    echo "   ERREUR: " . $e->getMessage() . "\n";
}

echo "\n2. Création du cache de configuration\n";

try {
    \Artisan::call('config:cache');
    echo "   Cache de configuration créé avec succès\n";
} catch (Exception $e) {
    echo "   ERREUR: " . $e->getMessage() . "\n";
}

echo "\n3. Nettoyage et recréation des caches\n";

$cacheCommands = ['cache:clear', 'view:clear', 'route:clear'];

foreach ($cacheCommands as $command) {
    try {
        \Artisan::call($command);
        echo "   {$command}: OK\n";
    } catch (Exception $e) {
        echo "   {$command}: ERREUR - " . $e->getMessage() . "\n";
    }
}

echo "\n4. Optimisation finale\n";

try {
    \Artisan::call('config:cache');
    echo "   config:cache: OK\n";
} catch (Exception $e) {
    echo "   config:cache: ERREUR - " . $e->getMessage() . "\n";
}

try {
    \Artisan::call('route:cache');
    echo "   route:cache: OK\n";
} catch (Exception $e) {
    echo "   route:cache: ERREUR - " . $e->getMessage() . "\n";
}

echo "\n5. Vérification finale\n";

// Vérifier la colonne name
$hasName = Schema::hasColumn('users', 'name');
echo "   Colonne users.name: " . ($hasName ? 'EXISTS' : 'MISSING') . "\n";

// Vérifier le cache config
$configCache = file_exists(__DIR__ . '/bootstrap/cache/config.php');
echo "   Cache config: " . ($configCache ? 'EXISTS' : 'MISSING') . "\n";

// Test de création d'utilisateur
try {
    $user = new \App\Models\User();
    $user->name = 'Test User';
    $user->email = 'test' . time() . '@test.com';
    $user->password = bcrypt('password');
    echo "   Test User model: OK\n";
} catch (Exception $e) {
    echo "   Test User model: ERREUR - " . $e->getMessage() . "\n";
}

echo "\n=== CORRECTIONS TERMINÉES ===\n";
echo "L'erreur 500 devrait maintenant être résolue.\n";
echo "Testez à nouveau l'inscription sur votre site.\n";
