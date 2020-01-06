<?php
$post_thumbnail_id = get_post_thumbnail_id( get_the_ID() );
$post_thumbnail_url = wp_get_attachment_url( $post_thumbnail_id ); ?>

<?php if(!empty($post_thumbnail_url)): ?>
	<div class="post-cover">
		<a href="<?php the_permalink() ?>">
			<img src="<?php echo esc_attr($post_thumbnail_url); ?>" alt="post cover" />
		</a>
	</div>
<?php endif; ?>