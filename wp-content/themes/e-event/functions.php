<?php 

require_once get_template_directory() . '/editor/class-imagely-editor.php';

define('IMAGES', get_template_directory_uri() . '/images/');

/***********************************************************************************************/
/*  Tesla Framework */
/***********************************************************************************************/
require_once(get_template_directory() . '/tesla_framework/tesla.php');

if ( is_admin() && current_user_can( 'install_themes' ) ) {
    require_once( get_template_directory() . '/plugins/tgm-plugin-activation/register-plugins.php' );
}


/***********************************************************************************************/
/* Load JS and CSS Files - done with TT_ENQUEUE */
/***********************************************************************************************/


/***********************************************************************************************/
/* Google fonts + Fonts changer */
/***********************************************************************************************/
TT_ENQUEUE::$gfont_changer = array(
        _go('logo_text_font'),
        _go('main_content_text_font'),
        _go('sidebar_text_font'),
        _go('menu_text_font')
    );
TT_ENQUEUE::add_css(array('//netdna.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'));


/***********************************************************************************************/
/* Add Shortcodes */
/***********************************************************************************************/

require_once 'shortcodes.php';

/***********************************************************************************************/
/* Custom CSS */
/***********************************************************************************************/
add_action('wp_enqueue_scripts', 'tesla_custom_css', 99);
function tesla_custom_css() {
    $custom_css = _go('custom_css') ? _go('custom_css') : '';
    wp_add_inline_style('tt-main-style', $custom_css);
}

/***********************************************************************************************/
/* Custom JS */
/***********************************************************************************************/
add_action('wp_footer', 'tesla_custom_js', 99);
function tesla_custom_js() {
    ?>
    <script type="text/javascript"><?php echo esc_js(_eo('custom_js')) ?></script>
    <script type="text/javascript"><?php echo esc_js(_eo('tracking_code')) ?></script>
    <?php
}

/***********************************************************************************************/
/* Style Changers */
/***********************************************************************************************/

add_action('wp_enqueue_scripts', 'tt_style_changers',99);
function tt_style_changers(){
    $background_color = _go('bg_color') ;
    $background_image = _go('bg_image') ;
    if($background_image || $background_color)
        wp_add_inline_style('tt-main-style', "body{background-color: $background_color;background-image: url('$background_image')}");

    $colopickers_css = '';
 
    if (_go('site_color')) : 
        $colopickers_css .= '
            .coming-events .event-filter input, .coming-events .event-filter select, .coming-events .event-filter input,.is-sticky header .bottom-header, 
            .coming-events .event-box .event-box-cover h6, .homepage .is-sticky header .bottom-header, .timetable .d-bg-c {
                background: ' . _go('site_color') . ';
            }

            .event-schedule .nav-tabs > li.active > a,
            .event-schedule .nav-tabs > li > a:hover  
            {
                background: ' . _go('site_color') . ';
                border: 1px solid ' . _go('site_color') . ';
            }
            header .bottom-header .main-nav ul li ul li:hover ul,header .bottom-header .main-nav ul li>ul {
                background: ' . _go('site_color') . ';
                border-left: none;
                border-right:none;
                border-bottom:none;
            }
            .section-link {
                color: ' . _go('site_color') . ';
            }
            
            input[type="button"], input[type="reset"], input[type="submit"] {
                background: ' . _go('site_color') . ';
            }
            .contact-form .contact-button, .comments-area .comment-respond .comments-button {
                color: ' . _go('site_color') . ';
            }
            ';
    endif;
    if (_go('site_color_2')) :
        $colopickers_css .= '
            .comments-area .logged-in-as a:hover,.main-sidebar .widget_categories ul li a:hover,
            .main-sidebar .widget-posts-event ul li h5 a:hover, .main-sidebar .widget-posts ul li h5 a:hover,
            .commentlist li .comment .comment-edit-link:hover, .commentlist li #cancel-comment-reply-link a:hover,
            .blog-post .post-header h2 a:hover,.blog-post .post-header ul li a:hover,.blog-post .post-footer ul li a:hover,
            .event-post .event-footer ul li a:hover, .event-post .event-footer .event-selections a:hover, 
            .address-box ul li a:hover,.page-numbers li a:hover,footer .bottom-footer .footer-social li a:hover, 
            header .bottom-header .main-nav li a:hover,header .top-header ul li a:hover,a:hover,  header .bottom-header .main-nav .right-box li i:hover, 
            .homepage header .bottom-header .main-nav .right-box li i:hover, .main-sidebar .widget-twitter .twitter li a:hover {
                color: ' . _go('site_color_2') . ';
            }

            .blog-post .post-header .post-date {
                color: ' . _go('site_color_2') . ';
            }

            .blog-post .post-header h2:before {
                background: ' . _go('site_color_2') . ';
            }

            .page-numbers .current {
                background: ' . _go('site_color_2') . ';
                border: 1px solid ' . _go('site_color_2') . ';
            }

            .our-team .team-member .member-cover .team-social li a:hover {
                color: ' . _go('site_color_2') . ';
                border-color: ' . _go('site_color_2') . ';
            }
            ';
    endif;

    wp_add_inline_style('tt-main-style', $colopickers_css);

    //Custom Fonts Changers
    wp_add_inline_style('tt-main-style', tt_text_css('main_content_text','body,.countdown-section h1,.site-title,.pricing-box,.coming-events .event-box h4 a,.our-team .team-member h5,.our-team .team-member h5 a,.our-team p,p,.event-post .event-header h2,.contact-section h4,.contact-section p,.address-box ul li p,.address-box ul li h5,.path-section h3,.main-sidebar .widget .widget-title,.blog-post p,.blog-post .post-header h2 a,h1,h2,h3,h4,h5,h6,.coming-events,.event-section,.comments-area p, .event-schedule .tab-content ul li i, .site-title span, .countdown-section h1 span','px'));
    wp_add_inline_style('tt-main-style', tt_text_css('sidebar_text','.main-sidebar .widget a,.main-sidebar .widget_categories ul li a, .main-sidebar .widget p,.main-sidebar .widget-posts ul li h5 a,.main-sidebar .widget-posts-event ul li h5 a,.main-sidebar .widget .widget-title,.main-sidebar .widget ul li h5','px'));
    wp_add_inline_style('tt-main-style', tt_text_css('menu_text','footer .bottom-footer .second-nav ul li a,.homepage header .bottom-header .main-nav a,.homepage header .bottom-header .main-nav>ul>li>a, header .bottom-header .main-nav>ul>li>a, header .bottom-header .main-nav ul li ul li a, header .bottom-header .main-nav .right-box li i, .homepage header .bottom-header .main-nav .right-box li i','px'));
    //Custom Styler
    wp_add_inline_style('tt-main-style', _gcustom_styler('Custom Styler'));
}

/***********************************************************************************************/
/* Add Theme Support */
/***********************************************************************************************/

add_theme_support('post-formats', array('quote', 'gallery', 'video', 'audio', 'image'));

function theme_slug_setup() {
   add_theme_support( 'title-tag' );
}
add_action( 'after_setup_theme', 'theme_slug_setup' );


add_filter( 'manage_event_posts_columns', 'set_custom_edit_event_columns' );
add_action( 'manage_event_posts_custom_column' , 'custom_event_column', 10, 2 );

function set_custom_edit_event_columns($columns) {
    $columns['event_countdown'] = __( 'Appears in countdown?', 'e-event' );
    return $columns;
}

function custom_event_column( $column, $post_id ) {

    $options = get_post_meta($post_id, 'slide_options', true);
    if(!empty($options['event_countdown'][0])) _e('Yes','e-event');
}

if(stripos(get_option('time_format'), "a") !== false) {
    add_action( 'admin_print_footer_scripts','admin_datetime_am_pm',11);
    function admin_datetime_am_pm(){
        ?>
        <script type="text/javascript">
            if(typeof _metabox_fields !== 'undefined'){
                _metabox_fields.load_datetime_picker = function(){
                    $('.at-datetime').each( function() {
                      
                      var $this   = $(this)

                        $this.datetimepicker({
                          formatTime:'g:i A',
                          format:'d-m-Y g:i A',
                          step:30
                        });
                      
                    });
                  }
            }
        </script>
        <?php
    }
}


/***********************************************************************************************/
/* Register Contact Form Locations */
/***********************************************************************************************/
if(class_exists('TT_Contact_Form_Builder'))
TT_Contact_Form_Builder::add_form_locations(array(
    'contact_page' => 'Contact Page',
));


/***********************************************************************************************/
/* Add Menus */
/***********************************************************************************************/

function tt_register_menus($return = false){
    $tt_menus = array(
            'main_menu'    => _x('Main menu', 'dashboard','e-event'),
            'footer_menu'    => _x('Footer menu', 'dashboard','e-event'),
        );
    if($return)
        return $tt_menus;
    register_nav_menus($tt_menus);
}
add_action('init', 'tt_register_menus');


/***********************************************************************************************/
/* Comments */
/***********************************************************************************************/
 
function tt_custom_comments( $comment, $args, $depth ) {
    $GLOBALS['comment'] = $comment;
    extract($args, EXTR_SKIP);

    if ( 'div' == $args['style'] ) {
        $tag = 'div';
        $add_below = 'comment';
    } else {
        $tag = 'li';
        $add_below = 'div-comment';
    }
    ?>

    <<?php print $tag ?> id="comment-<?php comment_ID() ?>">
        <?php if ( 'div' != $args['style'] ) : ?>
            <div id="div-comment-<?php comment_ID() ?>" <?php comment_class(empty( $args['has_children'] ) ? '' : 'parent') ?>>
        <?php endif; ?>
        <div class="comment-image">
            <?php if ($args['avatar_size'] != 0)
                echo get_avatar( $comment, $args['avatar_size'], false,'avatar image' ); ?>
        </div>
        <div class="comment-info">
            <?php if ($comment->comment_approved == '0') : ?>
                <em class="comment-awaiting-moderation">
                    <?php _e('Your comment is awaiting moderation.','e-event') ?>
                </em>
                <br />
            <?php endif; ?>
            <?php comment_reply_link(array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'],'reply_text'=> __('Reply','e-event') ))) ?>
            <?php echo get_comment_author_link() ?>, <span><?php echo get_comment_time(get_option('date_format')) ?></span>
        </div>
        <?php comment_text() ?>
        <?php edit_comment_link(__('Edit','e-event'),'  ','' );?>
            
        <?php if ( 'div' != $args['style'] ) : ?>
            </div>
        <?php endif; 

}

function tt_custom_comments_closed( $comment, $args, $depth ) {
    $GLOBALS['comment'] = $comment;
    extract($args, EXTR_SKIP);

    if ( 'div' == $args['style'] ) {
        $tag = 'div';
        $add_below = 'comment';
    } else {
        $tag = 'li';
        $add_below = 'div-comment';
    }
    
    if($comment->comment_type == 'pingback' || $comment->comment_type == 'trackback'):?>
        <<?php print $tag ?> id="comment-<?php comment_ID() ?>">
        <?php if ( 'div' != $args['style'] ) : ?>
            <div id="div-comment-<?php comment_ID() ?>" <?php comment_class(empty( $args['has_children'] ) ? '' : 'parent') ?>>
        <?php endif; ?>
        <span class="comment-image">
            <?php if ($args['avatar_size'] != 0)
                echo get_avatar( $comment, $args['avatar_size'], false,'avatar image' ); ?>
        </span>
        <?php if ($comment->comment_approved == '0') : ?>
            <em class="comment-awaiting-moderation">
                <?php _e('Your comment is awaiting moderation.','e-event') ?>
            </em>
            <br />
        <?php endif; ?>

        <span class="comment-info">
            <?php comment_reply_link(array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'],'reply_text'=> __('Reply','e-event') ))) ?>
            <?php echo get_comment_author_link() ?>
            <?php edit_comment_link(__('(Edit)','e-event'),'  ','' );?>
        </span>
        <?php comment_text() ?>
        <span class="comment-date"><?php echo get_comment_time(get_option('date_format')) ?></span>
        <?php if ( 'div' != $args['style'] ) : ?>
            </div>
        <?php endif;
    endif;

}


/***********************************************************************************************/
/* Add Sidebar Support */
/***********************************************************************************************/
function tt_register_sidebars(){
    if (function_exists('register_sidebar')) {
        register_sidebar(
            array(
                'name'           => __('Blog Sidebar', 'e-event'),
                'id'             => 'blog',
                'description'    => __('Blog Sidebar Area', 'e-event'),
                'before_widget'  => '<div class="widget %2$s">',
                'after_widget'   => '</div>',
                'before_title'   => '<h3 class="widget-title">',
                'after_title'    => '</h3>
                                <ul class="site-dot">
                                    <li></li>
                                    <li><span><i></i></span></li>
                                    <li></li>
                                </ul>'
            )
        );

        if(_go('footer_style') == '2') {
            register_sidebar(
                array(
                    'name'           => __('Footer Widgets', 'e-event'),
                    'id'             => 'footer_bar',
                    'description'    => __('Footer Widgets Area', 'e-event'),
                    'before_widget'  => '<div class="col-md-3"><div class="widget %2$s">',
                    'after_widget'   => '</div></div>',
                    'before_title'   => '<h4 class="widget-title">',
                    'after_title'    => '</h4>'
                )
            );
        }

        register_sidebar(
            array(
                'name'           => __('Event Sidebar', 'e-event'),
                'id'             => 'event_page',
                'description'    => __('Event Sidebar Area', 'e-event'),
                'before_widget'  => '<div class="widget %2$s">',
                'after_widget'   => '</div>',
                'before_title'   => '<h3 class="widget-title">',
                'after_title'    => '</h3>
                                <ul class="site-dot">
                                    <li></li>
                                    <li><span><i></i></span></li>
                                    <li></li>
                                </ul>'
            )
        );
    }
}
add_action('widgets_init','tt_register_sidebars');


/***********************************************************************************************/
/* Share Function */
/***********************************************************************************************/

if(!function_exists('tt_share')){
    function tt_share(){
        $share_this = _go('share_this');
        if(isset($share_this) && is_array($share_this)): ?>
            <li><?php _e('Share: ', 'e-event'); ?></li>
            <?php foreach($share_this as $val): ?>
                <?php if($val === 'googleplus') $val = 'google-plus'; ?>
                    <?php switch ($val) {
                        case 'facebook': ?>
                                <li>
                                    <a onClick="window.open('https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_the_permalink()); ?>','sharer','toolbar=0,status=0,width=548,height=325');" href="javascript: void(0)"><i class="fa fa-<?php echo esc_attr($val );?>"></i><?php _e('Facebook','e-event');?></a>
                                </li>
                            <?php break; ?>
                        <?php case 'twitter': ?>
                                <li>
                                    <a onClick="window.open('http://twitter.com/intent/tweet?url=<?php echo urlencode(get_the_permalink()); ?>&text=<?php the_title(); ?>','sharer','toolbar=0,status=0,width=548,height=325');" href="javascript: void(0)"><i class="fa fa-<?php echo esc_attr($val );?>"></i><?php _e('Twitter','e-event');?></a>
                                </li>
                            <?php break; ?>
                        <?php case 'google-plus': ?>
                                <li>
                                    <a onClick="window.open('https://plus.google.com/share?url=<?php echo urlencode(get_the_permalink()); ?>','sharer','toolbar=0,status=0,width=548,height=325');" href="javascript: void(0)"><i class="fa fa-<?php echo esc_attr($val );?>"></i><?php _e('Google Plus','e-event');?></a>
                                </li>
                            <?php break; ?>
                        <?php case 'pinterest': ?>
                                <li>
                                    <a onClick="window.open('https://www.pinterest.com/pin/create/button/?url=<?php echo urlencode(get_the_permalink()); ?>','sharer','toolbar=0,status=0,width=748,height=325');" href="javascript: void(0)"><i class="fa fa-<?php echo esc_attr($val );?>"></i><?php _e('Pinterest','e-event');?></a>
                                </li>
                            <?php break; ?>
                        <?php case 'linkedin': ?>
                                <li>
                                    <a onClick="window.open('http://www.linkedin.com/shareArticle?mini=true&url=<?php echo urlencode(get_the_permalink()); ?>','sharer','toolbar=0,status=0,width=548,height=325');" href="javascript: void(0)"><i class="fa fa-<?php echo esc_attr($val );?>"></i><?php _e('Linkedin','e-event');?></a>
                                </li>
                                <?php break; ?>
                        <?php default:
                            _e('No Share: ', 'e-event');
                            break;
                    } ?>
            <?php endforeach; ?>
        <?php endif;
    }
}

//For shortcodes to work in widgets
add_filter('widget_text', 'do_shortcode');


//====================View count for single posts===========================
function tt_set_post_views($postID) {
    $count_key = 'tt_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if ($count == '') {
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    } else {
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}

function tt_get_post_views($postID) {
    $count_key = 'tt_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if ($count == '') {
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0";
    }
    return $count;
}
//====================View count for single posts===========================
