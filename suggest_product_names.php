<?php
ob_start();
session_start();
include '../config.php';

if ( !isset($_REQUEST['term']) )

    exit;

$query_search="SELECT  `street_id`, `street_name` FROM `street` WHERE `inactive`='0' AND `street_name` LIKE '$_REQUEST[term]%' ORDER BY `street_name` limit 0,10";

$rs=mysql_query($query_search);

$data = array();
if ( $rs && mysql_num_rows($rs) )
{
    while( $row = mysql_fetch_array($rs, MYSQL_ASSOC) )
    {
        $data[] = array(
            'label' => $_REQUEST[key].' '.$row['street_name'].' ',
            'value' => $row['street_name'],
			
        );
    }
}

echo json_encode($data);
flush();

