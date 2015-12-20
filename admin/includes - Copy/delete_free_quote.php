<?php
ob_start();
session_start();
include '../config.php';
extract($_POST);


	mysql_query("delete from `pizza_list` where `pizza_list_id`='$_REQUEST[pizza_list_id]'");
	
		 $sel_cate="delete from `user_quote` where `pizza_list_id`='$_REQUEST[pizza_list_id]'";
		
		$query_sel_cate=mysql_query($sel_cate);

header("location:".$_SERVER['HTTP_REFERER']);
?>
