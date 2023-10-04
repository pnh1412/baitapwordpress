<?php
get_header();

$taxonomy = get_queried_object();

$taxonomy_name = 'galleries';
$term_slug = 'No description	gallery-categories';

$args = array(
  'post_type' => 'post',
  'tax_query' => array(
    array(
      'taxonomy' => $taxonomy_name,
      'field' => 'slug',
      'terms' => $term_slug,
    ),
  ),
);

$gallery_query = new WP_Query($args);

if ($gallery_query->have_posts()):
  while ($gallery_query->have_posts()):
    $gallery_query->the_post();
    ?>
    <h2>
      <?php the_title(); ?>
    </h2>
    <?php
    if (has_post_thumbnail()) {
      the_post_thumbnail('large');
    }
  endwhile;
  wp_reset_postdata();
else:
  echo 'Không có bài viết nào từ taxonomy này.';
endif;

get_footer();
?>

