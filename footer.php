		</div>
	</div>
	<?php
		get_sidebar();
	?>
</div>
<footer>
<div class="clearfix">
	<ul class="footer-left-widget-area footer-widget-area">
	<?php dynamic_sidebar( 'footer-left-widget-area' ); ?>
	</ul>
	<ul class="footer-right-widget-area footer-widget-area">
	<?php dynamic_sidebar( 'footer-right-widget-area' ); ?>
	</ul>
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