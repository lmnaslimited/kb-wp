<?php
/**
 * Single Project Image
 *
 * @author 		WooThemes
 * @package 	Projects/Templates
 * @version     1.0.0
 */

if (! defined('ABSPATH')) exit; // Exit if accessed directly

global $post;

?>
<div id="owl-slider-one-img" class="single-featured">

	<?php
		if (has_post_thumbnail()) {

			$image       		= get_the_post_thumbnail($post->ID, 'project-single');
			$image_title 		= esc_attr(get_the_title(get_post_thumbnail_id()));
			$image_link  		= wp_get_attachment_url(get_post_thumbnail_id());
			$attachment_count   = count(projects_get_gallery_attachment_ids());

			if ($attachment_count > 0) {
				$gallery = '[project-gallery]';
			} else {
				$gallery = '';
			}

			if (apply_filters('projects_gallery_link_images', true)) {
				echo '<div class="item"><a class="lightbox-gallery" href="' . esc_url($image_link) . '" title="' . esc_attr($image_title) . '">' . trim($image) . '</a></div>';
			} else {
				echo trim($image);
			}

		}

	 ?>

</div>
