<?php
add_action( 'admin_menu', 'businessInfo_add_admin_menu' );
add_action( 'admin_init', 'businessInfo_settings_init' );

function businessInfo_add_admin_menu(  ) { 

	add_menu_page(	'ECF Sped Empresa',			// The text to be displayed in the title tags of the page when the menu is selected.
	 				'ECF Sped Empresa', 		// The text to be used for the menu.
	 				'manage_options', 			// The capability required for this menu to be displayed to the user.
	 				'ecf_business', 			// The slug name to refer to this menu by
	 				'businessInfo_options_page'	// Callback function
	 			);
}
// **************************** SETTINGS API ******************************	

 
/* ------------------------------------------------------------------------ *
 * Setting Registration
 * ------------------------------------------------------------------------ */
 
/**
 * Initializes the theme options page by registering the Sections,
 * Fields, and Settings.
 *
 * This function is registered with the 'admin_init' hook.
 */
function businessInfo_settings_init(  ) { 

	

	add_settings_section(
		'businessInfo_pluginPage_section', 					// ID used to identify this section and with which to register options
		__( 'Your section description', 'belarusian.life' ),// Title to be displayed on the administration page
		'businessInfo_settings_section_callback', 			// Callback used to render the description of the section
		'pluginPage'										// Page on which to add this section of options
	);
	add_settings_field( 
		'businessInfo_checkbox_field_0', 
		__( 'Settings field description','belarusian.life'), 
		'businessInfo_checkbox_field_0_render', 
		'pluginPage', 
		'businessInfo_pluginPage_section' 
	);

	add_settings_field( 
		'businessInfo_date_field_1', 
		__( 'Settings field description','belarusian.life'), 
		'businessInfo_date_field_1_render', 
		'pluginPage', 
		'businessInfo_pluginPage_section' 
	);

	add_settings_field( 
		'businessInfo_text_field_2', 
		__( 'Mês e ano do início da validade','belarusian.life'), 
		'businessInfo_text_field_2_render', 
		'pluginPage', 
		'businessInfo_pluginPage_section' 
	);
	register_setting(	'pluginPage', 						
						'businessInfo_settings'
					);

}

/* ------------------------------------------------------------------------ *
 * Section Callbacks
 * ------------------------------------------------------------------------ */
 
/**
 * This function provides a simple description for the General Options page. 
 *
 * It is called from the 'sandbox_initialize_theme_options' function by being passed as a parameter
 * in the add_settings_section function.
 */
function businessInfo_settings_section_callback(  ) { 
	echo __( 'This section description', 'belarusian.life' );
}

function businessInfo_checkbox_field_0_render(  ) { 
	$options = get_option( 'businessInfo_settings' );
	?>
	<input type='checkbox' name='businessInfo_settings[businessInfo_checkbox_field_0]' <?php checked( $options['businessInfo_checkbox_field_0'], 1); ?> value='1'>
	<?php
}

function businessInfo_date_field_1_render(  ) { 
	$options = get_option( 'businessInfo_settings' );
	?>
	<input type='date' name='businessInfo_settings[businessInfo_date_field_1]' value='<?php echo $options['businessInfo_date_field_1']; ?>'>
	<?php
}

function businessInfo_text_field_2_render(  ) { 
	$options = get_option( 'businessInfo_settings' );
	?>
	<input type='month' name='businessInfo_settings[businessInfo_text_field_2]' value='<?php echo $options['businessInfo_text_field_2']; ?>' pattern="[0-9]{3}.[0-9]{3}.[0-9]{3}-[0-9]{2}">
	<?php
}

function businessInfo_options_page(  ) { 
	require_once (get_template_directory().'/inc/templates/ecf-options.php');

}