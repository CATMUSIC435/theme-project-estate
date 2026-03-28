<?php
/**
 * Alize Real Estate Luxury theme functions and definitions
 */

if ( ! function_exists( 'alize_luxury_setup' ) ) :
	function alize_luxury_setup() {
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		) );
		
		// Rank Math SEO Support
		add_theme_support( 'rank-math-breadcrumbs' );
		
		register_nav_menus( array(
			'menu-1'   => esc_html__( 'Primary', 'alize-luxury' ),
			'footer-1' => esc_html__( 'Footer Nav 1 (Quick Nav)', 'alize-luxury' ),
			'footer-2' => esc_html__( 'Footer Nav 2 (Properties)', 'alize-luxury' ),
			'footer-3' => esc_html__( 'Footer Nav 3 (Resources)', 'alize-luxury' ),
		) );
	}
endif;
add_action( 'after_setup_theme', 'alize_luxury_setup' );

/**
 * Register Block Pattern Category
 */
function alize_register_pattern_category() {
    register_block_pattern_category(
        'alize-blocks',
        array( 'label' => __( 'Alize Blocks', 'alize-luxury' ) )
    );
}
add_action( 'init', 'alize_register_pattern_category' );

/**
 * Enqueue scripts and styles.
 */
function alize_luxury_scripts() {
	// Theme stylesheet
	wp_enqueue_style( 'alize-luxury-style', get_stylesheet_uri(), array(), '1.0.0' );
	
	// Swiper CSS
	wp_enqueue_style( 'swiper-style', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css', array(), '11.0.0' );
	
	// Custom Main CSS (Classic)
	wp_enqueue_style( 'alize-main-style', get_template_directory_uri() . '/assets/css/main.css', array(), '1.0.0' );

	// New Modular CSS (Hybrid)
	wp_enqueue_style( 'alize-styles', get_template_directory_uri() . '/styles/main.css', array(), '1.0.0' );

	// GSAP Core
	wp_enqueue_script( 'gsap-core', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js', array(), '3.12.5', array('strategy' => 'defer', 'in_footer' => true) );
	
	// GSAP ScrollTrigger
	wp_enqueue_script( 'gsap-scrolltrigger', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js', array('gsap-core'), '3.12.5', array('strategy' => 'defer', 'in_footer' => true) );
	
	// GSAP ScrollSmoother (Now 100% Free via standard package)
	wp_enqueue_script( 'gsap-scrollsmoother', 'https://cdn.jsdelivr.net/npm/gsap/dist/ScrollSmoother.min.js', array('gsap-core', 'gsap-scrolltrigger'), 'latest', array('strategy' => 'defer', 'in_footer' => true) );
	
	// Swiper JS
	wp_enqueue_script( 'swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', array(), '11.0.0', array('strategy' => 'defer', 'in_footer' => true) );
	
	// Custom Main JS
	wp_enqueue_script( 'alize-main-js', get_template_directory_uri() . '/assets/js/main.js', array('gsap-core', 'gsap-scrolltrigger', 'gsap-scrollsmoother', 'swiper-js'), '1.0.0', array('strategy' => 'defer', 'in_footer' => true) );

	// Pass ajax url or variables if needed
	wp_localize_script( 'alize-main-js', 'alizeData', array(
		'ajax_url' => admin_url( 'admin-ajax.php' ),
		'theme_url' => get_template_directory_uri()
	) );
}
add_action( 'wp_enqueue_scripts', 'alize_luxury_scripts' );

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Custom Post Types.
 */
require get_template_directory() . '/inc/cpt.php';
require get_template_directory() . '/inc/cpt-project.php';
require get_template_directory() . '/inc/acf-project-fields.php';
require get_template_directory() . '/inc/ajax-project.php';
require get_template_directory() . '/inc/seo-project.php';

require get_template_directory() . '/inc/cpt-career.php';
require get_template_directory() . '/inc/acf-career-fields.php';

require get_template_directory() . '/inc/cpt-timeline.php';
require get_template_directory() . '/inc/acf-timeline-fields.php';

/**
 * Dummy Data Seed Script.
 */
require get_template_directory() . '/inc/dummy-data.php';

/**
 * AJAX Handler for Filtering News
 */
function alize_filter_news_ajax() {
	$cat_id = isset($_POST['category']) ? intval($_POST['category']) : 0;
	
	$args = array(
		'post_type'      => 'post',
		'posts_per_page' => 8,
		'post_status'    => 'publish',
	);
	
	if ($cat_id > 0) {
		$args['cat'] = $cat_id;
	}
	
	$alize_loop_query = new WP_Query( $args );
	
	ob_start();
	require get_theme_file_path('parts/news-loop.php');
	$html = ob_get_clean();
	
	wp_send_json_success(array('html' => $html));
}
add_action('wp_ajax_filter_news', 'alize_filter_news_ajax');
add_action('wp_ajax_nopriv_filter_news', 'alize_filter_news_ajax');

/**
 * Add custom classes to navigation links.
 */
function alize_custom_menu_link_class( $atts, $item, $args ) {
    if ( $args->theme_location === 'menu-1' ) {
        // Automatically add contact button style to item named 'Liên hệ' or with a custom CSS class 'btn-contact'
        if ( in_array( 'btn-contact', $item->classes ) || strtolower( trim( $item->title ) ) === 'liên hệ' || strtolower( trim( $item->title ) ) === 'contact' ) {
            if ( isset( $atts['class'] ) ) {
                $atts['class'] .= ' btn-contact';
            } else {
                $atts['class'] = 'btn-contact';
            }
        }
    }
    return $atts;
}
add_filter( 'nav_menu_link_attributes', 'alize_custom_menu_link_class', 10, 3 );

/**
 * Enqueue Admin Styles
 */
function alize_luxury_admin_styles() {
    wp_enqueue_style( 'alize-admin-style', get_template_directory_uri() . '/styles/admin.css', array(), '1.0.0' );
}
add_action( 'admin_enqueue_scripts', 'alize_luxury_admin_styles' );
