<?php
$post_thumbnail_id = get_post_thumbnail_id( get_the_ID() );
$post_thumbnail_url = wp_get_attachment_url( $post_thumbnail_id ); 
$video_meta = get_post_meta($post->ID , THEME_NAME . '_video_embed', true); ?>

	<?php if(!empty($video_meta)): ?>
		<div class="post-cover">
			<?php echo apply_filters('the_content',$video_meta); ?>
		</div>
	<?php elseif(!empty($post_thumbnail_url)):?>
		<div class="post-cover">
			<a href="<?php the_permalink() ?>">
					<img src="<?php echo esc_attr($post_thumbnail_url); ?>" alt="video cover" />
			</a>
		</div>
	<?php endif; ?>
