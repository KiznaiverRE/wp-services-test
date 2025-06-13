<?php
/**
 * Header Default
 * 
 * slug: marketing-firm/header-default
 * title: Header Default
 * categories: marketing-firm
 */

return array(
    'title'      =>__( 'Header Default', 'marketing-firm' ),
    'categories' => array( 'marketing-firm' ),
    'content'    => '<!-- wp:group {"className":"header-box-upper","style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"}}},"backgroundColor":"background","layout":{"type":"constrained","contentSize":"100%"}} -->
<div class="wp-block-group header-box-upper has-background-background-color has-background" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"blockGap":{"left":"0"},"padding":{"right":"0","left":"0","top":"var:preset|spacing|20","bottom":"var:preset|spacing|20"}},"border":{"radius":"0px"}}} -->
<div class="wp-block-columns are-vertically-aligned-center" style="border-radius:0px;padding-top:var(--wp--preset--spacing--20);padding-right:0;padding-bottom:var(--wp--preset--spacing--20);padding-left:0"><!-- wp:column {"verticalAlignment":"center","width":"10%","className":"left-empty"} -->
<div class="wp-block-column is-vertically-aligned-center left-empty" style="flex-basis:10%"></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","width":"80%","className":"inner-menu-col inner-header","style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"var:preset|spacing|20","right":"var:preset|spacing|20"}},"border":{"radius":"30px","width":"1px"}},"backgroundColor":"background"} -->
<div class="wp-block-column is-vertically-aligned-center inner-menu-col inner-header has-background-background-color has-background" style="border-width:1px;border-radius:30px;padding-top:0;padding-right:var(--wp--preset--spacing--20);padding-bottom:0;padding-left:var(--wp--preset--spacing--20);flex-basis:80%"><!-- wp:columns {"className":"menu-group","style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"0"},"blockGap":{"left":"var:preset|spacing|20"}},"border":{"radius":{"bottomLeft":"10px","bottomRight":"10px","topLeft":"10px","topRight":"10px"}}}} -->
<div class="wp-block-columns menu-group" style="border-top-left-radius:10px;border-top-right-radius:10px;border-bottom-left-radius:10px;border-bottom-right-radius:10px;margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:column {"verticalAlignment":"center","width":"25%","className":"header-logo","style":{"spacing":{"padding":{"left":"var:preset|spacing|40","right":"var:preset|spacing|40","top":"8px","bottom":"8px"},"blockGap":"0"},"elements":{"link":{"color":{"text":"var:preset|color|primary"}}}},"textColor":"primary"} -->
<div class="wp-block-column is-vertically-aligned-center header-logo has-primary-color has-text-color has-link-color" style="padding-top:8px;padding-right:var(--wp--preset--spacing--40);padding-bottom:8px;padding-left:var(--wp--preset--spacing--40);flex-basis:25%"><!-- wp:site-title {"style":{"elements":{"link":{"color":{"text":"var:preset|color|primary"}}},"typography":{"fontSize":"23px","fontStyle":"normal","fontWeight":"600"}},"textColor":"primary","fontFamily":"urbanist"} /--></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","width":"","className":"header-inner-menu","style":{"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}}}} -->
<div class="wp-block-column is-vertically-aligned-center header-inner-menu" style="padding-top:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30)"><!-- wp:navigation {"textColor":"primary","icon":"menu","metadata":{"ignoredHookedBlocks":["woocommerce/customer-account","woocommerce/mini-cart"]},"className":"is-head-menu","style":{"typography":{"textTransform":"capitalize","fontStyle":"normal","fontWeight":"600"}},"fontSize":"small","fontFamily":"syne","layout":{"type":"flex","justifyContent":"left"}} --><!-- wp:navigation-link {"label":"Home","type":"","url":"#","kind":"custom","isTopLevelLink":true} /-->

    <!-- wp:navigation-link {"label":"About Us","type":"","url":"#aboutus","kind":"custom","isTopLevelLink":true} /-->
    
    <!-- wp:navigation-link {"label":"Services","type":"","url":"#","kind":"custom","isTopLevelLink":true} /-->

    <!-- wp:navigation-link {"label":"Pages","type":"","url":"#","kind":"custom","isTopLevelLink":true} /-->

    <!-- wp:navigation-link {"label":"Blogs","type":"","url":"#blog","kind":"custom","isTopLevelLink":true} /-->

    <!-- wp:navigation-link {"label":"Get Pro","type":"","url":"https://www.wpradiant.net/products/marketing-agency-wordpress-theme","kind":"custom","isTopLevelLink":true,"className":"getpro"} /-->

    <!-- /wp:navigation --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","width":"186px","className":"toggler_icon_col","style":{"spacing":{"padding":{"right":"0","left":"0"},"blockGap":"0"}}} -->
<div class="wp-block-column is-vertically-aligned-center toggler_icon_col" style="padding-right:0;padding-left:0;flex-basis:186px"><!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|20"},"padding":{"right":"0","left":"0"}}}} -->
<div class="wp-block-columns are-vertically-aligned-center" style="padding-right:0;padding-left:0"><!-- wp:column {"verticalAlignment":"center","style":{"spacing":{"padding":{"top":"0","bottom":"0"},"blockGap":"5px"}}} -->
<div class="wp-block-column is-vertically-aligned-center" style="padding-top:0;padding-bottom:0"><!-- wp:paragraph {"align":"right","style":{"typography":{"fontStyle":"normal","fontWeight":"600","fontSize":"12px"}},"fontFamily":"urbanist"} -->
<p class="has-text-align-right has-urbanist-font-family" style="font-size:12px;font-style:normal;font-weight:600">'. esc_html__('Call Us Now','marketing-firm').'</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"align":"right","style":{"typography":{"fontStyle":"normal","fontWeight":"700"}},"fontSize":"small"} -->
<p class="has-text-align-right has-small-font-size" style="font-style:normal;font-weight:700"><a href="tel:12 3456789123">'. esc_html__('+12 3456789123','marketing-firm').'</a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","width":"40px","className":"call-icon","style":{"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30","right":"var:preset|spacing|30"}},"border":{"radius":"100px"}},"backgroundColor":"accent"} -->
<div class="wp-block-column is-vertically-aligned-center call-icon has-accent-background-color has-background" style="border-radius:100px;padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30);flex-basis:40px"><!-- wp:image {"id":31,"width":"20px","height":"20px","scale":"contain","sizeSlug":"full","linkDestination":"none","align":"center"} -->
<figure class="wp-block-image aligncenter size-full is-resized"><img src="'.esc_url(get_template_directory_uri()) .'/assets/images/phone.png" alt="" class="wp-image-31" style="object-fit:contain;width:20px;height:20px"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","width":"10%","className":"right-empty"} -->
<div class="wp-block-column is-vertically-aligned-center right-empty" style="flex-basis:10%"></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->',
    );