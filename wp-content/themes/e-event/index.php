<?php get_header(); ?>	
<?php
/**
 * Blog Page
 */
$page_id = tt_get_page_id();
$sidebar = get_post_meta( tt_get_page_id(), THEME_NAME . '_sidebar_position', true );
$sidebar = $sidebar ? $sidebar : 'right';
?>

        <!-- ========================= START PATH SECTION ======================== -->
        <section class="path-section">                
            <div class="container">
                <h3><?php echo get_the_title($page_id); ?></h3>
                <ul class="site-dot">
                    <li></li>
                    <li><span><i></i></span></li>
                    <li></li>
                </ul>
            </div>
            <p><?php if(function_exists('bcn_display')) { bcn_display();}?></p>
        </section>
    </div>

	<!-- ========================= START CONTENT ======================== --> 
	<section class="content-section">
		<div class="container">
		   <div class="row">
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
				<?php endif; ?>
				<?php if (have_posts()): ?>				
						<?php while(have_posts()): the_post(); 
							get_template_part('post_format/content',get_post_format( ));
						endwhile; ?>
					<?php get_template_part('nav','main'); ?>
				<?php endif; ?>
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
		</div>
	</section>

<?php get_footer(); ?>