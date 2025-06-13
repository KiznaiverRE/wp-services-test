<?php
$weight_loss_club_first_color = get_theme_mod('weight_loss_club_first_color');
$weight_loss_club_second_color = get_theme_mod('weight_loss_club_second_color');
$weight_loss_club_color_scheme_css = '';

/*------------------ Global First Color -----------*/
if ($weight_loss_club_first_color) {
  $weight_loss_club_color_scheme_css .= ':root {';
  $weight_loss_club_color_scheme_css .= '--first-theme-color: ' . esc_attr($weight_loss_club_first_color) . ' !important;';
  $weight_loss_club_color_scheme_css .= '} ';
} 

if ($weight_loss_club_first_color) {
    $weight_loss_club_hex = ltrim($weight_loss_club_first_color, '#');

    if (strlen($weight_loss_club_hex) === 6) {
        $weight_loss_club_r = hexdec(substr($weight_loss_club_hex, 0, 2));
        $weight_loss_club_g = hexdec(substr($weight_loss_club_hex, 2, 2));
        $weight_loss_club_b = hexdec(substr($weight_loss_club_hex, 4, 2));

        $weight_loss_club_color_scheme_css .= ':root {';
        $weight_loss_club_color_scheme_css .= '--first-theme-color: ' . esc_attr($weight_loss_club_first_color) . ';';
        $weight_loss_club_color_scheme_css .= '--first-theme-color-rgb: ' . "$weight_loss_club_r, $weight_loss_club_g, $weight_loss_club_b" . ';';
        $weight_loss_club_color_scheme_css .= '} ';

        // Now apply transparent background using RGBA
        $weight_loss_club_color_scheme_css .= '.page-template-template-home-page .main-header .header-bg {';
        $weight_loss_club_color_scheme_css .= 'background-color: rgba(' . "$weight_loss_club_r, $weight_loss_club_g, $weight_loss_club_b" . ', 0.6) !important;';
        $weight_loss_club_color_scheme_css .= '} ';
    }
}

/*------------------ Global Second Color -----------*/
if ($weight_loss_club_second_color) {
  $weight_loss_club_color_scheme_css .= ':root {';
  $weight_loss_club_color_scheme_css .= '--second-theme-color: ' . esc_attr($weight_loss_club_second_color) . ' !important;';
  $weight_loss_club_color_scheme_css .= '} ';
} 

$weight_loss_club_slider = get_theme_mod('weight_loss_club_slider', false);
if($weight_loss_club_slider != true){
    $weight_loss_club_color_scheme_css .='.page-template-template-home-page .main-header{';
        $weight_loss_club_color_scheme_css .='position: static; margin-bottom: 20px;';
    $weight_loss_club_color_scheme_css .='}';
    $weight_loss_club_color_scheme_css .='.page-template-template-home-page .main-header .header-bg:before{';
        $weight_loss_club_color_scheme_css .='content: none;';
    $weight_loss_club_color_scheme_css .='}';
}

$weight_loss_club_banner_background_img = get_theme_mod('weight_loss_club_banner_background_img');
if($weight_loss_club_banner_background_img != false){
    $weight_loss_club_color_scheme_css .='#slider-cat{';
        $weight_loss_club_color_scheme_css .='background-image: url('.esc_attr($weight_loss_club_banner_background_img).');';
    $weight_loss_club_color_scheme_css .='}';
}

//---------------------------------Logo-Max-height--------- 
$weight_loss_club_logo_width = get_theme_mod('weight_loss_club_logo_width', 200);
if($weight_loss_club_logo_width != false){
    $weight_loss_club_color_scheme_css .='.logo img{';
      $weight_loss_club_color_scheme_css .='width: '.esc_html($weight_loss_club_logo_width).'px;';
    $weight_loss_club_color_scheme_css .='}';
}

/*--------------------------- Woocommerce Product Image Border Radius -------------------*/

$weight_loss_club_woo_product_img_border_radius = get_theme_mod('weight_loss_club_woo_product_img_border_radius');
if($weight_loss_club_woo_product_img_border_radius != false){
    $weight_loss_club_color_scheme_css .='.woocommerce-shop.woocommerce .product-content .product-image img{';
    $weight_loss_club_color_scheme_css .='border-radius: '.esc_attr($weight_loss_club_woo_product_img_border_radius).'px;';
    $weight_loss_club_color_scheme_css .='}';
}  

/*--------------------------- Preloader Background Image--------------------------- */

$weight_loss_club_preloader_bg_image = get_theme_mod('weight_loss_club_preloader_bg_image');
if($weight_loss_club_preloader_bg_image != false){
  $weight_loss_club_color_scheme_css .='#preloader{';
    $weight_loss_club_color_scheme_css .='background: url('.esc_attr($weight_loss_club_preloader_bg_image).'); background-size: cover;';
  $weight_loss_club_color_scheme_css .='}';
}

/*--------------------------- Scroll to top positions -------------------*/

$weight_loss_club_scroll_position = get_theme_mod( 'weight_loss_club_scroll_position','Right');
if($weight_loss_club_scroll_position == 'Right'){
    $weight_loss_club_color_scheme_css .='#button{';
        $weight_loss_club_color_scheme_css .='right: 20px;';
    $weight_loss_club_color_scheme_css .='}';
}else if($weight_loss_club_scroll_position == 'Left'){
    $weight_loss_club_color_scheme_css .='#button{';
        $weight_loss_club_color_scheme_css .='left: 20px;';
    $weight_loss_club_color_scheme_css .='}';
}else if($weight_loss_club_scroll_position == 'Center'){
    $weight_loss_club_color_scheme_css .='#button{';
        $weight_loss_club_color_scheme_css .='right: 50%;left: 50%;';
    $weight_loss_club_color_scheme_css .='}';
}

/*--------------------------- Footer background image -------------------*/

$weight_loss_club_footer_bg_image = get_theme_mod('weight_loss_club_footer_bg_image');
if($weight_loss_club_footer_bg_image != false){
    $weight_loss_club_color_scheme_css .='#footer{';
        $weight_loss_club_color_scheme_css .='background: url('.esc_attr($weight_loss_club_footer_bg_image).');';
        $weight_loss_club_color_scheme_css .= 'background-size: cover;';  
    $weight_loss_club_color_scheme_css .='}';
}

/*--------------------------- Footer image position -------------------*/

$weight_loss_club_footer_img_position = get_theme_mod('weight_loss_club_footer_img_position','center center');
if($weight_loss_club_footer_img_position != false){
    $weight_loss_club_color_scheme_css .='#footer{';
        $weight_loss_club_color_scheme_css .='background-position: '.esc_attr($weight_loss_club_footer_img_position).';';
    $weight_loss_club_color_scheme_css .='}';
}	

/*--------------------------- Blog Post Page Image Box Shadow -------------------*/

$weight_loss_club_blog_post_page_image_box_shadow = get_theme_mod('weight_loss_club_blog_post_page_image_box_shadow',0);
if($weight_loss_club_blog_post_page_image_box_shadow != false){
    $weight_loss_club_color_scheme_css .='.blog-post img{';
        $weight_loss_club_color_scheme_css .='box-shadow: '.esc_attr($weight_loss_club_blog_post_page_image_box_shadow).'px '.esc_attr($weight_loss_club_blog_post_page_image_box_shadow).'px '.esc_attr($weight_loss_club_blog_post_page_image_box_shadow).'px #cccccc;';
    $weight_loss_club_color_scheme_css .='}';
}       

/*--------------------------- Single Post Page Image Box Shadow -------------------*/

$weight_loss_club_single_post_page_image_box_shadow = get_theme_mod('weight_loss_club_single_post_page_image_box_shadow',0);
if($weight_loss_club_single_post_page_image_box_shadow != false){
    $weight_loss_club_color_scheme_css .='.single-post img{';
        $weight_loss_club_color_scheme_css .='box-shadow: '.esc_attr($weight_loss_club_single_post_page_image_box_shadow).'px '.esc_attr($weight_loss_club_single_post_page_image_box_shadow).'px '.esc_attr($weight_loss_club_single_post_page_image_box_shadow).'px #cccccc;';
    $weight_loss_club_color_scheme_css .='}';
}  

/*--------------------------- Shop page pagination -------------------*/

$weight_loss_club_wooproducts_nav = get_theme_mod('weight_loss_club_wooproducts_nav', 'Yes');
if($weight_loss_club_wooproducts_nav == 'No'){
  $weight_loss_club_color_scheme_css .='.woocommerce nav.woocommerce-pagination{';
    $weight_loss_club_color_scheme_css .='display: none;';
  $weight_loss_club_color_scheme_css .='}';
}

/*--------------------------- Related Product -------------------*/

$weight_loss_club_related_product_enable = get_theme_mod('weight_loss_club_related_product_enable',true);
if($weight_loss_club_related_product_enable == false){
  $weight_loss_club_color_scheme_css .='.related.products{';
    $weight_loss_club_color_scheme_css .='display: none;';
  $weight_loss_club_color_scheme_css .='}';
}

/*--------------------------- Scroll to Top Button Shape -------------------*/

	$weight_loss_club_scroll_top_shape = get_theme_mod('weight_loss_club_scroll_top_shape', 'circle');
	if($weight_loss_club_scroll_top_shape == 'box' ){
		$weight_loss_club_color_scheme_css .='#button{';
			$weight_loss_club_color_scheme_css .=' border-radius: 0%';
		$weight_loss_club_color_scheme_css .='}';
	}elseif($weight_loss_club_scroll_top_shape == 'curved' ){
		$weight_loss_club_color_scheme_css .='#button{';
			$weight_loss_club_color_scheme_css .=' border-radius: 20%';
		$weight_loss_club_color_scheme_css .='}';
	}elseif($weight_loss_club_scroll_top_shape == 'circle' ){
		$weight_loss_club_color_scheme_css .='#button{';
			$weight_loss_club_color_scheme_css .=' border-radius: 50%;';
		$weight_loss_club_color_scheme_css .='}';
	}