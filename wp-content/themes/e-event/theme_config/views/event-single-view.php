<?php $page_id = get_the_ID();
      $slide = $slides[0];
      $post_thumbnail_id = get_post_thumbnail_id( $page_id );
      $post_thumbnail_url = wp_get_attachment_url( $post_thumbnail_id );
      $col = get_post_meta( $page_id , THEME_NAME . '_sidebar_position', true ) == "full_width" ? '3' : '4';
      $custom_date = get_post_meta($page_id, THEME_NAME . '_custom_date', true) ? get_post_meta($page_id, THEME_NAME . '_custom_date', true) : date_i18n(get_option('date_format'), get_post_meta($page_id, THEME_NAME . '_event_start', true)); 
      ?>
    <div class="event-post">
        <div class="event-cover">
            <img src="<?php echo esc_attr($post_thumbnail_url); ?>" alt="<?php the_title(); ?>" />
        </div>
        <div class="event-header">
            <div class="event-header-box">
                <div class="row">
                    <div class="col-md-4">
                        <div class="box-event-info">
                            <i class="fa fa-calendar"></i>
                            <p><?php echo $custom_date.'</br>'.date(get_option('time_format'), get_post_meta($page_id, THEME_NAME . '_event_start', true)).' - '.date(get_option('time_format'), get_post_meta($page_id, THEME_NAME . '_event_end', true)); ?></p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <?php if(!empty($slide['options']['event_location'])): ?>
                            <div class="box-event-info">
                                <i class="fa fa-map-marker"></i>
                                <p><?php print $slide['options']['event_location']; ?></p>
                            </div>
                        <?php endif; ?>    
                    </div>
                    <div class="col-md-4">
                        <?php if(!empty($slide['options']['event_speaker'])): ?>
                            <div class="box-event-info">
                                <i class="fa fa-street-view"></i>
                                <p><?php _e('Speaker: ', 'e-event'); ?><br/> <?php print $slide['options']['event_speaker']; ?></p> 
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <h2><?php the_title() ?></h2>
        </div>
        <div class="event-content">
            <p><?php print $slide['options']['event_description']; ?></p>
            <p><?php the_content( ); ?></p>
        </div>
        <div class="event-footer">
            <ul class="event-socials">
                <?php tt_share(); ?>
            </ul>
            <?php if(_go('show_related_events') && $slide['related']): ?>
             <div class="event-selections">
                <a class="the-link-3"><?php _eo('show_related_title'); ?></a>
            </div>
            <?php endif; ?>
        </div>
    </div>

    <?php if(_go('show_related_events')): $count = _go('show_related_number'); ?>
    <!-- start coming-events -->
    <section class="coming-events related">
        <div class="row">
        <?php foreach($slide['related'] as $nr => $related):

        if ($nr >= $count) break;?>
            <div class="col-md-<?php echo esc_attr($col);?> col-xs-6">
                <div class="event-box">
                    <div class="event-box-cover">
                        <div class="event-box-hover">
                            <div class="event-box-share"><?php echo tt_get_post_views($related['post']->ID); ?><span><?php _e('Views','e-event');?></span></div>
                            <h6><?php echo implode(', ', $related['categories']); ?></h6>
                        </div>
                        <img src="<?php echo esc_attr($related['options']['event_cover']); ?>" alt="event" />
                    </div>
                    <h4><a href="<?php echo get_permalink($related['post']->ID); ?>"><?php echo get_the_title($related['post']->ID); ?></a></h4>
                    <p><?php echo get_post_meta($related['post']->ID, THEME_NAME . '_custom_date', true) ? get_post_meta($related['post']->ID, THEME_NAME . '_custom_date', true) : date_i18n(get_option('date_format'), get_post_meta($related['post']->ID, THEME_NAME . '_event_start', true));?></p>
                </div>
            </div>
         <?php endforeach; ?>   
        </div>
    </section>
    <!-- end coming-events -->
    <?php endif; ?>