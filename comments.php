<div id="comments">
<?php if ( post_password_required() ) : ?>
				<p class="nopassword"><?php _e( 'This post is password protected. Enter the password to view any comments.', 'manity' ); ?></p>
			</div><!-- #comments -->
<?php
		/* Stop the rest of comments.php from being processed,
		 * but don't kill the script entirely -- we still have
		 * to fully load the template.
		 */
		return;
	endif;
?>

  <?php if ( have_comments() ) : ?>
  	<h3 id="comments-title"><?php comments_number('No Responses', 'One Response', '% Responses' );?> to &#8220;<?php the_title(); ?>&#8221;</h3>

  	<div class="navigation">
  		<div class="alignleft"><?php previous_comments_link() ?></div>
  		<div class="alignright"><?php next_comments_link() ?></div>
  	</div>

  	<ol class="commentlist">
  	<?php wp_list_comments('avatar_size=48'); ?>
  	</ol>

  	<div class="navigation">
  		<div class="alignleft"><?php previous_comments_link() ?></div>
  		<div class="alignright"><?php next_comments_link() ?></div>
  	</div>
   <?php else : // this is displayed if there are no comments so far ?>

  	<?php if ( comments_open() ) : ?>
  		<!-- If comments are open, but there are no comments. -->

  	 <?php else : // comments are closed ?>
  		<!-- If comments are closed. -->

  	<?php endif; ?>
  <?php endif; ?>


</div>