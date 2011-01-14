<?php
	get_header();
	
	query_posts('cat=&showposts=5');
?>

<h2>Page Not Found</h2>

<div class="entry-content">
<p>
Unfortunately the content you're looking for isn't here. There may be a misspelling in your web address or you may have clicked a link for content that no longer exists. 

<?php
if (have_posts()) {
?>
Perhaps you would be interested in some of my most recent articles.
<?php
}
?>
</p>
</div>

   <h4>Recent Articles</h4>

   <?php query_posts('cat=&showposts=5'); ?>
   <div id="recentPosts">
   
   	<?php
			while (have_posts()) { 
				the_post();      	
   	?>
   		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<h3 class="entry-title"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h3>
				<h4 class="vcard author">by <span class="fn"><?php the_author(); ?></span></h4>

				<div class="entry-summary">
					<?php the_excerpt('Read the rest of this entry &raquo;'); ?>
				</div>
				
				<div class="entry-utility">
          <?php
          $arc_year = get_the_time('Y');
          $arc_month = get_the_time('m');
          $arc_day = get_the_time('d');
          ?>
        
          <span>Published: <abbr class="published" title="<?php the_time('Y-m-d\TH:i:sO'); ?>"><a href="<?php echo get_day_link("$arc_year", "$arc_month", 
          "$arc_day"); ?>"><?php the_time('F j, Y'); ?></a></abbr></span>
          <span class="meta-sep">|</span> 
					<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'manifesto' ), __( '1 Comment', 'manifesto' ), __( '% Comments', 'manifesto' ) ); ?></span>
          <span class="meta-sep">|</span> 
        	<span class="categories">Filed Under:</span> <?php the_category(', '); ?></span>
        	<?php the_tags('<span class="meta-sep">|</span> <span>Tags: ', ' : ', '</span>'); ?>
					<?php edit_post_link( __( 'Edit', 'manifesto' ), '<span class="meta-sep">|</span> <span class="edit-link">', '</span>' ); ?>			

        </div>

 		</article>
   	<?php
   		}
   	?>
   </div>

<?php
	get_footer();
?>