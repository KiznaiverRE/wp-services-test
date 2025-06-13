<?php
$classic_plumbing_services_first_color = get_theme_mod('classic_plumbing_services_first_color');
$classic_plumbing_services_second_color = get_theme_mod('classic_plumbing_services_second_color');
$classic_plumbing_services_color_scheme_css = '';

/*------------------ Global First Color -----------*/
if ($classic_plumbing_services_first_color) {
  $classic_plumbing_services_color_scheme_css .= ':root {';
  $classic_plumbing_services_color_scheme_css .= '--first-theme-color: ' . esc_attr($classic_plumbing_services_first_color) . ' !important;';
  $classic_plumbing_services_color_scheme_css .= '} ';
} 

/*------------------ Global Second Color -----------*/
if ($classic_plumbing_services_second_color) {
  $classic_plumbing_services_color_scheme_css .= ':root {';
  $classic_plumbing_services_color_scheme_css .= '--second-theme-color: ' . esc_attr($classic_plumbing_services_second_color) . ' !important;';
  $classic_plumbing_services_color_scheme_css .= '} ';
} 

//---------------------------------Logo-Max-height--------- 
$classic_plumbing_services_logo_width = get_theme_mod('classic_plumbing_services_logo_width');
if($classic_plumbing_services_logo_width != false){
    $classic_plumbing_services_color_scheme_css .='.logo img{';
      $classic_plumbing_services_color_scheme_css .='width: '.esc_html($classic_plumbing_services_logo_width).'px;';
    $classic_plumbing_services_color_scheme_css .='}';
}

/*--------------------------- Woocommerce Product Image Border Radius -------------------*/

$classic_plumbing_services_woo_product_img_border_radius = get_theme_mod('classic_plumbing_services_woo_product_img_border_radius');
if($classic_plumbing_services_woo_product_img_border_radius != false){
    $classic_plumbing_services_color_scheme_css .='.woocommerce-shop.woocommerce .product-content .product-image img{';
    $classic_plumbing_services_color_scheme_css .='border-radius: '.esc_attr($classic_plumbing_services_woo_product_img_border_radius).'px;';
    $classic_plumbing_services_color_scheme_css .='}';
}  

/*--------------------------- Preloader Background Image ------------*/

$classic_plumbing_services_preloader_bg_image = get_theme_mod('classic_plumbing_services_preloader_bg_image');
if($classic_plumbing_services_preloader_bg_image != false){
  $classic_plumbing_services_color_scheme_css .='#preloader{';
    $classic_plumbing_services_color_scheme_css .='background: url('.esc_attr($classic_plumbing_services_preloader_bg_image).'); background-size: cover;';
  $classic_plumbing_services_color_scheme_css .='}';
}

/*--------------------------- Scroll to top positions -------------------*/

$classic_plumbing_services_scroll_position = get_theme_mod( 'classic_plumbing_services_scroll_position','Right');
if($classic_plumbing_services_scroll_position == 'Right'){
    $classic_plumbing_services_color_scheme_css .='#button{';
        $classic_plumbing_services_color_scheme_css .='right: 20px;';
    $classic_plumbing_services_color_scheme_css .='}';
}else if($classic_plumbing_services_scroll_position == 'Left'){
    $classic_plumbing_services_color_scheme_css .='#button{';
        $classic_plumbing_services_color_scheme_css .='left: 20px;';
    $classic_plumbing_services_color_scheme_css .='}';
}else if($classic_plumbing_services_scroll_position == 'Center'){
    $classic_plumbing_services_color_scheme_css .='#button{';
        $classic_plumbing_services_color_scheme_css .='right: 50%;left: 50%;';
    $classic_plumbing_services_color_scheme_css .='}';
}

/*--------------------------- Footer background image -------------------*/

$classic_plumbing_services_footer_bg_image = get_theme_mod('classic_plumbing_services_footer_bg_image');
if($classic_plumbing_services_footer_bg_image != false){
    $classic_plumbing_services_color_scheme_css .='#footer{';
        $classic_plumbing_services_color_scheme_css .='background: url('.esc_attr($classic_plumbing_services_footer_bg_image).')!important;';
        $classic_plumbing_services_color_scheme_css .= 'background-size: cover!important;';  
    $classic_plumbing_services_color_scheme_css .='}';
}

/*--------------------------- Blog Post Page Image Box Shadow -------------------*/

$classic_plumbing_services_blog_post_page_image_box_shadow = get_theme_mod('classic_plumbing_services_blog_post_page_image_box_shadow',0);
if($classic_plumbing_services_blog_post_page_image_box_shadow != false){
    $classic_plumbing_services_color_scheme_css .='.blog-post img{';
        $classic_plumbing_services_color_scheme_css .='box-shadow: '.esc_attr($classic_plumbing_services_blog_post_page_image_box_shadow).'px '.esc_attr($classic_plumbing_services_blog_post_page_image_box_shadow).'px '.esc_attr($classic_plumbing_services_blog_post_page_image_box_shadow).'px #cccccc;';
    $classic_plumbing_services_color_scheme_css .='}';
}       

/*--------------------------- Single Post Page Image Box Shadow -------------------*/

$classic_plumbing_services_single_post_page_image_box_shadow = get_theme_mod('classic_plumbing_services_single_post_page_image_box_shadow',0);
if($classic_plumbing_services_single_post_page_image_box_shadow != false){
    $classic_plumbing_services_color_scheme_css .='.single-post img{';
        $classic_plumbing_services_color_scheme_css .='box-shadow: '.esc_attr($classic_plumbing_services_single_post_page_image_box_shadow).'px '.esc_attr($classic_plumbing_services_single_post_page_image_box_shadow).'px '.esc_attr($classic_plumbing_services_single_post_page_image_box_shadow).'px #cccccc;';
    $classic_plumbing_services_color_scheme_css .='}';
}  

/*--------------------------- Shop page pagination -------------------*/

$classic_plumbing_services_wooproducts_nav = get_theme_mod('classic_plumbing_services_wooproducts_nav', 'Yes');
if($classic_plumbing_services_wooproducts_nav == 'No'){
  $classic_plumbing_services_color_scheme_css .='.woocommerce nav.woocommerce-pagination{';
    $classic_plumbing_services_color_scheme_css .='display: none;';
  $classic_plumbing_services_color_scheme_css .='}';
}

/*--------------------------- Related Product -------------------*/

$classic_plumbing_services_related_product_enable = get_theme_mod('classic_plumbing_services_related_product_enable',true);
if($classic_plumbing_services_related_product_enable == false){
  $classic_plumbing_services_color_scheme_css .='.related.products{';
    $classic_plumbing_services_color_scheme_css .='display: none;';
  $classic_plumbing_services_color_scheme_css .='}';
}

/*--------------------------- Scroll to Top Button Shape -------------------*/

	$classic_plumbing_services_scroll_top_shape = get_theme_mod('classic_plumbing_services_scroll_top_shape', 'circle');
	if($classic_plumbing_services_scroll_top_shape == 'box' ){
		$classic_plumbing_services_color_scheme_css .='#button{';
			$classic_plumbing_services_color_scheme_css .=' border-radius: 0%';
		$classic_plumbing_services_color_scheme_css .='}';
	}elseif($classic_plumbing_services_scroll_top_shape == 'curved' ){
		$classic_plumbing_services_color_scheme_css .='#button{';
			$classic_plumbing_services_color_scheme_css .=' border-radius: 20%';
		$classic_plumbing_services_color_scheme_css .='}';
	}elseif($classic_plumbing_services_scroll_top_shape == 'circle' ){
		$classic_plumbing_services_color_scheme_css .='#button{';
			$classic_plumbing_services_color_scheme_css .=' border-radius: 50%;';
		$classic_plumbing_services_color_scheme_css .='}';
	}