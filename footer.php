		</div>
	</div>
	<?php
		get_sidebar();
	?>
</div>
<footer>

<nav id="site">
	<ul>
	<?php 
		if( has_nav_menu('footer_menu') ) {
			wp_nav_menu(array(
			'theme_location' => 'footer_menu',
			'fallback_cb' => false
			)); 
		} else {
			wp_list_pages("title_li=&depth=1");
		}
	?>
	</ul>
</nav>
<div class="clearfix">
			<div id="site-info">
				<a href="<?php echo home_url( '/' ) ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
					<?php bloginfo( 'name' ); ?></a>.
				Designed by <a href="http://rudyjahchan.com">Rudy Jahchan</a>.
				<a href="<?php echo esc_url( __('http://wordpress.org/', 'twentyten') ); ?>"
						title="<?php esc_attr_e('Semantic Personal Publishing Platform', 'twentyten'); ?>" rel="generator">
					<?php printf( __('Proudly powered by %s', 'twentyten'), 'WordPress' ); ?></a>.
			</div>
			
			<div id="site-feeds">
			Subscribe:
				<a href="<?php bloginfo('rss2_url'); ?>">Entries </a> |
				<a href="<?php bloginfo('comments_rss2_url'); ?>">Comments </a>			
		</div>
</div>
<?php
	if (function_exists('bccl_full_html_license')) {
	?>
<div class="cclicense">
<?php
	bccl_full_html_license();
?>
</div>
<?php
	}
	
	wp_footer();
?>
</footer>
</div>
</body>
</html>