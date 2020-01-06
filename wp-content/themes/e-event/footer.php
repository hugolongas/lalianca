    <!-- ========================= START FOOTER ======================== -->
    <?php  $footer = _go('footer_style') ? _go('footer_style') : '1' ;?>

    <footer class="footer-v<?php echo esc_attr($footer);?>">
        <?php if(_go('show_map_contact') && $footer == '1') {
            tt_gmap('contact_map','footer-map','footer-map','false');
        } else if($footer == '1') { ?>
            <div class="footer-no-map"></div>
        <?php } ?>
        <div class="container">
            <div class="bottom-footer">
            <?php if($footer == '1'):?>
                <div class="scroll-top"></div>
                <div class="subscribe-box">
                     <i class="fa fa-newspaper-o"></i>
                    <form class="newsletter-form" id="newsletter" method="post" data-tt-subscription>
                        <input type="text" name="email" placeholder="<?php _e('Subscribe for updates about new events','e-event') ?>" class="subscribe-line" data-tt-subscription-required data-tt-subscription-type="email">
                        <input type="submit" value="<?php _e('Subscribe','e-event') ?>" class="subscribe-button">
                        <div class="result_container"></div>
                    </form>
                </div>

                <ul class="footer-social">
                    <?php 
                        $count = TRUE;
                        $social_platforms = array(
                                'facebook',
                                'twitter',
                                'dribbble',
                                'youtube',
                                'google',
                                'linkedin',
                                'pinterest',
                                'instagram',
                                'vimeo',
                                'flickr');
                        foreach($social_platforms as $platform): 
                            if (_go('social_platforms_' . $platform)): $count = FALSE; ?>
                                <li>
                                    <a href="<?php echo esc_url(_go('social_platforms_' . $platform)); ?>"<?php echo (_go('social_window')) ? "target='_blank'" : "" ?>><i class="fa fa-<?php echo esc_attr($platform); if ($platform == 'vimeo'){echo "-square";} ?>" title="<?php echo esc_attr($platform); ?>"></i></a>
                                </li>
                            <?php endif;
                        endforeach; 
                        if($count) echo '<li></li>';
                    ?>      
                </ul>
                <div class="box-footer">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="logo">
                                <?php if(_go('footer_logo')): ?>
                                <a href="<?php echo esc_url(home_url()); ?>">
                                    <img src="<?php _eo('footer_logo') ?>" alt="<?php echo THEME_PRETTY_NAME ?> logo">
                                </a>
                                <?php elseif(_go('logo_image')): ?>
                                <a href="<?php echo esc_url(home_url()); ?>">
                                    <img src="<?php _eo('logo_image') ?>" alt="<?php echo THEME_PRETTY_NAME ?> logo">
                                </a>
                                <?php else: ?>
                                <?php echo THEME_PRETTY_NAME; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <nav class="second-nav">
                                <ul>
                                    <?php wp_nav_menu( array( 
                                        'title_li'=>'',
                                        'theme_location' => 'footer_menu',
                                        'container' => false,
                                        'items_wrap' => '%3$s',
                                        'fallback_cb' => 'wp_list_pages'
                                    ) );?>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="copyright">
                    <?php if(_go('copyright_message')): 
                        _eo('copyright_message');
                    else:?>
                        <?php esc_attr_e('&copy; ','e-event'); echo date('Y').' '; esc_attr_e('Designed by ','e-event');?><a href="<?php echo esc_url('https://www.teslathemes.com/'); ?>" target="_blank"><?php esc_attr_e('TeslaThemes','e-event'); ?></a>, <?php esc_attr_e('Supported by ', 'e-event');?><a href="<?php echo esc_url('https://wpmatic.io/'); ?>" target="_blank"><?php esc_attr_e('WPmatic','e-event');?></a>
                    <?php endif;?>
                </div>
            <?php else: ?>
                <div class="scroll-top"></div>
                <div class="subscribe-box">
                    <i class="fa fa-newspaper-o"></i>
                    <form class="newsletter-form" id="newsletter" method="post" data-tt-subscription>
                        <input type="text" name="email" placeholder="<?php _e('Subscribe for updates about new events','e-event') ?>" class="subscribe-line" data-tt-subscription-required data-tt-subscription-type="email">
                        <input type="submit" value="<?php _e('Subscribe','e-event') ?>" class="subscribe-button">
                        <div class="result_container"></div>
                    </form>
                </div>
                <div class="row">
                    <?php if ( is_active_sidebar( 'footer_bar' ) ) dynamic_sidebar('footer_bar');?>
                </div>

                <div class="copyright">
                    <?php if(_go('copyright_message')): 
                        _eo('copyright_message');
                    else:?>
                        <?php esc_attr_e('&copy; ','e-event'); echo date('Y').' '; esc_attr_e('Designed by ','e-event');?><a href="<?php echo esc_url('https://www.teslathemes.com/'); ?>" target="_blank"><?php esc_attr_e('TeslaThemes','e-event'); ?></a>, <?php esc_attr_e('Supported by ', 'e-event');?><a href="<?php echo esc_url('https://wpmatic.io/'); ?>" target="_blank"><?php esc_attr_e('WPmatic','e-event');?></a>
                    <?php endif;?>
                </div>
            <?php endif;?>
            </div>
        </div>
    </footer>

        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        <?php wp_footer(); ?>
    </body>
</html>