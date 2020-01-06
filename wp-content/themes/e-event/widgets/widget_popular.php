<?php
 // POPULAR POST WIDGET
 class show_popular extends WP_Widget {
 
	function __construct() {
		parent::__construct(
				'widget-popular-posts',
				'['.THEME_PRETTY_NAME.'] Popular Posts',
				array(
					'description' => __('Show your popular posts.', 'motive'),
					'classname' => 'widget-popular-posts',
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

	$query_p = new WP_QUERY(array( 'orderby' => 'comment_count', 'posts_per_page' => $postscount ,'ignore_sticky_posts'=>true));			//Get Popular Posts					//Get Latest Posts
	?>					
	
	<!-- === Start Post Query === -->
	<ul>
		<?php while ( $query_p ->have_posts() ) : $query_p ->the_post(); ?>
			<li>
			    <?php $post_thumbnail_id = get_post_thumbnail_id( get_the_ID() );
					  $post_thumbnail_url = wp_get_attachment_url( $post_thumbnail_id ); ?>
				<img src="<?php echo esc_attr($post_thumbnail_url) ? esc_attr($post_thumbnail_url) : 'holder.js/40x40/auto'; ?>" alt="<?php the_title(); ?>" />
                <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                <p><?php the_time(get_option('date_format')); echo '<span>'.__('Views ','E-event').get_post_meta(get_the_ID(), 'tt_post_views_count', true).'</span>'; ?></p>
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
		echo '<p style="text-align:left;"><label  for="'.$this->get_field_id('title').'">' . __('Title:','E-event') . '  <input style="width: 200px;" id="'.$this->get_field_id('title').'"  name="'.$this->get_field_name('title').'" type="text"  value="'.$instance['title'].'" /></label></p>';
		empty($instance['posts'])? $instance['posts'] = '': $instance['posts'] = $instance['posts'];
		echo '<p style="text-align:left;"><label  for="'.$this->get_field_id('posts').'">' . __('Number of Posts:',  'e-event') . ' <input style="width: 50px;"  id="'.$this->get_field_id('posts').'"  name="'.$this->get_field_name('posts').'" type="text"  value="'.$instance['posts'].'" /></label></p>';
		echo '<input type="hidden" id="custom_recent" name="custom_recent" value="1" />';
	}
}
 
add_action('widgets_init', create_function('', 'return register_widget("show_popular");')); ?>