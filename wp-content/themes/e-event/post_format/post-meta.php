
<!-- === Start Post Meta === -->

	<div class="post-header">
		<div class="post-date"><?php the_time('d') ?><span><?php the_time('F') ?></span></div>
		<h2><a href="<?php the_permalink(); ?>"><?php the_title() ?></a></h2>
        <ul>
            <li><?php _e('By ','E-event') ?><?php the_author( ) ?>&nbsp;</li>
            <li>Category: <?php the_category(', ') ?>&nbsp;</li>
            <?php if(has_tag( )): ?>
            <li>Tags: <?php the_tags('', ', ') ?>&nbsp;</li>
            <?php endif; ?>
            <li><?php _e('Comments','E-event') ?>&nbsp;(<?php comments_number( '0', '1', '%' ) ?>)&nbsp;</li>
        </ul>
    </div>
    <div class="post-content">
      <?php the_excerpt() ?>
    </div>
    <div class="post-footer">
      <a href="<?php the_permalink() ?>" class="the-link-2"><?php _e('Read More','E-event') ?></a>
    </div>