<?php
ob_start();
session_start();
include '../config.php';


extract($_REQUEST);

 $trm_title=trim($title);
 $cap_title=ucwords(strtolower($trm_title));
 $title=$cap_title;
 

						    /*$user_country_query="select `toppings_code`  from `toppings` where `inactive`='0' and `toppings_code`='$toppings_code' ";
							$user_country_run=mysql_query($user_country_query);
							$user_country_count=mysql_num_rows($user_country_run); */
							
	 
	 

if(count($_REQUEST['toppings'])>0)
{
$toppings_type=implode(",",$_REQUEST['toppings']); 


if($_REQUEST['toppings_code']>1)
{
$total_add_for_topping=($_REQUEST['toppings_code']*0.50)*$total_pizza_ord;
}

}


if(!empty($_REQUEST['pizza_list_id']) && $_REQUEST['pizza_list_id']!="")
{

			if(trim($_REQUEST['first_name'])!='' and trim($_REQUEST['last_name'])!='' and trim($_REQUEST['email'])!='' and trim($_REQUEST['phone'])!='')
			{
			
			 $query_add="update `pizza_list` set `first_name`='$first_name',`last_name`='$last_name',`address`='$address',`city`='$city',`province`='$province',`postal_code`='$postal_code',`email`='$email',`phone`='$phone',`status`='$status_type' ,`number_pizza`='$number_pizza',`size`='$size',`crust_types`='$crust_types',`toppings`='$toppings_type',`toppings_code`='$toppings_code' where pizza_list_id='$_REQUEST[pizza_list_id]'";
				
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