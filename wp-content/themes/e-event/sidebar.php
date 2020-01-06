<?php if ( is_singular( 'event' ) && is_active_sidebar( 'event_page' ) ) 
	dynamic_sidebar('event_page');
elseif ( is_active_sidebar( 'blog' ) ) 
	dynamic_sidebar('blog');