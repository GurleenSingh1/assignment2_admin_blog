<?php
ob_start();
session_start();
include '../config.php';
extract($_POST);

	  $query_sel_u="select * from `contact_us` where `id`=$_REQUEST[id]";
	  $res_sel_u=mysql_query($query_sel_u);
	  $array_sel_u=mysql_fetch_array($res_sel_u);
			  
$query_add="delete from `contact_us` where `id`='$_REQUEST[id]'";

$res_query=mysql_query($query_add);


@unlink("../../image_testimonial/".$array_sel_u['image']);


header("location:../index.php?module=contact_us&header=Manage Contact Us");
?>
