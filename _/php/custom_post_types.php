<?php

function custom_post_types_init() {


  // Header

  $labels = array(
    'name' => 'Header',
    'singular_name' => 'Image',
    'add_new' => 'Add New',
    'add_new_item' => 'Add New Image',
    'edit_item' => 'Edit Image',
    'new_item' => 'New Image',
    'all_items' => 'All Images',
    'view_item' => 'View Image',
    'search_items' => 'Search images',
    'not_found' =>  'No images found',
    'not_found_in_trash' => 'No images found in Trash',
    'parent_item_colon' => '',
    'menu_name' => 'Header'
  );

  $args = array(
    'labels' => $labels,
    'public' => true,
    'exclude_from_search' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'header-image' ),
    'capability_type' => 'post',
    'has_archive' => true,
    'hierarchical' => false,
    'menu_position' => null,
    'supports' => array( 'title' )
  );

  register_post_type( 'header', $args );


  // Featured Event

  $labels = array(
    'name' => 'Featured Event',
    'singular_name' => 'Event',
    'add_new' => 'Add New',
    'add_new_item' => 'Add New Event',
    'edit_item' => 'Edit Event',
    'new_item' => 'New Event',
    'all_items' => 'All Events',
    'view_item' => 'View Event',
    'search_items' => 'Search events',
    'not_found' =>  'No events found',
    'not_found_in_trash' => 'No events found in Trash',
    'parent_item_colon' => '',
    'menu_name' => 'Featured Event'
  );

  $args = array(
    'labels' => $labels,
    'public' => true,
    'exclude_from_search' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'featured-event' ),
    'capability_type' => 'post',
    'has_archive' => true,
    'hierarchical' => false,
    'menu_position' => null,
    'supports' => array( 'title' )
  );

  register_post_type( 'featured-event', $args );


  // Announcement

  $labels = array(
    'name' => 'Announcement',
    'singular_name' => 'Announcement',
    'add_new' => 'Add New',
    'add_new_item' => 'Add New Announcement',
    'edit_item' => 'Edit Announcement',
    'new_item' => 'New Announcement',
    'all_items' => 'All Announcements',
    'view_item' => 'View Announcement',
    'search_items' => 'Search Announcements',
    'not_found' =>  'No announcements found',
    'not_found_in_trash' => 'No announcements found in Trash',
    'parent_item_colon' => '',
    'menu_name' => 'Announcement'
  );

  $args = array(
    'labels' => $labels,
    'public' => true,
    'exclude_from_search' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'announcement' ),
    'capability_type' => 'post',
    'has_archive' => true,
    'hierarchical' => false,
    'menu_position' => null,
    'supports' => array( 'title', 'editor', 'author' )
  );

  register_post_type( 'announcement', $args );


  // Featured Student

  $labels = array(
    'name' => 'Featured Students',
    'singular_name' => 'Featured Student',
    'add_new' => 'Add New',
    'add_new_item' => 'Add New Student',
    'edit_item' => 'Edit Student',
    'new_item' => 'New Student',
    'all_items' => 'All Students',
    'view_item' => 'View Student',
    'search_items' => 'Search students',
    'not_found' =>  'No students found',
    'not_found_in_trash' => 'No students found in Trash',
    'parent_item_colon' => '',
    'menu_name' => 'Featured Students'
  );

  $args = array(
    'labels' => $labels,
    'public' => true,
    'exclude_from_search' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'student' ),
    'capability_type' => 'post',
    'has_archive' => true,
    'hierarchical' => false,
    'menu_position' => null,
    'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'page-attributes' )
  );

  register_post_type( 'featured-student', $args );


  // Student Groups

  $labels = array(
    'name' => 'Student Groups',
    'singular_name' => 'Group',
    'add_new' => 'Add New',
    'add_new_item' => 'Add New Group',
    'edit_item' => 'Edit Group',
    'new_item' => 'New Group',
    'all_items' => 'All Groups',
    'view_item' => 'View Group',
    'search_items' => 'Search Groups',
    'not_found' =>  'No groups found',
    'not_found_in_trash' => 'No groups found in Trash', 
    'parent_item_colon' => '',
    'menu_name' => 'Student Groups'
  );

  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => array( 'slug' => 'student-group' ),
    'capability_type' => 'post',
    'has_archive' => true, 
    'hierarchical' => false,
    'menu_position' => null,
    'supports' => array( 'title', 'editor' )
  ); 

  register_post_type( 'student-group', $args );

} 
add_action( 'init', 'custom_post_types_init' );


function groups_taxonomy() {
  $args = array(
        'hierarchical' => true
    );
  register_taxonomy( 'group_category', 'student-group', $args );
}

add_action( 'init', 'groups_taxonomy', 0 );