<?php
ob_start();
session_start();
include '../config.php';
extract($_POST);
			
$mark=$_POST['mark'];
if(is_array($mark))
	{
foreach($mark as $sel_mark) 
	{
		$query_sel_u="select * from `contact_us` where `id`='$sel_mark'";
		$res_sel_u=mysql_query($query_sel_u);
		$array_sel_u=mysql_fetch_array($res_sel_u);
		  
		/*  @unlink("../../gallery_thumbnails/".$array_sel_u['image_name']);
		  
          @unlink("../../gallery_images/".$array_sel_u['image_name']);*/
			  
	
		 $sel_cate="delete from `contact_us` where `id`='$sel_mark'";
		
		$query_sel_cate=mysql_query($sel_cate);
	}
	
	}



header("location:../index.php?module=contact_us&&header=Manage Contact Us");
?>