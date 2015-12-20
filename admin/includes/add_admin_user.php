	<?php
	  
		$query_up_mem="select * from `users` where id='$_SESSION[admin_user_id]'";
		$res_up_mem=mysql_query($query_up_mem);
		$array_up_mem=mysql_fetch_array($res_up_mem);
	?>
		<section id="main" class="grid_9">
			<article id="settings">
				<h1>Settings</h1>
				<form name="frm" id="frm" method="post" action="includes/add_user_process.php" enctype="multipart/form-data">
					
					<div class="tabcontent">
						<div id="general">
							<dl class="inline">
								<dt><label for="site_title">User Name</label></dt>
								<dd>
								 <input type="text" required="required" value="<?=$array_up_mem['uname'];?>" class="validate[required] medium" name="f_name" id="f_name" > 
									
									<small>Your Admin Login User Name</small>
								</dd>

								<dt><label for="tagline">Password</label></dt>
								<dd>
									<input type="password" required="required" name="password" id="password" class="medium" value="<?=$array_up_mem['pass'];?>">
									<small>Your Admin Login Password.</small>
								</dd>
								
								<dt><label for="site_url">Company Name</label></dt>
								<dd>
									<input type="text" name="company_name" id="company_name" class="medium" value="<?=$array_up_mem['company_name'];?>" required="required">
									
								</dd>

								<dt><label for="site_url">First Name</label></dt>
								<dd>
									<input type="text" name="fname" id="fname" class="medium" value="<?=$array_up_mem['fname'];?>" required="required">
									<small>First Name of Administrator</small>
								</dd>

								<dt><label for="footer_text">Last Name</label></dt>
								<dd>
									<input type="text" required="required" name="lname" id="lname" class="validate[required] medium" value="<?=$array_up_mem['lname'];?>">
									<small>Last Name of Administrator</small>
								</dd>

                                <dt><label for="site_logo">E-mail Address</label></dt>
								<dd>
									<input type="text" required="required" name="email" id="email" class="medium"  value="<?=$array_up_mem['email'];?>">
									<small>This address is used for admin purposes, like new user notification</small>
								</dd>
								
								
                                
							</dl>
						</div>
						
						<div id="membership">
							
						</div>
					</div>
					<div class="buttons">
						<button type="submit" class="button">Save Settings</button>
						<button type="button" class="button white">Cancel</button>
					</div>
				</form>
			</article>
		</section>

	
	