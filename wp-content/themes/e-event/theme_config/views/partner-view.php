    <!-- ========================= START PARTNERS ======================== -->
    <section class="our-partners" data-tesla-plugin="carousel" data-tesla-container=".tesla-carousel-items" data-tesla-item="&gt;div" data-tesla-rotate="false" data-tesla-autoplay="false" data-tesla-hide-effect="false">
        <?php if($shortcode['title']) echo '<h3 class="site-title">'.$shortcode['title'].'<i></i></h3>'; ?>
        <div class="row tesla-carousel-items">
            <?php foreach($slides as $slide_nr => $slide): if($slide_nr >= $shortcode['nr']) break; ?>
            <div class="col-md-2 col-xs-4">
                <a href="<?php echo esc_url($slide['options']['url']) ? esc_url($slide['options']['url']) : '#';?>"><img src="<?php echo esc_attr($slide['options']['partner_cover']);?>" alt="partner"/></a>
            </div>
            <?php endforeach;?>
        </div>
        <?php if(!empty($slide_nr) && $slide_nr>5):?>
        <ul>
            <li class="prev disabled"><i class="fa fa-arrow-circle-left"></i></li>
            <li><i class="fa fa-circle"></i></li>
            <li class="next"><i class="fa fa-arrow-circle-right"></i></li>
        </ul>
        <?php endif;?>
    </section>
    <!-- ========================= END PARTNERS ======================== -->