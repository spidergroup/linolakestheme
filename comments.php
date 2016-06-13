<?php

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) {
	exit;
}

if ( post_password_required() ) {
	return;
} 

?>
	<div id="comments" class="comments-area 22">
		<?php if ( have_comments() ) : ?>
			<h3 class="comments-title">
				<h5>
					<span class="label label-info">Comments</span>
				</h5>
				
			</h3>
			<ul class="comment-list">
				<?php 
				wp_list_comments( array(
					'short_ping'  => true, 
					'callback' => 'linolakestheme_comments'
				) );
				?>
			</ul>
		<?php endif; ?>
		<?php if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
			<p class="no-comments">
				<?php _e( 'Comments are closed.' ); ?>
			</p>
		<?php endif; ?>
		<?php //comment_form(); ?>
		
<?php 		
	$args = array(
		'class_form' => 'comment-form row col-sm-6',
		'label_submit' => __( 'Post' ),
		'class_submit' => 'btn btn-default',
		'title_reply'       => __( 'Reply' ),
		'title_reply_to'    => __( 'Reply to %s' ),
		'cancel_reply_link' => __( 'Cancel Reply' ),
		'comment_field' => 
			'<div class="form-group">' .
			'	<textarea id="comment" name="comment" class="form-control" cols="45" rows="8" aria-required="true" placeholder="Comment"></textarea>' . 
			'</div>',
			
		'fields' => apply_filters( 'comment_form_default_fields', array(
	
			
			'author' =>
				'<div class="form-group">' .
				'	<input type="text" class="form-control" id="author" name="author" placeholder="Name" value="' . 
					esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . '/>' .
				'</div>',
				
			'email' =>
				'<div class="form-group">' .
				'	<input type="email" class="form-control" id="email" name="email" placeholder="Email" value="' . 
					esc_attr( $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . '/>' .
				'</div>',
				
			'url' =>
				'<div class="form-group">' .
				'	<input type="text" class="form-control" id="url" name="url" placeholder="Website" value="' . 
					esc_attr( $commenter['comment_author_url'] ) . '" size="30"' . $aria_req . '/>' .
				'</div>'
		)));
	comment_form( $args );

?>
		
</div>