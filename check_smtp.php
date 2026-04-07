<?php

/**
 * Script pour vérifier la configuration SMTP actuelle
 */

require_once __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';

$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);

$kernel->bootstrap();

echo "=== Configuration SMTP Actuelle ===\n\n";

try {
    // Vérifier la configuration depuis les settings
    $mailHost = setting('mail_host', 'mail');
    $mailPort = setting('mail_port', 'mail');
    $mailSecure = setting('mail_secure', 'mail');
    $mailUsername = setting('mail_username', 'mail');
    $mailPassword = setting('mail_password', 'mail');
    $mailFrom = setting('mail_from', 'mail');
    $mailFromName = setting('mail_from_name', 'mail');
    $mailDriver = setting('mail_driver', 'mail');
    
    echo "Driver: " . ($mailDriver ?: 'non configuré') . "\n";
    echo "Host: " . ($mailHost ?: 'non configuré') . "\n";
    echo "Port: " . ($mailPort ?: 'non configuré') . "\n";
    echo "Secure: " . ($mailSecure ?: 'non configuré') . "\n";
    echo "Username: " . ($mailUsername ?: 'non configuré') . "\n";
    echo "Password: " . ($mailPassword ? '*** configuré ***' : 'non configuré') . "\n";
    echo "From: " . ($mailFrom ?: 'non configuré') . "\n";
    echo "From Name: " . ($mailFromName ?: 'non configuré') . "\n";
    
    // Vérifier la configuration Laravel
    echo "\n=== Configuration Laravel ===\n";
    echo "MAIL_MAILER: " . (config('mail.mailer') ?: 'non configuré') . "\n";
    echo "MAIL_HOST: " . (config('mail.hosts.smtp.host') ?: 'non configuré') . "\n";
    echo "MAIL_PORT: " . (config('mail.hosts.smtp.port') ?: 'non configuré') . "\n";
    echo "MAIL_ENCRYPTION: " . (config('mail.hosts.smtp.encryption') ?: 'non configuré') . "\n";
    echo "MAIL_USERNAME: " . (config('mail.hosts.smtp.username') ?: 'non configuré') . "\n";
    echo "MAIL_PASSWORD: " . (config('mail.hosts.smtp.password') ? '*** configuré ***' : 'non configuré') . "\n";
    echo "MAIL_FROM_ADDRESS: " . (config('mail.from.address') ?: 'non configuré') . "\n";
    echo "MAIL_FROM_NAME: " . (config('mail.from.name') ?: 'non configuré') . "\n";
    
    // Test de connexion
    echo "\n=== Test de connexion SMTP ===\n";
    
    $transport = \Illuminate\Support\Facades\Mail::getSwiftMailer()->getTransport();
    
    if ($transport instanceof \Swift_SmtpTransport) {
        echo "Transport: SMTP\n";
        echo "SMTP Host: " . $transport->getHost() . "\n";
        echo "SMTP Port: " . $transport->getPort() . "\n";
        echo "SMTP Encryption: " . $transport->getEncryption() . "\n";
        echo "SMTP Username: " . $transport->getUsername() . "\n";
        
        try {
            // Tenter de se connecter
            $transport->start();
            echo "SUCCESS: Connexion SMTP réussie\n";
            $transport->stop();
        } catch (Exception $e) {
            echo "ERREUR: Échec de connexion SMTP\n";
            echo "Message: " . $e->getMessage() . "\n";
        }
    } else {
        echo "Transport: " . get_class($transport) . "\n";
    }
    
} catch (Exception $e) {
    echo "ERREUR: " . $e->getMessage() . "\n";
}

echo "\n=== Solutions recommandées ===\n";
echo "1. Configurez les SMTP dans l'admin: /admin/settings/mail\n";
echo "2. Ou utilisez un service gratuit comme Brevo (300 emails/jour)\n";
echo "3. Ou utilisez Gmail avec mot de passe d'application\n";

echo "\n=== Configuration Brevo (recommandé) ===\n";
echo "Host: smtp-relay.brevo.com\n";
echo "Port: 587\n";
echo "Secure: tls\n";
echo "Username: votre@email.com\n";
echo "Password: clé SMTP depuis Brevo\n";

echo "\n=== Test terminé ===\n";
