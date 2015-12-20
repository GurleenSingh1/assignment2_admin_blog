<?php 
ob_start();
session_start();
include '../config.php';

$faq_id=$_REQUEST['faq_id'];

if($_REQUEST['action']=='inactive')
{
$query="update `faq` set `inactive`='1' where `faq_id`='$faq_id'";
$res=mysql_query($query);
}
if($_REQUEST['action']=='active')
{
echo $query="update `faq` set inactive='0' where `faq_id`='$faq_id'";

$res=mysql_query($query);
}
header("location:../index.php?module=faq&&header=Manage Faq");
?>