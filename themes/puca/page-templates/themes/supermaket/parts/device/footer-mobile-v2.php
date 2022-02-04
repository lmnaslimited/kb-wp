<?php   global $woocommerce; ?>

<?php if ( !(defined('PUCA_WOOCOMMERCE_CATALOG_MODE_ACTIVED') && PUCA_WOOCOMMERCE_CATALOG_MODE_ACTIVED) && defined('PUCA_WOOCOMMERCE_ACTIVED') && PUCA_WOOCOMMERCE_ACTIVED ): ?>

    <?php if( is_product() || is_cart() || is_checkout() ) : ?>
    <?php else: ?>
    <div class="footer-device-mobile layout-v2 visible-xxs clearfix">
        <div class="device-home <?php echo is_front_page() ? 'active' : '' ?> ">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" >
                <i class="icon-home icons"></i>
                <span class="device-label"><?php esc_html_e('Home', 'puca'); ?></span>
            </a>   
        </div>

        <div class="search-device-mobile visible-xxs">
            <span class="show-search">
                <i class="icon-magnifier icons"></i>
                <span class="device-label"><?php esc_html_e('Search', 'puca'); ?></span>
            </span>
            <?php puca_tbay_get_page_templates_parts('productsearchform','mobile'); ?>
        </div>

        <?php if( class_exists( 'YITH_WCWL' ) ) { ?>

        <?php 
            $wishlist_url 	= YITH_WCWL()->get_wishlist_url();
            $wishlist_count = YITH_WCWL()->count_products();    
        ?>
        <div class="device-wishlist">
            <a class="text-skin wishlist-icon" href="<?php echo esc_url($wishlist_url); ?>">
    			<span class="icon">
                    <i class="icon-heart icons"></i>
                    <span class="count count_wishlist"><?php echo trim($wishlist_count); ?></span><span class="device-label"><?php esc_html_e('Wishlist', 'puca'); ?></span>
    			</span>
            </a>
        </div>
        <?php } ?>

        <?php if ( !(defined('PUCA_WOOCOMMERCE_CATALOG_MODE_ACTIVED') && PUCA_WOOCOMMERCE_CATALOG_MODE_ACTIVED) && defined('PUCA_WOOCOMMERCE_ACTIVED') && PUCA_WOOCOMMERCE_ACTIVED ): ?>
        <div class="device-account <?php echo is_account_page() ? 'active' : '' ?>">
            <a href="<?php echo esc_url( get_permalink( get_option('woocommerce_myaccount_page_id') ) ); ?>" title="<?php esc_html_e('Login','puca'); ?>">
                <i class="icon-user icons"></i>
                <span class="device-label"><?php esc_html_e('Account', 'puca'); ?></span>
            </a>
        </div>
        <?php endif; ?>

    </div>

    <?php endif; ?>
<?php endif; ?>