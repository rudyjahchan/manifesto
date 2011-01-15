<?php

function manifesto_setup() {
	// This theme uses post thumbnails
	add_theme_support( 'post-thumbnails' );
	add_image_size('feature_image_size',500,999);
	register_nav_menus(array('header_menu' => "Header Menu"));
	register_nav_menus(array('footer menu' => "Footer Menu"));
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

function manifesto_register_settings() {
	register_setting( 'manifesto-settings-group', 'background_header_image' );
}

function manifesto_add_theme_page() {
	$customize_theme_page = add_theme_page(__('Theme Options'), __('Theme Options'), 'edit_themes', basename(__FILE__), 'manifesto_theme_page');
	add_action( 'admin_init', 'manifesto_register_settings' );
}

function manifesto_theme_page() {
	?>
	<div class="wrap">
		<h2>Manifesto Options</h2>
		
		<form method="post" action="options.php">
			<?php settings_fields( 'manifesto-settings-group' ); ?>
			<table class="form-table">
			<tr valign="top">
				<th scope="row">Background Header Image:</th>
				<td><input type="text" name="background_header_image" value="<?php echo get_option('background_header_image'); ?>" style="width:100%;" /></td>
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
add_action('admin_menu', 'manifesto_add_theme_page');

?>