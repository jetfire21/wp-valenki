	<div class="col-md-2 left-sidebar">

		<?php
		$args = array(
		  'theme_location'  => 'left_sidebar',
		  'menu'            => 'left-vert-menu', 
		  'container'       => '', 
		  'container_class' => '', 
		  'container_id'    => '',
		  'menu_class'      => '', 
		  'menu_id'         => '',
		  'echo'            => true,
		  'fallback_cb'     => 'wp_page_menu',
		  'before'          => '',
		  'after'           => '',
		  'link_before'     => '',
		  'link_after'      => '',
		  'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
		  'depth'           => 0
		);

		 wp_nav_menu( $args );

	?>
	<div class="hor-line"></div>
	<?php
		/**
		 * woocommerce_sidebar hook.
		 *
		 * @hooked woocommerce_get_sidebar - 10
		 */
		do_action( 'woocommerce_sidebar' );
	?>

	</div><!-- end .left-sidebar -->