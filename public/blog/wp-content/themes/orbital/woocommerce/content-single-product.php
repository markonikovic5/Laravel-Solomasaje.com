<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>
<?php
	 do_action( 'woocommerce_before_single_product' );
	 if ( post_password_required() ) {
	 	echo get_the_password_form();
	 	return;
	 }
?>
<div id="product-<?php the_ID(); ?>" <?php post_class('product-content'); ?>>
	<?php do_action( 'woocommerce_before_single_product_summary' ); ?>
	<div class="summary entry-summary">
		<?php do_action( 'woocommerce_single_product_summary' ); ?>
	</div><!-- .summary -->
	<?php do_action( 'woocommerce_after_single_product_summary' ); ?>
</div><!-- #product-<?php the_ID(); ?> -->
<?php do_action( 'woocommerce_after_single_product' ); ?>
