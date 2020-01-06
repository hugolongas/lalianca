	<?php 
	  $post_id = get_the_ID(); 
	  $audio_meta = get_post_meta($post->ID , THEME_NAME . '_audio_embed', true);
	  $post_thumbnail_id = get_post_thumbnail_id( $post_id );
	  $post_thumbnail_url = wp_get_attachment_url( $post_thumbnail_id ); 
	?>

<!-- === Start Post Audio === -->

	<div <?php post_class('blog-post');?>>
		<?php if(!empty($audio_meta)): ?>
			<div class="post-cover">
				<audio controls src="<?php echo esc_attr( $audio_meta ); ?>"></audio>
			</div>
		<?php elseif(!empty($post_thumbnail_url)): ?>
			<div class="post-cover">
				<a href="<?php the_permalink() ?>">
						<img src="<?php echo esc_attr($post_thumbnail_url); ?>" alt="audio cover" />
				</a>
			</div>
		<?php endif; ?>
		<?php get_template_part('post_format/post' , 'meta') ?>
	</div>

	    <ul class="site-dot">
	        <li></li>
	        <li><span><i></i></span></li>
	        <li></li>
	    </ul>
