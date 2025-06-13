<?php
/**
 * Block Styles
 *
 * @link https://developer.wordpress.org/reference/functions/register_block_style/
 *
 * @package WordPress
 * @subpackage marketing-firm
 * @since marketing-firm 1.0
 */

if ( function_exists( 'register_block_style' ) ) {
	/**
	 * Register block styles.
	 *
	 * @since marketing-firm 1.0
	 *
	 * @return void
	 */
	function marketing_firm_register_block_styles() {
		

		// Image: Borders.
		register_block_style(
			'core/image',
			array(
				'name'  => 'marketing-firm-border',
				'label' => esc_html__( 'Borders', 'marketing-firm' ),
			)
		);

		
	}
	add_action( 'init', 'marketing_firm_register_block_styles' );
}