
		<section id="main" class="grid_12">
			<article>
				<h1><?=$_REQUEST['header']?></h1>
                
               		<?php
                    if(isset($_REQUEST['pizza_list_id']))
					{
					$query_sel_u="select * from `pizza_list` where `pizza_list_id`='$_REQUEST[pizza_list_id]'";
					$res_sel_u=mysql_query($query_sel_u);
					$row=mysql_num_rows($res_sel_u);
					$array_sel_u=mysql_fetch_array($res_sel_u);
					}
					?>
				
				
				<form class="uniform" id="frm" method="post" action="includes/insert_free_quote.php<?php if(isset($_REQUEST['pizza_list_id'])) { ?>?pizza_list_id=<?=$_REQUEST['pizza_list_id']?> <?php } ?>"  enctype="multipart/form-data">
                
                <?php if(isset($_SESSION['msg'])) { ?> <div class="success msg"> <?=$_SESSION['msg']?> </div> <?php unset($_SESSION['msg']); } ?>
				<?php if(isset($_SESSION['errormsg'])) { ?> <div class="error msg"> <?=$_SESSION['errormsg']?> </div> <?php unset($_SESSION['errormsg']); } ?> 
                
					<div class="tabcontent">
						<div id="general">
							<dl class="inline">
								<dt><label for="site_title">Quote Number#</label></dt>
								<dd>
								 <?=$array_sel_u[order_no]?> 
									
									
								</dd>

								<dt><label for="tagline">Received On</label></dt>
								<dd>
									<?=date("M d, Y, h:s a",strtotime($array_sel_u[date_time]))?>
									
								</dd>
								
								<dt><label for="site_url">Status</label></dt>
								<dd>
									<select name="status_type" id="status_type">
                            
							<option value="Requested" <? if($array_sel_u['status']=="Requested"){?> selected="selected"<? }?>>Status : Pending</option>
							<!--<option value="Processing" <? if($array_sel_u['status']=="Processing"){?> selected="selected"<? }?>>Status : Processing</option>
							<option value="Cancelled" <? if($array_sel_u['status']=="Cancelled"){?> selected="selected"<? }?>>Status : Cancelled</option>-->
							<option value="Delivered" <? if($array_sel_u['status']=="Delivered"){?> selected="selected"<? }?>>Status : Delivered</option>
                            
                        </select>
									
								</dd>

						
								

                                <dt><label for="site_logo">First Name</label></dt>
								<dd>
									<input class="form-control" id="first_name" name="first_name" placeholder="First Name" type="text" value="<?=$array_sel_u[first_name]?>" required="">
									
								</dd>
                                
                                <dt><label for="site_logo">Last Name</label></dt>
								<dd>
									<input class="form-control" id="last_name" name="last_name" placeholder="Last Name" type="text" value="<?=$array_sel_u[last_name]?>" required="">
									
								</dd>
								
								
								
                                
                                	<dt><label for="site_logo">Email address</label></dt>
								<dd>
									<input class="form-control" id="email" name="email" value="<?=$array_sel_u[email]?>" placeholder="e.g. mail@example.com" type="email" required="">
									
								</dd>
                                
                                <dt><label for="site_logo">Telephone </label></dt>
								<dd>
									<input class="form-control" id="phone" name="phone"  value="<?=$array_sel_u[phone]?>" placeholder="e.g. +1 (410) 555-1234" type="text" required="">
									
								</dd>
                                
                                 
								
								
								
								
								
								
							</dl>
						</div>
						
						<div id="membership">
							
						</div>
					</div>
					<div>&nbsp;</div>
                  	<p align="center">
                    
                    
				
                        <input name="submit" class="button white" type="submit" value="Submit" /> &nbsp; <input class="button white" name="Cancel" type="reset" value="Reset"  /> <input type="button" value="Back" class="button white" onclick="window.location='index.php?module=free_quote&header=Free Quote Orders'" />
					
					</p>
				</form>
			</article>
			
		</section>








