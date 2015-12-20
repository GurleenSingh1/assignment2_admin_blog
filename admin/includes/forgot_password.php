<!DOCTYPE HTML>
<html lang="en">
<head>
<title>Admin Login</title>
<meta charset="utf-8">
<script type="text/javascript">
function reloadCaptcha(a)
	{
	//alert(a);
		document.getElementById(a).src = document.getElementById(a).src+"&"+Math.random();
	}
</script>

</head>
<body>



<header id="top">
	<div class="container_12 clearfix">
		<div id="logo" class="grid_12">
			<a id="site-title" href="index.php" ><span>Admin</span></a>
			<a id="view-site" target="_blank" href="../index.php">View Site</a>
		</div>
	</div>
</header>

<div id="login" class="box">
	<h2>Login</h2>
	<section>
		<!--<div class="error msg">Message if login failed</div>-->
		<?php 
		if(isset($msg))
		{
		echo '<div class="error msg">'.$msg.'</div>';
		}?>
		<form name="loginform" method="post" action="index.php?module=forgot_password">
        <input type="hidden" name="mode" value="forget">
        <!--
		<input type="hidden" name="module" value="login">
		<input type="hidden" name="action" value="login">
       --> 
			<dl>
				<dt><label  for="txt_username">Insert Your Registered Mail Id :</label></dt>
				<dd><input  class="medium"  name="email" id="email" type="text" /></dd>
		
			
			</dl>
		
			<p>
				<button type="submit" class="button" id="loginbtn">LOGIN</button>
				<a id="forgot" href="index.php?module=login">Remamber Password?</a>
			</p>
		</form>
	</section>
</div>

</body>
</html>