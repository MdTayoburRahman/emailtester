<?php

/**
 * @author Md Tayobur Rahman
 * @email - tayoburrahman119@gmail.com
 * @whatsapp -+974 7183 0623 / +880 1717 932348
 * @link - https://mdtayoburrahman.com/
 * @date 2025-06-26
 * @time 12:27
 * @copyright (c) 2025 Md Tayobur Rahman
 * @package config
 */

/**
 * Email Tester Configuration
 *
 * Global configuration settings for the email validation tool
 */

// Application settings
define('APP_NAME', 'Email Validator Pro');
define('APP_VERSION', '2.0.0');
define('APP_DESCRIPTION', 'Professional Email Validation Tool');

// Paths
define('BASE_PATH', dirname(__FILE__));
define('ASSETS_PATH', '/email tester/assets');
define('API_PATH', '/email tester/api');

// API Settings
define('API_TIMEOUT', 10);  // seconds
define('MAX_BATCH_SIZE', 100);
define('ENABLE_DEBUG', true);

// Security settings
define('ALLOW_CORS', true);
define('RATE_LIMIT_ENABLED', false);
define('RATE_LIMIT_PER_MINUTE', 60);

// Email validation settings
define('SMTP_TIMEOUT', 10);
define('DNS_TIMEOUT', 5);
define('MAX_MX_SERVERS_CHECK', 3);

// Database settings (for future enhancement)
define('DB_ENABLED', false);
define('DB_HOST', 'localhost');
define('DB_NAME', 'email_validator');
define('DB_USER', 'root');
define('DB_PASS', '');

// Logging
define('LOG_ENABLED', true);
define('LOG_PATH', BASE_PATH . '/logs');
define('LOG_LEVEL', 'INFO');  // DEBUG, INFO, WARNING, ERROR

// Features
define('FEATURE_BATCH_TESTING', true);
define('FEATURE_ADVANCED_ANALYSIS', true);
define('FEATURE_EXPORT_REPORTS', true);
define('FEATURE_DIAGNOSTICS', true);

// Performance
define('CACHE_ENABLED', false);
define('CACHE_TTL', 3600);  // 1 hour

?>
