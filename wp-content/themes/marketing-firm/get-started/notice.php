<?php

define('MARKETING_FIRM_NOTICE_BUY_NOW',__('https://www.wpradiant.net/products/marketing-agency-wordpress-theme','marketing-firm'));

define('MARKETING_FIRM_BUY_BUNDLE',__('https://www.wpradiant.net/products/wordpress-theme-bundle','marketing-firm'));

// Upsell
if ( class_exists( 'WP_Customize_Section' ) ) {
	class Marketing_Firm_Upsell_Section extends WP_Customize_Section {
		public $type = 'marketing-firm-upsell';
		public $button_text = '';
		public $url = '';
		public $background_color = '';
		public $text_color = '';
		protected function render() {
			$background_color = ! empty( $this->background_color ) ? esc_attr( $this->background_color ) : '#3e5aef';
			$text_color       = ! empty( $this->text_color ) ? esc_attr( $this->text_color ) : '#fff';
			?>
			<li id="accordion-section-<?php echo esc_attr( $this->id ); ?>" class="marketing_firm_upsell_section accordion-section control-section control-section-<?php echo esc_attr( $this->id ); ?> cannot-expand">
				<h3 class="accordion-section-title" style="color:#fff; background:<?php echo esc_attr( $background_color ); ?>;border-left-color:<?php echo esc_attr( $background_color ); ?>;">
					<?php echo esc_html( $this->title ); ?>
					<a href="<?php echo esc_url( $this->url ); ?>" class="button button-secondary alignright" target="_blank" style="margin-top: -4px;"><?php echo esc_html( $this->button_text ); ?></a>
				</h3>
			</li>
			<?php
		}
	}
}
function marketing_firm_admin_notice_style() {
	wp_enqueue_style('marketing-firm-custom-admin-notice-style', esc_url(get_template_directory_uri()) . '/get-started/getstart.css');
}
add_action('admin_enqueue_scripts', 'marketing_firm_admin_notice_style');

/**
 * Display the admin notice if not dismissed.
 */
function marketing_firm_admin_notice() {
    // Check if the notice is dismissed
    $marketing_firm_dismissed = get_user_meta(get_current_user_id(), 'marketing_firm_dismissed_notice', true);
    $marketing_firm_current_page = '';
    if(isset($_GET['page'])) {
    	$marketing_firm_current_page = admin_url( "admin.php?page=".sanitize_text_field($_GET["page"]));
    }

    // Display the notice only if not dismissed
    if (!$marketing_firm_dismissed && $marketing_firm_current_page != admin_url( "admin.php?page=wordclever-templates")) {
        ?>
        <div class="updated notice notice-success is-dismissible notice-get-started-class" data-notice="get-start" style="display: flex;padding: 10px;">
        		<div class="notice-content">
	        		<div class="notice-holder">
	                        <h5><span class="theme-name"><span><?php echo __('Welcome to Marketing Firm', 'marketing-firm'); ?></span></h5>
	                        <h1><?php echo __('Enhance Your Website Development with Radiant Blocks!!', 'marketing-firm'); ?></h1>
	                        </h3>
	                        <div class="notice-text">
	                            <p class="blocks-text"><?php echo __('Effortlessly craft websites for any niche with Radiant Blocks! Experience seamless functionality and stunning responsiveness as you enhance your digital presence with Block WordPress Themes. Start building your ideal website today!', 'marketing-firm') ?></p>
	                        </div>
	                        <a href="javascript:void(0);" id="install-activate-button" class="button admin-button info-button">
							   <?php echo __('Getting started', 'marketing-firm'); ?>
							</a>

							<script type="text/javascript">
							document.getElementById('install-activate-button').addEventListener('click', function () {
							    const marketing_firm_button = this;
							    const marketing_firm_redirectUrl = '<?php echo esc_url(admin_url("themes.php?page=marketing-firm")); ?>';
							    // First, check if plugin is already active
							    jQuery.post(ajaxurl, { action: 'check_wordclever_activation' }, function (response) {
							        if (response.success && response.data.active) {
							            // Plugin already active — just redirect
							            window.location.href = marketing_firm_redirectUrl;
							        } else {
							            // Show Installing & Activating only if not already active
							            marketing_firm_button.textContent = 'Installing & Activating...';

							            jQuery.post(ajaxurl, {
							                action: 'install_and_activate_wordclever_plugin',
							                nonce: '<?php echo wp_create_nonce("install_activate_nonce"); ?>'
							            }, function (response) {
							                if (response.success) {
							                    window.location.href = marketing_firm_redirectUrl;
							                } else {
							                    alert('Failed to activate the plugin.');
							                    marketing_firm_button.textContent = 'Try Again';
							                }
							            });
							        }
							    });
							});
							</script>

	                       <a href="<?php echo esc_url( MARKETING_FIRM_NOTICE_BUY_NOW ); ?>" target="_blank" id="go-pro-button" class="button admin-button buy-now-button"><?php echo __('Buy Now ', 'marketing-firm'); ?></a>

	                        <a href="<?php echo esc_url( MARKETING_FIRM_BUY_BUNDLE ); ?>" target="_blank" id="bundle-button" class="button admin-button bundle-button"><?php echo __('Get Bundle', 'marketing-firm'); ?></a>

	                        <a href="<?php echo esc_url( MARKETING_FIRM_DOC_URL ); ?>" target="_blank" id="doc-button" class="button admin-button bundle-button"><?php echo __('Free Documentation', 'marketing-firm'); ?></a>
	            	</div>
	            </div>
                <div class="theme-hero-screens">
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/get-started/notice.png'); ?>" />
                </div>
        </div>
        <?php
    }
}

// Hook to display the notice
add_action('admin_notices', 'marketing_firm_admin_notice');

/**
 * AJAX handler to dismiss the notice.
 */
function marketing_firm_dismissed_notice() {
    // Set user meta to indicate the notice is dismissed
    update_user_meta(get_current_user_id(), 'marketing_firm_dismissed_notice', true);
    die();
}

// Hook for the AJAX action
add_action('wp_ajax_marketing_firm_dismissed_notice', 'marketing_firm_dismissed_notice');

/**
 * Clear dismissed notice state when switching themes.
 */
function marketing_firm_switch_theme() {
    // Clear the dismissed notice state when switching themes
    delete_user_meta(get_current_user_id(), 'marketing_firm_dismissed_notice');
}

// Hook for switching themes
add_action('after_switch_theme', 'marketing_firm_switch_theme');  