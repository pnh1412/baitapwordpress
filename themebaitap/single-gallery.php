<?php get_header(); ?>

<!-- day la trang gallery -->
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <?php
      if (have_posts()):
        while (have_posts()):
          the_post();
          ?>
          <h1>
            <?php the_title(); ?>
          </h1>
          <div class="gallery-content">
            <?php the_content(); ?>
          </div>
          <?php
        endwhile;
      endif;
      ?>
    </div>
  </div>
</div>

<?php get_footer(); ?>

