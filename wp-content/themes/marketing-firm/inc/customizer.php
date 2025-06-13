<?php
/**
 * Customizer
 * 
 * @package WordPress
 * @subpackage marketing-firm
 * @since marketing-firm 1.0
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function marketing_firm_customize_register( $wp_customize ) {
	$wp_customize->add_section( new Marketing_Firm_Upsell_Section($wp_customize,'upsell_section',array(
		'title'            => __( 'Marketing Firm Pro', 'marketing-firm' ),
		'button_text'      => __( 'Upgrade Pro', 'marketing-firm' ),
		'url'              => 'https://www.wpradiant.net/products/marketing-agency-wordpress-theme',
		'priority'         => 0,
	)));
}
add_action( 'customize_register', 'marketing_firm_customize_register' );

/**
 * Enqueue script for custom customize control.
 */
function marketing_firm_custom_control_scripts() {
	wp_enqueue_script( 'marketing-firm-custom-controls-js', get_template_directory_uri() . '/assets/js/custom-controls.js', array( 'jquery', 'jquery-ui-core', 'jquery-ui-sortable' ), '1.0', true );
	wp_enqueue_style( 'marketing-firm-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/css/customize-controls.css' );
}
add_action( 'customize_controls_enqueue_scripts', 'marketing_firm_custom_control_scripts' );