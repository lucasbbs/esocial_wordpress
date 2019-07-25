<?php
function ecf_register_menu_page()
{
	add_menu_page( 'ecf_page_options', 'ECF Sped', 'manage_options', 'ecf_options', 'ecf_create_page');
	add_action('admin_init', 'sandbox_initialize_theme_options');
}
add_action( 'admin_menu', 'ecf_register_menu_page');	

function ecf_create_page()
{
	require_once(get_template_directory_uri().'/inc/templates/ecf-options.php');
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
add_action('admin_init', 'sandbox_initialize_theme_options');
function sandbox_initialize_theme_options() {
 
    // First, we register a section. This is necessary since all future options must belong to one.
    add_settings_section(
        'general_settings_section',         // ID used to identify this section and with which to register options
        'Sandbox Options',                  // Title to be displayed on the administration page
        'sandbox_general_options_callback', // Callback used to render the description of the section
        'ecf_options'                       // Page on which to add this section of options
    );

    // Next, we will introduce the fields for toggling the visibility of content elements.
    add_settings_field( 
        'show_header',                      // ID used to identify the field throughout the theme
        'Header',                           // The label to the left of the option interface element
        'sandbox_toggle_header_callback',   // The name of the function responsible for rendering the option interface
        'ecf_options',                      // The page on which this option will be displayed
        'general_settings_section',         // The name of the section to which this field belongs
        array(                              // The array of arguments to pass to the callback. In this case, just a description.
            'Activate this setting to display the header.'
        )
    );

    register_setting( 'sandbox-theme-support', 'show_header');
} // end sandbox_initialize_theme_options


 
/* ------------------------------------------------------------------------ *
 * Section Callbacks
 * ------------------------------------------------------------------------ */
 
/**
 * This function provides a simple description for the General Options page. 
 *
 * It is called from the 'sandbox_initialize_theme_options' function by being passed as a parameter
 * in the add_settings_section function.
 */
function sandbox_general_options_callback() {
    echo '<p>Select which areas of content you wish to display.</p>';
} // end sandbox_general_options_callback
  



/* ------------------------------------------------------------------------ *
 * Field Callbacks
 * ------------------------------------------------------------------------ */
 
/**
 * This function renders the interface elements for toggling the visibility of the header element.
 * 
 * It accepts an array of arguments and expects the first element in the array to be the description
 * to be displayed next to the checkbox.
 */
function sandbox_toggle_header_callback($args) {
     
    // Note the ID and the name attribute of the element match that of the ID in the call to add_settings_field
    $html = '<input type="checkbox" id="show_header" name="show_header" value="1" ' . checked(1, get_option('show_header'), false) . '/>'; 
     
    // Here, we will take the first argument of the array and add it to a label next to the checkbox
    $html .= '<label for="show_header"> '  . $args[0] . '</label>'; 
     
    echo $html;
     
} // end sandbox_toggle_header_callback

