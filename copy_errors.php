<?php

/**
 * Script pour copier le contenu des erreurs dans le presse-papiers
 */

echo "=== COPIE DES ERREURS DANS PRESSE-PAPIERS ===\n\n";

$logFile = __DIR__ . '/storage/logs/laravel.log';

if (!file_exists($logFile)) {
    echo "ERREUR: Fichier de log non trouvé: {$logFile}\n";
    exit;
}

// Lire les 50 dernières lignes
$lines = file($logFile);
$lastLines = array_slice($lines, -50);

$errors = [];
foreach ($lastLines as $line) {
    $trimmed = trim($line);
    
    // Collecter uniquement les lignes d'erreur
    if (strpos($trimmed, 'ERROR') !== false || 
        strpos($trimmed, 'Exception') !== false ||
        strpos($trimmed, '500') !== false ||
        strpos($trimmed, 'CRITICAL') !== false) {
        $errors[] = $trimmed;
    }
}

if (!empty($errors)) {
    echo "ERREURS TROUVÉES: " . count($errors) . "\n";
    echo str_repeat("=", 60) . "\n";
    
    // Afficher les erreurs
    foreach ($errors as $error) {
        echo $error . "\n";
        echo str_repeat("-", 60) . "\n";
    }
    
    echo "\n" . str_repeat("=", 60) . "\n";
    echo "CONTENU À COPIER:\n";
    echo str_repeat("=", 60) . "\n";
    
    // Créer le contenu à copier
    $copyContent = implode("\n", $errors);
    echo $copyContent;
    
    echo "\n" . str_repeat("=", 60) . "\n";
    echo "MÉTHODES DE COPIE:\n";
    echo "1. Sélectionnez tout le texte ci-dessus (CTRL+A)\n";
    echo "2. Copiez (CTRL+C)\n";
    echo "3. Collez où vous voulez (CTRL+V)\n\n";
    
    echo "OU utilisez ces commandes:\n";
    echo "Windows PowerShell:\n";
    echo "php show_errors.php | clip\n\n";
    echo "Linux/Mac:\n";
    echo "php show_errors.php | pbcopy\n\n";
    
    echo "OU créez un fichier:\n";
    echo "php show_errors.php > erreurs.txt\n";
    echo "cat erreurs.txt\n";
    
} else {
    echo "Aucune erreur trouvée dans les 50 dernières lignes.\n";
    echo "Essayez avec plus de lignes:\n";
    echo "php show_errors.php\n";
}

echo "\n=== TERMINÉ ===\n";
