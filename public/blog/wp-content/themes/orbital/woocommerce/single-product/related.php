<?php
/**
 * Related Products
 *
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
global $product, $woocommerce_loop;
if ( empty( $product ) || ! $product->exists() ) {
	return;
}
if ( ! $related = wc_get_related_products( $posts_per_page ) ) {
	return;
}
$args = apply_filters( 'woocommerce_related_products_args', array(
	'post_type'            => 'product',
	'ignore_sticky_posts'  => 1,
	'no_found_rows'        => 1,
	'posts_per_page'       => $posts_per_page,
	'orderby'              => $orderby,
	'post__in'             => $related,
	'post__not_in'         => array( $product->id )
	) );
$products                    = new WP_Query( $args );
$woocommerce_loop['name']    = 'related';
$woocommerce_loop['columns'] = apply_filters( 'woocommerce_related_products_columns', $columns );
if ( $products->have_posts() ) : ?>
<div class="related products columns-<?php echo $woocommerce_loop['columns']; ?>">
	<h4><?php _e( 'Related Products', 'orbital' ); ?></h4>
	<?php woocommerce_product_loop_start(); ?>
	<?php while ( $products->have_posts() ) : $products->the_post(); ?>
		<?php wc_get_template_part( 'content', 'product-related' ); ?>
	<?php endwhile; // end of the loop. ?>
	<?php woocommerce_product_loop_end(); ?>
</div>
<?php endif; ?>
<?php if ( $product->has_attributes() ) : ?>
	<div class="attributes">
		<?php
		$heading = apply_filters( 'woocommerce_product_additional_information_heading', __( 'Additional information', 'orbital' ) );
		if ( $heading ){ ?> <h4><?php echo $heading; ?></h4> <?php }
		$product->list_attributes(); 
		?>
	</div>
	
<?php endif;
wp_reset_postdata();