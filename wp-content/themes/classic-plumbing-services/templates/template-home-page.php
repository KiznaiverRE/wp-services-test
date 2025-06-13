<?php
/**
 * The Template Name: Home Page
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Classic Plumbing Services
 */

get_header(); ?>

<div id="content" >
    <?php
        $classic_plumbing_services_hidepageboxes = get_theme_mod('classic_plumbing_services_banner', false);
        if ($classic_plumbing_services_hidepageboxes) { ?>
        <section id="banner-cat" class="py-3">
            <div class="banner-main-box position-relative">
                <?php if (get_theme_mod('classic_plumbing_services_banner_title') != "") { ?>
                    <h1 class="banner-title text-capitalize text-center position-relative"><?php echo esc_html(get_theme_mod('classic_plumbing_services_banner_title')); ?></h1>
                <?php } ?>
                <div class="banner-bg text-center"></div>
                <div class="banner-content position-absolute">
                    <div class="row inner-banner-content">
                        <div class="col-xl-4 col-lg-4 col-md-4 col-12 align-self-center banner-left-box ps-xl-5 ps-lg-3 ps-md-3">
                            <?php 
                                for ($classic_plumbing_services_i=0; $classic_plumbing_services_i < 3; $classic_plumbing_services_i++)
                                if (get_theme_mod('classic_plumbing_services_banner_left_title' .$classic_plumbing_services_i) != "" || get_theme_mod('classic_plumbing_services_banner_left_content' .$classic_plumbing_services_i) != "") { ?>
                                <div class="row">
                                    <div class="col-xl-10 col-lg-10 col-md-10 col-10 align-self-center">
                                        <a href="<?php echo esc_url(get_theme_mod('classic_plumbing_services_banner_left_title_link' .$classic_plumbing_services_i)); ?>"><h6 class="banner-left-title text-capitalize text-end"><?php echo esc_html(get_theme_mod('classic_plumbing_services_banner_left_title' .$classic_plumbing_services_i)); ?></h6></a>
                                        
                                        <p class="banner-left-cont text-end mb-0"><?php echo esc_html(get_theme_mod('classic_plumbing_services_banner_left_content' .$classic_plumbing_services_i)); ?></p>
                                    </div>
                                    <div class="col-xl-2 col-lg-2 col-md-2 col-2 align-self-center icon-box px-0 d-flex justify-content-lg-start justify-content-md-start justify-content-center">
                                        <i class="<?php echo esc_attr(get_theme_mod('classic_plumbing_services_left_services_icon' .$classic_plumbing_services_i, 'fa-solid fa-faucet-drip')); ?>"></i>
                                    </div>
                                </div>
                            <?php }?>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-4 col-12 align-self-center banner-mid-box text-center">
                            <?php if (get_theme_mod('classic_plumbing_services_banner_middle_img')) { ?>
                                <img src="<?php echo esc_url(get_theme_mod('classic_plumbing_services_banner_middle_img')); ?>" alt="<?php echo esc_attr( 'Middle Image', 'classic-plumbing-services'); ?>"/> 
                            <?php } ?>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-4 col-12 align-self-center banner-right-box pe-xl-5 pe-lg-3 pe-md-3">
                            <?php 
                                for ($classic_plumbing_services_j=0; $classic_plumbing_services_j < 3; $classic_plumbing_services_j++)
                                if (get_theme_mod('classic_plumbing_services_banner_right_title' .$classic_plumbing_services_j) != "" || get_theme_mod('classic_plumbing_services_banner_right_content' .$classic_plumbing_services_j) != "") { ?>
                                <div class="row">
                                    <div class="col-xl-2 col-lg-2 col-md-2 col-2 align-self-center icon-box px-0 d-flex justify-content-lg-end justify-content-md-end justify-content-center">
                                        <i class="<?php echo esc_attr(get_theme_mod('classic_plumbing_services_right_services_icon' .$classic_plumbing_services_j, 'fa-solid fa-faucet-drip')); ?>"></i>
                                    </div>
                                    <div class="col-xl-10 col-lg-10 col-md-10 col-10 align-self-center">
                                        <a href="<?php echo esc_url(get_theme_mod('classic_plumbing_services_banner_right_title_link' .$classic_plumbing_services_j)); ?>"><h6 class="banner-right-title text-capitalize text-start"><?php echo esc_html(get_theme_mod('classic_plumbing_services_banner_right_title' .$classic_plumbing_services_j)); ?></h6></a>
                                        
                                        <p class="banner-right-cont text-start mb-0"><?php echo esc_html(get_theme_mod('classic_plumbing_services_banner_right_content' .$classic_plumbing_services_j)); ?></p>
                                    </div>
                                </div>
                            <?php }?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php } ?>

    <!-- About Section -->
    <?php
    $classic_plumbing_services_hidepageboxes = get_theme_mod('classic_plumbing_services_disabled_about_section', false);
    $classic_plumbing_services_select_about_page = get_theme_mod('classic_plumbing_services_select_about_page', false);

    if ($classic_plumbing_services_hidepageboxes && $classic_plumbing_services_select_about_page) { ?>
        <div id="about-section" class="mt-3 mb-5">
            <?php
            $classic_plumbing_services_about_page_id = esc_attr(get_theme_mod('classic_plumbing_services_select_about_page', false));
            if ($classic_plumbing_services_about_page_id) {
                $classic_plumbing_services_querymed = new WP_Query(array(
                    'page_id' => $classic_plumbing_services_about_page_id
                ));
                
                while ($classic_plumbing_services_querymed->have_posts()) : $classic_plumbing_services_querymed->the_post(); ?>
                    <div class="container">
                        <div class="row m-0">
                            <div class="col-xl-6 col-lg-6 col-md-12 about-featured position-relative">
                                <?php if (get_theme_mod('classic_plumbing_services_industrial_title') != "" || get_theme_mod('classic_plumbing_services_industrial_text') != "") { ?>
                                    <div class="industrial-main-box position-absolute">
                                        <div class="industrial-box text-center px-3 py-4 position-relative">
                                            <h3 class="industrial-title text-capitalize position-relative"><?php echo esc_html(get_theme_mod('classic_plumbing_services_industrial_title')); ?></h3>
                                            <p class="industrial-text mb-0 mt-3"><?php echo esc_html(get_theme_mod('classic_plumbing_services_industrial_text')); ?></p>
                                        </div>
                                    </div>
                                <?php } ?>
                                <?php if (has_post_thumbnail()) : ?>
                                    <div class="img-box text-lg-end text-md-end text-center">
                                        <?php the_post_thumbnail('full'); ?>
                                    </div>
                                <?php else : ?>
                                    <div class="post-color"></div>
                                <?php endif; ?>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-12 pt-2">
                                <div class="text-inner-box">
                                    <h2 class="about-title text-capitalize text-lg-start text-md-start text-center"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                    <p class="about-para mb-5 text-lg-start text-md-start text-center"><?php echo esc_html(wp_trim_words(get_the_content(), 75, '')); ?></p>
                                    <div class="row">
                                        <?php 
                                        for ($classic_plumbing_services_i = 1; $classic_plumbing_services_i <= 5; $classic_plumbing_services_i++) { 
                                            $classic_plumbing_services_sentence = get_theme_mod('classic_plumbing_services_about_sentence' . $classic_plumbing_services_i);
                                            if ($classic_plumbing_services_sentence != '') { ?>
                                                <div class="col-lg-6 col-md-6 d-flex align-items-center gap-2 mb-3 highlight-text justify-content-center justify-content-lg-start justify-content-md-start">
                                                    <i class="fa-regular fa-circle-check"></i><p class="text-capitalize mb-0"><?php echo esc_html($classic_plumbing_services_sentence); ?></p>
                                                </div>
                                            <?php } 
                                        } ?>
                                    </div>
                                    <?php if (get_theme_mod('classic_plumbing_services_experince_text') != "" || get_theme_mod('classic_plumbing_services_experince_count') != "") { ?>
                                        <div class="experience-box d-flex justify-content-center align-items-center gap-3 p-1">
                                            <p class="experience-no mb-0 py-1 px-3"><?php echo esc_html(get_theme_mod('classic_plumbing_services_experince_count')); ?></p>
                                            <p class="experience-text text-capitalize mb-0"><?php echo esc_html(get_theme_mod('classic_plumbing_services_experince_text')); ?></p>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile;
                wp_reset_postdata();
            }
            ?>
        </div>
    <?php } ?>
</div>
<?php get_footer(); ?>