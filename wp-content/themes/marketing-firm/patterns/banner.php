<?php
/**
 * Banner Section
 * 
 * slug: marketing-firm/banner
 * title: Banner
 * categories: marketing-firm
 */

return array(
    'title'      =>__( 'Banner', 'marketing-firm' ),
    'categories' => array( 'marketing-firm' ),
    'content'    => '<!-- wp:group {"className":"slider-main-box","style":{"spacing":{"blockGap":"0","padding":{"top":"0","bottom":"0","left":"0","right":"0"}}},"gradient":"primary-gradient","layout":{"type":"constrained","contentSize":"100%","wideSize":"100%"}} -->
<div class="wp-block-group slider-main-box has-primary-gradient-gradient-background has-background" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:cover {"url":"'.esc_url(get_template_directory_uri()) .'/assets/images/line.png","id":21,"dimRatio":0,"isUserOverlayColor":true,"minHeight":700,"minHeightUnit":"px","contentPosition":"center center","sizeSlug":"large","className":"banner-section","style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"blockGap":"0","margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained","contentSize":"80%","wideSize":"80%"}} -->
    <div class="wp-block-cover banner-section" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;min-height:700px"><img class="wp-block-cover__image-background wp-image-21 size-large" alt="" src="'.esc_url(get_template_directory_uri()) .'/assets/images/line.png" data-object-fit="cover"/><span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim"></span><div class="wp-block-cover__inner-container"><!-- wp:columns {"verticalAlignment":"center","className":"main-banner","style":{"spacing":{"padding":{"top":"0","bottom":"0"},"blockGap":{"top":"0"},"margin":{"top":"0","bottom":"0"}}}} -->
    <div class="wp-block-columns are-vertically-aligned-center main-banner" style="margin-top:0;margin-bottom:0;padding-top:0;padding-bottom:0"><!-- wp:column {"verticalAlignment":"center","width":"50%","className":"banner-left fadeInLeft wow","style":{"spacing":{"blockGap":"0"}}} -->
    <div class="wp-block-column is-vertically-aligned-center banner-left fadeInLeft wow" style="flex-basis:50%"><!-- wp:columns {"verticalAlignment":"center","className":"banner-col01","style":{"layout":{"selfStretch":"fit","flexSize":null},"spacing":{"margin":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"},"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"0","right":"0"}},"border":{"radius":"0px"}}} -->
    <div class="wp-block-columns are-vertically-aligned-center banner-col01" style="border-radius:0px;margin-top:var(--wp--preset--spacing--50);margin-bottom:var(--wp--preset--spacing--50);padding-top:var(--wp--preset--spacing--30);padding-right:0;padding-bottom:var(--wp--preset--spacing--30);padding-left:0"><!-- wp:column {"verticalAlignment":"center","style":{"spacing":{"padding":{"right":"0","left":"0","top":"0","bottom":"0"}}}} -->
    <div class="wp-block-column is-vertically-aligned-center" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|accent"}}},"typography":{"fontStyle":"normal","fontWeight":"600"}},"textColor":"accent","fontSize":"medium","fontFamily":"urbanist"} -->
    <p class="has-accent-color has-text-color has-link-color has-urbanist-font-family has-medium-font-size" style="font-style:normal;font-weight:600">'. esc_html__('Welcome To marketing agency','marketing-firm').'</p>
    <!-- /wp:paragraph -->
    
    <!-- wp:heading {"className":"banner-head","style":{"typography":{"fontStyle":"normal","fontWeight":"800"},"elements":{"link":{"color":{"text":"var:preset|color|primary"}}}},"textColor":"primary","fontSize":"extra-large","fontFamily":"urbanist"} -->
    <h2 class="wp-block-heading banner-head has-primary-color has-text-color has-link-color has-urbanist-font-family has-extra-large-font-size" style="font-style:normal;font-weight:800">'. esc_html__('We Are Creative Digital Marketing Agency','marketing-firm').'</h2>
    <!-- /wp:heading -->
    
    <!-- wp:paragraph {"className":"short-para-text","style":{"typography":{"fontStyle":"normal","fontWeight":"400","lineHeight":"1.7"},"elements":{"link":{"color":{"text":"var:preset|color|primary"}}}},"textColor":"primary","fontSize":"small","fontFamily":"rubik"} -->
    <p class="short-para-text has-primary-color has-text-color has-link-color has-rubik-font-family has-small-font-size" style="font-style:normal;font-weight:400;line-height:1.7">'. esc_html__('Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s,','marketing-firm').'</p>
    <!-- /wp:paragraph -->
    
    <!-- wp:buttons {"style":{"typography":{"fontStyle":"normal","fontWeight":"400"},"spacing":{"blockGap":{"top":"var:preset|spacing|20","left":"var:preset|spacing|30"}}},"fontSize":"medium","fontFamily":"rubik"} -->
    <div class="wp-block-buttons has-custom-font-size has-rubik-font-family has-medium-font-size" style="font-style:normal;font-weight:400"><!-- wp:button {"backgroundColor":"secaccent","textColor":"white","className":"is-style-fill","style":{"elements":{"link":{"color":{"text":"var:preset|color|white"}}},"spacing":{"padding":{"left":"var:preset|spacing|60","right":"var:preset|spacing|60","top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}},"border":{"radius":"35px"}}} -->
    <div class="wp-block-button is-style-fill"><a class="wp-block-button__link has-white-color has-secaccent-background-color has-text-color has-background has-link-color wp-element-button" href="#" style="border-radius:35px;padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--60)">'. esc_html__('Explore More','marketing-firm').'</a></div>
    <!-- /wp:button -->
    
    <!-- wp:button {"backgroundColor":"accent","textColor":"white","className":"is-style-fill","style":{"elements":{"link":{"color":{"text":"var:preset|color|white"}}},"spacing":{"padding":{"left":"var:preset|spacing|60","right":"var:preset|spacing|60","top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}},"border":{"radius":"35px"}}} -->
    <div class="wp-block-button is-style-fill"><a class="wp-block-button__link has-white-color has-accent-background-color has-text-color has-background has-link-color wp-element-button" href="#" style="border-radius:35px;padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--60)">'. esc_html__('Get Started','marketing-firm').'</a></div>
    <!-- /wp:button --></div>
    <!-- /wp:buttons --></div>
    <!-- /wp:column --></div>
    <!-- /wp:columns --></div>
    <!-- /wp:column -->
    
    <!-- wp:column {"verticalAlignment":"center","width":"50%","className":"banner-right fadeInRight wow","style":{"spacing":{"blockGap":"0"}}} -->
    <div class="wp-block-column is-vertically-aligned-center banner-right fadeInRight wow" style="flex-basis:50%"><!-- wp:columns {"className":"banner-right-bottom"} -->
    <div class="wp-block-columns banner-right-bottom"><!-- wp:column {"verticalAlignment":"center","width":"","className":"info-left","style":{"spacing":{"blockGap":"0","padding":{"top":"0","bottom":"0","left":"0","right":"0"}}}} -->
    <div class="wp-block-column is-vertically-aligned-center info-left" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:group {"className":"info-left-row1","style":{"spacing":{"blockGap":"var:preset|spacing|30","padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"var:preset|spacing|60"}},"dimensions":{"minHeight":""}},"layout":{"type":"constrained","justifyContent":"left"}} -->
    <div class="wp-block-group info-left-row1" style="margin-top:0;margin-bottom:var(--wp--preset--spacing--60);padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:paragraph {"align":"center","style":{"spacing":{"padding":{"top":"var:preset|spacing|20","bottom":"var:preset|spacing|20","left":"var:preset|spacing|20","right":"var:preset|spacing|20"}},"typography":{"fontStyle":"normal","fontWeight":"700"},"border":{"radius":"4px"}},"backgroundColor":"secaccent","fontSize":"extra-small","fontFamily":"urbanist"} -->
    <p class="has-text-align-center has-secaccent-background-color has-background has-urbanist-font-family has-extra-small-font-size" style="border-radius:4px;padding-top:var(--wp--preset--spacing--20);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--20);font-style:normal;font-weight:700">'. esc_html__('Have An Idea','marketing-firm').'</p>
    <!-- /wp:paragraph -->
    
    <!-- wp:paragraph {"align":"center","style":{"spacing":{"padding":{"top":"var:preset|spacing|20","bottom":"var:preset|spacing|20","left":"var:preset|spacing|20","right":"var:preset|spacing|20"}},"typography":{"fontStyle":"normal","fontWeight":"700"},"border":{"radius":"4px"}},"backgroundColor":"accent","fontSize":"extra-small","fontFamily":"urbanist"} -->
    <p class="has-text-align-center has-accent-background-color has-background has-urbanist-font-family has-extra-small-font-size" style="border-radius:4px;padding-top:var(--wp--preset--spacing--20);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--20);font-style:normal;font-weight:700">'. esc_html__('Our Projects ?','marketing-firm').'</p>
    <!-- /wp:paragraph --></div>
    <!-- /wp:group -->
    
    <!-- wp:group {"className":"info-left-row2","style":{"spacing":{"blockGap":"0","padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"0"}},"dimensions":{"minHeight":""}},"layout":{"type":"constrained","justifyContent":"left"}} -->
    <div class="wp-block-group info-left-row2" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:image {"id":210,"sizeSlug":"full","linkDestination":"none","align":"left","style":{"spacing":{"margin":{"top":"0","bottom":"0","left":"0","right":"0"}}}} -->
    <figure class="wp-block-image alignleft size-full" style="margin-top:0;margin-right:0;margin-bottom:0;margin-left:0"><img src="'.esc_url(get_template_directory_uri()) .'/assets/images/activity.png" alt="" class="wp-image-210"/></figure>
    <!-- /wp:image --></div>
    <!-- /wp:group -->
    
    <!-- wp:group {"className":"info-left-row3","style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"top":"0","bottom":"0","left":"var:preset|spacing|20","right":"var:preset|spacing|20"},"blockGap":"var:preset|spacing|30"},"border":{"radius":"6px"}},"backgroundColor":"secaccent","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"left","orientation":"horizontal"}} -->
    <div class="wp-block-group info-left-row3 has-secaccent-background-color has-background" style="border-radius:6px;margin-top:0;margin-bottom:0;padding-top:0;padding-right:var(--wp--preset--spacing--20);padding-bottom:0;padding-left:var(--wp--preset--spacing--20)"><!-- wp:paragraph {"align":"center","style":{"elements":{"link":{"color":{"text":"var:preset|color|background"}}},"typography":{"fontStyle":"normal","fontWeight":"600"},"spacing":{"padding":{"top":"0"}}},"textColor":"background","fontFamily":"rubik"} -->
    <p class="has-text-align-center has-background-color has-text-color has-link-color has-rubik-font-family" style="padding-top:0;font-style:normal;font-weight:600">'. esc_html__('Follow Us','marketing-firm').'</p>
    <!-- /wp:paragraph -->
    
    <!-- wp:social-links {"iconColor":"tertiary","iconColorValue":"#121212","iconBackgroundColor":"background","iconBackgroundColorValue":"#fff","openInNewTab":true,"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|20","left":"var:preset|spacing|20"},"margin":{"top":"var:preset|spacing|20","bottom":"var:preset|spacing|20"}},"border":{"radius":"6px"},"layout":{"selfStretch":"fit","flexSize":null}},"layout":{"type":"flex","justifyContent":"space-between"}} -->
    <ul class="wp-block-social-links has-icon-color has-icon-background-color" style="border-radius:6px;margin-top:var(--wp--preset--spacing--20);margin-bottom:var(--wp--preset--spacing--20)"><!-- wp:social-link {"url":"www.facebook.com","service":"facebook"} /-->
    
    <!-- wp:social-link {"url":"https://x.com/","service":"x"} /-->
    
    <!-- wp:social-link {"url":"www.instagram.com","service":"instagram"} /-->
    
    <!-- wp:social-link {"url":"www.dribble.com","service":"dribbble"} /-->
    
    <!-- wp:social-link {"url":"www.youtube.com","service":"youtube"} /--></ul>
    <!-- /wp:social-links --></div>
    <!-- /wp:group --></div>
    <!-- /wp:column -->
    
    <!-- wp:column {"width":"","className":"info-right"} -->
    <div class="wp-block-column info-right"><!-- wp:group {"layout":{"type":"flex","orientation":"vertical","justifyContent":"center","verticalAlignment":"center"}} -->
    <div class="wp-block-group"><!-- wp:group {"className":"info-right-row1","style":{"spacing":{"blockGap":"var:preset|spacing|20","padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|50","right":"var:preset|spacing|50"}},"border":{"radius":"6px"}},"backgroundColor":"accent","layout":{"type":"constrained"}} -->
    <div class="wp-block-group info-right-row1 has-accent-background-color has-background" style="border-radius:6px;padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--50)"><!-- wp:image {"id":213,"width":"40px","height":"auto","sizeSlug":"full","linkDestination":"none","align":"center"} -->
    <figure class="wp-block-image aligncenter size-full is-resized"><img src="'.esc_url(get_template_directory_uri()) .'/assets/images/graph.png" alt="" class="wp-image-213" style="width:40px;height:auto"/></figure>
    <!-- /wp:image -->
    
    <!-- wp:heading {"textAlign":"center","style":{"typography":{"fontStyle":"normal","fontWeight":"700"},"elements":{"link":{"color":{"text":"var:preset|color|background"}}}},"textColor":"background","fontSize":"medium","fontFamily":"rubik"} -->
    <h2 class="wp-block-heading has-text-align-center has-background-color has-text-color has-link-color has-rubik-font-family has-medium-font-size" style="font-style:normal;font-weight:700">'. esc_html__('Explore','marketing-firm').'</h2>
    <!-- /wp:heading -->
    
    <!-- wp:paragraph {"align":"center","style":{"elements":{"link":{"color":{"text":"var:preset|color|background"}}}},"textColor":"background","fontSize":"tiny"} -->
    <p class="has-text-align-center has-background-color has-text-color has-link-color has-tiny-font-size">'. esc_html__('Profit View','marketing-firm').'</p>
    <!-- /wp:paragraph --></div>
    <!-- /wp:group -->
    
    <!-- wp:columns {"verticalAlignment":"center","className":"info-right-row2","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|20"},"padding":{"right":"2px","left":"2px","top":"0","bottom":"0"}},"border":{"width":"1px","radius":{"topLeft":"40px","bottomLeft":"40px","topRight":"6px","bottomRight":"6px"}}},"backgroundColor":"background"} -->
    <div class="wp-block-columns are-vertically-aligned-center info-right-row2 has-background-background-color has-background" style="border-width:1px;border-top-left-radius:40px;border-top-right-radius:6px;border-bottom-left-radius:40px;border-bottom-right-radius:6px;padding-top:0;padding-right:2px;padding-bottom:0;padding-left:2px"><!-- wp:column {"verticalAlignment":"center","width":"50px","style":{"spacing":{"padding":{"top":"var:preset|spacing|20","bottom":"var:preset|spacing|20","left":"var:preset|spacing|20","right":"var:preset|spacing|20"}},"border":{"radius":"100px"}}} -->
    <div class="wp-block-column is-vertically-aligned-center" style="border-radius:100px;padding-top:var(--wp--preset--spacing--20);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--20);flex-basis:50px"><!-- wp:image {"id":211,"width":"45px","height":"45px","scale":"contain","sizeSlug":"full","linkDestination":"none","align":"center"} -->
    <figure class="wp-block-image aligncenter size-full is-resized"><img src="'.esc_url(get_template_directory_uri()) .'/assets/images/author.png" alt="" class="wp-image-211" style="object-fit:contain;width:45px;height:45px"/></figure>
    <!-- /wp:image --></div>
    <!-- /wp:column -->
    
    <!-- wp:column {"verticalAlignment":"center","style":{"spacing":{"padding":{"top":"0","bottom":"0"},"blockGap":"3px"}}} -->
    <div class="wp-block-column is-vertically-aligned-center" style="padding-top:0;padding-bottom:0"><!-- wp:paragraph {"align":"left","className":"author-name","style":{"typography":{"fontStyle":"normal","fontWeight":"700"},"elements":{"link":{"color":{"text":"var:preset|color|tertiary"}}}},"textColor":"tertiary","fontSize":"extra-small"} -->
    <p class="has-text-align-left author-name has-tertiary-color has-text-color has-link-color has-extra-small-font-size" style="font-style:normal;font-weight:700">'. esc_html__('Jacqueline John','marketing-firm').'</p>
    <!-- /wp:paragraph -->
    
    <!-- wp:paragraph {"align":"left","style":{"typography":{"fontStyle":"normal","fontWeight":"400","fontSize":"13px"},"elements":{"link":{"color":{"text":"var:preset|color|tertiary"}}}},"textColor":"tertiary","fontFamily":"urbanist"} -->
    <p class="has-text-align-left has-tertiary-color has-text-color has-link-color has-urbanist-font-family" style="font-size:13px;font-style:normal;font-weight:400">'. esc_html__('Manager','marketing-firm').'</p>
    <!-- /wp:paragraph --></div>
    <!-- /wp:column --></div>
    <!-- /wp:columns --></div>
    <!-- /wp:group --></div>
    <!-- /wp:column --></div>
    <!-- /wp:columns -->
    
    <!-- wp:group {"className":"banner-right-top","layout":{"type":"constrained"}} -->
    <div class="wp-block-group banner-right-top"><!-- wp:image {"id":212,"width":"auto","height":"550px","sizeSlug":"full","linkDestination":"none"} -->
    <figure class="wp-block-image size-full is-resized"><img src="'.esc_url(get_template_directory_uri()) .'/assets/images/banner-img.png" alt="" class="wp-image-212" style="width:auto;height:550px"/></figure>
    <!-- /wp:image --></div>
    <!-- /wp:group --></div>
    <!-- /wp:column --></div>
    <!-- /wp:columns --></div></div>
    <!-- /wp:cover --></div>
    <!-- /wp:group -->',
    );