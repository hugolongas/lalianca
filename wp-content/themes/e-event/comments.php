<?php 
wp_reset_postdata();
if(comments_open( ) || have_comments()) : ?>
<div class="comments-area">
	<?php if ( post_password_required() ) : ?>
				<p><?php _e( 'This post is password protected. Enter the password to view any comments ', 'e-event' ); ?></p>
			</div>

		<?php
		/* Stop the rest of comments.php from being processed,
		 * but don't kill the script entirely -- we still have
		 * to fully load the template.
		 */
		return;
		endif;?>

	<?php if ( have_comments() ) : ?>
		<h4 class="comment-title"><?php comments_number( __('No Comments','e-event'), __('1 Comment','e-event'), '% '.__('Comments','e-event') ); ?></h4>
		<div class="comments_navigation page-numbers center">
			<?php paginate_comments_links(array(
			'show_all'     => False,
			'end_size'     => 1,
			'mid_size'     => 2,
			'prev_next'    => True,
			'prev_text'    => '&larr;',
			'next_text'    => '&rarr;',
			'type'         => 'list',
			'add_args'     => False,
			'add_fragment' => ''
		)); ?>
		</div>

		<ul class="commentlist">
			<?php wp_list_comments( array( 'callback' => 'tt_custom_comments' , 'avatar_size'=>'64','style'=>'ul') ); ?>
		</ul>	
	
	<?php endif; ?>

	<?php 
		$args = array(
		'fields' => apply_filters( 'comment_form_default_fields', array(
			'author' => '<div class="row"><div class="col-md-6"><input class="comments-line" name="author" type="text" value="' . esc_attr( $commenter[ 'comment_author' ] ) . '" aria-required="true" placeholder="'.__('Your Name','e-event').'"></div>',
			'email' => '<div class="col-md-6"><input class="comments-line" name="email" type="text" value="' . esc_attr( $commenter[ 'comment_author_email' ] ) . '" aria-required="true" placeholder="'.__('Your E-mail','e-event').'"></div></div>',
			'url' => '<input class="comments-line" name="url" type="text" placeholder="'.__('Website','e-event').'" value="' . esc_attr( $commenter[ 'comment_author_url' ] ) . '"> '
				)
		),
		'comment_notes_after' => '<div class="form-submit align-center"><div class="comments-point"><div class="s-dot"><i></i></div>',
		'comment_notes_before' => '',
		'title_reply' => '',
		'comment_field' => '<textarea class="comments-area" name="comment" placeholder="'.__('Comment','e-event').'"></textarea>',
		'class_submit' => 'comments-button',
		'label_submit' => _x('Submit Comment','comment-form','e-event')
		);
		comment_form( $args );
	?>
</div>
<?php endif; ?>