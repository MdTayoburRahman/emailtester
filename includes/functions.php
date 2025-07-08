<?php

/**
 * Common Header Functions
 *
 * Shared functions and utilities for all pages
 */
require_once 'config.php';

/**
 * Get current timestamp
 */
function getCurrentTimestamp()
{
    return date('Y-m-d H:i:s');
}

/**
 * Log message (for future enhancement)
 */
function logMessage($message, $level = 'INFO')
{
    if (!LOG_ENABLED)
        return;

    $timestamp = getCurrentTimestamp();
    $logEntry = "[{$timestamp}] [{$level}] {$message}" . PHP_EOL;

    // For now, just echo in debug mode
    if (ENABLE_DEBUG && $level === 'DEBUG') {
        echo "<!-- DEBUG: {$message} -->" . PHP_EOL;
    }
}

/**
 * Sanitize input
 */
function sanitizeInput($input)
{
    return htmlspecialchars(trim($input), ENT_QUOTES, 'UTF-8');
}

/**
 * Get client IP address
 */
function getClientIP()
{
    $ipKeys = ['HTTP_X_FORWARDED_FOR', 'HTTP_X_REAL_IP', 'HTTP_CLIENT_IP', 'REMOTE_ADDR'];

    foreach ($ipKeys as $key) {
        if (!empty($_SERVER[$key])) {
            $ip = $_SERVER[$key];
            if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE)) {
                return $ip;
            }
        }
    }

    return $_SERVER['REMOTE_ADDR'] ?? 'unknown';
}

/**
 * Check if request is AJAX
 */
function isAjaxRequest()
{
    return !empty($_SERVER['HTTP_X_REQUESTED_WITH']) &&
        strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest';
}

/**
 * Generate CSRF token (for future enhancement)
 */
function generateCSRFToken()
{
    if (!isset($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

/**
 * Format file size
 */
function formatFileSize($bytes)
{
    $units = ['B', 'KB', 'MB', 'GB'];
    $unitIndex = 0;

    while ($bytes >= 1024 && $unitIndex < count($units) - 1) {
        $bytes /= 1024;
        $unitIndex++;
    }

    return round($bytes, 2) . ' ' . $units[$unitIndex];
}

// Start session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

?>
