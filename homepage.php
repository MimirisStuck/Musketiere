<?php
/*
Template Name: Homepage
*/
get_header();

$blocks = parse_blocks(get_the_content());

$images = [];
$text_blocks = [];

foreach ($blocks as $block) {

    if ($block['blockName'] === 'core/image') {

        $images[] = $block;
    }else {
        $text_blocks[] = $block;
    }
}

$hero = $images[0];
$gallery = array_slice($images, 1);

?>

<!-- Hero -->
<?php if (!empty($hero['attrs']['id'])) : ?>
<!--     <section class="homepage-hero">
        <?php echo wp_get_attachment_image(
            $hero['attrs']['id'],
            'full'
        ); ?>
    </section> -->
<?php endif; ?>

<!-- Galerie -->
<?php if (!empty($gallery)) : ?>
    <section class="homepage-gallery-slider gallery-slider">
        <div class="homepage-gallery-slider-container">
            <button class="homepage-gallery-slider-prev slide-prev">&lt;</button>
            <?php foreach ($gallery as $index => $image) : ?>
                <div class="slide homepage-gallery-slider-slide <?php echo $index === 0 ? 'active' : ''; ?>">
                    <?php echo wp_get_attachment_image(
                        $image['attrs']['id'],
                        'large'
                    ); ?>
                </div>
            <?php endforeach; ?>
            <button class="homepage-gallery-slider-next slide-next">&gt;</button>
        </div>
    </section>
<?php endif; ?>

<!-- Text -->
<section class="homepage-content-text">
    <?php
    foreach ($text_blocks as $block) {
        echo render_block($block);
    }
    ?>
</section>

<!-- Posts -->
<section class="homepage-latest-posts">
    <?php
    $posts = new WP_Query([
        'post_type' => 'post',
        'posts_per_page' => 3
    ]);
    while ($posts->have_posts()) :
        $posts->the_post();
    ?>
        <article class="homepage-latest-posts-card">
            <h3><?php the_title(); ?></h3>
            <div class="homepage-latest-posts-flex">
                <?php the_excerpt(); ?>
                <?php if (has_post_thumbnail()) : ?>
                    <div class="homepage-latest-posts-image">
                        <a href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail('large'); ?>
                        </a>
                    </div>
                <?php endif; ?>
            </div>
            <a href="<?php the_permalink(); ?>">Mehr lesen</a>
        </article>
    <?php endwhile; ?>
    <?php wp_reset_postdata(); ?>
</section>



<?php get_footer(); ?>