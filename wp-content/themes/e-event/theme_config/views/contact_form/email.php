	<?php if(!empty($label)) : ?>
		<h5><?php print $label ?></h5>
	<?php endif; ?>
	<input 
		type='text' 
		name='<?php echo esc_attr($name)?>' 
		placeholder='<?php echo esc_attr($placeholder)?>' 
		value=''
		data-parsley-type="email"
		<?php if(!empty($required)) echo 'data-parsley-required="true"'; ?>
		class="contact-line"
		>
