<?php

/**
 * Script pour définir l'allemand comme langue par défaut
 * Usage : php set_german_default.php
 */

require __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';
$app->make(\Illuminate\Contracts\Console\Kernel::class)->bootstrap();

use Illuminate\Support\Facades\DB;

echo "=== Définir l'allemand comme langue par défaut ===\n\n";

// 1. Vérifier si la langue allemande existe
try {
    $german = DB::table('languages')->where('locale', 'de')->first();
    
    if (!$german) {
        echo "ERREUR: La langue allemande (de) n'existe pas dans la base de données.\n";
        exit(1);
    }
    
    if (!$german->status) {
        echo "ERREUR: La langue allemande existe mais est désactivée.\n";
        exit(1);
    }
    
    echo "1. Langue allemande trouvée et active.\n";
} catch (Exception $e) {
    echo "ERREUR lors de la vérification: " . $e->getMessage() . "\n";
    exit(1);
}

// 2. Obtenir l'ancienne langue par défaut
try {
    $oldDefault = DB::table('languages')->where('is_default', 1)->first();
    
    if ($oldDefault) {
        echo "2. Ancienne langue par défaut: {$oldDefault->name} ({$oldDefault->locale})\n";
        
        // Désactiver l'ancienne langue par défaut
        DB::table('languages')
            ->where('locale', $oldDefault->locale)
            ->update(['is_default' => 0, 'updated_at' => now()]);
        
        echo "   -> Ancienne langue par défaut désactivée.\n";
    } else {
        echo "2. Aucune langue par défaut n'était définie.\n";
    }
} catch (Exception $e) {
    echo "ERREUR lors de la recherche de l'ancienne langue: " . $e->getMessage() . "\n";
    exit(1);
}

// 3. Définir l'allemand comme langue par défaut
try {
    DB::table('languages')
        ->where('locale', 'de')
        ->update(['is_default' => 1, 'updated_at' => now()]);
    
    echo "3. Deutsch (de) défini comme langue par défaut.\n";
} catch (Exception $e) {
    echo "ERREUR lors de la définition de la langue par défaut: " . $e->getMessage() . "\n";
    exit(1);
}

// 4. Vérifier le changement
try {
    $newDefault = DB::table('languages')->where('is_default', 1)->first();
    
    if ($newDefault && $newDefault->locale === 'de') {
        echo "4. SUCCESS: L'allemand est maintenant la langue par défaut.\n";
    } else {
        echo "4. ERREUR: Le changement n'a pas été appliqué correctement.\n";
        exit(1);
    }
} catch (Exception $e) {
    echo "ERREUR lors de la vérification: " . $e->getMessage() . "\n";
    exit(1);
}

// 5. Afficher toutes les langues avec leur statut
try {
    $allLanguages = DB::table('languages')
        ->orderBy('name')
        ->get(['name', 'locale', 'status', 'is_default']);
    
    echo "\n5. Statut de toutes les langues:\n";
    foreach ($allLanguages as $lang) {
        $status = $lang->status ? 'active' : 'inactive';
        $default = $lang->is_default ? ' (DÉFAUT)' : '';
        echo "   - {$lang->name} ({$lang->locale}) - {$status}{$default}\n";
    }
} catch (Exception $e) {
    echo "ERREUR lors de l'affichage des langues: " . $e->getMessage() . "\n";
}

// 6. Instructions pour le cache et config
echo "\n6. IMPORTANT: Pour que les changements prennent effet, exécutez:\n";
echo "   php artisan cache:clear\n";
echo "   php artisan config:clear\n";
echo "   php artisan view:clear\n";

// 7. Instructions supplémentaires
echo "\n7. Notes importantes:\n";
echo "   - Le site s'affichera maintenant en allemand par défaut\n";
echo "   - Les nouveaux visiteurs verront le site en allemand\n";
echo "   - Les utilisateurs existants garderont leur langue préférée\n";
echo "   - Le sélecteur de langue permet toujours de changer\n";

echo "\n=== Opération terminée ===\n";
echo "L'allemand est maintenant la langue par défaut du site.\n";
