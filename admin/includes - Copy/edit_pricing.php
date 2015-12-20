<?php
                    if(isset($_REQUEST['id']))
					{
					$query_sel_u="select * from `package_option` where `id`='$_REQUEST[id]'";
					$res_sel_u=mysql_query($query_sel_u);
					$row=mysql_num_rows($res_sel_u);
					$array_sel_u=mysql_fetch_array($res_sel_u);
					
					
					
					$sql_ad_com_pack_default=mysql_query("select * from `package_category` where `id`='$array_sel_u[package_category_id]'");
$row_ad_com_pack_default=mysql_num_rows($sql_ad_com_pack_default);


$res_ad_com_pack_default=mysql_fetch_array($sql_ad_com_pack_default);
					}
					?>
		<section id="main" class="grid_12">
			<article>
				<h1><?=$_REQUEST['header']?> > <?=$res_ad_com_pack_default[title]?> > <?=$array_sel_u[title]?></h1>
                
               		
				<form class="uniform" id="frm" action="includes/update_pricing.php<?php if(isset($_REQUEST['id'])) { ?>?id=<?=$_REQUEST['id']?> <?php } ?>" method="post"  enctype="multipart/form-data">
				
				
                
                <?php if(isset($_SESSION['msg'])) { ?> <div class="success msg"> <?=$_SESSION['msg']?> </div> <?php unset($_SESSION['msg']); } ?>
				<?php if(isset($_SESSION['errormsg'])) { ?> <div class="error msg"> <?=$_SESSION['errormsg']?> </div> <?php unset($_SESSION['errormsg']); } ?> 
                
					<div class="tabcontent">
						<div id="general">
							<dl class="inline">
								<dt><label for="site_title">Title</label></dt>
								<dd>
								 <input class="form-control" id="title" name="title" type="text"  style="width:300px" value="<?=$array_sel_u[title]?>" required="">
									
									
								</dd>

								<dt><label for="tagline">Description</label></dt>
								<dd>
									<textarea id="des" name="des" cols='30' rows="6" required=""><?=stripslashes($array_sel_u[des])?></textarea>
									
								</dd>
								
								<dt><label for="site_url">Price($)</label></dt>
								<dd>
									<input class="form-control" id="price" name="price" type="text" value="<?=$array_sel_u[price]?>" > <?
								if($array_sel_u[package_category_id]=='1')
								{
								?>
								Per page
								<?
								}
								?>
									
								</dd>
								<?
								if($array_sel_u[package_category_id]!='1')
								{
								?>

								<dt><label for="site_url">Price box text(on select)</label></dt>
								<dd>
									 <input class="form-control" id="price_box_text" name="price_box_text" type="text" style="width:300px" value="<?=$array_sel_u[price_box_text]?>">
									
								</dd>
								<?
								}
								?>

								
								
								
								
							</dl>
						</div>
						
						<div id="membership">
							
						</div>
					</div>
					<div>&nbsp;</div>
                  	<p align="center">
                    
                    
				
                        <input name="submit" class="button white" type="submit" value="Submit" /> &nbsp; <!--<input class="button white" name="Cancel" type="reset" value="Reset"  /> --><input type="button" value="Back" class="button white" onclick="window.location='index.php?module=pricing_settings&&header=Pricing and Options Settings'" />
					
					</p>
				</form>
			</article>
			
		</section>








