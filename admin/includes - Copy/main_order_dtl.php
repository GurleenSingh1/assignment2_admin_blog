
		<section id="main" class="grid_12">
			<article>
				<h1><?=$_REQUEST['header']?></h1>
                
               		<?php
                    if(isset($_REQUEST['id']))
					{
					$query_sel_u="select * from `user_order` where `id`='$_REQUEST[id]'";
					$res_sel_u=mysql_query($query_sel_u);
					$row=mysql_num_rows($res_sel_u);
					$array_sel_u=mysql_fetch_array($res_sel_u);
					}
					?>
				<!--<form class="uniform" id="frm" action="includes/insert_main_order.php<?php if(isset($_REQUEST['id'])) { ?>?id=<?=$_REQUEST['id']?> <?php } ?>" method="post"  enctype="multipart/form-data">-->
				
				<form class="uniform" id="frm" method="post"  enctype="multipart/form-data">
                
                <?php if(isset($_SESSION['msg'])) { ?> <div class="success msg"> <?=$_SESSION['msg']?> </div> <?php unset($_SESSION['msg']); } ?>
				<?php if(isset($_SESSION['errormsg'])) { ?> <div class="error msg"> <?=$_SESSION['errormsg']?> </div> <?php unset($_SESSION['errormsg']); } ?> 
                
					<div class="tabcontent">
						<div id="general">
							<dl class="inline">
							<?
							if($array_sel_u[payment_status]=='1')
							{
							?>
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
							<option value="Processing" <? if($array_sel_u['status']=="Processing"){?> selected="selected"<? }?>>Status : Processing</option>
							<option value="Cancelled" <? if($array_sel_u['status']=="Cancelled"){?> selected="selected"<? }?>>Status : Cancelled</option>
							<option value="Delivered" <? if($array_sel_u['status']=="Delivered"){?> selected="selected"<? }?>>Status : Delivered</option>
                            
                        </select>
									
								</dd>
								
								<?
								}
								else
								{
								?>
								<dt><label for="tagline">Date Time</label></dt>
								<dd>
									<?=date("M d, Y, h:s a",strtotime($array_sel_u[f_date_time]))?>
									
								</dd>
								<?
								}
								?>

								<dt><label for="site_url">Translating From</label></dt>
								<dd>
									<select id="language_from" class="form-control" name="language_from" required="" style="line-height:normal">
                        <option value="">Select Language</option>
						
						<?php
						$sql_ad_com_language_dtl=mysql_query("select * from `language_all` where `inactive`='0' order by `name`");
$row_ad_com_language_dtl=mysql_num_rows($sql_ad_com_language_dtl);
while($res_ad_com_language_dtl=mysql_fetch_array($sql_ad_com_language_dtl))
{
						?>
                                                <option value="<?=$res_ad_com_language_dtl[id]?>"  <? if($array_sel_u['lang_from']==$res_ad_com_language_dtl[id]){?> selected="selected"<? }?>><?=$res_ad_com_language_dtl[name]?></option>
												<?php
												}
												?>
                                                
                                            </select>
									
								</dd>

								<dt><label for="footer_text">Translating To</label></dt>
								<dd>
									<select id="language_to" class="form-control" name="language_to" required="" style="line-height:normal" >
                        <option value="">Select Language</option>
                                                <?php
						$sql_ad_com_language_dtl=mysql_query("select * from `language_all` where `inactive`='0' order by `name`");
$row_ad_com_language_dtl=mysql_num_rows($sql_ad_com_language_dtl);
while($res_ad_com_language_dtl=mysql_fetch_array($sql_ad_com_language_dtl))
{
						?>
                                                <option value="<?=$res_ad_com_language_dtl[id]?>" <? if($array_sel_u['lang_to']==$res_ad_com_language_dtl[id]){?> selected="selected"<? }?>><?=$res_ad_com_language_dtl[name]?></option>
												<?php
												}
												?>
                                            </select>
									
								</dd>
								
								<dt><label for="site_logo">Total Page Count</label></dt>
								<dd>
									<select id="sel-total-pages" class="form-control" name="total_pages" onChange="cal_total_price_val();" required="" style="line-height:normal" >
                        <option value="">Select Total Pages</option>
						
                                                                        <?php
																		for($in_page=1;$in_page<=125;$in_page++)
																		{
																		?>
						                                                <option value="<?=$in_page?>" <? if($array_sel_u['no_of_page']==$in_page){?> selected="selected"<? }?>><?=$in_page?> page<?php if($in_page>1){?>s<?php }?></option>
                        
                                                                        <?php
																		}
																		?>
                        
                                            </select>
									
								</dd>
								
								
								<dt><label for="site_logo">Options</label></dt>
								<dd>
									<div class="row">
						 
						 <?php
						
						 
						 $sql_ad_com_pack_default=mysql_query("select * from `package_category` where inactive='0'");
$row_ad_com_pack_default=mysql_num_rows($sql_ad_com_pack_default);
while($res_ad_com_pack_default=mysql_fetch_array($sql_ad_com_pack_default))
{




						 ?>
						 <div class="col-md-12">
                                        <label for="language_from"><strong><?=$res_ad_com_pack_default[title]?><span class="pi-text-red">*</span></strong></label>
										
										
										<div class="row" style="float:left; width:100%">
										<?php
										$sql_ad_com_pack_default_option=mysql_query("select * from `package_option` where inactive='0' and `package_category_id`='$res_ad_com_pack_default[id]' order by `default_selected` desc, id");
$row_ad_com_pack_default_option=mysql_num_rows($sql_ad_com_pack_default_option);
while($res_ad_com_pack_default_option=mysql_fetch_array($sql_ad_com_pack_default_option))
{
										?>
										
                        <div class="col-md-6" style="float:left; width:40%; padding:5px; margin:5px; border:#CCCCCC 1px solid">
                            
                            <div id="div_p_<?=$res_ad_com_pack_default_option[id]?>" class="div_p_<?=$res_ad_com_pack_default[id]?> panel <? if($res_ad_com_pack_default_option[default_selected]=='1'){?>panel-primary<? }?> element-top-0 element-bottom-20 os-animation" data-os-animation="fadeInUp" data-os-animation-delay="0.6s">
							
							
							
                                <div class="panel-heading">
								<label>
							
							
                                    <p class="panel-title" style="font-size: 14px;font-weight: 400;"><input type="radio" name="radio_f_<?=$res_ad_com_pack_default[id]?>" <? if(($array_sel_u[urgency_option]==$res_ad_com_pack_default_option[id] and $res_ad_com_pack_default[id]=='1') or ($array_sel_u[delivery_option]==$res_ad_com_pack_default_option[id] and $res_ad_com_pack_default[id]=='2') or ($array_sel_u[certification_option]==$res_ad_com_pack_default_option[id] and $res_ad_com_pack_default[id]=='3')){?> checked="checked"<? }?> onClick="get_filter_price('<?=$res_ad_com_pack_default[id]?>','<?=$res_ad_com_pack_default_option[id]?>')" value="<?=$res_ad_com_pack_default_option[id]?>"> <?=$res_ad_com_pack_default_option[title]?></p> 
									
									
									 <div class="panel-body">
                                    <div class="panel-title">
                                        <p style="font-size: 14px;font-weight: 400;"><?=nl2br(stripslashes($res_ad_com_pack_default_option[des]))?></p>
                                    </div>
                                </div>
								
								<input type="hidden" name="get_price_f_<?=$res_ad_com_pack_default_option[id]?>" id="get_price_f_<?=$res_ad_com_pack_default_option[id]?>" value="<?=$res_ad_com_pack_default_option[price]?>">
								
								<input type="hidden" name="get_text_f_<?=$res_ad_com_pack_default_option[id]?>" id="get_text_f_<?=$res_ad_com_pack_default_option[id]?>" value="<?=$res_ad_com_pack_default_option[price_box_text]?>">
									
							
							</label>
									
									</div>
									
                                
                            </div>
                        </div>
						
						<?php
						}
						?>
                       
                        
                    </div>
										</div>
										
										<?php
										}
										?>
                                        
                                   </div>
								</dd>
								
								

                                <dt><label for="site_logo">Name</label></dt>
								<dd>
									<input class="form-control" id="name" name="name" placeholder="e.g. Adam Smith" type="text" value="<?=$array_sel_u[name]?>" required="">
									
								</dd>
								
								
								
                                
                                	<dt><label for="site_logo">Email address</label></dt>
								<dd>
									<input class="form-control" id="email" name="email" value="<?=$array_sel_u[email]?>" placeholder="e.g. mail@example.com" type="email" required="">
									
								</dd>
                                
                                <dt><label for="site_logo">Order Total</label></dt>
								<dd>
									$<?=$array_sel_u[total_price]?>
								</dd>
                                
								<?
							if($array_sel_u[payment_status]=='1')
							{
							?>
                                  <dt><label for="site_logo">Payment Method</label></dt>
								<dd>
									<? if($array_sel_u[payment_method]=='1'){?>Paypal<? }else{?>Credit Card<? }?>
								</dd>
								
								
								 
								
								 <dt><label for="site_logo">Transaction  ID</label></dt>
								<dd>
									<?=$array_sel_u[transaction_id]?>
								</dd>
								<?
								}
								?>
								
								<dt><label for="site_logo">Document Files</label></dt>
								<dd>
									<?php
									$k_inc=1;
									$sql_ad_com_order_dtl_all_f=mysql_query("select * from `user_files` where user_order_id='$array_sel_u[id]'" );
$row_ad_com_order_dtl_all_f=mysql_num_rows($sql_ad_com_order_dtl_all_f);
while($res_ad_com_order_dtl_all_f=mysql_fetch_array($sql_ad_com_order_dtl_all_f))
{
									?>
                                        <span style="font-weight:bold"><?=$k_inc?>.</span> &nbsp;<a href="../user_uploaded_files/<?=$res_ad_com_order_dtl_all_f[file_name]?>" target="_blank"><?=$res_ad_com_order_dtl_all_f[file_dispaly_name]?></a><br />
										<?
										$k_inc++;
										}
										?>
									
								</dd>
								
								
								
							</dl>
						</div>
						
						<div id="membership">
							
						</div>
					</div>
					<div>&nbsp;</div>
                  	<p align="center">
                    
                    
				
                       <!-- <input name="submit" class="button white" type="submit" value="Submit" /> &nbsp; <input class="button white" name="Cancel" type="reset" value="Reset"  />--> <input type="button" value="Back" class="button white" onclick="window.location='index.php?module=main_order&header=Translation Orders&ptype=<?=$_REQUEST[ptype]?>'" />
					
					</p>
				</form>
			</article>
			
		</section>








