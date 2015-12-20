<?php
ob_start();
session_start();
include '../config.php';


extract($_REQUEST);

 $trm_title=trim($title);
 $cap_title=ucwords(strtolower($trm_title));
 $title=$cap_title;
	   
if(!empty($_REQUEST['pizza_list_id']) && $_REQUEST['pizza_list_id']!="")
{

			if(trim($_REQUEST['first_name'])!='' and trim($_REQUEST['last_name'])!='' and trim($_REQUEST['email'])!='' and trim($_REQUEST['phone'])!='')
			{
			
			 $query_add="update `pizza_list` set `first_name`='$first_name',`last_name`='$last_name',`email`='$email',`phone`='$phone',`status`='$status_type' where pizza_list_id='$_REQUEST[pizza_list_id]'";
				
				$res_query=mysql_query($query_add);
				
				$_SESSION['msg']="Updated successfully";
			}
			
			else
			{
			
			$_SESSION['errormsg']="Please fillup required fields";
			
			}
			header("location:".$_SERVER['HTTP_REFERER']);
	
}
else 
{
header("location:".$_SERVER['HTTP_REFERER']);
}

?>