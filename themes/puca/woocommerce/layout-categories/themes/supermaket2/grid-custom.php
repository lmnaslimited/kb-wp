<?php

$count = 0;

?>
<?php 
    foreach ($categoriestabs as $tab) {

     	if( isset($tab['images']) && $tab['images'] ) {

			$enable_count 	=  ( !empty($display_count) ) ? puca_switcher_to_boolean($display_count) :  false;
			$category_id 	= $tab['category'];
			if( isset($attr_row) && !empty($attr_row) ) {
				$cat 			= get_term_by( 'slug', $tab['category'], 'product_cat' );
				$category_id 	= $cat->term_taxonomy_id;
				$cat_id 		= 	$tab['images']['id'];
			} else {
				$cat = get_term_by( 'id', $tab['category'], 'product_cat' );
				$cat_id 		= 	$tab['images'];
			}	
	        $cat_count 		= 	puca_get_product_count_of_category($category_id);  

	        if( isset($cat) && $cat ) {
				$cat_name 		= 	$cat->name;    
				$cat_slug 		= 	$cat->slug;   
				$cat_link 		= 	get_term_link($cat->slug, 'product_cat');   
	        } else {
	        	$cat_name = esc_html__('Shop', 'puca');
	        	$cat_link 		= 	get_permalink( wc_get_page_id( 'shop' ) );;   
	        }
	        
	        $cat_count 		= 	puca_get_product_count_of_category($tab['category']);   	


	        if( isset($tab['check_custom_link']) &&  $tab['check_custom_link'] == 'yes' && isset($tab['custom_link']) && !empty($tab['custom_link']) ) {
	        	$cat_link = $tab['custom_link'];
	        } 

	        $image 		   = wp_get_attachment_url( $cat_id );

	        ?> 

				<div class="item">

					<div class="item-cat">
						<?php if ( !empty($image) ) { ?>
							<a class="cat-img tbay-image-loaded" href="<?php echo esc_url($cat_link); ?>">
                    			<?php puca_tbay_src_image_loaded($image, array('alt'=> $cat_name )); ?>
							</a>
						<?php } ?>

						<a class="cat-name" href="<?php echo esc_url($cat_link); ?>">
							<?php echo esc_html($cat_name); ?>

							<?php if( $enable_count ) : ?>
								<span class="count-item">(<?php echo esc_html($cat_count).' '.esc_html__('items','puca'); ?>)</span>
							<?php endif; ?>
						</a>


					</div>

				</div>
			<?php 
			$count++;
			?>
	        <?php     
		}
	}
?>

<?php wp_reset_postdata(); ?>