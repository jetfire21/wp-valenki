			<?php //if ( ! WC()->cart->is_empty() ) : ?>
			<?php if(WC()->cart->get_cart_item_quantities()):?>
			<div class="h-cart">
			<i class="demo-icon icon-basket">&#xe801;</i> 
				<?php
					 $count = 0; foreach ( WC()->cart->get_cart_item_quantities() as $item){
						$count = $count + $item;
					}
				?>			
				<!-- <i class="arrow demo-icon icon-up-open-mini"></i> -->
				<!-- <i class="arrow demo-icon icon-up-open-mini">&#xe803;</i> -->
				<!-- <i class="arrow demo-icon icon-down-open-mini">&#xe802;</i> -->
				<i class="arrow demo-icon icon-down-open-mini"></i>
			<?php echo $count;?> товара (ов)
			</div>
			<?php endif;?>
			<?php //endif;?>


e:\OpenServer\domains\big-wp-test\wp-content\themes\valenki\