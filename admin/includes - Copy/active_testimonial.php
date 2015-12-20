<?php 
ob_start();
session_start();
include '../config.php';

$testimonials_id=$_REQUEST['testimonials_id'];

if($_REQUEST['action']=='inactive')
{
$query="update `testimonials` set `inactive`='1' where `testimonials_id`='$testimonials_id'";
$res=mysql_query($query);
}
if($_REQUEST['action']=='active')
{
echo $query="update `testimonials` set inactive='0' where `testimonials_id`='$testimonials_id'";

$res=mysql_query($query);
}
header("location:../index.php?module=testimonial&&header=Manage Testimonial");
?>