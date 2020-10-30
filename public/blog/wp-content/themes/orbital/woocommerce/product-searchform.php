<?php
/**
 * The template for displaying product search form
 *
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.5.0
 */
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<form role="search" method="get" class="woocommerce-product-search" action="<?php echo esc_url( home_url( '/'  ) ); ?>">
	<div class="row no-margin">
		<div class="col-xs-9 no-padding">
			<input type="search" id="woocommerce-product-search-field" class="search-field" placeholder="<?php echo esc_attr_x( 'Search Products&hellip;', 'placeholder', 'orbital' ); ?>" value="<?php echo get_search_query(); ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label', 'orbital' ); ?>" />
		</div>
		<div class="col-xs-3 no-padding">
			<button type="submit" class="btn btn-primary"/><i class="fa fa-search"></i></button>
		</div>
		<input type="hidden" name="post_type" value="product" />
	</div>
</form>
