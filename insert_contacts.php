<?php 
ob_start();
include"config.php";
include"SimpleImage.php";
extract($_POST);

 $trm_first_name=trim($first_name);
 $cap_first_name=ucwords($trm_first_name);
 $first_name=$cap_first_name;
 
 $trm_last_name=trim($last_name);
 $cap_last_name=ucwords($trm_last_name);
 $last_name=$cap_last_name;
 
?>

<?php
		
  $query_add="INSERT INTO `pizza_list`  (`first_name` , `last_name` ,`address`,`city`,`province`,`postal_code`,`phone`,`email`,
  `inactive`,`date_time`) 
	 VALUES 
('$first_name','$last_name','$address','$city','$province','$postal_code','$phone','$email','0',now())";

	$res_query=mysql_query($query_add);
	$pizza_list_id=mysql_insert_id();
	
	/*$_SESSION['pizza_list_id']=$pizza_list_id;*/
				
			/*	$sql_pro_1="select * from users where id='1'";
				$query_pro_1 = mysql_query($sql_pro_1);
				$res_pro_1=mysql_fetch_array($query_pro_1);
				
				$sql_reg2_1="select * from contact_us where id='$new_user_id'";
				$query_reg2_1=mysql_query($sql_reg2_1);
				$res2_1=mysql_fetch_array($query_reg2_1);
				$rs_subject3_1="Contact Information for " . $res2_1['name'];
				?>
                
                <?php 
                $sel_sub_and_body=mysql_query("SELECT * FROM `content` WHERE `id`=15");
				$rs_sub_and_body=mysql_fetch_array($sel_sub_and_body);	
				$rs_subject=stripslashes($rs_sub_and_body['heading_en']);
				
				$sel_sub_and_body_reply=mysql_query("SELECT * FROM `content` WHERE `id`=20");
				$rs_sub_and_body_reply=mysql_fetch_array($sel_sub_and_body_reply);	
				$rs_subjec_reply=stripslashes($rs_sub_and_body_reply['heading_en']);
				
				
				$sqlc= "select * from `content` where id = '21'";
				$resc = mysql_query($sqlc);
				$rowc = mysql_fetch_array($resc);
				$titlecon = $rowc['heading_en'];
					$descriptiomcon = $rowc['description_en']; 
		
         		
				
				$rs_body_reply=stripslashes($rs_sub_and_body_reply['description_en']);
				$rs_body_reply1=str_replace("{MEMBER TO}",$res2_1['name'],$rs_body_reply);
			
				$rs_body_reply2=str_replace("{COMPANY NAME}",$rs_subjec_reply,$rs_body_reply1);
				$rs_body_reply3=str_replace("{CONTACT INFO}",stripslashes($descriptiomcon),$rs_body_reply2);
				$rs_subject1=str_replace("{NAME}",$res2_1['name'],$rs_subject);
				
				 $mail_sub_auto_reply=$rs_subjec_reply;
					
				
				
				$rs_body=stripslashes($rs_sub_and_body['description_en']);
					
				$rs_body1=str_replace("{NAME}",$res2_1['name'],$rs_body);	
				$rs_body2=str_replace("{EMAIL}",$res2_1['email'],$rs_body1);
				$rs_body3=str_replace("{PHONE}",$res2_1['phone'],$rs_body2);
				$rs_body3=str_replace("{MOBILE}",$res2_1['mobile'],$rs_body2);
				$rs_body4=str_replace("{CITY}",$res2_1['city'],$rs_body3);	
				$rs_body5=str_replace("{SUBJECT}",$res2_1['subject'],$rs_body4);
				$rs_body6=str_replace("{MESSAGE}",$res2_1['message'],$rs_body5);
				$rs_body7=str_replace("{MESSAGE}",$res2_1['message'],$rs_body6);
				
				$rs_body6_auto_reply=$rs_body_reply3;
				
				$mail_to=$res_pro_1['email'];
				$mail_from=$res2_1['email'];
				
				$mail_sub=$rs_subject1;
				$mail_mesg = '';
				$mail_mesg .=$rs_body7;
				$mail_mesg .="\n";
				
				
				$mail_auto_reply .=$rs_body6_auto_reply;
			
								
				$mail_auto_reply .="\n";
				
				
														
				$headers = "MIME-Version: 1.0\n";
				$headers .= "Content-type: text/html; charset=iso-8859-1\n";
				$headers .= "From: ".$res_pro_1['uname']." <".$mail_from.">". "\r\n";
				
				$headers_auto_reply = "MIME-Version: 1.0\n";
				$headers_auto_reply .= "Content-type: text/html; charset=iso-8859-1\n";
				$headers_auto_reply .= "From: ".$res_pro_1['uname']." <".$mail_to.">". "\r\n";

			
				mail($mail_to,$mail_sub,$mail_mesg,$headers);
				
				mail($mail_from,$mail_sub_auto_reply,$mail_auto_reply,$headers_auto_reply);*/
				
				header("location:".$dir_loc."index2.php?pizza_list_id=$pizza_list_id&msg");	
								
               ?>


