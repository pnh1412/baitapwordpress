<footer>
  <div class="footer__content">
    <?php
    $footer = get_field('footer', 'option');

    if ($footer) {
      $footer_image = $footer['footer_image'];
      $footer_content = $footer['footer_content'];
      $footer_menu = $footer['footer_menu'];
      $footer_submenu = $footer['footer_submenu'];
      $footer_copyright = $footer['footer_copyright'];
    }
    ?>
    <div class="footer__logo">
      <img src="<?php echo $footer_image; ?>" alt="Logo">
    </div>
    <div class="container">
      <div class="row">
        <div class="footer__col">
          <?php
          // Kiểm tra nếu mảng footer_content không rỗng.
          if (!empty($footer_content)) {
            // Lặp qua mảng footer_content để hiển thị các giá trị của mỗi mục.
            foreach ($footer_content as $content_item) {
              $footer_item_text = $content_item['footer_text'];
              $footer_item_description = $content_item['footer_description'];
              $footer_item_email = $content_item['footer_email'];
              $footer_item_tel = $content_item['footer_tel'];
              $footer_item_phone = $content_item['footer_phone'];
              ?>
              <h4>
                <?php echo $footer_item_text; ?>
              </h4>
              <ul>
                <li>
                  <?php echo $footer_item_description; ?>
                  <?php echo "</br>"; ?>

                  <?php if ($footer_item_email): ?>
                    <?php echo 'Email: ' . $footer_item_email; ?>
                    <?php echo "</br>"; ?>
                  <?php endif; ?>

                  <?php if ($footer_item_tel): ?>
                    <?php echo 'Điện thoại: + ' . $footer_item_tel; ?>
                    <?php echo "</br>"; ?>
                  <?php endif; ?>

                  <?php if ($footer_item_phone): ?>
                    <?php echo 'Di động: + ' . $footer_item_phone; ?>
                    <?php echo "</br>"; ?>
                  <?php endif; ?>
                </li>

              </ul>
              <?php
            }
          }
          ?>
        </div>

        <div class="footer__col">
          <h4>Bài đăng gần đây</h4>
          <?php
          $args = array(
            'post_type' => 'post',
            'posts_per_page' => 3,
            // Số lượng bài viết cần lấy
          );
          $query = new WP_Query($args);

          if ($query->have_posts()) {
            while ($query->have_posts()) {
              $query->the_post();
              $post_title = get_the_title();
              $post_date = get_the_date();
              $comment_count = get_comments_number();
              ?>
              <ul>
                <li><span>
                    <?php echo $post_date; ?>
                    <?php echo ' Số lượng bình luận: ' . $comment_count; ?>
                  </span></li>
                <li>
                  <h5>
                    <a href="<?php echo get_permalink($post_id); ?>">
                      <?php echo $post_title; ?>
                    </a>
                  </h5>
                </li>
              </ul>
              <?php
            }
            wp_reset_postdata();
          }
          ?>
        </div>


        <div class="footer__col">
          <?php

          if ($footer) {
            foreach ($footer['footer_submenu'] as $submenu_item) {
              $footer_nav = $submenu_item['footer_nav'];
              $footer_text = $submenu_item['footer_text'];
              $footer_text_2 = $submenu_item['footer_text_2'];
              $footer_text_3 = $submenu_item['footer_text_3'];
              $footer_text_4 = $submenu_item['footer_text_4'];
              if ($footer_nav) {
                echo '<h4>' . $footer_nav . '</h4>';
              }

              echo '<ul>';
              echo '<li>' . $footer_text . '</li>';
              if (isset($footer_text_2)) {
                echo '<li>' . $footer_text_2 . '</li>';
              }
              if (isset($footer_text_3)) {
                echo '<li>' . $footer_text_3 . '</li>';
              }
              if (isset($footer_text_4) && !empty($footer_text_4)) {
                echo '<li>' . $footer_text_4 . '</li>';
              }
              echo '</ul>';
            }
          }
          ?>
        </div>
        <div class="footer__col">
          <?php

          if ($footer) {
            foreach ($footer['footer_anothersubmenu'] as $submenu_item) {
              $footer_nav = $submenu_item['footer_nav'];
              $footer_text = $submenu_item['footer_text'];
              $footer_text_2 = $submenu_item['footer_text_2'];
              $footer_text_3 = $submenu_item['footer_text_3'];
              $footer_text_4 = $submenu_item['footer_text_4'];
              if ($footer_nav) {
                echo '<h4>' . $footer_nav . '</h4>';
              }

              echo '<ul>';
              echo '<li>' . $footer_text . '</li>';
              if (isset($footer_text_2)) {
                echo '<li>' . $footer_text_2 . '</li>';
              }
              if (isset($footer_text_3)) {
                echo '<li>' . $footer_text_3 . '</li>';
              }
              if (isset($footer_text_4) && !empty($footer_text_4)) {
                echo '<li>' . $footer_text_4 . '</li>';
              }
              echo '</ul>';


            }
          }
          ?>
        </div>
      </div>
    </div>
  </div>
  <div class="footer_copyright">
    <p>
      <?php echo $footer_copyright; ?>
    </p>
  </div>
</footer>
