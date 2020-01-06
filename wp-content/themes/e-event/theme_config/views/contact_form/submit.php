<div class="align-center">
	<div class="contact-point">
		<div class="s-dot"><i></i></div>
		<input 
			type="submit"
			value="<?php echo isset($label) && $label !== '' ? $label : 'Send' ?>"
			class="contact-button form-send contact-send"
			data-sending='<?php _e('Sending Message','E-event') ?>'
			data-sent='<?php _e('Message Successfully Sent','E-event') ?>'
			>
	</div>	
</div>