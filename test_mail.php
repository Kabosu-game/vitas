<?php

require_once __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';

$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);

$kernel->bootstrap();

try {
    \Mail::raw('Test email from Laravel', function($message) {
        $message->to('admin@eurovitas.de')->subject('Test Email');
    });
    echo "Email sent successfully\n";
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
