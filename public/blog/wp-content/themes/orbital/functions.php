<?php
/**
 * Orbital functions and definitions
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package WordPress
 * @subpackage Orbital
 * @since 1.0
 */

/*
 * Compability System
 */

if ( version_compare( $GLOBALS['wp_version'], '4.7', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
	return;
}

/*
 * Update System
 */

require get_template_directory() . '/inc/class-wp-license-manager-client.php';


/*
 * Theme Setup
 */

if ( ! function_exists( 'orbital_setup' ) ) :

	function orbital_setup() {

		load_theme_textdomain( 'orbital', get_template_directory() . '/languages' );

		add_theme_support( 'automatic-feed-links' );

		add_theme_support( 'title-tag' );

		add_theme_support( 'post-thumbnails' );

		add_theme_support( 'customize-selective-refresh-widgets' );

		register_nav_menus( array('primary' => esc_html__( 'Primary Menu', 'orbital' )) );

		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			) );

		add_theme_support( 'custom-logo', array(
			'height'      => 90,
			'width'       => 450,
			'flex-height' => true,
			'flex-width' => true,
			) );


		add_theme_support( 'post-formats', array(
			'aside',
			'image',
			'video',
			'quote',
			'link',
			'gallery',
			'audio',
			) );

		$defaults = array(
			'default-image'          => '',
			'width'                  => 1920,
			'height'                 => 400,
			'flex-height'            => true,
			'flex-width'             => true,
			'uploads'                => true,
			'random-default'         => false,
			'header-text'            => true,
			);

		add_theme_support( 'custom-header', $defaults );

		add_theme_support( 'custom-background' );

		add_image_size( 'thumbnail-center', 390, 200, array( 'center', 'center' ) );

		add_image_size( 'thumbnail-featured', 333, 360, array( 'center', 'center' ) );

		add_theme_support( 'starter-content', array(
			'widgets' => array(
				'posts' => array(
					'recent-posts-orbital' => array( 'recent-posts-orbital', array(
						'title' => 'LASTS POSTS',
						'thumbnail' => true,
						) ),
					),
				),
			)
		);
	}

endif;
add_action( 'after_setup_theme', 'orbital_setup' );


/*
 * Content Width Definition
 */

if ( ! function_exists( 'orbital_content_width' ) ) :

	function orbital_content_width() {

		if(orbital_customize_option('orbital_layout_container'))
			$container = orbital_customize_option( 'orbital_layout_container' ) * 16;
		else
			$container = 768;

		$GLOBALS['content_width'] = apply_filters( 'orbital_content_width', $container );
	}

endif;
add_action( 'after_setup_theme', 'orbital_content_width', 0 );


/*
 * Widget Area Register
 */

if ( ! function_exists( 'orbital_widgets_init' ) ) :

	function orbital_widgets_init() {
		register_sidebar( array(
			'name'    		=> esc_html__( 'Posts Sidebar', 'orbital' ),
			'id'            => 'posts',
			'description'   => esc_html__( 'Add widgets here.', 'orbital' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h4 class="widget-title n-m-t">',
			'after_title'   => '</h4>',
			)
		);
		register_sidebar( array(
			'name'          => esc_html__( 'Pages Sidebar', 'orbital' ),
			'id'            => 'pages',
			'description'   => esc_html__( 'Add widgets here.', 'orbital' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h4 class="widget-title n-m-t">',
			'after_title'   => '</h4>',
			)
		);

		register_sidebar( array(
			'name'          => esc_html__( 'Pilar Pages Sidebar', 'orbital' ),
			'id'            => 'pilar',
			'description'   => esc_html__( 'Add widgets here.', 'orbital' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h4 class="widget-title n-m-t">',
			'after_title'   => '</h4>',
			)
		);

		register_sidebar( array(
			'name'          => esc_html__( 'Page Home Sidebar', 'orbital' ),
			'id'            => 'page-home',
			'description'   => esc_html__( 'Add widgets here.', 'orbital' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h4 class="widget-title n-m-t">',
			'after_title'   => '</h4>',
			)
		);
		register_sidebar( array(
			'name'          => esc_html__( 'No advertisment Sidebar', 'orbital' ),
			'id'            => 'no-ads',
			'description'   => esc_html__( 'Add widgets here.', 'orbital' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h4 class="widget-title n-m-t">',
			'after_title'   => '</h4>',
			)
		);
		register_sidebar( array(
			'name'          => esc_html__( 'Archives Sidebar', 'orbital' ),
			'id'            => 'archives',
			'description'   => esc_html__( 'Add widgets here.', 'orbital' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h4 class="widget-title n-m-t">',
			'after_title'   => '</h4>',
			)
		);
		register_sidebar( array(
			'name'          => esc_html__( 'Footer Widget Area 1', 'orbital' ),
			'id'            => 'widget-footer-1',
			'description'   => esc_html__( 'Add widgets here.', 'orbital' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h4 class="widget-title n-m-t">',
			'after_title'   => '</h4>',
			)
		);
		register_sidebar( array(
			'name'          => esc_html__( 'Footer Widget Area 2', 'orbital' ),
			'id'            => 'widget-footer-2',
			'description'   => esc_html__( 'Add widgets here.', 'orbital' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h4 class="widget-title n-m-t">',
			'after_title'   => '</h4>',
			)
		);
		register_sidebar( array(
			'name'          => esc_html__( 'Footer Widget Area 3', 'orbital' ),
			'id'            => 'widget-footer-3',
			'description'   => esc_html__( 'Add widgets here.', 'orbital' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h4 class="widget-title n-m-t">',
			'after_title'   => '</h4>',
			)
		);
		register_sidebar( array(
			'name'          => esc_html__( 'Footer Widget Area 4', 'orbital' ),
			'id'            => 'widget-footer-4',
			'description'   => esc_html__( 'Add widgets here.', 'orbital' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h4 class="widget-title n-m-t">',
			'after_title'   => '</h4>',
			)
		);

		register_sidebar( array(
			'name'          => esc_html__( 'Content 404', 'orbital' ),
			'id'            => 'sidebar-404',
			'description'   => esc_html__( 'Add widgets here.', 'orbital' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h4 class="widget-title n-m-t">',
			'after_title'   => '</h4>',
			)
		);

		register_sidebar( array(
			'name'          => esc_html__( 'Shop Sidebar', 'orbital' ),
			'id'            => 'shop',
			'description'   => esc_html__( 'Add widgets here.', 'orbital' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h4 class="widget-title n-m-t">',
			'after_title'   => '</h4>',
			)
		);
	}
endif;
add_action( 'widgets_init', 'orbital_widgets_init' );


/*
 * URL Fonts Register 
 */

if ( ! function_exists( 'orbital_fonts_url' ) ) :

	function orbital_fonts_url() {
		$fonts_url = '';
		$fonts     = array();
		$subsets   = 'latin,latin-ext';
		
		if( orbital_customize_option('orbital_typo_headings') ) {
			$fonts[] = orbital_customize_option('orbital_typo_headings');
		}
		if( orbital_customize_option('orbital_typo_body') ) {
			$fonts[] = orbital_customize_option('orbital_typo_body');
		}
		if( orbital_customize_option('orbital_typo_logo') ) {
			$fonts[] = orbital_customize_option('orbital_typo_logo');
		}
		if( $fonts ) {
			$fonts_url = add_query_arg( array(
				'family' => urlencode( implode( '|', $fonts ) ),
				'subset' => urlencode( $subsets ),
				), 'https://fonts.googleapis.com/css' );
		}
		return $fonts_url;
	}

endif;

/*
 * URL Fonts Register 
 */

if ( ! function_exists( 'orbital_scripts' ) ) :

	function orbital_scripts() {

		wp_enqueue_style( 'orbital-fonts', orbital_fonts_url(), array(), null );

		wp_enqueue_style( 'orbital-style', get_template_directory_uri() . '/assets/css/main.css' );

		wp_enqueue_style( 'orbital-icons', get_template_directory_uri() . '/assets/css/fontawesome.css' );

		if( orbital_check_woocommerce() )
			wp_enqueue_style( 'orbital-woocommerce', get_template_directory_uri() . '/assets/css/woocommerce.css' );

		if ( orbital_customize_option('orbital_cookies_active') )
			wp_enqueue_script( 'orbital-cookies-js', get_template_directory_uri() . '/assets/js/cookies.min.js', array(), '20151215', true );
		
		wp_enqueue_script( 'orbital-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array('jquery'), '20151215', true );
		wp_enqueue_script( 'orbital-main', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), '20151215', false);

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}

endif;
add_action( 'wp_enqueue_scripts', 'orbital_scripts' );


/*
 * Add Extra Funcionality
 */

require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/inc/extras.php';
require get_template_directory() . '/inc/meta-box.php';
require get_template_directory() . '/inc/actions.php';
require get_template_directory() . '/inc/jetpack.php';
require get_template_directory() . '/inc/shortcodes.php';
require get_template_directory() . '/inc/wpgallery.php';
require get_template_directory() . '/inc/widgets.php';
require get_template_directory() . '/inc/woocommerce-filters.php';
require get_template_directory() . '/inc/comments-walker.php';
require get_template_directory() . '/inc/json-ld.php';
require get_template_directory() . '/inc/yoast-filters.php';
require get_template_directory() . '/inc/customizer.php';
require get_template_directory() . '/inc/advertisment.php';


/*
 * URL Fonts Register 
 */

if ( ! function_exists( 'orbital_theme_add_editor_styles' ) ) :

	function orbital_theme_add_editor_styles() {
		add_editor_style( 'assets/css/editor-style.css' );
	}

endif;
add_action( 'admin_init', 'orbital_theme_add_editor_styles' );

