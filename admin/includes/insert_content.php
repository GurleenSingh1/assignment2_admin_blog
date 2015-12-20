<?php
ob_start();
session_start();
include '../config.php';
extract($_POST);



$heading=addslashes($heading);
$description=addslashes($description);
$des2=addslashes($des2);
$des3=addslashes($des3);



/*$data_content=htmlentities($_POST['description'], ENT_QUOTES) ;
$top_con=htmlentities($_POST['top_con'], ENT_QUOTES) ;*/

$query_add="update `content` set `description`='$description',`des2`='$des2',`des3`='$des3',`heading`='$heading' where id='$_REQUEST[id]'";

$res_query=mysql_query($query_add);

header("location:../index.php?module=content&&header=Content&&id=$_REQUEST[id]&msg=Updated successfully");




?>