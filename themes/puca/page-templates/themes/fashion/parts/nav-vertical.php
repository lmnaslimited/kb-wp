<?php if ( has_nav_menu( 'primary' ) ) : ?>
        <nav data-duration="400" class="hidden-xs hidden-sm tbay-megamenu slide animate navbar">
        <?php
            $args = array(
                'theme_location' => 'primary',
                'container_class' => 'collapse navbar-collapse',
                'menu_class' => 'nav navbar-nav',
                'fallback_cb' => '',
                'menu_id' => 'primary-menu-vertical',
				'walker' => new puca_Tbay_Nav_Menu()
            );
            wp_nav_menu($args);
        ?>
        </nav>
<?php endif; ?>