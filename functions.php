<?php

if(!defined('WP_LOCAL_INSTALL')) {
	require_once( get_stylesheet_directory() . '/_/php/acf_fields.php' );
}
require_once( get_stylesheet_directory() . '/_/php/custom_post_types.php' );

function studentaffairs_scripts() {
	wp_enqueue_style( 'bxslider', '/wp-content/themes/medstudentaffairs/_/css/jquery.bxslider.css', true );
	wp_enqueue_script( 'jquery.bxslider.min.js', '/wp-content/themes/medstudentaffairs/_/js/jquery.bxslider.min.js', array('jquery'), true );

}
add_action( 'wp_enqueue_scripts', 'studentaffairs_scripts' );