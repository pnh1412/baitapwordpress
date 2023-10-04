<?php
// Truy vấn các bài viết từ Custom Post Type "CustomPostType"
$args = array(
  'post_type' => 'CustomPostType',
  // Thay 'CustomPostType' bằng tên thực của Custom Post Type của bạn
  'posts_per_page' => -1,
  // Hiển thị tất cả bài viết từ Custom Post Type
);

$custom_query = new WP_Query($args);

get_header();
?>

<article class="content px-3 py-5 p-md-5">
  <?php get_search_form(); ?>
  <?php
  if ($custom_query->have_posts()) {
    while ($custom_query->have_posts()) {
      $custom_query->the_post();
      get_template_part('template-parts/content', 'archive');
    }
  }
  wp_reset_postdata(); // Đặt lại dữ liệu của bài viết
  ?>
  <?php
  the_posts_pagination(
    array(
      'mid_size' => 2,
      'prev_text' => __('Prev', 'textdomain'),
      'next_text' => __('Next', 'textdomain'),
    )
  );
  ?>
</article>

<?php
get_footer();
?>

