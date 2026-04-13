<?php
/*
Template Name: Downloads Template
*/
get_header();
?>

<div class="downloads">
    <h1 class="downloads-title"><?php the_title(); ?></h1>

    <?php
    // PDF-Link als Custom Field oder fester Pfad
    $pdf_url = get_post_meta(get_the_ID(), 'download_pdf', true); 
    // Alternativ, fester Pfad:
    // $pdf_url = get_template_directory_uri() . '/images/Downloadexample.pdf';

    // Bild-Vorschau (Featured Image der Page)
    if (has_post_thumbnail()) {
        $img_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
    } else {
        // Fallback-Bild
        $img_url = get_template_directory_uri() . '/images/pdf-placeholder.png';
    }
    ?>

    <a href="<?php echo esc_url($pdf_url); ?>" target="_blank">
        <img src="<?php echo esc_url($img_url); ?>" alt="<?php the_title(); ?>" class="downloads-preview">
    </a>
</div>

<?php get_footer(); ?>