<?
session_start();
include '../config.php';
extract($_POST);

$pass=MD5($password);


	$qur="update `users` SET uname='$f_name' , pass='$password', `fname`='$fname', `lname`='$lname',paypal_email='$paypal_email',`company_name`='$company_name',`facebook`='$facebook',`twitter`='$twitter',`youtube`='$youtube',`google`='$google',`rss`='$rss',`email`='$email',`phone`='$phone',`merchant_id`='$merchant_id',`publickey`='$publickey',`privatekey`='$privatekey',`maintenance`='$maintenance',`maint_code`='$maint_code' where id='$_SESSION[admin_user_id]'";
	
	$res=mysql_query($qur) or die(mysql_error());
	

	
	if($_FILES['logo'][name]!="")
	{
	
	$name_f=$_FILES['logo'][name];
	$tmp_name=$_FILES['logo'][tmp_name];
	$date_id=date("ymdhis");
	$source=$tmp_name;
	$destination="../../logo/".$date_id.$name_f;
	
	copy($source,$destination);
	
	$img_name=$date_id.$name_f;
	
	$qur_sub_agencie12="update `logo` set `logo`='$img_name' where id='1'";
	 
	$res_agencie12=mysql_query($qur_sub_agencie12,$dbConn);
	
	}
	
	
	
	if($_FILES['logo1'][name]!="")
	{
	
	$name_f=$_FILES['logo1'][name];
	$tmp_name=$_FILES['logo1'][tmp_name];
	$date_id="f_".date("ymdhis");
	$source=$tmp_name;
	$destination="../../logo/".$date_id.$name_f;
	
	copy($source,$destination);
	
	$img_name=$date_id.$name_f;
	
	$qur_sub_agencie12="update `logo` set `logo1`='$img_name' where id='1'";
	 
	$res_agencie12=mysql_query($qur_sub_agencie12,$dbConn);
	
	}
	


	header("location:../index.php?module=add_admin_user&header=Admin Account Settings");

?>