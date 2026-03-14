<?php get_header(); ?>

<main>
<?php
if (have_posts()) :
    while (have_posts()) : the_post();
        // Seitentitel
        echo '<h2>' . get_the_title() . '</h2>';
        // Inhalt der Seite (aus WordPress)
        the_content();
    endwhile;
else :
    echo '<p>No content found</p>';
endif;
?>
</main>

<?php get_footer(); ?>  