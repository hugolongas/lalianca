<?php
/*
	Template Name: Contact Page E-event
*/

$contact_details = array('contact_offices', 'contact_phone_numbers', 'contact_email_adress');
?>

<?php get_header() ?>
        <!-- ========================= START PATH SECTION ======================== -->
        <?php while ( have_posts() ) : the_post(); ?>
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
        <?php endwhile;?>
    </div>

	<!-- ========================= START CONTENT ======================== --> 
	<section class="contact-section">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <?php tt_form_location('contact_page'); ?>
                </div>
                <div class="col-md-4">
                    <h4><?php _eo('contact_information_title'); ?></h4>
                    <p><?php _eo('contact_information_text'); ?></p>
                </div>
            </div>
            <div class="row">
                <?php foreach($contact_details as $contact_data) {
                    if(_go($contact_data)): ?>
                        <div class="col-md-4">
                        <div class="address-box">
                            <ul>
                                <li><div class="s-dot"><i></i></div></li>
                                <li><h5><?php _eo($contact_data.'_title'); ?></h5></li>
                                <li><p><?php _eo($contact_data); ?><p></li>
                            </ul>
                        </div>
                        </div>
                    <?php endif; 
                    } ?>
            </div>
        </div>
    </section>

<?php get_footer(); ?>