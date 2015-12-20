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

			if(trim($_REQUEST['title'])!='' and trim($_REQUEST['des'])!='')
			{
			
			$query_add="update `package_option` set `title`='$title',`des`='".addslashes($des)."',`price`='$price',`price_box_text`='$price_box_text' where id='$_REQUEST[id]'";
				
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