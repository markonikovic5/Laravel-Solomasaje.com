<?php
/**
 * The template for displaying product widget entries
 *
 *
 * @see 	https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.5.0
 */
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
global $product; ?>
<li>
	<a href="<?php echo esc_url( get_permalink( $product->id ) ); ?>" title="<?php echo esc_attr( $product->get_title() ); ?>">
		<?php echo $product->get_image(); ?>
		<span class="product-title"><?php echo $product->get_title(); ?></span>
	</a>
	<?php if ( ! empty( $show_rating ) ) : ?>
		<?php echo $product->get_rating_html(); ?>
	<?php endif; ?>
	<?php echo $product->get_price_html(); ?>
</li>
