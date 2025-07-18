<header id="masthead" class="site-header header-two">
	<div class="overlay-header">
		<?php
		$bosa_ai_robotics_sector_transparent_header_btn_defaults = array(
			array(
				'transparent_header_btn_type' 				=> 'button-outline',
				'transparent_header_home_btn_bg_color'		=> '#00FF99',
				'transparent_header_home_btn_border_color'	=> '#ffffff',
				'transparent_header_home_btn_text_color'	=> '#ffffff',
				'transparent_header_btn_bg_color'			=> '#00FF99',
				'transparent_header_btn_border_color'		=> '#1a1a1a',
				'transparent_header_btn_text_color'			=> '#1a1a1a',
				'transparent_header_btn_hover_color'		=> '#0F87AA',
				'transparent_header_btn_text' 				=> '',
				'transparent_header_btn_link' 				=> '',
				'transparent_header_btn_target'				=> true,
				'transparent_header_btn_radius'				=> 0,
			),		
		);
	
		$bosa_ai_robotics_sector_transparent_header_buttons = get_theme_mod( 'bosa_ai_robotics_sector_transparent_header_button_repeater', $bosa_ai_robotics_sector_transparent_header_btn_defaults );
		$bosa_ai_robotics_sector_has_header_btn = false;
		if ( is_array( $bosa_ai_robotics_sector_transparent_header_buttons ) ){
			foreach( $bosa_ai_robotics_sector_transparent_header_buttons as $bosa_ai_robotics_sector_value ){
				if( !empty( $bosa_ai_robotics_sector_value['transparent_header_btn_text'] ) ){
					$bosa_ai_robotics_sector_has_header_btn = true;
					break;
				}
			}
		}
		?>
		<div class="top-header">
			<?php if( !get_theme_mod( 'bosa_ai_robotics_sector_disable_top_header_section', false ) ){ ?>
				<?php if( ( !get_theme_mod( 'bosa_ai_robotics_sector_disable_header_social_links', false ) && bosa_ai_robotics_sector_has_social() ) || ( !get_theme_mod( 'bosa_ai_robotics_sector_disable_contact_detail', false ) && ( get_theme_mod( 'bosa_ai_robotics_sector_contact_phone', '' )  || get_theme_mod( 'bosa_ai_robotics_sector_contact_email', '' )  || get_theme_mod( 'bosa_ai_robotics_sector_contact_address', '' ) ) ) || !get_theme_mod( 'bosa_ai_robotics_sector_disable_search_icon', false ) || ( !get_theme_mod( 'bosa_ai_robotics_sector_disable_hamburger_menu_icon', false ) && is_active_sidebar( 'menu-sidebar' ) ) ){ ?>
					<div class="top-header-inner">
						<div class="container">
							<div class="row align-items-center">
								<div class="col-lg-8 d-none d-lg-block">
									<?php get_template_part( 'template-parts/header', 'contact' ); ?>
								</div>
								<div class="col-lg-4">
									<div class="header-icons">
										<?php if( !get_theme_mod( 'bosa_ai_robotics_sector_disable_header_social_links', false ) && bosa_ai_robotics_sector_has_social() ){
											echo '<div class="social-profile d-none d-lg-inline-block">';
												bosa_ai_robotics_sector_social();
											echo '</div>'; 
										} ?>
										<!-- Search form structure -->
										<?php if( !get_theme_mod( 'bosa_ai_robotics_sector_disable_search_icon', false ) ): ?>
											<div id="search-form" class="header-search-wrap d-none d-lg-inline-block">
												<button class="search-icon">
													<span class="fas fa-search"></span>
												</button>
											</div>
										<?php endif; ?>
										<?php if( !get_theme_mod( 'bosa_ai_robotics_sector_disable_hamburger_menu_icon', false ) && is_active_sidebar( 'menu-sidebar' ) ){ ?>
											<div class="alt-menu-icon d-none d-lg-inline-block">
												<a class="offcanvas-menu-toggler" href="#">
													<span class="icon-bar-wrap">
														<span class="icon-bar"></span>
													</span>
												</a>
											</div>
										<?php } ?>
									</div>
								</div>
							</div>
						</div>
						<!-- header search form -->
						<div class="header-search">
							<div class="container">
								<?php get_search_form(); ?>
								<button class="close-button">
									<span class="fas fa-times"></span>
								</button>
							</div>
						</div>
						<!-- header search form end-->
					</div>
				<?php } ?>
			<?php } ?>
			<?php if( !get_theme_mod( 'bosa_ai_robotics_sector_disable_mobile_top_header', false ) ){ ?>
				<?php if( ( !get_theme_mod( 'bosa_ai_robotics_sector_disable_header_social_links', false ) && bosa_ai_robotics_sector_has_social() ) || ( !get_theme_mod( 'bosa_ai_robotics_sector_disable_contact_detail', false ) && ( get_theme_mod( 'bosa_ai_robotics_sector_contact_phone', '' )  || get_theme_mod( 'bosa_ai_robotics_sector_contact_email', '' )  || get_theme_mod( 'bosa_ai_robotics_sector_contact_address', '' ) ) ) || !get_theme_mod( 'bosa_ai_robotics_sector_disable_search_icon', false ) || ( !get_theme_mod( 'bosa_ai_robotics_sector_disable_header_button', false ) && $bosa_ai_robotics_sector_has_header_btn ) || is_active_sidebar( 'menu-sidebar' ) ){ ?>
					<div class="alt-menu-icon d-lg-none">
						<a class="offcanvas-menu-toggler" href="#">
							<span class="icon-bar-wrap">
								<span class="icon-bar"></span>
							</span>
							<span class="iconbar-label d-lg-none"><?php echo esc_html( get_theme_mod( 'bosa_ai_robotics_sector_top_bar_name', 'TOP MENU' ) ); ?></span>
						</a>
					</div>
				<?php } ?>
			<?php } ?>
		</div>	
		<div class="bottom-header header-image-wrap fixed-header">
			<?php if( bosa_ai_robotics_sector_has_header_media() ){ bosa_ai_robotics_sector_header_media(); } ?>
			<div class="container">
				<div class="row align-items-center">
					<div class="col-lg-3">
						<?php get_template_part( 'template-parts/site', 'branding' ); ?>
						<div class="mobile-menu-container"></div>
					</div>
					<div class="col-lg-9 d-none d-lg-block">
						<div class="main-navigation-wrap">
							<nav id="site-navigation" class="main-navigation">
								<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'bosa-ai-robotics-sector' ); ?></button>
								<?php if ( has_nav_menu( 'menu-1' ) ) :
									wp_nav_menu( 
										array(
											'container'      => '',
											'theme_location' => 'menu-1',
											'menu_id'        => 'primary-menu',
											'menu_class'     => 'menu nav-menu',
										)
									);
								?>
								<?php else :
									wp_page_menu(
										array(
											'menu_class' => 'menu-wrap',
						                    'before'     => '<ul id="primary-menu" class="menu nav-menu">',
						                    'after'      => '</ul>',
										)
									);
								?>
								<?php endif; ?>
							</nav><!-- #site-navigation -->
							<?php if ( !get_theme_mod( 'bosa_ai_robotics_sector_disable_header_button', false ) ){
								if( $bosa_ai_robotics_sector_has_header_btn ){ ?>
									<div class="header-btn">
										<?php
										$bosa_ai_robotics_sector_i = 1;
						            	foreach( $bosa_ai_robotics_sector_transparent_header_buttons as $bosa_ai_robotics_sector_value ){
						            		if( !empty( $bosa_ai_robotics_sector_value['transparent_header_btn_text'] ) ){
						            			$bosa_ai_robotics_sector_link_target = '';
												if( $bosa_ai_robotics_sector_value['transparent_header_btn_target'] ){
													$bosa_ai_robotics_sector_link_target = '_blank';
												}else {
													$bosa_ai_robotics_sector_link_target = '';
												} ?>
												<a href="<?php echo esc_url( $bosa_ai_robotics_sector_value['transparent_header_btn_link'] ); ?>" target="<?php echo esc_attr( $bosa_ai_robotics_sector_link_target ); ?>" class="header-btn-<?php echo esc_attr( $bosa_ai_robotics_sector_i ).' '.esc_attr( $bosa_ai_robotics_sector_value['transparent_header_btn_type'] ); ?>">
													<?php echo esc_html( $bosa_ai_robotics_sector_value['transparent_header_btn_text'] ); ?>
												</a>
											<?php
						            		}
						            		$bosa_ai_robotics_sector_i++;
						            	} ?>
						            </div>
					            <?php }
					        } ?>
						</div>
					</div>
				</div>
			</div>
			<div class="overlay"></div>
		</div>
	</div>
	<?php get_template_part( 'template-parts/offcanvas', 'menu' ); ?>
</header><!-- #masthead -->