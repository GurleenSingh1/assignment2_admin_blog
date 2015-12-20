<?php

if ( isset($_REQUEST["mode"])&& $_REQUEST["mode"]=="forget") 
 {
if (!$_POST["email"])
{
 die("You need to provide a email id.");
}

 $q = "SELECT * FROM `users` WHERE `email`='".$_POST["email"]."' "
        ."LIMIT 1";
  // Run query
  $r = mysql_query($q);

  if ( $obj = @mysql_fetch_array($r) )
        {
			$body="Dear User,<br />Your admin username and password are given below <br/>Your Password is &nbsp; <b>".$obj['pass']."</b><br /> Your username is &nbsp; <b>".$obj['uname']."</b><br /> For, any query or complain please contact us at 9804313325.<br />";
			/*$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
			$headers .= 'From: View Project 4u < nopely@viewproject4u.in >' . PHP_EOL .
    'Reply-To: View Project 4u < nopely@viewproject4u.in >' . PHP_EOL .
    'X-Mailer: PHP/' . phpversion();*/
	
	$headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
    $headers .= 'From: Ethics GL < nopely@ethicsgl.com >' . PHP_EOL .
                'Reply-To: ".$_POST[from]."< nopely@ethicsgl.com >' . PHP_EOL .
                'X-Mailer: PHP/' . phpversion();
		
		@mail($_POST["email"],"Forget Password",$body,$headers);
		header("location: index.php?module=login");	
		/*echo "<script type='text/javascript'> alert('Check your registered email id to know password...');</script>";*/
        }
		else{
		$msg =  "Invalid email id. Please try again with correct E-mail ID.";	
		}
		
 }
 
?>