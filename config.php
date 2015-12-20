<?php

if($_SERVER['HTTP_HOST'] == 'localhost')
{
$mysql_username = "root";
$mysql_pssword = "";
$db_name = "pizza";
$host = "localhost";

}
else
{

$mysql_username = "ethics_pizza";
$mysql_pssword = "admin@!@#";
$db_name = "ethics_pizza";
$host = "localhost";

}

$dbConn = mysql_connect($host,$mysql_username,$mysql_pssword);
if(!$dbConn)
die("<b>NOT ABLE TO CONNECT DATABASE</b>.");
mysql_select_db($db_name) or die("<b>NOT ABLE TO CONNECT DATABASE</b>.");
$levels = array(1=>"Admin", 2=>"Employee");
$inpage = 20;

?>
