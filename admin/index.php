<?php
session_start();
extract($_POST);
$module='';
 
if(isset($_REQUEST['module'])){ $module=$_REQUEST['module'];}
if(!isset($_SESSION['username'])){
	if($module=='forgot_password')
	{
	$page = "forgot_password";
	}else
	{
	$page = "login";
	}
}else{
$page = isset($module )? $module : "home";
}
$action='';
$action=isset($_REQUEST['action']);

//Config Setting here
require('config.php'); 

//logout script
if($page == "logout"){
include("logout.php");
}
if($module=='login')
	{   
if($page == "login" && $action == "login"){

include("loginCheck.php");

}
}
else if ($module=='forgot_password')
{
include("forgot_password_process.php");	
}else{}

?>

<?php
if($_SERVER['HTTP_HOST'] == 'localhost')
{
		$dir_loc="http://".$_SERVER['HTTP_HOST']."/translate/admin/";
}else
{      $dir_loc="http://".$_SERVER['HTTP_HOST']."/translate/admin/";

}
	
		$language_prev="Prev";
		$language_next="Next";
		$language_last="Last";
		$language_first="First";
		$language_page="Page";
		$language_page_of="of"; 
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD html 4.01 Transitional//EN">
<html>
<head>
<title>Control Panel</title>
<meta charset="utf-8">

<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/skins/gray.css" >

<link rel="alternate stylesheet" type="text/css" href="css/skins/orange.css" title="orange">
<link rel="alternate stylesheet" type="text/css" href="css/skins/red.css" title="red">
<link rel="alternate stylesheet" type="text/css" href="css/skins/green.css" title="green">
<link rel="alternate stylesheet" type="text/css" href="css/skins/purple.css" title="purple">
<link rel="alternate stylesheet" type="text/css" href="css/skins/yellow.css" title="yellow">
<link rel="alternate stylesheet" type="text/css" href="css/skins/black.css" title="black">
<link rel="alternate stylesheet" type="text/css" href="css/skins/blue.css" title="blue">

<link rel="stylesheet" type="text/css" href="css/superfish.css" >
<link rel="stylesheet" type="text/css" href="css/uniform.default.css" >
<link rel="stylesheet" type="text/css" href="css/jquery.wysiwyg.css" >
<link rel="stylesheet" type="text/css" href="css/facebox.css" >
<link rel="stylesheet" type="text/css" href="css/smoothness/jquery-ui-1.8.8.custom.css">
<link rel="stylesheet" href="css/validationEngine.jquery.css" type="text/css"/>
<!--for pagination-->
<link href="css/page.css" rel="stylesheet" type="text/css" />
<!--<link href="css/pagination.css" rel="stylesheet" type="text/css" />
<link href="css/grey.css" rel="stylesheet" type="text/css" />-->
<!--for pagination end-->
<script src="js/jquery-1.7.2.min.js" type="text/javascript"></script>
<script src="js/languages/jquery.validationEngine-en.js" type="text/javascript" charset="utf-8"></script>
<script src="js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
        <script>
            jQuery(document).ready(function(){
                // binds form submission and fields to the validation engine
                jQuery("#frm").validationEngine();
            });
        </script>

<script type="text/javascript" src="js/jquery-ui-1.8.8.custom.min.js" ></script>
<script type="text/javascript" src="js/jquery.validate.min.js" ></script>
<script type="text/javascript" src="js/jquery.uniform.min.js" ></script>
<script type="text/javascript" src="js/jquery.wysiwyg.js" ></script>
<script type="text/javascript" src="js/superfish.js" ></script>
<script type="text/javascript" src="js/cufon-yui.js" ></script>
<script type="text/javascript" src="js/Delicious_500.font.js" ></script>
<script type="text/javascript" src="js/jquery.flot.min.js" ></script>
<script type="text/javascript" src="js/custom.js" ></script>
<script type="text/javascript" src="js/facebox.js" ></script>
<script type="text/javascript" src="js/jquery.cookie.js" ></script>
<script type="text/javascript" src="js/switcher.js" ></script>
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
</head>
<body style="padding:0; margin:0;" onLoad="start()">

<?php
if ($module=='forgot_password') {
if ($page == "forgot_password")
{
?>

	<?php
	
	echo '<link rel="stylesheet" type="text/css" href="css/login.css">';
	include("includes/forgot_password.php");

}
else
{
	
	include("header.php");
	
	if(file_exists("includes/".$page.".php")){

	include("includes/".$page.".php");
	}
	else
	{
	include("404.php");
	}
	if($page !="add_admin_user"){
	include("left_nav.php");
	} else {
	//include("right_nav.php");
	}
	include("footer.php");
	
}

}
else 
{
if ($page == "login")
{
?>

	<?php
	echo '<link rel="stylesheet" type="text/css" href="css/login.css">';
	include("includes/login.php");
	

}
else
{
	
	include("header.php");
	
	if(file_exists("includes/".$page.".php")){

	include("includes/".$page.".php");
	}
	else
	{
	include("404.php");
	}
	if($page !="add_admin_user" and $page != "free_quote" and $page !="free_quote_dtl"){
	include("left_nav.php");
	} else {
	//include("right_nav.php");
	}
	include("footer.php");
}
	
}
?>
</body>
</html>
