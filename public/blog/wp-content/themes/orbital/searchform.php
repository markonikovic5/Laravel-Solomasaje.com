<?php
/**
 * The template for displaying search form
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#using-template-files
 *
 * @package WordPress
 * @subpackage Orbital
 * @since 1.0
 */
?>
<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
	<div class="search-input">
		<input type="search" class="search-field" placeholder="<?php esc_html_e( 'Search for:', 'orbital' ) ?>" value="<?php echo get_search_query() ?>" name="s" title="<?php esc_html_e( 'Search for:', 'orbital' ) ?>" />
	</div>
	<div class="search-submit">
		<button type="submit" class="btn btn-primary btn-search-form"><i class="fa fa-search"></i></button>
	</div>
</form>