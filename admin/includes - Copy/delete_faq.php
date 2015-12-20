<?php
ob_start();
session_start();
include '../config.php';
extract($_POST);

	  $query_sel_u="select * from `faq` where `faq_id`=$_REQUEST[faq_id]";
	  $res_sel_u=mysql_query($query_sel_u);
	  $array_sel_u=mysql_fetch_array($res_sel_u);
			  
$query_add="delete from `faq` where `faq_id`='$_REQUEST[faq_id]'";

$res_query=mysql_query($query_add);


@unlink("../../image_faq/".$array_sel_u['image']);


header("location:../index.php?module=faq&header=Manage Faq");
?>
