<?php $body_class = is_front_page() && !is_home() ? 'homepage' : '' ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="description" content="<?php bloginfo('description'); ?>">
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
     <!-- Pingbacks -->
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <?php echo "<script type='text/javascript'>var TemplateDir='".TT_THEME_URI."'</script>" ?>
    <!-- Favicon -->
    <?php if(_go('favicon')): ?>
        <link rel="shortcut icon" href="<?php _eo('favicon') ?>">
    <?php endif; ?>
    <?php wp_head(); ?>
</head>

        <?php
                $page_id = tt_get_page_id();
                $header = get_post_meta($page_id, THEME_NAME . '_header_type', true ) ? get_post_meta($page_id, THEME_NAME . '_header_type', true ) : 'sticky';
                $header_img = get_post_meta($page_id,THEME_NAME . '_header_image', true );
                $default_background = _go('header_background');
                if(is_404()) {
                    if(_go('error_image')):
                        $url = _go('error_image');
                        $background = 'url('.$url.') no-repeat top center; margin-bottom: 0px;';
                    elseif(_go('error_back_color')):
                        $background = _go('error_back_color'). '; margin-bottom: 0px'; 
                    else:
                        $background = ''; 
                    endif;
                } 
                else 
                {   
                    if($header_img) {
                        $background = 'url('.$header_img['url'].') no-repeat top center;';
                    } elseif($default_background)
                        $background = 'url('.$default_background.') no-repeat top center;';
                    else $background = '';
                }  
                $header == 'sticky' ? $header = ' class="sticky-bar"' : $header = '';                 
        ?>

<body <?php body_class($body_class);?>>

    <!-- ========================= START HEADER ======================== --> 
   <div class="site-image" style="background: <?php echo esc_attr($background); ?>">
        <header<?php print $header; ?>>                                                                                                                                                                                                                                                                                                                           
            <div class="top-header">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8">
                            <ul class="header-info">
                                <li><?php _eo('contact_header_text') ?></li>
                                <li><?php echo _go('contact_header_phone') ? '<i class="fa fa-phone"></i>'._go('contact_header_phone'): ''; ?></li>
                                <li><?php echo _go('contact_header_email') ? '<i class="fa fa-envelope-o"></i><a href="mailto:'._go('contact_header_email').'">'._go('contact_header_email').'</a>' : ''; ?></li>
                            </ul>
                        </div>
                        <div class="col-md-4">
                            <ul class="header-social">
                                <?php $social_platforms = array(
                                    'facebook',
                                    'twitter',
                                    'dribbble',
                                    'youtube',
                                    'google',
                                    'linkedin',
                                    'pinterest',
                                    'instagram',
                                    'vimeo',
                                    'flickr');
                                    foreach($social_platforms as $platform): 
                                        if (_go('social_platforms_' . $platform)):?>
                                            <li>
                                                <a href="<?php echo esc_url(_go('social_platforms_' . $platform)); ?>"<?php echo (_go('social_window')) ? "target='_blank'" : "" ?>><i class="fa fa-<?php echo esc_attr($platform); if ($platform == 'vimeo'){echo "-square";}  ?>" title="<?php echo esc_attr($platform); ?>"></i></a>
                                            </li>
                                        <?php endif;
                                    endforeach;?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bottom-header">
                <div class="container">
                    <div class="row">
                        <?php if(_go('logo_wrapper_size')) {
                            $logo_width = _go('logo_wrapper_size');
                            $menu_width = 12 - (int)_go('logo_wrapper_size');
                            }else{
                            $logo_width = 4;
                            $menu_width = 8;
                            }
                        ?>
                        <div class="col-md-<?php echo esc_attr($logo_width); ?> col-xs-6">
                            <div class="logo">
                                <a href="<?php echo home_url(); ?>" style="<?php _estyle_changer('logo_text') ?>" >
                                        <?php if(_go('logo_text')): ?>
                                            <?php _eo('logo_text') ?>
                                        <?php elseif(_go('home_logo_image') && is_front_page() && !is_home()): ?>
                                            <img src="<?php _eo('home_logo_image') ?>" alt="<?php echo THEME_PRETTY_NAME ?> logo">
                                        <?php elseif(_go('logo_image')): ?>
                                            <img src="<?php _eo('logo_image') ?>" alt="<?php echo THEME_PRETTY_NAME ?> logo">
                                        <?php else: ?>
                                            <img src="<?php echo get_template_directory_uri().'/images/logo.png';?>" alt="<?php echo THEME_PRETTY_NAME ?>">
                                        <?php endif; ?>

                                </a>
                            </div>
                        </div>
                        <div class="col-md-<?php echo esc_attr($menu_width); ?> col-xs-6">
                            <nav class="main-nav">
                                <div class="responsive-menu"><i class="fa fa-bars"></i></div>
                                <ul>
                                    <?php wp_nav_menu( array( 
                                        'title_li'=>'',
                                        'theme_location' => 'main_menu',
                                        'container' => false,
                                        'items_wrap' => '%3$s',
                                        'fallback_cb' => 'wp_list_pages'
                                     ) );
                                    ?>
                                </ul>
                                <div class="right-box">
                                    <ul>
                                        <li><i class="fa fa-search"></i></li>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </header>

    <div class="search-container">
        <div class="close-icon"></div>
        <div class="search-box">
            <?php get_search_form( ); ?>
            <h4><?php _e('PRESS ENTER','e-event');?></h4>
        </div>
    </div>