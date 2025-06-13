<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div class="container">
 *
 * @package Classic Plumbing Services
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

<?php if ( get_theme_mod('classic_plumbing_services_preloader', false) != "") { ?>
  <div id="preloader">
    <div id="status">&nbsp;</div>
  </div>
<?php }?>

<a class="screen-reader-text skip-link" href="#content"><?php esc_html_e( 'Skip to content', 'classic-plumbing-services' ); ?></a>

<div id="pageholder" <?php if( get_theme_mod( 'classic_plumbing_services_box_layout', false) != "" ) { echo 'class="boxlayout"'; } ?>>

<div class="mainhead<?php if( get_theme_mod( 'classic_plumbing_services_stickyheader', false) == 1) { ?> is-sticky-on"<?php } else { ?>close-sticky <?php } ?>">
  <div class="main-header">
    <?php if (get_theme_mod('classic_plumbing_services_topbar_text') != "") { ?>
      <div class="topbar py-2">
        <div class="container">
            <p class="topbar-text text-center mb-0"><?php echo esc_html(get_theme_mod('classic_plumbing_services_topbar_text')); ?></p>
        </div>
      </div>
    <?php }?>
    <div class="menu-header position-relative">
      <div class="container">
        <div class="inner-header py-3">
          <div class="row">
            <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-3 col-12 align-self-center">
              <div class="logo">
                <?php classic_plumbing_services_the_custom_logo(); ?>
                <div class="site-branding-text">
                  <?php if (get_theme_mod('classic_plumbing_services_title_enable', false)) { ?>
                    <?php if (is_front_page() && is_home()) : ?>
                      <h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a></h1>
                    <?php else : ?>
                      <p class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a></p>
                    <?php endif; ?>
                  <?php } ?>
                  <?php $classic_plumbing_services_description = get_bloginfo('description', 'display');
                  if ($classic_plumbing_services_description || is_customize_preview()) : ?>
                    <?php if (get_theme_mod('classic_plumbing_services_tagline_enable', false)) { ?>
                      <span class="site-description"><?php echo esc_html($classic_plumbing_services_description); ?></span>
                    <?php } ?>
                  <?php endif; ?>
                </div>
              </div>
            </div>
            <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-6 col-sm-4 col-5 align-self-center">
              <div class="menu-sec">
                <div class="toggle-nav text-start ps-1">
                  <?php if (has_nav_menu('primary')) { ?>
                    <button role="tab"><?php esc_html_e('Menu', 'classic-plumbing-services'); ?></button>
                  <?php } ?>
                </div>
                <div id="mySidenav" class="nav sidenav">
                  <nav id="site-navigation" class="main-nav" role="navigation" aria-label="<?php esc_attr_e('Top Menu', 'classic-plumbing-services'); ?>">
                    <ul class="mobile_nav">
                      <?php wp_nav_menu(array(
                        'theme_location' => 'primary',
                        'container_class' => 'main-menu',
                        'items_wrap' => '%3$s',
                        'fallback_cb' => 'wp_page_menu',
                      )); ?>
                    </ul>
                    <a href="javascript:void(0)" class="close-button"><?php esc_html_e('CLOSE', 'classic-plumbing-services'); ?></a>
                  </nav>
                </div>
              </div>
            </div>
            <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-4 col-sm-5 col-7 align-self-center text-end">
              <?php if (get_theme_mod('classic_plumbing_services_phone_number') != "") { ?>
                <div class="phone-box">
                  <i class="fa-solid fa-phone"></i><a class="phone-no ms-2" href="tel:<?php echo esc_attr( get_theme_mod('classic_plumbing_services_phone_number')); ?>"><?php echo esc_html(get_theme_mod ('classic_plumbing_services_phone_number')); ?></a>
                </div>
              <?php }?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>