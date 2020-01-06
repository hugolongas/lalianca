<?php
 // UPCOMMING EVENTS WIDGET
 class abount_website extends WP_Widget {
 
	function __construct() {
		parent::__construct(
				'widget-about',
				'['.THEME_PRETTY_NAME.'] About',
				array(
					'description' => __('Provide here some information about your page.', 'e-event'),
					'classname' => 'widget-about',
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

	if(_go('logo_image'))
		$logo_url = _go('logo_image');
	else if(_go('home_logo_image'))
		$logo_url = _go('home_logo_image');
	else if(_go('footer_logo'))
		 $logo_url = _go('footer_logo');
	else $logo_url = 'holder.js/140x20/auto';

	?>					
	
	<div class="logo">
    	<a href="<?php echo home_url('/') ?>"><img src="<?php echo esc_url($logo_url);?>" alt="logo"></a>
    </div>
    <p><?php print $instance['description']; ?></p>


	<?php print $after_widget;
	wp_reset_postdata();
	}

	function update($newInstance, $oldInstance){
		$instance = $oldInstance;
		$instance['title'] = strip_tags($newInstance['title']);
		$instance['description'] = $newInstance['description'];
			return $instance;
	}
 
	function form($instance){
		empty($instance['title'])? $instance['title'] = '': $instance['title'] = $instance['title'];
		echo '<p style="text-align:left;"><label  for="'.$this->get_field_id('title').'">' . __('Title:','e-event') . '  <input id="'.$this->get_field_id('title').'" style="width: 100%;" name="'.$this->get_field_name('title').'" type="text"  value="'.$instance['title'].'" /></label></p>';
		empty($instance['description'])? $instance['description'] = '': $instance['description'] = $instance['description'];
		echo '<p style="text-align:left;"><label  for="'.$this->get_field_id('description').'">' . __('Description:',  'e-event') . ' <br/> <textarea id="'.$this->get_field_id('description').'"  style="width: 100%;"  name="'.$this->get_field_name('description').'">'.$instance['description'].'</textarea></label></p>';
		echo '<input type="hidden" id="custom_events" name="custom_events" value="1" />';
	}
}
 
add_action('widgets_init', create_function('', 'return register_widget("abount_website");')); ?>