<?php
/*
Template Name: Nutzer Admin Page
*/
get_header();
?>

<main class="custom-page">
    <h1><?php the_title(); ?></h1>

    <?php
    // Inhalte der Seite anzeigen
    while ( have_posts() ) : the_post();
        the_content();
    endwhile;
    ?>

    <div class="special-section">
        <p>Hier kommt dein individuelles Design hin!</p>
    </div>
</main>

<?php get_footer(); ?>