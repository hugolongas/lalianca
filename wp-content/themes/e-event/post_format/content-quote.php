<?php $post_id = get_the_ID(); ?>

<!-- === Start Post Quote === -->

<div <?php post_class('blog-post');?>>
		<div class="post-cover">
			<blockquote>
			<?php the_excerpt(' '); ?>
            </blockquote>
		</div>
	<?php get_template_part('post_format/post' , 'meta') ?>
</div>

    <ul class="site-dot">
        <li></li>
        <li><span><i></i></span></li>
        <li></li>
    </ul>
