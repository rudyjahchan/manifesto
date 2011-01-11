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

  	<nav class="comments">
  		<div class="alignleft"><?php previous_comments_link() ?></div>
  		<div class="alignright"><?php next_comments_link() ?></div>
  	</nav>

  	<ol class="commentlist">
  	<?php wp_list_comments('avatar_size=48'); ?>
  	</ol>

  	<nav class="comments">
  		<div class="alignleft"><?php previous_comments_link() ?></div>
  		<div class="alignright"><?php next_comments_link() ?></div>
  	</nav>
   <?php else : // this is displayed if there are no comments so far

	/* If there are no comments and comments are closed,
	 * let's leave a little note, shall we?
	 */
	if ( ! comments_open() ) :
?>
	<p class="nocomments"><?php _e( 'Comments are closed.', 'twentyten' ); ?></p>
<?php endif; // end ! comments_open() ?>

<?php endif; // end have_comments() ?>

<?php

$fields =  array(
	'author' => '<div class="clearfix"><fieldset class="comment-author-info">' . '<label for="author">' . __( 'Name' ) . ':' . ( $req ? ' <em>Required</em>' : '' )  .
	            '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' />' . '</label> ',
	'email'  => '<label for="email">' . __( 'Email' ) . ':' . ( $req ? ' <em>Required</em>' : '' ) .
	            '<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' />' . '</label> ',
	'url'    => '<label for="url">' . __( 'Website' ) . ':' .
	            '<input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" />'  . '</label>' . '</fieldset>');

	$form_settings = array(
		'comment_notes_before' => '',
		'comment_notes_after' => '',
		'fields' => apply_filters( 'comment_form_default_fields', $fields),
		'logged_in_as' => '<div class="clearfix">',
		'comment_field' => '<label for="comment" class="comment-form-comment">' . _x( 'Comment', 'noun' ) . ':<textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea></label></div>'
	);
	
	comment_form($form_settings); 

?>

</div>