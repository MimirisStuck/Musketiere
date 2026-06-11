<?php
/*
Template Name: Mieten Template
*/
get_header();
?>
<?php
$blocks = parse_blocks(get_the_content());

foreach ($blocks as $block) {

    if ($block['blockName'] !== 'core/group') {
        continue;
    }

    $headline = '';
    $gallery = [];
    $content = '';

    foreach ($block['innerBlocks'] as $innerBlock) {

        // H2
        if ($innerBlock['blockName'] === 'core/heading') {

            $headline = wp_strip_all_tags(
                render_block($innerBlock)
            );

            continue;
        }

        // Bilder
        if ($innerBlock['blockName'] === 'core/gallery') {

            foreach ($innerBlock['innerBlocks'] as $imageBlock) {

                if (
                    $imageBlock['blockName'] === 'core/image'
                    && !empty($imageBlock['attrs']['id'])
                ) {
                    $gallery[] = $imageBlock['attrs']['id'];
                }
            }

            continue;
        }

        // Alles andere als Text rendern
        $content .= render_block($innerBlock);
    }


    ?>

    <section class="rent">

        <?php if ($headline) : ?>
            <h2><?php echo esc_html($headline); ?></h2>
        <?php endif; ?>

        <?php if (!empty($gallery)) : ?>
            <div class="rent-gallery-slider gallery-slider">
                <div class="rent-gallery-slider-container">
                    <button class="rent-gallery-slider-prev slide-prev">&lt;</button>

                    <?php foreach ($gallery as $index => $image_id) : ?>

                        <div class="slide rent-gallery-slider-slide <?php echo $index === 0 ? 'active' : ''; ?>">

                            <?php echo wp_get_attachment_image($image_id, 'large'); ?>

                        </div>

                    <?php endforeach; ?>

                    <button class="rent-gallery-slider-next slide-next">&gt;</button>
                </div>


            </div>

        <?php endif; ?>

        <div class="rent-text">
            <?php echo $content; ?>
        </div>

    </section>

    <?php
}

?>


<?php
get_footer();
?>