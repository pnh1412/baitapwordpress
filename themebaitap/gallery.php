<?php
get_header();
?>
<article class="content px-3 py-5 p-md-5">
  <?php
  $gallery = get_field('gallery');

  if ($gallery) {
    foreach ($gallery as $gallery_image) {
      echo '<img src="' . $gallery_image['url'] . '" alt="' . $gallery_image['alt'] . '">';
    }
  }
  ?>
</article>

<?php
get_footer();
?>

