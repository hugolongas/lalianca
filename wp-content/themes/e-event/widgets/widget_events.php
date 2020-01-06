<?php
 // UPCOMMING EVENTS WIDGET
 class upcomming_events extends WP_Widget {
 
	function __construct() {
		parent::__construct(
				'widget-posts-event',
				'['.THEME_PRETTY_NAME.'] Upcomming Events',
				array(
					'description' => __('Show your upcomming events.', 'e-event'),
					'classname' => 'widget-posts-event',
				)
		);
	}

 
	function widget($args, $instance){
		extract($args);
		//$options = get_option('custom_recent');
		$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );
		if(!empty($instance['posts'])):
			$postscount = $instance['posts'];
		else:
			$postscount = 5;
		endif;


	print $before_widget;
	if(!empty($title)){
		print $before_title . $title . $after_title;
	}
	$query_l = new WP_Query(array (
        'post_type' => 'event',
        'posts_per_page' => $postscount,
        'orderby' => 'meta_value_num',
        'meta_key' => THEME_NAME . '_event_start',
        'order' => 'ASC',
        'meta_query' => array(
            array(
                'key' => THEME_NAME .'_event_start',
                'value' => strtotime(date('d F Y').' 00:00:00'),
                'compare' => '>',
            )
        )

    )); 
	//Get Latest Posts
	?>					
	
	<!-- === Start Post Query === -->
	<ul>
		<?php while ( $query_l ->have_posts() ) : $query_l ->the_post(); ?>
			<li>
			    <?php $post_thumbnail_id = get_post_thumbnail_id( get_the_ID() );
					  $post_thumbnail_url = wp_get_attachment_image_src($post_thumbnail_id, array(40, 40));
					  $post_thumbnail_url = $post_thumbnail_url[0];
					   ?>
				<img src="<?php echo esc_attr($post_thumbnail_url) ? esc_attr($post_thumbnail_url) : 'holder.js/40x40/auto'; ?>" alt="<?php the_title(); ?>" />
                <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                <p><?php echo date_i18n(get_option('date_format'), get_post_meta(get_the_ID(), THEME_NAME . '_event_start', true));?></p>
			</li>
		<?php endwhile; ?>
	</ul>
	<?php print $after_widget;
	wp_reset_postdata();
	}

	function update($newInstance, $oldInstance){
		$instance = $oldInstance;
		$instance['title'] = strip_tags($newInstance['title']);
		$instance['posts'] = $newInstance['posts'];
			return $instance;
	}
 
	function form($instance){
		empty($instance['title'])? $instance['title'] = '': $instance['title'] = $instance['title'];
		echo '<p style="text-align:left;"><label  for="'.$this->get_field_id('title').'">' . __('Title:','e-event') . '  <input style="width: 200px;" id="'.$this->get_field_id('title').'"  name="'.$this->get_field_name('title').'" type="text"  value="'.$instance['title'].'" /></label></p>';
		empty($instance['posts'])? $instance['posts'] = '': $instance['posts'] = $instance['posts'];
		echo '<p style="text-align:left;"><label  for="'.$this->get_field_id('posts').'">' . __('Number of Events:',  'e-event') . ' <input style="width: 50px;"  id="'.$this->get_field_id('posts').'"  name="'.$this->get_field_name('posts').'" type="text"  value="'.$instance['posts'].'" /></label></p>';
		echo '<input type="hidden" id="custom_events" name="custom_events" value="1" />';
	}
}
 
add_action('widgets_init', create_function('', 'return register_widget("upcomming_events");')); ?>