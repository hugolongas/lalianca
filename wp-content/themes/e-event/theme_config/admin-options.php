<?php
return array(
        'favico' => array(
                'dir' => '/theme_config/icons/favicon.ico'
        ),
        'option_saved_text' => 'Options successfully saved',
        'tabs' => array(
                array(
                        'title'=>'General Options',
                        'icon'=>1,
                        'boxes' => array(
                                'Logo Customization' => array(
                                        'icon'=>'customization',
                                        'size'=>'2_3',
                                        'columns'=>true,
                                        'description'=>'Here you upload a image as logo or you can write it as text and select the logo color, size, font.',
                                        'input_fields' => array(
                                                'Logo As Image'=>array(
                                                        'size'=>'half',
                                                        'id'=>'logo_image',
                                                        'type'=>'image_upload',
                                                        'note'=>'Here you can insert your link to a image logo or upload a new logo image.'
                                                ),
                                                'Logo As Text'=>array(
                                                        'size'=>'half',
                                                        'id'=>'logo_text',
                                                        'type'=>'text',
                                                        'note' => "Type the logo text here, then select a color, set a size and font.<br><br><br><br><br><br>",
                                                        'color_changer'=>true,
                                                        'font_changer'=>true,
                                                        'font_size_changer'=>array(8,50, 'px'),
                                                        'font_preview'=>array(true, true)
                                                ),
                                                'Header Logo/Menu Wrapper Size' => array(
                                                        'id'    => 'logo_wrapper_size',
                                                        'type'  => 'radio',
                                                        'size' => 'half_last_3',
                                                        'values' => array('2','3','4','5','6','7','8'),
                                                        'note' => 'Change this size if your logo is being shrinked (smaller than it should be) or your meta menu needs more space. Note : This will decrease/increase the size for the meta menu (the bigger this options, the smaller the meta menu and vice versa). Default is 4.'
                                                ),
                                                'Footer Logo'=>array(
                                                        'size'=>'half',
                                                        'id'=>'footer_logo',
                                                        'type'=>'image_upload',
                                                        'note'=>'Here you can insert your link to a image footer logo or upload a new footer logo image.'
                                                ),
                                                'Home Page Logo'=>array(
                                                        'size'=>'half',
                                                        'id'=>'home_logo_image',
                                                        'type'=>'image_upload',
                                                        'note'=>'Here you can insert your link to a image logo or upload a new logo image.'
                                                ),
                                        )
                                ),
                                'Favicon' => array(
                                        'icon'=>'customization',
                                        'size'=>'1_3_last',
                                        'input_fields' => array(
                                                array(
                                                        'id'=>'favicon',
                                                        'type'=>'image_upload',
                                                        'note'=>'Here you can upload the favicon icon.'
                                                )
                                        )
                                ),
                                'Custom CSS' => array(
                                        'icon'=>'css',
                                        'size'=>'half',
                                        'description'=>'Here you can write your personal CSS for customizing the classes you want. Or use our <b>Custom Styler</b>, from the Site Colors tab, for an easier custom css color picking.',
                                        'input_fields' => array(
                                                array(
                                                        'id'=>'custom_css',
                                                        'type'=>'textarea'
                                                )
                                        )
                                ),
                                'Custom JS' => array(
                                        'icon'=>'js',
                                        'size'=>'half_last',
                                        'description'=>'Here you can write your personal JS that will be appended to footer.<br><br>',
                                        'input_fields' => array(
                                                array(
                                                        'id'=>'custom_js',
                                                        'type'=>'textarea'
                                                )
                                        )
                                )
                        )
                ),
                array(
                        'title' => 'Site Colors',
                        'icon'=>4,
                        'boxes' => array(
                                'Background Customization'=>array(
                                        'icon'=>'customization',
                                        'columns'=>true,
                                        'size' => '1',
                                        'input_fields' => array(
                                                'Background Color'=>array(
                                                        'size'=>'half',
                                                        'id'=>'bg_color',
                                                        'type'=>'colorpicker'
                                                ),
                                                'Background Image' => array(
                                                        'size'=>'half_last',
                                                        'id'=>'bg_image',
                                                        'type'=>'image_upload'
                                                )
                                        )
                                ),
                                'Site Colors' => array(
                                        'icon'=>'background',
                                        'columns'=>true,
                                        'size' => '1',
                                        'input_fields' => array(
                                                'Primary Site Color'=>array(
                                                        'size'=>'half',
                                                        'id'=>'site_color',
                                                        'type'=>'colorpicker',
                                                        'note'=>'Choose primary color for your website. This will affect only specific elements.<br>To return to default color , open colorpicker and click the Clear button.'
                                                ),
                                                'Secondary Site Color'=>array(
                                                        'size'=>'half_last',
                                                        'id'=>'site_color_2',
                                                        'type'=>'colorpicker',
                                                        'note'=>'Choose secondary color for your website. This will affect only specific elements.<br>To return to default color , open colorpicker and click the Clear button.'
                                                ),
                                                
                                        )
                                ),
                                'Custom Styler'=>array(
                                    'icon' => 'customization',
                                    'description'=>"Add new custom CSS rules with ease. <a target='_blank' href='http://teslathemes.com/doc/e-event/#fw-site-colors'>How to use ?</a>",
                                    'size'=>'half',
                                    'repeater' => 'Add new rule/style',
                                    'input_fields' =>array(
                                            'CSS Selector'=>array(
                                                    'size'=>'1_3',
                                                    'id'=>'custom_selector',
                                                    'type'=>'text',
                                                    'placeholder' => '.class',
                                                    'note' => "Insert CSS selector that will be used when applying the custom colors.",
                                                    ),
                                            'Color'=>array(
                                                    'type'=>'colorpicker',
                                                    'id'=>'custom_color',
                                                    'note'=>'Custom color applied to the elemnts matching the above css selector.'
                                                    ),
                                            'Background Color'=>array(
                                                    'type'=>'colorpicker',
                                                    'id'=>'custom_bg_color',
                                                    'note'=>'Custom background color applied to the elemnts matching the above css selector.'
                                                    ),
                                            'Important' => array(
                                                    'id'    => 'important',
                                                    'type'  => 'checkbox',
                                                    'label' => 'If the colors are not applied you can try selecting this checkbox to make them important.',
                                            ),
                                    )
                                ),
                        )
                ),
                array(
                        'title' => 'SEO and Socials',
                        'icon'=>2,
                        'boxes'=>array(
                            'ShareThis feature'=>array(
                                    'icon'=>'social',
                                    'description'=>"To use this service please select your favorite social networks",
                                    'size'=>'3',
                                    'input_fields'=>array(
                                            array(
                                                    'type'  => 'select',
                                                    'id'    => 'share_this',
                                                    'label' => 'Facebook',
                                                    'class'  => 'social_search',
                                                    'multiple' => true,
                                                    'options'=>array('Google'=>'googleplus','Facebook'=>'facebook','Twitter'=>'twitter','Pinterest'=>'pinterest',"Linkedin"=>'linkedin')
                                            )
                                    )
                            ),
                            'Social Platforms'=>array(
                                    'icon'=>'social',
                                    'description'=>"Insert the link to the social share page.",
                                    'size'=>'3',
                                    'columns'=>true,
                                    'input_fields'=>array(
                                            array(
                                                    'id'=>'social_platforms',
                                                    'size'=>'half',
                                                    'type'=>'social_platforms',
                                                    'platforms'=>array('facebook','twitter','vimeo','pinterest','google','youtube','linkedin','dribbble','rss','instagram','flickr')
                                            )
                                    )
                            ),
                            'Socials window' => array(
                                    'icon'=>'social',
                                    'size'=>'3_last',
                                    'description'=>"Open social links in a new tab?",
                                    'input_fields'=>array(
                                            array(
                                                    'type'=>'checkbox',
                                                    'id'=>'social_window'
                                            )
                                    )
                            ),
                            'Tracking Code' => array(
                                    'icon'=>'track',
                                    'size'=>'3_last',
                                    'input_fields'=>array(
                                            array(
                                                    'type'=>'textarea',
                                                    'id'=>'tracking_code'
                                            )
                                    )
                            ),
                            'Twitter Settings'=>array(  
                                'icon' => 'customization',
                                'description'=>"Used by the Twitter widget. Visit <a href='https://dev.twitter.com/apps/new' target='_blank'>Twitter Apps</a> , create your App , press 'Generate Access token at the bottom', insert the following from the 'Oauth' tab.",
                                'size'=>'1_3_last',
                                'columns'=>false,
                                'input_fields' =>array(
                                    'Consumer Key' => array(
                                        'id'    => 'twitter_consumerkey',
                                        'type'  => 'text',
                                        'size' => '1'
                                    ),
                                    'Consumer Secret' => array(
                                        'id'    => 'twitter_consumersecret',
                                        'type'  => 'text',
                                        'size' => '1',
                                    ),
                                    'Access Token' => array(
                                        'id'    => 'twitter_accesstoken',
                                        'type'  => 'text',
                                        'size' => '1',
                                    ),
                                    'Access Token Secret' => array(
                                        'id'    => 'twitter_accesstokensecret',
                                        'type'  => 'text',
                                        'size' => '1',
                                    )
                                )
                            ),
                        )
                ),
                array(
                        'title' => 'Additional Options',
                        'icon'  => 6,
                        'boxes' => array(
                                '404 error page settings'=>array(
                                        'icon' => 'customization',
                                        'description'=>"Setup your 404 error page",
                                        'size'=>'half',
                                        'columns'=>true,
                                        'input_fields' =>array(
                                            'Page title' => array(
                                                    'id'    => 'error_title',
                                                    'type'  => 'text',
                                                    'note' => 'This is the title of the 404 page',
                                                    'size' => '1'
                                            ),
                                            'Message' => array(
                                                    'id'    => 'error_message',
                                                    'type'  => 'textarea',
                                                    'note' => 'This message will appear on 404 page. Use html (&lt;h2&gt;,&lt;h3&gt;,&lt;p&gt;) to enhance it .',
                                                    'size' => '1'
                                            ),
                                            'Error 404 Background Color'=>array(
                                                'id'=>'error_back_color',
                                                'note' => 'Here you can choose a background color for error page 404.',
                                                'type' => 'colorpicker',
                                                'size' => '1'
                                            ),
                                             'Button Title' => array(
                                                    'id'    => 'error_button',
                                                    'type'  => 'text',
                                                    'note' => 'This is the title of return home button for error 404 page.',
                                                    'size' => '1'
                                            ),
                                            'Error 404 Background Image' => array(
                                                    'id'    => 'error_image',
                                                    'type'  => 'image_upload',
                                                    'note' => 'Here you can insert your link to a image or upload a new 404 error image.',
                                                    'size' => '1'
                                            ),
                                        )
                                ),

                                 'Homepage countdown settings' => array(
                                    'icon' => 'customization',
                                    'size' => 'half',
                                    'columns' => false,
                                    'input_fields' => array(
                                        'Homepage countdown enable/disable' => array(
                                            'id'    => 'show_countdown',
                                            'type'  => 'checkbox',
                                            'label' => 'Check here to enable or disable event countdown on homepage.',
                                            'size' => 'half',
                                            'action' => array('show',array('show_countdown_title', 'countdown_post'))
                                        ), 
                                        'Countdown subtitle' => array(
                                            'id'    => 'show_countdown_title',
                                            'type'  => 'text',
                                            'placeholder' => 'Provide here countdown subtitle.',
                                            'size' => 'half',
                                        ), 
                                    ),
                                ),
                                
                                'Footer settings' => array(
                                    'icon' => 'customization',
                                    'size' => 'half',
                                    'columns' => false,
                                    'input_fields' => array(
                                        'Footer Style'=>array(
                                            'id' => 'footer_style',
                                            'type' => 'radio',
                                            'label' => 'Chose Your Footer Style',
                                            'values' => array('Style 1' => '1' ,'Style 2 (Widgetized)' => '2'),
                                        ),

                                        'Map' => array(
                                            'id' => 'show_map_contact',
                                            'type' => 'checkbox',
                                            'label' => 'Show Map in Footer Area'
                                        ),

                                        'Copyright Message' => array(
                                            'id'    => 'copyright_message',
                                            'type'  => 'text',
                                            'note' => 'Message that will appear in the footer.'
                                        ),
                                    ),
                                ),

                                'More Page Settings'=>array(
                                        'icon' => 'customization',
                                        'description'=>"",
                                        'size'=>'half_last',
                                        'columns'=>true,
                                        'input_fields' =>array(
                                            'Default Header Background' => array(
                                                    'id'    => 'header_background',
                                                    'type'  => 'image_upload',
                                                    'note' => 'Here you can insert your link to a image or upload a new one for default header background.',
                                                    'size'  => '1'
                                            ),

                                            'Show Related events' => array(
                                                    'id'    => 'show_related_events',
                                                    'type'  => 'checkbox',
                                                    'label' => 'Show related events in single event page.',
                                                    'size' => '1',
                                                    'action' => array('show', array('show_related_title','show_related_number'))
                                                ), 
                                                array(
                                                    'id'    => 'show_related_title',
                                                    'type'  => 'text',
                                                    'note' => 'Provide here related events title.',
                                                    'placeholder' => 'Title',
                                                    'size' => '1',
                                                ), 
                                                array(
                                                    'id'    => 'show_related_number',
                                                    'type'  => 'text',
                                                    'note' => 'Provide here number of related events to show in single event page.',
                                                    'placeholder' => '5',
                                                    'size' => '1',
                                                ), 
                                        )
                                ),
                        )
                ),
                array(
                        'title' => 'Contact Info',
                        'icon'  => 5,
                        'boxes' => array(
                                'Contact info'=>array(
                                        'icon' => 'customization',
                                        'description'=>"Provide contact information. This information will appear in contact template. For more informations read documentation.",
                                        'size'=>'3_3',
                                        'columns'=>true,
                                        'input_fields' =>array(
                                                'Map' => array(
                                                        'id'    => 'contact_map',
                                                        'type'  => 'map',
                                                        'note' => 'Just navigate to the location you want to be displayed on the google map and if you want a pin over your location , 
                                                                    press the "Drop marker here" button. You can also choose another icon for it.' ,
                                                        'size' => 'half',
                                                        'icons' => array('google-marker.gif','home.png','home_1.png','home_2.png','administration.png','office-building.png','../../../../theme_config/icons/marker.png'),
                                                        'style' =>  '',
                                                        'mapOptions'=> '',
                                                ),
                                                'Contact Email' =>array(
                                                        'id'    => 'email_contact',
                                                        'type'  => 'text',
                                                        'note' => 'Provide an email, used to receive messages from Contact Form',
                                                        'size' => 'half_last',
                                                        'placeholder' => 'Contact Form Email'
                                                ),
                                                'Contact Phone' =>array(
                                                        'id'    => 'contact_phone',
                                                        'type'  => 'text',
                                                        'note' => 'Provide your phone number',
                                                        'size' => 'half_last',
                                                        'placeholder' => 'Phone number'
                                                ),
                                                'Contact Information' => array(
                                                    'id'    => 'contact_information_title',
                                                    'type'  => 'text',
                                                    'note' => 'Provide title for your information, to appear on contact page.',
                                                    'size'  =>      'half',
                                                    'placeholder' => 'Title'
                                                ),
                                                array(
                                                    'id'    => 'contact_information_text',
                                                    'type'  => 'textarea',
                                                    'note' => 'Provide information text, to appear on contact page.',
                                                    'size'  =>      'half',
                                                    'placeholder' => 'Provide contact information, to appear on contact page'
                                                ),
                                        )
                                ),
                                'Contact additional details'=>array(
                                    'icon' => 'customization',
                                        'description'=>"Provide additional contact information. This information will appear in contact template.",
                                        'size'=>'2_3',
                                        'columns'=>false,
                                        'input_fields' =>array(
                                                'Office Adresses' => array(
                                                        'id'    => 'contact_offices_title',
                                                        'type'  => 'text',
                                                        'note' => 'Provide title for office adresses box.',
                                                        'size' => 'half',
                                                        'placeholder' => 'Title'
                                                ),   
                                                array(
                                                        'id'    => 'contact_offices',
                                                        'type'  => 'textarea',
                                                        'note' => 'Provide office adresses 1 per line',
                                                        'size' => 'half'
                                                ),      
                                                'Phone Numbers' => array(
                                                        'id'    => 'contact_phone_numbers_title',
                                                        'type'  => 'text',
                                                        'note' => 'Provide title for phone numbers box.',
                                                        'size' => 'half',
                                                        'placeholder' => 'Title'
                                                ),  
                                                array(
                                                        'id'    => 'contact_phone_numbers',
                                                        'type'  => 'textarea',
                                                        'note' => 'Provide phone numbers 1 per line',
                                                        'size' => 'half'
                                                ), 
                                                'Contact Emails' => array(
                                                        'id'    => 'contact_email_adress_title',
                                                        'type'  => 'text',
                                                        'note' => 'Provide title for email adresses box.',
                                                        'size' => 'half',
                                                        'placeholder' => 'Title'
                                                ),
                                                array(
                                                        'id'    => 'contact_email_adress',
                                                        'type'  => 'textarea',
                                                        'note' => 'Provide contact emails 1 per line',
                                                        'size' => 'half'
                                                ),        
                                        )
                                ),
                                'Contact Header'=>array(
                                    'icon' => 'customization',
                                        'description'=>"Provide header information to appear in top left corner of header.",
                                        'size'=>'1_3',
                                        'columns'=>false,
                                        'input_fields' =>array(
                                                'Header Text' => array(
                                                        'id'    => 'contact_header_text',
                                                        'type'  => 'text',
                                                        'placeholder' => 'Provide header information text',
                                                        'size' => 'half'
                                                ),      
                                                'Phone Number' => array(
                                                        'id'    => 'contact_header_phone',
                                                        'type'  => 'text',
                                                        'placeholder' => 'Provide header phone number',
                                                        'size' => 'half'
                                                ),  
                                                'Contact Email' => array(
                                                        'id'    => 'contact_header_email',
                                                        'type'  => 'text',
                                                        'placeholder' => 'Provide header email adress',
                                                        'size' => 'half'
                                                ),        
                                        )
                                )
                        )
                ),
                array(
                        'title' => 'Typography',
                        'icon'  => 1,
                        'boxes' => array(
                                'Font Changers'=>array(
                                        'icon' => 'customization',
                                        'description'=>'Change the fonts & colors for site\'s sections:',
                                        'size'=>'1',
                                        'columns'=>true,
                                        'input_fields' => array(
                                                'Main Content Font/Color'=>array(
                                                    'size'=>'1_3',
                                                    'id'=>'main_content_text',
                                                    'type'=>'text',
                                                    'note' => "Then select a color, set a size and choose a font",
                                                    'color_changer'=>true,
                                                    'font_changer'=>true,
                                                    'font_size_changer'=>array(8,50, 'px'),
                                                    'hide_input'=>true,
                                                    ),
                                                'Sidebar Font/Color'=>array(
                                                    'size'=>'1_3',
                                                    'id'=>'sidebar_text',
                                                    'type'=>'text',
                                                    'note' => "Then select a color, set a size and choose a font",
                                                    'color_changer'=>true,
                                                    'font_changer'=>true,
                                                    'font_size_changer'=>array(8,50, 'px'),
                                                    'hide_input'=>true,
                                                    ),
                                                'Menu Font/Color'=>array(
                                                    'size'=>'1_3_last',
                                                    'id'=>'menu_text',
                                                    'type'=>'text',
                                                    'note' => "Then select a color, set a size and choose a font",
                                                    'color_changer'=>true,
                                                    'font_changer'=>true,
                                                    'font_size_changer'=>array(8,50, 'px'),
                                                    'hide_input'=>true,
                                                    ),
                                                
                                        )
                                ),
                                
                        )
                ),
                array(
                        'title' => 'Subscription',
                        'icon'  => 7,
                        'boxes' => array(
                                'Subscribers'=>array(
                                        'icon' => 'social',
                                        'description'=>'First 20 subscribers are listed here. To get the full list export files using buttons below:',
                                        'size'=>'full',
                                        'input_fields' => array(
                                                array(
                                                        'type'=>'subscription',
                                                        'id'=>'subscription_list'
                                                )
                                        )
                                )
                        )
                ),
        ),
        'styles' => array( array('wp-color-picker'),'style','select2' )
        ,
        'scripts' => array( array( 'jquery', 'jquery-ui-core','jquery-ui-datepicker','wp-color-picker' ), 'select2.min','jquery.cookie','tt_options', 'admin_js' )
);