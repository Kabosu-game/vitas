<?php

/**
 * Script d'ajout de la langue portugaise pour le serveur VPS
 * Usage : php add_portuguese_language.php
 */

require __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';
$app->make(\Illuminate\Contracts\Console\Kernel::class)->bootstrap();

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

echo "=== Ajout de la langue portugaise ===\n\n";

// 1. Vérifier si le fichier pt.json existe
$langFile = __DIR__ . '/resources/lang/pt.json';
if (!File::exists($langFile)) {
    echo "ERREUR: Le fichier resources/lang/pt.json n'existe pas.\n";
    echo "Veuillez d'abord créer ce fichier avec les traductions portugaises.\n";
    exit(1);
}

echo "1. Fichier de traduction trouvé : resources/lang/pt.json\n";

// 2. Ajouter la langue dans la base de données
try {
    $existingLang = DB::table('languages')->where('locale', 'pt')->first();
    
    if ($existingLang) {
        if ($existingLang->status) {
            echo "2. La langue portugaise existe déjà et est active.\n";
        } else {
            // Activer la langue si elle existe mais est désactivée
            DB::table('languages')
                ->where('locale', 'pt')
                ->update(['status' => 1, 'updated_at' => now()]);
            echo "2. La langue portugaise existait mais était désactivée. Elle est maintenant activée.\n";
        }
    } else {
        // Ajouter la nouvelle langue
        DB::table('languages')->insert([
            'name' => 'Português',
            'locale' => 'pt',
            'status' => 1,
            'is_default' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        echo "2. Langue portugaise ajoutée avec succès dans la base de données.\n";
    }
} catch (Exception $e) {
    echo "ERREUR lors de l'ajout de la langue: " . $e->getMessage() . "\n";
    exit(1);
}

// 3. Vérifier le nombre de traductions dans le fichier
try {
    $translations = json_decode(File::get($langFile), true);
    if ($translations === null) {
        echo "ERREUR: Le fichier pt.json contient du JSON invalide.\n";
        exit(1);
    }
    
    $translationCount = count($translations);
    echo "3. Fichier de traduction contient {$translationCount} traductions.\n";
} catch (Exception $e) {
    echo "ERREUR lors de la lecture du fichier de traduction: " . $e->getMessage() . "\n";
    exit(1);
}

// 4. Vérifier toutes les langues actives
try {
    $activeLanguages = DB::table('languages')
        ->where('status', 1)
        ->orderBy('name')
        ->get(['name', 'locale', 'is_default']);
    
    echo "\n4. Langues actuellement actives:\n";
    foreach ($activeLanguages as $lang) {
        $default = $lang->is_default ? ' (défaut)' : '';
        echo "   - {$lang->name} ({$lang->locale}){$default}\n";
    }
} catch (Exception $e) {
    echo "ERREUR lors de la vérification des langues: " . $e->getMessage() . "\n";
}

// 5. Instructions pour le cache
echo "\n5. IMPORTANT: Pour que les changements prennent effet, exécutez:\n";
echo "   php artisan cache:clear\n";
echo "   php artisan config:clear\n";
echo "   php artisan view:clear\n";

// 6. Test du sélecteur de langue
echo "\n6. Test du sélecteur de langue:\n";
try {
    $languages = DB::table('languages')
        ->where('status', 1)
        ->orderBy('name')
        ->get(['name', 'locale']);
    
    $portugueseFound = false;
    foreach ($languages as $lang) {
        if ($lang->locale === 'pt') {
            $portugueseFound = true;
            break;
        }
    }
    
    if ($portugueseFound) {
        echo "   SUCCESS: Le portugais apparaîtra dans le sélecteur de langue.\n";
    } else {
        echo "   ERREUR: Le portugais n'apparaît pas dans le sélecteur.\n";
    }
} catch (Exception $e) {
    echo "   ERREUR lors du test: " . $e->getMessage() . "\n";
}

echo "\n=== Opération terminée ===\n";
echo "Le portugais est maintenant disponible dans le menu de sélection de langue.\n";
echo "Les utilisateurs peuvent changer de langue via le sélecteur dans le header.\n";
