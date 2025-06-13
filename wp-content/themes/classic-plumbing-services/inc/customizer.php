<?php
/**
 * Classic Plumbing Services Theme Customizer
 *
 * @package Classic Plumbing Services
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function classic_plumbing_services_customize_register( $wp_customize ) {

	function classic_plumbing_services_sanitize_dropdown_pages( $page_id, $setting ) {
  		$page_id = absint( $page_id );
  		return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
	}

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

	wp_enqueue_style('classic-plumbing-services-customize-controls', trailingslashit(esc_url(get_template_directory_uri())).'/css/customize-controls.css');

	//Logo
    $wp_customize->add_setting('classic_plumbing_services_logo_width', array(
        'default' => '',
        'transport' => 'refresh',
        'sanitize_callback' => 'classic_plumbing_services_sanitize_integer'
    ));
    $wp_customize->add_control(new Classic_Plumbing_Services_Slider_Custom_Control($wp_customize, 'classic_plumbing_services_logo_width', array(
    	'label'          => __( 'Logo Width', 'classic-plumbing-services'),
        'section' => 'title_tagline',
        'settings' => 'classic_plumbing_services_logo_width',
        'input_attrs' => array(
            'step' => 1,
            'min' => 0,
            'max' => 300,
        ),
    )));

	// color site title
	$wp_customize->add_setting('classic_plumbing_services_sitetitle_color',array(
		'default' => '',
		'sanitize_callback' => 'classic_plumbing_services_sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'classic_plumbing_services_sitetitle_color', array(
	   'settings' => 'classic_plumbing_services_sitetitle_color',
	   'section'   => 'title_tagline',
	   'label' => __('Site Title Color', 'classic-plumbing-services'),
	   'type'      => 'color'
	));

	$wp_customize->add_setting('classic_plumbing_services_title_enable',array(
		'default' => false,
		'sanitize_callback' => 'classic_plumbing_services_sanitize_checkbox',
	));
	$wp_customize->add_control( 'classic_plumbing_services_title_enable', array(
	   'settings' => 'classic_plumbing_services_title_enable',
	   'section'   => 'title_tagline',
	   'label'     => __('Enable Site Title','classic-plumbing-services'),
	   'type'      => 'checkbox'
	));

	// color site tagline
	$wp_customize->add_setting('classic_plumbing_services_sitetagline_color',array(
		'default' => '',
		'sanitize_callback' => 'classic_plumbing_services_sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'classic_plumbing_services_sitetagline_color', array(
	   'settings' => 'classic_plumbing_services_sitetagline_color',
	   'section'   => 'title_tagline',
	   'label' => __('Site Tagline Color', 'classic-plumbing-services'),
	   'type'      => 'color'
	));

	$wp_customize->add_setting('classic_plumbing_services_tagline_enable',array(
		'default' => false,
		'sanitize_callback' => 'classic_plumbing_services_sanitize_checkbox',
	));
	$wp_customize->add_control( 'classic_plumbing_services_tagline_enable', array(
	   'settings' => 'classic_plumbing_services_tagline_enable',
	   'section'   => 'title_tagline',
	   'label'     => __('Enable Site Tagline','classic-plumbing-services'),
	   'type'      => 'checkbox'
	));

	// woocommerce section
	$wp_customize->add_section('classic_plumbing_services_woocommerce_page_settings', array(
		'title'    => __('WooCommerce Page Settings', 'classic-plumbing-services'),
		'priority' => null,
		'panel'    => 'woocommerce',
	));

	$wp_customize->add_setting('classic_plumbing_services_shop_page_sidebar',array(
		'default' => false,
		'sanitize_callback'	=> 'classic_plumbing_services_sanitize_checkbox'
	 ));
	 $wp_customize->add_control('classic_plumbing_services_shop_page_sidebar',array(
		'type' => 'checkbox',
		'label' => __(' Check To Enable Shop page sidebar','classic-plumbing-services'),
		'section' => 'classic_plumbing_services_woocommerce_page_settings',
	 ));

    // shop page sidebar alignment
    $wp_customize->add_setting('classic_plumbing_services_shop_page_sidebar_position', array(
		'default'           => 'Right Sidebar',
		'sanitize_callback' => 'classic_plumbing_services_sanitize_choices',
	));
	$wp_customize->add_control('classic_plumbing_services_shop_page_sidebar_position',array(
		'type'           => 'radio',
		'label'          => __('Shop Page Sidebar', 'classic-plumbing-services'),
		'section'        => 'classic_plumbing_services_woocommerce_page_settings',
		'choices'        => array(
			'Left Sidebar'  => __('Left Sidebar', 'classic-plumbing-services'),
			'Right Sidebar' => __('Right Sidebar', 'classic-plumbing-services'),
		),
	));	 

	$wp_customize->add_setting('classic_plumbing_services_wooproducts_nav',array(
		'default' => 'Yes',
		'sanitize_callback'	=> 'classic_plumbing_services_sanitize_choices'
	 ));
	 $wp_customize->add_control('classic_plumbing_services_wooproducts_nav',array(
		'type' => 'select',
		'label' => __('Shop Page Products Navigation','classic-plumbing-services'),
		'choices' => array(
			 'Yes' => __('Yes','classic-plumbing-services'),
			 'No' => __('No','classic-plumbing-services'),
		 ),
		'section' => 'classic_plumbing_services_woocommerce_page_settings',
	 ));

	 $wp_customize->add_setting( 'classic_plumbing_services_single_page_sidebar',array(
		'default' => false,
		'sanitize_callback'	=> 'classic_plumbing_services_sanitize_checkbox'
    ) );
    $wp_customize->add_control('classic_plumbing_services_single_page_sidebar',array(
    	'type' => 'checkbox',
       	'label' => __('Check To Enable Single Product Page Sidebar','classic-plumbing-services'),
		'section' => 'classic_plumbing_services_woocommerce_page_settings'
    ));

	// single product page sidebar alignment
    $wp_customize->add_setting('classic_plumbing_services_single_product_page_layout', array(
		'default'           => 'Right Sidebar',
		'sanitize_callback' => 'classic_plumbing_services_sanitize_choices',
	));
	$wp_customize->add_control('classic_plumbing_services_single_product_page_layout',array(
		'type'           => 'radio',
		'label'          => __('Single product Page Sidebar', 'classic-plumbing-services'),
		'section'        => 'classic_plumbing_services_woocommerce_page_settings',
		'choices'        => array(
			'Left Sidebar'  => __('Left Sidebar', 'classic-plumbing-services'),
			'Right Sidebar' => __('Right Sidebar', 'classic-plumbing-services'),
		),
	));

	$wp_customize->add_setting('classic_plumbing_services_related_product_enable',array(
		'default' => true,
		'sanitize_callback'	=> 'classic_plumbing_services_sanitize_checkbox'
	));
	$wp_customize->add_control('classic_plumbing_services_related_product_enable',array(
		'type' => 'checkbox',
		'label' => __('Check To Enable Related product','classic-plumbing-services'),
		'section' => 'classic_plumbing_services_woocommerce_page_settings',
	));

	$wp_customize->add_setting( 'classic_plumbing_services_woo_product_img_border_radius', array(
        'default'              => '0',
        'transport'            => 'refresh',
        'sanitize_callback'    => 'classic_plumbing_services_sanitize_integer'
    ) );
    $wp_customize->add_control(new Classic_Plumbing_Services_Slider_Custom_Control( $wp_customize, 'classic_plumbing_services_woo_product_img_border_radius',array(
		'label'	=> esc_html__('Woo Product Img Border Radius','classic-plumbing-services'),
		'section'=> 'classic_plumbing_services_woocommerce_page_settings',
		'settings'=>'classic_plumbing_services_woo_product_img_border_radius',
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 100,
        ),
	)));

	// Add a setting for number of products per row
    $wp_customize->add_setting('classic_plumbing_services_products_per_row', array(
	    'default'   => '4',
	    'transport' => 'refresh',
	    'sanitize_callback' => 'classic_plumbing_services_sanitize_integer'  
    ));

   	$wp_customize->add_control('classic_plumbing_services_products_per_row', array(
	   'label'    => __('Products Per Row', 'classic-plumbing-services'),
	   'section'  => 'classic_plumbing_services_woocommerce_page_settings',
	   'settings' => 'classic_plumbing_services_products_per_row',
	   'type'     => 'select',
	   'choices'  => array(
			'2' => '2',
			'3' => '3',
			'4' => '4',
	  ),
   	) );
   
   	// Add a setting for the number of products per page
	$wp_customize->add_setting('classic_plumbing_services_products_per_page', array(
		'default'   => '8',
		'transport' => 'refresh',
		'sanitize_callback' => 'classic_plumbing_services_sanitize_integer'
	));

	$wp_customize->add_control('classic_plumbing_services_products_per_page', array(
		'label'    => __('Products Per Page', 'classic-plumbing-services'),
		'section'  => 'classic_plumbing_services_woocommerce_page_settings',
		'settings' => 'classic_plumbing_services_products_per_page',
		'type'     => 'number',
		'input_attrs' => array(
			'min'  => 1,
			'step' => 1,
		),
	));

	//Theme Options
	$wp_customize->add_panel( 'classic_plumbing_services_panel_area', array(
		'priority' => 10,
		'capability' => 'edit_theme_options',
		'title' => __( 'Theme Options Panel', 'classic-plumbing-services' ),
	) );

	//Site Layout Section
	$wp_customize->add_section('classic_plumbing_services_site_layoutsec',array(
		'title'	=> __('Manage Site Layout Section ','classic-plumbing-services'),
		'description' => __('<p class="sec-title">Manage Site Layout Section</p>','classic-plumbing-services'),
		'priority'	=> 1,
		'panel' => 'classic_plumbing_services_panel_area',
	));

	$wp_customize->add_setting('classic_plumbing_services_preloader',array(
		'default' => false,
		'sanitize_callback' => 'classic_plumbing_services_sanitize_checkbox',
	));
	$wp_customize->add_control( 'classic_plumbing_services_preloader', array(
	   'section'   => 'classic_plumbing_services_site_layoutsec',
	   'label'	=> __('Check to Show preloader','classic-plumbing-services'),
	   'type'      => 'checkbox'
 	));	

	$wp_customize->add_setting('classic_plumbing_services_preloader_bg_image',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'classic_plumbing_services_preloader_bg_image',array(
        'section' => 'classic_plumbing_services_site_layoutsec',
		'label' => __('Preloader Background Image','classic-plumbing-services'),
	)));

	$wp_customize->add_setting( 'classic_plumbing_services_theme_page_breadcrumb',array(
		'default' => false,
        'sanitize_callback'	=> 'classic_plumbing_services_sanitize_checkbox',
	) );
	$wp_customize->add_control('classic_plumbing_services_theme_page_breadcrumb',array(
       'section' => 'classic_plumbing_services_site_layoutsec',
	   'label' => __( 'Check To Enable Theme Page Breadcrumb','classic-plumbing-services' ),
	   'type' => 'checkbox'
    ));		

	$wp_customize->add_setting('classic_plumbing_services_box_layout',array(
		'default' => false,
		'sanitize_callback' => 'classic_plumbing_services_sanitize_checkbox',
	));
	$wp_customize->add_control( 'classic_plumbing_services_box_layout', array(
	   'section'   => 'classic_plumbing_services_site_layoutsec',
	   'label'	=> __('Check to Show Box Layout','classic-plumbing-services'),
	   'type'      => 'checkbox'
 	));

	// Add Settings and Controls for Page Layout
    $wp_customize->add_setting('classic_plumbing_services_sidebar_page_layout',array(
		'default' => 'full',
	 	'sanitize_callback' => 'classic_plumbing_services_sanitize_choices'
	));
	$wp_customize->add_control('classic_plumbing_services_sidebar_page_layout',array(
		'type' => 'radio',
		'label'     => __('Theme Page Sidebar Position', 'classic-plumbing-services'),
		'section' => 'classic_plumbing_services_site_layoutsec',
		'choices' => array(
			'full' => __('Full','classic-plumbing-services'),
			'left' => __('Left','classic-plumbing-services'),
			'right' => __('Right','classic-plumbing-services'),
		),
	));

	$wp_customize->add_setting( 'classic_plumbing_services_site_layoutsec_settings_upgraded_features',array(
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('classic_plumbing_services_site_layoutsec_settings_upgraded_features', array(
		'type'=> 'hidden',
		'description' => "<span class='customizer-upgraded-features'>Unlock Premium Customization Features:
			<a target='_blank' href='". esc_url(CLASSIC_PLUMBING_SERVICES_PREMIUM_PAGE) ." '>Upgrade to Pro</a></span>",
		'section' => 'classic_plumbing_services_site_layoutsec'
	));

	//Global Color
	$wp_customize->add_section('classic_plumbing_services_global_color', array(
		'title'    => __('Manage Global Color Section', 'classic-plumbing-services'),
		'panel'    => 'classic_plumbing_services_panel_area',
	));

	$wp_customize->add_setting('classic_plumbing_services_first_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'classic_plumbing_services_first_color', array(
		'label'    => __('Theme Color', 'classic-plumbing-services'),
		'section'  => 'classic_plumbing_services_global_color',
		'settings' => 'classic_plumbing_services_first_color',
	)));

	$wp_customize->add_setting('classic_plumbing_services_second_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'classic_plumbing_services_second_color', array(
		'label'    => __('Theme Color', 'classic-plumbing-services'),
		'section'  => 'classic_plumbing_services_global_color',
		'settings' => 'classic_plumbing_services_second_color',
	)));

	$wp_customize->add_setting( 'classic_plumbing_services_global_color_settings_upgraded_features',array(
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('classic_plumbing_services_global_color_settings_upgraded_features', array(
		'type'=> 'hidden',
		'description' => "<span class='customizer-upgraded-features'>Unlock Premium Customization Features:
			<a target='_blank' href='". esc_url(CLASSIC_PLUMBING_SERVICES_PREMIUM_PAGE) ." '>Upgrade to Pro</a></span>",
		'section' => 'classic_plumbing_services_global_color'
	));

	// Header Section
	$wp_customize->add_section('classic_plumbing_services_topbar_section',array(
	    'title' => __('Manage Header Section','classic-plumbing-services'),
	    'description' => __('<p class="sec-title">Manage Header Section</p>', 'classic-plumbing-services'),
	    'priority'  => null,
	    'panel' => 'classic_plumbing_services_panel_area',
	));	

	$wp_customize->add_setting('classic_plumbing_services_topbar_text', array(
	    'default'           => '',
	    'sanitize_callback' => 'sanitize_text_field',
	    'capability'        => 'edit_theme_options',
	));
	$wp_customize->add_control('classic_plumbing_services_topbar_text', array(
	    'settings' => 'classic_plumbing_services_topbar_text',
	    'section'  => 'classic_plumbing_services_topbar_section',
	    'label'    => __('Add Topbar Text', 'classic-plumbing-services'),
	    'type'     => 'text',
	));

	$wp_customize->add_setting('classic_plumbing_services_phone_number',array(
		'default' => '',
		'sanitize_callback' => 'classic_plumbing_services_sanitize_phone_number',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'classic_plumbing_services_phone_number', array(
	   'settings' => 'classic_plumbing_services_phone_number',
	   'section'   => 'classic_plumbing_services_topbar_section',
	   'label' => __('Add Phone Number', 'classic-plumbing-services'),
	   'type'      => 'text'
	));

	$wp_customize->add_setting('classic_plumbing_services_stickyheader',array(
		'default' => false,
		'sanitize_callback' => 'classic_plumbing_services_sanitize_checkbox',
	));
	$wp_customize->add_control( 'classic_plumbing_services_stickyheader', array(
	   'section'   => 'classic_plumbing_services_topbar_section',
	   'label'	=> __('Check To Show Sticky Header','classic-plumbing-services'),
	   'type'      => 'checkbox'
 	));

	$wp_customize->add_setting( 'classic_plumbing_services_topbar_section_settings_upgraded_features',array(
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('classic_plumbing_services_topbar_section_settings_upgraded_features', array(
		'type'=> 'hidden',
		'description' => "<span class='customizer-upgraded-features'>Unlock Premium Customization Features:
			<a target='_blank' href='". esc_url(CLASSIC_PLUMBING_SERVICES_PREMIUM_PAGE) ." '>Upgrade to Pro</a></span>",
		'section' => 'classic_plumbing_services_topbar_section'
	));

	// Banner Section
	$wp_customize->add_section('classic_plumbing_services_banner_section',array(
	    'title' => __('Manage Banner Section','classic-plumbing-services'),
	    'priority'  => null,
	    'panel' => 'classic_plumbing_services_panel_area',
	));	

	$wp_customize->add_setting('classic_plumbing_services_banner',array(
		'default' => false,
		'sanitize_callback' => 'classic_plumbing_services_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'classic_plumbing_services_banner', array(
	   'settings' => 'classic_plumbing_services_banner',
	   'section'   => 'classic_plumbing_services_banner_section',
	   'label'     => __('Check To Enable This Section','classic-plumbing-services'),
	   'type'      => 'checkbox'
	));

	$wp_customize->add_setting('classic_plumbing_services_banner_title', array(
	    'default'           => '',
	    'sanitize_callback' => 'sanitize_text_field',
	    'capability'        => 'edit_theme_options',
	));
	$wp_customize->add_control('classic_plumbing_services_banner_title', array(
	    'settings' => 'classic_plumbing_services_banner_title',
	    'section'  => 'classic_plumbing_services_banner_section',
	    'label'    => __('Add Banner Title', 'classic-plumbing-services'),
	    'type'     => 'text',
	));

	for ($classic_plumbing_services_i=0; $classic_plumbing_services_i < 3; $classic_plumbing_services_i++) { 
		$wp_customize->add_setting('classic_plumbing_services_banner_left_title' .$classic_plumbing_services_i, array(
		    'default'           => '',
		    'sanitize_callback' => 'sanitize_text_field',
		    'capability'        => 'edit_theme_options',
		));
		$wp_customize->add_control('classic_plumbing_services_banner_left_title' .$classic_plumbing_services_i, array(
		    'settings' => 'classic_plumbing_services_banner_left_title' .$classic_plumbing_services_i,
		    'section'  => 'classic_plumbing_services_banner_section',
		    'label'    => __('Add Left Title', 'classic-plumbing-services'),
		    'type'     => 'text',
		));

		$wp_customize->add_setting('classic_plumbing_services_banner_left_title_link' .$classic_plumbing_services_i,array(
			'default' => '',
			'sanitize_callback' => 'esc_url_raw',
			'capability' => 'edit_theme_options',
		));
		$wp_customize->add_control( 'classic_plumbing_services_banner_left_title_link' .$classic_plumbing_services_i, array(
		   'settings' => 'classic_plumbing_services_banner_left_title_link' .$classic_plumbing_services_i,
		   'section'   => 'classic_plumbing_services_banner_section',
		   'label' => __('Add Title Link', 'classic-plumbing-services'),
		   'type'      => 'url'
		));

		$wp_customize->add_setting('classic_plumbing_services_banner_left_content' .$classic_plumbing_services_i, array(
		    'default'           => '',
		    'sanitize_callback' => 'sanitize_text_field',
		    'capability'        => 'edit_theme_options',
		));
		$wp_customize->add_control('classic_plumbing_services_banner_left_content' .$classic_plumbing_services_i, array(
		    'settings' => 'classic_plumbing_services_banner_left_content' .$classic_plumbing_services_i,
		    'section'  => 'classic_plumbing_services_banner_section',
		    'label'    => __('Add Left Description', 'classic-plumbing-services'),
		    'type'     => 'text',
		));

		$wp_customize->add_setting('classic_plumbing_services_left_services_icon' .$classic_plumbing_services_i,array(
	        'default'=> 'fa-solid fa-faucet-drip',
	        'sanitize_callback' => 'sanitize_text_field'
	    ));
	        $wp_customize->add_control('classic_plumbing_services_left_services_icon' .$classic_plumbing_services_i,array(
	        'label' => __('Add Icon ','classic-plumbing-services'),
	        'description' => __('Fontawesome Icon (e.g., fa-solid fa-faucet-drip)','classic-plumbing-services'),
	        'section'=> 'classic_plumbing_services_banner_section',
	        'type'=> 'text'
	    ));
	}

	$wp_customize->add_setting('classic_plumbing_services_banner_middle_img',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'classic_plumbing_services_banner_middle_img',array(
	    'label' => __('Add Middle Image','classic-plumbing-services'),
	    'description'	=> __('Use the given image dimension (430px x 470px).','classic-plumbing-services'),
	    'section' => 'classic_plumbing_services_banner_section'
	)));

	for ($classic_plumbing_services_j=0; $classic_plumbing_services_j < 3; $classic_plumbing_services_j++) { 
		$wp_customize->add_setting('classic_plumbing_services_banner_right_title' .$classic_plumbing_services_j, array(
		    'default'           => '',
		    'sanitize_callback' => 'sanitize_text_field',
		    'capability'        => 'edit_theme_options',
		));
		$wp_customize->add_control('classic_plumbing_services_banner_right_title' .$classic_plumbing_services_j, array(
		    'settings' => 'classic_plumbing_services_banner_right_title' .$classic_plumbing_services_j,
		    'section'  => 'classic_plumbing_services_banner_section',
		    'label'    => __('Add Right Title', 'classic-plumbing-services'),
		    'type'     => 'text',
		));

		$wp_customize->add_setting('classic_plumbing_services_banner_right_title_link' .$classic_plumbing_services_j,array(
			'default' => '',
			'sanitize_callback' => 'esc_url_raw',
			'capability' => 'edit_theme_options',
		));
		$wp_customize->add_control( 'classic_plumbing_services_banner_right_title_link' .$classic_plumbing_services_j, array(
		   'settings' => 'classic_plumbing_services_banner_right_title_link' .$classic_plumbing_services_j,
		   'section'   => 'classic_plumbing_services_banner_section',
		   'label' => __('Add Title Link', 'classic-plumbing-services'),
		   'type'      => 'url'
		));

		$wp_customize->add_setting('classic_plumbing_services_banner_right_content' .$classic_plumbing_services_j, array(
		    'default'           => '',
		    'sanitize_callback' => 'sanitize_text_field',
		    'capability'        => 'edit_theme_options',
		));
		$wp_customize->add_control('classic_plumbing_services_banner_right_content' .$classic_plumbing_services_j, array(
		    'settings' => 'classic_plumbing_services_banner_right_content' .$classic_plumbing_services_j,
		    'section'  => 'classic_plumbing_services_banner_section',
		    'label'    => __('Add Right Description', 'classic-plumbing-services'),
		    'type'     => 'text',
		));

		$wp_customize->add_setting('classic_plumbing_services_right_services_icon' .$classic_plumbing_services_j,array(
	        'default'=> 'fa-solid fa-faucet-drip',
	        'sanitize_callback' => 'sanitize_text_field'
	    ));
	        $wp_customize->add_control('classic_plumbing_services_right_services_icon' .$classic_plumbing_services_j,array(
	        'label' => __('Add Icon ','classic-plumbing-services'),
	        'description' => __('Fontawesome Icon (e.g., fa-solid fa-faucet-drip)','classic-plumbing-services'),
	        'section'=> 'classic_plumbing_services_banner_section',
	        'type'=> 'text'
	    ));
	}

	$wp_customize->add_setting( 'classic_plumbing_services_banner_settings_upgraded_features',array(
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('classic_plumbing_services_banner_settings_upgraded_features', array(
		'type'=> 'hidden',
		'description' => "<span class='customizer-upgraded-features'>Unlock Premium Customization Features:
			<a target='_blank' href='". esc_url(CLASSIC_PLUMBING_SERVICES_PREMIUM_PAGE) ." '>Upgrade to Pro</a></span>",
		'section' => 'classic_plumbing_services_banner_section'
	));

	// About Section
	$wp_customize->add_section('classic_plumbing_services_about_section', array(
	    'title'       => __('Manage About Section', 'classic-plumbing-services'),
	    'description' => __('<p class="sec-title">Manage About Section</p>', 'classic-plumbing-services'),
	    'priority'    => null,
	    'panel'       => 'classic_plumbing_services_panel_area',
	));

	$wp_customize->add_setting('classic_plumbing_services_disabled_about_section',array(
		'default' => false,
		'sanitize_callback' => 'classic_plumbing_services_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'classic_plumbing_services_disabled_about_section', array(
	   'settings' => 'classic_plumbing_services_disabled_about_section',
	   'section'   => 'classic_plumbing_services_about_section',
	   'label'     => __('Check To Enable This Section','classic-plumbing-services'),
	   'type'      => 'checkbox'
	));
	
	$wp_customize->add_setting('classic_plumbing_services_select_about_page',array(
		'default'	=> '0',
		'capability' => 'edit_theme_options',
		'sanitize_callback'	=> 'classic_plumbing_services_sanitize_dropdown_pages'
	));
	$wp_customize->add_control(	'classic_plumbing_services_select_about_page',array(
		'type' => 'dropdown-pages',
	   'label'     => __('Select Page to display About','classic-plumbing-services'),
		'section' => 'classic_plumbing_services_about_section',
	));	

	for($classic_plumbing_services_i=1;$classic_plumbing_services_i<=5;$classic_plumbing_services_i++) {

	    $wp_customize->add_setting('classic_plumbing_services_about_sentence'.$classic_plumbing_services_i,array(
	        'default'=> '',
	        'sanitize_callback' => 'sanitize_text_field',
			'capability' => 'edit_theme_options',
	    ));
	    $wp_customize->add_control('classic_plumbing_services_about_sentence'.$classic_plumbing_services_i,array(
	        'label' => __('Add Services Text ','classic-plumbing-services').$classic_plumbing_services_i,
	        'section'=> 'classic_plumbing_services_about_section',
	        'settings'=> 'classic_plumbing_services_about_sentence'.$classic_plumbing_services_i,
	        'type'=> 'text'
	    ));
	}

	$wp_customize->add_setting('classic_plumbing_services_industrial_title', array(
	    'default'           => '',
	    'sanitize_callback' => 'sanitize_text_field',
	    'capability'        => 'edit_theme_options',
	));
	$wp_customize->add_control('classic_plumbing_services_industrial_title', array(
	    'settings' => 'classic_plumbing_services_industrial_title',
	    'section'  => 'classic_plumbing_services_about_section',
	    'label'    => __('Add Industrial Title', 'classic-plumbing-services'),
	    'type'     => 'text',
	));

	$wp_customize->add_setting('classic_plumbing_services_industrial_text', array(
	    'default'           => '',
	    'sanitize_callback' => 'sanitize_text_field',
	    'capability'        => 'edit_theme_options',
	));
	$wp_customize->add_control('classic_plumbing_services_industrial_text', array(
	    'settings' => 'classic_plumbing_services_industrial_text',
	    'section'  => 'classic_plumbing_services_about_section',
	    'label'    => __('Add Industrial Text', 'classic-plumbing-services'),
	    'type'     => 'text',
	));

	$wp_customize->add_setting('classic_plumbing_services_experince_count', array(
	    'default'           => '',
	    'sanitize_callback' => 'sanitize_text_field',
	    'capability'        => 'edit_theme_options',
	));
	$wp_customize->add_control('classic_plumbing_services_experince_count', array(
	    'settings' => 'classic_plumbing_services_experince_count',
	    'section'  => 'classic_plumbing_services_about_section',
	    'label'    => __('Add Experience Years Count', 'classic-plumbing-services'),
	    'type'     => 'text',
	));

	$wp_customize->add_setting('classic_plumbing_services_experince_text', array(
	    'default'           => '',
	    'sanitize_callback' => 'sanitize_text_field',
	    'capability'        => 'edit_theme_options',
	));
	$wp_customize->add_control('classic_plumbing_services_experince_text', array(
	    'settings' => 'classic_plumbing_services_experince_text',
	    'section'  => 'classic_plumbing_services_about_section',
	    'label'    => __('Add Experience Text', 'classic-plumbing-services'),
	    'type'     => 'text',
	));
	
	$wp_customize->add_setting( 'classic_plumbing_services_about_settings_upgraded_features',array(
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('classic_plumbing_services_about_settings_upgraded_features', array(
		'type'=> 'hidden',
		'description' => "<span class='customizer-upgraded-features'>Unlock Premium Customization Features:
			<a target='_blank' href='". esc_url(CLASSIC_PLUMBING_SERVICES_PREMIUM_PAGE) ." '>Upgrade to Pro</a></span>",
		'section' => 'classic_plumbing_services_about_section'
	));

	//Blog post
	$wp_customize->add_section('classic_plumbing_services_blog_post_settings',array(
        'title' => __('Manage Post Section', 'classic-plumbing-services'),
        'priority' => null,
        'panel' => 'classic_plumbing_services_panel_area'
    ) );

	$wp_customize->add_setting('classic_plumbing_services_metafields_date', array(
	    'default' => true,
	    'sanitize_callback' => 'classic_plumbing_services_sanitize_checkbox',
	));
	$wp_customize->add_control('classic_plumbing_services_metafields_date', array(
	    'settings' => 'classic_plumbing_services_metafields_date', 
	    'section'   => 'classic_plumbing_services_blog_post_settings',
	    'label'     => __('Check to Enable Date', 'classic-plumbing-services'),
	    'type'      => 'checkbox',
	));

	$wp_customize->add_setting('classic_plumbing_services_metafields_comments', array(
		'default' => true,
		'sanitize_callback' => 'classic_plumbing_services_sanitize_checkbox',
	));	
	$wp_customize->add_control('classic_plumbing_services_metafields_comments', array(
		'settings' => 'classic_plumbing_services_metafields_comments',
		'section'  => 'classic_plumbing_services_blog_post_settings',
		'label'    => __('Check to Enable Comments', 'classic-plumbing-services'),
		'type'     => 'checkbox',
	));

	$wp_customize->add_setting('classic_plumbing_services_metafields_author', array(
		'default' => true,
		'sanitize_callback' => 'classic_plumbing_services_sanitize_checkbox',
	));
	$wp_customize->add_control('classic_plumbing_services_metafields_author', array(
		'settings' => 'classic_plumbing_services_metafields_author',
		'section'  => 'classic_plumbing_services_blog_post_settings',
		'label'    => __('Check to Enable Author', 'classic-plumbing-services'),
		'type'     => 'checkbox',
	));		

	$wp_customize->add_setting('classic_plumbing_services_metafields_time', array(
		'default' => true,
		'sanitize_callback' => 'classic_plumbing_services_sanitize_checkbox',
	));
	$wp_customize->add_control('classic_plumbing_services_metafields_time', array(
		'settings' => 'classic_plumbing_services_metafields_time',
		'section'  => 'classic_plumbing_services_blog_post_settings',
		'label'    => __('Check to Enable Time', 'classic-plumbing-services'),
		'type'     => 'checkbox',
	));	

	$wp_customize->add_setting('classic_plumbing_services_metabox_seperator',array(
		'default' => '|',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('classic_plumbing_services_metabox_seperator',array(
		'type' => 'text',
		'label' => __('Metabox Seperator','classic-plumbing-services'),
		'description' => __('Ex: "/", "|", "-", ...','classic-plumbing-services'),
		'section' => 'classic_plumbing_services_blog_post_settings'
	)); 

    // Add Settings and Controls for Post Layout
	$wp_customize->add_setting('classic_plumbing_services_sidebar_post_layout',array(
		'default' => 'right',
		'sanitize_callback' => 'classic_plumbing_services_sanitize_choices'
	));
	$wp_customize->add_control('classic_plumbing_services_sidebar_post_layout',array(
		'type' => 'radio',
		'label'     => __('Theme Post Sidebar Position', 'classic-plumbing-services'),
		'description'   => __('This option work for blog page, archive page and search page.', 'classic-plumbing-services'),
		'section' => 'classic_plumbing_services_blog_post_settings',
		'choices' => array(
			'full' => __('Full','classic-plumbing-services'),
			'left' => __('Left','classic-plumbing-services'),
			'right' => __('Right','classic-plumbing-services'),
			'three-column' => __('Three Columns','classic-plumbing-services'),
			'four-column' => __('Four Columns','classic-plumbing-services'),
			'grid' => __('Grid Layout','classic-plumbing-services')
     ),
	) );

	$wp_customize->add_setting('classic_plumbing_services_blog_post_description_option',array(
    	'default'   => 'Excerpt Content', 
        'sanitize_callback' => 'classic_plumbing_services_sanitize_choices'
	));
	$wp_customize->add_control('classic_plumbing_services_blog_post_description_option',array(
        'type' => 'radio',
        'label' => __('Post Description Length','classic-plumbing-services'),
        'section' => 'classic_plumbing_services_blog_post_settings',
        'choices' => array(
            'No Content' => __('No Content','classic-plumbing-services'),
            'Excerpt Content' => __('Excerpt Content','classic-plumbing-services'),
            'Full Content' => __('Full Content','classic-plumbing-services'),
        ),
	) );

	$wp_customize->add_setting('classic_plumbing_services_blog_post_thumb',array(
        'sanitize_callback' => 'classic_plumbing_services_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('classic_plumbing_services_blog_post_thumb',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Show / Hide Blog Post Thumbnail', 'classic-plumbing-services'),
        'section'     => 'classic_plumbing_services_blog_post_settings',
    ));

    $wp_customize->add_setting( 'classic_plumbing_services_blog_post_page_image_box_shadow', array(
        'default'              => '0',
        'transport'            => 'refresh',
        'sanitize_callback'    => 'classic_plumbing_services_sanitize_integer'
    ) );
    $wp_customize->add_control(new Classic_Plumbing_Services_Slider_Custom_Control( $wp_customize, 'classic_plumbing_services_blog_post_page_image_box_shadow',array(
		'label'	=> esc_html__('Blog Page Image Box Shadow','classic-plumbing-services'),
		'section'=> 'classic_plumbing_services_blog_post_settings',
		'settings'=>'classic_plumbing_services_blog_post_page_image_box_shadow',
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 100,
        ),
	)));
	
	$wp_customize->add_setting( 'classic_plumbing_services_blog_post_settings_upgraded_features',array(
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('classic_plumbing_services_blog_post_settings_upgraded_features', array(
		'type'=> 'hidden',
		'description' => "<span class='customizer-upgraded-features'>Unlock Premium Customization Features:
			<a target='_blank' href='". esc_url(CLASSIC_PLUMBING_SERVICES_PREMIUM_PAGE) ." '>Upgrade to Pro</a></span>",
		'section' => 'classic_plumbing_services_blog_post_settings'
	));

	//Single Post Settings
	$wp_customize->add_section('classic_plumbing_services_single_post_settings',array(
		'title' => __('Manage Single Post Section', 'classic-plumbing-services'),
		'priority' => null,
		'panel' => 'classic_plumbing_services_panel_area'
	));

	$wp_customize->add_setting( 'classic_plumbing_services_single_page_breadcrumb',array(
		'default' => true,
        'sanitize_callback'	=> 'classic_plumbing_services_sanitize_checkbox',
	));
	$wp_customize->add_control('classic_plumbing_services_single_page_breadcrumb',array(
       'section' => 'classic_plumbing_services_single_post_settings',
	   'label' => __( 'Check To Enable Breadcrumb','classic-plumbing-services' ),
	   'type' => 'checkbox'
    ));	

	$wp_customize->add_setting('classic_plumbing_services_single_post_date',array(
		'default' => true,
		'sanitize_callback'	=> 'classic_plumbing_services_sanitize_checkbox'
	));
	$wp_customize->add_control('classic_plumbing_services_single_post_date',array(
		'type' => 'checkbox',
		'label' => __('Enable / Disable Date ','classic-plumbing-services'),
		'section' => 'classic_plumbing_services_single_post_settings'
	));	

	$wp_customize->add_setting('classic_plumbing_services_single_post_author',array(
		'default' => true,
		'sanitize_callback'	=> 'classic_plumbing_services_sanitize_checkbox'
	));
	$wp_customize->add_control('classic_plumbing_services_single_post_author',array(
		'type' => 'checkbox',
		'label' => __('Enable / Disable Author','classic-plumbing-services'),
		'section' => 'classic_plumbing_services_single_post_settings'
	));

	$wp_customize->add_setting('classic_plumbing_services_single_post_comment',array(
		'default' => true,
		'sanitize_callback'	=> 'classic_plumbing_services_sanitize_checkbox'
	));
	$wp_customize->add_control('classic_plumbing_services_single_post_comment',array(
		'type' => 'checkbox',
		'label' => __('Enable / Disable Comments','classic-plumbing-services'),
		'section' => 'classic_plumbing_services_single_post_settings'
	));	

	$wp_customize->add_setting('classic_plumbing_services_single_post_time',array(
		'default' => true,
		'sanitize_callback'	=> 'classic_plumbing_services_sanitize_checkbox'
	));
	$wp_customize->add_control('classic_plumbing_services_single_post_time',array(
		'type' => 'checkbox',
		'label' => __('Enable / Disable Time','classic-plumbing-services'),
		'section' => 'classic_plumbing_services_single_post_settings'
	));	

	$wp_customize->add_setting('classic_plumbing_services_single_post_metabox_seperator',array(
		'default' => '|',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('classic_plumbing_services_single_post_metabox_seperator',array(
		'type' => 'text',
		'label' => __('Metabox Seperator','classic-plumbing-services'),
		'description' => __('Ex: "/", "|", "-", ...','classic-plumbing-services'),
		'section' => 'classic_plumbing_services_single_post_settings'
	)); 

	$wp_customize->add_setting('classic_plumbing_services_sidebar_single_post_layout',array(
    	'default' => 'right',
    	 'sanitize_callback' => 'classic_plumbing_services_sanitize_choices'
	));
	$wp_customize->add_control('classic_plumbing_services_sidebar_single_post_layout',array(
   		'type' => 'radio',
    	'label'     => __('Single post sidebar layout', 'classic-plumbing-services'),
     	'section' => 'classic_plumbing_services_single_post_settings',
     	'choices' => array(
			'full' => __('Full','classic-plumbing-services'),
			'left' => __('Left','classic-plumbing-services'),
			'right' => __('Right','classic-plumbing-services'),
     ),
	));

	$wp_customize->add_setting( 'classic_plumbing_services_single_post_page_image_box_shadow', array(
        'default'              => '0',
        'transport'            => 'refresh',
        'sanitize_callback'    => 'classic_plumbing_services_sanitize_integer'
    ) );
    $wp_customize->add_control(new Classic_Plumbing_Services_Slider_Custom_Control( $wp_customize, 'classic_plumbing_services_single_post_page_image_box_shadow',array(
		'label'	=> esc_html__('Blog Page Image Box Shadow','classic-plumbing-services'),
		'section'=> 'classic_plumbing_services_single_post_settings',
		'settings'=>'classic_plumbing_services_single_post_page_image_box_shadow',
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 100,
        ),
	)));

	$wp_customize->add_setting( 'classic_plumbing_services_single_post_settings_upgraded_features',array(
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('classic_plumbing_services_single_post_settings_upgraded_features', array(
		'type'=> 'hidden',
		'description' => "<span class='customizer-upgraded-features'>Unlock Premium Customization Features:
			<a target='_blank' href='". esc_url(CLASSIC_PLUMBING_SERVICES_PREMIUM_PAGE) ." '>Upgrade to Pro</a></span>",
		'section' => 'classic_plumbing_services_single_post_settings'
	));

	// 404 Page Settings
	$wp_customize->add_section('classic_plumbing_services_page_not_found', array(
		'title'	=> __('Manage 404 Page Section','classic-plumbing-services'),
		'priority'	=> null,
		'panel' => 'classic_plumbing_services_panel_area',
	));
	
	$wp_customize->add_setting('classic_plumbing_services_page_not_found_heading',array(
		'default'=> __('404 Not Found','classic-plumbing-services'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('classic_plumbing_services_page_not_found_heading',array(
		'label'	=> __('404 Heading','classic-plumbing-services'),
		'section'=> 'classic_plumbing_services_page_not_found',
		'type'=> 'text'
	));

	$wp_customize->add_setting('classic_plumbing_services_page_not_found_content',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('classic_plumbing_services_page_not_found_content',array(
		'label'	=> __('404 Text','classic-plumbing-services'),
		'input_attrs' => array(
			'placeholder' => __( 'Looks like you have taken a wrong turn.....Don\'t worry... it happens to the best of us.', 'classic-plumbing-services' ),
		),
		'section'=> 'classic_plumbing_services_page_not_found',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'classic_plumbing_services_page_not_found_settings_upgraded_features',array(
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('classic_plumbing_services_page_not_found_settings_upgraded_features', array(
		'type'=> 'hidden',
		'description' => "<span class='customizer-upgraded-features'>Unlock Premium Customization Features:
			<a target='_blank' href='". esc_url(CLASSIC_PLUMBING_SERVICES_PREMIUM_PAGE) ." '>Upgrade to Pro</a></span>",
		'section' => 'classic_plumbing_services_page_not_found'
	));

	// Footer Section
	$wp_customize->add_section('classic_plumbing_services_footer', array(
		'title'	=> __('Manage Footer Section','classic-plumbing-services'),
		'description'	=> __('<p class="sec-title">Manage Footer Section</p>','classic-plumbing-services'),
		'priority'	=> null,
		'panel' => 'classic_plumbing_services_panel_area',
	));

	$wp_customize->add_setting('classic_plumbing_services_footer_widget', array(
	    'default' => true,
	    'sanitize_callback' => 'classic_plumbing_services_sanitize_checkbox',
	));
	$wp_customize->add_control('classic_plumbing_services_footer_widget', array(
	    'settings' => 'classic_plumbing_services_footer_widget',
	    'section'   => 'classic_plumbing_services_footer',
	    'label'     => __('Check to Enable Footer Widget', 'classic-plumbing-services'),
	    'type'      => 'checkbox',
	));

	//  footer bg color
	$wp_customize->add_setting('classic_plumbing_services_footerbg_color',array(
		'default' => '',
		'sanitize_callback' => 'classic_plumbing_services_sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'classic_plumbing_services_footerbg_color', array(
		'settings' => 'classic_plumbing_services_footerbg_color',
		'section'   => 'classic_plumbing_services_footer',
		'label' => __('Footer Background Color', 'classic-plumbing-services'),
		'type'      => 'color'
	));

	$wp_customize->add_setting('classic_plumbing_services_footer_bg_image',array(
        'default'   => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'classic_plumbing_services_footer_bg_image',array(
        'label' => __('Footer Background Image','classic-plumbing-services'),
        'section' => 'classic_plumbing_services_footer',
    )));

	$wp_customize->add_setting('classic_plumbing_services_footer_widget_areas',array(
		'default'           => 4,
		'sanitize_callback' => 'classic_plumbing_services_sanitize_choices',
	));
	$wp_customize->add_control('classic_plumbing_services_footer_widget_areas',array(
		'type'        => 'radio',
		'section' => 'classic_plumbing_services_footer',
		'label'       => __('Footer widget area', 'classic-plumbing-services'),
		'choices' => array(
		   '1'     => __('One', 'classic-plumbing-services'),
		   '2'     => __('Two', 'classic-plumbing-services'),
		   '3'     => __('Three', 'classic-plumbing-services'),
		   '4'     => __('Four', 'classic-plumbing-services')
		),
	));

	$wp_customize->add_setting('classic_plumbing_services_copyright_line',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control( 'classic_plumbing_services_copyright_line', array(
	   'section' 	=> 'classic_plumbing_services_footer',
	   'label'	 	=> __('Copyright Line','classic-plumbing-services'),
	   'type'    	=> 'text',
	   'priority' 	=> null,
    ));

	$wp_customize->add_setting('classic_plumbing_services_copyright_link',array(
    	'default' => '',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control( 'classic_plumbing_services_copyright_link', array(
	   'section' 	=> 'classic_plumbing_services_footer',
	   'label'	 	=> __('Copyright Link','classic-plumbing-services'),
	   'type'    	=> 'text',
	   'priority' 	=> null,
    ));

	//  footer coypright color
	$wp_customize->add_setting('classic_plumbing_services_footercoypright_color',array(
		'default' => '',
		'sanitize_callback' => 'classic_plumbing_services_sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'classic_plumbing_services_footercoypright_color', array(
	   'settings' => 'classic_plumbing_services_footercoypright_color',
	   'section'   => 'classic_plumbing_services_footer',
	   'label' => __('Coypright Color', 'classic-plumbing-services'),
	   'type'      => 'color'
	));

	//  footer title color
	$wp_customize->add_setting('classic_plumbing_services_footertitle_color',array(
		'default' => '',
		'sanitize_callback' => 'classic_plumbing_services_sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'classic_plumbing_services_footertitle_color', array(
	   'settings' => 'classic_plumbing_services_footertitle_color',
	   'section'   => 'classic_plumbing_services_footer',
	   'label' => __('Title Color', 'classic-plumbing-services'),
	   'type'      => 'color'
	));

	//  footer description color
	$wp_customize->add_setting('classic_plumbing_services_footerdescription_color',array(
		'default' => '',
		'sanitize_callback' => 'classic_plumbing_services_sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'classic_plumbing_services_footerdescription_color', array(
	   'settings' => 'classic_plumbing_services_footerdescription_color',
	   'section'   => 'classic_plumbing_services_footer',
	   'label' => __('Description Color', 'classic-plumbing-services'),
	   'type'      => 'color'
	));

	//  footer list color
	$wp_customize->add_setting('classic_plumbing_services_footerlist_color',array(
		'default' => '',
		'sanitize_callback' => 'classic_plumbing_services_sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'classic_plumbing_services_footerlist_color', array(
	   'settings' => 'classic_plumbing_services_footerlist_color',
	   'section'   => 'classic_plumbing_services_footer',
	   'label' => __('List Color', 'classic-plumbing-services'),
	   'type'      => 'color'
	));

	$wp_customize->add_setting('classic_plumbing_services_scroll_hide', array(
        'default' => true,
        'sanitize_callback' => 'classic_plumbing_services_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'classic_plumbing_services_scroll_hide',array(
        'label'          => __( 'Check To Show Scroll To Top', 'classic-plumbing-services' ),
        'section'        => 'classic_plumbing_services_footer',
        'settings'       => 'classic_plumbing_services_scroll_hide',
        'type'           => 'checkbox',
    )));

	$wp_customize->add_setting('classic_plumbing_services_scroll_position',array(
        'default' => 'Right',
        'sanitize_callback' => 'classic_plumbing_services_sanitize_choices'
    ));
    $wp_customize->add_control('classic_plumbing_services_scroll_position',array(
        'type' => 'radio',
        'section' => 'classic_plumbing_services_footer',
        'label'	 	=> __('Scroll To Top Positions','classic-plumbing-services'),
        'choices' => array(
            'Right' => __('Right','classic-plumbing-services'),
            'Left' => __('Left','classic-plumbing-services'),
            'Center' => __('Center','classic-plumbing-services')
        ),
    ) );

	$wp_customize->add_setting('classic_plumbing_services_scroll_text',array(
		'default'	=> __('TOP','classic-plumbing-services'),
		'sanitize_callback'	=> 'sanitize_text_field',
	));	
	$wp_customize->add_control('classic_plumbing_services_scroll_text',array(
		'label'	=> __('Scroll To Top Button Text','classic-plumbing-services'),
		'section'	=> 'classic_plumbing_services_footer',
		'type'		=> 'text'
	));

	$wp_customize->add_setting( 'classic_plumbing_services_scroll_top_shape', array(
		'default'           => 'circle',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	
	$wp_customize->add_control( 'classic_plumbing_services_scroll_top_shape', array(
		'label'    => __( 'Scroll to Top Button Shape', 'classic-plumbing-services' ),
		'section'  => 'classic_plumbing_services_footer',
		'settings' => 'classic_plumbing_services_scroll_top_shape',
		'type'     => 'radio',
		'choices'  => array(
			'box'        => __( 'Box', 'classic-plumbing-services' ),
			'curved' => __( 'Curved', 'classic-plumbing-services'),
			'circle'     => __( 'Circle', 'classic-plumbing-services' ),
		),
	) );

	$wp_customize->add_setting( 'classic_plumbing_services_footer_settings_upgraded_features',array(
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('classic_plumbing_services_footer_settings_upgraded_features', array(
		'type'=> 'hidden',
		'description' => "<span class='customizer-upgraded-features'>Unlock Premium Customization Features:
			<a target='_blank' href='". esc_url(CLASSIC_PLUMBING_SERVICES_PREMIUM_PAGE) ." '>Upgrade to Pro</a></span>",
		'section' => 'classic_plumbing_services_footer'
	));
    
	// Google Fonts
	$wp_customize->add_section( 'classic_plumbing_services_google_fonts_section', array(
		'title'       => __( 'Google Fonts', 'classic-plumbing-services' ),
		'priority'    => 24,
	) );

	$font_choices = array(
		'Kaushan Script:' => 'Kaushan Script',
		'Emilys Candy:' => 'Emilys Candy',
		'Poppins:0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900' => 'Poppins',
		'Source Sans Pro:400,700,400italic,700italic' => 'Source Sans Pro',
		'Open Sans:400italic,700italic,400,700' => 'Open Sans',
		'Oswald:400,700' => 'Oswald',
		'Playfair Display:400,700,400italic' => 'Playfair Display',
		'Montserrat:400,700' => 'Montserrat',
		'Raleway:400,700' => 'Raleway',
		'Droid Sans:400,700' => 'Droid Sans',
		'Lato:400,700,400italic,700italic' => 'Lato',
		'Arvo:400,700,400italic,700italic' => 'Arvo',
		'Lora:400,700,400italic,700italic' => 'Lora',
		'Merriweather:400,300italic,300,400italic,700,700italic' => 'Merriweather',
		'Oxygen:400,300,700' => 'Oxygen',
		'PT Serif:400,700' => 'PT Serif',
		'PT Sans:400,700,400italic,700italic' => 'PT Sans',
		'PT Sans Narrow:400,700' => 'PT Sans Narrow',
		'Cabin:400,700,400italic' => 'Cabin',
		'Fjalla One:400' => 'Fjalla One',
		'Francois One:400' => 'Francois One',
		'Josefin Sans:400,300,600,700' => 'Josefin Sans',
		'Libre Baskerville:400,400italic,700' => 'Libre Baskerville',
		'Arimo:400,700,400italic,700italic' => 'Arimo',
		'Ubuntu:400,700,400italic,700italic' => 'Ubuntu',
		'Bitter:400,700,400italic' => 'Bitter',
		'Droid Serif:400,700,400italic,700italic' => 'Droid Serif',
		'Roboto:400,400italic,700,700italic' => 'Roboto',
		'Open Sans Condensed:700,300italic,300' => 'Open Sans Condensed',
		'Roboto Condensed:400italic,700italic,400,700' => 'Roboto Condensed',
		'Roboto Slab:400,700' => 'Roboto Slab',
		'Yanone Kaffeesatz:400,700' => 'Yanone Kaffeesatz',
		'Rokkitt:400' => 'Rokkitt',
	);

	$wp_customize->add_setting( 'classic_plumbing_services_headings_fonts', array(
		'sanitize_callback' => 'classic_plumbing_services_sanitize_fonts',
	));
	$wp_customize->add_control( 'classic_plumbing_services_headings_fonts', array(
		'type' => 'select',
		'description' => __('Select your desired font for the headings.', 'classic-plumbing-services'),
		'section' => 'classic_plumbing_services_google_fonts_section',
		'choices' => $font_choices
	));

	$wp_customize->add_setting( 'classic_plumbing_services_body_fonts', array(
		'sanitize_callback' => 'classic_plumbing_services_sanitize_fonts'
	));
	$wp_customize->add_control( 'classic_plumbing_services_body_fonts', array(
		'type' => 'select',
		'description' => __( 'Select your desired font for the body.', 'classic-plumbing-services' ),
		'section' => 'classic_plumbing_services_google_fonts_section',
		'choices' => $font_choices
	));
  
}
add_action( 'customize_register', 'classic_plumbing_services_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function classic_plumbing_services_customize_preview_js() {
	wp_enqueue_script( 'classic_plumbing_services_customizer', esc_url(get_template_directory_uri()) . '/js/customize-preview.js', array( 'customize-preview' ), '20161510', true );
}
add_action( 'customize_preview_init', 'classic_plumbing_services_customize_preview_js' );
