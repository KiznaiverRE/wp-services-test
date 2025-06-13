<?php
/**
 * FAQ Section
 * 
 * slug: marketing-firm/faq-section
 * title: FAQ Section
 * categories: marketing-firm
 */

    return array(
        'title'      =>__( 'FAQ Section', 'marketing-firm' ),
        'categories' => array( 'marketing-firm' ),
        'content'    => '<!-- wp:group {"className":"faq-section","style":{"spacing":{"margin":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}}},"layout":{"type":"constrained","contentSize":"80%"}} -->
    <div class="wp-block-group faq-section" style="margin-top:var(--wp--preset--spacing--30);margin-bottom:var(--wp--preset--spacing--30)"><!-- wp:columns {"style":{"spacing":{"blockGap":{"left":"var:preset|spacing|60"}}}} -->
    <div class="wp-block-columns"><!-- wp:column {"className":"faq-left wow fadeInLeft","style":{"spacing":{"blockGap":"var:preset|spacing|30"}}} -->
    <div class="wp-block-column faq-left wow fadeInLeft"><!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|accent"}}},"typography":{"fontStyle":"normal","fontWeight":"600"}},"textColor":"accent","fontSize":"medium","fontFamily":"urbanist"} -->
    <p class="has-accent-color has-text-color has-link-color has-urbanist-font-family has-medium-font-size" style="font-style:normal;font-weight:600">'. esc_html__('Frequently Asked Questions','marketing-firm').'</p>
    <!-- /wp:paragraph -->

    <!-- wp:heading {"style":{"typography":{"fontStyle":"normal","fontWeight":"800","fontSize":"26px"},"elements":{"link":{"color":{"text":"var:preset|color|primary"}}}},"textColor":"primary","fontFamily":"urbanist"} -->
    <h2 class="wp-block-heading has-primary-color has-text-color has-link-color has-urbanist-font-family" style="font-size:26px;font-style:normal;font-weight:800">'. esc_html__('Have Any Questions For Us?','marketing-firm').'</h2>
    <!-- /wp:heading -->

    <!-- wp:paragraph {"className":"short-para-text","style":{"typography":{"fontStyle":"normal","fontWeight":"400","lineHeight":"1.7"},"elements":{"link":{"color":{"text":"var:preset|color|primary"}}}},"textColor":"primary","fontSize":"extra-small","fontFamily":"rubik"} -->
    <p class="short-para-text has-primary-color has-text-color has-link-color has-rubik-font-family has-extra-small-font-size" style="font-style:normal;font-weight:400;line-height:1.7">'. esc_html__('Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s','marketing-firm').'</p>
    <!-- /wp:paragraph -->

    <!-- wp:image {"id":6,"sizeSlug":"full","linkDestination":"none"} -->
    <figure class="wp-block-image size-full"><img src="'.esc_url(get_template_directory_uri()) .'/assets/images/FAQ.png" alt="" class="wp-image-6"/></figure>
    <!-- /wp:image --></div>
    <!-- /wp:column -->

    <!-- wp:column {"className":"faq-right wow fadeInRight","style":{"spacing":{"blockGap":"var:preset|spacing|40"}}} -->
    <div class="wp-block-column faq-right wow fadeInRight"><!-- wp:details {"showContent":true,"className":"faq-list"} -->
    <details class="wp-block-details faq-list" open><summary>'. esc_html__('What services does your agency offer?','marketing-firm').'</summary><!-- wp:paragraph {"placeholder":"Type / to add a hidden block"} -->
    <p>'. esc_html__('Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.','marketing-firm').'</p>
    <!-- /wp:paragraph --></details>
    <!-- /wp:details -->

    <!-- wp:details {"className":"faq-list"} -->
    <details class="wp-block-details faq-list"><summary>'. esc_html__('Who do you work with?','marketing-firm').'</summary><!-- wp:paragraph {"placeholder":"Type / to add a hidden block"} -->
    <p>'. esc_html__('Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.','marketing-firm').'</p>
    <!-- /wp:paragraph --></details>
    <!-- /wp:details -->

    <!-- wp:details {"className":"faq-list"} -->
    <details class="wp-block-details faq-list"><summary>'. esc_html__('Do you offer customized marketing packages?','marketing-firm').'</summary><!-- wp:paragraph {"placeholder":"Type / to add a hidden block"} -->
    <p>'. esc_html__('Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.','marketing-firm').'</p>
    <!-- /wp:paragraph --></details>
    <!-- /wp:details -->

    <!-- wp:details {"className":"faq-list"} -->
    <details class="wp-block-details faq-list"><summary>'. esc_html__('Can you help us improve our SEO rankings?','marketing-firm').'</summary><!-- wp:paragraph {"placeholder":"Type / to add a hidden block"} -->
    <p>'. esc_html__('Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.','marketing-firm').'</p>
    <!-- /wp:paragraph --></details>
    <!-- /wp:details -->

    <!-- wp:details {"className":"faq-list"} -->
    <details class="wp-block-details faq-list"><summary>'. esc_html__('Do you manage social media accounts?','marketing-firm').'</summary><!-- wp:paragraph {"placeholder":"Type / to add a hidden block"} -->
    <p>'. esc_html__('Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.','marketing-firm').'</p>
    <!-- /wp:paragraph --></details>
    <!-- /wp:details --></div>
    <!-- /wp:column --></div>
    <!-- /wp:columns --></div>
    <!-- /wp:group -->

    <!-- wp:spacer {"height":"80px"} -->
    <div style="height:80px" aria-hidden="true" class="wp-block-spacer"></div>
    <!-- /wp:spacer -->',
    );