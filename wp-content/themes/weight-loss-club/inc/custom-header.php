<?php
/**
 * @package Weight Loss Club
 * Setup the WordPress core custom header feature.
 *
 * @uses weight_loss_club_header_style()
 */
function weight_loss_club_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'weight_loss_club_custom_header_args', array(
		'default-text-color'     => 'fff',
		'width'                  => 2500,
		'height'                 => 300,
		'wp-head-callback'       => 'weight_loss_club_header_style',
	) ) );
}
add_action( 'after_setup_theme', 'weight_loss_club_custom_header_setup' );

if ( ! function_exists( 'weight_loss_club_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see weight_loss_club_custom_header_setup().
 */
function weight_loss_club_header_style() {
    $weight_loss_club_header_image = get_header_image() ?: get_template_directory_uri() . '/images/headerimg.png';

    $weight_loss_club_custom_css = "
        .box-image .single-page-img {
            background-image: url('{$weight_loss_club_header_image}');
            background-repeat: no-repeat;
            background-position: center bottom;
            background-size: cover !important;
            height: 300px;
        }

        h1.site-title a, p.site-title a {
            color: " . esc_attr(get_theme_mod('weight_loss_club_sitetitle_color')) . " !important;
        }

        .site-description {
            color: " . esc_attr(get_theme_mod('weight_loss_club_sitetagline_color')) . " !important;
        }

        .main-nav ul li a {
            color: " . esc_attr(get_theme_mod('weight_loss_club_menu_color')) . " !important;
        }

        .main-nav a:hover {
            color: " . esc_attr(get_theme_mod('weight_loss_club_menuhrv_color')) . " !important;
        }

        .main-nav ul ul a {
            color: " . esc_attr(get_theme_mod('weight_loss_club_submenu_color')) . " !important;
        }

        .main-nav ul ul a:hover {
            color: " . esc_attr(get_theme_mod('weight_loss_club_submenuhrv_color')) . " !important;
        }

        .copywrap, .copywrap a {
            color: " . esc_attr(get_theme_mod('weight_loss_club_footercoypright_color')) . " !important;
        }

        #footer h3 {
            color: " . esc_attr(get_theme_mod('weight_loss_club_footertitle_color')) . " !important;
        }

        #footer p {
            color: " . esc_attr(get_theme_mod('weight_loss_club_footerdescription_color')) . ";
        }

        #footer ul li a {
            color: " . esc_attr(get_theme_mod('weight_loss_club_footerlist_color')) . ";
        }

        #footer {
            background-color: " . esc_attr(get_theme_mod('weight_loss_club_footerbg_color')) . ";
        }
    ";

    // Attach to your main stylesheet (make sure this handle matches the one you registered)
    wp_add_inline_style('weight-loss-club-style', $weight_loss_club_custom_css);
}
endif;
add_action('wp_enqueue_scripts', 'weight_loss_club_header_style');