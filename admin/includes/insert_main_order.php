<?php
ob_start();
session_start();
include '../config.php';

extract($_REQUEST);

 $trm_title=trim($title);
 $cap_title=ucwords(strtolower($trm_title));
 $title=$cap_title;
	   
if(!empty($_REQUEST['id']) && $_REQUEST['id']!="")
{

			if(trim($_REQUEST['language_from'])!='' and trim($_REQUEST['language_to'])!='' and trim($_REQUEST['name'])!='' and trim($_REQUEST['email'])!='' and trim($_REQUEST['phone'])!='')
			{
			
			$query_add="update `user_quote` set `language_from`='$language_from',`language_to`='$language_to',`name`='$name',`cmpny_name`='$cmpny_name',`email`='$email',`phone`='$phone',`notarization`='$notarization',`physical`='$physical',`status`='$status_type' where id='$_REQUEST[id]'";
				
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