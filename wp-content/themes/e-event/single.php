<?php
/**
 * Single post page
 */
$post_id = get_the_ID();
$blog_id_s = get_option( 'page_for_posts' );
$sidebar_option = get_post_meta( $post_id, THEME_NAME . '_sidebar_position', true );

switch ($sidebar_option) {
	case 'as_blog':
		$s_id = $blog_id_s;	
		break;
	case 'full_width':
		$s_id = $post_id;
		break;
	case 'right':
		$s_id = $post_id;
		break;
	case 'left':
		$s_id = $post_id;
}
if(!empty($s_id))
	$sidebar = get_post_meta( $s_id, THEME_NAME . '_sidebar_position', true );
	$sidebar = empty($sidebar) ? 'right' : $sidebar;
?>

<?php get_header(); ?>

        <!-- ========================= START PATH SECTION ======================== -->
<?php if ( have_posts() ) : the_post(); ?>
        <section class="path-section">                
            <div class="container"> 
                <h3><?php echo get_post_type(); ?></h3>
                <ul class="site-dot">
                    <li></li>
                    <li><span><i></i></span></li>
                    <li></li>
                </ul>
                <p><?php if(function_exists('bcn_display')) { bcn_display();}?></p>
            </div>
        </section>
    </div>

	<!-- ========================= START CONTENT ======================== --> 
	<section class="blog-section-single">
		<div class="container">
		<?php if($sidebar !== "full_width"): ?>
			<div class="row">
		<?php endif; ?>
		<?php if($sidebar == "left"): ?>
			<div class="col-md-3">
			    <div class="main-sidebar">				
					<?php get_sidebar(); ?>
				</div>
			</div>
		<?php endif; ?>
		<?php if($sidebar !== "full_width"): ?>				
			<div class="col-md-9">
				<section class="main-content">
		<?php endif; ?>
				<?php get_template_part('content','single');
					  tt_set_post_views(get_the_ID()); 
						comments_template();
				?>
				</section>
		<?php if($sidebar !== "full_width"): ?>
			</div>
		<?php endif; ?>                
		<?php if($sidebar == "right"): ?>
			<div class="col-md-3">
				<div class="main-sidebar">				
					<?php get_sidebar(); ?>
				</div>
			</div>
		<?php endif; ?>
		<?php if($sidebar !== "full_width"): ?>
			</div>
		<?php endif; ?>
		</div>
	</section>
	
<?php endif; ?>

<?php get_footer(); ?>