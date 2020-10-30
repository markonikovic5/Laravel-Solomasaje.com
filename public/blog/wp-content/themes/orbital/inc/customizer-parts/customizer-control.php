<?php

$orbital_customizer_defaults = array (
	'orbital_link_color' => '#2196f3',
	'orbital_navbar_background' => '#ffffff',
	'orbital_navbar_link_color' => '#000000',
	'orbital_layout_container' => 52,
	'orbital_layout_relation' => 30,
	'orbital_layout_sidebar_order' => 0,
	'orbital_layout_sidebar_sticky' => false,
	'orbital_layout_menu_orbital' => false,
	'orbital_cookies_active' => false,
	'orbital_cookies_message' => esc_html__( 'This website uses cookies to ensure you get the best experience on our website.', 'orbital' ),
	'orbital_cookies_dismiss' => esc_html__( 'Got it!', 'orbital' ),
	'orbital_cookies_text_link' => esc_html__( 'Learn more', 'orbital' ),
	'orbital_cookies_link' => esc_html__( '#', 'orbital' ),
	'orbital_seo_analytics' => '',
	'orbital_typo_logo' => false,
	'orbital_typo_headings' => false,
	'orbital_typo_body' => false,
	'orbital_loop_columns' => 'column-third',
	'orbital_loop_thumbnail' => true,
	'orbital_loop_excerpt' => true,
	'orbital_loop_excerpt_lenght' => 12,
	'orbital_loop_read_more' => esc_html__( 'Leer más', 'orbital' ),
	'orbital_loop_date' => true,
	'orbital_loop_category' => true,
	'orbital_loop_author' => false,
	'orbital_advertisment_device' => 'all',
);

orbital_customize_option('orbital_layout_sidebar_sticky');

function orbital_customizer_sections(){

	$sections = array(

		//Sections
		array(
			'name' => 'orbital_layout',
			'title' =>  __('Layout Settings', 'orbital'),
			'description' => __('', 'orbital'),
			'priority' => 1001,
			),
		array(
			'name' => 'orbital_typo',
			'title' =>  __('Typography Settings', 'orbital'),
			'description' => __('', 'orbital'),
			'priority' => 1001,
			),
		array(
			'name' => 'orbital_loop',
			'title' =>  __('Loops Settings', 'orbital'),
			'description' => __('', 'orbital'),
			'priority' => 1002,
			),
		array(
			'name' => 'orbital_seo',
			'title' =>  __('SEO Settings', 'orbital'),
			'description' => __('', 'orbital'),
			'priority' => 1003,
			),
		array(
			'name' => 'orbital_ads',
			'title' =>  __('Adsense and Analytics', 'orbital'),
			'description' => __('Recuerda las limitaciones y <a rel="nofollow" target="_blank" href="https://support.google.com/adsense/answer/48182">politicas de Adsense de Google.</a>', 'orbital'),
			'priority' => 1004,
			),
		array(
			'name' => 'orbital_cookies',
			'title' =>  __('Cookies Settings', 'orbital'),
			'description' => __('', 'orbital'),
			'priority' => 1005,
			),
		array(
			'name' => 'orbital_social',
			'title' =>  __('Social Settings', 'orbital'),
			'description' => __('', 'orbital'),
			'priority' => 1006,
			),
		);

	return $sections;
}

function orbital_customizer_settings(){
	global $orbital_customizer_defaults;
	$settings = array(

		// 
		//	COLORS
		//

		array(
			'name' => 'orbital_link_color',
			'default' => $orbital_customizer_defaults['orbital_link_color'],
			'transport' => 'postMessage',
			'sanitize_callback' => 'orbital_sanitize_hex_color',
			),
		array(
			'name' => 'orbital_navbar_background',
			'default' => $orbital_customizer_defaults['orbital_navbar_background'],
			'transport' => 'postMessage',
			'sanitize_callback' => 'orbital_sanitize_hex_color',
			),
		array(
			'name' => 'orbital_navbar_link_color',
			'default' => $orbital_customizer_defaults['orbital_navbar_link_color'],
			'transport' => 'postMessage',
			'sanitize_callback' => 'orbital_sanitize_hex_color',
			),

		//
		//	LAYOUT SETTINGS
		//

		array(
			'name' => 'orbital_layout_container',
			'default' => $orbital_customizer_defaults['orbital_layout_container'],
			'transport' => 'postMessage',
			),
		array(
			'name' => 'orbital_layout_relation',
			'default' => $orbital_customizer_defaults['orbital_layout_relation'],
			'transport' => 'postMessage',
			),
		array(
			'name' => 'orbital_layout_sidebar_order',
			'default' => $orbital_customizer_defaults['orbital_layout_sidebar_order'],
			'transport' => 'postMessage',
			),
		array(
			'name' => 'orbital_layout_sidebar_sticky',
			'default' => $orbital_customizer_defaults['orbital_layout_sidebar_sticky'],
			'transport' => 'refresh',
			),
		array(
			'name' => 'orbital_layout_menu_orbital',
			'default' => $orbital_customizer_defaults['orbital_layout_menu_orbital'],
			'transport' => 'refresh',
			),



		//
		// COOKIES SETTINGS
		//

		array(
			'name' => 'orbital_cookies_active',
			'default' => $orbital_customizer_defaults['orbital_cookies_active'],
			'transport' => 'refresh',
			'sanitize_callback' => 'orbital_sanitize_checkbox',
			),
		array(
			'name' => 'orbital_cookies_message',
			'default' => $orbital_customizer_defaults['orbital_cookies_message'],
			'transport' => 'refresh',
			'sanitize_callback' => 'orbital_sanitize_nohtml',
			),
		array(
			'name' => 'orbital_cookies_dismiss',
			'default' => $orbital_customizer_defaults['orbital_cookies_dismiss'],
			'transport' => 'refresh',
			'sanitize_callback' => 'orbital_sanitize_nohtml',
			),
		array(
			'name' => 'orbital_cookies_text_link',
			'default' => $orbital_customizer_defaults['orbital_cookies_text_link'],
			'transport' => 'refresh',
			'sanitize_callback' => 'orbital_sanitize_nohtml',
			),
		array(
			'name' => 'orbital_cookies_link',
			'default' => $orbital_customizer_defaults['orbital_cookies_link'],
			'transport' => 'refresh',
			'sanitize_callback' => 'orbital_sanitize_dropdown_pages',
			),

		//
		// SEO SETTINGS
		//

		array(
			'name' => 'orbital_seo_analytics',
			'default' => $orbital_customizer_defaults['orbital_seo_analytics'],
			'transport' => 'refresh',
			'sanitize_callback' => 'orbital_sanitize_javascript',
			),

		//
		//TYPO
		//

		array(
			'name' => 'orbital_typo_logo',
			'default' => $orbital_customizer_defaults['orbital_typo_logo'],
			'transport' => 'postMessage',
			'sanitize_callback' => 'orbital_sanitize_html',
			),
		array(
			'name' => 'orbital_typo_headings',
			'default' => $orbital_customizer_defaults['orbital_typo_headings'],
			'transport' => 'postMessage',
			'sanitize_callback' => 'orbital_sanitize_html',
			),
		array(
			'name' => 'orbital_typo_body',
			'default' => $orbital_customizer_defaults['orbital_typo_body'],
			'transport' => 'postMessage',
			'sanitize_callback' => 'orbital_sanitize_html',
			),

		//
		// LOOP SETTINGS
		//
		/*
		array(
			'name' => 'orbital_loop_columns',
			'default' => $orbital_customizer_defaults['orbital_loop_columns'],
			'transport' => 'refresh',
			'sanitize_callback' => 'orbital_sanitize_select',
			),
			*/
		array(
			'name' => 'orbital_loop_thumbnail',
			'default' => $orbital_customizer_defaults['orbital_loop_thumbnail'],
			'transport' => 'refresh',
			'sanitize_callback' => 'orbital_sanitize_checkbox',
			),
		array(
			'name' => 'orbital_loop_excerpt',
			'default' => $orbital_customizer_defaults['orbital_loop_excerpt'],
			'transport' => 'refresh',
			'sanitize_callback' => 'orbital_sanitize_checkbox',
			),
		array(
			'name' => 'orbital_loop_excerpt_lenght',
			'default' => $orbital_customizer_defaults['orbital_loop_excerpt_lenght'],
			'transport' => 'refresh',
			'sanitize_callback' => 'orbital_sanitize_number_absint',
			),
		array(
			'name' => 'orbital_loop_read_more',
			'default' => $orbital_customizer_defaults['orbital_loop_read_more'],
			'transport' => 'postMessage',
			'sanitize_callback' => 'orbital_sanitize_checkbox',
			),
		array(
			'name' => 'orbital_loop_date',
			'default' => $orbital_customizer_defaults['orbital_loop_date'],
			'transport' => 'refresh',
			'sanitize_callback' => 'orbital_sanitize_checkbox',
			),
		array(
			'name' => 'orbital_loop_category',
			'default' => $orbital_customizer_defaults['orbital_loop_category'],
			'transport' => 'refresh',
			'sanitize_callback' => 'orbital_sanitize_checkbox',
			),
		array(
			'name' => 'orbital_loop_author',
			'default' => $orbital_customizer_defaults['orbital_loop_author'],
			'transport' => 'refresh',
			'sanitize_callback' => 'orbital_sanitize_checkbox',
			),

		);


	return $settings;
}

function orbital_customizer_controls($fonts){
	$controls = array(

		//
		//	COLOR CONTROLS
		//

		array(
			'setting' => 'orbital_link_color',
			'info' => array(
				'label' => __('Link Color', 'orbital'),
				'section' => 'colors',
				'settings' => 'orbital_link_color',
				'type' => 'color',
				)
			),
		array(
			'setting' => 'orbital_navbar_background',
			'info' => array(
				'label' => __('Navbar Background Color', 'orbital'),
				'section' => 'colors',
				'settings' => 'orbital_navbar_background',
				'type' => 'color',
				)
			),
		array(
			'setting' => 'orbital_navbar_link_color',
			'info' => array(
				'label' => __('Navbar Link Color', 'orbital'),
				'section' => 'colors',
				'settings' => 'orbital_navbar_link_color',
				'type' => 'color',
				)
			),


		//
		//	LAYOUT CONTROLS
		//

		array(
			'setting' => 'orbital_layout_container',
			'info' => array(
				'label' => __('Container Width', 'orbital'),
				'section' => 'orbital_layout',
				'settings' => 'orbital_layout_container',
				'type' => 'range',
				'input_attrs' => array(
					'min' => 36,
					'max' => 96,
					'step' => 1,
					),
				)
			),

		array(
			'setting' => 'orbital_layout_relation',
			'info' => array(
				'label' => __('Content-Sidebar Relation', 'orbital'),
				'section' => 'orbital_layout',
				'settings' => 'orbital_layout_relation',
				'type' => 'range',
				'input_attrs' => array(
					'min' => 25,
					'max' => 50,
					'step' => 1,
					),
				)
			),
		array(
			'setting' => 'orbital_layout_sidebar_order',
			'info' => array(
				'type' => 'select',
				'section' => 'orbital_layout',
				'label' => __('Sidebar Order', 'orbital'),
				'settings' => 'orbital_layout_sidebar_order',
				'choices' => array(
					-1 => 'Left',
					0 => 'Right',
					),
				)) ,

		array(
			'setting' => 'orbital_layout_sidebar_sticky',
			'info' => array(
				'label' => __('Sticky Sidebar', 'orbital'),
				'section' => 'orbital_layout',
				'settings' => 'orbital_layout_sidebar_sticky',
				'type' => 'checkbox',
				)
			),

		array(
			'setting' => 'orbital_layout_menu_orbital',
			'info' => array(
				'label' => __('Orbital Menu', 'orbital'),
				'section' => 'orbital_layout',
				'settings' => 'orbital_layout_menu_orbital',
				'type' => 'checkbox',
				)
			),

		//
		//	COOKIES CONTROLS
		//

		array(
			'setting' => 'orbital_cookies_active',
			'info' => array(
				'label' => __('Enable Cookies', 'orbital'),
				'section' => 'orbital_cookies',
				'settings' => 'orbital_cookies_active',
				'type' => 'checkbox',
				)
			),
		array(
			'setting' => 'orbital_cookies_message',
			'info' => array(
				'label' => __('Cookies Message', 'orbital'),
				'section' => 'orbital_cookies',
				'settings' => 'orbital_cookies_message',
				'type' => 'textarea',
				)
			),
		array(
			'setting' => 'orbital_cookies_dismiss',
			'info' => array(
				'label' => __('Dismiss Text', 'orbital'),
				'section' => 'orbital_cookies',
				'settings' => 'orbital_cookies_dismiss',
				'type' => 'text',
				)
			),
		array(
			'setting' => 'orbital_cookies_text_link',
			'info' => array(
				'label' => __('Link Text', 'orbital'),
				'section' => 'orbital_cookies',
				'settings' => 'orbital_cookies_text_link',
				'type' => 'text',
				)
			),
		array(
			'setting' => 'orbital_cookies_link',
			'info' => array(
				'label' => __('Link Cookies', 'orbital'),
				'section' => 'orbital_cookies',
				'settings' => 'orbital_cookies_link',
				'type' => 'dropdown-pages',
				)
			),

		//
		//	SEO CONTROLS
		//

		array(
			'setting' => 'orbital_seo_analytics',
			'info' => array(
				'label' => __('Analytics Code', 'orbital'),
				'section' => 'orbital_ads',
				'settings' => 'orbital_seo_analytics',
				'type' => 'textarea',
				'input_attrs' => array(
					'placeholder' => __('Insert Analytics Code with script tag', 'orbital'),
					),
				)
			),

		//
		// LOOPS CONTROLS
		//

		array(
			'setting' => 'orbital_loop_thumbnail',
			'info' => array(
				'label' => __('Show Thumbnails', 'orbital'),
				'section' => 'orbital_loop',
				'settings' => 'orbital_loop_thumbnail',
				'type' => 'checkbox',
				)
			),
		array(
			'setting' => 'orbital_loop_excerpt',
			'info' => array(
				'label' => __('Show Excerpt', 'orbital'),
				'section' => 'orbital_loop',
				'settings' => 'orbital_loop_excerpt',
				'type' => 'checkbox',
				)
			),
		array(
			'setting' => 'orbital_loop_date',
			'info' => array(
				'label' => __('Show Date', 'orbital'),
				'section' => 'orbital_loop',
				'settings' => 'orbital_loop_date',
				'type' => 'checkbox',
				)
			),
		array(
			'setting' => 'orbital_loop_category',
			'info' => array(
				'label' => __('Show Category', 'orbital'),
				'section' => 'orbital_loop',
				'settings' => 'orbital_loop_category',
				'type' => 'checkbox',
				)
			),
		array(
			'setting' => 'orbital_loop_author',
			'info' => array(
				'label' => __('Show Author', 'orbital'),
				'section' => 'orbital_loop',
				'settings' => 'orbital_loop_author',
				'type' => 'checkbox',
				)
			),
		array(
			'setting' => 'orbital_loop_excerpt_lenght',
			'info' => array(
				'label' => __('Excerpt Length', 'orbital'),
				'section' => 'orbital_loop',
				'settings' => 'orbital_loop_excerpt_lenght',
				'type' => 'number',
				'input_attrs' => array(
					'min' => 5,
					),
				)
			),
		array(
			'setting' => 'orbital_loop_columns',
			'info' => array(
				'type' => 'select',
				'section' => 'orbital_loop',
				'label' => __('Number of columns', 'orbital'),
				'settings' => 'orbital_loop_columns',
				'choices' => array(
					'column' => 'List Mode',
					'column-half' => '2 columns',
					'column-third' => '3 columns',
					'column-quarter' => '4 columns',
					),
				)) ,
		array(
			'setting' => 'orbital_loop_read_more',
			'info' => array(
				'label' => __('Read More Text', 'orbital'),
				'section' => 'orbital_loop',
				'settings' => 'orbital_loop_read_more',
				'type' => 'text',
				)
			),

		//
		// TYPO CONTROLS
		//

		array('setting' => 'orbital_typo_logo',
			'info' => array(
				'label' => __('Typo Logo', 'orbital'),
				'description' => __('Puedes introducir una URL. Por ejemplo de Google Fonts.', 'orbital'),
				'section' => 'orbital_typo',
				'settings' => 'orbital_typo_logo',
				'type' => 'select',
				'choices' => $fonts,
				)
			),
		array('setting' => 'orbital_typo_headings',
			'info' => array(
				'label' => __('Typo Headings', 'orbital'),
				'description' => __('Puedes introducir una URL. Por ejemplo de Google Fonts.', 'orbital'),
				'section' => 'orbital_typo',
				'settings' => 'orbital_typo_headings',
				'type' => 'select',
				'choices' => $fonts,
				)
			),
		array('setting' => 'orbital_typo_body',
			'info' => array(
				'label' => __('Typo Body', 'orbital'),
				'description' => __('Puedes introducir una URL. Por ejemplo de Google Fonts.', 'orbital'),
				'section' => 'orbital_typo',
				'settings' => 'orbital_typo_body',
				'type' => 'select',
				'choices' => $fonts,
				)
			),
		
		);
	return $controls;
}
