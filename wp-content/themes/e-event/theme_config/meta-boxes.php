<?php 
return array(
	'metaboxes'	=>	array(
		array(
			'id'             => 'page_metabox',            // meta box id, unique per meta box
			'title'          => _x('Page Settings','meta boxes','e-event'),   // meta box title
			'post_type'      => array('page'),		// post types, accept custom post types as well, default is array('post'); optional
			'taxonomy'       => array(),    // taxonomy name, accept categories, post_tag and custom taxonomies
			'context'		 => 'normal',						// where the meta box appear: normal (default), advanced, side; optional
			'priority'		 => 'low',						// order of meta box: high (default), low; optional
			'input_fields'   => array(          			// list of meta fields 
				'sidebar_position'=>array(
					'name'=> _x('Sidebar Position','meta boxes','e-event'),
					'type'=>'select',
					'values'=>array(
							'full_width'=>_x('No Sidebar/Full Width','meta boxes','e-event'),
							'right'=>_x('Right','meta boxes','e-event'),
							'left'=>_x('Left','meta boxes','e-event'),
					),
				'std'=>'right'  //default value selected
				),
				'header_type'=>array(
					'name'=> _x('Page Header Type','meta boxes','e-event'),
					'type'=>'select',
					'values'=>array(
							'sticky'=>_x('Sticky','meta boxes','e-event'),
							'no-sticky'=>_x('No Sticky','meta boxes','e-event'),
					),
				'std'=>'sticky'  //default value selected
				),
				'header_image'=>array(
					'name'=> _x('Page Header Image','meta boxes','e-event'),
					'type'=>'image',
					'notice' => _x('Insert your image URL for Page Header','meta boxes','e-event'),				
				)
			)
		),
		array(
			'id'             => 'post_metabox',            // meta box id, unique per meta box
			'title'          => _x('Post Settings','meta boxes','e-event'),   // meta box title
			'post_type'      => array('post'),		// post types, accept custom post types as well, default is array('post'); optional
			'taxonomy'       => array(),    // taxonomy name, accept categories, post_tag and custom taxonomies
			'context'		 => 'normal',						// where the meta box appear: normal (default), advanced, side; optional
			'priority'		 => 'low',						// order of meta box: high (default), low; optional
			'input_fields'   => array(            			// list of meta fields 
				'sidebar_position'=>array(
					'name'=> _x('Sidebar Position','meta boxes','e-event'),
					'type'=>'select',
					'values'=>array(
							'as_blog'=>_x('Same as Blog Page','meta boxes','e-event'),
							'full_width'=>_x('No Sidebar/Full Width','meta boxes','e-event'),
							'right'=>_x('Right','meta boxes','e-event'),
							'left'=>_x('Left','meta boxes','e-event'),
						),
					'std'=>'as_blog'  //default value selected
					)
				)
			),
		array(
			'id'             => 'video_featured',// meta box id, unique per meta box
			'title'          => _x('Featured Video Embed','meta boxes','e-event'),         // meta box titl,'meta boxes','e-event')e
			'post_type'      => array('post'),
			'priority'		 => 'low',
			'context'		=> 'normal',
			'input_fields'   => array(            // list of meta fields (can be added by field arrays)
				'video_embed'=>array(
					'name'=>_x("Insert your embed code",'meta boxes','e-event'),
					'type'=>"text",
					'rows'=> 3 ,
					)
				)
			),
		array(
			'id'             => 'audio_featured',// meta box id, unique per meta box
			'title'          => _x('Featured Audio Embed','meta boxes','e-event'),         // meta box titl,'meta boxes','e-event')e
			'post_type'      => array('post'),
			'priority'		 => 'low',
			'context'		=> 'normal',
			'input_fields'   => array(            // list of meta fields (can be added by field arrays)
				'audio_embed'=>array(
					'name'=>_x("Insert your embed code",'meta boxes','e-event'),
					'type'=>"text",
					)
				)
			),
		array(
			'id'             => 'custom_post_metabox',            // meta box id, unique per meta box
			'title'          => _x('Page Settings','meta boxes','e-event'),   // meta box title
			'post_type'      => array('event'),		// post types, accept custom post types as well, default is array('post'); optional
			'taxonomy'       => array(),    // taxonomy name, accept categories, post_tag and custom taxonomies
			'context'		 => 'normal',						// where the meta box appear: normal (default), advanced, side; optional
			'priority'		 => 'low',						// order of meta box: high (default), low; optional
			'input_fields'   => array( 
				'sidebar_position'=>array(				// list of meta fields 
					'name'=> _x('Sidebar Position','meta boxes','e-event'),
					'type'=>'select',
					'values'=>array(
							'full_width'=>_x('No Sidebar/Full Width','meta boxes','e-event'),
							'right'=>_x('Right','meta boxes','e-event'),
							'left'=>_x('Left','meta boxes','e-event'),
					),
				'std'=>'right'  //default value selected 
				),        			
				'header_type'=>array(
					'name'=> _x('Page Header Type','meta boxes','e-event'),
					'type'=>'select',
					'values'=>array(
							'sticky'=>_x('Sticky','meta boxes','e-event'),
							'no-sticky'=>_x('No Sticky','meta boxes','e-event'),
					),
				'std'=>'sticky'  //default value selected
				),
				'header_image'=>array(
					'name'=> _x('Page Header Image','meta boxes','e-event'),
					'type'=>'image',
					'notice' => _x('Insert your image URL for Page Header','meta boxes','e-event'),				
				)
			)
		),
		array(
			'id'             => 'event_metabox',            // meta box id, unique per meta box
			'title'          => _x('Event Date and Time','meta boxes','e-event'),   // meta box title
			'post_type'      => array('event'),		// post types, accept custom post types as well, default is array('post'); optional
			'taxonomy'       => array(),    // taxonomy name, accept categories, post_tag and custom taxonomies
			'context'		 => 'normal',						// where the meta box appear: normal (default), advanced, side; optional
			'priority'		 => 'high',						// order of meta box: high (default), low; optional
			'input_fields'   => array(          			// list of meta fields 
				'event_start'=> array(
					'name'=> _x('Provide here Event Date & Start hour','meta boxes','e-event'),
					'type'=>'datetime',
					'std' => time()
				),
				'event_end'=> array(
					'name'=> _x('Provide here Event Date & End hour','meta boxes','e-event'),
					'type'=>'datetime',
					'std' => time()
				),
				'custom_date'=> array(
					'name'=> _x('Custom Date','meta boxes','e-event'),
					'type'=>'text',
					'desc'=>'If you want to display custom date, you can write here. ex "12 & 13 December"'
				),
			)
		),

		)
	);