<?php get_header(); ?>

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h1>Gallery</h1>
      <?php
      if (have_posts()):
        while (have_posts()):
          the_post();
          ?>
          <h2><a href="<?php the_permalink(); ?>">
              <?php the_title(); ?>
            </a></h2>
          <div class="gallery-thumbnail">
            <?php
            if (has_post_thumbnail()) {
              the_post_thumbnail('thumbnail');
            } else {
              echo 'Không có ảnh đại diện';
            }
            ?>
          </div>
          <div class="gallery-excerpt">
            <?php the_excerpt(); ?>
          </div>
          <?php
        endwhile;
      else:
        echo 'Không có gallery nào.';
      endif;
      ?>
    </div>
  </div>
</div>

<?php get_footer(); ?>

