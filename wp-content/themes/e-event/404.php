<?php get_header(); ?>

        <!-- ========================= START PATH SECTION ======================== -->
            <section class="error-section">                
                <div class="container">
					<h3><?php _eo('error_title') ?></h3>
					<h4><?php _eo('error_message') ?></h4>
                    <ul class="site-dot">
                        <li></li>
                        <li><span><i></i></span></li>
                        <li></li>
                    </ul>
                    <?php 
                     ?>
                    <?php echo _go('error_button') ? '<a href="'.get_site_url().'" class="the-link">'._go('error_button').'</a>' : ''; ?>
                </div>
            </section>
    </div>
    
<?php get_footer(); ?>