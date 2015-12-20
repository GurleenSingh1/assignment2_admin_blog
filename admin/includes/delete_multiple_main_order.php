<?php
ob_start();
session_start();
include '../config.php';
extract($_POST);
if(trim($_REQUEST[action_type])!='')
{			
$mark=$_POST['mark'];
if(is_array($mark))
	{
foreach($mark as $sel_mark) 
	{
	
	if(trim($_REQUEST[action_type])=='del')
    {	
		$query_sel_u="select * from `user_files` where `user_order_id`='$sel_mark'";
		$res_sel_u=mysql_query($query_sel_u);
		while($array_sel_u=mysql_fetch_array($res_sel_u))
		{
		  
		  @unlink("../../user_uploaded_files/".$array_sel_u['file_name']);
		  
          
		  
		 } 
			  
	mysql_query("delete from `user_files` where `user_order_id`='$sel_mark'");
	
		 $sel_cate="delete from `user_order` where `id`='$sel_mark'";
		
		$query_sel_cate=mysql_query($sel_cate);
		
		
	}
	else
	{
	
	mysql_query("update `user_order` set `status`='$_REQUEST[action_type]' where `id`='$sel_mark'");
	
	}
		
	}
	
	}


}

header("location:".$_SERVER['HTTP_REFERER']);
?>