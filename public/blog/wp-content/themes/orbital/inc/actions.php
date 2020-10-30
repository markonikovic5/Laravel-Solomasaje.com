<?php
/**
 * All hooks from Orbital
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package WordPress
 * @subpackage Orbital
 * @since 1.0
 */

/*
*	Global Hooks
*	------------
*
*  orbital_after_footer
*  orbital_before_footer
*
*
*
*	Single Hooks
*	------------
*	orbital_before_single_header
*	orbital_after_single_header
* 	orbital_before_single_title
* 	orbital_after_single_title
* 	orbital_before_single_content
* 	orbital_after_single_content
* 	orbital_before_single_comments
*	orbital_after_single_comments

*
*
* 	Page Hooks
* 	----------
*	orbital_before_page_header
*	orbital_after_page_header
* 	orbital_before_page_title
* 	orbital_after_page_title
* 	orbital_before_page_content
* 	orbital_after_page_content
* 	orbital_before_page_comments
*	orbital_after_page_comments
*
*	Home Page Hooks
*	---------------
* 	orbital_before_page_home_title
* 	orbital_after_page_home_title
* 	orbital_before_page_home_content
* 	orbital_after_page_home_content
*
*  Archive Hooks
*	-------------
*	orbital_before_archive_title
*   orbital_after_archive_title
* 	orbital_before_archive_loop
* 	orbital_before_archive_content
* 	orbital_after_archive_content
*
*
* 	Headers
* 	-------
* 	orbital_before_navbar
* 	orbital_after_navbar
*
*	Navbar Hooks
* 	-------
* 	page
* 	single
* 	archive
*
*
*
*/



//Page
add_action( 'orbital_before_page_content', 'orbital_yoast_breadcrumbs', 10);
add_action( 'orbital_before_page_content', 'orbital_thumbnail_post', 10);


//Single
add_action( 'orbital_before_single_content', 'orbital_yoast_breadcrumbs', 10);
add_action( 'orbital_before_single_content', 'orbital_thumbnail_post', 10);
add_action( 'orbital_before_single_comments', 'orbital_related_posts', 10);



//Yoast Filters
add_action( 'wpseo_register_extra_replacements', 'orbital_title_replacements' );


//WP Gallery
remove_shortcode('gallery', 'gallery_shortcode');
add_shortcode('gallery', 'orbital_custom_gallery_shortcode');
add_filter( 'attachment_fields_to_edit', 'orbital_attachment_custom_link', 10, 2 );
add_filter( 'attachment_fields_to_save', 'orbital_attachment_custom_link_save', 10, 2 );
add_action('print_media_templates', 'orbital_gallery_settings');


//Shortcodes
add_shortcode( 'orbital_pages', 'orbital_pages_shortcode' );
add_shortcode( 'orbital_posts', 'orbital_posts_shortcode' );


//MetaBox
add_action( 'add_meta_boxes', 'orbital_add_meta_boxes' );
add_action( 'admin_footer', 'orbital_admin_footer' );
add_action( 'save_post', 'orbital_save_post' );

//Json-ld
add_action('wp_footer', 'orbital_markup_site');

//Jetpack
add_action( 'after_setup_theme', 'orbital_jetpack_setup' );


//Cleaner
remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );
remove_action( 'wp_head', 'wp_oembed_add_discovery_links', 10 );
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('wp_head', 'wp_generator');
add_filter('comment_text', 'wp_filter_nohtml_kses');
add_filter('comment_text_rss', 'wp_filter_nohtml_kses');
add_filter('comment_excerpt', 'wp_filter_nohtml_kses');


//Extra Options
add_filter('excerpt_length', 'orbital_excerpt_length', 999 );
add_filter('excerpt_more', 'orbital_excerpt_more');
add_filter( 'mce_buttons', 'orbital_next_page', 1, 2 );
add_filter( 'body_class', 'orbital_check_sidebar_class' );
add_filter( 'get_custom_logo', 'orbital_customize_logo_html' );
//add_action('wp_head','orbital_the_custom_jumbotron');
add_action( 'init', 'orbital_excerpts_to_pages' );
add_action( 'edit_category', 'orbital_category_transient_flusher' );
add_action( 'save_post',     'orbital_category_transient_flusher' );
add_action('admin_head', 'orbital_add_custom_buttons');
add_filter('upload_mimes', 'orbital_mime_types');
add_filter( 'post_class','orbital_remove_hentry' );
add_filter( 'edit_category_form_fields', 'orbital_cat_description' );
add_action ( 'edited_category', 'orbital_save_extra_category_fields');
add_filter('comment_form_defaults', 'orbital_comment_textarea');



//ADVERTISMENT
add_action('orbital_before_page_home_content',  'orbital_advertisment_before_home');
add_action('orbital_after_featured_home',  'orbital_advertisment_after_featured_home');
add_action('orbital_after_page_home_content',  'orbital_advertisment_after_home');
add_action('orbital_before_single_content',  'orbital_advertisment_before_single_content');
add_filter( 'the_content', 'orbital_advertisment_middle_single_content' );
add_action('orbital_after_single_content',  'orbital_advertisment_after_single_content');
add_action('orbital_before_page_content',  'orbital_advertisment_before_page_content');
add_filter( 'the_content', 'orbital_advertisment_middle_page_content' );
add_action('orbital_after_page_content',  'orbital_advertisment_after_page_content');
add_action('orbital_before_archive_loop',  'orbital_advertisment_before_archive');
add_action('orbital_after_featured_archive',  'orbital_advertisment_after_featured_archive');
add_action('orbital_after_archive_content',  'orbital_advertisment_after_archive');
add_action('orbital_after_archive_content',  'orbital_advertisment_after_description_archive');
add_action('orbital_before_page_home_content',  'orbital_advertisment_before_home_mobile');
add_action('orbital_after_featured_home',  'orbital_advertisment_after_featured_home_mobile');
add_action('orbital_after_page_home_content',  'orbital_advertisment_after_home_mobile');
add_action('orbital_before_single_content',  'orbital_advertisment_before_single_content_mobile');
add_filter( 'the_content', 'orbital_advertisment_middle_single_content_mobile' );
add_action('orbital_after_single_content',  'orbital_advertisment_after_single_content_mobile');
add_action('orbital_before_page_content',  'orbital_advertisment_before_page_content_mobile');
add_filter( 'the_content', 'orbital_advertisment_middle_page_content_mobile' );
add_action('orbital_after_page_content',  'orbital_advertisment_after_page_content_mobile');
add_action('orbital_before_archive_loop',  'orbital_advertisment_before_archive_mobile');
add_action('orbital_after_featured_archive',  'orbital_advertisment_after_featured_archive_mobile');
add_action('orbital_after_archive_content',  'orbital_advertisment_after_archive_mobile');
add_action('orbital_after_archive_content',  'orbital_advertisment_after_description_archive_mobile');