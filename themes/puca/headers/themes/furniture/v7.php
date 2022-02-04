
<header id="tbay-header" class="site-header header-v7 hidden-sm hidden-xs <?php echo (puca_tbay_get_config('keep_header', false) ? 'main-sticky-header' : ''); ?>">
	<div class="header-top-logo clearfix">
		<div class="container">
			<div class="row">
				<!-- //LOGO -->
                <?php 
                	puca_tbay_get_page_templates_parts('logo'); 
                ?>
			</div>
		</div>		
	</div>	

    <div class="header-main clearfix">
        <div class="container">
            <div class="row">
				<div class="header-left col-md-1">
					<?php
						if( class_exists( 'WOOCS' ) ) {
							wp_enqueue_style('sumoselect');
							wp_enqueue_script('jquery-sumoselect');	
							?>
							<div class="tbay-currency">
							<?php
								echo do_shortcode( '[woocs]' );
							?>
							</div>
							<?php
						}
				    ?>
				</div>	

                <div class="tbay-mainmenu header-right col-md-11">
                	<div class="tbay-mainmenu">
						<?php puca_tbay_get_page_templates_parts('nav'); ?>
					</div>
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

    <div class="header-bottom clearfix">
        <div class="container">
	        <div class="row">
				<div class="col-md-3">

				</div>	
			    <div class="header-searh col-md-6">

					<div class="search-full">
                    	<?php puca_tbay_get_page_templates_parts('productsearchform','full'); ?>
					</div>

			    </div>
			    <div class="col-md-3">

			    </div>	
	        </div>
        </div>
    </div>
</header>