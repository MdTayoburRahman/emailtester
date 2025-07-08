<?php

/**
 * Debug Path Information
 * Use this file to check paths on your server
 */
echo '<h2>Path Debug Information</h2>';
echo '<strong>Server Information:</strong><br>';
echo 'Server Name: ' . $_SERVER['SERVER_NAME'] . '<br>';
echo 'Document Root: ' . $_SERVER['DOCUMENT_ROOT'] . '<br>';
echo 'Script Name: ' . $_SERVER['SCRIPT_NAME'] . '<br>';
echo 'Request URI: ' . $_SERVER['REQUEST_URI'] . '<br>';
echo 'Current Directory: ' . __DIR__ . '<br>';

echo '<br><strong>Config Path Information:</strong><br>';
require_once 'includes/config.php';
echo 'ASSETS_PATH: ' . ASSETS_PATH . '<br>';
echo 'API_PATH: ' . API_PATH . '<br>';

echo '<br><strong>File Existence Check:</strong><br>';
$cssPath = __DIR__ . '/assets/css/style.css';
echo 'CSS File Path: ' . $cssPath . '<br>';
echo 'CSS File Exists: ' . (file_exists($cssPath) ? 'YES' : 'NO') . '<br>';

$logoPath = __DIR__ . '/assets/images/logo.png';
echo 'Logo File Path: ' . $logoPath . '<br>';
echo 'Logo File Exists: ' . (file_exists($logoPath) ? 'YES' : 'NO') . '<br>';

echo '<br><strong>URL Check:</strong><br>';
$baseUrl = 'http' . (isset($_SERVER['HTTPS']) ? 's' : '') . '://' . $_SERVER['HTTP_HOST'];
$cssUrl = $baseUrl . ASSETS_PATH . '/css/style.css';
echo 'CSS URL: ' . $cssUrl . '<br>';

// Test CSS file accessibility
$headers = get_headers($cssUrl);
echo 'CSS URL Status: ' . $headers[0] . '<br>';

echo '<br><strong>Test Links:</strong><br>';
echo '<a href="' . ASSETS_PATH . '/css/style.css" target="_blank">Test CSS Link</a><br>';
echo '<a href="' . ASSETS_PATH . '/images/logo.png" target="_blank">Test Logo Link</a><br>';
?>
