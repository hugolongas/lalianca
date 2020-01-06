<?php
$post_thumbnail_id = get_post_thumbnail_id( get_the_ID() );
$post_thumbnail_url = wp_get_attachment_url( $post_thumbnail_id ); 
$audio_meta = get_post_meta($post->ID , THEME_NAME . '_audio_embed', true); ?>

<?php if (!empty($audio_meta)):?>
	<div class="post-cover">
		<div class="audio-box">
			<audio controls src="mp3/main theme.mp3"></audio>
		</div>
	</div>
<?php elseif(!empty($post_thumbnail_url)): ?>
	<div class="post-image post-cover">
		<img src="<?php echo esc_attr($post_thumbnail_url); ?>" alt="audio cover" />
	</div>
<?php endif; ?>
