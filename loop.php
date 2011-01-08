<?php if (have_posts()) : ?>

	<?php while (have_posts()) : the_post(); ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<?php the_date('F j, Y', '<h5 class="postDate"><abbr class="published">','</abbr></h5>'); ?>
			Loop
		</article>

	<?php endwhile; ?>

<?php endif; ?>