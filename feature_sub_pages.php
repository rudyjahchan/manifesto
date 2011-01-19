<?php
/*
Template Name: Feature Sub-Pages
*/
	get_header();
?>

<?php

get_template_part( 'loop', 'index' );

?>

<?php
	$projects =  get_posts(array('post_type' => 'page', 'orderby' => 'menu_order', 'order' => 'ASC', 'numberposts' => -1, 'post_parent' => $post->ID));
	
	if (count($projects) > 0) {
		foreach ($projects as $project) {
		?>
				<article id="post-<?php echo $project->ID; ?> hentry">
					<h3 class="entry-title"><a href="<?php echo get_permalink($project->ID); ?>" rel="bookmark"><?php echo get_the_title($project->ID); ?></a></h3>
					
					<a class="featured_image" href="<?php echo get_permalink($project->ID); ?>">
						<?php
							echo get_the_post_thumbnail($project->ID, "feature_image_size");
						?>
					</a>

					<div class="entry-summary">
						<?php echo $project->post_excerpt; ?>
					</div>

		</article>
		<?php
		}
	}
	?>


<?php
	get_footer();
?>