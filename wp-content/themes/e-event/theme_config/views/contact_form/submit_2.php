<p class="align-center">
	<input 
		type="submit"
		value="<?php echo isset($label) && $label !== '' ? $label : 'Send' ?>"
		class="ticket-button form-send contact-send"
		data-sending='<?php _e('Sending Message','E-event') ?>'
		data-sent='<?php _e('Message Successfully Sent','E-event') ?>'
		>
</p>

