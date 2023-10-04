<?php

function themebaihtml_theme_support()
{
  // them dynamic title tag support
  add_theme_support('title-tag');
  add_theme_support('custom-logo');
  add_theme_support('post-thumbnails');
}

add_action('after_setup_theme', 'themebaihtml_theme_support');

function themebaihtml_menus()
{
  $locations = array(
    'primary' => "Desktop Primary Right",
    'footer' => "Footer Menu Items"
  );
  register_nav_menus($locations);
}
add_action('init', 'themebaihtml_menus');

// phan nay duoc gan vao front-page.php de bt css o dau boostrap fontawesome o dau
// function themebaihtml_register_styles()
// {
//   wp_register_style('themebaihtml-bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css', array(), '4.4.1', 'all');
//   wp_register_style('themebaihtml-fontawesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css', array(), '6.4.2', 'all');
//   wp_register_style('themebaihtml-slick', get_template_directory_uri() . '/assets/slick-1.8.1/slick/slick.css', array(), 'all');
//   wp_register_style('themebaihtml-slick-theme', get_template_directory_uri() . '/assets/slick-1.8.1/slick/slick-theme.css', array(), 'all');

//   // Đăng ký tệp style.css và làm nó phụ thuộc vào các stylesheet khác
//   wp_register_style('themebaihtml-style', get_template_directory_uri() . '/style.css', array(), '1.5', 'all');

//   wp_enqueue_style('themebaihtml-bootstrap');
//   wp_enqueue_style('themebaihtml-fontawesome');
//   wp_enqueue_style('themebaihtml-slick');
//   wp_enqueue_style('themebaihtml-slick-theme');
//   wp_enqueue_style('themebaihtml-style');

// }

// add_action('init', 'themebaihtml_register_styles');

function themebaihtml_register_styles()
{
  $version = wp_get_theme()->get('Version');

  wp_enqueue_style('themebaihtml-bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css', array(), '4.4.1', 'all');
  wp_enqueue_style('themebaihtml-fontawesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css', array(), '6.4.2', 'all');

  // Đăng ký slick-theme.css
  wp_enqueue_style('slick-theme', get_template_directory_uri() . '/assets/slick-1.8.1/slick/slick-theme.css', array(), '2.0', 'all');

  // Đăng ký slick.css
  wp_enqueue_style('slick', get_template_directory_uri() . '/assets/slick-1.8.1/slick/slick.css', array(), '2.0', 'all');

  // Đăng ký tệp style.css và làm nó phụ thuộc vào các stylesheet khác
  wp_enqueue_style('themebaihtml-style', get_template_directory_uri() . '/style.css', array(
    'themebaihtml-bootstrap',
    'themebaihtml-fontawesome',
    'slick-theme',
    'slick',
  ), $version, 'all');
}

add_action('wp_enqueue_scripts', 'themebaihtml_register_styles');


function themebaihtml_register_scripts()
{
  wp_enqueue_script('my-jquery-3.4.1-slim', 'https://code.jquery.com/jquery-3.4.1.min.js', true);
  wp_enqueue_script('slick-js', get_template_directory_uri() . '/assets/slick-1.8.1/slick/slick.js', true);
  wp_enqueue_script('my-main-js', get_template_directory_uri() . '/assets/js/main.js', true);
  wp_enqueue_script('my-popper-js', 'https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js', true);
  wp_enqueue_script('my-bootstrap-js', 'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js', true);

}

add_action('wp_enqueue_scripts', 'themebaihtml_register_scripts');

// function themebaihtml_register_scripts()
// {
//   // Đầu tiên, tải jQuery chuẩn trước
//   wp_enqueue_script('my-jquery', 'https://code.jquery.com/jquery-3.4.1.min.js', array(), '3.4.1', true);

//   // Tiếp theo, tải Popper.js
//   wp_enqueue_script('my-popper-js', 'https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js', array('my-jquery'), '1.16.0', true);

//   // Sau đó, tải Bootstrap JavaScript
//   wp_enqueue_script('my-bootstrap-js', 'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js', array('my-jquery', 'my-popper-js'), '4.4.1', true);

//   // Cuối cùng, tải Slick.js và mã JavaScript chính của bạn
//   wp_enqueue_script('slick-js', get_template_directory_uri() . '/assets/slick-1.8.1/slick/slick.js', array('my-jquery'), '1.8.1', true);
//   wp_enqueue_script('my-main-js', get_template_directory_uri() . '/assets/js/main.js', array('my-jquery', 'slick-js'), '1.0.0', true);
// }

// add_action('wp_enqueue_scripts', 'themebaihtml_register_scripts');


function themebaihtml_widget_areas()
{
  register_sidebar(
    array(
      'before_title' => '',
      'after_title' => '',
      'before_widget' => '',
      'after_widget' => '',
    ),
    array(
      'name' => 'Sidebar Area',
      'id' => 'sidebar-1',
      'description' => 'Sidebar Widget Area',
    )
  );
}

add_action('widgets_init', 'themebaihtml_widget_areas');


if (function_exists('acf_add_options_page')) {

  acf_add_options_page(
    array(
      'page_title' => 'Theme General Settings',
      'menu_title' => 'Theme Settings',
      'menu_slug' => 'theme-general-settings',
      'capability' => 'edit_posts',
      'redirect' => false
    )
  );

  acf_add_options_sub_page(
    array(
      'page_title' => 'Themebaitap Footer Settings',
      'menu_title' => 'Footer',
      'parent_slug' => 'theme-general-settings',
      'redirect' => false
    )
  );

}
function create_gallery_post_type()
{
  $labels = array(
    'name' => 'Galleries',
    'singular_name' => 'Gallery',
    'menu_name' => 'Galleries',
    'add_new' => 'Add New',
    'add_new_item' => 'Add New Gallery',
    'edit_item' => 'Edit Gallery',
    'new_item' => 'New Gallery',
    'view_item' => 'View Gallery',
    'search_items' => 'Search Galleries',
    'not_found' => 'No galleries found',
    'not_found_in_trash' => 'No galleries found in Trash',
    'parent_item_colon' => 'Parent Gallery:',
    'all_items' => 'All Galleries',
    'archives' => 'Gallery Archives',
    'insert_into_item' => 'Insert into gallery',
    'uploaded_to_this_item' => 'Uploaded to this gallery',
    'featured_image' => 'Featured Image',
    'set_featured_image' => 'Set featured image',
    'remove_featured_image' => 'Remove featured image',
    'use_featured_image' => 'Use as featured image',
    'menu_icon' => 'dashicons-format-gallery',
    // Thay đổi biểu tượng menu theo ý muốn
    'public' => true,
    'has_archive' => true,
    'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields', 'comments'),
    'rewrite' => array('slug' => 'gallery'),
    // Định dạng URL cho custom post type
  );

  $args = array(
    'labels' => $labels,
    'public' => true,
    'hierarchical' => false,
    'menu_position' => 5,
    'menu_icon' => 'dashicons-format-gallery',
    // Thay đổi biểu tượng menu theo ý muốn
    'capability_type' => 'post',
    'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields', 'comments'),
    'has_archive' => true,
    'rewrite' => array('slug' => 'gallery'),
    // Định dạng URL cho custom post type
  );

  register_post_type('gallery', $args);
}

add_action('init', 'create_gallery_post_type');

function create_gallery_taxonomy()
{
  $labels = array(
    'name' => 'Gallery Categories',
    'singular_name' => 'Gallery Category',
    'menu_name' => 'Gallery Categories',
    'all_items' => 'All Categories',
    'edit_item' => 'Edit Category',
    'view_item' => 'View Category',
    'update_item' => 'Update Category',
    'add_new_item' => 'Add New Category',
    'new_item_name' => 'New Category Name',
    'search_items' => 'Search Categories',
  );

  $args = array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => array('slug' => 'gallery-category'),
    // Định dạng URL cho taxonomy
  );

  register_taxonomy('gallery_category', 'CustomPostType', $args);
}

add_action('init', 'create_gallery_taxonomy');

function register_taxonomy_for_gallery()
{
  register_taxonomy_for_object_type('gallery_category', 'gallery');
}
add_action('init', 'register_taxonomy_for_gallery');
?>

