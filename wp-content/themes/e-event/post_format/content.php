<?php $post_id = get_the_ID(); ?>

<!-- === Start Post === -->

<div <?php post_class('blog-post');?>>
	<?php $post_thumbnail_id = get_post_thumbnail_id( get_the_ID() );
		  $post_thumbnail_url = wp_get_attachment_url( $post_thumbnail_id );
		  if(!empty($post_thumbnail_url)): ?>
		<div class="post-cover">
			<a href="<?php the_permalink() ?>">
					<img src="<?php echo esc_attr($post_thumbnail_url); ?>" alt="post cover" />
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
