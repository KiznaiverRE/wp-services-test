<?php
/**
 * Marketing Firm functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package marketing-firm
 * @since marketing-firm 1.0
 */

if ( ! function_exists( 'marketing_firm_support' ) ) :

	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * @since marketing-firm 1.0
	 *
	 * @return void
	 */
	function marketing_firm_support() {

		load_theme_textdomain( 'marketing-firm', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		// Add support for block styles.
		add_theme_support( 'wp-block-styles' );

		add_theme_support( 'align-wide' );

		// Enqueue editor styles.
		add_editor_style( 'style.css' );

		add_theme_support( 'responsive-embeds' );
		
		// Add support for experimental link color control.
		add_theme_support( 'experimental-link-color' );
	}

endif;

add_action( 'after_setup_theme', 'marketing_firm_support' );

if ( ! function_exists( 'marketing_firm_styles' ) ) :

	/**
	 * Enqueue styles.
	 *
	 * @since marketing-firm 1.0
	 *
	 * @return void
	 */
	function marketing_firm_styles() {

		// Register theme stylesheet.
		wp_register_style(
			'marketing-firm-style',
			get_template_directory_uri() . '/style.css',
			array(),
			wp_get_theme()->get( 'Version' )
		);

		wp_enqueue_style( 
			'marketing-firm-animate-css',
			esc_url(get_template_directory_uri()).'/assets/css/animate.css' 
		);

		// Enqueue theme stylesheet.
		wp_enqueue_style( 'marketing-firm-style' );

		wp_style_add_data( 'marketing-firm-style', 'rtl', 'replace' );

		wp_enqueue_style( 'dashicons' );

		wp_enqueue_style('marketing-firm-swiper-css',
		esc_url(get_template_directory_uri()) . '/assets/css/swiper-bundle.css',
		array()
		);
		
	}

endif;

add_action( 'wp_enqueue_scripts', 'marketing_firm_styles' );

/* Enqueue Custom Js */
function marketing_firm_scripts() {

	wp_enqueue_script( 
		'marketing-firm-wow', esc_url(get_template_directory_uri()) . '/assets/js/wow.js', 
		array('jquery') 
	);

	wp_enqueue_script(
		'marketing-firm-custom', esc_url(get_template_directory_uri()) . '/assets/js/custom.js',
		array('jquery')
	);

	wp_enqueue_script(
        'marketing-firm-scroll-to-top',
        esc_url(get_template_directory_uri()) . '/assets/js/scroll-to-top.js',
        array(), 
        null, 
        true // Load in footer
    );

	wp_enqueue_script(
		'marketing-firm-swiper-js',
		esc_url(get_template_directory_uri()) . '/assets/js/swiper-bundle.js',
		array(),
		true
	);
}
add_action( 'wp_enqueue_scripts', 'marketing_firm_scripts' );

/* Enqueue admin-notice-script js */
add_action('admin_enqueue_scripts', function ($hook) {
    if ($hook !== 'appearance_page_marketing-firm') return;

    wp_enqueue_script('admin-notice-script', get_template_directory_uri() . '/get-started/js/admin-notice-script.js', ['jquery'], null, true);
    wp_localize_script('admin-notice-script', 'pluginInstallerData', [
        'ajaxurl'     => admin_url('admin-ajax.php'),
        'nonce'       => wp_create_nonce('install_wordclever_nonce'), // Match this with PHP nonce check
        'redirectUrl' => admin_url('themes.php?page=marketing-firm'),
    ]);
});

add_action('wp_ajax_check_wordclever_activation', function () {
    include_once ABSPATH . 'wp-admin/includes/plugin.php';
    $marketing_firm_plugin_file = 'wordclever-ai-content-writer/wordclever.php';

    if (is_plugin_active($marketing_firm_plugin_file)) {
        wp_send_json_success(['active' => true]);
    } else {
        wp_send_json_success(['active' => false]);
    }
});
add_filter( 'woocommerce_enable_setup_wizard', '__return_false' );


function marketing_firm_theme_setting() {
	
	// Add block patterns
	require get_template_directory() . '/inc/block-pattern.php';

	// Add block Style
	require get_template_directory() . '/inc/block-style.php';

	// TGM
	require get_template_directory() . '/inc/tgm/plugin-activation.php';

	// Get Started
	require get_template_directory() . '/get-started/getstart.php';

	// Get Notice
	require get_template_directory() . '/get-started/notice.php';

	// Get Notice
	require get_template_directory() . '/inc/customizer.php';

}
add_action('after_setup_theme', 'marketing_firm_theme_setting');