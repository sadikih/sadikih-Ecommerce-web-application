<?php

	require_once('class_lib/db_connect_class.php');
	$check= new DB_CONNECT;

	if($check==true){
		echo '<h1 style="text-align:center; background-color:green; color:yellow; margin-top:50px;">Database Connect Successfully</h1>';
		header('refresh:10;url=index.php');
		echo '<pre>';
		//print_r($check);
		echo '</pre>';
	}
?>