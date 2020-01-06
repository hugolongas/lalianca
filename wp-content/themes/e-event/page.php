<?php
$page_id = tt_get_page_id();
$sidebar = get_post_meta( $page_id, THEME_NAME . '_sidebar_position', true );
$sidebar = $sidebar ? $sidebar : 'right';
?>

<?php get_header(); ?>

<?php if (have_posts()): the_post();?>
		<?php if(is_front_page()): ?>
				<?php if(_go('show_countdown')) echo do_shortcode('[tt_countdown]'); ?>
    	<?php else: ?>
        <!-- ========================= START PATH SECTION ======================== -->
        <section class="path-section">                
            <div class="container">
                <h3><?php the_title(); ?></h3>
                <ul class="site-dot">
                    <li></li>
                    <li><span><i></i></span></li>
                    <li></li>
                </ul>
                <p><?php if(function_exists('bcn_display')) { bcn_display();}?></p>
            </div>
        </section>
    	<?php endif;?>
    </div>

	<!-- ========================= START CONTENT ======================== --> 		
	<section class="content-section <?php if(!_go('show_countdown')) echo 'padding';?>">
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
				<?php 
					the_content();
					get_template_part('nav','main');
					comments_template();	
				?>
			<?php if($sidebar !== "full_width"): ?>
					</section>
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

<?php endif;?>
<?php get_footer(); ?>