<?php
/*
Template Name: Downloads Template
*/
get_header();
?>

<div class="downloads">
    <h1 class="downloads-title"><?php the_title(); ?></h1>

    <?php /* echo get_the_content();  */?>
<?php

$content = get_the_content();

preg_match('/href="([^"]+\.pdf)"/i', $content, $matches);

$pdf_url = $matches[1] ?? null;

if ($pdf_url) {

    // Attachment ID der PDF holen
    $pdf_id = attachment_url_to_postid($pdf_url);

    // Thumbnail der ersten Seite holen
    $thumbnail = wp_get_attachment_image_url($pdf_id, 'large');

    ?>
    <div class="downloads-pdf-card">

        <a class="downloads-pdf-link" href="<?php echo $pdf_url; ?>" target="_blank">
            <?php if ($thumbnail): ?>
                <img class="downloads-pdf-thumbnail" src="<?php echo $thumbnail; ?>" alt="PDF Vorschau">
            <?php else: ?>
                <p>Keine Vorschau verfügbar</p>
            <?php endif; ?>
        </a>
        </br>
        <a href="<?php echo $pdf_url; ?>" download class="downloads-pdf-btn">
            Download
        </a>

    </div>
    <?php
}
?>

</div>

<?php get_footer(); ?>