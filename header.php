<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php bloginfo('name'); ?> | <?php wp_title(); ?></title>
    <?php wp_head(); ?>
</head>
<body>
<header  class="header">
    <div class="header-inner">
        <div class="header-logo">
            <img src="<?php echo get_template_directory_uri(); ?>/images/MusketierLogo2_NoBg2.png" alt="">
        </div>
        <div class="header-nav">
            <img src="<?php echo get_template_directory_uri(); ?>/images/MusketierText2_NoBg_jaa2.png" alt="">
            <nav class="nav">
                <?php wp_nav_menu(array('theme_location' => 'main-menu')); ?>
            </nav>
        </div>
    </div>
</header>
<main>