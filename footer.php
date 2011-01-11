		</div>
	</div>
	<?php
		get_sidebar();
	?>
</div>
<footer>
<div class="clearfix">
	<ul class="footer-left-widget-area">
	<?php dynamic_sidebar( 'footer-left-widget-area' ); ?>
	</ul>
	<ul class="footer-right-widget-area">
	<?php dynamic_sidebar( 'footer-right-widget-area' ); ?>
	</ul>
</div>
<?
	wp_footer();
?>
</footer>
</div>
</body>
</html>