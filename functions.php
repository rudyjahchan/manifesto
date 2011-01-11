<?php

function manifesto_setup() {
	// This theme uses post thumbnails
	add_theme_support( 'post-thumbnails' );
	add_image_size('feature_image_size',500,999);
}

function manifesto_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Primary Sidebar Area', 'manifesto' ),
		'id' => 'primary-sidebar-area',
		'description' => __( 'The primary sidebar area', 'manifesto' ),
		'before_widget' => '<li id="%1$s" class="clearfix widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>'
	) );

	register_sidebar( array(
		'name' => __( 'Footer Left Widget Area', 'manifesto' ),
		'id' => 'footer-left-widget-area',
		'description' => __( 'The left footer widget area', 'manifesto' ),
		'before_widget' => '<li id="%1$s" class="clearfix widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>'
	) );

	register_sidebar( array(
		'name' => __( 'Footer Right Widget Area', 'manifesto' ),
		'id' => 'footer-right-widget-area',
		'description' => __( 'The right footer widget area', 'manifesto' ),
		'before_widget' => '<li id="%1$s" class="clearfix widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>'
	) );

}

add_action( 'widgets_init', 'manifesto_widgets_init' ); 
add_action( 'after_setup_theme', 'manifesto_setup' );

?>