<?php
/**
 * Extra functions
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package WordPress
 * @subpackage Orbital
 * @since 1.0
 */


/*
 * Return and modify excerpt Lenght
 */

if ( ! function_exists( 'orbital_excerpt_length' ) ) :

	function orbital_excerpt_length( $length ) {

		if( orbital_customize_option('orbital_loop_excerpt_lenght') )
			return orbital_customize_option('orbital_loop_excerpt_lenght');
		else
			return 10;

	}

endif;

/*
 * Print Excerpt More
 */

if ( ! function_exists( 'orbital_excerpt_more' ) ) :

	function orbital_excerpt_more( $more ) {
		return ' <a class="entry-read-more" href="'.get_the_permalink() .'">'. orbital_customize_option('orbital_loop_read_more') .'</a>';
	}

endif;



/*
 * Future featured
 */

if ( ! function_exists( 'orbital_next_page' ) ) :

	function orbital_next_page( $buttons, $id ){

		if ( 'content' != $id )
			return $buttons;
		array_splice( $buttons, 13, 0, 'wp_page' );
		return $buttons;

	}

endif;


/*
 * Future featured
 */

if ( ! function_exists( 'orbital_page_layout' ) ) :

	function orbital_page_layout( $default = "" ){

		if(orbital_get_option_page('layout')){
			return orbital_get_option_page('layout');
		}else{
			return $default;
		}

	}

endif;

/*
 * Add Mime Types
 */

if ( ! function_exists( 'orbital_mime_types' ) ) :

	function orbital_mime_types($mimes) {
		$mimes['svg'] = 'image/svg+xml';
		return $mimes;
	}

endif;


/*
 * Check if sidebar is activated and add class nosidebar if is not
 */

if ( ! function_exists( 'orbital_check_sidebar_class' ) ) :

	function orbital_check_sidebar_class( $classes ) {

		if ( ! is_active_sidebar( 'pages' ) && is_page()
			|| ! is_active_sidebar( 'posts' ) && is_single()
			|| ! is_active_sidebar( 'archives' ) && is_archive()
			|| ! is_active_sidebar( 'page-home' ) && is_home()
			|| ! is_active_sidebar( 'pilar' ) && is_page_template('templates/page-pilar.php'))
		{
			$classes[] = 'no-sidebar';
		}

		if ( orbital_check_woocommerce() ) {
			if (! is_active_sidebar( 'shop' ) && is_woocommerce()) {
				$classes[] = 'no-sidebar';
			}
		}
		return $classes;

	}

endif;


/*
 * Add Custom Excerpt to Pages
 */

if ( ! function_exists( 'orbital_excerpts_to_pages' ) ) :

	function orbital_excerpts_to_pages() {
		add_post_type_support( 'page', 'excerpt' );
	}

endif;


/*
 * Categorized Blog
 */

if ( ! function_exists( 'orbital_categorized_blog' ) ) :

	function orbital_categorized_blog() {
		if ( false === ( $all_the_cool_cats = get_transient( 'orbital_categories' ) ) ) {
			$all_the_cool_cats = get_categories( array(
				'fields'     => 'ids',
				'hide_empty' => 1,
				'number'     => 2,
				) );
			$all_the_cool_cats = count( $all_the_cool_cats );
			set_transient( 'orbital_categories', $all_the_cool_cats );
		}
		if ( $all_the_cool_cats > 1 ) {
			return true;
		} else {
			return false;
		}
	}

endif;


/*
 * Category Trasient Flusher
 */

if ( ! function_exists( 'orbital_category_transient_flusher' ) ) :


	function orbital_category_transient_flusher() {
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return;
		}
		delete_transient( 'orbital_categories' );
	}

endif;

/*
 * Add custom Buttons to WP Editor WYSIWYG
 */

if ( ! function_exists( 'orbital_add_custom_buttons' ) ) :

	function orbital_add_custom_buttons() {

		global $typenow;
		
		if ( !current_user_can('edit_posts') && !current_user_can('edit_pages') ) {
			return;
		}
		
		if( ! in_array( $typenow, array('page', 'post' ) ) )
			return;
		
		if ( get_user_option('rich_editing') == 'true') {
			add_filter("mce_external_plugins", "orbital_add_tinymce_plugin");
			add_filter('mce_buttons', 'orbital_register_custom_buttons');
		}
	}

endif;


/*
 * Register WP Editor Buttons
 */

if ( ! function_exists( 'orbital_add_tinymce_plugin' ) ) :

	function orbital_add_tinymce_plugin($plugin_array) {
		$plugin_array['orbital_tc_button'] = get_template_directory_uri() . '/assets/js/admin.js';
		$plugin_array['orbital_tc_shortcodes'] = get_template_directory_uri() . '/assets/js/admin.js';
		return $plugin_array;
	}

endif;


if ( ! function_exists( 'orbital_register_custom_buttons' ) ) :

	function orbital_register_custom_buttons($buttons) {
		array_push($buttons, "orbital_tc_button");
		array_push($buttons, "orbital_tc_shortcodes");
		return $buttons;
	}

endif;


/*
 * Remove Hentry Class
 */

if ( ! function_exists( 'orbital_remove_hentry' ) ) :

	function orbital_remove_hentry( $classes ) {
		if ( is_singular() ) {
			$classes = array_diff( $classes, array( 'hentry' ) );
		}
		return $classes;
	}

endif;


/*
 * Add WP Editor Extra to Categories
 */

if ( ! function_exists( 'orbital_cat_description' ) ) :

	function orbital_cat_description( $tag ) { 
		$cat_extra_description = get_term_meta( $tag->term_id, 'cat_extra_description', true );
		?>
		<table class="form-table">
			<tr class="form-field">
				<th scope="row" valign="top">
					<label for="description"><?php esc_html_e( 'Top Description' , 'orbital'); ?></label>
				</th>
				<td><?php
					$settings = array(
						'wpautop' => true,
						'media_buttons' => true,
						'quicktags' => true,
						'textarea_rows' => '10',
						'textarea_name' => 'cat_extra_description',
						'drag_drop_upload' => true
					);
					wp_editor( wp_kses_post( $cat_extra_description, ENT_QUOTES, 'UTF-8' ), 'cat_extra_description', $settings ); ?>
				<br />
				<span class="description"><?php _e( 'The description is not prominent by default; however, some themes may show it.', 'orbital' ); ?></span>
				</td>
			</tr>
		</table><?php
	}

endif;


if ( ! function_exists( 'orbital_save_extra_category_fields' ) ) :

	function orbital_save_extra_category_fields( $term_id ) {
		if ( isset( $_POST['cat_extra_description'] ) ) {
			update_term_meta($_POST['tag_ID'], 'cat_extra_description', $_POST['cat_extra_description']);
		}
	}

endif;


/*
 * Modify default textarea comments
 */

if ( ! function_exists( 'orbital_comment_textarea' ) ) :

	function orbital_comment_textarea($arg) {
		$arg['comment_field'] = '<textarea id="comment" name="comment" cols="45" rows="1" required></textarea>';
		return $arg;
	}

endif;