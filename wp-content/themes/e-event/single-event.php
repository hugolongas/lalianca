<?php
/**
 * Single Event Page
 */
$post_id = get_the_ID();
$sidebar = get_post_meta( $post_id , THEME_NAME . '_sidebar_position', true );
$sidebar = $sidebar ? $sidebar : 'right';
?>

<?php get_header(); ?>

        <!-- ========================= START PATH SECTION ======================== -->
<?php if(have_posts()) : the_post(); ?>
        <section class="path-section">                
            <div class="container">
               <h3><?php _e('Event','e-event');?></h3>
                <ul class="site-dot">
                    <li></li>
                    <li><span><i></i></span></li>
                    <li></li>
                </ul>
                <p><?php if(function_exists('bcn_display')) { bcn_display();}?></p>
            </div>
        </section>
    </div>

    <!-- ========================= START EVENT ======================== -->
    <section class="event-section">
        <div class="container">
        <?php if($sidebar !== "full_width"): ?>
        <div class="row">
        <?php endif; ?>
            <?php if($sidebar == "left"): ?>
                <div class="col-md-3">
                    <div class="main-sidebar"> 
                        <?php get_sidebar(); ?>           
                    </div>
                </div>
            <?php endif; ?>          
                <div class="<?php print $sidebar == "full_width" ? 'col-md-10 col-md-offset-1' : 'col-md-9';?>">
                <?php echo Tesla_slider::get_slider_html('event','','single',get_the_ID()); ?>
                <?php tt_set_post_views(get_the_ID()); ?>
                </div>
            <?php if($sidebar == "right"): ?>
                <div class="col-md-3">
                    <div class="main-sidebar">              
                        <?php get_sidebar(); ?>
                    </div>
                </div>
            <?php endif; ?>
        <?php if($sidebar !== "full_width"): ?>
        </div>
        <?php endif; ?>
        </div>
    </section>
    
<?php endif;?>

<?php get_footer(); ?>