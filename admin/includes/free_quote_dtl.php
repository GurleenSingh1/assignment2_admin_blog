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
								
								
								 <dt><label for="site_logo">Address</label></dt>
								<dd>
									<input class="form-control" id="address" name="address" placeholder="Address" type="text" value="<?=$array_sel_u[last_name]?>" required="">
									
								</dd>
                                
                                 <dt><label for="site_logo">City</label></dt>
								<dd>
									<input class="form-control" id="city" name="city" placeholder="City" type="text" value="<?=$array_sel_u[city]?>" required="">
									
								</dd>
                                
                                 
                                	<dt><label for="site_logo">Email address</label></dt>
								<dd>
									<input class="form-control" id="email" name="email" value="<?=$array_sel_u[email]?>" placeholder="e.g. mail@example.com" type="text" required="">
									
								</dd>
                                
                                <dt><label for="site_logo">Telephone </label></dt>
								<dd>
									<input class="form-control" id="phone" name="phone"  value="<?=$array_sel_u[phone]?>" placeholder="e.g. +1 (410) 555-1234" type="text" required="">
									
								</dd>
                                
                                	<dt><label for="site_logo">Province</label></dt>
								<dd>
									<input class="form-control" id="province" name="province" value="<?=$array_sel_u[province]?>" placeholder="e.g. Province" type="text" required="">
									
								</dd>
                                <dt><label for="site_logo">Postal Code</label></dt>
								<dd>
									<input class="form-control" id="postal_code" name="postal_code" value="<?=$array_sel_u[postal_code]?>" placeholder="e.g. Postal Code" type="text" required="">
									
								</dd>
                                </dd>
                                <dt><label for="site_logo">Number Pizza</label></dt>
								<dd>
									<input class="form-control" id="number_pizza" name="number_pizza" value="<?=$array_sel_u[number_pizza]?>" placeholder="e.g. Numaric Number" type="number" required="">
									
								</dd>
                                <dt><label for="site_logo">Size</label></dt>
								<dd>
									<!--<input class="form-control" id="size" name="size" value="<?=$array_sel_u[size]?>" placeholder="e.g. Size" type="text" required="">-->
									<input type="radio" value="small-5"  <? if($array_sel_u['size']=='small-5' or $_REQUEST['size']=='small-5'){?> checked="checked" <? }?> name="size" />  Small &nbsp; costs $5
                                    
                                    <input type="radio" value="medium-10"  <? if($array_sel_u['size']=='medium-10' or $_REQUEST['size']=='medium-10'){?> checked="checked" <? }?> name="size" />medium  &nbsp; costs $10 <br/>
                                    <input type="radio" value="large-15"  <? if($array_sel_u['size']=='large-15' or $_REQUEST['size']=='large-15'){?> checked="checked" <? }?> name="size" />Large  &nbsp; costs $15
                                  <input type="radio" value="xlarge-20"  <? if($array_sel_u['size']=='xlarge-20' or $_REQUEST['size']=='xlarge-20'){?> checked="checked" <? }?> name="size" />X-Large  &nbsp; costs $20  
								</dd>
                                
                              
                                
                                 <dt><label for="site_logo">Crust Types</label></dt>
								<dd>
									<input type="radio" value="hand-tossed"  <? if($array_sel_u['crust_types']=='hand-tossed' or $_REQUEST['crust_types']=='hand-tossed'){?> checked="checked" <? }?> name="crust_types" />hand-tossed
									<input type="radio" value="pan"  <? if($array_sel_u['crust_types']=='pan' or $_REQUEST['crust_types']=='pan'){?> checked="checked" <? }?> name="crust_types" />pan
                                    <input type="radio" value="stuffed"  <? if($array_sel_u['crust_types']=='stuffed' or $_REQUEST['crust_types']=='stuffed'){?> checked="checked" <? }?> name="crust_types" />stuffed
                                    <input type="radio" value="thin"  <? if($array_sel_u['crust_types']=='thin' or $_REQUEST['crust_types']=='thin'){?> checked="checked" <? }?> name="crust_types" />thin
								</dd>
                                
                                  <dt><label for="toppings_code">Select Toppings category</label></dt>
								<dd>
                                <?php 
								
								$my_toopings=explode(",",$array_sel_u['toppings']);
								
								//foreach ($my_toopings as $value)
								?>
                                    
                                    <input type="checkbox" name="toppings[]" id="toppings1" value="ground beef"  <? if(in_array("ground beef", $my_toopings) or $_REQUEST['toppings']=='ground beef'){?> checked="checked" <? }?> />ground beef
                                    
                                    <input type="checkbox" value="pepporoni" id="toppings2" <? if(in_array("pepporoni", $my_toopings) or $_REQUEST['toppings']=='ground beef'){?> checked="checked" <? }?> name="toppings[]" />pepporoni
                                    
                                    <input  type="checkbox" value="cheese" id="toppings3" <? if(in_array("cheese", $my_toopings) or $_REQUEST['toppings']=='cheese'){?> checked="checked" <? }?> name="toppings[]" />cheese
                                    
                                    <input  type="checkbox" value="pineapple" id="toppings4" <? if(in_array("pineapple", $my_toopings) or $_REQUEST['toppings']=='pineapple'){?> checked="checked" <? }?> name="toppings[]" />pineapple
                                    
                                    <input  type="checkbox" value="mushrooms" id="toppings5" <? if(in_array("mushrooms", $my_toopings) or $_REQUEST['toppings']=='mushrooms'){?> checked="checked" <? }?> name="toppings[]" />mushrooms  <br/>
                                    
                                    <input  type="checkbox" value="tomatoes" id="toppings6" <? if(in_array("tomatoes", $my_toopings) or $_REQUEST['toppings']=='tomatoes'){?> checked="checked" <? }?> name="toppings[]" />tomatoes
                                    <input  type="checkbox" value="onions" id="toppings7" <? if(in_array("onions", $my_toopings) or $_REQUEST['toppings']=='onions'){?> checked="checked" <? }?> name="toppings[]" />onions
                                    <input  type="checkbox" value="jalapenos" id="toppings8" <? if(in_array("jalapenos", $my_toopings) or $_REQUEST['toppings']=='jalapenos'){?> checked="checked" <? }?> name="toppings[]" />jalapenos
                                    <input  type="checkbox" value="chicken" id="toppings9" <? if(in_array("chicken", $my_toopings) or $_REQUEST['toppings']=='chicken'){?> checked="checked" <? }?> name="toppings[]" />chicken
                                    <input  type="checkbox" value="anchovles" id="toppings10" <? if(in_array("anchovles", $my_toopings) or $_REQUEST['toppings']=='anchovles'){?> checked="checked" <? }?> name="toppings[]" />anchovles
                                    
									
								</dd>
                                
                                  <dt><label for="site_logo">Toppings Size</label></dt>
								<dd>
                                <?php
						    $user_country_query="select `toppings_code`  from `toppings` where `inactive`='0' ";
							$user_country_run=mysql_query($user_country_query);
							$user_country_count=mysql_num_rows($user_country_run); 
							?>
									<select name="toppings_code" id="toppings_code" >
                             <?php while ($user_country_array=mysql_fetch_array($user_country_run)){ ?>
                                  <option  value="<?=$user_country_array['toppings_code']?>" <?php if($array_sel_u['toppings_code']==$user_country_array['toppings_code']) { ?> selected="selected" <?php } ?> ><?= $user_country_array['toppings_code'] ?> </option>
                             <?php } ?>
                          </select>
									
								</dd>
                              	
                                 <dt><label for="site_logo">Tax</label></dt>
								<dd>
									<input type="radio" value="1"    <? if($array_sel_u['tax']=='1' or $_REQUEST['tax']=='1'){?> checked="checked" <? }?> name="tax" />Tax  &nbsp; 13%
									
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








