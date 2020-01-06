<?php 
	foreach($rows as $row)
		foreach( $row['columns'] as $column ) 
			if(!empty($column['form_elements']))
				foreach($column['form_elements'] as $form_element)
					if($form_element['type'] === 'new_form_rsvp') 
						$string = $form_element;
?>

<form method="POST" action="contact_form_send_message" data-parsley-validate class="<?php print !empty($string) ? 'tt-form rsvp-form' : 'tt-form contact-form';?>">
	<?php 
	print !empty($string['label']) ? '<h3><i class="the-dot"></i>'.$string['label'].'<i class="the-dot"></i></h3>' : '';
	$i=0;	//unnamed fields counter
	foreach($rows as $row) : ?> 
		<div class="row"><!-- Start Row -->
			<?php foreach( $row['columns'] as $column ) : ?> 
				<div class="col-md-<?php echo esc_attr($column['size']); ?>"><!-- Start Column -->
					<?php if (!empty($column['form_elements']))
						foreach($column['form_elements'] as $form_element) : ?>
							<!-- Start Element -->
							<?php 
							if(!empty($form_element) && is_array($form_element))
									extract($form_element);
							//If no name set giving a random name=================
							if(!isset($name) || $name===''){
								$i++;
								$name = 'UnNamedField'.$id.$i;
							}
							//making it easier to work with $required variable
							if(!empty($required) && $required === 'true')
								$required = TRUE;
							else
								$required = FALSE;
							//Including view of the field=========================
							if($file_location = locate_template( "theme_config/views/contact_form/" . $form_element['type'] . ".php"))
								require $file_location;
							//Reseting used variables=============================
							unset($name,$placeholder,$required,$select_options,$label);
							?>
							<!-- End Element -->
						<?php endforeach; ?>
				</div><!-- End Column -->
			<?php endforeach;?>
		</div><!-- End Row -->
	<?php endforeach;?>
	<input type="hidden" name="id" value="<?php echo esc_attr($id); ?>">
</form>
