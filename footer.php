<div class="container">

	<footer>
		<div class="separator"></div>
		<!-- <p>2016 © Валенки ручной работы | Чувашская республика, г.Новочебоксарск, ул.Восточная д.24</p> -->
		<p>2016 © <?php echo get_option('blogname'); ?> |  <?php echo get_option('option_address'); ?> </p>
	</footer>
</div>

 <?php wp_footer(); ?>

<!--<script src="<?php echo get_template_directory_uri();?>/libs/jquery/jquery1.11.0.min.js"></script>--> 
<!--<script type='text/javascript' src="<?php echo get_template_directory_uri();?>/libs/jquery/jquery_1.8.3.min.js"></script>-->
<!-- <script src="libs/owl-carousel/owl.carousel.js"></script> -->

<!-- <script type="text/javascript" src="libs/snow/js/jquery-latest.min.js"></script> -->
<script src='<?php echo get_template_directory_uri();?>/libs/snow/js/snowfall.jquery.js'></script>
<script src='<?php echo get_template_directory_uri();?>/libs/jScrollPane/jquery.mousewheel.js'></script>
<script src='<?php echo get_template_directory_uri();?>/libs/jScrollPane/jquery.jscrollpane.min.js'></script>
<script src='<?php echo get_template_directory_uri();?>/libs/magnific-popup/jquery.magnific-popup.min.js'></script>
<script src="<?php echo get_template_directory_uri();?>/js/common.js"></script>
<script type='text/javascript'> 
	
$(document).ready(function(){		
	if( $( window ).width() > 767 ) {
    	 $(document).snowfall({deviceorientation : true, round : true, minSize: 1, maxSize:8,  flakeCount : 250});
	}
});

 </script>
</body>
</html>