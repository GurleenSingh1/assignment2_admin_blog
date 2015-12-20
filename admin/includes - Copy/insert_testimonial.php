<?php
ob_start();
session_start();
include '../config.php';

extract($_POST);

 $trm_name=trim($name);
 $cap_name=ucwords(strtolower($trm_name));
 $name=addslashes($cap_name);
 
 $trm_language=trim($language);
 $cap_language=ucwords(strtolower($trm_language));
 $language=addslashes($cap_language);

 $description=addslashes($description);
	   
if(empty($_REQUEST['testimonials_id']) && $_REQUEST['testimonials_id']=="")
{
	
	$query_sel_u3="select * from `testimonials` where `name`='$name'";
	$res_sel_u3=mysql_query($query_sel_u3);
	$row3=mysql_num_rows($res_sel_u3);
	
	if($row3<=0)
	{

		 	$query_add="INSERT INTO `testimonials` (`testimonials_id` ,`name`,`language`,`description`,`date_time`) VALUES ('','$name','$language','$description',now())";
		
			$res_query=mysql_query($query_add);
			
			header("location:../index.php?module=testimonial&&msg=Successfully Submited&header=Add Faq");
	}
	else
	{
		header("location:../index.php?module=add_testimonial&&header=Add Faq&testimonials_id=$_REQUEST[testimonials_id]&msg=Error This Title is already exist please user another&name=$_REQUEST[name]&image=$image_name&description=".urlencode($description)."");
	
	}		
	
}

else
	{
	$query_sel_u2="select * from `testimonials` where `name`='$name' and `testimonials_id`!='$_REQUEST[testimonials_id]'";
	$res_sel_u2=mysql_query($query_sel_u2);
	$row2=mysql_num_rows($res_sel_u2);

	if($row2<=0)
	{
	 $query_add="update `testimonials` set `name`='$name',`language`='$language',`description`='$description'where testimonials_id='$_REQUEST[testimonials_id]'";
	
	$res_query=mysql_query($query_add);
	

	
	header("location:../index.php?module=add_testimonial&&header=Add Faq&testimonials_id=$_REQUEST[testimonials_id]&msg=Updated successfully");
	
	}
	else 
	{
	header("location:../index.php?module=add_testimonial&&header=Add Faq&testimonials_id=$_REQUEST[testimonials_id]&msg=Error");
	}
}
?>