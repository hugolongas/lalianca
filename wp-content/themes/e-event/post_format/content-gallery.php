<?php $post_id = get_the_ID();
global $post; 
$attachments = get_children( array(
		'post_parent' => get_the_ID(),
		'post_status' => 'inherit',
		'post_type' => 'attachment',
		'post_mime_type' => 'image',
		'order' => 'ASC',
		'orderby' => 'menu_order ID',
		'numberposts' => 5)
	);?>

<!-- === Start Post Gallery === -->

<div <?php post_class('blog-post');?>>
	<?php if(!empty($attachments)): ?>
		<div class="post-cover">
            <div class="the-slider" data-tesla-plugin="slider" data-tesla-item=".slide" data-tesla-next=".slide-right" data-tesla-prev=".slide-left" data-tesla-container=".slide-wrapper">
                <ul class="slide-arrows">
                    <li class="slide-left"></li>
                    <li class="slide-right"></li>
                </ul>
                <ul class="slide-wrapper">
					<?php foreach ( $attachments as $thumb_id => $attachment ) : ?>
						<li class="slide">
							<div class="image">
								<a href="#">
									<?php echo wp_get_attachment_image($thumb_id, 'full' ); ?>
								</a>
							</div>   
						</li>
					<?php endforeach; ?>
				</ul>
                <ul class="slider-dots" data-tesla-plugin="bullets">
                    <li class="active"></li>
                    <li></li>
                    <li></li>
                </ul>
            </div>
		</div>
	<?php endif; ?>
	<?php get_template_part('post_format/post' , 'meta') ?>
</div>

    <ul class="site-dot">
        <li></li>
        <li><span><i></i></span></li>
        <li></li>
    </ul>