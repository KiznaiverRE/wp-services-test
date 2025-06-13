<?php
add_action( 'wp_enqueue_scripts', 'cps_child_enqueue_styles' );
function cps_child_enqueue_styles() {
    wp_enqueue_style( 'classic-parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'classic-child-style', get_stylesheet_directory_uri() . '/style.css', array('classic-parent-style') );
}