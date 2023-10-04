<?php
/*
Template Name: Trang chủ
*/

get_header();
?>

<div class="banner">
  <?php
  $banner = get_field('banner');
  if ($banner) {
    $banner_image = $banner['banner_image'];
    $banner_title = $banner['banner_title'];
    $banner_description = $banner['banner_description'];
  }
  ?>
  <img src="<?php echo $banner_image; ?>" alt="Banner Image">
  <div class="banner__content">
    <h1>
      <?php echo $banner_title; ?>
    </h1>
    <div class="banner__content-text">
      <?php echo $banner_description; ?>
    </div>
    <div class="banner__content-btn">
      <button class="btn-red" type="button">Dự án VDV là gì?</button>
      <button class="btn-blur" type="button">Liên hệ</button>
    </div>
  </div>
</div>

<div class="logo">
  <?php
  $logo = get_field('logo');
  if ($logo) {
    $logo_image = $logo['logo_image'];
    $logo_title = $logo['logo_title'];
    $logo_description = $logo['logo_description'];
  }
  ?>
  <img src="<?php echo $logo_image; ?>" alt="Logo">
  <div class="logo__block">
    <h2>
      <?php echo $logo_title; ?>
    </h2>
    <div class="logo__crossbar"></div>
    <p>
      <?php echo $logo_description; ?>
    </p>
  </div>
</div>

<div class="content">

  <!-- content 1 -->
  <?php
  $content = get_field('content');
  // Check rows exist.
  
  if (have_rows('content')):
    $total_rows = count($content); // Tính tổng số dòng.
    $row_count = 0;
    while (have_rows('content')):
      the_row();
      $row_count++;

      $content_title = get_sub_field('content_title');
      $content_image = get_sub_field('content_image');
      $content_description = get_sub_field('content_description');

      $content_advance = get_sub_field('content_advance');
      if ($content_advance && is_array($content_advance)) {
        $content_text = $content_advance['content_text'];
        $content_text_2 = $content_advance['content_text_2'];
        $content_text_3 = $content_advance['content_text_3'];
        $content_text_4 = $content_advance['content_text_4'];
        $content_text_5 = $content_advance['content_text_5'];
      } else {
        // Đặt các biến này thành một giá trị mặc định nếu không có dữ liệu.
        $content_text = '';
        $content_text_2 = '';
        $content_text_3 = '';
        $content_text_4 = '';
        $content_text_5 = '';
      }

      $content_subadvance = get_sub_field('content_subadvance');
      if ($content_subadvance && is_array($content_subadvance)) {
        $subadvance_text = $content_subadvance['content_subtext'];
        $subadvance_text_2 = $content_subadvance['content_subtext_2'];
        $subadvance_text_3 = $content_subadvance['content_subtext_3'];
        $subadvance_text_4 = $content_subadvance['content_subtext_4'];
        $subadvance_text_5 = $content_subadvance['content_subtext_5'];
      } else {
        // Đặt các biến này thành một giá trị mặc định nếu không có dữ liệu.
        $subadvance_text = '';
        $subadvance_text_2 = '';
        $subadvance_text_3 = '';
        $subadvance_text_4 = '';
        $subadvance_text_5 = '';
      }
      if ($row_count % 2 == 1) {
        echo '<div class="content__item">';
        echo '<div class="content__item-col-left">';
        echo '<h2>' . $content_title . '</h2>';
        echo '<div class="content__item-crossbar"></div>';
        echo '<p>' . $content_description . '</p>';
        echo '<div class="content__item-block">';
        echo '<div class="content__block__col-left">';
        echo '<ul>';
        echo '<span>' . $content_text . '</span>';
        if ($content_advance && is_array($content_advance)) {
          $numberOfFields = count($content_advance);
          for ($i = 2; $i <= $numberOfFields; $i++) {
            $content_text_key = "content_text_" . $i;
            // Sử dụng eval để lấy giá trị của biến được tạo động
            if (isset($$content_text_key)) {
              $content_text_value = eval("return \$" . $content_text_key . ";");
              if (!empty($content_text_value)) {
                echo '<li>';
                echo '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                    <g clip-path="url(#clip0_495_1865)">
                      <path
                        d="M11.4713 5.862C11.2113 5.60166 10.7886 5.60166 10.5286 5.862L7.66662 8.72367L6.47129 7.52867C6.21129 7.26833 5.78862 7.26833 5.52862 7.52867C5.26829 7.789 5.26829 8.211 5.52862 8.47134L7.19529 10.138C7.32529 10.2683 7.49596 10.3333 7.66662 10.3333C7.83729 10.3333 8.00796 10.2683 8.13796 10.138L11.4713 6.80467C11.7316 6.54433 11.7316 6.12233 11.4713 5.862Z"
                        fill="#11335F" />
                      <path
                        d="M15.3333 7.33333C14.9653 7.33333 14.6667 7.632 14.6667 8C14.6667 11.676 11.676 14.6667 8 14.6667C4.324 14.6667 1.33333 11.676 1.33333 8C1.33333 4.324 4.324 1.33333 8 1.33333C9.78967 1.33333 11.4697 2.03267 12.731 3.30267C12.99 3.56433 13.4123 3.56567 13.6737 3.306C13.935 3.04667 13.9363 2.62467 13.677 2.36333C12.1637 0.839333 10.1473 0 8 0C3.58867 0 0 3.58867 0 8C0 12.4113 3.58867 16 8 16C12.4113 16 16 12.4113 16 8C16 7.632 15.7013 7.33333 15.3333 7.33333Z"
                        fill="#11335F" />
                    </g>
                    <defs>
                      <clipPath id="clip0_495_1865">
                        <rect width="16" height="16" fill="white" />
                      </clipPath>
                    </defs>';
                echo '</svg>';
                echo '<span>' . $content_text_value . '</span>';
                echo '</li>';
              }
            }
          }
        }
        echo '</ul>';
        echo '</div>';

        echo '<div class="content__block__col-right">';
        echo '<ul>';
        echo '<span>' . $subadvance_text . '</span>';
        if ($content_subadvance && is_array($content_subadvance)) {
          $numberOfSubfields = count($content_subadvance);
          for ($i = 2; $i <= $numberOfSubfields; $i++) {
            $subcontent_text_key = "subadvance_text_" . $i;
            // Sử dụng eval để lấy giá trị của biến được tạo động
            if (isset($$subcontent_text_key)) {
              $subcontent_text_value = eval("return \$" . $subcontent_text_key . ";");
              if (!empty($subcontent_text_value)) {
                echo '<li>';
                echo '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                    <g clip-path="url(#clip0_495_1865)">
                      <path
                        d="M11.4713 5.862C11.2113 5.60166 10.7886 5.60166 10.5286 5.862L7.66662 8.72367L6.47129 7.52867C6.21129 7.26833 5.78862 7.26833 5.52862 7.52867C5.26829 7.789 5.26829 8.211 5.52862 8.47134L7.19529 10.138C7.32529 10.2683 7.49596 10.3333 7.66662 10.3333C7.83729 10.3333 8.00796 10.2683 8.13796 10.138L11.4713 6.80467C11.7316 6.54433 11.7316 6.12233 11.4713 5.862Z"
                        fill="#11335F" />
                      <path
                        d="M15.3333 7.33333C14.9653 7.33333 14.6667 7.632 14.6667 8C14.6667 11.676 11.676 14.6667 8 14.6667C4.324 14.6667 1.33333 11.676 1.33333 8C1.33333 4.324 4.324 1.33333 8 1.33333C9.78967 1.33333 11.4697 2.03267 12.731 3.30267C12.99 3.56433 13.4123 3.56567 13.6737 3.306C13.935 3.04667 13.9363 2.62467 13.677 2.36333C12.1637 0.839333 10.1473 0 8 0C3.58867 0 0 3.58867 0 8C0 12.4113 3.58867 16 8 16C12.4113 16 16 12.4113 16 8C16 7.632 15.7013 7.33333 15.3333 7.33333Z"
                        fill="#11335F" />
                    </g>
                    <defs>
                      <clipPath id="clip0_495_1865">
                        <rect width="16" height="16" fill="white" />
                      </clipPath>
                    </defs>';
                echo '</svg>';
                echo '<span>' . $subcontent_text_value . '</span>';
                echo '</li>';
              }
            }
          }
        }
        echo '</ul>';
        echo '</div>';
        echo '<button class="content__item-btn">Tìm hiểu thêm về dự án </button>';
        echo '</div>';
        echo '</div>';

        echo '<div class="content__item-col-right">';
        echo '<div class="content__item-image">';
        echo '<img src="' . $content_image . '" alt="">';
        echo '</div>';
        echo '</div>';
        echo '</div>';
      } else {
        echo '<div class="content__item-reverse">';
        echo '<div class="content__item-reverse-col-left">';
        echo '<div class="content__item-reverse-image">';
        echo '<img src="' . $content_image . '" alt="">';
        echo '</div>';
        echo '</div>';
        echo '<div class="content__item-reverse-col-right">';
        echo '<h2>' . $content_title . '</h2>';
        echo '<div class="content__item-reverse-crossbar"></div>';
        echo '<p>' . $content_description . '</p>';
        echo '<div class="content__item-reverse-block">';
        echo '<ul>';
        echo '<span>' . $content_text . '</span>';
        if ($content_subadvance && is_array($content_subadvance)) {
          $numberOfSubfields = count($content_subadvance);
          for ($i = 2; $i <= $numberOfSubfields; $i++) {
            $subcontent_text_key = "subadvance_text_" . $i;
            // Sử dụng eval để lấy giá trị của biến được tạo động
            if (isset($$subcontent_text_key)) {
              $subcontent_text_value = eval("return \$" . $subcontent_text_key . ";");
              if (!empty($subcontent_text_value)) {
                echo '<li>';
                echo '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                    <g clip-path="url(#clip0_495_1865)">
                      <path
                        d="M11.4713 5.862C11.2113 5.60166 10.7886 5.60166 10.5286 5.862L7.66662 8.72367L6.47129 7.52867C6.21129 7.26833 5.78862 7.26833 5.52862 7.52867C5.26829 7.789 5.26829 8.211 5.52862 8.47134L7.19529 10.138C7.32529 10.2683 7.49596 10.3333 7.66662 10.3333C7.83729 10.3333 8.00796 10.2683 8.13796 10.138L11.4713 6.80467C11.7316 6.54433 11.7316 6.12233 11.4713 5.862Z"
                        fill="#11335F" />
                      <path
                        d="M15.3333 7.33333C14.9653 7.33333 14.6667 7.632 14.6667 8C14.6667 11.676 11.676 14.6667 8 14.6667C4.324 14.6667 1.33333 11.676 1.33333 8C1.33333 4.324 4.324 1.33333 8 1.33333C9.78967 1.33333 11.4697 2.03267 12.731 3.30267C12.99 3.56433 13.4123 3.56567 13.6737 3.306C13.935 3.04667 13.9363 2.62467 13.677 2.36333C12.1637 0.839333 10.1473 0 8 0C3.58867 0 0 3.58867 0 8C0 12.4113 3.58867 16 8 16C12.4113 16 16 12.4113 16 8C16 7.632 15.7013 7.33333 15.3333 7.33333Z"
                        fill="#11335F" />
                    </g>
                    <defs>
                      <clipPath id="clip0_495_1865">
                        <rect width="16" height="16" fill="white" />
                      </clipPath>
                    </defs>';
                echo '</svg>';
                echo '<span>' . $subcontent_text_value . '</span>';
                echo '</li>';
              }
            }
          }
        }

        if ($content_advance && is_array($content_advance)) {
          $numberOfFields = count($content_advance);
          for ($i = 2; $i <= $numberOfFields; $i++) {
            $content_text_key = "content_text_" . $i;
            // Sử dụng eval để lấy giá trị của biến được tạo động
            if (isset($$content_text_key)) {
              $content_text_value = eval("return \$" . $content_text_key . ";");
              if (!empty($content_text_value)) {
                echo '<li>';
                echo '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                    <g clip-path="url(#clip0_495_1865)">
                      <path
                        d="M11.4713 5.862C11.2113 5.60166 10.7886 5.60166 10.5286 5.862L7.66662 8.72367L6.47129 7.52867C6.21129 7.26833 5.78862 7.26833 5.52862 7.52867C5.26829 7.789 5.26829 8.211 5.52862 8.47134L7.19529 10.138C7.32529 10.2683 7.49596 10.3333 7.66662 10.3333C7.83729 10.3333 8.00796 10.2683 8.13796 10.138L11.4713 6.80467C11.7316 6.54433 11.7316 6.12233 11.4713 5.862Z"
                        fill="#11335F" />
                      <path
                        d="M15.3333 7.33333C14.9653 7.33333 14.6667 7.632 14.6667 8C14.6667 11.676 11.676 14.6667 8 14.6667C4.324 14.6667 1.33333 11.676 1.33333 8C1.33333 4.324 4.324 1.33333 8 1.33333C9.78967 1.33333 11.4697 2.03267 12.731 3.30267C12.99 3.56433 13.4123 3.56567 13.6737 3.306C13.935 3.04667 13.9363 2.62467 13.677 2.36333C12.1637 0.839333 10.1473 0 8 0C3.58867 0 0 3.58867 0 8C0 12.4113 3.58867 16 8 16C12.4113 16 16 12.4113 16 8C16 7.632 15.7013 7.33333 15.3333 7.33333Z"
                        fill="#11335F" />
                    </g>
                    <defs>
                      <clipPath id="clip0_495_1865">
                        <rect width="16" height="16" fill="white" />
                      </clipPath>
                    </defs>';
                echo '</svg>';
                echo '<span>' . $content_text_value . '</span>';
                echo '</li>';
              }
            }
          }
        }
        echo '</ul>';
        echo '<button class="content__item-btn">Tìm hiểu thêm về dự án </button>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
      }
    endwhile;
  else:
  endif;
  ?>
</div>
<div class="image">
  <?php $image = get_field('image'); ?>
  <img src="<?php echo $image ?>" alt="Working">
</div>

<div class="slider">
  <p class="left"><i class="fa-solid fa-arrow-left"></i></p>
  <p class="right"><i class="fa-solid fa-arrow-right"></i></p>
  <div class="slider__block">
    <?php
    if (have_rows('slider')) {
      while (have_rows('slider')) {
        the_row();
        // Retrieve the ACF fields within the loop
        $slider_title = get_sub_field('slider_title');
        $slider_description = get_sub_field('slider_description');
        $slider_text = get_sub_field('slider_text');

        // Output each slide
        echo '<div>';
        echo '<h2>' . $slider_title . '</h2>';
        echo '<div class="slider__crossbar"></div>';
        echo '<p>' . $slider_description . '</p>';
        echo '<p>' . $slider_text . '</p>';
        echo '</div>';
      } // End while loop
    } // End if condition
    ?>
  </div>
</div>



<div class="box">
  <?php
  $args = array(
    'post_type' => 'post',
    // Loại bài viết là bài viết thường
    'posts_per_page' => 3,
    // Số lượng bài viết muốn hiển thị
    'orderby' => 'date',
    // Sắp xếp theo ngày đăng mới nhất
    'order' => 'DESC' // Sắp xếp giảm dần (tức là mới nhất lên trên)
  );

  $query = new WP_Query($args);
  ?>
  <div class="box__block">
    <h2>Bài viết mới nhất</h2>
    <div class="box__block-crossbar"></div>
  </div>
  <div class="box__container">
    <?php
    if ($query->have_posts()):
      while ($query->have_posts()):
        $query->the_post();
        $thumbnail = get_the_post_thumbnail_url(get_the_ID(), 'thumbnail');
        $date = get_the_date('l, d/m/Y');

        echo '<div class="card">';
        echo '<img src="' . esc_url($thumbnail) . '" alt="Thumbnail">';
        echo '<span>' . esc_html($date) . '</span>';
        echo '<p>' . esc_html(get_the_title()) . '</p>';
        echo '<a href="' . esc_url(get_permalink()) . '">Xem chi tiết</a>';
        echo '</div>';
      endwhile;
      wp_reset_postdata(); // Đặt lại dữ liệu bài viết
    else:
      echo 'Không có bài viết mới nào.';
    endif;
    ?>
  </div>
  <button class="btn-red">Tìm hiểu thêm về cuộc sống sinh viên</button>
</div>


<div class="banner__ads">
  <?php
  $bannerad = get_field('bannerad');
  if ($bannerad) {
    // Lấy giá trị của các trường con
    $banner_image = $bannerad['banner_image'];
    $banner_text = $bannerad['banner_text'];
    $banner_description = $bannerad['banner_description'];
  }
  ?>
  <div class="banner__ads-content">
    <p>
      <?php echo $banner_description; ?>
    </p>
    <span>
      <?php echo $banner_text; ?>
    </span>
  </div>
  <div class="banner__ads-image">
    <img src="<?php echo $banner_image; ?>" alt="">
  </div>
  <!-- </div> -->
</div>
<div class="banner__register">
  <div class="banner__register-text">
    <h2>Tìm hiểu thêm về VDV qua
      Sách trắng của dự án</h2>
    <div class="banner__register-crossbar"></div>
    <span>Đăng ký nhận Sách trắng và thông tin mới nhất</span>
  </div>
  <div class="banner__register-submit">
    <?php echo apply_shortcodes('[contact-form-7 id="4840625" title="Contact form 1"]'); ?>
  </div>
</div>

</div>

<?php
get_footer();
?>

