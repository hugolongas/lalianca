	<?php 
	  $post_id = get_the_ID(); 
	  $video_meta = get_post_meta($post->ID , THEME_NAME . '_video_embed', true);
	  $post_thumbnail_id = get_post_thumbnail_id( $post_id );
	  $post_thumbnail_url = wp_get_attachment_url( $post_thumbnail_id ); 
	?>
	
<!-- === Start Post Video === -->

	<div <?php post_class('blog-post');?>>
		<?php if(!empty($video_meta)): ?>
			<div class="post-cover">
				<?php echo apply_filters('the_content',$video_meta); ?>
			</div>
		<?php elseif(!empty($post_thumbnail_url)):?>
			<div class="post-cover">
				<a href="<?php the_permalink() ?>">
						<img src="<?php echo esc_attr($post_thumbnail_url); ?>" alt="cover" />
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
