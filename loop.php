<?php if (have_posts()) : ?>

	<?php while (have_posts()) : the_post(); ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<?php the_date('F j, Y', '<h5 class="postDate"><abbr class="published">','</abbr></h5>'); ?>
			<h3 class="entry-title"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h3>
			<h4 class="vcard author">by <span class="fn"><?php the_author(); ?></span></h4>

			<div class="entry-content">				
				<?php the_content('Read the rest of this entry &raquo;'); ?>
			</div>

			<?php if( !is_single() ) { ?>
			<div class="entry-utility">
				<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'twentyten' ), __( '1 Comment', 'twentyten' ), __( '% Comments', 'twentyten' ) ); ?></span>
				<?php edit_post_link( __( 'Edit', 'twentyten' ), '<span class="meta-sep">|</span> <span class="edit-link">', '</span>' ); ?>			
			</div>
			<?php } ?>

			<?php comments_template(); ?>
			
			<?php if(is_single()) { ?>
				<nav class="pages clearfix">
			    <div class="nav-previous"><?php previous_post_link('%link', '&laquo; Previous Post'); ?></div>
			    <div class="nav-next"><?php next_post_link('%link', 'Next Post &raquo;') ?></div>
			  </nav>
			<?php } ?>

		</article>

	<?php endwhile; ?>
	
	<?php if (  $wp_query->max_num_pages > 1 ) : ?>
				<nav class="pages clearfix">
					<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'manifesto' ) ); ?></div>
					<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'manifesto' ) ); ?></div>
				</nav>
<?php endif; ?>

<?php endif; ?>