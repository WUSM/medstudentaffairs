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

function custom_post_order($query){
    $post_types = get_post_types(array('_builtin' => false), 'names');
    $post_type = $query->get('post_type');
    if(in_array($post_type, $post_types) && $post_type == 'student-group'){
        if($query->get('orderby') == ''){
            $query->set('orderby', 'title');
        }
        if($query->get('order') == ''){
            $query->set('order', 'ASC');
        }
    }
}
if(is_admin()){
    add_action('pre_get_posts', 'custom_post_order');
}