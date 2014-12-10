<?php

/*
Plugin Name: Events Lite
Plugin URI: https://github.com/thesabbir/wp-events-lite
Description: Light weight event posting plugin.
Version: 1.0
Author: Sabbir Ahmed
Author URI: http://twitter.com/alreadysabbir
License: GPLv2 or Later
*/


function in_custom_event() {
    $labels = array(
        'name'               => _x( 'Events', 'Events is damn good title' ),
        'singular_name'      => _x( 'Event', 'this is the singular name ' ),
        'menu_name'          => _x( 'Events Lite', 'admin menu' ),
        'name_admin_bar'     => _x( 'Event', 'add new on admin bar' ),
        'add_new'            => _x( 'Add New', 'event' ),
        'add_new_item'       => __( 'Add New Event' ),
        'edit_item'          => __( 'Edit Event' ),
        'new_item'           => __( 'New Event' ),
        'all_items'          => __( 'All Events' ),
        'view_item'          => __( 'View Event' ),
        'search_items'       => __( 'Search Events' ),
        'not_found'          => __( 'No events found' ),
        'not_found_in_trash' => __( 'No events found in the Trash' ),
        'parent_item_colon'  => ''

    );

    $args = array(
        'labels'             => $labels,
        'description'        => 'Holds our events and event specific data',
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'menu_position'      => 5,
        'menu_icon'          => '',
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'events' ),
        'has_archive'        => true,
        'hierarchical'       => false,
        'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
    );

    register_post_type( 'event', $args );

}

function my_taxonomies_event() {

    $labels = array(
        'name'              => _x( 'Event Categories', 'taxonomy general name' ),
        'singular_name'     => _x( 'Event Category', 'taxonomy singular name' ),
        'search_items'      => __( 'Search Event Categories' ),
        'all_items'         => __( 'All Event Categories' ),
        'parent_item'       => __( 'Parent Event Category' ),
        'parent_item_colon' => __( 'Parent Event Category:' ),
        'edit_item'         => __( 'Edit Event Category' ),
        'update_item'       => __( 'Update Event Category' ),
        'add_new_item'      => __( 'Add New Event Category' ),
        'new_item_name'     => __( 'New Event Category' ),
        'menu_name'         => __( 'Event Categories' ),
    );

    $args   = array(
        'labels'       => $labels,
        'hierarchical' => true,
    );

    register_taxonomy( 'event_category', 'event', $args );

}


function add_menu_icons_styles(){
    ?>
    <style>
        #adminmenu .menu-icon-event div.wp-menu-image:before {
            content: '\f145';
        }
    </style>
<?php
}

add_action( 'admin_head', 'add_menu_icons_styles' );
add_action( 'init', 'in_custom_event' );
add_action( 'init', 'my_taxonomies_event', 0 );