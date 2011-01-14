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