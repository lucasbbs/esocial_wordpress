<?php 
/**
*
* @package sunsettheme
*  ///////////////////////////////
*  //FRONT-END ENQUEUE FUNCTIONS//
*  ///////////////////////////////
*/


function ecf_load_scripts()
{

	
	wp_enqueue_style( 'bootstrap', get_template_directory_uri().'/css/bootstrap.min.css', array(), '3.3.6', 'all' );
	wp_enqueue_style( 'ecf', get_template_directory_uri().'/css/ecf.css', array(), '1.0.0', 'all' );
	wp_enqueue_style( 'raleway', 'https://fonts.googleapis.com/css?family=Raleway:200i,300,400&amp' );




	wp_deregister_script( 'jquery' );

	wp_register_script( 'jquery', get_template_directory_uri().'/js/jquery.js', false, '1.11.3', true );
	wp_enqueue_script( 'jquery' );


	wp_enqueue_script( 'bootstrap', get_template_directory_uri().'/js/bootstrap.min.js', array('jquery'), '3.3.6', true );

}
add_action( 'wp_enqueue_scripts', 'ecf_load_scripts' );


function ecf_load_admin_scripts()
{

	wp_enqueue_style( 'ecf_admin_style', get_template_directory_uri().'/css/ecf-admin.css' );
	wp_enqueue_script( 'ecf_admin_script', get_template_directory_uri().'/js/admin.js');


    $screen = get_current_screen();
    if ( $hook== 'edit.php' || $screen->post_type == 'estabelecimento' ) {
    	wp_enqueue_script( 'my_custom_script',get_template_directory_uri() . '/js/test.js' );
    }
}
add_action( 'admin_enqueue_scripts', 'ecf_load_admin_scripts');

