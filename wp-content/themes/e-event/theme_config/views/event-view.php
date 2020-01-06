<?php 
$columns = ($shortcode['columns']) ? 12 / $shortcode['columns'] : 3;
$type = ($shortcode['type']) ? $shortcode['type'] : 1;
$up_events = $shortcode['events'];
$title = $shortcode['title'];
$filters = $shortcode['filters'] == 'false' ? false : true;

if(isset($_POST['category']))
	$def_cat = $_POST['category']=='all' ? '' : $_POST['category'];

elseif(!empty($shortcode['category']))
	$def_cat = $shortcode['category'];

else $def_cat = '';

$event_date = array();
$event_cats = array();
$carousel = '';

if(isset($_POST['keyword'])) {
function filter_where($where = ''){
	$where .= " AND post_title LIKE '%".$_POST['keyword']."%'";
	return $where;
	}
add_filter('posts_where', 'filter_where' );
}

$filters_query = new WP_Query(array(
    'post_type' => 'event',
    'showposts' => $shortcode['nr'],
    'orderby' => 'meta_value_num',
    'meta_key' => THEME_NAME . '_event_start',
    'order' => $shortcode['sort'],
));

if($up_events == 'upcomming') {
	$date_start = strtotime(date('M j, Y').' 00:00:00');
	$date_end = '9999999999999';
} else {
	$date_start = isset($_POST['date']) ? ($_POST['date'] == 'all' ? '0' : strtotime($_POST['date'].' 00:00:00')) : '0';
	$date_end = isset($_POST['date']) ? ($_POST['date'] == 'all' ? '9999999999999' : strtotime($_POST['date'].' 23:59:59')) : '9999999999999';
}
	
$event_query = new WP_Query(array(
    'post_type' => 'event',
    'showposts' => $shortcode['nr'],
    'orderby' => 'meta_value_num',
    'meta_key' => THEME_NAME . '_event_start',
    'order' => $shortcode['sort'],
    'event_tax' => $def_cat,
    'meta_query' => array(
    	'relation' => 'AND',
        array(
            'key' => THEME_NAME .'_event_start',
            'value' => $date_start,
            'compare' => '>',
        ),
         array(
            'key' => THEME_NAME .'_event_start',
            'value' => $date_end,
            'compare' => '<',
        )
    )
));


while ( $filters_query->have_posts() ) : $filters_query->the_post();
	if(!in_array(date(get_option('date_format'), get_post_meta(get_the_ID(), THEME_NAME . '_event_start', true)), $event_date))
	$event_date [] = date(get_option('date_format'), get_post_meta(get_the_ID(), THEME_NAME . '_event_start', true));
	$filter_categories = get_the_terms(get_the_ID(),'event_tax');
	if(!empty($filter_categories)) {
		foreach($filter_categories as $filter_cat) {
			if(!in_array($filter_cat->name, $event_cats))
			$event_cats [] = $filter_cat->name;
		}
	}
endwhile;

isset($_POST['keyword']) ? remove_filter('posts_where', 'filter_where') : '';
?>

	<!-- ========================= START EVENTS ======================== -->
	<?php if($type==1):?>
	<section class="coming-events single">
	<?php elseif($type==2): $carousel= " tesla-carousel-items no-margin"; ?>
	<section class="coming-events" data-tesla-plugin="carousel" data-tesla-container=".tesla-carousel-items" data-tesla-item="&gt;div" data-tesla-rotate="false" data-tesla-autoplay="false" data-tesla-hide-effect="false">
	<?php endif;?>
		<?php if(!empty($title)) print '<h3 class="site-title">'.$title.'<i></i></h3>'; ?>
		<?php if($type==1 && $filters):?>
		<form action="" method="post">
	        <div class="event-filter">
	            <div class="row">
	                <div class="col-md-3">
	                    <input type="text" name="keyword" placeholder="<?php _e('Enter Keyword', 'e-event'); ?>" <?php echo isset($_POST['keyword']) ? 'value="'.$_POST['keyword'].'"' : ''; ?> />
	                </div>
	                <div class="col-md-3">
	                    <select name="date">
	                        <option value="all" selected><?php _e('Select Date (All)', 'e-event'); ?></option>
	                        <?php if(!empty($event_date)) 
								foreach($event_date as $event_dat){
									if(isset($_POST['date']) && $_POST['date'] == $event_dat)
									print '<option selected>'.$event_dat.'</option>';
									else 
									print '<option>'.$event_dat.'</option>';
								} 
							?>
	                    </select>
	                </div>
	                <div class="col-md-3">
	                    <select name="category">
	                        <option value="all" selected><?php _e('Category (All)', 'e-event'); ?></option>
	                        <?php if(!empty($event_cats)) 
								foreach($event_cats as $event_cat)
									if($def_cat == $event_cat)
										print '<option selected>'.$event_cat.'</option>';
									else
									print '<option>'.$event_cat.'</option>';
							?>
	                    </select>
	                </div>
	                <div class="col-md-3">
	                	<input type="submit" name="Submit" value="Submit" />
	                </div>
	            </div>
	        </div>
	    </form>
		<?php endif;?>
	    <div class="row<?php echo esc_attr($carousel);?>" <?php if($type==1) echo 'data-tesla-plugin="masonry"'; ?>>
	    	<?php if ( $event_query->have_posts() ) : while ( $event_query->have_posts() ) : $event_query->the_post();
	    		$postid = get_the_ID();
				$options = get_post_meta($postid, 'slide_options', true); ?>
	       	<div class="col-md-<?php echo esc_attr($columns);?> col-xs-6">
	            <div class="event-box">
	                <div class="event-box-cover">
	                    <div class="event-box-hover">
	                        <div class="event-box-share"><?php echo tt_get_post_views($postid); ?><span><?php _e('Views', 'e-event'); ?></span></div>
	                        <h6><?php $categories = get_the_terms($postid,'event_tax'); 
	                        	if(!empty($categories)) foreach ( $categories as $cat) { print $cat->name.' '; } ?>
	                        </h6>
	                    </div>
	                    <img src="<?php echo wp_get_attachment_url($options['event_cover']); ?>" alt="event" />
	                </div>
	                <h4><a href="<?php echo get_permalink(get_the_ID()); ?>"><?php echo get_the_title($postid); ?></a></h4>
	                <p><?php echo get_post_meta($postid, THEME_NAME . '_custom_date', true) ? get_post_meta($postid, THEME_NAME . '_custom_date', true) : date_i18n(get_option('date_format'), get_post_meta($postid, THEME_NAME . '_event_start', true));?></p>
	            </div>
	        </div>
	        <?php endwhile; ?>
	        <?php else: ?>
	        	<h3><?php _e('No events to display', 'e-event'); ?></h3>
	        <?php endif; ?>
	    </div>
	    <?php if($type==2 && $shortcode['nr'] > $columns):?>
	    <ul>
	        <li class="prev disabled"><i class="fa fa-arrow-circle-left"></i></li>
	        <li><i class="fa fa-circle"></i></li>
	        <li class="next"><i class="fa fa-arrow-circle-right"></i></li>
	    </ul>
		<?php endif;?>
	</section>
	<!-- ========================= END EVENTS ======================== -->