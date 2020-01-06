<?php 


/***********************************************************************************************/
/* Shortcodes */
/***********************************************************************************************/

/* Shorcode TC CART Extended
============================================*/
add_shortcode( 'tc_cart', 'tc_cart_page');

function tc_cart_page( $atts ) {
    ob_start();
    include( get_template_directory() . '/tc_templates/shortcode-cart-contents.php' );
    $content = wpautop( ob_get_clean(), true );
    return $content;
}

/* Shorcode Pricing
============================================*/

add_shortcode('pricing_box', 'pricing_box');

function pricing_box($atts, $content = null) {
    extract(shortcode_atts(array(
        'type' => '1'
    ), $atts));
 
    $GLOBALS['fill'] = $type;

    return '<ul class="row pricing-tables-'.$type.'">'. do_shortcode(shortcode_unautop($content)) .'</ul>';
}

add_shortcode('pricing_table', 'pricing_table');

function pricing_table( $atts ) {
    extract(shortcode_atts(array(
        'price' => '',
        'pack' => '',
        'features' => '',
        'button' => '',
        'button_url' => '#',
        'class' => '',
    ), $atts));

    $features = '<li>'.$features;
    $features = str_replace(',','</li><li>', $features);
    $type = $GLOBALS['fill'];

    ob_start();?>
    <li class="col-md-4">
    <?php if($type==1):?>
        <div class="pricing-box">
            <div class="pricing-box-circle">
                <div>
                    <i class="fa fa-ticket"></i>
                    <h6><?php print $price;?></h6>
                    <p><?php print $pack;?></p>
                </div>
            </div>
            <div class="pricing-box-info">
                <div class="pricing-box-round"><span></span></div>
                <ul>
                   <?php print $features; ?>
                </ul>
                <div class="align-center"><a href="<?php echo esc_url($button_url);?>"><?php print $button;?></a></div>
            </div>
        </div>
    <?php elseif($type==2):?>
        <?php print $class ? '<div class="pricing-box pricing-box-popular"><div class="most-popular">'.$class.'</div>' : '<div class="pricing-box">'; ?>
            <h6><?php print $price;?></h6>
            <p><?php print $pack;?></p>
            <ul class="site-dot">
                <li></li>
                <li><span><i></i></span></li>
                <li></li>
            </ul>
            <div class="pricing-box-info">
                <ul>
                    <?php print $features; ?>
                </ul>
            </div>
            <div class="align-center"><a href="<?php echo esc_url($button_url);?>"><?php print $button;?></a></div>
        </div>
    <?php elseif($type==3):?>
        <?php print $class ? '<div class="pricing-box pricing-box-popular"><div class="most-popular">'.$class.'</div>' : '<div class="pricing-box">'; ?>
            <div class="pricing-box-info">
                <ul>
                    <?php print $features; ?>
                </ul>
            </div>
            <ul class="site-dot">
                <li></li>
                <li><span><i></i></span></li>
                <li></li>
            </ul>
            <h6><?php print $price;?></h6>
            <p><?php print $pack;?></p>
            <div class="align-center"><a href="<?php echo esc_url($button_url);?>"><?php print $button;?></a></div>
        </div>
    <?php endif;?>
    </li>
    <?php return ob_get_clean();
}

add_shortcode('tt_title', 'tt_title');

function tt_title($atts, $content = null) {
    extract(shortcode_atts(array(
        'title' => ''
    ), $atts));

    return '<h3 class="site-title">'.$title.'<i></i></h3>'. do_shortcode(shortcode_unautop($content));
}

/* Shorcode Schedule Type 1
============================================*/
add_shortcode('tt_schedule', 'tt_schedule');

function tt_schedule( $atts ) {
    extract(shortcode_atts(array(
        'title' => '',
        'start' => '',
        'end' => '',
        'sort' => ''
    ), $atts));

    $loop = new WP_Query(array (
        'post_type' => 'event',
        'suppress_filters' => false, 
        'posts_per_page' => -1,
        'orderby' => 'meta_value_num',
        'meta_key' => THEME_NAME . '_event_start',
        'order' => !empty($sort) ? $sort : 'ASC',
        'meta_query' => array(
            'relation' => 'AND',
            array(
                'key' => THEME_NAME .'_event_start',
                'value' => $start ? strtotime('01 '.$start.' 00:00:00') : strtotime('01 '.date('F Y').' 00:00:00'),
                'compare' => '>',
            ),
             array(
                'key' => THEME_NAME .'_event_start',
                'value' => $end ? strtotime('31 '.$end.' 23:59:59') : strtotime(date('d F Y H:i:s', strtotime('+151 days'))),
                'compare' => '<',
            )
        )
    )); 
    $p_dates = array();
    $p_dates_t = array();
    $events = array();
    $p_day = '';


    while ( $loop->have_posts() ) : $loop->the_post();
        $events[] += get_the_ID();
        if(!in_array(date_i18n('F',get_post_meta(get_the_ID(), THEME_NAME . '_event_start', true)), $p_dates)) {
            $p_dates[] = date_i18n('F',get_post_meta(get_the_ID(), THEME_NAME . '_event_start', true));
            $p_dates_t[] = date_i18n('F',get_post_meta(get_the_ID(), THEME_NAME . '_event_start', true));
        }
    endwhile;

    ob_start();?>
    <section class="event-schedule">
        <?php if($title) print '<h3 class="site-title">'.$title.'<i></i></h3>'; ?>
        <div role="tabpanel" class="event-schedule-table">
            <ul class="nav nav-tabs" role="tablist">
            <?php foreach($p_dates_t as $p_date_nr => $p_date): ?>
                <li role="presentation" <?php print $p_date_nr == 0 ? 'class="active"' : ''; ?>><a href="#schedule<?php echo esc_attr($p_date_nr);?>" aria-controls="schedule<?php echo esc_attr($p_date_nr);?>" role="tab" data-toggle="tab"><?php print $p_date;?></a></li>
            <?php endforeach; ?>
            </ul>
            <div class="tab-content">
                <?php foreach($p_dates_t as $p_date_nr => $p_date): ?>
                    <div role="tabpanel" class="tab-pane <?php echo esc_attr($p_date_nr) == 0 ? 'active' : ''; ?>" id="schedule<?php echo esc_attr($p_date_nr); ?>">
                        <?php foreach($events as $event_nr => $event_id):
                            $event_start = get_post_meta($event_id, THEME_NAME . '_event_start', true);
                            $event_end = get_post_meta($event_id, THEME_NAME . '_event_end', true);
                            $options = get_post_meta($event_id, 'slide_options', true); 
                             $custom_date = get_post_meta($event_id, THEME_NAME . '_custom_date', true) ; 
                            ?>  
                            <?php if($options['event_checked']):?>
                                <?php if($p_date == date_i18n('F', $event_start)): ?>
                                    <?php if($p_day != date_i18n('d F', $event_start)):?> 
                                        <?php $p_day = date_i18n('d F', $event_start);?>
                                        <div class="event-day">        
                                         <h5><?php echo $custom_date ?  $custom_date : date_i18n('M', $event_start); ?> <span><?php echo $custom_date ? '' : date_i18n('d', $event_start); ?></span></h5>
                                    <?php endif; ?>
                                        <ul class="row">
                                            <li class="col-md-1"><span><?php echo date_i18n(get_option('time_format'),$event_start);?></span><?php echo date_i18n(get_option('time_format'),$event_end);?></li>
                                            <li class="col-md-5"><a href="<?php echo get_the_permalink($event_id);?>"><?php echo get_the_title($event_id);?></a></li>
                                            <li class="col-md-2"><i><?php _e('Speaker: ','e-event'); ?><?php print $options['event_speaker'];?></i></li>
                                            <li class="col-md-3"><span><?php _e('Venue: ','e-event'); ?></span><?php print $options['event_location'];?></li>
                                        </ul> 
                                    <?php
                                        if(empty($events[$event_nr+1])) { print '</div>'; break; }
                                        if($p_day != date_i18n('d F',get_post_meta($events[$event_nr+1], THEME_NAME . '_event_start', true))) print '</div>'; 
                                        ?>
                                <?php endif; ?>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <?php return ob_get_clean();
}

/* Shorcode Schedule Type 2
============================================*/
add_shortcode('tt_schedule2', 'tt_schedule2');

function tt_schedule2( $atts ) {
    extract(shortcode_atts(array(
        'title' => '',
        'date' => '',
        'start_hour' => '',
        'end_hour' => ''
    ), $atts));

    $week = $date ? date('d F Y', strtotime($date.' - '.date('w', strtotime($date.' - 1 day')).' days')) : date('d F Y', strtotime(date('d F Y').' - '.date('w', strtotime(date('d F Y').' - 1 day')).' days'));

    $loop = new WP_Query(array (
        'post_type' => 'event',
        'posts_per_page' => -1,
        'orderby' => 'meta_value_num',
        'meta_key' => THEME_NAME . '_event_start',
        'order' => 'ASC',
         'meta_query' => array(
            'relation' => 'AND',
            array(
                'key' => THEME_NAME .'_event_start',
                'value' => strtotime($week.' 00:00:00'),
                'compare' => '>=',
            ),
             array(
                'key' => THEME_NAME .'_event_start',
                'value' => strtotime($week.' 00:00:00 + 7 days'),
                'compare' => '<=',
            )
        )
    )); 

    $weekdays = array(_x('Monday','schedule','e-event'),_x('Tuesday','schedule','e-event'),_x('Wednesday','schedule','e-event'),_x('Thursday','schedule','e-event'),_x('Friday','schedule','e-event'),_x('Saturday','schedule','e-event'),_x('Sunday','schedule','e-event'));

    $start_hour = intval($start_hour);
    $end_hour = intval($end_hour);
    $end_start = $end_hour - $start_hour;

    $step = 1;
    $divider = ' - ';

    $timeline_thead_group = '<col class="col-hours" />';
    $timeline_thead_rows = '<th></th>';

    foreach ($weekdays as $key => $value){
        $timeline_thead_group .= '<col/>';
        $timeline_thead_rows .= '<th><span>'.$value.'</span></th>';
    }

    $t_title = $title ? '<h3 class="site-title">'.$title.'<i></i></h3>' : '';

    $thead_group = '<colgroup>'.$timeline_thead_group.'</colgroup>';
    $thead_rows =  '<section class="timetable-section">'.$t_title.'<table class="timetable">'.$thead_group.'
                            <thead>
                                <tr>'.$timeline_thead_rows.'</tr>
                            </thead>';

    $thead = $thead_rows;
    $tbody = '';

    $events = array();

    $i = 0;

    while ($loop->have_posts()) : $loop->the_post();
        $e_id = get_the_ID();
        $options = get_post_meta($e_id, 'slide_options', true);
        if($options['event_checked']) {
            $events[$i] = 
                array(
                    'title' =>  get_the_title($e_id),
                    'permalink' => get_the_permalink($e_id),
                    'has_event' => $options['event_checked'],
                    'start_hh' => date_i18n('H',get_post_meta($e_id, THEME_NAME . '_event_start', true)),
                    'start_mm' => date_i18n('i',get_post_meta($e_id, THEME_NAME . '_event_start', true)),
                    'end_hh' => date_i18n('H',get_post_meta($e_id, THEME_NAME . '_event_end', true)),
                    'end_mm' => date_i18n('i',get_post_meta($e_id, THEME_NAME . '_event_end', true)),
                    'days' => date_i18n('l',get_post_meta($e_id, THEME_NAME . '_event_start', true))
                );
            $i++;
        }
    endwhile;

    $mycount = 0;  

    if (!function_exists('timetable_days')) {

        function timetable_days( $end_start, $weekdays, $start_hour, $step, $events, $mycount, $end_hour ){
            $days = '';  $weekday_index = -1; $prefix = ':00'; $position = array();

            $prev_row = null; $prev_rows = null; $row_desc = 0;
           
            for ($i = 0; $i < $end_start*count($weekdays); $i+=$step){
                
                $weekday_index++;

                if ($i == 0) {
                    $start_hour = $start_hour < 10 ? '0'.$start_hour.$prefix : $start_hour.$prefix;
                    $start_hour_step = $start_hour + $step;
                    $start_hour_step = $start_hour_step < 10 ? '0'.$start_hour_step.$prefix : $start_hour_step.$prefix;

                    $days .= '<tr><td>'. $start_hour.' - '.$start_hour_step.'</td>';
                }

                if (($i % 7 == 0) && ($i > 0))  {
                    $weekday_index = 0;
                    $start_hour += $step;
                    $start_hour_step = $start_hour + $step;
                    $start_hour_step = $start_hour_step < 10 ? '0'.$start_hour_step.$prefix : $start_hour_step.$prefix;                    
                    $start_hour = $start_hour < 10 ? '0'.$start_hour.$prefix : $start_hour.$prefix;

                    $days .= '</tr><tr><td>'.$start_hour.' - '.$start_hour_step.'</td>';

                }
                
                
                $timeline_event = ''; $space=''; $has_event = ''; $rowspan = 1; $is_unique = 1; $day = 'WEEKDAY START';
                foreach ($events as $key => $event){
                    if( intval($start_hour) === intval($events[$key]['start_hh']) && $events[$key]['days'] === $weekdays[$weekday_index]){
              
                        /* check */
                      
                        $evt_end_hour = intval($events[$key]['end_hh']);
                        $evt_end_min = intval($events[$key]['end_mm']);
                        $time_end_hour = intval($start_hour + $step);
                        
                        // $day !== $events[$key]['days'] to avoid extra rowspan++ if goes two and more events in one day

                        if ( ( ($evt_end_hour >= $time_end_hour) || (($evt_end_hour >= $time_end_hour) && $evt_end_min) ) && ($day !== $events[$key]['days']) && ( $evt_end_hour > 0 && $evt_end_hour < $end_hour)){
                            
                            if ( $evt_end_hour === $time_end_hour ) $rowspan--;
                            do {
                                $rowspan++;
                                $time_end_hour++;
                            } while ($evt_end_hour > $time_end_hour);
                            
                            if($evt_end_min) $rowspan++;
                            
                           
                            if ( $rowspan > 1) {
                                $event_rows = ceil($i/7) + $rowspan;
                                $rows_counter = ceil($i/7);

                                $curr_row = null;
                                
                                

                                    if( !$prev_row ){
                                        $prev_row = ceil($i/7);
                                        $prev_rows = $rowspan;
                                    } else  {

                                        $curr_row = ceil($i/7);

                                        if (($prev_rows + $prev_row) > $curr_row && $prev_row !== $curr_row){
                                            $row_desc =  $curr_row - ($prev_rows + $prev_row);
                                        }
                                    }
                                    if ($curr_row) {
                                        $prev_row = $curr_row;
                                        $prev_rows= $rowspan;   
                                    }
                            }

                        }
                         $day = $events[$key]['days']; 

                        if ( !empty($events[$key]['has_event']) ){
                                if ( !$is_unique ){
                                    $has_event .= '';
                                } else {
                                    $has_event .= 'd-bg-c'; $is_unique = false;
                                }
                                
                            } else{
                                $has_event .= '';
                            }

                            $timeline_event .= '<a href="'.$events[$key]['permalink'].'">'.$events[$key]['title'].'</a><span>'.$events[$key]['start_hh'].':'.$events[$key]['start_mm'].' - '.$events[$key]['end_hh'].':'.$events[$key]['end_mm'].'</span><br />';
    
                    }
                }

                if ($rowspan > 1){
                    $days .= '<td class="'.$has_event.'" rowspan="'.$rowspan.'">'.$timeline_event.'</td>';
                    $pos = $i;

                    do {
                        $position[] = $pos+=7;
                        $rowspan--; // do not delete this line -> cause to out of memory
                    } while ($rowspan > 1);
                } else {
                    if ( !in_array($i, $position) ){
                        $days .= '<td class="'.$has_event.'">'.$timeline_event.'</td>';
                    }
                }
            }
            return $days; 
        }     
    }

    $tbody = timetable_days( $end_start, $weekdays, $start_hour, $step, $events, $mycount, $end_hour );
    return $thead.$tbody.'</table></section>';
    
}


/* Shorcode Countdown
============================================*/
add_shortcode('tt_countdown', 'tt_countdown');

function tt_countdown() {
    
    $countdown_query = new WP_Query(array (
        'post_type' => 'event',
        'orderby' => 'meta_value_num',
        'meta_key' => THEME_NAME . '_event_start',
        'order' => 'ASC',
        'meta_query' => array(
            array(
                'key' => THEME_NAME .'_event_start',
                'value' => strtotime(date('d F Y H:i:s')),
                'compare' => '>',
            )
        ),
        'showposts' => 1

    )); 

    $c_query = new WP_Query(array (
        'post_type' => 'event',
        'orderby' => 'meta_value_num',
        'meta_key' => 'slide_options',
        'order' => 'ASC',
        'meta_query' => array(
            array(
                'key' => 'slide_options',
                'value' => serialize('yes_countdown'),
                'compare' => 'LIKE',
            )
        )

    )); 

    $w_query = $c_query->have_posts() ? $c_query : $countdown_query;
    $header_image = get_post_meta(tt_get_page_id(),THEME_NAME . '_header_image', true );
    ob_start();?>
    <div class="the-countdown-slider" data-tesla-plugin="slider" data-tesla-item=".slide" data-tesla-next=".slide-right" data-tesla-prev=".slide-left" data-tesla-container=".slide-wrapper">
        <div class="container">
            <?php if($c_query->have_posts() && $c_query->post_count > 1):?>
            <div class="slide-arrows">
                <div class="slide-left the-link-3"><?php _e('Prev','e-event');?></div>
                <div class="slide-right the-link-2"><?php _e('Next','e-event');?></div>
            </div>
            <?php endif;?>
        </div>
        <ul class="slide-wrapper">
            <?php while ( $w_query->have_posts() ) : $w_query->the_post(); ?>
                <li class="slide">
                    <!-- start countdown -->
                    <section class="countdown-section <?php echo !empty($header_image) ? "" : "no-bg-image"; ?>">                
                        <div class="container">
                            <h1><a href="<?php the_permalink();?>"><?php the_title();?></a></h1>
                            <div class="event-link">
                                <?php _eo('show_countdown_title');?>
                            </div>
                            <div class="countdown-box">
                                <div class="row the-countdown" data-duedate="<?php echo date('m/d/Y H:i',get_post_meta(get_the_ID(), THEME_NAME . '_event_start', true));?>">
                                    <div class="col-md-3 col-xs-6">
                                        <div class="time-box" id="days">00</div><span><?php _e('Days','e-event');?></span>
                                    </div>
                                    <div class="col-md-3 col-xs-6">
                                        <div class="time-box" id="hours">00</div><span><?php _e('Hours','e-event');?></span>
                                    </div>
                                    <div class="col-md-3 col-xs-6">
                                        <div class="time-box" id="minutes">00</div><span><?php _e('Minutes','e-event');?></span>
                                    </div>
                                    <div class="col-md-3 col-xs-6">
                                        <div class="time-box" id="seconds">00</div><span><?php _e('Seconds','e-event');?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- end countdown -->
                </li>
            <?php endwhile; wp_reset_postdata(); ?>
        </ul>
    </div>
    <?php return ob_get_clean();
}

/* Shorcode Countdown Single
============================================*/
add_shortcode('tt_event_countdown', 'tt_event_countdown');

function tt_event_countdown( $atts ) {
    extract(shortcode_atts(array(
        'title' => '',
        'duedate' => '',
    ), $atts));

    ob_start();?>
    <section class="countdown-section countdown-section-single">                
        <div class="container">
        <?php print '<h1 class="site-title">'.$title.'</h1>'; ?>
            <div class="countdown-box">
                <div class="row the-countdown" data-duedate="<?php echo esc_attr($duedate);?>">
                    <div class="col-md-3 col-xs-6">
                        <div class="time-box" id="days">00</div><span><?php _e('Days','e-event');?></span>
                    </div>
                    <div class="col-md-3 col-xs-6">
                        <div class="time-box" id="hours">00</div><span><?php _e('Hours','e-event');?></span>
                    </div>
                    <div class="col-md-3 col-xs-6">
                        <div class="time-box" id="minutes">00</div><span><?php _e('Minutes','e-event');?></span>
                    </div>
                    <div class="col-md-3 col-xs-6">
                        <div class="time-box" id="seconds">00</div><span><?php _e('Seconds','e-event');?></span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php return ob_get_clean();
}

/* Shorcode Site Dot
============================================*/
add_shortcode('site_dot', 'site_dot');

function site_dot( $atts ) {
    extract(shortcode_atts(array(
        'title' => '',
    ), $atts));

    $output = !empty($title) ? '<h4 class="site-dot-title">'.$title.'</h4>' : '';
    $output .= !empty($title) ? '<ul class="site-dot title">' : '<ul class="site-dot">';
    $output .= '<li></li><li><span><i></i></span></li><li></li></ul>';
    ob_start(); print balanceTags($output); return ob_get_clean();
}

/* Shorcode row (Template structure)
============================================*/
add_shortcode('container', 'container');

function container($atts, $content = null) {
    extract(shortcode_atts(array(
        'class' => ''
    ), $atts));
    
    return '<div class="container '.$class.'">'. do_shortcode(shortcode_unautop($content)) .'</div>';
}

add_shortcode('row', 'row');

function row($atts, $content = null) {
    extract(shortcode_atts(array(
        'class' => ''
    ), $atts));
    
    return '<div class="row '.$class.'">'. do_shortcode(shortcode_unautop($content)) .'</div>';
}

add_shortcode('row_2', 'row_2');
//for nesting purposes
function row_2($atts, $content = null) {
    extract(shortcode_atts(array(
        'class' => ''
    ), $atts));
    
    return '<div class="row '.$class.'">'. do_shortcode(shortcode_unautop($content)) .'</div>';
}

/* Shorcode fluid (Template structure)
============================================*/
add_shortcode('fluid', 'fluid');

function fluid($atts, $content = null) {
    extract(shortcode_atts(array(
        'class' => ''
    ), $atts));

    return '<div class="row-fluid '.$class.'">'. do_shortcode($content) .'</div>';
}

/* Shorcode span (Template structure)
============================================*/

add_shortcode('column', 'column');

function column($atts, $content = null) {
    extract(shortcode_atts(array(
        'size' => '12',
        'class' => ''
    ), $atts));

    $content = wpautop(trim($content));
    
    return '<div class="col-md-'.$size.' '.$class.'">'. do_shortcode(shortcode_unautop($content)) .'</div>';
}

add_shortcode('column_2', 'column_2');
//for nesting purposes
function column_2($atts, $content = null) {
    extract(shortcode_atts(array(
        'size' => '12',
        'class' => ''
    ), $atts));

    $content = wpautop(trim($content));
    
    return '<div class="col-md-'.$size.' '.$class.'">'. do_shortcode(shortcode_unautop($content)) .'</div>';
}
?>