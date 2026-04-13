<?php
/*
Template Name: Downloads Template
*/
get_header();
?>

<div class="downloads">
    <h1 class="downloads-title"><?php the_title(); ?></h1>

    <?php
    $image_ids = get_post_meta(get_the_ID(), 'download_images', true);

    if ($image_ids) :
        $image_ids = explode(',', $image_ids);
    ?>
        <div class="downloads-gallery">
            <?php foreach ($image_ids as $id): ?>
                <?php $url = wp_get_attachment_image_url($id, 'medium'); ?>
                <img src="<?php echo esc_url($url); ?>" />
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <a href="<?php echo esc_url($pdf_url); ?>" target="_blank">
        <img src="<?php echo esc_url($img_url); ?>" alt="<?php the_title(); ?>" class="downloads-preview">
    </a>
</div>

<?php get_footer(); ?>