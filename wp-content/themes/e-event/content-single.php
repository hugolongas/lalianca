<div <?php post_class('blog-post');?> id="post-<?php the_ID(); ?>">

	<?php get_template_part('post_format/header', get_post_format());?>

	<!-- === Start Post Title === -->
	<div class="post-header">
		<div class="post-date"><?php the_time('d') ?><span><?php the_time('F') ?></span></div>
		<h2><a href="<?php the_permalink(); ?>"><?php the_title() ?></a></h2>
        <ul>
            <li><?php _e('By ','e-event') ?><?php the_author( ) ?>&nbsp;</li>
            <li>Category: <?php the_category(', ') ?>&nbsp;</li>
            <li><?php _e('Comments','e-event') ?>&nbsp;(<?php comments_number( '0', '1', '%' ) ?>)&nbsp;</li>
        </ul>
    </div>

	<!-- === Start Post Body === -->
	<div class="post-content">
		<?php the_content() ?> 
		<div class="post-navigation">
			<?php wp_link_pages(array(
				'next_or_number'   => 'number',
				'nextpagelink'     => __( 'Next page','e-event' ),
				'previouspagelink' => __( 'Previous page','e-event' ),
				'pagelink'         => '%',
				'echo' => 1
			)); ?>
		</div>
	</div>
	<div class="post-footer">
        <ul>
            <?php if(has_tag( )): ?>
            <li><?php _e('Tags: ','e-event');?></li> 
            <li><?php the_tags('', ', ') ?>&nbsp;</li>
            <?php endif; ?>
        </ul>
        <ul class="post-socials">
        <?php tt_share(); ?>
        </ul>
        <div class="post-selections">
            <a href="<?php echo get_permalink(get_adjacent_post(false,'',false)); ?>" class="the-link-2 float-right"><?php _ex(' Next post','Single post Pagination','e-event') ?></a>
            <a href="<?php echo get_permalink(get_adjacent_post(false,'',true)); ?>" class="the-link-3"><?php _ex(' Previous post','Single post Pagination','e-event') ?></a>
        </div>
    </div>
</div>