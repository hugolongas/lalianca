<?php 
$type = ($shortcode['type']) ? $shortcode['type'] : 1;
$title = $shortcode['title'];
 ?>
	<!-- ========================= START SPEAKERS ======================== -->
	<section class="our-team<?php if($type == '3' || $type == '4') print '-'.$type;?>">
		<?php if(!empty($title)) print '<h3 class="site-title">'.$title.'<i></i></h3>'; ?>
		<?php if($type=='1') :?>
		   	<?php foreach($slides as $slide_nr => $slide): if($slide_nr >= $shortcode['nr']) break; ?>
			   	<div class="row">
			    	<div class="col-md-3 col-md-offset-1">
			            <div class="team-member">
			                <div class="member-cover">
			                    <div class="round-relative">
			                        <ul class="team-social">
										<?php foreach($slide['options']['social'] as $social_type => $social):
										if($social):?>
										<li><a href="<?php echo esc_url($social); ?>"><i class="fa fa-<?php echo esc_attr($social_type); ?>" title="<?php echo esc_attr($social_type); ?>"></i></a></li>
										<?php endif;?>
										<?php endforeach; ?>
			                        </ul>
			                        <img src="<?php echo esc_attr($slide['options']['image'] ); ?>" alt="speaker"/>
			                    </div>
			                </div>
			                <h5>
			                <?php if($slide['options']['speaker_url']):?>
			                <a href="<?php echo esc_url($slide['options']['speaker_url']); ?>"><?php echo get_the_title($slide['post']->ID); ?></a></h5>
			            	<?php else: ?>
			            	<?php echo get_the_title($slide['post']->ID); ?>
			            	<?php endif;?>
			            	</h5>
			                <h6><?php print $slide['options']['position']; ?></h6>
			            </div>
			        </div>
			        <div class="col-md-7">
			            <p><?php print $slide['options']['description']; ?></p>
			        </div>
				</div>
				<?php if ($slide !== end($slides)): ?>
		        <ul class="site-dot">
			        <li></li>
			        <li><span><i></i></span></li>
			        <li></li>
				</ul>
				<?php endif; ?>
			<?php endforeach; ?>
			<?php if($shortcode['btn_url']):?>
			<p class="align-center">
                <a href="<?php echo esc_url($shortcode['btn_url']);?>" class="section-link"><?php print $shortcode['btn_title'] ? $shortcode['btn_title'] : __('View all the speakers','e-event');?></a>
            </p>
        	<?php endif;?>
		<?php elseif($type=='2'): ?>
			<div class="row">
				<?php foreach($slides as $slide_nr => $slide): if($slide_nr >= $shortcode['nr']) break; ?>
			    	<div class="col-md-3 col-xs-6">
			    	 	<?php echo ($slide_nr%2!=0) ? '<div class="margin-top"></div>' : ''; ?>
			            <div class="team-member">
			                <div class="member-cover">
			                    <div class="round-relative">
			                        <ul class="team-social">
										<?php foreach($slide['options']['social'] as $social_type => $social):
										if($social):?>
										<li><a href="<?php echo esc_url($social); ?>"><i class="fa fa-<?php echo esc_attr($social_type); ?>" title="<?php echo esc_attr($social_type); ?>"></i></a></li>
										<?php endif;?>
										<?php endforeach; ?>
			                        </ul>
			                        <img src="<?php echo esc_attr($slide['options']['image'] ); ?>" alt="speaker"/>
			                    </div>
			                </div>
			                <h5>
			                <?php if($slide['options']['speaker_url']):?>
			                <a href="<?php echo esc_attr($slide['options']['speaker_url']); ?>"><?php echo get_the_title($slide['post']->ID); ?></a></h5>
			            	<?php else: ?>
			            	<?php echo get_the_title($slide['post']->ID); ?>
			            	<?php endif;?>
			            	</h5>
			                <h6><?php print $slide['options']['position']; ?></h6>
			            </div>
			        </div>
				<?php endforeach; ?>
			</div>
			<?php if($shortcode['btn_url']):?>
			<p class="align-center">
                <a href="<?php echo esc_url($shortcode['btn_url']);?>" class="section-link"><?php print $shortcode['btn_title'] ? $shortcode['btn_title'] : __('View all the speakers','e-event');?></a>
            </p>
            <?php endif; ?>
		<?php elseif($type=='3'): ?>
			<div class="row">
				<?php foreach($slides as $slide_nr => $slide): if($slide_nr >= $shortcode['nr']) break; ?>
                    <div class="col-md-4 col-lg-6 col-sm-6">
                        <div class="team-box">
                            <div class="team-box-cover">
                                <img src="<?php echo esc_attr($slide['options']['image'] ); ?>" alt="speaker"/>
                            </div>
                            <div class="team-box-name">
                                <ul class="team-social">
                                    <?php foreach($slide['options']['social'] as $social_type => $social):
									if($social):?>
									<li><a href="<?php echo esc_url($social); ?>"><i class="fa fa-<?php echo esc_attr($social_type); ?>" title="<?php echo esc_attr($social_type); ?>"></i></a></li>
									<?php endif;?>
									<?php endforeach; ?>
                                </ul>
                                <h5>
				                <?php if($slide['options']['speaker_url']):?>
				                <a href="<?php echo esc_attr($slide['options']['speaker_url']); ?>"><?php echo get_the_title($slide['post']->ID); ?></a></h5>
				            	<?php else: ?>
				            	<?php echo get_the_title($slide['post']->ID); ?>
				            	<?php endif;?>
				            	</h5>
                                 <h6><?php print $slide['options']['position']; ?></h6>
                            </div>
                            <p><?php print $slide['options']['description']; ?></p>
                        </div>
                    </div>
				<?php endforeach; ?>
			</div>
			<?php if($shortcode['btn_url']):?>
			<p class="align-center">
                <a href="<?php echo esc_url($shortcode['btn_url']);?>" class="section-link"><?php print $shortcode['btn_title'] ? $shortcode['btn_title'] : __('View all the speakers','e-event');?></a>
            </p>
            <?php endif; ?>
		<?php elseif($type=='4'): ?>
			<div class="row">
				<?php foreach($slides as $slide_nr => $slide): if($slide_nr >= $shortcode['nr']) break; ?>
                   <div class="col-md-6 col-sm-6 col-lg-3">
	                    <div class="team-box">
	                        <div class="team-box-hover">                                
	                           <h5>
				                <?php if($slide['options']['speaker_url']):?>
				                <a href="<?php echo esc_attr($slide['options']['speaker_url']); ?>"><?php echo get_the_title($slide['post']->ID); ?></a></h5>
				            	<?php else: ?>
				            	<?php echo get_the_title($slide['post']->ID); ?>
				            	<?php endif;?>
				            	</h5>
	                             <h6><?php print $slide['options']['position']; ?></h6>
	                            <ul class="team-social">
	                                <?php foreach($slide['options']['social'] as $social_type => $social):
									if($social):?>
									<li><a href="<?php echo esc_url($social); ?>"><i class="fa fa-<?php echo esc_attr($social_type); ?>" title="<?php echo esc_attr($social_type); ?>"></i></a></li>
									<?php endif;?>
									<?php endforeach; ?>
	                            </ul>
	                        </div>
	                        <div class="team-box-cover">
	                            <img src="<?php echo esc_attr($slide['options']['image'] ); ?>" alt="member" /> 
	                        </div>
	                    </div>
	                </div>
				<?php endforeach; ?>
			</div>
			<?php if($shortcode['btn_url']):?>
			<p class="align-center">
                <a href="<?php echo esc_url($shortcode['btn_url']);?>" class="section-link"><?php print $shortcode['btn_title'] ? $shortcode['btn_title'] : __('View all the speakers','e-event');?></a>
            </p>
            <?php endif; ?>
		<?php endif; ?>
	</section>
	<!-- ========================= END SPEAKERS ======================== -->