<?php
/**
 * Bosa AI Robotics Sector Notice Handler
 *
 * @package Bosa AI Robotics Sector 
 * @since Bosa AI Robotics Sector 1.0.0
 */

defined( 'ABSPATH' ) || exit;

/**
 * Enqueue getting started styles and scripts
 */
add_action( 'admin_enqueue_scripts', 'bosa_ai_robotics_sector_widgets_backend_enqueue' );
function bosa_ai_robotics_sector_widgets_backend_enqueue()
{
    wp_enqueue_style( 'bosa-ai-robotics-sector-getting-started', get_template_directory_uri() . '/inc/getting-started/getting-started.css' );
    wp_register_script( 'bosa-ai-robotics-sector-custom-widgets', get_template_directory_uri() . '/inc/getting-started/getting-started.js', array( 'jquery' ), true );
    $translation = array(
        'btn_text' => esc_html__( 'Processing...', 'bosa-ai-robotics-sector' ),
        'nonce'    => wp_create_nonce( 'bosa_ai_robotics_sector_demo_import_nonce' ),
        'noncen'    => 'bosa_ai_robotics_sector_demo_import_nonce',
        'adminurl'    => esc_url( admin_url() ),
    );
    wp_localize_script( 'bosa-ai-robotics-sector-custom-widgets', 'bosa_ai_robotics_sector_adi_install', $translation );
    wp_enqueue_media();
    wp_enqueue_script( 'bosa-ai-robotics-sector-custom-widgets' );
}

/**
 * Class to handle notices and Advanced Demo Import
 *
 * Class Bosa_Ai_Robotics_Sector_Notice_Handler
 */
class Bosa_Ai_Robotics_Sector_Notice_Handler {

    public static $nonce;

	/**
	 * Empty Constructor
	 */
	public function __construct() {
        /* activation notice */
        add_action( 'switch_theme', array( $this, 'flush_dismiss_status' ) );
        add_action( 'admin_init', array($this,'getting_started_notice_dismissed' ) );
        add_action( 'admin_notices', array( $this, 'bosa_ai_robotics_sector_theme_info_welcome_admin_notice' ), 3 );
        add_action( 'wp_ajax_bosa_ai_robotics_sector_getting_started', array( $this, 'bosa_ai_robotics_sector_getting_started' ) );
    }

    /**
     * Display an admin notice linking to the about page
     */
    public function bosa_ai_robotics_sector_theme_info_welcome_admin_notice() {
        $theme = wp_get_theme();
        if ( is_admin() && !get_user_meta( get_current_user_id(), 'gs_notice_dismissed' ) ){
            echo '<div class="updated notice notice-success is-dismissible getting-started">';
            if ( is_plugin_active( 'advanced-import/advanced-import.php' ) && is_plugin_active( 'keon-toolset/keon-toolset.php' ) && is_plugin_active( 'kirki/kirki.php' ) && is_plugin_active( 'elementor/elementor.php' ) && is_plugin_active( 'breadcrumb-navxt/breadcrumb-navxt.php' ) && is_plugin_active( 'contact-form-7/wp-contact-form-7.php' ) && is_plugin_active( 'elementskit-lite/elementskit-lite.php' ) && is_plugin_active( 'bosa-elementor-for-woocommerce/bosa-elementor-for-woocommerce.php' ) ){
                echo ('<div class="fs-notice success"><p>'.esc_html__( 'Plugins added successfully. You may dismiss this notice now.', 'bosa-ai-robotics-sector' ).'</p></div>');
            }else{
            /* translators: %s - Theme name*/
            echo ( '<p><strong>' . sprintf( esc_html__( 'Welcome! Thank you for choosing %1$s. To fully take advantage of the best our theme can offer, get started.', 'bosa-ai-robotics-sector' ), esc_attr( $theme->get( 'Name' ) ) ) . '</strong></p><p class="plugin-notice">'.esc_html__( 'Clicking on get started will install and activate Bosa Elementor Addons for WooCommerce, Kirki, Advanced Import, Keon Toolset, Elementor, ElementsKit Lite, Breadcrumb NavXT and Contact Form 7.', 'bosa-ai-robotics-sector' ).'</p><p><a href="#" class="bosa-ai-robotics-sector-install-plugins button button-primary">' . sprintf( esc_html__( 'Get started with %s','bosa-ai-robotics-sector' ), esc_attr( $theme->get( 'Name' ) ) ) . '</a></p>' );
            }
            echo '<a href="' . esc_url( wp_nonce_url( add_query_arg( 'gs-notice-dismissed', 'dismiss_admin_notices' ) ) ) . '" class="getting-started-notice-dismiss">Dismiss</a>';
            echo '</div>';
        }
    }

    /**
     * Register dismissal of the getting started notification.
     * Acts on the dismiss link.
     * If clicked, the admin notice disappears and will no longer be visible to this user.
     */
    public function getting_started_notice_dismissed() {
        
        if ( isset( $_GET['gs-notice-dismissed'] ) ){
            add_user_meta( get_current_user_id(), 'gs_notice_dismissed', 'true' );
        }
    }

    /**
     * Deletes the getting started notice's dismiss status upon theme switch. 
     */
    public function flush_dismiss_status(){
        delete_user_meta( get_current_user_id(), 'gs_notice_dismissed', 'true' );
    }

	/**
	 * Get Started Notice
	 * Active callback of wp_ajax
	 * return void
	 */
	public function bosa_ai_robotics_sector_getting_started() {

		check_ajax_referer( 'bosa_ai_robotics_sector_demo_import_nonce', 'security' );

        $slug   = isset( $_POST['slug'] ) ? sanitize_text_field( wp_unslash( $_POST['slug'] ) ) : '';
        $plugin = $slug.'/'.$slug.'.php';
        if( isset( $_POST['main_file'] ) ){
            $main_file = sanitize_text_field( wp_unslash( $_POST['main_file'] ) );
            $plugin = $slug.'/'. $main_file .'.php';
        }
        $request = isset( $_POST['request'] ) ? sanitize_text_field( wp_unslash( $_POST['request'] ) ) : '';

        $status = array(
            'install' => 'plugin',
            'slug'    => sanitize_key( wp_unslash( $slug ) ),
        );
        $status['redirect'] = admin_url( '/themes.php?page=advanced-import&browse=all&at-gsm-hide-notice=welcome' );

        if ( is_plugin_active_for_network( $plugin ) || is_plugin_active( $plugin ) ) {
            // Plugin is activated
            wp_send_json_success( $status );
        }


        if ( ! current_user_can( 'install_plugins' ) ) {
            $status['errorMessage'] = __( 'Sorry, you are not allowed to install plugins on this site.', 'bosa-ai-robotics-sector' );
            wp_send_json_error( $status );
        }

        if( $request > 8 ){
            wp_send_json_error( );
        }

        include_once ABSPATH . 'wp-admin/includes/class-wp-upgrader.php'; // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
        include_once ABSPATH . 'wp-admin/includes/plugin-install.php'; // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound

        // Looks like a plugin is installed, but not active.
        if( $request == 1 && strpos( $slug, 'elementor' ) === false ){
            wp_send_json_error( );
        }
        if( $request == 2 && strpos( $slug, 'advanced' ) === false ){
            wp_send_json_error( );
        }
        if( $request == 3 && strpos( $slug, 'tool' ) === false ){
            wp_send_json_error();
        }
        if( $request == 4 && strpos( $slug, 'kirki' ) === false ){
            wp_send_json_error();
        }
        if( $request == 5 && strpos( $slug, 'navxt' ) === false ){
            wp_send_json_error();
        }
        if( $request == 6 && strpos( $slug, 'contact' ) === false ){
            wp_send_json_error();
        }
        if( $request == 7 && strpos( $slug, 'elementskit-lite' ) === false ){
            wp_send_json_error();
        }
        if( $request == 8 && strpos( $slug, 'bosa-elementor-for-woocommerce' ) === false ){
            wp_send_json_error();
        }
        if ( file_exists( WP_PLUGIN_DIR . '/' . $slug ) ) {
            $plugin_data          = get_plugin_data( WP_PLUGIN_DIR . '/' . $plugin );
            $status['plugin']     = $plugin;
            $status['pluginName'] = $plugin_data['Name'];

            if ( current_user_can( 'activate_plugin', $plugin ) && is_plugin_inactive( $plugin ) ) {
                $result = activate_plugin( $plugin );

                if ( is_wp_error( $result ) ) {
                    $status['errorCode']    = $result->get_error_code();
                    $status['errorMessage'] = $result->get_error_message();
                    wp_send_json_error( $status );
                }

                wp_send_json_success( $status );
            }
        }

        $api = plugins_api(
            'plugin_information',
            array(
                'slug'   => sanitize_key( wp_unslash( $slug ) ),
                'fields' => array(
                    'sections' => false,
                ),
            )
        );

        if ( is_wp_error( $api ) ) {
            $status['errorMessage'] = $api->get_error_message();
            wp_send_json_error( $status );
        }

        $status['pluginName'] = $api->name;

        $skin     = new WP_Ajax_Upgrader_Skin();
        $upgrader = new Plugin_Upgrader( $skin );
        $result   = $upgrader->install( $api->download_link );

        if ( defined( 'WP_DEBUG' ) && WP_DEBUG ) {
            $status['debug'] = $skin->get_upgrade_messages();
        }

        if ( is_wp_error( $result ) ) {
            $status['errorCode']    = $result->get_error_code();
            $status['errorMessage'] = $result->get_error_message();
            wp_send_json_error( $status );
        } elseif ( is_wp_error( $skin->result ) ) {
            $status['errorCode']    = $skin->result->get_error_code();
            $status['errorMessage'] = $skin->result->get_error_message();
            wp_send_json_error( $status );
        } elseif ( $skin->get_errors()->get_error_code() ) {
            $status['errorMessage'] = $skin->get_error_messages();
            wp_send_json_error( $status );
        } elseif ( is_null( $result ) ) {
            require_once( ABSPATH . 'wp-admin/includes/file.php' ); // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
            WP_Filesystem();
            global $wp_filesystem;

            $status['errorCode']    = 'unable_to_connect_to_filesystem';
            $status['errorMessage'] = __( 'Unable to connect to the filesystem. Please confirm your credentials.', 'bosa-ai-robotics-sector' );

            // Pass through the error from WP_Filesystem if one was raised.
            if ( $wp_filesystem instanceof WP_Filesystem_Base && is_wp_error( $wp_filesystem->errors ) && $wp_filesystem->errors->get_error_code() ) {
                $status['errorMessage'] = esc_html( $wp_filesystem->errors->get_error_message() );
            }

            wp_send_json_error( $status );
        }

        $install_status = install_plugin_install_status( $api );

        if ( current_user_can( 'activate_plugin', $install_status['file'] ) && is_plugin_inactive( $install_status['file'] ) ) {
            $result = activate_plugin( $install_status['file'] );

            if ( is_wp_error( $result ) ) {
                $status['errorCode']    = $result->get_error_code();
                $status['errorMessage'] = $result->get_error_message();
                wp_send_json_error( $status );
            }
        }

        wp_send_json_success( $status );
	}
}
new Bosa_Ai_Robotics_Sector_Notice_Handler;