<?php

/**
 * Header template file
 * Contains the page header and navigation
 *
 * @author Md Tayobur Rahman
 * @email - tayoburrahman119@gmail.com
 * @whatsapp -+974 7183 0623 / +880 1717 932348
 * @link - https://mdtayoburrahman.com/
 * @date 2025-06-26
 * @time 12:27
 * @copyright (c) 2025 Md Tayobur Rahman
 */
require_once 'config.php';

// Set default values if not provided
$pageTitle = isset($pageTitle) ? $pageTitle : 'Email Validator';
$currentPage = isset($currentPage) ? $currentPage : 'index.php';
$customCSS = isset($customCSS) ? $customCSS : [];
$pageDescription = isset($pageDescription) ? $pageDescription : APP_DESCRIPTION;
$pageKeywords = isset($pageKeywords) ? $pageKeywords : 'email validation, email tester, email checker, SMTP test, email verification, domain validation, MX record check';
$canonicalUrl = isset($canonicalUrl) ? $canonicalUrl : 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

// Generate page title
$title = !empty($pageTitle) ? $pageTitle . ' - ' . APP_NAME : APP_NAME;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Basic Meta Tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <!-- SEO Meta Tags -->
    <title><?php echo htmlspecialchars($title); ?></title>
    <meta name="description" content="<?php echo htmlspecialchars($pageDescription); ?>">
    <meta name="keywords" content="<?php echo htmlspecialchars($pageKeywords); ?>">
    <meta name="author" content="Md Tayobur Rahman">
    <meta name="publisher" content="Email Validator Pro">
    <meta name="copyright" content="© <?php echo date('Y'); ?> Email Validator Pro. All rights reserved.">
    <meta name="robots" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1">
    <meta name="googlebot" content="index, follow">
    <meta name="bingbot" content="index, follow">
    
    <!-- Canonical URL -->
    <link rel="canonical" href="<?php echo htmlspecialchars($canonicalUrl); ?>">
    
    <!-- Language and Locale -->
    <meta name="language" content="English">
    <meta name="geo.region" content="QA">
    <meta name="geo.country" content="Qatar">
    
    <!-- Open Graph / Facebook Meta Tags -->
    <meta property="og:type" content="website">
    <meta property="og:title" content="<?php echo htmlspecialchars($title); ?>">
    <meta property="og:description" content="<?php echo htmlspecialchars($pageDescription); ?>">
    <meta property="og:url" content="<?php echo htmlspecialchars($canonicalUrl); ?>">
    <meta property="og:site_name" content="<?php echo APP_NAME; ?>">
    <meta property="og:image" content="<?php echo 'https://' . $_SERVER['HTTP_HOST'] . ASSETS_PATH; ?>/images/feature_image.png">
    <meta property="og:image:alt" content="<?php echo APP_NAME; ?> - Professional Email Validation Tool">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:locale" content="en_US">
    
    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?php echo htmlspecialchars($title); ?>">
    <meta name="twitter:description" content="<?php echo htmlspecialchars($pageDescription); ?>">
    <meta name="twitter:image" content="<?php echo 'https://' . $_SERVER['HTTP_HOST'] . ASSETS_PATH; ?>/images/feature_image.png">
    <meta name="twitter:image:alt" content="<?php echo APP_NAME; ?> - Professional Email Validation">
    <meta name="twitter:site" content="@emailvalidator">
    <meta name="twitter:creator" content="@mdtayoburrahman">
    
    <!-- LinkedIn Meta Tags -->
    <meta property="og:image:type" content="image/jpeg">
    <meta name="linkedin:owner" content="Md Tayobur Rahman">
    
    <!-- Additional SEO Meta Tags -->
    <meta name="rating" content="general">
    <meta name="distribution" content="global">
    <meta name="revisit-after" content="1 days">
    <meta name="expires" content="never">
    <meta name="theme-color" content="#2a5298">
    <meta name="msapplication-TileColor" content="#2a5298">
    <meta name="application-name" content="<?php echo APP_NAME; ?>">
    
    <!-- Mobile App Meta Tags -->
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <meta name="apple-mobile-web-app-title" content="<?php echo APP_NAME; ?>">
    
    <!-- Structured Data / Schema.org -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "WebApplication",
        "name": "<?php echo APP_NAME; ?>",
        "description": "<?php echo htmlspecialchars($pageDescription); ?>",
        "url": "<?php echo htmlspecialchars($canonicalUrl); ?>",
        "applicationCategory": "WebApplication",
        "operatingSystem": "Web Browser",
        "author": {
            "@type": "Person",
            "name": "Md Tayobur Rahman",
            "email": "tayoburrahman119@gmail.com",
            "url": "https://mdtayoburrahman.com/"
        },
        "creator": {
            "@type": "Person",
            "name": "Md Tayobur Rahman",
            "email": "tayoburrahman119@gmail.com"
        },
        "offers": {
            "@type": "Offer",
            "price": "0",
            "priceCurrency": "USD"
        },
        "featureList": [
            "Email Format Validation",
            "Domain Verification",
            "MX Record Lookup",
            "SMTP Testing",
            "Batch Processing",
            "Real-time Validation"
        ]
    }
    </script>
    
    <!-- Favicon and App Icons -->
    <link rel="icon" type="image/png" href="<?php echo ASSETS_PATH; ?>/images/logo.png">
    <link rel="shortcut icon" href="<?php echo ASSETS_PATH; ?>/images/logo.png">
    <link rel="apple-touch-icon" href="<?php echo ASSETS_PATH; ?>/images/logo.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo ASSETS_PATH; ?>/images/logo.png">
    
    <!-- Microsoft Tiles -->
    <meta name="msapplication-TileImage" content="<?php echo ASSETS_PATH; ?>/images/logo.png">
    <meta name="msapplication-TileColor" content="#2a5298">
    
    <!-- Web App Manifest -->
    <link rel="manifest" href="<?php echo ASSETS_PATH; ?>/manifest.json">
    
    <!-- Fallback paths for different server configurations -->
    <link rel="icon" type="image/png" href="../assets/images/logo.png" onerror="this.remove();">
    <link rel="icon" type="image/png" href="./assets/images/logo.png" onerror="this.remove();">
    
    <!-- Preconnect for Performance -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    
    <!-- DNS Prefetch for Performance -->
    <link rel="dns-prefetch" href="//fonts.googleapis.com">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">

    <!-- Default CSS -->
    <link rel="stylesheet" href="<?php echo ASSETS_PATH; ?>/css/style.css">
    
    <!-- Fallback CSS path for different server configurations -->
    <link rel="stylesheet" href="../assets/css/style.css" onerror="this.remove();">
    <link rel="stylesheet" href="./assets/css/style.css" onerror="this.remove();">

    <!-- Custom CSS files -->
    <?php foreach ($customCSS as $css): ?>
        <link rel="stylesheet" href="<?php echo ASSETS_PATH; ?>/css/<?php echo $css; ?>">
    <?php endforeach; ?>
    
    <!-- Debug: Show paths in development -->
    <?php if (defined('ENABLE_DEBUG') && ENABLE_DEBUG): ?>
    <!-- Debug: ASSETS_PATH = <?php echo ASSETS_PATH; ?> -->
    <!-- Debug: Current URL = <?php echo $_SERVER['REQUEST_URI']; ?> -->
    <!-- Debug: Script Name = <?php echo $_SERVER['SCRIPT_NAME']; ?> -->
    <?php endif; ?>
</head>
<body>

<!-- Navigation Menu -->
<nav class="main-navigation">
    <div class="nav-container">
        <a href="index.php" class="nav-brand">
            <img src="<?php echo ASSETS_PATH; ?>/images/logo_transparent.png" alt="<?php echo APP_NAME; ?> Logo" class="nav-logo">
            <div class="brand-text">
                <h2><?php echo APP_NAME; ?></h2>
                <span class="version">v<?php echo APP_VERSION; ?></span>
            </div>
        </a>
        <ul class="nav-menu">
            <?php
            $menuItems = [
                'index.php' => ['title' => 'Home', 'icon' => '🏠'],
                'test.php' => ['title' => 'Test API', 'icon' => '🧪'],
            ];

            foreach ($menuItems as $page => $info):
                $activeClass = ($currentPage === $page) ? ' class="active"' : '';
                ?>
                <li<?php echo $activeClass; ?>>
                    <a href="<?php echo $page; ?>">
                        <span class="nav-icon"><?php echo $info['icon']; ?></span>
                        <span class="nav-text"><?php echo $info['title']; ?></span>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</nav>

<!-- Header Styles -->
<style>
/* Critical CSS - Embedded to ensure it always loads */
body {
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
    margin: 0;
    padding: 0;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    min-height: 100vh;
    color: #333;
}

/* Simple Navigation Styles */
.main-navigation {
    background: #2c3e50;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    position: sticky;
    top: 0;
    z-index: 1000;
}

.nav-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    min-height: 70px;
}

/* Brand Section */
.nav-brand {
    display: flex;
    align-items: center;
    gap: 12px;
    text-decoration: none;
    color: #ffffff;
    transition: opacity 0.2s ease;
}

.nav-brand:hover {
    color: #ffffff;
    text-decoration: none;
    opacity: 0.9;
}

/* Logo Styling */
.nav-logo {
    height: 45px;
    width: auto;
    max-width: 45px;
    object-fit: contain;
    border-radius: 8px;
    padding: 6px;
    background: rgba(255, 255, 255, 0.95);
}

/* Brand Text */
.brand-text {
    display: flex;
    flex-direction: column;
    gap: 2px;
}

.brand-text h2 {
    margin: 0;
    font-size: 22px;
    font-weight: 700;
    color: #ffffff;
    line-height: 1;
}

.brand-text .version {
    font-size: 11px;
    font-weight: 500;
    color: rgba(255, 255, 255, 0.7);
    background: rgba(255, 255, 255, 0.15);
    padding: 2px 6px;
    border-radius: 10px;
}

/* Navigation Menu */
.nav-menu {
    display: flex;
    list-style: none;
    margin: 0;
    padding: 0;
    gap: 8px;
}

.nav-menu li {
    position: relative;
}

.nav-menu a {
    display: flex;
    align-items: center;
    gap: 6px;
    padding: 10px 16px;
    color: rgba(255, 255, 255, 0.9);
    text-decoration: none;
    border-radius: 6px;
    transition: all 0.3s ease;
    font-weight: 500;
    font-size: 14px;
}

.nav-menu a:hover {
    color: #ffffff;
    background: rgba(255, 255, 255, 0.15);
}

.nav-menu li.active a {
    background: #3498db;
    color: #ffffff;
}

/* Icon Styling */
.nav-icon {
    font-size: 16px;
}

.nav-text {
    font-size: 14px;
    font-weight: 500;
}

/* Responsive Design */
@media (max-width: 768px) {
    .nav-container {
        padding: 0 15px;
        min-height: 60px;
    }
    
    .nav-logo {
        height: 40px;
        max-width: 40px;
    }
    
    .brand-text h2 {
        font-size: 20px;
    }
    
    .brand-text .version {
        font-size: 10px;
        padding: 1px 6px;
    }
    
    .nav-brand {
        gap: 10px;
    }
    
    .nav-menu {
        gap: 5px;
    }
    
    .nav-menu a {
        padding: 8px 12px;
        font-size: 13px;
    }
    
    .nav-icon {
        font-size: 15px;
    }
    
    .nav-text {
        display: none;
    }
}

@media (max-width: 480px) {
    .nav-container {
        flex-wrap: wrap;
        min-height: auto;
        padding: 10px 15px;
    }
    
    .nav-logo {
        height: 35px;
        max-width: 35px;
    }
    
    .brand-text h2 {
        font-size: 18px;
    }
    
    .nav-brand {
        gap: 8px;
    }
    
    .nav-menu {
        width: 100%;
        justify-content: center;
        margin-top: 10px;
        gap: 8px;
    }
    
    .nav-menu a {
        padding: 8px 10px;
        border-radius: 4px;
    }
}

/* Subtle scroll effect */
.main-navigation.scrolled {
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
}
</style>

<!-- Simple Header JavaScript -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const navigation = document.querySelector('.main-navigation');
    
    // Simple scroll effect for navigation
    window.addEventListener('scroll', function() {
        const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
        
        if (scrollTop > 50) {
            navigation.classList.add('scrolled');
        } else {
            navigation.classList.remove('scrolled');
        }
    });
});
</script>
