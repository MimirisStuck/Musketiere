<?php
/*
Template Name: Homepage
*/
get_header();
?>

<?php
$args = array(
  'post_type' => 'post',
);

$query = new WP_Query($args);

if ($query->have_posts()) :
  while ($query->have_posts()) : $query->the_post();
?>
    <div class="post-block">
        <div class="post-text-block">
            <h2 class="post-title"><?php echo get_the_title(); ?></h2>
            <p class="post-excerpt"><?php echo get_the_excerpt(); ?></p>
            <a class="post-link" href="<?php the_permalink(); ?>">Weiter lesen</a>
        </div>
        <div class="post-img-block">
            <?php the_post_thumbnail('medium', ['class' => 'post-img']); ?>
        </div>
    </div>
<?php
  endwhile;
  wp_reset_postdata();
else :
  echo '<p>Keine Beiträge gefunden</p>';
endif;
?>