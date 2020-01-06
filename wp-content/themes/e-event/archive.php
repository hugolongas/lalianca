<?php get_header(); ?>
<?php
/**
 * Archive Page
 */
$blog_id_s = get_option( 'page_for_posts' );
$sidebar = get_post_meta( $blog_id_s, THEME_NAME . '_sidebar_position', true );
$sidebar = $sidebar ? $sidebar : 'right';
?>
        <!-- ========================= START PATH SECTION ======================== -->
            <section class="path-section">                
                <div class="container">
                    <?php if (is_day()) { ?><h3><?php _e('Archive for: ', 'e-event'); ?><?php the_time('F jS, Y'); ?></h3>
                    <?php } elseif (is_month()) { ?><h3><?php _e('Archive for: ', 'e-event'); ?><?php the_time('F, Y'); ?></h3>
                    <?php } elseif (is_year()) { ?><h3><?php _e('Archive for: ', 'e-event'); ?><?php the_time('Y'); ?></h3>
                    <?php } elseif (is_author()) { ?><h3><?php _e('Author Archives: ', 'e-event'); echo get_the_author(); ?></h3>  <?php } ?>
                    <ul class="site-dot">
                        <li></li>
                        <li><span><i></i></span></li>
                        <li></li>
                    </ul>
                    <p><?php if(function_exists('bcn_display')) { bcn_display();}?></p>
                </div>
            </section>
    </div>

    <!-- ========================= START CONTENT ======================== --> 
    <section class="content-section">
        <div class="container">
            <div class="row">
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
                <?php if($sidebar !== "full_width"): ?>
                    <div class="col-md-9">
                <?php endif; ?>
                <?php if (have_posts()): ?>
                        <?php while(have_posts()): the_post(); 
                            get_template_part('post_format/content', get_post_format() ? get_post_format() : 'standart');
                        endwhile; ?>
                    <?php get_template_part('nav','main'); ?>
                <?php else: ?>
                    <h2><?php _e('No matching posts found','e-event'); ?></h2>
                <?php endif; ?>
                <?php if($sidebar !== "full_width"): ?>
                    </div>
                <?php endif; ?>
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
        </div>
    </section>
<?php get_footer(); ?>