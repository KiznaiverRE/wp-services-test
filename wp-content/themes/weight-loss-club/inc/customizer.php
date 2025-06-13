<?php
/**
 * Weight Loss Club Theme Customizer
 *
 * @package Weight Loss Club
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function weight_loss_club_customize_register( $wp_customize ) {

	function weight_loss_club_sanitize_dropdown_pages( $page_id, $setting ) {
  		$page_id = absint( $page_id );
  		return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
	}

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

	wp_enqueue_style('weight-loss-club-customize-controls', trailingslashit(esc_url(get_template_directory_uri())).'/css/customize-controls.css');

	// Enable / Disable Logo
	$wp_customize->add_setting('weight_loss_club_logo_enable',array(
		'default' => true,
		'sanitize_callback' => 'weight_loss_club_sanitize_checkbox',
	));
	$wp_customize->add_control( 'weight_loss_club_logo_enable', array(
		'settings' => 'weight_loss_club_logo_enable',
		'section'   => 'title_tagline',
		'label'     => __('Enable Logo','weight-loss-club'),
		'type'      => 'checkbox'
	));

	//Logo
    $wp_customize->add_setting('weight_loss_club_logo_width', array(
        'default' => 200,
        'transport' => 'refresh',
        'sanitize_callback' => 'weight_loss_club_sanitize_integer'
    ));
    $wp_customize->add_control(new Weight_Loss_Club_Slider_Custom_Control($wp_customize, 'weight_loss_club_logo_width', array(
    	'label'          => __( 'Logo Width', 'weight-loss-club'),
        'section' => 'title_tagline',
        'settings' => 'weight_loss_club_logo_width',
        'input_attrs' => array(
            'step' => 1,
            'min' => 0,
            'max' => 300,
        ),
    )));

	// color site title
	$wp_customize->add_setting('weight_loss_club_sitetitle_color',array(
		'default' => '',
		'sanitize_callback' => 'weight_loss_club_sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'weight_loss_club_sitetitle_color', array(
	   'settings' => 'weight_loss_club_sitetitle_color',
	   'section'   => 'title_tagline',
	   'label' => __('Site Title Color', 'weight-loss-club'),
	   'type'      => 'color'
	));

	$wp_customize->add_setting('weight_loss_club_title_enable',array(
		'default' => false,
		'sanitize_callback' => 'weight_loss_club_sanitize_checkbox',
	));
	$wp_customize->add_control( 'weight_loss_club_title_enable', array(
	   'settings' => 'weight_loss_club_title_enable',
	   'section'   => 'title_tagline',
	   'label'     => __('Enable Site Title','weight-loss-club'),
	   'type'      => 'checkbox'
	));

	// color site tagline
	$wp_customize->add_setting('weight_loss_club_sitetagline_color',array(
		'default' => '',
		'sanitize_callback' => 'weight_loss_club_sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'weight_loss_club_sitetagline_color', array(
	   'settings' => 'weight_loss_club_sitetagline_color',
	   'section'   => 'title_tagline',
	   'label' => __('Site Tagline Color', 'weight-loss-club'),
	   'type'      => 'color'
	));

	$wp_customize->add_setting('weight_loss_club_tagline_enable',array(
		'default' => false,
		'sanitize_callback' => 'weight_loss_club_sanitize_checkbox',
	));
	$wp_customize->add_control( 'weight_loss_club_tagline_enable', array(
	   'settings' => 'weight_loss_club_tagline_enable',
	   'section'   => 'title_tagline',
	   'label'     => __('Enable Site Tagline','weight-loss-club'),
	   'type'      => 'checkbox'
	));

	// woocommerce section
	$wp_customize->add_section('weight_loss_club_woocommerce_page_settings', array(
		'title'    => __('WooCommerce Page Settings', 'weight-loss-club'),
		'priority' => null,
		'panel'    => 'woocommerce',
	));

	$wp_customize->add_setting('weight_loss_club_shop_page_sidebar',array(
		'default' => false,
		'sanitize_callback'	=> 'weight_loss_club_sanitize_checkbox'
	 ));
	 $wp_customize->add_control('weight_loss_club_shop_page_sidebar',array(
		'type' => 'checkbox',
		'label' => __(' Check To Enable Shop page sidebar','weight-loss-club'),
		'section' => 'weight_loss_club_woocommerce_page_settings',
	 ));

    // shop page sidebar alignment
    $wp_customize->add_setting('weight_loss_club_shop_page_sidebar_position', array(
		'default'           => 'Right Sidebar',
		'sanitize_callback' => 'weight_loss_club_sanitize_choices',
	));
	$wp_customize->add_control('weight_loss_club_shop_page_sidebar_position',array(
		'type'           => 'radio',
		'label'          => __('Shop Page Sidebar', 'weight-loss-club'),
		'section'        => 'weight_loss_club_woocommerce_page_settings',
		'choices'        => array(
			'Left Sidebar'  => __('Left Sidebar', 'weight-loss-club'),
			'Right Sidebar' => __('Right Sidebar', 'weight-loss-club'),
		),
	));	 

	$wp_customize->add_setting('weight_loss_club_wooproducts_nav',array(
		'default' => 'Yes',
		'sanitize_callback'	=> 'weight_loss_club_sanitize_choices'
	 ));
	 $wp_customize->add_control('weight_loss_club_wooproducts_nav',array(
		'type' => 'select',
		'label' => __('Shop Page Products Navigation','weight-loss-club'),
		'choices' => array(
			 'Yes' => __('Yes','weight-loss-club'),
			 'No' => __('No','weight-loss-club'),
		 ),
		'section' => 'weight_loss_club_woocommerce_page_settings',
	 ));

	 $wp_customize->add_setting( 'weight_loss_club_single_page_sidebar',array(
		'default' => false,
		'sanitize_callback'	=> 'weight_loss_club_sanitize_checkbox'
    ) );
    $wp_customize->add_control('weight_loss_club_single_page_sidebar',array(
    	'type' => 'checkbox',
       	'label' => __('Check To Enable Single Product Page Sidebar','weight-loss-club'),
		'section' => 'weight_loss_club_woocommerce_page_settings'
    ));

	// single product page sidebar alignment
    $wp_customize->add_setting('weight_loss_club_single_product_page_layout', array(
		'default'           => 'Right Sidebar',
		'sanitize_callback' => 'weight_loss_club_sanitize_choices',
	));
	$wp_customize->add_control('weight_loss_club_single_product_page_layout',array(
		'type'           => 'radio',
		'label'          => __('Single product Page Sidebar', 'weight-loss-club'),
		'section'        => 'weight_loss_club_woocommerce_page_settings',
		'choices'        => array(
			'Left Sidebar'  => __('Left Sidebar', 'weight-loss-club'),
			'Right Sidebar' => __('Right Sidebar', 'weight-loss-club'),
		),
	));

	$wp_customize->add_setting('weight_loss_club_related_product_enable',array(
		'default' => true,
		'sanitize_callback'	=> 'weight_loss_club_sanitize_checkbox'
	));
	$wp_customize->add_control('weight_loss_club_related_product_enable',array(
		'type' => 'checkbox',
		'label' => __('Check To Enable Related product','weight-loss-club'),
		'section' => 'weight_loss_club_woocommerce_page_settings',
	));

	$wp_customize->add_setting( 'weight_loss_club_woo_product_img_border_radius', array(
        'default'              => '0',
        'transport'            => 'refresh',
        'sanitize_callback'    => 'weight_loss_club_sanitize_integer'
    ) );
    $wp_customize->add_control(new Weight_Loss_Club_Slider_Custom_Control( $wp_customize, 'weight_loss_club_woo_product_img_border_radius',array(
		'label'	=> esc_html__('Woo Product Img Border Radius','weight-loss-club'),
		'section'=> 'weight_loss_club_woocommerce_page_settings',
		'settings'=>'weight_loss_club_woo_product_img_border_radius',
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 100,
        ),
	)));

	// Add a setting for number of products per row
    $wp_customize->add_setting('weight_loss_club_products_per_row', array(
	    'default'   => '4',
	    'transport' => 'refresh',
	    'sanitize_callback' => 'weight_loss_club_sanitize_integer'  
    ));

   	$wp_customize->add_control('weight_loss_club_products_per_row', array(
	   'label'    => __('Products Per Row', 'weight-loss-club'),
	   'section'  => 'weight_loss_club_woocommerce_page_settings',
	   'settings' => 'weight_loss_club_products_per_row',
	   'type'     => 'select',
	   'choices'  => array(
			'2' => '2',
			'3' => '3',
			'4' => '4',
	  ),
   	) );
   
   	// Add a setting for the number of products per page
	$wp_customize->add_setting('weight_loss_club_products_per_page', array(
		'default'   => '8',
		'transport' => 'refresh',
		'sanitize_callback' => 'weight_loss_club_sanitize_integer'
	));

	$wp_customize->add_control('weight_loss_club_products_per_page', array(
		'label'    => __('Products Per Page', 'weight-loss-club'),
		'section'  => 'weight_loss_club_woocommerce_page_settings',
		'settings' => 'weight_loss_club_products_per_page',
		'type'     => 'number',
		'input_attrs' => array(
			'min'  => 1,
			'step' => 1,
		),
	));

	//Theme Options
	$wp_customize->add_panel( 'weight_loss_club_panel_area', array(
		'priority' => 10,
		'capability' => 'edit_theme_options',
		'title' => __( 'Theme Options Panel', 'weight-loss-club' ),
	) );

	//Site Layout Section
	$wp_customize->add_section('weight_loss_club_site_layoutsec',array(
		'title'	=> __('Manage Site Layout Section ','weight-loss-club'),
		'description' => __('<p class="sec-title">Manage Site Layout Section</p>','weight-loss-club'),
		'priority'	=> 1,
		'panel' => 'weight_loss_club_panel_area',
	));

	$wp_customize->add_setting('weight_loss_club_preloader',array(
		'default' => false,
		'sanitize_callback' => 'weight_loss_club_sanitize_checkbox',
	));
	$wp_customize->add_control( 'weight_loss_club_preloader', array(
	   'section'   => 'weight_loss_club_site_layoutsec',
	   'label'	=> __('Check to Show preloader','weight-loss-club'),
	   'type'      => 'checkbox'
 	));	

	$wp_customize->add_setting('weight_loss_club_preloader_bg_image',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'weight_loss_club_preloader_bg_image',array(
        'section' => 'weight_loss_club_site_layoutsec',
		'label' => __('Preloader Background Image','weight-loss-club'),
	)));

	$wp_customize->add_setting( 'weight_loss_club_theme_page_breadcrumb',array(
		'default' => false,
        'sanitize_callback'	=> 'weight_loss_club_sanitize_checkbox',
	) );
	$wp_customize->add_control('weight_loss_club_theme_page_breadcrumb',array(
       'section' => 'weight_loss_club_site_layoutsec',
	   'label' => __( 'Check To Enable Theme Page Breadcrumb','weight-loss-club' ),
	   'type' => 'checkbox'
    ));		

	$wp_customize->add_setting('weight_loss_club_box_layout',array(
		'default' => false,
		'sanitize_callback' => 'weight_loss_club_sanitize_checkbox',
	));
	$wp_customize->add_control( 'weight_loss_club_box_layout', array(
	   'section'   => 'weight_loss_club_site_layoutsec',
	   'label'	=> __('Check to Show Box Layout','weight-loss-club'),
	   'type'      => 'checkbox'
 	));

	// Add Settings and Controls for Page Layout
    $wp_customize->add_setting('weight_loss_club_sidebar_page_layout',array(
		'default' => 'full',
	 	'sanitize_callback' => 'weight_loss_club_sanitize_choices'
	));
	$wp_customize->add_control('weight_loss_club_sidebar_page_layout',array(
		'type' => 'radio',
		'label'     => __('Theme Page Sidebar Position', 'weight-loss-club'),
		'section' => 'weight_loss_club_site_layoutsec',
		'choices' => array(
			'full' => __('Full','weight-loss-club'),
			'left' => __('Left','weight-loss-club'),
			'right' => __('Right','weight-loss-club'),
		),
	));

	$wp_customize->add_setting( 'weight_loss_club_site_layoutsec_settings_upgraded_features',array(
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('weight_loss_club_site_layoutsec_settings_upgraded_features', array(
		'type'=> 'hidden',
		'description' => "<span class='customizer-upgraded-features'>Unlock Premium Customization Features:
			<a target='_blank' href='". esc_url(WEIGHT_LOSS_CLUB_PREMIUM_PAGE) ." '>Upgrade to Pro</a></span>",
		'section' => 'weight_loss_club_site_layoutsec'
	));

	//Global Color
	$wp_customize->add_section('weight_loss_club_global_color', array(
		'title'    => __('Manage Global Color Section', 'weight-loss-club'),
		'panel'    => 'weight_loss_club_panel_area',
	));

	$wp_customize->add_setting('weight_loss_club_first_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'weight_loss_club_first_color', array(
		'label'    => __('Theme Color', 'weight-loss-club'),
		'section'  => 'weight_loss_club_global_color',
		'settings' => 'weight_loss_club_first_color',
	)));

	$wp_customize->add_setting('weight_loss_club_second_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'weight_loss_club_second_color', array(
		'label'    => __('Theme Color', 'weight-loss-club'),
		'section'  => 'weight_loss_club_global_color',
		'settings' => 'weight_loss_club_second_color',
	)));

	$wp_customize->add_setting( 'weight_loss_club_global_color_settings_upgraded_features',array(
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('weight_loss_club_global_color_settings_upgraded_features', array(
		'type'=> 'hidden',
		'description' => "<span class='customizer-upgraded-features'>Unlock Premium Customization Features:
			<a target='_blank' href='". esc_url(WEIGHT_LOSS_CLUB_PREMIUM_PAGE) ." '>Upgrade to Pro</a></span>",
		'section' => 'weight_loss_club_global_color'
	));
	
	// Header Section
	$wp_customize->add_section('weight_loss_club_topbar_section',array(
	    'title' => __('Manage Header Section','weight-loss-club'),
	    'description' => __('<p class="sec-title">Manage Header Section</p>', 'weight-loss-club'),
	    'priority'  => null,
	    'panel' => 'weight_loss_club_panel_area',
	));	

	$wp_customize->add_setting('weight_loss_club_stickyheader',array(
		'default' => false,
		'sanitize_callback' => 'weight_loss_club_sanitize_checkbox',
	));
	$wp_customize->add_control( 'weight_loss_club_stickyheader', array(
	   'section'   => 'weight_loss_club_topbar_section',
	   'label'	=> __('Check To Show Sticky Header','weight-loss-club'),
	   'type'      => 'checkbox'
 	));

	$wp_customize->add_setting( 'weight_loss_club_site_topbar_settings_upgraded_features',array(
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('weight_loss_club_site_topbar_settings_upgraded_features', array(
		'type'=> 'hidden',
		'description' => "<span class='customizer-upgraded-features'>Unlock Premium Customization Features:
			<a target='_blank' href='". esc_url(WEIGHT_LOSS_CLUB_PREMIUM_PAGE) ." '>Upgrade to Pro</a></span>",
		'section' => 'weight_loss_club_topbar_section'
	));

	// Slider Section
	$wp_customize->add_section('weight_loss_club_slider_section',array(
	    'title' => __('Manage Slider Section','weight-loss-club'),
	    'priority'  => null,
	    'description'	=> __('<p class="sec-title">Manage Slider Section</p> Select Page from the Dropdowns for banner, Also use the given image dimension (1920 x 700).','weight-loss-club'),
	    'panel' => 'weight_loss_club_panel_area',
	));	

	$wp_customize->add_setting('weight_loss_club_slider',array(
		'default' => false,
		'sanitize_callback' => 'weight_loss_club_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'weight_loss_club_slider', array(
		'settings' => 'weight_loss_club_slider',
		'section'   => 'weight_loss_club_slider_section',
		'label'     => __('Check To Enable This Section','weight-loss-club'),
		'type'      => 'checkbox'
	));

	$weight_loss_club_categories = get_categories();
	$weight_loss_club_cat_post = array();
	$weight_loss_club_cat_post['0'] = 'Select';

	foreach ($weight_loss_club_categories as $weight_loss_club_category) {
	    $weight_loss_club_cat_post[$weight_loss_club_category->slug] = $weight_loss_club_category->name;
	}

	$wp_customize->add_setting('weight_loss_club_slider_cat', array(
	    'default' => '0',
	    'sanitize_callback' => 'weight_loss_club_sanitize_choices',
	));

	$wp_customize->add_control('weight_loss_club_slider_cat', array(
	    'type'    => 'select',
	    'choices' => $weight_loss_club_cat_post,
	    'label'   => __('Select Category to display Latest Post', 'weight-loss-club'),
	    'section' => 'weight_loss_club_slider_section',
	));

	$wp_customize->add_setting('weight_loss_club_slider_sub_title', array(
	    'default'           => '',
	    'sanitize_callback' => 'sanitize_text_field',
	    'capability'        => 'edit_theme_options',
	));
	$wp_customize->add_control('weight_loss_club_slider_sub_title', array(
	    'settings' => 'weight_loss_club_slider_sub_title',
	    'section'  => 'weight_loss_club_slider_section',
	    'label'    => __('Add Sub-Title', 'weight-loss-club'),
	    'type'     => 'text',
	));

	$wp_customize->add_setting('weight_loss_club_button_text',array(
		'default' => 'READ MORE',
		'sanitize_callback' => 'sanitize_text_field',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'weight_loss_club_button_text', array(
	   'settings' => 'weight_loss_club_button_text',
	   'section'   => 'weight_loss_club_slider_section',
	   'label' => __('Add Button Text', 'weight-loss-club'),
	   'type'      => 'text'
	));

	$wp_customize->add_setting('weight_loss_club_button_link_slider',array(
        'default'=> '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('weight_loss_club_button_link_slider',array(
        'label' => esc_html__('Add Button Link','weight-loss-club'),
        'section'=> 'weight_loss_club_slider_section',
        'type'=> 'url'
    ));

    $wp_customize->add_setting('weight_loss_club_banner_background_img',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'weight_loss_club_banner_background_img',array(
	    'label' => __('Select Banner Background Image','weight-loss-club'),
	    'description'	=> __('Use the given image dimension (1920px x 700px).','weight-loss-club'),
	    'section' => 'weight_loss_club_slider_section'
	)));

	$wp_customize->add_setting( 'weight_loss_club_site_slider_settings_upgraded_features',array(
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('weight_loss_club_site_slider_settings_upgraded_features', array(
		'type'=> 'hidden',
		'description' => "<span class='customizer-upgraded-features'>Unlock Premium Customization Features:
			<a target='_blank' href='". esc_url(WEIGHT_LOSS_CLUB_PREMIUM_PAGE) ." '>Upgrade to Pro</a></span>",
		'section' => 'weight_loss_club_slider_section'
	));

	// Trainers Section
	$wp_customize->add_section('weight_loss_club_trainers_section', array(
	    'title'       => __('Manage Trainers Section', 'weight-loss-club'),
	    'description' => __('<p class="sec-title">Manage Trainers Section</p>', 'weight-loss-club'),
	    'priority'    => null,
	    'panel'       => 'weight_loss_club_panel_area',
	));

	$wp_customize->add_setting('weight_loss_club_disabled_trainers_section', array(
	    'default'           => false,
	    'sanitize_callback' => 'weight_loss_club_sanitize_checkbox',
	    'capability'        => 'edit_theme_options',
	));
	$wp_customize->add_control('weight_loss_club_disabled_trainers_section', array(
	    'settings' => 'weight_loss_club_disabled_trainers_section',
	    'section'  => 'weight_loss_club_trainers_section',
	    'label'    => __('Check To Enable Section', 'weight-loss-club'),
	    'type'     => 'checkbox',
	));

	$wp_customize->add_setting('weight_loss_club_trainers_title', array(
	    'default'           => '',
	    'sanitize_callback' => 'sanitize_text_field',
	    'capability'        => 'edit_theme_options',
	));
	$wp_customize->add_control('weight_loss_club_trainers_title', array(
	    'settings' => 'weight_loss_club_trainers_title',
	    'section'  => 'weight_loss_club_trainers_section',
	    'label'    => __('Add Trainers Title', 'weight-loss-club'),
	    'type'     => 'text',
	));

	$wp_customize->add_setting('weight_loss_club_video_button_url',array(
        'default'=> '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('weight_loss_club_video_button_url',array(
        'label' => esc_html__('Add Video Link','weight-loss-club'),
        'description'	=> __('Add embed link','weight-loss-club'),
        'section'=> 'weight_loss_club_trainers_section',
        'type'=> 'url'
    ));

	$weight_loss_club_categories = get_categories();
	$weight_loss_club_trainer_cat_post = array();
	$weight_loss_club_trainer_cat_post['0'] = 'Select';

	foreach ($weight_loss_club_categories as $weight_loss_club_category) {
	    $weight_loss_club_trainer_cat_post[$weight_loss_club_category->slug] = $weight_loss_club_category->name;
	}

	$wp_customize->add_setting('weight_loss_club_trainer_cat', array(
	    'default' => '0',
	    'sanitize_callback' => 'weight_loss_club_sanitize_choices',
	));
	$wp_customize->add_control('weight_loss_club_trainer_cat', array(
	    'type'    => 'select',
	    'choices' => $weight_loss_club_trainer_cat_post,
	    'label'   => __('Select Category to display Post', 'weight-loss-club'),
	    'section' => 'weight_loss_club_trainers_section',
	));

	$wp_customize->add_setting( 'weight_loss_club_site_trainers_settings_upgraded_features',array(
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('weight_loss_club_site_trainers_settings_upgraded_features', array(
		'type'=> 'hidden',
		'description' => "<span class='customizer-upgraded-features'>Unlock Premium Customization Features:
			<a target='_blank' href='". esc_url(WEIGHT_LOSS_CLUB_PREMIUM_PAGE) ." '>Upgrade to Pro</a></span>",
		'section' => 'weight_loss_club_trainers_section'
	));

	//Blog post
	$wp_customize->add_section('weight_loss_club_blog_post_settings',array(
        'title' => __('Manage Post Section', 'weight-loss-club'),
        'priority' => null,
        'panel' => 'weight_loss_club_panel_area'
    ) );

	$wp_customize->add_setting('weight_loss_club_metafields_date', array(
	    'default' => true,
	    'sanitize_callback' => 'weight_loss_club_sanitize_checkbox',
	));
	$wp_customize->add_control('weight_loss_club_metafields_date', array(
	    'settings' => 'weight_loss_club_metafields_date', 
	    'section'   => 'weight_loss_club_blog_post_settings',
	    'label'     => __('Check to Enable Date', 'weight-loss-club'),
	    'type'      => 'checkbox',
	));

	$wp_customize->add_setting('weight_loss_club_metafields_comments', array(
		'default' => true,
		'sanitize_callback' => 'weight_loss_club_sanitize_checkbox',
	));	
	$wp_customize->add_control('weight_loss_club_metafields_comments', array(
		'settings' => 'weight_loss_club_metafields_comments',
		'section'  => 'weight_loss_club_blog_post_settings',
		'label'    => __('Check to Enable Comments', 'weight-loss-club'),
		'type'     => 'checkbox',
	));

	$wp_customize->add_setting('weight_loss_club_metafields_author', array(
		'default' => true,
		'sanitize_callback' => 'weight_loss_club_sanitize_checkbox',
	));
	$wp_customize->add_control('weight_loss_club_metafields_author', array(
		'settings' => 'weight_loss_club_metafields_author',
		'section'  => 'weight_loss_club_blog_post_settings',
		'label'    => __('Check to Enable Author', 'weight-loss-club'),
		'type'     => 'checkbox',
	));		

	$wp_customize->add_setting('weight_loss_club_metafields_time', array(
		'default' => true,
		'sanitize_callback' => 'weight_loss_club_sanitize_checkbox',
	));
	$wp_customize->add_control('weight_loss_club_metafields_time', array(
		'settings' => 'weight_loss_club_metafields_time',
		'section'  => 'weight_loss_club_blog_post_settings',
		'label'    => __('Check to Enable Time', 'weight-loss-club'),
		'type'     => 'checkbox',
	));	

	$wp_customize->add_setting('weight_loss_club_metabox_seperator',array(
		'default' => '|',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('weight_loss_club_metabox_seperator',array(
		'type' => 'text',
		'label' => __('Metabox Seperator','weight-loss-club'),
		'description' => __('Ex: "/", "|", "-", ...','weight-loss-club'),
		'section' => 'weight_loss_club_blog_post_settings'
	)); 

    // Add Settings and Controls for Post Layout
	$wp_customize->add_setting('weight_loss_club_sidebar_post_layout',array(
		'default' => 'right',
		'sanitize_callback' => 'weight_loss_club_sanitize_choices'
	));
	$wp_customize->add_control('weight_loss_club_sidebar_post_layout',array(
		'type' => 'radio',
		'label'     => __('Theme Post Sidebar Position', 'weight-loss-club'),
		'description'   => __('This option work for blog page, archive page and search page.', 'weight-loss-club'),
		'section' => 'weight_loss_club_blog_post_settings',
		'choices' => array(
			'full' => __('Full','weight-loss-club'),
			'left' => __('Left','weight-loss-club'),
			'right' => __('Right','weight-loss-club'),
			'three-column' => __('Three Columns','weight-loss-club'),
			'four-column' => __('Four Columns','weight-loss-club'),
			'grid' => __('Grid Layout','weight-loss-club')
     ),
	) );

	$wp_customize->add_setting('weight_loss_club_blog_post_description_option',array(
    	'default'   => 'Excerpt Content', 
        'sanitize_callback' => 'weight_loss_club_sanitize_choices'
	));
	$wp_customize->add_control('weight_loss_club_blog_post_description_option',array(
        'type' => 'radio',
        'label' => __('Post Description Length','weight-loss-club'),
        'section' => 'weight_loss_club_blog_post_settings',
        'choices' => array(
            'No Content' => __('No Content','weight-loss-club'),
            'Excerpt Content' => __('Excerpt Content','weight-loss-club'),
            'Full Content' => __('Full Content','weight-loss-club'),
        ),
	) );

	$wp_customize->add_setting('weight_loss_club_blog_post_thumb',array(
        'sanitize_callback' => 'weight_loss_club_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('weight_loss_club_blog_post_thumb',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Show / Hide Blog Post Thumbnail', 'weight-loss-club'),
        'section'     => 'weight_loss_club_blog_post_settings',
    ));

    $wp_customize->add_setting( 'weight_loss_club_blog_post_page_image_box_shadow', array(
        'default'              => '0',
        'transport'            => 'refresh',
        'sanitize_callback'    => 'weight_loss_club_sanitize_integer'
    ) );
    $wp_customize->add_control(new Weight_Loss_Club_Slider_Custom_Control( $wp_customize, 'weight_loss_club_blog_post_page_image_box_shadow',array(
		'label'	=> esc_html__('Blog Page Image Box Shadow','weight-loss-club'),
		'section'=> 'weight_loss_club_blog_post_settings',
		'settings'=>'weight_loss_club_blog_post_page_image_box_shadow',
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 100,
        ),
	)));

	$wp_customize->add_setting( 'weight_loss_club_site_blog_post_settings_upgraded_features',array(
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('weight_loss_club_site_blog_post_settings_upgraded_features', array(
		'type'=> 'hidden',
		'description' => "<span class='customizer-upgraded-features'>Unlock Premium Customization Features:
			<a target='_blank' href='". esc_url(WEIGHT_LOSS_CLUB_PREMIUM_PAGE) ." '>Upgrade to Pro</a></span>",
		'section' => 'weight_loss_club_blog_post_settings'
	));

	//Single Post Settings
	$wp_customize->add_section('weight_loss_club_single_post_settings',array(
		'title' => __('Manage Single Post Section', 'weight-loss-club'),
		'priority' => null,
		'panel' => 'weight_loss_club_panel_area'
	));

	$wp_customize->add_setting( 'weight_loss_club_single_page_breadcrumb',array(
		'default' => true,
        'sanitize_callback'	=> 'weight_loss_club_sanitize_checkbox',
	));
	$wp_customize->add_control('weight_loss_club_single_page_breadcrumb',array(
       'section' => 'weight_loss_club_single_post_settings',
	   'label' => __( 'Check To Enable Breadcrumb','weight-loss-club' ),
	   'type' => 'checkbox'
    ));	

	$wp_customize->add_setting('weight_loss_club_single_post_date',array(
		'default' => true,
		'sanitize_callback'	=> 'weight_loss_club_sanitize_checkbox'
	));
	$wp_customize->add_control('weight_loss_club_single_post_date',array(
		'type' => 'checkbox',
		'label' => __('Enable / Disable Date ','weight-loss-club'),
		'section' => 'weight_loss_club_single_post_settings'
	));	

	$wp_customize->add_setting('weight_loss_club_single_post_author',array(
		'default' => true,
		'sanitize_callback'	=> 'weight_loss_club_sanitize_checkbox'
	));
	$wp_customize->add_control('weight_loss_club_single_post_author',array(
		'type' => 'checkbox',
		'label' => __('Enable / Disable Author','weight-loss-club'),
		'section' => 'weight_loss_club_single_post_settings'
	));

	$wp_customize->add_setting('weight_loss_club_single_post_comment',array(
		'default' => true,
		'sanitize_callback'	=> 'weight_loss_club_sanitize_checkbox'
	));
	$wp_customize->add_control('weight_loss_club_single_post_comment',array(
		'type' => 'checkbox',
		'label' => __('Enable / Disable Comments','weight-loss-club'),
		'section' => 'weight_loss_club_single_post_settings'
	));	

	$wp_customize->add_setting('weight_loss_club_single_post_time',array(
		'default' => true,
		'sanitize_callback'	=> 'weight_loss_club_sanitize_checkbox'
	));
	$wp_customize->add_control('weight_loss_club_single_post_time',array(
		'type' => 'checkbox',
		'label' => __('Enable / Disable Time','weight-loss-club'),
		'section' => 'weight_loss_club_single_post_settings'
	));	

	$wp_customize->add_setting('weight_loss_club_single_post_metabox_seperator',array(
		'default' => '|',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('weight_loss_club_single_post_metabox_seperator',array(
		'type' => 'text',
		'label' => __('Metabox Seperator','weight-loss-club'),
		'description' => __('Ex: "/", "|", "-", ...','weight-loss-club'),
		'section' => 'weight_loss_club_single_post_settings'
	)); 

	$wp_customize->add_setting('weight_loss_club_sidebar_single_post_layout',array(
    	'default' => 'right',
    	 'sanitize_callback' => 'weight_loss_club_sanitize_choices'
	));
	$wp_customize->add_control('weight_loss_club_sidebar_single_post_layout',array(
   		'type' => 'radio',
    	'label'     => __('Single post sidebar layout', 'weight-loss-club'),
     	'section' => 'weight_loss_club_single_post_settings',
     	'choices' => array(
			'full' => __('Full','weight-loss-club'),
			'left' => __('Left','weight-loss-club'),
			'right' => __('Right','weight-loss-club'),
     ),
	));

	$wp_customize->add_setting( 'weight_loss_club_single_post_page_image_box_shadow', array(
        'default'              => '0',
        'transport'            => 'refresh',
        'sanitize_callback'    => 'weight_loss_club_sanitize_integer'
    ) );
    $wp_customize->add_control(new Weight_Loss_Club_Slider_Custom_Control( $wp_customize, 'weight_loss_club_single_post_page_image_box_shadow',array(
		'label'	=> esc_html__('Single Post Image Box Shadow','weight-loss-club'),
		'section'=> 'weight_loss_club_single_post_settings',
		'settings'=>'weight_loss_club_single_post_page_image_box_shadow',
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 100,
        ),
	)));

	$wp_customize->add_setting( 'weight_loss_club_site_single_post_settings_upgraded_features',array(
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('weight_loss_club_site_single_post_settings_upgraded_features', array(
		'type'=> 'hidden',
		'description' => "<span class='customizer-upgraded-features'>Unlock Premium Customization Features:
			<a target='_blank' href='". esc_url(WEIGHT_LOSS_CLUB_PREMIUM_PAGE) ." '>Upgrade to Pro</a></span>",
		'section' => 'weight_loss_club_single_post_settings'
	));

	// 404 Page Settings
	$wp_customize->add_section('weight_loss_club_page_not_found', array(
		'title'	=> __('Manage 404 Page Section','weight-loss-club'),
		'priority'	=> null,
		'panel' => 'weight_loss_club_panel_area',
	));
	
	$wp_customize->add_setting('weight_loss_club_page_not_found_heading',array(
		'default'=> __('404 Not Found','weight-loss-club'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('weight_loss_club_page_not_found_heading',array(
		'label'	=> __('404 Heading','weight-loss-club'),
		'section'=> 'weight_loss_club_page_not_found',
		'type'=> 'text'
	));

	$wp_customize->add_setting('weight_loss_club_page_not_found_content',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('weight_loss_club_page_not_found_content',array(
		'label'	=> __('404 Text','weight-loss-club'),
		'input_attrs' => array(
			'placeholder' => __( 'Looks like you have taken a wrong turn.....Don\'t worry... it happens to the best of us.', 'weight-loss-club' ),
		),
		'section'=> 'weight_loss_club_page_not_found',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'weight_loss_club_site_page_not_found_settings_upgraded_features',array(
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('weight_loss_club_site_page_not_found_settings_upgraded_features', array(
		'type'=> 'hidden',
		'description' => "<span class='customizer-upgraded-features'>Unlock Premium Customization Features:
			<a target='_blank' href='". esc_url(WEIGHT_LOSS_CLUB_PREMIUM_PAGE) ." '>Upgrade to Pro</a></span>",
		'section' => 'weight_loss_club_page_not_found'
	));

	// Footer Section
	$wp_customize->add_section('weight_loss_club_footer', array(
		'title'	=> __('Manage Footer Section','weight-loss-club'),
		'description'	=> __('<p class="sec-title">Manage Footer Section</p>','weight-loss-club'),
		'priority'	=> null,
		'panel' => 'weight_loss_club_panel_area',
	));

	$wp_customize->add_setting('weight_loss_club_footer_widget', array(
	    'default' => true,
	    'sanitize_callback' => 'weight_loss_club_sanitize_checkbox',
	));
	$wp_customize->add_control('weight_loss_club_footer_widget', array(
	    'settings' => 'weight_loss_club_footer_widget',
	    'section'   => 'weight_loss_club_footer',
	    'label'     => __('Check to Enable Footer Widget', 'weight-loss-club'),
	    'type'      => 'checkbox',
	));

	//  footer bg color
	$wp_customize->add_setting('weight_loss_club_footerbg_color',array(
		'default' => '',
		'sanitize_callback' => 'weight_loss_club_sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'weight_loss_club_footerbg_color', array(
		'settings' => 'weight_loss_club_footerbg_color',
		'section'   => 'weight_loss_club_footer',
		'label' => __('Footer Background Color', 'weight-loss-club'),
		'type'      => 'color'
	));

	$wp_customize->add_setting('weight_loss_club_footer_bg_image',array(
        'default'   => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'weight_loss_club_footer_bg_image',array(
        'label' => __('Footer Background Image','weight-loss-club'),
        'section' => 'weight_loss_club_footer',
    )));

	$wp_customize->add_setting('weight_loss_club_footer_img_position',array(
		'default' => 'center center',
		'transport' => 'refresh',
		'sanitize_callback' => 'weight_loss_club_sanitize_choices'
	));
	$wp_customize->add_control('weight_loss_club_footer_img_position',array(
		'type' => 'select',
		'label' => __('Footer Image Position','weight-loss-club'),
		'section' => 'weight_loss_club_footer',
		'choices' 	=> array(
			'center center'   => esc_html__( 'Center', 'weight-loss-club' ),
			'center top'   => esc_html__( 'Top', 'weight-loss-club' ),
			'left center'   => esc_html__( 'Left', 'weight-loss-club' ),
			'right center'   => esc_html__( 'Right', 'weight-loss-club' ),
			'center bottom'   => esc_html__( 'Bottom', 'weight-loss-club' ),
		),
	));	

	$wp_customize->add_setting('weight_loss_club_footer_widget_areas',array(
		'default'           => 4,
		'sanitize_callback' => 'weight_loss_club_sanitize_choices',
	));
	$wp_customize->add_control('weight_loss_club_footer_widget_areas',array(
		'type'        => 'radio',
		'section' => 'weight_loss_club_footer',
		'label'       => __('Footer widget area', 'weight-loss-club'),
		'choices' => array(
		   '1'     => __('One', 'weight-loss-club'),
		   '2'     => __('Two', 'weight-loss-club'),
		   '3'     => __('Three', 'weight-loss-club'),
		   '4'     => __('Four', 'weight-loss-club')
		),
	));

	$wp_customize->add_setting('weight_loss_club_copyright_line',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control( 'weight_loss_club_copyright_line', array(
	   'section' 	=> 'weight_loss_club_footer',
	   'label'	 	=> __('Copyright Line','weight-loss-club'),
	   'type'    	=> 'text',
	   'priority' 	=> null,
    ));

	$wp_customize->add_setting('weight_loss_club_copyright_link',array(
    	'default' => '',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control( 'weight_loss_club_copyright_link', array(
	   'section' 	=> 'weight_loss_club_footer',
	   'label'	 	=> __('Copyright Link','weight-loss-club'),
	   'type'    	=> 'text',
	   'priority' 	=> null,
    ));

	//  footer coypright color
	$wp_customize->add_setting('weight_loss_club_footercoypright_color',array(
		'default' => '',
		'sanitize_callback' => 'weight_loss_club_sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'weight_loss_club_footercoypright_color', array(
	   'settings' => 'weight_loss_club_footercoypright_color',
	   'section'   => 'weight_loss_club_footer',
	   'label' => __('Coypright Color', 'weight-loss-club'),
	   'type'      => 'color'
	));

	//  footer title color
	$wp_customize->add_setting('weight_loss_club_footertitle_color',array(
		'default' => '',
		'sanitize_callback' => 'weight_loss_club_sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'weight_loss_club_footertitle_color', array(
	   'settings' => 'weight_loss_club_footertitle_color',
	   'section'   => 'weight_loss_club_footer',
	   'label' => __('Title Color', 'weight-loss-club'),
	   'type'      => 'color'
	));

	//  footer description color
	$wp_customize->add_setting('weight_loss_club_footerdescription_color',array(
		'default' => '',
		'sanitize_callback' => 'weight_loss_club_sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'weight_loss_club_footerdescription_color', array(
	   'settings' => 'weight_loss_club_footerdescription_color',
	   'section'   => 'weight_loss_club_footer',
	   'label' => __('Description Color', 'weight-loss-club'),
	   'type'      => 'color'
	));

	//  footer list color
	$wp_customize->add_setting('weight_loss_club_footerlist_color',array(
		'default' => '',
		'sanitize_callback' => 'weight_loss_club_sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'weight_loss_club_footerlist_color', array(
	   'settings' => 'weight_loss_club_footerlist_color',
	   'section'   => 'weight_loss_club_footer',
	   'label' => __('List Color', 'weight-loss-club'),
	   'type'      => 'color'
	));

	$wp_customize->add_setting('weight_loss_club_scroll_hide', array(
        'default' => true,
        'sanitize_callback' => 'weight_loss_club_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'weight_loss_club_scroll_hide',array(
        'label'          => __( 'Check To Show Scroll To Top', 'weight-loss-club' ),
        'section'        => 'weight_loss_club_footer',
        'settings'       => 'weight_loss_club_scroll_hide',
        'type'           => 'checkbox',
    )));

	$wp_customize->add_setting('weight_loss_club_scroll_position',array(
        'default' => 'Right',
        'sanitize_callback' => 'weight_loss_club_sanitize_choices'
    ));
    $wp_customize->add_control('weight_loss_club_scroll_position',array(
        'type' => 'radio',
        'section' => 'weight_loss_club_footer',
        'label'	 	=> __('Scroll To Top Positions','weight-loss-club'),
        'choices' => array(
            'Right' => __('Right','weight-loss-club'),
            'Left' => __('Left','weight-loss-club'),
            'Center' => __('Center','weight-loss-club')
        ),
    ) );

	$wp_customize->add_setting('weight_loss_club_scroll_text',array(
		'default'	=> __('TOP','weight-loss-club'),
		'sanitize_callback'	=> 'sanitize_text_field',
	));	
	$wp_customize->add_control('weight_loss_club_scroll_text',array(
		'label'	=> __('Scroll To Top Button Text','weight-loss-club'),
		'section'	=> 'weight_loss_club_footer',
		'type'		=> 'text'
	));

	$wp_customize->add_setting( 'weight_loss_club_scroll_top_shape', array(
		'default'           => 'circle',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	
	$wp_customize->add_control( 'weight_loss_club_scroll_top_shape', array(
		'label'    => __( 'Scroll to Top Button Shape', 'weight-loss-club' ),
		'section'  => 'weight_loss_club_footer',
		'settings' => 'weight_loss_club_scroll_top_shape',
		'type'     => 'radio',
		'choices'  => array(
			'box'        => __( 'Box', 'weight-loss-club' ),
			'curved' => __( 'Curved', 'weight-loss-club'),
			'circle'     => __( 'Circle', 'weight-loss-club' ),
		),
	) );

	$wp_customize->add_setting( 'weight_loss_club_site_footer_settings_upgraded_features',array(
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('weight_loss_club_site_footer_settings_upgraded_features', array(
		'type'=> 'hidden',
		'description' => "<span class='customizer-upgraded-features'>Unlock Premium Customization Features:
			<a target='_blank' href='". esc_url(WEIGHT_LOSS_CLUB_PREMIUM_PAGE) ." '>Upgrade to Pro</a></span>",
		'section' => 'weight_loss_club_footer'
	));
    
	// Footer Social Section
	$wp_customize->add_section('weight_loss_club_footer_social_icons', array(
		'title'	=> __('Manage Footer Social Section','weight-loss-club'),
		'description'	=> __('<p class="sec-title">Manage Footer Social Section</p>','weight-loss-club'),
		'priority'	=> null,
		'panel' => 'weight_loss_club_panel_area',
	));

	$wp_customize->add_setting('weight_loss_club_footer_facebook_link',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'weight_loss_club_footer_facebook_link', array(
		'settings' => 'weight_loss_club_footer_facebook_link',
		'section'   => 'weight_loss_club_footer_social_icons',
		'label' => __('Facebook Link', 'weight-loss-club'),
		'type'      => 'url'
	));

	$wp_customize->add_setting('weight_loss_club_footer_instagram_link',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'weight_loss_club_footer_instagram_link', array(
		'settings' => 'weight_loss_club_footer_instagram_link',
		'section'   => 'weight_loss_club_footer_social_icons',
		'label' => __('Instagram Link', 'weight-loss-club'),
		'type'      => 'url'
	));

	$wp_customize->add_setting('weight_loss_club_footer_pinterest_link',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'weight_loss_club_footer_pinterest_link', array(
		'settings' => 'weight_loss_club_footer_pinterest_link',
		'section'   => 'weight_loss_club_footer_social_icons',
		'label' => __('Pinterest Link', 'weight-loss-club'),
		'type'      => 'url'
	));

	$wp_customize->add_setting('weight_loss_club_footer_twitter_link',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'weight_loss_club_footer_twitter_link', array(
		'settings' => 'weight_loss_club_footer_twitter_link',
		'section'   => 'weight_loss_club_footer_social_icons',
		'label' => __('Twitter Link', 'weight-loss-club'),
		'type'      => 'url'
	));

	$wp_customize->add_setting('weight_loss_club_footer_youtube_link',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'weight_loss_club_footer_youtube_link', array(
		'settings' => 'weight_loss_club_footer_youtube_link',
		'section'   => 'weight_loss_club_footer_social_icons',
		'label' => __('Youtube Link', 'weight-loss-club'),
		'type'      => 'url'
	));

	$wp_customize->add_setting( 'weight_loss_club_footer_social_settings_upgraded_features',array(
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('weight_loss_club_footer_social_settings_upgraded_features', array(
		'type'=> 'hidden',
		'description' => "<span class='customizer-upgraded-features'>Unlock Premium Customization Features:
		<a target='_blank' href='". esc_url(WEIGHT_LOSS_CLUB_PREMIUM_PAGE) ." '>Upgrade to Pro</a></span>",
		'section' => 'weight_loss_club_footer_social_icons'
	));

	// Google Fonts
	$wp_customize->add_section( 'weight_loss_club_google_fonts_section', array(
		'title'       => __( 'Google Fonts', 'weight-loss-club' ),
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

	$wp_customize->add_setting( 'weight_loss_club_headings_fonts', array(
		'sanitize_callback' => 'weight_loss_club_sanitize_fonts',
	));
	$wp_customize->add_control( 'weight_loss_club_headings_fonts', array(
		'type' => 'select',
		'description' => __('Select your desired font for the headings.', 'weight-loss-club'),
		'section' => 'weight_loss_club_google_fonts_section',
		'choices' => $font_choices
	));

	$wp_customize->add_setting( 'weight_loss_club_body_fonts', array(
		'sanitize_callback' => 'weight_loss_club_sanitize_fonts'
	));
	$wp_customize->add_control( 'weight_loss_club_body_fonts', array(
		'type' => 'select',
		'description' => __( 'Select your desired font for the body.', 'weight-loss-club' ),
		'section' => 'weight_loss_club_google_fonts_section',
		'choices' => $font_choices
	));
  
}
add_action( 'customize_register', 'weight_loss_club_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function weight_loss_club_customize_preview_js() {
	wp_enqueue_script( 'weight_loss_club_customizer', esc_url(get_template_directory_uri()) . '/js/customize-preview.js', array( 'customize-preview' ), '20161510', true );
}
add_action( 'customize_preview_init', 'weight_loss_club_customize_preview_js' );
