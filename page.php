<?php get_header();?>

<div class="page-home">
	<div class="container">
		<?php  wc_get_template_part( 'left', 'sidebar' ); ?>

		<div class="col-md-10 alex-content">
			 <?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : the_post(); ?>

			    <h2><?php the_title();?></h2>
			    <?php the_content();?>

			<?php endwhile; // end of the loop. ?>
			<?php  else:?>
			<h3 class="error">not found</h3>
			<?php endif; ?>
		</div><!-- end .alex-content -->
	</div><!-- end .container -->
</div>	

<?php get_footer();?>