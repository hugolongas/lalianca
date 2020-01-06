<?php 
$columns = ($shortcode['columns']) ? 12 / $shortcode['columns'] : 3;
$title = $shortcode['title'];
?>
 	<!-- ========================= START GALLERY ======================== -->
    <section class="gallery-section">
    <?php if(!empty($title)) echo '<h3 class="site-title">'.$title.'<i></i></h3>'; ?>
        <div class="row">
        	<?php foreach($slides as $slide_nr => $slide): if($slide_nr >= $shortcode['nr']) break; ?>
            <div class="col-md-<?php echo esc_attr($columns);?> col-xs-6">
                <div class="gallery-item">
                    <div class="gallery-hover">
                        <h3><a href="<?php echo get_the_permalink($slide['post']->ID); ?>"><?php echo get_the_title($slide['post']->ID); ?></a></h3>
                        <a href="<?php echo get_the_permalink($slide['post']->ID); ?>"><i class="fa fa-expand"></i></a>
                    </div>
                    <img src="<?php echo esc_attr($slide['options']['gallery_cover']);?>" alt="gallery" />
                </div>
            </div>
            <?php endforeach;?>
        </div>
    </section>
    <!-- ========================= END GALLERY ======================== -->