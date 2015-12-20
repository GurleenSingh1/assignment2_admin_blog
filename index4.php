<?php include"config.php"; ?>
<?php include"location.php";
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Incorp24.com</title>
<link rel="stylesheet" href="css/style.css" />
<link href='http://fonts.googleapis.com/css?family=Engagement' rel='stylesheet' type='text/css'>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="js/jquery.uniform.min.js" type="text/javascript" charset="utf-8"></script>
    <script type="text/javascript" charset="utf-8">
      $(function(){
        $("input:checkbox, input:radio, input:file, select").uniform();
      });
    </script>
	
</head>
<body>
<article>
<h1><img src="images/logo.png"></h1>

<form action="insert_contacts4.php?incorp_list_id=<?=$_REQUEST['incorp_list_id']?>" method="post" enctype="multipart/form-data">

<div style="padding: 5% 35% 0% 0%; font-weight:bold; font-size:20px;"><img src="images/step4.png" /></div>

<div align="center">

<h2 style="font-size:34px;">Pay $39 to start process</h2>
<img src="images/paypal.jpg" />

</div>
		
<!--You just need to verify your listing Click to generate code (Verification SMS will be sent on the Mobile Number 
		 <?php  if (isset($_REQUEST['msg'])) {echo '<script type="text/javascript">alert("Form Step 3 Is Submited Successfully please submit Step 4");</script>';} ?>
         <?php  if (isset($_REQUEST['msg1'])) {echo '<script type="text/javascript">alert("You must add a picture for your listing");</script>';} ?>-->	
         
	<ul>
		<li>
        	<label for="hide_tab"></label>
            <input  type="hidden" size="40" value="1" required id="hide_tab" name="hide_tab" />
        </li>
		
         <p>
		 <!-- onclick="window.location='insert_contacts4.php?incorp_list_id=<?=$_REQUEST['incorp_list_id']?>'-->
        <button type="submit" class="right action">Next</button>
    </p>
    <div>&nbsp;</div>
    
        
	</ul>
   
</form>
</article>
<footer>
<p>Copywright 2014 I Incorp24.com</p>
</footer>