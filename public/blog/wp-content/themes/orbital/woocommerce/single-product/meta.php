<?php
/**
 * Single Product Meta
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/meta.php.
 *
 *
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
global $post, $product;
$cat_count = sizeof( get_the_terms( $post->ID, 'product_cat' ) );
$tag_count = sizeof( get_the_terms( $post->ID, 'product_tag' ) );
?>
<div class="product-meta">
	<?php do_action( 'woocommerce_product_meta_start' ); ?>
	<?php echo wc_get_product_category_list( ', ', '<span class="posted_in">', '</span>' ); ?>
	<?php echo wc_get_product_tag_list( ', ', '<span class="tagged_as">' . _n( 'Tag:', 'Tags:', count( $product->get_tag_ids() ), 'orbital' ) . ' ', '</span>' ); ?>
	<?php do_action( 'woocommerce_product_meta_end' ); ?>
</div>
