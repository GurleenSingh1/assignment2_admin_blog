<?php
ob_start();
session_start();
include '../config.php';
extract($_POST);

$query_sel_u="select * from `user_files` where `user_order_id`='$_REQUEST[id]'";
		$res_sel_u=mysql_query($query_sel_u);
		while($array_sel_u=mysql_fetch_array($res_sel_u))
		{
		  
		  @unlink("../../user_uploaded_files/".$array_sel_u['file_name']);
		  
          
		  
		 } 
			  
	mysql_query("delete from `user_files` where `user_order_id`='$_REQUEST[id]'");
	
		 $sel_cate="delete from `user_order` where `id`='$_REQUEST[id]'";
		
		$query_sel_cate=mysql_query($sel_cate);

header("location:".$_SERVER['HTTP_REFERER']);
?>
