<?php

/**
 * Health Check Endpoint
 * Simple endpoint to verify the application is working
 */
header('Content-Type: application/json');

$health = [
    'status' => 'ok',
    'timestamp' => date('c'),
    'php_version' => PHP_VERSION,
    'server' => $_SERVER['SERVER_SOFTWARE'] ?? 'unknown',
    'checks' => []
];

// Check if main files exist
$required_files = [
    'includes/config.php',
    'includes/functions.php',
    'api/validate.php',
    'assets/css/style.css',
    'assets/js/script.js',
    'pages/index.php',
    'pages/diagnostics.php',
    'pages/test.php',
    'pages/developer.php',
    'pages/privacy.php',
    'pages/terms.php'
];

foreach ($required_files as $file) {
    $health['checks'][$file] = file_exists($file) ? 'ok' : 'missing';
}

echo json_encode($health, JSON_PRETTY_PRINT);
?> 
