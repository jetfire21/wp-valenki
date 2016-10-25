<?php 


/* ******hide admin-bar******** */
add_filter('show_admin_bar', '__return_false');



add_theme_support('post-thumbnails'); // поддержка миниатюр

// add_theme_support( 'menus' );

register_nav_menus( array(
  'left_sidebar' => 'left-vert-menu',
  'sys_gal' => 'gallery_menu_cat'
) );



//создание дополнительно пропоционального размера миниатюры
// add_image_size( 'cat-movies', 404 ); // by width crop
// add_image_size( 'cat-movies', 404,562, true); 
// add_image_size( 'cat-movies', 404,562, true); 
// add_image_size( 'cat-movies', 375,500, true); 
// add_image_size( 'prod_cat', 332,9999); 


// cleaning trash
remove_action( 'wp_head', 'rel_canonical');
remove_action('wp_head', 'wp_generator');
remove_action( 'wp_head', 'feed_links_extra', 3 ); 
remove_action( 'wp_head', 'feed_links', 2 );
remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'index_rel_link' );
remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 ); 
remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
remove_action( 'wp_head', 'adjacent_posts_rel_link', 10, 0 );
remove_action('wp_head', 'wp_shortlink_wp_head');

add_filter('xmlrpc_enabled', '__return_false');


// Disable Embeds WordPres scripts

function disable_embeds_init() {

    // Remove the REST API endpoint.
    remove_action('rest_api_init', 'wp_oembed_register_route');

    // Turn off oEmbed auto discovery.
    // Don't filter oEmbed results.
    remove_filter('oembed_dataparse', 'wp_filter_oembed_result', 10);

    // Remove oEmbed discovery links.
    remove_action('wp_head', 'wp_oembed_add_discovery_links');

    // Remove oEmbed-specific JavaScript from the front-end and back-end.
    remove_action('wp_head', 'wp_oembed_add_host_js');
}

add_action('init', 'disable_embeds_init', 9999);

// Disable Embeds WordPres scripts


remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' ); 


add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}




add_filter( 'woocommerce_enqueue_styles', '__return_false' );

function wp_enqueue_woocommerce_style(){
  wp_register_style( 'mytheme-woocommerce', get_template_directory_uri() . '/css/main.css' );
    wp_enqueue_style('owl-car', get_template_directory_uri()."/libs/owl-carousel/owl.carousel.css");
    wp_enqueue_style('owl-theme', get_template_directory_uri()."/libs/owl-carousel/owl.theme.css");


  wp_deregister_script( 'jquery' );
   wp_enqueue_script('jquery', get_template_directory_uri()."/libs/jquery/jquery1.11.0.min.js",'','',true);
   wp_enqueue_script('owl-carousel', get_template_directory_uri()."/libs/owl-carousel/owl.carousel.min.js",'','',true);
   wp_enqueue_script('common', get_template_directory_uri()."/js/common.js",'','',true);

  
  if ( class_exists( 'woocommerce' ) ) {
    wp_enqueue_style( 'mytheme-woocommerce' );
  }
}
add_action( 'wp_enqueue_scripts', 'wp_enqueue_woocommerce_style' );



if (function_exists('register_sidebar')){
    register_sidebar(); //регистируем боковую колонку "Боковая колонка"
}

add_filter('widget_title','my_widget_title'); 
function my_widget_title($t)
{
    return null;
}


/* *********** передача параметров в шаблон woocommerce ************ */

function get_template_part_with_data($slug, array $data = array()){
    $slug .= '.php';
    $slug =  WC()->template_path().$slug;
    extract($data);

     require locate_template($slug);
}


add_filter( 'woocommerce_checkout_fields', 'custom_edit_checkout_fields' );

function custom_edit_checkout_fields( $fields ) {

   unset($fields['billing']['billing_company']);

   return $fields;
}


function true_register_wp_sidebars() {
 
  register_sidebar(
    array(
      'id' => 'header_right', // уникальный id
      'name' => 'Правая область в шапке сайта', // название сайдбара
      'description' => 'Перетащите сюда виджеты, чтобы добавить их в сайдбар.', // описание
      'before_widget' => '<div id="%1$s" class="side widget %2$s">', // по умолчанию виджеты выводятся <li>-списком
      'after_widget' => '</div>',
      'before_title' => '<h3 class="widget-title">', // по умолчанию заголовки виджетов в <h2>
      'after_title' => '</h3>'
    )
  );
 

}
 
add_action( 'widgets_init', 'true_register_wp_sidebars' );

