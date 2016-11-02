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
 
-add_action( 'widgets_init', 'true_register_wp_sidebars' );

/* **********for adding a new field to the options-general.php page
добовление новой опции в существующую страницу опций (пример options-general.php)********* */

add_action( 'admin_init', 'alex21_register_settings' );

/*  Register settings */
function alex21_register_settings() 
{
    register_setting( 
        'general', 
        'option_address',
        'esc_html' // <--- Customize this if there are multiple fields
    );
    register_setting( 
        'general', 
        'option_phone',
        'esc_html' // <--- Customize this if there are multiple fields
    );
    // add_settings_section( 
    //     'site-guide', 
    //     'Name section', 
    //     '__return_false', 
    //     'general' 
    // );

    add_settings_field( 
        'phone_id', 
        'Телефон:', 
        'alex21_add_html_for_option_phone', 
        'general'
        // 'site-guide' 
    );

    add_settings_field( 
        'address_id', 
        'Адрес:', 
        'alex21_add_html_for_option', 
        'general'
        // 'site-guide' 
    );

}    

/* Print settings field content */
function alex21_add_html_for_option_phone() 
{
    $value = html_entity_decode (get_option( 'option_phone' ));
    echo '<input type="text" class="regular-text" id="phone_id" name="option_phone" value="' . esc_attr( $value ) . '"/>';
}

function alex21_add_html_for_option() 
{
    $value = html_entity_decode (get_option( 'option_address' ));
    echo '<textarea class="large-text code" id="address_id" name="option_address">' . esc_attr( $value ) . '</textarea>';
}


/* *************end  for adding a new field to the options-general.php page******* */


/* **************** custom post type - movies ************************ */

add_action('init', 'alex21_custom_type_slider');
function alex21_custom_type_slider()
{
  $labels = array(
  'name' => 'Слайдер', // Основное название типа записи
  'singular_name' => 'Слайд', // отдельное название записи типа Book
  'add_new' => 'Добавить новый',
  'add_new_item' => 'Добавить новый слайд',
  'edit_item' => 'Редактировать слайд',
  'new_item' => 'Новый слайд',
  'view_item' => 'Посмотреть слайд',
  'search_items' => 'Найти слайд',
  'not_found' =>  'Не найден',
  'not_found_in_trash' => 'Не найден в корзине',
  'parent_item_colon' => '',
  'menu_name' => 'Слайдер'

  );
  $args = array(
  'labels' => $labels,
  'public' => true,
  'publicly_queryable' => true,
  'show_ui' => true,
  'show_in_menu' => true,
  'query_var' => true,
  'rewrite' => true,
  'capability_type' => 'post',
  'has_archive' => true,
  'hierarchical' => false,
  'menu_position' => null,
  'supports' => array('title','thumbnail')
  );
  register_post_type('homeslider',$args);
}

/* **************** custom post type - movies ************************ */

/* **************** замена текста по-умолчанию "выбрать опцию************************ */

add_filter('woocommerce_dropdown_variation_attribute_options_args','my_variation_attribute_options_args',10,1);
function my_variation_attribute_options_args($args){
 $args['show_option_none'] = 'Выбрать';
 return $args;
}


// add_filter( 'woocommerce_product_add_to_cart_text' , 'custom_woocommerce_product_add_to_cart_text' );

//   function custom_woocommerce_product_add_to_cart_text() {
//       global $product;    
//       $product_type = $product->product_type;  
//       switch ( $product_type ) {
//       case 'variable':
//                   return __( 'ываываыва', 'woocommerce' );
//               break;
//       }
// } 



// add_filter( 'woocommerce_get_price_html', 'wpa83367_price_html', 100, 2 );
// function wpa83367_price_html( $price, $product ){
//     // return 'Was:' . str_replace( '<ins>', ' Now:<ins>', $price );
//     return str_replace( '<ins>', '<ins> <strike>P</strike> &#8381; ', $price );
// }


// function alex_minicart(){
//   if(WC()->cart->get_cart_item_quantities()){
//      $count = 0;
//      foreach ( WC()->cart->get_cart_item_quantities() as $item){
//         $count = $count + $item;
//     }
//   }else  $count = 1;
//   echo $count;
//   print_r( WC()->cart->get_cart() );
//     die();
// }

// add_action('wp_ajax_alex_minicart', 'alex_minicart');
// add_action('wp_ajax_nopriv_alex_minicart', 'alex_minicart');