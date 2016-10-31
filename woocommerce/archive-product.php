<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>

<?php get_header( 'shop' ); ?>

<div class="container">

	<?php  wc_get_template_part( 'left', 'sidebar' ); ?>

	<div class="col-md-10 alex-content">
<?php
	$url = $_SERVER['REQUEST_URI'];
	if( preg_match("/product-category/i", $url))  $cat = true;
 ?>
	
	<?php if( !$cat ):?>
	<div id="owl-home-slider" class="owl-carousel owl-theme">
	 
<!-- 	  <div class="item"><img  class="img-responsive" src="<?php echo get_template_directory_uri();?>/img/slide_1.jpg" alt=""></div>
	  <div class="item"><img  class="img-responsive" src="<?php echo get_template_directory_uri();?>/img/slide_2.jpg" alt=""></div>
	  <div class="item"><img class="img-responsive"  src="<?php echo get_template_directory_uri();?>/img/slide_3.jpg" alt=""></div> -->
	    <?php
		$params = array('post_type' => 'homeslider','order'=> 'ASC');
		$wc_query = new WP_Query($params);
		?>
		<?php if ($wc_query->have_posts()) : ?>
		<?php while ($wc_query->have_posts()) : $wc_query->the_post(); ?>
		    <?php the_post_thumbnail('full', array('class'=>'img-responsive')); ?>
		<?php endwhile; ?>
		<?php wp_reset_postdata(); ?>
		<?php else:  ?>
		<p>Слайды-изображения не добалвены</p>
		<?php endif; ?>
	 
	</div>
	<?php endif;?>

	<?php
		/**
		 * woocommerce_before_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 */
		do_action( 'woocommerce_before_main_content' );
	?>

<!-- 		<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>

			<h1 class="page-title"><?php woocommerce_page_title(); ?></h1>

		<?php endif; ?>
 -->
		<?php
			/**
			 * woocommerce_archive_description hook.
			 *
			 * @hooked woocommerce_taxonomy_archive_description - 10
			 * @hooked woocommerce_product_archive_description - 10
			 */
			do_action( 'woocommerce_archive_description' );
		?>

		<?php if ( have_posts() ) : ?>

			<?php
				/**
				 * woocommerce_before_shop_loop hook.
				 *
				 * @hooked woocommerce_result_count - 20
				 * @hooked woocommerce_catalog_ordering - 30
				 */
				do_action( 'woocommerce_before_shop_loop' );
			?>

			<?php woocommerce_product_loop_start(); ?>

				<?php woocommerce_product_subcategories(); ?>


				<?php $i = 1; while ( have_posts() ) : the_post(); ?>
					
					<?php  //wc_get_template_part( 'content', 'product' ); ?>
					<?php get_template_part_with_data("content-product", array('i'=> $i )); ?>

				<?php $i++; endwhile; // end of the loop. ?>

			<?php woocommerce_product_loop_end(); ?>
			<div class="clearfix"></div>

			<?php
				/**
				 * woocommerce_after_shop_loop hook.
				 *
				 * @hooked woocommerce_pagination - 10
				 */
				do_action( 'woocommerce_after_shop_loop' );
			?>

		<?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>

			<?php wc_get_template( 'loop/no-products-found.php' ); ?>

		<?php endif; ?>

	<?php
		/**
		 * woocommerce_after_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		do_action( 'woocommerce_after_main_content' );



		$params = array(  'pagename' => 'o-nas');
		$page_o_nas = new WP_Query($params);
		?>
	<?php if( !$cat ):?>
		<?php if ($page_o_nas->have_posts()) : ?>
		<?php while ($page_o_nas->have_posts()) : $page_o_nas->the_post(); ?>
			<h2><?php the_title(); ?></h2>
			<?php the_content(); ?>
		<?php endwhile; ?>
			<?php wp_reset_postdata(); ?>
		<?php else:  ?>
			<p> no content</p>
		<?php endif; ?>

		<!--  обзор комментариев -->
<!-- 		
		<div id="vk_comments_browse"></div>
		<script type="text/javascript">
			window.onload = function () {
			VK.init({apiId: 5678013, onlyWidgets: true});
			VK.Widgets.CommentsBrowse('vk_comments_browse', {width: 300, limit: 5, mini: 0});
			}
		</script>
 -->
 		
			<!-- Добавление комментариев -->
			<script type="text/javascript">
			  VK.init({apiId: 5678013, onlyWidgets: true});
			</script>

			<!-- Put this div tag to the place, where the Comments block will be -->

			<div id="vk_comments"></div>
			<script type="text/javascript">
			VK.Widgets.Comments("vk_comments", {limit: 10, width: "275", attach: false});
			</script>
		<?php endif;?>

	</div><!-- end .alex-content -->

</div><!-- end .container -->


<?php get_footer( 'shop' ); ?>

