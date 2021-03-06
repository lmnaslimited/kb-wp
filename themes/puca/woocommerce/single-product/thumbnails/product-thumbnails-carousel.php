<?php
/**
 * Single Product Thumbnails
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-thumbnails.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @author      WooThemes
 * @package     WooCommerce/Templates
 * @version     3.5.1
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

global $post, $product, $woocommerce;
        
$attachment_ids = $product->get_gallery_image_ids();

if ( has_post_thumbnail() ) {
    $thumbanil_id   = array(get_post_thumbnail_id());
    $attachment_ids = array_merge($thumbanil_id,$attachment_ids);
}

if ( $attachment_ids ) 
{
    ?>
    <section id="tbay-gallery" class="slider tbay-slider-nav flex-control-nav"><?php

        foreach ( $attachment_ids as $attachment_id ) 
        {
            $props = wc_get_product_attachment_props( $attachment_id, $post );
            
            $thumbnails_catlog = '';

            if ( ! $props['url'] ) {
                continue;
            }

            echo apply_filters(
                'woocommerce_single_product_image_thumbnail_html',
                sprintf(
                    '<div title="%s">%s</div>',
                    esc_attr( $props['caption'] ),
                    wp_get_attachment_image( $attachment_id, apply_filters( 'single_product_small_thumbnail_size', 'woocommerce_gallery_thumbnail' ), 0, $thumbnails_catlog )
                ),
                $attachment_id,
                $post->ID
            );
        }

    ?></section>
    <?php
}