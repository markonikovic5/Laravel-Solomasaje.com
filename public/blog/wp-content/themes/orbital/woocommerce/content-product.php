<?php
/**
 * The template for displaying product content within loops
 *
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; 
}
global $product;
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}

?>

<div <?php post_class(); ?>>
	<div class="product-wrapper">
		<?php do_action( 'woocommerce_before_shop_loop_item' ); ?>
		<div class="product-image">
			<?php do_action( 'woocommerce_before_shop_loop_item_title' ); ?>
		</div>
		<?php the_title('<h3>', '</h3>'); ?>
		<?php do_action( 'woocommerce_after_shop_loop_item_title' ); ?>
		<?php do_action( 'woocommerce_after_shop_loop_item' ); ?>
	</div>
</div>
