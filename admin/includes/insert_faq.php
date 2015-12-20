<?php
ob_start();
session_start();
include '../config.php';

extract($_POST);

 $trm_title=trim($title);
 $cap_title=ucwords(strtolower($trm_title));
 $title=addslashes($cap_title);

$description=addslashes($description);
	   
if(empty($_REQUEST['faq_id']) && $_REQUEST['faq_id']=="")
{
	
	$query_sel_u3="select * from `faq` where `title`='$title'";
	$res_sel_u3=mysql_query($query_sel_u3);
	$row3=mysql_num_rows($res_sel_u3);
	
	if($row3<=0)
	{

		 	$query_add="INSERT INTO `faq` (`faq_id` ,`faq_category_id`,`title`,`description`,`date_time`) VALUES ('','$faq_category_id','$title','$description',now())";
		
			$res_query=mysql_query($query_add);
			
			header("location:../index.php?module=faq&&msg=Successfully Submited&header=Add Faq");
	}
	else
	{
		header("location:../index.php?module=add_faq&&header=Add Faq&faq_id=$_REQUEST[faq_id]&msg=Error This Title is already exist please user another&title=$_REQUEST[title]&image=$image_name&description=".urlencode($description)."");
	
	}		
	
}

else
	{
	$query_sel_u2="select * from `faq` where `title`='$title' and `faq_id`!='$_REQUEST[faq_id]'";
	$res_sel_u2=mysql_query($query_sel_u2);
	$row2=mysql_num_rows($res_sel_u2);

	if($row2<=0)
	{
	 $query_add="update `faq` set `faq_category_id`='$faq_category_id',`title`='$title',`description`='$description'where faq_id='$_REQUEST[faq_id]'";
	
	$res_query=mysql_query($query_add);
	

	
	header("location:../index.php?module=add_faq&&header=Add Faq&faq_id=$_REQUEST[faq_id]&msg=Updated successfully");
	
	}
	else 
	{
	header("location:../index.php?module=add_faq&&header=Add Faq&faq_id=$_REQUEST[faq_id]&msg=Error");
	}
}
?>