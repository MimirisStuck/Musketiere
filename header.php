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
            <img src="<?php echo get_template_directory_uri(); ?>/images/MusketierLogo2.jpg" alt="">
        </div>
        <div class="header-nav">
            <img src="<?php echo get_template_directory_uri(); ?>/images/MusketierSchriftzug.jpg" alt="">
            <nav class="nav">
                <?php wp_nav_menu(array('theme_location' => 'main-menu')); ?>
            </nav>
        </div>
    </div>
</header>
<main>