<?php
/**
 * The template for displaying product category thumbnails within loops
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.6.1
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<div <?php wc_product_cat_class( '', $category ); ?>>
	<div class="product-wrapper">
		<?php
		do_action( 'woocommerce_before_subcategory', $category ); ?>
		<div class="product-image">
			<?php do_action( 'woocommerce_before_subcategory_title', $category ); ?>
		</div>
		<div class="product-info">
			<?php do_action( 'woocommerce_shop_loop_subcategory_title', $category ); ?>
			<?php do_action( 'woocommerce_after_subcategory_title', $category ); ?>
		</div>
		<?php do_action( 'woocommerce_after_subcategory', $category ); ?>
		<?php //echo term_description( $category ) ?>
	</div>
</div>