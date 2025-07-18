<?php
/**
* Plugin Name: FancyBox for WordPress
* Plugin URI: https://wordpress.org/plugins/fancybox-for-wordpress/
* Description: Integrates <a href="http://fancyapps.com/fancybox/3/">FancyBox 3</a> into WordPress.
* Version: 3.3.7
* Author: Colorlib
* Author URI: https://colorlib.com/wp/
* Tested up to: 6.8
* Requires: 5.6 or higher
* License: GPLv3 or later
* License URI: https://www.gnu.org/licenses/gpl-3.0.html
* Requires PHP: 7.4
* Text Domain: mfbfw
* Domain Path: /languages
*
* Copyright 2008-2016 	Janis Skarnelis 	https://twitter.com/moskis/
* Copyright 2016-2025 	Colorlib 			support@colorlib.com
*
* This program is free software; you can redistribute it and/or modify
* it under the terms of the GNU General Public License, version 3, as
* published by the Free Software Foundation.
*
* This program is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
* GNU General Public License for more details.
*
* You should have received a copy of the GNU General Public License
* along with this program; if not, write to the Free Software
* Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/


/**
 * Plugin Init
 */
// Constants
define( 'FBFW_VERSION', '3.3.7' );
define( 'FBFW_PATH', plugin_dir_path( __FILE__ ) );
define( 'FBFW_URL', plugin_dir_url( __FILE__ ) );
define( 'FBFW_PLUGIN_BASE', plugin_basename( __FILE__ ) );
define( 'FBFW_PREVIOUS_PLUGIN_VERSION', '3.0.14' );
define( 'FBFW_FILE_', __FILE__ );
define( 'PLUGIN_NAME', 'fancybox-for-wordpress' );


// Get Main Settings
$mfbfw         = get_option( 'mfbfw' );
$mfbfw_version = get_option( 'mfbfw_active_version' );

include 'class-fancybox-review.php';

// If previous version detected
if ( is_admin() && isset( $mfbfw_version ) && $mfbfw_version < FBFW_VERSION ) {

	// get default settings and add any new ones to the database
	$current_settings = get_option( 'mfbfw' );
	$default_settings = mfbfw_defaults();
	$new_settings     = (array) $current_settings + (array) $default_settings;
	update_option( 'mfbfw', $new_settings );

	// update version number
	update_option( 'mfbfw_active_version', FBFW_VERSION );
} else {

	// update is not needed, add settings if first time activation
	$default_settings = mfbfw_defaults();
	add_option( 'mfbfw', $default_settings );
	add_option( 'mfbfw_active_version', FBFW_VERSION );
}

/**
 * Store default settings in an array
 */
function mfbfw_defaults() {

	$default_settings = array(
		// Appearance
        'border'                     => '',
        'borderColor'                => '#BBBBBB',
        'paddingColor'               => '#FFFFFF',
        'padding'                    => '10',
        'overlayShow'                => 'on',
        'overlayColor'               => '#666666',
        'overlayOpacity'             => '0.3',
        'titleShow'                  => 'on',
        'captionShow'                => '',
        'titlePosition'              => 'inside',
        'titleColor'                 => '#333333',
        'showNavArrows'              => 'on',
		'disableOnMobile'            => '',
        'titleSize'                  => '14',
        'showCloseButton'            => '',
        'showToolbar'                => 'on',
        // Animations
        'zoomOpacity'                => 'on',
        'zoomSpeedIn'                => '500',
        'zoomSpeedChange'            => '300',
        'transitionIn'               => 'fade',
        'transitionEffect'           => 'fade',
        // Behaviour
        'hideOnOverlayClick'         => 'function(current, event) {
									return current.type === "image" ? "close" : false;
								  },',
		'hideOnContentClick'         => '',
		'zoomOnClick'                => '',
        'enableEscapeButton'         => 'on',
        'cyclic'                     => '',
        'mouseWheel'                 => '',
        'disableWoocommercePages'    => '',
        'disableWoocommerceProducts' => '',
        // Gallery Type
        'galleryType'                => 'all',
        'customExpression'           => 'jQuery(thumbnails).attr("data-fancybox","gallery").getTitle();',
        // Misc
        'autoDimensions'             => 'on',
        'frameWidth'                 => '560',
        'frameHeight'                => '340',
        'loadAtFooter'               => '',
        'callbackEnable'             => '',
        'callbackOnStart'            => 'function() { alert("Start!"); }',
        'callbackOnCancel'           => 'function() { alert("Cancel!"); }',
        'callbackOnComplete'         => 'function() { alert("Complete!"); }',
        'callbackOnCleanup'          => 'function() { alert("CleanUp!"); }',
        'callbackOnClose'            => 'function() { alert("Close!"); }',
        'copyTitleFunction'          => 'var arr = jQuery("a[data-fancybox]");' .
									'jQuery.each(arr, function() {' .
										'var title = jQuery(this).children("img").attr("title");' .
										'if(title){jQuery(this).attr("title",title)}' .
									'});',
        'nojQuery'                   => '',
        'extraCallsEnable'           => '',
        'extraCallsData'             => '',
        'uninstall'                  => '',
	);

	return $default_settings;
}

/**
 * If requested, when plugin is deactivated, remove settings
 */
function mfbfw_deactivate() {

	global $mfbfw;

	if ( isset( $mfbfw['uninstall'] ) && $mfbfw['uninstall'] ) {
		delete_option( 'mfbfw' );
		delete_option( 'mfbfw_active_version' );
	}
}

register_deactivation_hook( __FILE__, 'mfbfw_deactivate' );

/**
 * Load FancyBox JS with jQuery and
 */
function mfbfw_enqueue_scripts() {

	global $mfbfw, $wp_styles;

	if ( (isset( $mfbfw['disableOnMobile'] ) && $mfbfw['disableOnMobile']) && wp_is_mobile() ) {
		return;
	}

	// Check if script should be loaded in footer
	if ( isset( $mfbfw['loadAtFooter'] ) && $mfbfw['loadAtFooter'] ) {
		$footer = true;
	}
	else {
		$footer = false;
	}

	// Check if plugin should not call jQuery script (for troubleshooting only)
	if ( isset( $mfbfw['nojQuery'] ) && $mfbfw['nojQuery'] ) {
		$jquery = array( 'purify' );
	}
	else {
		$jquery = array( 'jquery', 'purify' );
	}

	// Register Scripts
	wp_register_script( 'purify', FBFW_URL . 'assets/js/purify.min.js', array(), '1.3.4', $footer ); // Main Fancybox script
	wp_register_script( 'fancybox-for-wp', FBFW_URL . 'assets/js/jquery.fancybox.js', $jquery, '1.3.4', $footer ); // Main Fancybox script

	// Enqueue Scripts
	wp_enqueue_script( 'fancybox-for-wp' ); // Load fancybox

	if ( isset( $mfbfw['easing'] ) && $mfbfw['easing'] ) {
		wp_enqueue_script( 'jqueryeasing' ); // Load easing javascript file if required
	}

	if ( isset( $mfbfw['wheel'] ) && $mfbfw['wheel'] ) {
		wp_enqueue_script( 'jquerymousewheel' ); // Load mouse wheel javascript file if required
	}

	// Register Styles
	wp_register_style( 'fancybox-for-wp', FBFW_URL . 'assets/css/fancybox.css', false, '1.3.4' ); // Main Fancybox style
	// Enqueue Styles
	wp_enqueue_style( 'fancybox-for-wp' );

	// Make IE specific styles load only on IE6-8
	$wp_styles->add_data( 'fancybox-ie', 'conditional', 'lt IE 9' );
}

add_action( 'wp_enqueue_scripts', 'mfbfw_enqueue_scripts' );

/**
 * Print inline styles and load FancyBox with the selected settings
 */
function mfbfw_init() {

	global $mfbfw, $mfbfw_version;

	//caption function to display image title
	$caption = 'function( instance, item ) {var title = "";' .
	           'if("undefined" != typeof jQuery(this).context ){var title = jQuery(this).context.title;} else { var title = ("undefined" != typeof jQuery(this).attr("title")) ? jQuery(this).attr("title") : false;}' .
	           'var caption = jQuery(this).data(\'caption\') || \'\';' .
	           'if ( item.type === \'image\' && title.length ) {' .
	           'caption = (caption.length ? caption + \'<br />\' : \'\') + \'<p class="caption-title">\'+jQuery("<div>").text(title).html()+\'</p>\' ;' .
	           '}' .
	           'if (typeof DOMPurify === "function" && caption.length) { return DOMPurify.sanitize(caption, {USE_PROFILES: {html: true}}); } else { return jQuery("<div>").text(caption).html(); }' .
	           '}';

	// fix undefined index copyTitleFunction. $mfbfw array misses this index.

    if (isset($mfbfw['captionShow']) && 'on' == $mfbfw['captionShow']) {
        $mfbfw['copyTitleFunction'] = 'var arr = jQuery("a[data-fancybox]");' .
									'jQuery.each(arr, function() {' .
										'var title = jQuery(this).children("img").attr("title");' .
										'if(title){jQuery(this).attr("title",title)}' .
									'});';
    } else {
        $mfbfw['copyTitleFunction'] = 'var arr = jQuery("a[data-fancybox]");' .
									'jQuery.each(arr, function() {' .
										'var title = jQuery(this).children("img").attr("title") || \'\';' .
										'var figCaptionHtml = jQuery(this).next("figcaption").html() || \'\';' .
										'var processedCaption = figCaptionHtml;' .
										'if (figCaptionHtml.length && typeof DOMPurify === \'function\') {' .
											'processedCaption = DOMPurify.sanitize(figCaptionHtml, {USE_PROFILES: {html: true}});' .
										'} else if (figCaptionHtml.length) {' .
											'processedCaption = jQuery("<div>").text(figCaptionHtml).html();' .
										'}' .
										'var newTitle = title;' .
										'if (processedCaption.length) {' .
											'newTitle = title.length ? title + " " + processedCaption : processedCaption;' .
										'}' .
										'if (newTitle.length) {' .
											'jQuery(this).attr("title", newTitle);' .
										'}' .
									'});';
    }



	$afterLoad = '';
	if ( $mfbfw['titlePosition'] == 'inside' ) {
		$afterLoad = 'function( instance, current ) {' .
		             'var captionContent = current.opts.caption || \'\';' .
		             'var sanitizedCaptionString = \'\';' .
		             'if (typeof DOMPurify === \'function\' && captionContent.length) {' .
		                 'sanitizedCaptionString = DOMPurify.sanitize(captionContent, {USE_PROFILES: {html: true}});' .
		             '} else if (captionContent.length) { ' .
		                 'sanitizedCaptionString = jQuery("<div>").text(captionContent).html();' .
		             '}' .
		             'if (sanitizedCaptionString.length) { current.$content.append(jQuery(\'<div class=\"fancybox-custom-caption inside-caption\" style=\" position: absolute;left:0;right:0;color:#000;margin:0 auto;bottom:0;text-align:center;background-color:'.$mfbfw['paddingColor'].' \"></div>\').html(sanitizedCaptionString)); }' .
		             '}';
		$hideCaption = 'div.fancybox-caption{display:none !important;}';
	} else if ( $mfbfw['titlePosition'] == 'over' ) {
		$afterLoad = 'function( instance, current ) {' .
		             'var captionContent = current.opts.caption || \'\';' .
		             'var sanitizedCaptionString = \'\';' .
		             'if (typeof DOMPurify === \'function\' && captionContent.length) {' .
		                 'sanitizedCaptionString = DOMPurify.sanitize(captionContent, {USE_PROFILES: {html: true}});' .
		             '} else if (captionContent.length) { ' .
		                 'sanitizedCaptionString = jQuery("<div>").text(captionContent).html();' .
		             '}' .
		             'if (sanitizedCaptionString.length) { current.$content.append(jQuery(\'<div class=\"fancybox-custom-caption\" style=\" position: absolute;left:0;right:0;color:#000;padding-top:10px;bottom:0;margin:0 auto;text-align:center; \"></div>\').html(sanitizedCaptionString)); }' .
		             '}';
		$hideCaption = 'div.fancybox-caption{display:none !important;}';
	} else {
		$afterLoad .= '""';
		$hideCaption = '';
	}


	if ( isset( $mfbfw['autoDimensions'] ) && $mfbfw['autoDimensions'] == true ) {
		$frameSize = '';
	} else {
		$frameSize = ' "width": ' . $mfbfw['frameWidth'] . ',
			"height": ' . $mfbfw['frameHeight'] . ',';
	}


	$mfbfw['customExpression'] = str_replace( '"rel"', '"data-fancybox"', $mfbfw['customExpression'] );

	$close_button = (isset($mfbfw['showCloseButton']) && 'on' == $mfbfw['showCloseButton'] ) ? 'body.fancybox-active .fancybox-container .fancybox-stage .fancybox-content .fancybox-close-small{display:block;}' : '';

	//title position settings
	if ( isset( $mfbfw['titlePosition'] ) ) {
		if ( $mfbfw['titlePosition'] == 'inside' ) {
			$captionPosition = 'div.fancybox-caption p.caption-title {background:#fff; width:auto;padding:10px 30px;}div.fancybox-content p.caption-title{color:'.$mfbfw['titleColor'].';margin: 0;padding: 5px 0;}';
		} elseif ( $mfbfw['titlePosition'] == 'float' ) {
			$captionPosition = 'div.fancybox-caption p.caption-title {background:#fff;color:#000;padding:10px 30px;width:auto;}';
		} else {
			$captionPosition = 'div.fancybox-caption {position:relative;max-width:50%;margin:0 auto;min-width:480px;padding:15px;}div.fancybox-caption p.caption-title{position:relative;left:0;right:0;margin:0 auto;top:0px;color:#fff;}';
		}
	}

	if ( ( isset( $mfbfw['disableWoocommerceProducts'] ) && $mfbfw['disableWoocommerceProducts'] == true && fancy_check_if_woocommerce() == 'product' ) || ( isset( $mfbfw['disableWoocommercePages'] ) && $mfbfw['disableWoocommercePages'] == true && fancy_check_if_woocommerce() == 'shop_page' ) ) {

	} else {


		echo '
<!-- Fancybox for WordPress v' . esc_html( $mfbfw_version ) . ' -->
<style type="text/css">
	.fancybox-slide--image .fancybox-content{background-color: ' . esc_html( $mfbfw['paddingColor'] ) . '}'. esc_attr( $hideCaption ).'
	' . ( isset( $mfbfw['overlayShow'] ) ? '' : 'div.fancybox-bg{background:transparent !important;}' ) . '
	' . 'img.fancybox-image{border-width:' . esc_html( $mfbfw['padding'] ) . 'px;border-color:' . esc_html( $mfbfw['paddingColor'] ) . ';border-style:solid;}' . '
	' . ( isset( $mfbfw['overlayColor'] ) && $mfbfw['overlayColor'] ? 'div.fancybox-bg{background-color:' . esc_attr( hexTorgba( $mfbfw['overlayColor'], $mfbfw['overlayOpacity'] ) ) . ';opacity:1 !important;}' : '' ) . ( isset( $mfbfw['paddingColor'] ) && $mfbfw['paddingColor'] ? 'div.fancybox-content{border-color:' . esc_html( $mfbfw['paddingColor'] ) . '}' : '' ) . '
	' . ( isset( $mfbfw['paddingColor'] ) && $mfbfw['paddingColor'] && $mfbfw['titlePosition'] == 'inside' ? 'div#fancybox-title{background-color:' . esc_html( $mfbfw['paddingColor'] ) . '}' : '' ) . '
	div.fancybox-content{background-color:' . esc_html( $mfbfw['paddingColor'] ) . ( isset( $mfbfw['border'] ) && $mfbfw['border'] ? ';border:1px solid ' . esc_html( $mfbfw['borderColor'] ) : '' ) . '}
	' . ( isset( $mfbfw['titleColor'] ) && $mfbfw['titleColor'] && $mfbfw['titlePosition'] == 'inside' ? 'div#fancybox-title-inside{color:' . esc_html( $mfbfw['titleColor'] ) . '}' : '' ) . '
	' . ( isset( $mfbfw['borderRadius'] ) ? 'div.fancybox-content{border-radius:' . esc_html( $mfbfw['borderRadius'] ) . 'px}' : '' ) . '
	' . ( isset( $mfbfw['borderRadiusInner'] ) ? 'img#fancybox-img{border-radius:' . esc_html( $mfbfw['borderRadiusInner'] ) . 'px}' : '' ) . '
	' . ( isset( $mfbfw['shadowSize'] ) && $mfbfw['shadowOffset'] && $mfbfw['shadowOpacity'] ? 'div.fancybox-content{box-shadow:0 ' . esc_html( $mfbfw['shadowOffset'] ) . 'px ' . esc_html( $mfbfw['shadowSize'] ) . 'px rgba(0,0,0,' . esc_html( $mfbfw['shadowOpacity'] ) . ')}' : '' ) . '
	' . ( isset( $mfbfw['titleShow'] ) ? 'div.fancybox-caption p.caption-title{display:inline-block}' : 'div.fancybox-custom-caption p.caption-title{display:none}div.fancybox-caption{display:none;}' ) . '
	' . ( isset( $mfbfw['titleSize'] ) ? 'div.fancybox-caption p.caption-title{font-size:' . esc_html( $mfbfw['titleSize'] ) . 'px}' : 'div.fancybox-caption p.caption-title{font-size:14px}' ) . '
	' . ( isset( $mfbfw['titleColor'] ) && $mfbfw['titlePosition'] == 'inside' ? 'div.fancybox-caption p.caption-title{color:' . esc_html( $mfbfw['titleColor'] ) . '}' : 'div.fancybox-caption p.caption-title{color:#fff}' ) . '
	' . ( isset( $mfbfw['titlePosition'] ) ? 'div.fancybox-caption {color:' . esc_html( $mfbfw['titleColor'] ) . '}' : 'div.fancybox-caption p.caption-title{color:#333333}' ) . esc_attr( $captionPosition )  . esc_attr( $close_button ).'
</style>';
?>
<script type="text/javascript">
	jQuery(function () {

		var mobileOnly = false;
		<?php if(isset( $mfbfw['disableOnMobile'] ) && 'on' == $mfbfw['disableOnMobile'] && wp_is_mobile() ){ ?>
			mobileOnly = true;
		<?php } ?>

		if (mobileOnly) {
			return;
		}

		jQuery.fn.getTitle = function () { // Copy the title of every IMG tag and add it to its parent A so that fancybox can show titles
			<?php echo ( $mfbfw['copyTitleFunction'] ) ?>
		}

		// Supported file extensions

		<?php
		if(isset( $mfbfw['exclude_pdf'] ) && 'on' == $mfbfw['exclude_pdf']){
		?>
		var thumbnails = jQuery("a:has(img)").not(".nolightbox").not('.envira-gallery-link').not('.ngg-simplelightbox').filter(function () {
			return /\.(jpe?g|png|gif|mp4|webp|bmp)(\?[^/]*)*$/i.test(jQuery(this).attr('href'))
		});
		<?php
		} else {
		?>
		var thumbnails = jQuery("a:has(img)").not(".nolightbox").not('.envira-gallery-link').not('.ngg-simplelightbox').filter(function () {
			return /\.(jpe?g|png|gif|mp4|webp|bmp|pdf)(\?[^/]*)*$/i.test(jQuery(this).attr('href'))
		});
		<?php
		}
		?>


		// Add data-type iframe for links that are not images or videos.
		var iframeLinks = jQuery('.fancyboxforwp').filter(function () {
			return !/\.(jpe?g|png|gif|mp4|webp|bmp|pdf)(\?[^/]*)*$/i.test(jQuery(this).attr('href'))
		}).filter(function () {
			return !/vimeo|youtube/i.test(jQuery(this).attr('href'))
		});
		iframeLinks.attr({"data-type": "iframe"}).getTitle();

		<?php if ( $mfbfw['galleryType'] == 'post' ) { ?>

		// Gallery type BY POST and on post or page (so only one post or page is visible)
		<?php if ( is_singular() ) { ?>
		// Gallery by post
		thumbnails.addClass("fancyboxforwp").attr("data-fancybox", "gallery").getTitle();
		iframeLinks.attr({"data-fancybox": "gallery"}).getTitle();

		<?php } else { ?>
		// Gallery by post
		var posts = jQuery(".post");
		posts.each(function () {
			jQuery(this).find(thumbnails).addClass("fancyboxforwp").attr("data-fancybox", "gallery" + posts.index(this)).attr("rel", "fancybox" + posts.index(this)).getTitle();

			jQuery(this).find(iframeLinks).attr({"data-fancybox": "gallery" + posts.index(this)}).attr("rel", "fancybox" + posts.index(this)).getTitle();

		});

		<?php } ?>

		// Gallery type ALL
		<?php } elseif ( $mfbfw['galleryType'] == 'all' ) { ?>
		// Gallery All
		thumbnails.addClass("fancyboxforwp").attr("data-fancybox", "gallery").getTitle();
		iframeLinks.attr({"data-fancybox": "gallery"}).getTitle();

		// Gallery type NONE
		<?php } elseif ( $mfbfw['galleryType'] == 'none' ) { ?>
		// No Galleries
		thumbnails.each(function () {
			var rel = jQuery(this).attr("rel");
			var imgTitle = jQuery(this).children("img").attr("title");
			jQuery(this).addClass("fancyboxforwp").attr("data-fancybox", rel);
			jQuery(this).attr("title", imgTitle);
		});

		iframeLinks.each(function () {
			var rel = jQuery(this).attr("rel");
			var imgTitle = jQuery(this).children("img").attr("title");
			jQuery(this).attr({"data-fancybox": rel});
			jQuery(this).attr("title", imgTitle);
		});

		// Else, gallery type is custom, so just print the custom expression
		<?php } else if( $mfbfw['galleryType'] == 'single_gutenberg_block'){
		?>

		var gallery_block;
		if (jQuery('ul.wp-block-gallery').length) {
			var gallery_block = jQuery('ul.wp-block-gallery');
		} else if (jQuery('ul.blocks-gallery-grid')) {
			var gallery_block = jQuery('ul.blocks-gallery-grid');
		}
		gallery_block.each(function () {
			jQuery(this).find(thumbnails).addClass("fancyboxforwp").attr("data-fancybox", "gallery" + gallery_block.index(this)).attr("rel", "fancybox" + gallery_block.index(this)).getTitle();

			jQuery(this).find(iframeLinks).attr({"data-fancybox": "gallery" + gallery_block.index(this)}).attr("rel", "fancybox" + gallery_block.index(this)).getTitle();

		});
		<?php
		} else { ?>
		/* Custom Expression */
		<?php echo html_entity_decode( $mfbfw['customExpression'] ); ?>
		<?php } ?>

		// Call fancybox and apply it on any link with a rel atribute that starts with "fancybox", with the options set on the admin panel
		jQuery("a.fancyboxforwp").fancyboxforwp({
			loop: <?php echo(isset( $mfbfw['cyclic'] ) && $mfbfw['cyclic'] ? 'true' : 'false') ?>,
			smallBtn: <?php echo(isset( $mfbfw['showCloseButton'] ) && $mfbfw['showCloseButton'] ? 'true' : 'false') ?>,
			zoomOpacity: <?php echo(isset( $mfbfw['zoomOpacity'] ) && $mfbfw['zoomOpacity'] ? '"auto"' : 'false') ?>,
			animationEffect: "<?php echo esc_attr( $mfbfw['transitionIn'] )?>",
			animationDuration: <?php echo esc_attr( $mfbfw['zoomSpeedIn'] )?>,
			transitionEffect: "<?php echo esc_attr( $mfbfw['transitionEffect'] )?>",
			transitionDuration: "<?php echo esc_attr( $mfbfw['zoomSpeedChange'] )?>",
			overlayShow: <?php echo(isset( $mfbfw['overlayShow'] ) && $mfbfw['overlayShow'] ? 'true' : 'false') ?>,
			overlayOpacity: "<?php echo esc_attr( $mfbfw['overlayOpacity'] )?>",
			titleShow: <?php echo(isset( $mfbfw['titleShow'] ) && $mfbfw['titleShow'] ? 'true' : 'false') ?>,
			titlePosition: "<?php echo esc_attr( $mfbfw['titlePosition'] )?>",
			keyboard: <?php echo(isset( $mfbfw['enableEscapeButton'] ) && $mfbfw['enableEscapeButton'] ? 'true' : 'false') ?>,
			showCloseButton: <?php echo(isset( $mfbfw['showCloseButton'] ) && $mfbfw['showCloseButton'] ? 'true' : 'false') ?>,
			arrows: <?php echo(isset( $mfbfw['showNavArrows'] ) && $mfbfw['showNavArrows'] ? 'true' : 'false') ?>,
			clickContent:<?php echo(isset( $mfbfw['hideOnContentClick'] ) && $mfbfw['hideOnContentClick'] ? '"close"' : 'false') ?>,
			clickSlide: <?php echo(isset( $mfbfw['hideOnOverlayClick'] ) && $mfbfw['hideOnOverlayClick'] ? '"close"' : 'false') ?>,
			mobile: {
				clickContent: function (current, event) {
					return current.type === "image" ? <?php echo(isset( $mfbfw['hideOnContentClick'] ) && $mfbfw['hideOnContentClick'] ? '"close"' : '"toggleControls"') ?> : false;
				},
				clickSlide: function (current, event) {
					return current.type === "image" ? <?php echo(isset( $mfbfw['hideOnOverlayClick'] ) && $mfbfw['hideOnOverlayClick'] ? '"close"' : '"toggleControls"') ?> : "close";
				},
			},
			wheel: <?php echo(isset( $mfbfw['mouseWheel'] ) && $mfbfw['mouseWheel'] ? 'true' : 'false') ?>,
			toolbar: <?php echo(isset( $mfbfw['showToolbar'] ) && $mfbfw['showToolbar'] ? 'true' : 'false') ?>,
			preventCaptionOverlap: true,
			onInit: <?php echo(isset( $mfbfw['callbackEnable'], $mfbfw['callbackOnStart'] ) && $mfbfw['callbackEnable'] && $mfbfw['callbackOnStart'] ? html_entity_decode( $mfbfw['callbackOnStart'] ) . ',' : 'function() { },') ?>
			onDeactivate
	: <?php echo(isset( $mfbfw['callbackEnable'], $mfbfw['callbackOnCancel'] ) && $mfbfw['callbackEnable'] && $mfbfw['callbackOnCancel'] ? html_entity_decode( $mfbfw['callbackOnCancel'] ) . ',' : 'function() { },') ?>
		beforeClose: <?php echo(isset( $mfbfw['callbackEnable'], $mfbfw['callbackOnCleanup'] ) && $mfbfw['callbackEnable'] && $mfbfw['callbackOnCleanup'] ? html_entity_decode( $mfbfw['callbackOnCleanup'] ) . ',' : 'function() { },') ?>
			afterShow: <?php echo(isset( $mfbfw['callbackEnable'], $mfbfw['callbackOnComplete'] ) && $mfbfw['callbackEnable'] && $mfbfw['callbackOnComplete'] ? html_entity_decode( $mfbfw['callbackOnComplete'] ) . ',' : ( isset( $mfbfw['zoomOnClick'] ) ? 'function(instance) { jQuery( ".fancybox-image" ).on("click", function( ){ ( instance.isScaledDown() ) ? instance.scaleToActual() : instance.scaleToFit() }) },' : 'function() {},' ) )?>
				afterClose: <?php echo(isset( $mfbfw['callbackEnable'], $mfbfw['callbackOnClose'] ) && $mfbfw['callbackEnable'] && $mfbfw['callbackOnClose'] ? html_entity_decode( $mfbfw['callbackOnClose'] ) . ',' : 'function() { },') ?>
					caption : <?php echo html_entity_decode( $caption ) ?>,
		afterLoad : <?php echo html_entity_decode( $afterLoad ) ?>,
		<?php echo wp_kses_post( $frameSize ) ?>
	})
		;

		<?php if ( isset( $mfbfw['extraCallsEnable'] ) && $mfbfw['extraCallsEnable'] ) {
		echo "/* Extra Calls */";
		echo html_entity_decode( $mfbfw['extraCallsData'] );
	} ?>
	})
</script>
<!-- END Fancybox for WordPress -->
<?php
	}
}

// Check if inline script should be loaded in footer
if ( isset( $mfbfw['loadAtFooter'] ) && $mfbfw['loadAtFooter'] ) {
	add_action( 'wp_footer', 'mfbfw_init' );
} else {
	add_action( 'wp_head', 'mfbfw_init' );
}

/**
 * Load text domain
 */
function mfbfw_textdomain() {

	if ( function_exists( 'load_plugin_textdomain' ) ) {
		load_plugin_textdomain( 'mfbfw', FBFW_URL . 'languages', 'fancybox-for-wordpress/languages' );
	}
}

add_action( 'init', 'mfbfw_textdomain' );

/**
 * Register options
 */
function mfbfw_admin_options() {

	$settings = get_option( 'mfbfw' );

	if ( isset( $_GET['page'] ) && $_GET['page'] == 'fancybox-for-wordpress' ) {

		if ( isset( $_REQUEST['action'] ) && 'reset' == $_REQUEST['action'] && check_admin_referer( 'mfbfw-options-reset' ) ) {

			$defaults_array = mfbfw_defaults(); // Store defaults in an array
			update_option( 'mfbfw', $defaults_array ); // Write defaults to database
			wp_safe_redirect( add_query_arg( 'reset', 'true' ) );
			die;
		}
	}

	register_setting( 'mfbfw-options', 'mfbfw' );
}

add_action( 'admin_init', 'mfbfw_admin_options' );

/**
 * Admin options page
 */
function mfbfw_admin_menu() {

	require FBFW_PATH . 'admin.php';

	$mfbfwadmin = add_submenu_page( 'options-general.php', 'Fancybox for WordPress Options', 'Fancybox for WP', 'manage_options', 'fancybox-for-wordpress', 'mfbfw_options_page' );

	add_action( 'admin_print_styles-' . $mfbfwadmin, 'mfbfw_admin_styles' );
	add_action( 'admin_print_scripts-' . $mfbfwadmin, 'mfbfw_admin_scripts' );
}

add_action( 'admin_menu', 'mfbfw_admin_menu' );

/**
 * Load Admin CSS & JS (called in mfbfw_admin_menu())
 */
function mfbfw_admin_styles() {
	wp_enqueue_style( 'fancybox-admin', FBFW_URL . 'assets/css/fancybox-admin.css', false, FBFW_VERSION ); // Load custom CSS for Admin Page
	wp_enqueue_style( 'wp-color-picker' );
	wp_enqueue_style( 'jquery-ui', '//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css' ); // Load jQuery UI Tabs CSS for Admin Page
}

function mfbfw_admin_scripts() {
	wp_enqueue_script( 'jquery-ui-tabs', array( 'jquery-ui-core' ), true ); // Load jQuery UI Tabs JS for Admin Page
	wp_enqueue_script( 'fancybox-admin', FBFW_URL . 'assets/js/admin.js', array( 'jquery', 'wp-color-picker', 'updates' ), FBFW_VERSION, true ); // Load specific JS for Admin Page

	/* Load codemirror editor */
	$settings = wp_enqueue_code_editor( array( 'type' => 'text/javascript' ) );
}

/**
 * Settings Button on Plugins Panel
 */
function mfbfw_plugin_action_links(
	$links,
	$file
) {

	static $this_plugin;
	if ( ! $this_plugin ) {
		$this_plugin = plugin_basename( __FILE__ );
	}

	if ( $file == $this_plugin ) {
		$settings_link = '<a href="options-general.php?page=fancybox-for-wordpress">' . __( 'Settings', 'mfbfw' ) . '</a>';
		array_unshift( $links, $settings_link );
	}

	return $links;
}

add_filter( 'plugin_action_links', 'mfbfw_plugin_action_links', 10, 2 );

/*
 * Transform from Hex to rgb or rgba
 */

function hexTorgba( $hexColor, $opacity ) {
	list( $r, $g, $b ) = sscanf( $hexColor, "#%02x%02x%02x" );
	if ( $opacity ) {
		$rgb = 'rgba(' . $r . ',' . $g . ',' . $b . ',' . $opacity . ')';
	} else {
		$rgb = 'rgba(' . $r . ',' . $g . ',' . $b . ')';
	}

	return $rgb;
}

/*
 *
 * Check if WooCommerce Product post
 *
 */
function fancy_check_if_woocommerce() {
	if ( class_exists( 'WooCommerce' ) ) {
		if ( is_shop() ) {
			return 'shop_page';
		} else if ( get_post_type( get_the_id() ) == 'product' ) {
			return 'product';
		} else {
			return 'true';
		}
	} else {
		return 'true';
	}
}

add_filter( 'pre_update_option_mfbfw', 'mfbfw_sanitize_fancy_options' );

/**
 * Sanitize options
 *
 * @since 3.3.4
 */
function mfbfw_sanitize_fancy_options( $value ){
	$sanitized = $value;

	if ( isset( $value['showToolbar'] ) ) {
		$sanitized['showToolbar'] =  sanitize_text_field( $value['showToolbar'] );
	}

	if ( isset( $value['borderColor'] ) ) {
		$sanitized['borderColor'] =  sanitize_text_field( $value['borderColor'] );
	}

	if ( isset( $value['paddingColor'] ) ) {
		$sanitized['paddingColor'] =  sanitize_text_field( $value['paddingColor'] );
	}

	if ( isset( $value['padding'] ) ) {
		$sanitized['padding'] =  absint( $value['padding'] );
	}

	if ( isset( $value['overlayShow'] ) ) {
		$sanitized['overlayShow'] =  sanitize_text_field( $value['overlayShow'] );
	}

	if ( isset( $value['overlayColor'] ) ) {
		$sanitized['overlayColor'] =  sanitize_text_field( $value['overlayColor'] );
	}

	if ( isset( $value['overlayOpacity'] ) ) {
		$sanitized['overlayOpacity'] =  (float) sanitize_text_field( $value['overlayOpacity'] );
	}

	if ( isset( $value['titleShow'] ) ) {
		$sanitized['titleShow'] =  sanitize_text_field( $value['titleShow'] );
	}

	if ( isset( $value['titleSize'] ) ) {
		$sanitized['titleSize'] =  absint( $value['titleSize'] );
	}
	
	if ( isset( $value['titlePosition'] ) ) {
		$sanitized['titlePosition'] =  sanitize_text_field( $value['titlePosition'] );
	}

	if ( isset( $value['titleColor'] ) ) {
		$sanitized['titleColor'] =  sanitize_text_field( $value['titleColor'] );
	}

	if ( isset( $value['showNavArrows'] ) ) {
		$sanitized['showNavArrows'] =  sanitize_text_field( $value['showNavArrows'] );
	}

	if ( isset( $value['zoomOpacity'] ) ) {
		$sanitized['zoomOpacity'] =  sanitize_text_field( $value['zoomOpacity'] );
	}

	if ( isset( $value['transitionIn'] ) ) {
		$sanitized['transitionIn'] =  sanitize_text_field( $value['transitionIn'] );
	}

	if ( isset( $value['zoomSpeedIn'] ) ) {
		$sanitized['zoomSpeedIn'] =  absint( $value['zoomSpeedIn'] );
	}

	if ( isset( $value['transitionEffect'] ) ) {
		$sanitized['transitionEffect'] =  sanitize_text_field( $value['transitionEffect'] );
	}

	if ( isset( $value['zoomSpeedChange'] ) ) {
		$sanitized['zoomSpeedChange'] =  absint( $value['zoomSpeedChange'] );
	}

	if ( isset( $value['hideOnOverlayClick'] ) ) {
		$sanitized['hideOnOverlayClick'] =  sanitize_text_field( $value['hideOnOverlayClick'] );
	}

	if ( isset( $value['enableEscapeButton'] ) ) {
		$sanitized['enableEscapeButton'] =  sanitize_text_field( $value['enableEscapeButton'] );
	}

	if ( isset( $value['galleryType'] ) ) {
		$sanitized['galleryType'] =  sanitize_text_field( $value['galleryType'] );
	}

	if ( isset( $value['autoDimensions'] ) ) {
		$sanitized['autoDimensions'] =  sanitize_text_field( $value['autoDimensions'] );
	}

	if ( isset( $value['frameWidth'] ) ) {
		$sanitized['frameWidth'] =  absint( $value['frameWidth'] );
	}
	 
	if ( isset( $value['frameHeight'] ) ) {
		$sanitized['frameHeight'] =  absint( $value['frameHeight'] );
	}

	if ( isset( $value['callbackEnable'] ) ) {
		$sanitized['callbackEnable'] =  sanitize_text_field( $value['callbackEnable'] );
	}

	if ( isset( $value['loadAtFooter'] ) ) {
		$sanitized['loadAtFooter'] =  sanitize_text_field( $value['loadAtFooter'] );
	}

	if ( isset( $value['showCloseButton'] ) ) {
		$sanitized['showCloseButton'] =  sanitize_text_field( $value['showCloseButton'] );
	}
	
	if ( isset( $value['border'] ) ) {
		$sanitized['border'] =  sanitize_text_field( $value['border'] );
	}
	
	if ( isset( $value['captionShow'] ) ) {
		$sanitized['captionShow'] =  sanitize_text_field( $value['captionShow'] );
	}

	if ( isset( $value['hideOnContentClick'] ) ) {
		$sanitized['hideOnContentClick'] =  sanitize_text_field( $value['hideOnContentClick'] );
	}

	if ( isset( $value['cyclic'] ) ) {
		$sanitized['cyclic'] =  sanitize_text_field( $value['cyclic'] );
	}

	if ( isset( $value['mouseWheel'] ) ) {
		$sanitized['mouseWheel'] =  sanitize_text_field( $value['mouseWheel'] );
	}

	if ( isset( $value['zoomOnClick'] ) ) {
		$sanitized['zoomOnClick'] =  sanitize_text_field( $value['zoomOnClick'] );
	}

	if ( isset( $value['disableWoocommercePages'] ) ) {
		$sanitized['disableWoocommercePages'] =  sanitize_text_field( $value['disableWoocommercePages'] );
	}

	if ( isset( $value['disableWoocommerceProducts'] ) ) {
		$sanitized['disableWoocommerceProducts'] =  sanitize_text_field( $value['disableWoocommerceProducts'] );
	}

	if ( isset( $value['exclude_pdf'] ) ) {
		$sanitized['exclude_pdf'] =  sanitize_text_field( $value['exclude_pdf'] );
	}

	if ( isset( $value['disableOnMobile'] ) ) {
		$sanitized['disableOnMobile'] =  sanitize_text_field( $value['disableOnMobile'] );
	}

	if ( isset( $value['extraCallsData'] ) ) {
		$sanitized['extraCallsData'] =  strip_tags( $value['extraCallsData'] );
	}

	if ( isset( $value['callbackOnStart'] ) ) {
		$sanitized['callbackOnStart'] =  strip_tags( $value['callbackOnStart'] );
	}

	if ( isset( $value['callbackOnCancel'] ) ) {
		$sanitized['callbackOnCancel'] =  strip_tags( $value['callbackOnCancel'] );
	}

	if ( isset( $value['callbackOnComplete'] ) ) {
		$sanitized['callbackOnComplete'] =  strip_tags( $value['callbackOnComplete'] );
	}

	if ( isset( $value['callbackOnCleanup'] ) ) {
		$sanitized['callbackOnCleanup'] =  strip_tags( $value['callbackOnCleanup'] );
	}

	if ( isset( $value['callbackOnClose'] ) ) {
		$sanitized['callbackOnClose'] =  strip_tags( $value['callbackOnClose'] );
	}

	if ( isset( $value['customExpression'] ) ) {
		$sanitized['customExpression'] =  strip_tags( $value['customExpression'] );
	}

	return $sanitized;
}
