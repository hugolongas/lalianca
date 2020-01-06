<?php
$post_id = get_the_ID();

global $post; 
$attachments = get_children( array(
		'post_parent' => get_the_ID(),
		'post_status' => 'inherit',
		'post_type' => 'attachment',
		'post_mime_type' => 'image',
		'order' => 'ASC',
		'orderby' => 'menu_order ID',
		'posts_per_page' => -1)
	);

$options = get_post_meta($post_id, 'slide_options', true);
?>


	<!-- ========================= START GALLERY ======================== -->
	<section class="gallery-section single">
        <div class="container">
            <h3 class="site-title"><?php the_title(); ?></span><i></i></h3>
            <div class="row">
            <?php foreach ( $attachments as $thumb_id => $attachment ) : ?>
                <div class="col-md-3 col-xs-6">
                    <div class="gallery-item">
                        <div class="gallery-hover gallery-hover-single">
                            <a href="<?php echo wp_get_attachment_url($thumb_id); ?>" class="swipebox"><i class="fa fa-search"></i></a>
                        </div>
                        <img src="<?php echo wp_get_attachment_url($thumb_id); ?>" alt="gallery" />
                    </div>
                </div>
            <?php endforeach; ?>
            </div>
            <?php if($options['gallery_url']):?>
            <p class="align-center">
                <a href="<?php echo esc_url($options['gallery_url']);?>" class="section-link"><?php _e('View gallery source','e-event');?></a>
            </p>
            <?php endif;?>
        </div>
    </section>
    <!-- ========================= END GALLERY ======================== -->