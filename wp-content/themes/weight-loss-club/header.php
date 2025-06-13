<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div class="container">
 *
 * @package Weight Loss Club
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php if ( function_exists( 'wp_body_open' ) ) {
  wp_body_open();
} else {
  do_action( 'wp_body_open' );
} ?>

<?php if ( get_theme_mod('weight_loss_club_preloader', false) != "") { ?>
  <div id="preloader">
    <div id="status">&nbsp;</div>
  </div>
<?php }?>

<a class="screen-reader-text skip-link" href="#content"><?php esc_html_e( 'Skip to content', 'weight-loss-club' ); ?></a>

<div id="pageholder" <?php if( get_theme_mod( 'weight_loss_club_box_layout', false) != "" ) { echo 'class="boxlayout"'; } ?>>

<div class="mainhead<?php if( get_theme_mod( 'weight_loss_club_stickyheader', false) == 1) { ?> is-sticky-on"<?php } else { ?>close-sticky <?php } ?>">
  <div class="main-header">
    <div class="container p-0">
      <div class="header-bg px-3">
        <div class="row">
          <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-5 col-12 align-self-center py-1">
            <div class="logo">
              <?php if (get_theme_mod('weight_loss_club_logo_enable', true)) { ?>
                <?php weight_loss_club_the_custom_logo(); ?>
              <?php } ?>
              <div class="site-branding-text">
                <?php if (get_theme_mod('weight_loss_club_title_enable', false)) { ?>
                  <?php if (is_front_page() && is_home()) : ?>
                    <h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a></h1>
                  <?php else : ?>
                    <p class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a></p>
                  <?php endif; ?>
                <?php } ?>
                <?php $weight_loss_club_description = get_bloginfo('description', 'display');
                if ($weight_loss_club_description || is_customize_preview()) : ?>
                  <?php if (get_theme_mod('weight_loss_club_tagline_enable', false)) { ?>
                    <span class="site-description"><?php echo esc_html($weight_loss_club_description); ?></span>
                  <?php } ?>
                <?php endif; ?>
              </div>
            </div>
          </div>
          <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8 col-sm-7 col-12 align-items-center ps-0 d-flex justify-content-between">
            <div class="menu-sec">
              <div class="toggle-nav text-center">
                <?php if (has_nav_menu('primary')) { ?>
                  <button role="tab"><?php esc_html_e('Menu', 'weight-loss-club'); ?></button>
                <?php } ?>
              </div>
              <div id="mySidenav" class="nav sidenav">
                <nav id="site-navigation" class="main-nav" role="navigation" aria-label="<?php esc_attr_e('Top Menu', 'weight-loss-club'); ?>">
                  <ul class="mobile_nav">
                    <?php wp_nav_menu(array(
                      'theme_location' => 'primary',
                      'container_class' => 'main-menu',
                      'items_wrap' => '%3$s',
                      'fallback_cb' => 'wp_page_menu',
                    )); ?>
                  </ul>
                  <a href="javascript:void(0)" class="close-button"><?php esc_html_e('CLOSE', 'weight-loss-club'); ?></a>
                </nav>
              </div>
            </div>
            <div class="top-search">
              <div class="main-search">
                <span class="search-box text-center">
                  <button type="button" class="search-open"><i class="fas fa-search"></i></button>
                </span>
              </div>
              <div class="search-outer">
                <div class="serach_inner w-100 h-100">
                  <?php get_search_form(); ?>
                </div>
                <button type="button" class="search-close"><span>X</span></button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>