<?php if (have_posts()) : ?>

	<?php while (have_posts()) : the_post(); ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<?php 
				if (!is_single() && !is_page()) {
					the_date('F j, Y', '<h5 class="entry-date"><abbr class="published">','</abbr></h5>');
				}
			?>
			<h3 class="entry-title"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h3>
			<h4 class="vcard author">by <span class="fn"><?php the_author(); ?></span></h4>

			<div class="entry-content">				
				<?php the_content('Read the rest of this entry &raquo;'); ?>
			</div>

			<?php if( !is_single() && !is_page()) { ?>
			<div class="entry-utility">
				<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'manifesto' ), __( '1 Comment', 'manifesto' ), __( '% Comments', 'manifesto' ) ); ?></span>
				<?php edit_post_link( __( 'Edit', 'manifesto' ), '<span class="meta-sep">|</span> <span class="edit-link">', '</span>' ); ?>			
			</div>
			<?php } else { ?>
				<div class="entry-utility">
          <?php
          $arc_year = get_the_time('Y');
          $arc_month = get_the_time('m');
          $arc_day = get_the_time('d');
          ?>
        
          <span>Published: <abbr class="published" title="<?php the_time('Y-m-d\TH:i:sO'); ?>"><a href="<?php echo get_day_link("$arc_year", "$arc_month", 
          "$arc_day"); ?>"><?php the_time('F j, Y'); ?></a></abbr></span>
          <span class="meta-sep">|</span> 
        	<span class="categories">Filed Under:</span> <?php the_category(', '); ?></span>
        	<?php the_tags('<span class="meta-sep">|</span> <span>Tags: ', ' : ', '</span>'); ?>
        	<?php edit_post_link( __( 'Edit', 'manifesto' ), '<span class="meta-sep">|</span> <span class="edit-link">', '</span>' ); ?>

        </div>
      <?php } ?>
			

			<?php comments_template(); ?>
			
			<?php if(is_single() && !is_page()) { ?>
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