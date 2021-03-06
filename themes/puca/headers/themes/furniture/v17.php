
<header id="tbay-header" class="site-header header-v17 hidden-sm hidden-xs <?php echo (puca_tbay_get_config('keep_header', false) ? 'main-sticky-header' : ''); ?>">
	<div class="visible-xlg">
	    <div class="header-main clearfix">
	    	<div class="header-top-left clearfix">
	    		
				<?php puca_tbay_get_page_templates_parts('productsearchform','min'); ?>

				<?php if ( !(defined('PUCA_WOOCOMMERCE_CATALOG_MODE_ACTIVED') && PUCA_WOOCOMMERCE_CATALOG_MODE_ACTIVED) && defined('PUCA_WOOCOMMERCE_ACTIVED') && PUCA_WOOCOMMERCE_ACTIVED ): ?>
					<!-- Cart -->
					<div class="top-cart">
						<?php puca_tbay_get_woocommerce_mini_cart(); ?>
					</div>
				<?php endif; ?>

				<?php puca_tbay_get_page_templates_parts('menu-account'); ?>
				<?php if(is_active_sidebar('top-copyright')) : ?>
					<div class="top-copyright clearfix">
						<?php dynamic_sidebar('top-copyright'); ?>
						<!-- End Bottom Header Widget -->
	           		 </div>
	           	<?php endif;?>	 
			</div>
			<div class="header-top-right clearfix">
		        <div class="container">
		            <div class="header-inner">
		                <div class="row">
							<!-- //LOGO -->
		                    <div class="header-left">
		                    	<div class="logo-in-theme">
			                        <?php 
			                        	puca_tbay_get_page_templates_parts('logo'); 
			                        ?> 
			                    </div>
			                    <div class="tbay-mainmenu">

							      	<div class="visible-xlg tbay-offcanvas-main verticle-menu active-desktop">
		        						<?php puca_tbay_get_page_templates_parts('nav-vertical', '3'); ?>
								    </div>
								</div>
		                    </div>
								
							<div class="header-right clearfix">

								<?php if( class_exists( 'YITH_WCWL' ) ) { ?>
								<a class="wishlist" href="<?php $wishlist_url = YITH_WCWL()->get_wishlist_url(); echo esc_url($wishlist_url); ?>"><?php esc_html_e('Wishlist ','puca'); ?><span class="count_wishlist">(<?php $wishlist_count = YITH_WCWL()->count_products(); echo esc_html($wishlist_count); ?>)</span></a>
								<?php } ?>
								<?php
									if( class_exists( 'WOOCS' ) ) {
										?>
										<div class="tbay-currency">
											<?php esc_html_e('Currency:  ','puca'); ?><?php echo do_shortcode( '[woocs]' ); ?>
										</div>
										<?php
									}
							    ?>
								<?php if(is_active_sidebar('top-social')) : ?>
									<div class="top-social clearfix">
										<?php dynamic_sidebar('top-social'); ?>
										<!-- End Bottom Header Widget -->
						            </div>
								<?php endif;?>
				            </div>

							
		                </div>
		            </div>
		        </div>
		    </div>    
	    </div>
	</div>
    <div class="hidden-xlg">
		<div class="header-main clearfix">
	        <div class="container">
	            <div class="row">
					<!-- //LOGO -->
	                <div class="header-logo col-md-3">

	                    <?php 
	                    	puca_tbay_get_page_templates_parts('logo'); 
	                    ?> 
	                </div>

	                <div class="header-searh col-md-6">

						<div class="search-full">
	                    	<?php puca_tbay_get_page_templates_parts('productsearchform','full'); ?>
						</div>
						
					</div>
					
					<div class="header-right col-md-3">
						<?php puca_tbay_get_page_templates_parts('menu-account'); ?>

						<?php if ( !(defined('PUCA_WOOCOMMERCE_CATALOG_MODE_ACTIVED') && PUCA_WOOCOMMERCE_CATALOG_MODE_ACTIVED) && defined('PUCA_WOOCOMMERCE_ACTIVED') && PUCA_WOOCOMMERCE_ACTIVED ): ?>
							<!-- Cart -->
							<div class="top-cart hidden-xs">
								<?php puca_tbay_get_woocommerce_mini_cart(); ?>
							</div>
						<?php endif; ?>
					</div>
					
	            </div>
	        </div>
	    </div>
	    <div class="header-mainmenu clearfix">
	        <div class="container">
		        <div class="row">
					
				    <div class="tbay-mainmenu col-md-12">
						
						<?php puca_tbay_get_page_templates_parts('nav'); ?>

				    </div>
		        </div>
	        </div>
	    </div>
	</div>
</header>