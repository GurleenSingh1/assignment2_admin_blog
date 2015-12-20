<?php
ob_start();
session_start();
include '../config.php';
extract($_POST);



mysql_query("update `package_option` set `default_selected`='0'");


mysql_query("update `package_option` set `default_selected`='1' where `id`='$_REQUEST[radio_f_1]'");

mysql_query("update `package_option` set `default_selected`='1' where `id`='$_REQUEST[radio_f_2]'");

mysql_query("update `package_option` set `default_selected`='1' where `id`='$_REQUEST[radio_f_3]'");



header("location:".$_SERVER['HTTP_REFERER']);
?>