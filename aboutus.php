<?php
/*
Template Name: Über uns Template
*/
get_header();
?>

<?php
if (have_posts()) :
  while (have_posts()) : the_post();
?>

  <div class="aboutus">
    <h1 class="aboutus-title"><?php the_title(); ?></h1>
    <?php
    $content = get_the_content();
    $blocks = parse_blocks($content);

    foreach ($blocks as $block) {
        $rendered = render_block($block);
        
        // Leere Blöcke überspringen, außer Bilder
        $blockName = $block['blockName'] ?? '';
        if (empty(trim(strip_tags($rendered))) && $blockName !== 'core/image') {
            continue;
        }

        // Block-Typ ermitteln
        $type = $blockName ? str_replace('core/', '', $blockName) : 'unknown';

        // In ein <div> mit passender Klasse packen
        echo '<div class="aboutus-' . $type . '">';
        echo $rendered;
        echo '</div>';
    }
    ?>

<?php
  endwhile;
endif;
?>

<?php get_footer(); ?>