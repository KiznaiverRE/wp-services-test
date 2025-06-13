<?php
/**
 * The Template Name: Home Page
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Weight Loss Club
 */

get_header(); ?>

<div id="content" >
    <?php
        $weight_loss_club_hidepageboxes = get_theme_mod('weight_loss_club_slider', false);
        $weight_loss_club_catData = get_theme_mod('weight_loss_club_slider_cat');
        if ($weight_loss_club_hidepageboxes && $weight_loss_club_catData) { ?>
        <section id="slider-cat" class="position-relative">
            <div class="owl-carousel m-0">
                <?php
                    $weight_loss_club_page_query = new WP_Query(
                        array(
                            'category_name' => esc_attr($weight_loss_club_catData),
                            'posts_per_page' => 3,
                        )
                    );
                    while ($weight_loss_club_page_query->have_posts()) : $weight_loss_club_page_query->the_post(); ?>
                        <div class="slider-content">
                            <div class="text-content position-absolute">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-12 align-self-center post-img-box position-relative">
                                            <?php if(has_post_thumbnail()){
                                                the_post_thumbnail('full', array('class' => 'post-image'));
                                            } else { ?>
                                                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/post-img.png" alt="<?php echo esc_attr( 'slider', 'weight-loss-club'); ?>"/>
                                            <?php } ?>
                                        </div>
                                        <div class="offset-xl-1 offset-lg-1 offset-md-1 col-xl-7 col-lg-7 col-md-7 col-12 align-self-center slider-main-cont">
                                            <?php if (get_theme_mod('weight_loss_club_slider_sub_title') != "") { ?>
                                                <p class="slider-subtitle text-uppercase mb-2"><?php echo esc_html(get_theme_mod('weight_loss_club_slider_sub_title')); ?></p>
                                            <?php } ?>
                                            <h1 class="slider-title text-uppercase mb-2"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                                            <div class="sliderbtn pt-4">
                                                <?php 
                                                    $weight_loss_club_button_text = get_theme_mod('weight_loss_club_button_text', 'READ MORE');
                                                    $weight_loss_club_button_link_slider = get_theme_mod('weight_loss_club_button_link_slider', ''); 
                                                    if (empty($weight_loss_club_button_link_slider)) {
                                                        $weight_loss_club_button_link_slider = esc_url(get_permalink());
                                                    }
                                                    if ($weight_loss_club_button_text || !empty($weight_loss_club_button_link_slider)) { ?>
                                                    <?php if(get_theme_mod('weight_loss_club_button_text', 'READ MORE') != ''){ ?>
                                                        <a href="<?php echo esc_url($weight_loss_club_button_link_slider); ?>" class="post-btn text-uppercase">
                                                            <?php echo esc_html($weight_loss_club_button_text); ?>
                                                            <span class="screen-reader-text"><?php echo esc_html($weight_loss_club_button_text); ?></span>
                                                        </a>
                                                    <?php } ?>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endwhile;
                    wp_reset_postdata();
                ?>
            </div>
        </section>
    <?php } ?>

    <!-- Trainers Section -->
    <?php 
    $weight_loss_club_hide_trainers_section = get_theme_mod('weight_loss_club_disabled_trainers_section', false);
    $weight_loss_club_trainer_category = get_theme_mod('weight_loss_club_trainer_cat', '0');

    if ($weight_loss_club_hide_trainers_section) { ?>
        <section id="trainers-section" class="py-5 position-relative">
            <div class="container">
                <div class="blog-bx mb-4 text-center position-relative">
                    <?php if (get_theme_mod('weight_loss_club_trainers_title') != "") { ?>
                        <h2 class="trainer-main-head text-uppercase pb-3 position-relative">
                            <?php echo esc_html(get_theme_mod('weight_loss_club_trainers_title')); ?>
                        </h2>
                    <?php } ?>
                </div>
                <div class="row">
                    <div class="col-xl-6 col-lg-5 col-md-12 col-12">
                        <div class="video-btn position-relative">
                            <embed width="100%" height="100%" class="video-img position-relative" src="<?php echo esc_url(get_theme_mod('weight_loss_club_video_button_url')); ?>" frameborder="0" allowfullscreen>
                            </embed>
                        </div>
                    </div>
                    <?php if ($weight_loss_club_trainer_category !== '0') : ?>
                        <div class="col-xl-6 col-lg-7 col-md-12 col-12 pb-5">
                            <div class="owl-carousel m-0">
                                <?php
                                $weight_loss_club_page_query = new WP_Query(array(
                                    'category_name' => esc_attr($weight_loss_club_trainer_category),
                                    'posts_per_page' => 3,
                                ));
                                while ($weight_loss_club_page_query->have_posts()) :
                                    $weight_loss_club_page_query->the_post(); ?>
                                    <div class="slider-content position-relative">
                                        <div class="trainer-content">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-xl-6 col-lg-6 col-md-6 col-12 align-self-center trainer-img">
                                                        <?php if (has_post_thumbnail()) {
                                                            the_post_thumbnail('full', array('class' => 'post-image'));
                                                        } else { ?>
                                                            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/post-img1.png" alt="<?php echo esc_attr('Trainer Image', 'weight-loss-club'); ?>"/>
                                                        <?php } ?>
                                                    </div>
                                                    <div class="col-xl-6 col-lg-6 col-md-6 col-12 align-self-center trainer-main-cont text-center pb-5">
                                                        <p class="trainer-excerpt mb-4"><?php echo esc_html(get_the_excerpt()); ?></p>
                                                        <h3 class="trainer-title text-capitalize mb-2">
                                                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                                        </h3>
                                                        <div class="trainer-cat">
                                                            <?php
                                                                $weight_loss_club_cat = get_the_category();
                                                                if (!empty($weight_loss_club_cat)) {
                                                                    echo '<a href="' . esc_url(get_category_link($weight_loss_club_cat[0])) . '">' . esc_html($weight_loss_club_cat[0]->name) . '</a>';
                                                                }
                                                            ?>
                                                        </div>
                                                        <div class="trainerbtn mt-4">
                                                            <a href="<?php the_permalink(); ?>">
                                                                <?php echo esc_html__('READ MORE', 'weight-loss-club'); ?>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endwhile; wp_reset_postdata(); ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </section>
    <?php } ?>
</div>
<?php get_footer(); ?>