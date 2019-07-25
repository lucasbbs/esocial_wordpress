<?php

$q = $post["q"];


//  $wpdb->get_var  :  Executes a SQL query and returns the value from the SQL result. If the SQL result contains more than one column and/or more than one row, this function returns the value in the column and row specified. If $query is null, this function returns the value in the specified column and row from the previous SQL result.


$res = $wpdb->get_var( "SELECT FPAS FROM wp_cnae WHERE ID='.$q.'  " );// the optional parameter ARRAY_A turns the results into an array
echo $res

