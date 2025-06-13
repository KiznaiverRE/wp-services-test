<?php
/**
 * Upgrade to pro options
 */
function weight_loss_club_upgrade_pro_options( $wp_customize ) {

	$wp_customize->add_section(
		'upgrade_premium',
		array(
			'title'    => esc_html__( 'About Weight Loss Club', 'weight-loss-club' ),
			'priority' => 1,
		)
	);

	class Weight_Loss_Club_Pro_Button_Customize_Control extends WP_Customize_Control {
		public $type = 'upgrade_premium';

		function render_content() {
			?>
			<div class="pro_info">
				<ul>
					<li><a class="upgrade-to-pro pro-btn" href="<?php echo esc_url( WEIGHT_LOSS_CLUB_PREMIUM_PAGE ); ?>" target="_blank"><i class="dashicons dashicons-cart"></i><?php esc_html_e( 'Upgrade Pro', 'weight-loss-club' ); ?> </a></li>

					<li><a class="upgrade-to-pro" href="<?php echo esc_url( WEIGHT_LOSS_CLUB_PRO_DEMO ); ?>" target="_blank"><i class="dashicons dashicons-awards"></i><?php esc_html_e( 'Premium Demo', 'weight-loss-club' ); ?> </a></li>
					
					<li><a class="upgrade-to-pro" href="<?php echo esc_url( WEIGHT_LOSS_CLUB_REVIEW ); ?>" target="_blank"><i class="dashicons dashicons-star-filled"></i><?php esc_html_e( 'Rate Us', 'weight-loss-club' ); ?> </a></li>
					
					<li><a class="upgrade-to-pro" href="<?php echo esc_url( WEIGHT_LOSS_CLUB_SUPPORT ); ?>" target="_blank"><i class="dashicons dashicons-lightbulb"></i><?php esc_html_e( 'Support Forum', 'weight-loss-club' ); ?> </a></li>	
					
					<li><a class="upgrade-to-pro" href="<?php echo esc_url( WEIGHT_LOSS_CLUB_THEME_PAGE ); ?>" target="_blank"><i class="dashicons dashicons-admin-appearance"></i><?php esc_html_e( 'Theme Page', 'weight-loss-club' ); ?> </a></li>
				
					<li><a class="upgrade-to-pro" href="<?php echo esc_url( WEIGHT_LOSS_CLUB_THEME_DOCUMENTATION ); ?>" target="_blank"><i class="dashicons dashicons-visibility"></i><?php esc_html_e( 'Theme Documentation', 'weight-loss-club' ); ?> </a></li>
				</ul>
			</div>
			<?php
		}
	}

	$wp_customize->add_setting(
		'pro_info_buttons',
		array(
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'weight_loss_club_sanitize_text',
		)
	);

	$wp_customize->add_control(
		new Weight_Loss_Club_Pro_Button_Customize_Control(
			$wp_customize,
			'pro_info_buttons',
			array(
				'section' => 'upgrade_premium',
			)
		)
	);
}
add_action( 'customize_register', 'weight_loss_club_upgrade_pro_options' );
