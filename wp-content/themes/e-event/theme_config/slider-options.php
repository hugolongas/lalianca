<?php

return array(
	'event_speakers' => array(
		'name' => 'Speakers',
		'term' => 'Speaker',
		'term_plural' => 'Speakers',
		'order' => 'ASC',
		'options' => array(
			'image' => array(
				'type' => 'image',
				'description' => 'Image of the speaker',
				'title' => 'Image',
				'default' => 'holder.js/289x280/auto'
			),
			'position' => array(
				'type' => 'line',
				'description' => 'Position of the speaker',
				'title' => 'Position'
			),
			'description' => array(
				'type' => 'text',
				'description' => 'Description of the speaker',
				'title' => 'Description'
			),
			'social' => array(
				'title' => 'Social Links',
				'description' => 'Add social links for current speaker.',
				'type' => array(
				    'facebook' => array(
					    'title' => 'Facebook',
						'description' => 'Facebook URL of the speaker',
						'type' => 'line'
					),
					'twitter' => array(
						'title' => 'Twitter',
						'description' => 'Twitter URL of the speaker',
						'type' => 'line'
						
					),
					'pinterest' => array(
						'title' => 'Pinterest',
						'description' => 'Pinterest URL of the speaker',
						'type' => 'line'
					),
					'dribbble' => array(
						'title' => 'Dribbble',
						'description' => 'Dribbble URL of the speaker',
						'type' => 'line'
					),
					'linkedin' => array(
						'title' => 'Linkedin',
						'description' => 'Linkedin URL of the speaker',
						'type' => 'line'
					),
				),
			),
			'speaker_url' => array(
				'type' => 'line',
				'description' => 'Insert url for current speaker',
				'title' => 'URL (Optional)'
			),
		),
		'output' => array(
			'main' => array(
				'shortcode' => 'tt_speakers',
				'view' => 'views/speakers-view',
				'shortcode_defaults' => array(
					'nr'=>'5000',
					'title' =>'',
					'type' => '',
					'btn_url' => '',
					'btn_title' => ''
				)
			),
		),
		'icon' => 'icons/favicon.ico'
	),
	'event' => array(
		'name' => 'Events',
		'term' => 'Event',
		'term_plural' => 'Events',
		'order' => 'DESC',
		'has_single' => true,
		'post_options' => array('supports'=> array( 'title','editor','thumbnail')),
		'options' => array(
			'event_countdown' => array(
				'type' => 'checkbox',
				'label' => array('yes_countdown'=>'Check if you want this event to appear in home page countdown'),
				'title' => 'Countdown',
			),
			'event_cover' => array(
				'type' => 'image',
				'description' => 'Event item cover/thumbnail (shown in the Event grids). If you use Event with columns you can upload smaller resolution images for the grid for a better website optimization',
				'title' => 'Image',
				'default' => 'holder.js/260x260/auto'
			),
			'event_description' => array(
				'type' => 'text',
				'description' => 'Provide here small description about event',
				'title' => 'Small Description',
			),
			
			'event_speaker' => array(
				'type' => 'line',
				'description' => 'Provide here speaker of the event',
				'title' => 'Speaker',
			),
			'event_location' => array(
				'type' => 'line',
				'description' => 'Provide here location of the event',
				'title' => 'Location',
			),
			'event_checked' => array(
				'type' => 'checkbox',
				'label' => array('checked'=>'Check to show event in event schedule page'),
				'title' => 'Schedule',
				'default' => 'checked',
			),
			'event_price' => array(
				'title' => 'Price',
				'type' => array(
					'price' => array(
						'title' => 'Price',
						'type' => 'line',
						'description' => 'Provide here price for event',
					),
					'package' => array(
						'title' => 'Price Package',
						'type' => 'line',
						'description' => 'Provide here price package for event',
						),
					)
			),
		),
		'icon' => 'icons/favicon.ico',
		'output' => array(
			'main' => array(
				'shortcode' => 'tt_events',
				'view' => 'views/event-view',
				'shortcode_defaults' => array(
					'title'			=>	'',
					'type'			=>	'',
					'nr'			=>	'5000',
					'columns'		=>	'',
					'category'		=> '',
					'filters'  		=> '',
					'events'		=> '',
					'sort'  => 'ASC'
				)
			),
			'single' => array(
				'view' => 'views/event-single-view',
				'shortcode_defaults' => array(

				)
			),
		)
	),
	'partners' => array(
		'name' => 'Partners',
		'term' => 'partner',
		'term_plural' => 'partners',
		'order' => 'ASC',
		'has_single' => false,
		'post_options' => array('supports'=>array('title','thumbnail')),
		'taxonomy_options' => array('show_ui'=>true),
		'options' => array(
			'partner_cover' => array(
				'type' => 'image',
				'description' => 'Insert here partner cover image',
				'title' => 'Image',
				'default' => 'holder.js/200x60/auto'
			),
			'url' => array(
				'title' => 'Partner URL',
				'type' => 'line',
				'description' => 'Partner URL',
			),
		),
		'icon' => 'icons/favicon.ico',
		'output_default' => 'main',
		'output' => array(
			'main' => array(
				'shortcode' => 'tt_partners',
				'view' => 'views/partner-view',
				'shortcode_defaults' => array(	
					'title'=>'',
					'nr' => 500
				)
			),			
		)
	),
	'gallery' => array(
		'name' => 'Gallery',
		'term' => 'Gallery',
		'term_plural' => 'Galleries',
		'order' => 'DESC',
		'has_single' => true,
		'post_options' => array('supports'=> array( 'title','editor','thumbnail')),
		'options' => array(
			'gallery_cover' => array(
				'type' => 'image',
				'description' => 'Gallery item cover/thumbnail (shown in the Gallery grids). If you use Gallery with 2,3 columns you can upload largest resolution images for better view',
				'title' => 'Gallery Cover',
				'default' => 'holder.js/260x260/auto'
			),
			'gallery_url' => array(
				'type' => 'line',
				'description' => 'Provide here gallery source url',
				'title' => 'Gallery URL',
			),
		),
		'icon' => 'icons/favicon.ico',
		'output' => array(
			'main' => array(
				'shortcode' => 'tt_gallery',
				'view' => 'views/gallery-view',
				'shortcode_defaults' => array(
					'title'			=>	'',
					'nr'			=>	'5000',
					'columns'		=>	''
				)
			),
			'single' => array(
				'view' => 'views/gallery-single-view',
				'shortcode_defaults' => array(

				)
			),
		)
	),
	
);