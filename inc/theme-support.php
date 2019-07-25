<?php 

function efc_register_nav_menu()
{
	register_nav_menu( 'primary', 'Primary Navigation Menu' );
}

add_action( 'after_setup_theme', 'efc_register_nav_menu');

add_theme_support( 'custom-logo' );

