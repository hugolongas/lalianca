<?php get_header(); ?>

<?php if(have_posts()) : the_post(); ?>
            <!-- ========================= START PATH SECTION ======================== -->
            <section class="path-section">                
                <div class="container">
                   <h3><?php echo get_post_type(); ?></h3>
                    <ul class="site-dot">
                        <li></li>
                        <li><span><i></i></span></li>
                        <li></li>
                    </ul>
                    <p><?php if(function_exists('bcn_display')) { bcn_display();}?></p>
                </div>
            </section>
    </div>

        	<?php echo Tesla_slider::get_slider_html('gallery','','single',get_the_ID()); ?>
<?php endif; ?>

<?php get_footer(); ?>