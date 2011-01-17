<?php

function manifesto_setup() {
	// This theme uses post thumbnails
	add_theme_support( 'post-thumbnails' );
	add_theme_support('automatic-feed-links');
	add_image_size('feature_image_size',498,999);
	register_nav_menus(array('header_menu' => "Header Menu"));
	register_nav_menus(array('footer_menu' => "Footer Menu"));
	
	define('NO_HEADER_TEXT', 'true');
	define('HEADER_TEXTCOLOR', '');
	define('HEADER_IMAGE', '%s/images/default_header.jpg'); // %s is the template dir uri
	define('HEADER_IMAGE_WIDTH', 225); // use width and height appropriate for your theme
	define('HEADER_IMAGE_HEIGHT', 240);
	
	add_custom_image_header( 'manifesto_header_style', 'manifesto_admin_header_style' );
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

}

function manifesto_init() {
	wp_register_script("manifesto",get_bloginfo('stylesheet_directory') . "/js/manifesto.js",array("jquery"));
	wp_enqueue_script("manifesto");
}

function manifesto_header_style() {
    ?><style type="text/css">
        header {
            background-image: url(<?php header_image(); ?>);
        }
    </style><?php
}

function manifesto_admin_init() {
	register_setting( 'manifesto-settings-group', 'rich_description' );
	wp_register_script("manifesto-admin",get_bloginfo('stylesheet_directory') . "/js/manifesto-admin.js",array("jquery"));
}

function manifesto_add_theme_page() {
	$customize_theme_page = add_theme_page(__('Theme Options'), __('Theme Options'), 'edit_themes', basename(__FILE__), 'manifesto_theme_page');
	add_action('admin_print_scripts-' . $customize_theme_page, 'manifesto_admin_scripts');
}

function manifesto_admin_scripts() {
	wp_tiny_mce( false , // true makes the editor "teeny"
					array(
						"editor_selector" => "rich_description",
				                "height" => 150
					)
	);
	wp_enqueue_script( 'manifesto-admin' );
}

function manifesto_theme_page() {
	?>
	<div class="wrap">
		<h2>Manifesto Options</h2>
		
		<form method="post" action="options.php">
			<?php settings_fields( 'manifesto-settings-group' ); ?>
			<table class="form-table">
			<tr valign="top">
				<th scope="row">Rich Description:</th>
				<td>
				<p align="right">
					<a class="button toggleVisual">Visual</a>
					<a class="button toggleHTML">HTML</a>
				</p>
				<textarea id="rich_description" class="rich_description" name="rich_description" style="width:100%;height:150px;"><?php echo htmlspecialchars(get_option('rich_description')); ?></textarea></td>
			</tr>
			</table>
			
    <p class="submit">
    <input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
    </p>
		</form>
	</div>
	<?php
}

add_action( 'widgets_init', 'manifesto_widgets_init' ); 
add_action( 'after_setup_theme', 'manifesto_setup' );
add_action( 'admin_init', 'manifesto_admin_init' );
add_action('admin_menu', 'manifesto_add_theme_page');
add_action('init', 'manifesto_init');
?>