<?php
/**
 * Template part for displaying header contact.
 *
 * @since Bosa AI Robotics Sector 1.0.0
 */

?>

<?php if( !get_theme_mod( 'bosa_ai_robotics_sector_disable_contact_detail', false ) ){ ?>
	<div class="header-contact">
		<ul>
			<li>
				<?php if( get_theme_mod( 'bosa_ai_robotics_sector_contact_phone', '' ) ){ ?>
					<a href="<?php echo esc_url( 'tel:' . get_theme_mod( 'bosa_ai_robotics_sector_contact_phone', '' ) ); ?>"><i class="fas fa-phone"></i>
						<?php echo esc_html( get_theme_mod( 'bosa_ai_robotics_sector_contact_phone', '' ) ); ?>
					</a>
				<?php } ?>
			</li>
			<li>
				<?php if( get_theme_mod( 'bosa_ai_robotics_sector_contact_email', '' ) ){ ?>
					<a href="<?php echo esc_url( 'mailto:' . get_theme_mod( 'bosa_ai_robotics_sector_contact_email', '' ) ); ?>"><i class="fas fa-envelope"></i>
					<?php echo esc_html( get_theme_mod( 'bosa_ai_robotics_sector_contact_email', '' ) ); ?>
					</a>
				<?php } ?>
			</li>
			<li>
				<?php if( get_theme_mod( 'bosa_ai_robotics_sector_contact_address', '' ) ){ ?>
					<i class="fas fa-map-marker-alt"></i>
					<?php echo esc_html( get_theme_mod( 'bosa_ai_robotics_sector_contact_address', '' ) ); ?>
				<?php } ?>
			</li>
		</ul>
	</div>
<?php }