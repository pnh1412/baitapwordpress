<?php
get_header();

$taxonomy = get_queried_object();

$args = array(
  'post_type' => 'galleries',
  'tax_query' => array(
    array(
      'taxonomy' => $taxonomy->taxonomy,
      'field' => 'term_id',
      'terms' => $taxonomy->term_id,
    ),
  ),
);

$gallery_query = new WP_Query($args);

if ($gallery_query->have_posts()):
  while ($gallery_query->have_posts()):
    $gallery_query->the_post();
    the_title();

    if (has_post_thumbnail()) {
      the_post_thumbnail('large');
    }
  endwhile;
  wp_reset_postdata();
else:
  echo 'Không có gallery nào.';
endif;

get_footer();
?>

