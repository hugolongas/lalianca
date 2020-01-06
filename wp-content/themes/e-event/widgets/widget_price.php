<?php
 // EVENT PRICE
 class event_price extends WP_Widget {
 
	function __construct() {
		parent::__construct(
				'widget-price',
				'['.THEME_PRETTY_NAME.'] Event Price',
				array(
					'description' => __('Display event price in single event page.', 'e-event'),
					'classname' => 'widget-price',
				)
		);
	}

 
	function widget($args, $instance){
		extract($args);
		//$options = get_option('custom_recent');
		$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );


	print $before_widget;
	if(!empty($title)){
		print $before_title . $title . $after_title;
	}

		global $wp_query;
		$thePostID = $wp_query->post->ID;
		$options = get_post_meta($thePostID, 'slide_options', true);
	?>					
	
	<?php if ( is_singular( 'event' ) ): ?>
	<!-- === Start Event Price === -->
	<div class="pricing-box">
        <div class="pricing-box-circle">
            <div>
                <i class="fa fa-ticket"></i>
                <h6><?php print $options['event_price']['price'] ;?></h6>
                <p><?php print $options['event_price']['package'] ;?></p>
            </div>
        </div>
    </div>
	<?php else:?>
	<h4><?php _e('This widget is not specified for this sidebar','e-event');?></h4>
	<?php endif;?>
	<?php print $after_widget;
	}

	function update($newInstance, $oldInstance){
		$instance = $oldInstance;
		$instance['title'] = strip_tags($newInstance['title']);
			return $instance;
	}
 
	function form($instance){
		empty($instance['title'])? $instance['title'] = '': $instance['title'] = $instance['title'];
		echo '<p style="text-align:left;"><label  for="'.$this->get_field_id('title').'">' . __('Title:','e-event') . '  <input style="width: 200px;" id="'.$this->get_field_id('title').'"  name="'.$this->get_field_name('title').'" type="text"  value="'.$instance['title'].'" /></label></p>';
		echo '<input type="hidden" id="custom_price" name="custom_price" value="1" />';
	}
}
 
add_action('widgets_init', create_function('', 'return register_widget("event_price");')); ?>