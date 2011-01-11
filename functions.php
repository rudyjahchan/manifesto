<?php

function manifesto_setup() {
	// This theme uses post thumbnails
	add_theme_support( 'post-thumbnails' );
	add_image_size('feature_image_size',500,999);
}

add_action( 'after_setup_theme', 'manifesto_setup' );

?>