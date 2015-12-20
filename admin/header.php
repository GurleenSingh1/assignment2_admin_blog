<header id="top">

	<div class="container_12 clearfix">

		<div id="logo" class="grid_5">

			<!-- replace with your website title or logo -->

			<a id="site-title" href="index.php?module=welcome&amp;&amp;header=Welcome To Admin Panel" ><span>Admin</span></a>

			<a id="view-site" href="../index.php" target="_blank">View Site</a>

		</div>



		<div class="grid_4" id="colorstyle">

		

			<div>Change Color </div>

			<a href="#" onClick="colorstyle('default'); return false;" rel="gray"></a>

			<a href="#" onClick="colorstyle('alternate 1'); return false;" rel="green"></a>

			<a href="#" onClick="colorstyle('alternate 2'); return false;" rel="red"></a>

			<a href="#" onClick="colorstyle('alternate 3'); return false;" rel="purple"></a>

			<a href="#" onClick="colorstyle('alternate 4'); return false;" rel="orange"></a>

			<a href="#" onClick="colorstyle('alternate 5'); return false;" rel="yellow"></a>

			<a href="#" onClick="colorstyle('alternate 6'); return false;" rel="black"></a>

			<a href="#" onClick="colorstyle('alternate 7'); return false;" rel="blue"></a>

			

			

		</div>



		<div id="userinfo" class="grid_3_head">

		<?php echo date("l F d, Y");?> &nbsp;&nbsp;&nbsp;

		<?php 

		 $sql_ad=mysql_query("select * from `users` where id='$_SESSION[admin_user_id]'");

$res_ad=mysql_fetch_array($sql_ad);



		?>

		Welcome, <a href="#"><?php echo $res_ad['fname']." ".$res_ad['lname']; ?></a>

		</div>

	</div>

</header>



<nav id="topmenu">

	<div class="container_12 clearfix">

		<div class="grid_12">

			<ul id="mainmenu" class="sf-menu">

				<li class="current"><a href="index.php?module=welcome&amp;&amp;header=Welcome To Admin Panel" >Dashboard</a></li>

				

				<li><a href="index.php?module=free_quote&header=Free Quote Orders" >Free Quote Orders</a></li>

				

				<!--<li><a href="index.php?module=main_order&header=Translation Orders&ptype=1" >Orders</a>
				<ul>
						<li><a href="index.php?module=main_order&header=Translation Leads&ptype=0" >Leads</a>
						</li>
						
						
						
						<li><a href="index.php?module=contact_us&&header=Contact%20Us&&id=1" >Contacts</a>
						</li>
						</ul>
						</li>-->

                

            

				<li><a href="index.php?module=add_admin_user&header=Admin Account Settings" >Settings</a></li>

			</ul>

           

			<ul id="usermenu">

				<!--<li><a href="#" class="inbox">Inbox (3)</a></li>-->

				<li><a href="index.php?module=logout">Logout</a></li>

			</ul>

		</div>

	</div>

</nav>



<section id="content">

	<section class="container_12 clearfix">