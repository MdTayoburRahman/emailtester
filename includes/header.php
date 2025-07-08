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

// Generate page title
$title = !empty($pageTitle) ? $pageTitle . ' - ' . APP_NAME : APP_NAME;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo APP_DESCRIPTION; ?>">
    <meta name="keywords" content="email validation, email tester, email checker, SMTP test">
    <meta name="author" content="Email Validator Team">
    <meta name="robots" content="index, follow">

    <!-- Open Graph tags -->
    <meta property="og:title" content="<?php echo htmlspecialchars($title); ?>">
    <meta property="og:description" content="<?php echo APP_DESCRIPTION; ?>">
    <meta property="og:type" content="website">

    <title><?php echo htmlspecialchars($title); ?></title>

    <!-- Default CSS -->
    <link rel="stylesheet" href="<?php echo ASSETS_PATH; ?>/css/style.css">

    <!-- Custom CSS files -->
    <?php foreach ($customCSS as $css): ?>
        <link rel="stylesheet" href="<?php echo ASSETS_PATH; ?>/css/<?php echo $css; ?>">
    <?php endforeach; ?>

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="<?php echo ASSETS_PATH; ?>/favicon.ico">
</head>
<body>

<!-- Navigation Menu -->
<nav class="main-navigation">
    <div class="nav-container">
        <div class="nav-brand">
            <h2><?php echo APP_NAME; ?></h2>
            <span class="version">v<?php echo APP_VERSION; ?></span>
        </div>
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
