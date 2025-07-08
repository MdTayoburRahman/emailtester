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
    
    <!-- Preconnect for Performance -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    
    <!-- DNS Prefetch for Performance -->
    <link rel="dns-prefetch" href="//fonts.googleapis.com">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">

    <!-- Default CSS -->
    <link rel="stylesheet" href="<?php echo ASSETS_PATH; ?>/css/style.css">

    <!-- Custom CSS files -->
    <?php foreach ($customCSS as $css): ?>
        <link rel="stylesheet" href="<?php echo ASSETS_PATH; ?>/css/<?php echo $css; ?>">
    <?php endforeach; ?>
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

<!-- Header Styles for Logo -->
<style>
.nav-brand {
    display: flex;
    align-items: center;
    gap: 15px;
}

.nav-logo {
    height: 45px;
    width: auto;
    max-width: 45px;
    object-fit: contain;
    transition: all 0.3s ease;
}

.nav-logo:hover {
    transform: scale(1.1);
    filter: drop-shadow(0 4px 8px rgba(0, 0, 0, 0.2));
}

.brand-text {
    display: flex;
    flex-direction: column;
    gap: 2px;
}

.brand-text h2 {
    margin: 0;
    font-size: 20px;
    font-weight: bold;
    color: inherit;
    line-height: 1;
}

.brand-text .version {
    font-size: 12px;
    opacity: 0.8;
    font-weight: 400;
    line-height: 1;
}

/* Make logo clickable link */
.nav-brand {
    cursor: pointer;
    text-decoration: none;
    color: inherit;
    transition: all 0.3s ease;
}

.nav-brand:hover {
    color: inherit;
    text-decoration: none;
}

.nav-brand:hover .nav-logo {
    transform: scale(1.05);
}

.nav-brand:hover .brand-text h2 {
    color: #4ecdc4;
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .nav-logo {
        height: 35px;
        max-width: 35px;
    }
    
    .brand-text h2 {
        font-size: 18px;
    }
    
    .brand-text .version {
        font-size: 10px;
    }
    
    .nav-brand {
        gap: 10px;
    }
}

@media (max-width: 480px) {
    .nav-logo {
        height: 30px;
        max-width: 30px;
    }
    
    .brand-text h2 {
        font-size: 16px;
    }
    
    .nav-brand {
        gap: 8px;
    }
}
</style>
