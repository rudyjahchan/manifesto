<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'manifesto' ), max( $paged, $page ) );

	?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/3.2.0/build/cssreset/reset-min.css">
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php
	/* We add some JavaScript to pages with the comment form
	 * to support sites with threaded comments (when in use).
	 */
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	/* Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */
	wp_head();
?>
</head>
<body <?php body_class(); ?>>
<div id="page">
<header>
<h1><a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
<p id="description">
Being the website of Rudy Jahchan ; Writer &amp; director of popular, award-winning web shows <a href="http://galacticast.com">GALACTICAST</a> &amp; <a href="">A Comicbook Orange</a> ; Agile codemonkey under the professional auspices of <a href="http://carbonfive.com">Carbon Five</a> ; Crafter of fine WordPress video plugins <a href="http://vlogmonkey.org">VlogMonkey</a> &amp; theme <a href="http://vlogmonkey.org/ufosplode">UFO 'Splode</a> ; Found on <a href="http://twitter.com/rudy">Twitter</a> &amp; <a href="http://facebook.com/rudyjahchan">Facebook</a>.</p>
</header>
<nav id="site">
	<ul>
	<?php 
		if( has_nav_menu('header_menu') ) {
			wp_nav_menu(array(
			'theme_location' => 'header_menu',
			'fallback_cb' => false
			)); 
		} else {
			wp_list_pages("title_li=&depth=1");
		}
	?>	
	</ul>
</nav>
<?php
	if(is_page()) {
		if($post->post_parent) {
			$children = wp_list_pages("title_li=&child_of=".$post->post_parent."&echo=0");
		} else {
			$children = wp_list_pages("title_li=&child_of=".$post->ID."&echo=0");
		}
		
		if ($children) { ?>
			<nav id="sub-pages">
			<ul>
			<?php echo $children; ?>
			</ul>
			</nav>
<?php 
		}
	}
?>
<div class="clearfix">
<div id="main">
<div class="hfeed">