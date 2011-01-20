<?php
/*
Template Name: Feature Sub-Pages
*/
	get_header();
?>

<?php if (have_posts()) { 

		while (have_posts()) { 
			the_post(); 
		
			$date_header = !is_single() && !is_page() && !is_archive() && !is_search() && !is_404();
		?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<?php 
				if ($date_header) {
					the_date('F j, Y', '<h5 class="entry-date"><abbr class="published">','</abbr></h5>');
				}
			?>
			<h3 class="entry-title"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h3>
			
				<?php 
					if (has_post_thumbnail()) {
						the_post_thumbnail( 'feature_image_size' ); 
					}
				?>
			
				<div class="entry-content clearfix">				
					<?php the_content('Read the rest of this entry &raquo;'); ?>
				</div>

				<?php
					$projects =  get_posts(array('post_type' => 'page', 'orderby' => 'menu_order', 'order' => 'ASC', 'numberposts' => -1, 'post_parent' => $post->ID));
					
					if (count($projects) > 0) {
						foreach ($projects as $project) {
						?>
						<section id="post-<?php echo $project->ID; ?>">
							<h3 class="entry-title"><a href="<?php echo get_permalink($project->ID); ?>" rel="bookmark"><?php echo get_the_title($project->ID); ?></a></h3>
							
							<a class="featured_image" href="<?php echo get_permalink($project->ID); ?>">
								<?php
									echo get_the_post_thumbnail($project->ID, "feature_image_size");
								?>
							</a>
		
							<div class="entry-summary">
								<p class="clearfix">
									<?php echo $project->post_excerpt; ?>
									<a href="<?php echo get_permalink($project->ID); ?>" class="more">more &raquo;</a>
								</p>
							</div>
						</section>
						<?php
						}
					}
				?>
	
				<div class="entry-utility">
          <?php
          $arc_year = get_the_time('Y');
          $arc_month = get_the_time('m');
          $arc_day = get_the_time('d');
          ?>
        
          <span>Published: <abbr class="published" title="<?php the_time('Y-m-d\TH:i:sO'); ?>"><a href="<?php echo get_day_link("$arc_year", "$arc_month", 
          "$arc_day"); ?>"><?php the_time('F j, Y'); ?></a></abbr></span>
          <?php
          if(!is_page()) {
	          ?>
	          <span class="meta-sep">|</span> 
	        	<span class="categories">Filed Under: <?php the_category(', '); ?></span>
	        	<?php 
        		the_tags('<span class="meta-sep">|</span> <span>Tags: ', ' : ', '</span>');
        		edit_post_link( __( 'Edit', 'manifesto' ), '<span class="meta-sep">|</span> <span class="edit-link">', '</span>' ); 
        	}	
        	?>

        </div>			

			<?php 
				if (!is_page() || comments_open() ) {
					comments_template(); 
				}
			?>
			
		</article>

	<?php } ?>
	
	<?php if (  $wp_query->max_num_pages > 1 ) : ?>
				<nav class="pages clearfix">
					<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'manifesto' ) ); ?></div>
					<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'manifesto' ) ); ?></div>
				</nav>
<?php endif; ?>

<?php } else { ?>

<?php } ?>

<?php
	get_footer();
?>