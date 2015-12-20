<?php

if($_SERVER['HTTP_HOST'] == 'localhost')
{
	
$dir_loc="http://".$_SERVER['HTTP_HOST']."/form/";
$php_self=$_SERVER['PHP_SELF'];
$page_name_1=str_replace("/form/","",$php_self);
$page_name_3=str_replace("/","",$page_name_1);
$page_name=$page_name_3;

$dir_loc_admin="http://".$_SERVER['HTTP_HOST']."/form/admin/";

}
else
{
	
$dir_loc="http://".$_SERVER['HTTP_HOST']."/";
$php_self=$_SERVER['PHP_SELF'];
$page_name_1=str_replace("/","",$php_self);
$page_name_3=str_replace("/","",$page_name_1);
$page_name=$page_name_3;

$dir_loc_admin="http://".$_SERVER['HTTP_HOST']."/admin/";
}


function seo_friendly_url($string){ 
		$string = str_replace(array('[\', \']'), '', $string); 
		$string = preg_replace('/\[.*\]/U', '', $string); $string = preg_replace('/&(amp;)?#?[a-z0-9]+;/i', '-', 
		$string); $string = htmlentities($string, ENT_COMPAT, 'utf-8'); 
		$string = preg_replace('/&([a-z])(acute|uml|circ|grave|ring|cedil|slash|tilde|caron|lig|quot|rsquo);/i', '\\1', 
		$string ); $string = preg_replace(array('/[^a-z0-9]/i', '/[-]+/') , '-', 
		$string); return strtolower(trim($string, '-')); 
		}
		
?>

