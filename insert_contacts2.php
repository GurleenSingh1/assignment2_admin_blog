<?php
ob_start();
session_start();
include 'config.php';
include"SimpleImage.php";
extract($_POST);

	   
if(empty($_REQUEST['pizza_list_id']) && $_REQUEST['pizza_list_id']=="")
	{
		
	}
else
	{

$total_pizza_ord = $_REQUEST['number_pizza'];

$get_pizza_type=explode("-",$_REQUEST['size']);

$get_pizza_price=$get_pizza_type[1];

$total_normal_pay=$get_pizza_price*$total_pizza_ord;


$total_add_for_topping=0;
if(count($_REQUEST['toppings'])>0)
{
$toppings_type=implode(",",$_REQUEST['toppings']); 


if($_REQUEST['toppings_code']>1)
{
$total_add_for_topping=($_REQUEST['toppings_code']*0.50)*$total_pizza_ord;
}

}


$total_pay_for_crust_types=0;
if($_REQUEST['crust_types']=="stuffed")
{
$total_pay_for_crust_types=2;
}

$total_payable_cost=$total_normal_pay+$total_add_for_topping+$total_pay_for_crust_types;


if($_REQUEST['tax']==1)
{
$total_payable_cost = $total_payable_cost+($total_payable_cost*(13/100));
}




		


   $query_add="UPDATE `pizza_list` SET `number_pizza`='$_REQUEST[number_pizza]',`size`='$_REQUEST[size]',`crust_types`='$_REQUEST[crust_types]',`toppings`='$toppings_type',`toppings_code`='$_REQUEST[toppings_code]',`tax`='$_REQUEST[tax]',`total_cost`='$total_payable_cost' where `pizza_list_id`='$_REQUEST[pizza_list_id]'";

	$res_query=mysql_query($query_add);
			

	header("location:index3.php?msg=&pizza_list_id=$_REQUEST[pizza_list_id]");
	exit();
	
	
}
?>