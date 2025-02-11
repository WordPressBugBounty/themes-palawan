<?php

/**
 * palawan functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package palawan
 */

if (!defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.3.7');
}

if (!function_exists('palawan_setup')) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function palawan_setup()
	{
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on palawan, use a find and replace
		 * to change 'palawan' to the name of your theme in all the template files.
		 */
		load_theme_textdomain('palawan');

		// Add default posts and comments RSS feed links to head.
		add_theme_support('automatic-feed-links');

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support('title-tag');

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support('post-thumbnails');
		add_image_size('palawan-large', 1170, 606, true);
		add_image_size('palawan-medium', 800, 600, true);

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__('Primary Menu', 'palawan'),
				'top-menu' => esc_html__('Top Menu', 'palawan'),
				'social-menu' => esc_html__('Social Menu', 'palawan'),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'palawan_custom_background_args',
				array(
					'default-color' => 'fdfdfd',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support('customize-selective-refresh-widgets');

		// Add support for responsive embedded content.
		add_theme_support('responsive-embeds');

		// Add support for default block styles.
		add_theme_support('wp-block-styles');

		/*
		 * Add support custom font sizes.
		 *
		 * Add the line below to disable the custom color picker in the editor.
		 * add_theme_support( 'disable-custom-font-sizes' );
		 */
		add_theme_support(
			'editor-font-sizes',
			array(
				array(
					'name'      => __('Small', 'palawan'),
					'shortName' => __('S', 'palawan'),
					'size'      => 16,
					'slug'      => 'small',
				),
				array(
					'name'      => __('Medium', 'palawan'),
					'shortName' => __('M', 'palawan'),
					'size'      => 20,
					'slug'      => 'medium',
				),
				array(
					'name'      => __('Large', 'palawan'),
					'shortName' => __('L', 'palawan'),
					'size'      => 25,
					'slug'      => 'large',
				),
				array(
					'name'      => __('Larger', 'palawan'),
					'shortName' => __('XL', 'palawan'),
					'size'      => 35,
					'slug'      => 'larger',
				),
			)
		);

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);

		add_theme_support('woocommerce');

		add_theme_support('wc-product-gallery-zoom');
		add_theme_support('wc-product-gallery-slider');

		// Add support for Yoast SEO Breadcrumbs.
		add_theme_support('yoast-seo-breadcrumbs');

		// Add support for Rank Math Breadcrumbs.
		add_theme_support('rank-math-breadcrumbs');
	}
endif;
add_action('after_setup_theme', 'palawan_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function palawan_content_width()
{
	$GLOBALS['content_width'] = apply_filters('palawan_content_width', 640);
}
add_action('after_setup_theme', 'palawan_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function palawan_widgets_init()
{
	register_sidebar(
		array(
			'name'          => esc_html__('Sidebar', 'palawan'),
			'id'            => 'sidebar-1',
			'description'   => esc_html__('Add widgets here.', 'palawan'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__('Shop Sidebar', 'palawan'),
			'id'            => 'sidebar-shop',
			'description'   => esc_html__('Add widgets here.', 'palawan'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__('Footer 1', 'palawan'),
			'id'            => 'footer-1',
			'description'   => esc_html__('Add widgets here.', 'palawan'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__('Footer 2', 'palawan'),
			'id'            => 'footer-2',
			'description'   => esc_html__('Add widgets here.', 'palawan'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__('Footer 3', 'palawan'),
			'id'            => 'footer-3',
			'description'   => esc_html__('Add widgets here.', 'palawan'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__('Footer 4', 'palawan'),
			'id'            => 'footer-4',
			'description'   => esc_html__('Add widgets here.', 'palawan'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action('widgets_init', 'palawan_widgets_init');


/**
 * Load Font Family.
 */
if (!function_exists('palawan_fonts_url')) {
	/**
	 * Register custom fonts.
	 * Credits:
	 * Twenty Seventeen WordPress Theme, Copyright 2016 WordPress.org
	 * Twenty Seventeen is distributed under the terms of the GNU GPL
	 */
	function palawan_fonts_url()
	{
		$fonts_url = '';
		$font_families = array();
		global  $palawan_theme_options;
		$palawan_theme_options = palawan_get_options_value();
		$font_families[] = $palawan_theme_options['palawan-font-family-url'];
		$font_families[] = $palawan_theme_options['palawan-font-heading-family-url'];
		$font_families = array_unique($font_families);
		$query_args = array(
			'family' => rawurlencode(implode('|', $font_families)),
			'subset' => rawurlencode('latin,latin-ext'),
		);
		$fonts_url = add_query_arg($query_args, 'https://fonts.googleapis.com/css');
		return esc_url_raw($fonts_url);
	}
}

/**
 * Add preconnect for Google Fonts.
 *
 * @param array  $urls           URLs to print for resource hints.
 * @param string $relation_type  The relation type the URLs are printed.
 * @return array $urls           URLs to print for resource hints.
 */
function palawan_resource_hints($urls, $relation_type)
{
	if (wp_style_is('palawan-fonts', 'queue') && 'preconnect' === $relation_type) {
		$urls[] = array(
			'href' => 'https://fonts.gstatic.com',
			'crossorigin',
		);
	}

	return $urls;
}
add_filter('wp_resource_hints', 'palawan_resource_hints', 10, 2);

/**
 * Enqueue scripts and styles.
 */
function palawan_scripts()
{

	/*google font  */
	global  $palawan_theme_options;
	$palawan_google_fonts_name = palawan_google_fonts();
	$palawan_body_fonts = '';
	$palawan_heading_fonts = '';
	if (!empty($palawan_theme_options['palawan-font-family-url'])) {
		$palawan_body_fonts = esc_attr($palawan_theme_options['palawan-font-family-url']);
	}
	if (!empty($palawan_theme_options['palawan-font-heading-family-url'])) {
		$palawan_heading_fonts = esc_attr($palawan_theme_options['palawan-font-heading-family-url']);
	}

	$palawan_google_fonts_enqueue = array(
		$palawan_body_fonts,
		$palawan_heading_fonts,
	);
	$palawan_google_fonts_enqueue_uniques = array_unique($palawan_google_fonts_enqueue);
	foreach ($palawan_google_fonts_enqueue_uniques as $palawan_google_fonts_enqueue_unique) {
		wp_enqueue_style(
			$palawan_google_fonts_enqueue_unique,
			'//fonts.googleapis.com/css?family=' . $palawan_google_fonts_enqueue_unique . '',
			array(),
			''
		);
	}

	wp_enqueue_style('font-awesome', get_template_directory_uri() . '/candidthemes/assets/framework/font-awesome-6/css/all.min.css', array(), _S_VERSION);

	wp_enqueue_style('slick', get_template_directory_uri() . '/candidthemes/assets/framework/slick/slick.css', array(), _S_VERSION);

	wp_enqueue_style('slick-theme', get_template_directory_uri() . '/candidthemes/assets/framework/slick/slick-theme.css', array(), _S_VERSION);
	wp_enqueue_style('palawan-style', get_stylesheet_uri(), array(), _S_VERSION);
	wp_style_add_data('palawan-style', 'rtl', 'replace');

	wp_enqueue_script('palawan-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true);

	if (!empty($palawan_theme_options['palawan-enable-sticky-sidebar']) && 1 == absint($palawan_theme_options['palawan-enable-sticky-sidebar'])) {
		wp_enqueue_script('theia-sticky-sidebar', get_template_directory_uri() . '/candidthemes/assets/custom/js/theia-sticky-sidebar.js', array('jquery'), _S_VERSION, true);
	}

	wp_enqueue_script('slick', get_template_directory_uri() . '/candidthemes/assets/framework/slick/slick.js', array('jquery'), _S_VERSION, true);

	wp_enqueue_script('masonry');

	wp_enqueue_script('palawan-custom-js', get_template_directory_uri() . '/candidthemes/assets/custom/js/custom.js', array('jquery'), _S_VERSION, true);

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}

	if (!empty($palawan_theme_options['palawan-pagination-options'])) {
		$palawan_pagination_option = $palawan_theme_options['palawan-pagination-options'];
		if ($palawan_pagination_option == 'ajax') {
			wp_enqueue_script('palawan-custom-pagination', get_template_directory_uri() . '/candidthemes/assets/custom/js/custom-infinte-pagination.js', array('jquery'), _S_VERSION, true);
			global $wp_query;
			$paged = (get_query_var('paged') > 1) ? get_query_var('paged') : 1;
			$max_num_pages = $wp_query->max_num_pages;

			wp_localize_script('palawan-custom-pagination', 'palawan_ajax', array(
				'ajaxurl' => esc_url(admin_url('admin-ajax.php')),
				'paged' => absint($paged),
				'max_num_pages' => absint($max_num_pages),
				'next_posts' => next_posts(absint($max_num_pages), false),
				'show_more' => __('Load More', 'palawan'),
				'no_more_posts' => __('No More', 'palawan'),
				'pagination_option' => $palawan_pagination_option
			));
		}
	}
}
add_action('wp_enqueue_scripts', 'palawan_scripts');

// Search form placeholder changes
add_filter('get_search_form', function($form) {
    $form = str_replace(
        'placeholder="Search &hellip;"', 
        'placeholder="' . esc_attr__('Type here...', 'palawan') . '"', 
        $form
    );
    return $form;
});

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load Core File
 */
require get_template_directory() . '/candidthemes/core.php';

/**
 * Load breadcrumb_trail File
 */
if (!function_exists('breadcrumb_trail')) {
	require get_template_directory() . '/candidthemes/assets/framework/breadcrumbs/breadcrumbs.php';
}