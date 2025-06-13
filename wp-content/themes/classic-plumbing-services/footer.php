<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Classic Plumbing Services
 */
?>
<div id="footer">
  <?php 
    $classic_plumbing_services_footer_widget_enabled = get_theme_mod('classic_plumbing_services_footer_widget', true);
    if ($classic_plumbing_services_footer_widget_enabled !== false && $classic_plumbing_services_footer_widget_enabled !== '') { ?>
    <?php 
        $classic_plumbing_services_widget_areas = get_theme_mod('classic_plumbing_services_footer_widget_areas', '4');
        if ($classic_plumbing_services_widget_areas == '3') {
            $classic_plumbing_services_cols = 'col-lg-4 col-md-6';
        } elseif ($classic_plumbing_services_widget_areas == '4') {
            $classic_plumbing_services_cols = 'col-lg-3 col-md-6';
        } elseif ($classic_plumbing_services_widget_areas == '2') {
            $classic_plumbing_services_cols = 'col-lg-6 col-md-6';
        } else {
            $classic_plumbing_services_cols = 'col-lg-12 col-md-12';
        }
    ?>
    <div class="footer-widget">
        <div class="container">
          <div class="row">
            <!-- Footer 1 -->
            <div class="<?php echo esc_attr($classic_plumbing_services_cols); ?> footer-block">
                <?php if (is_active_sidebar('footer-1')) : ?>
                    <?php dynamic_sidebar('footer-1'); ?>
                <?php else : ?>
                    <aside id="categories" class="widget py-3" role="complementary" aria-label="<?php esc_attr_e('footer1', 'classic-plumbing-services'); ?>">
                        <h3 class="widget-title"><?php esc_html_e('Categories', 'classic-plumbing-services'); ?></h3>
                        <ul>
                            <?php wp_list_categories('title_li='); ?>
                        </ul>
                    </aside>
                <?php endif; ?>
            </div>

            <!-- Footer 2 -->
            <div class="<?php echo esc_attr($classic_plumbing_services_cols); ?> footer-block">
                <?php if (is_active_sidebar('footer-2')) : ?>
                    <?php dynamic_sidebar('footer-2'); ?>
                <?php else : ?>
                    <aside id="archives" class="widget py-3" role="complementary" aria-label="<?php esc_attr_e('footer2', 'classic-plumbing-services'); ?>">
                        <h3 class="widget-title"><?php esc_html_e('Archives', 'classic-plumbing-services'); ?></h3>
                        <ul>
                            <?php wp_get_archives(array('type' => 'monthly')); ?>
                        </ul>
                    </aside>
                <?php endif; ?>
            </div>

            <!-- Footer 3 -->
            <div class="<?php echo esc_attr($classic_plumbing_services_cols); ?> footer-block">
                <?php if (is_active_sidebar('footer-3')) : ?>
                    <?php dynamic_sidebar('footer-3'); ?>
                <?php else : ?>
                    <aside id="meta" class="widget py-3" role="complementary" aria-label="<?php esc_attr_e('footer3', 'classic-plumbing-services'); ?>">
                        <h3 class="widget-title"><?php esc_html_e('Meta', 'classic-plumbing-services'); ?></h3>
                        <ul>
                            <?php wp_register(); ?>
                            <li><?php wp_loginout(); ?></li>
                            <?php wp_meta(); ?>
                        </ul>
                    </aside>
                <?php endif; ?>
            </div>

            <!-- Footer 4 -->
            <div class="<?php echo esc_attr($classic_plumbing_services_cols); ?> footer-block">
                <?php if (is_active_sidebar('footer-4')) : ?>
                    <?php dynamic_sidebar('footer-4'); ?>
                <?php else : ?>
                    <aside id="search-widget" class="widget py-3" role="complementary" aria-label="<?php esc_attr_e('footer4', 'classic-plumbing-services'); ?>">
                        <h3 class="widget-title"><?php esc_html_e('Search', 'classic-plumbing-services'); ?></h3>
                        <?php the_widget('WP_Widget_Search'); ?>
                    </aside>
                <?php endif; ?>
            </div>
          </div>
        </div>
    </div>

    <?php } ?>
    <div class="clear"></div>
    <div class="copywrap text-center">
        <div class="container">
            <p>
                <a href="<?php 
                $classic_plumbing_services_copyright_link = get_theme_mod('classic_plumbing_services_copyright_link', '');
                if (empty($classic_plumbing_services_copyright_link)) {
                    echo esc_url('https://www.theclassictemplates.com/products/classic-plumbing-services');
                } else {
                    echo esc_url($classic_plumbing_services_copyright_link);
                } ?>" target="_blank">
                <?php echo esc_html(get_theme_mod('classic_plumbing_services_copyright_line', __('Classic Plumbing Services WordPress Theme', 'classic-plumbing-services'))); ?>
                </a> 
                <?php echo esc_html('By Classic Templates', 'classic-plumbing-services'); ?>
            </p>
        </div>
    </div>
</div>

<?php if(get_theme_mod('classic_plumbing_services_scroll_hide',true)){ ?>
    <a id="button"><?php echo esc_html( get_theme_mod('classic_plumbing_services_scroll_text',__('TOP', 'classic-plumbing-services' )) ); ?></a>
<?php } ?>
  
<?php wp_footer(); ?>
</body>
</html>
