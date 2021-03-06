<?php
class Tesla_twitter_widget extends WP_Widget {

	function __construct() {
		parent::__construct(
				'tesla_twitter_widget',
				'['.THEME_PRETTY_NAME.'] Twitter',
				array(
			'description' => __('A list of latest tweets.', 'e-event'),
			'classname' => 'widget-twitter',
				)
		);
	}

	function widget($args, $instance) {
		extract($args);
		$title = apply_filters('widget_title', empty($instance['title']) ? '' : $instance['title'], $instance, $this->id_base);
		$user = empty($instance['user']) ? 'teslathemes' : $instance['user'];
		if (empty($instance['number']) || !$number = absint($instance['number']))
			$number = 3;

		print $before_widget;?>

		<!-- === Start Twitter === -->
			<?php 
				print $before_title.$title.$after_title;
				print twitter_generate_output($user, $number);
			
		print $after_widget;
	}

	function update($new_instance, $old_instance) {
		$instance = array();
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['user'] = strip_tags($new_instance['user']);
		$instance['number'] = (int)strip_tags($new_instance['number']);

		return $instance;
	}

	function form($instance) {
		$instance = wp_parse_args((array) $instance, array('title' => ''));
		$title = isset($instance['title']) ? esc_attr($instance['title']) : '';
		$user = isset($instance['user']) ? esc_attr($instance['user']) : 'TeslaThemes';
		$number = isset($instance['number']) ? absint($instance['number']) : 3;
		?>
		<p>
			<label><?php _ex('Title:','dashboard','e-event'); ?><input class="widefat" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></label> 
			<label><?php _ex('Twitter user:','dashboard','e-event'); ?><input class="widefat" name="<?php echo esc_attr($this->get_field_name('user')); ?>" type="text" value="<?php echo esc_attr($user); ?>" /></label> 
			<label for="<?php echo esc_attr($this->get_field_id('number')); ?>">
				<?php _ex('Number of tweets to show:','dashboard','e-event'); ?>
				<input id="<?php echo esc_attr($this->get_field_id('number')); ?>" name="<?php echo esc_attr($this->get_field_name('number')); ?>" type="text" value="<?php echo esc_attr($number); ?>" size="3" />
			</label>
		</p>
		<p><?php _ex('Don\'t forget to configure the twitter in the Framework.','dashboard','e-event'); ?></p>
		<?php
	}
};

add_action('widgets_init', create_function('', 'return register_widget("Tesla_twitter_widget");'));