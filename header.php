<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php bloginfo('name'); ?> | <?php wp_title(); ?></title>
    <?php wp_head(); ?>
</head>
<body>
<header>
    <h1><?php bloginfo('name'); ?></h1>
    <nav>
        <?php wp_nav_menu(array('theme_location' => 'main-menu')); ?>
    </nav>
</header>