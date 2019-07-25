<?php

require get_template_directory().'/inc/enqueue.php';
require get_template_directory().'/inc/theme-support.php';
require get_template_directory().'/inc/function-admin.php';

require get_template_directory().'/inc/post-types/generateCPT.php';
require get_template_directory().'/inc/post-types/books.php';
require get_template_directory().'/inc/post-types/infoEmpregador.php';
require get_template_directory().'/inc/post-types/infoEstab.php';
require get_template_directory().'/inc/post-types/s1010.php';



// apply_filters( 'is_protected_meta', true , 'book_info_year', 'post');
// apply_filters( 'is_protected_meta', true , 'custom_meta[book_info_year]', 'post');

// function deny_post_date_change( $data, $postarr ) {
//   unset( $data['post_title'] );
//   unset( $data['custom_meta[book_info_year]'] );
//   return $data;
// }
// add_filter( 'wp_insert_post_data', 'deny_post_date_change', 0, 2 );

add_action( 'wp_ajax_nopriv_myAjaxFunction', 'myAjaxFunction' );  
add_action( 'wp_ajax_myAjaxFunction', 'myAjaxFunction' );

function myAjaxFunction(){

	global $wpdb;
    //get the data from ajax call  
    $q = $_POST['landID'];
    // $col = $_POST['col'];

	//  $wpdb->get_var  :  Executes a SQL query and returns the value from the SQL result. If the SQL result contains more than one column and/or more than one row, this function returns the value in the column and row specified. If $query is null, this function returns the value in the specified column and row from the previous SQL result.


	// $res = $wpdb->get_var( "SELECT ID FROM wp_cnae WHERE CNAE =".$q );// the optional parameter ARRAY_A turns the results into an array
	$res = $wpdb->get_results( "SELECT `FPAS`,`TERCEIROS`,`EMPRESA`,`RAT` FROM `wp_cnae` WHERE `ID`=".intval($q), ARRAY_A );

	echo json_encode($res[ 0 ]) ;

    wp_die();
}