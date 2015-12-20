		<section id="main" class="grid_9 push_3">
			<article>
				<h1><?=$_REQUEST['headerf']?></h1>
                
               		<?php
                    if(isset($_REQUEST['faq_id']))
					{
					$query_sel_u="select * from `faq` where `faq_id`='$_REQUEST[faq_id]'";
					$res_sel_u=mysql_query($query_sel_u);
					$row=mysql_num_rows($res_sel_u);
					$array_sel_u=mysql_fetch_array($res_sel_u);
					}
					?>
				<form class="uniform" id="frm" action="includes/insert_faq.php<?php if(isset($_REQUEST['faq_id'])) { ?>?faq_id=<?=$_REQUEST['faq_id']?> <?php } ?>" method="post"  enctype="multipart/form-data">
                
                <?php if(isset($_REQUEST['msg'])) { ?> <div class="success msg"> <?=$_REQUEST['msg']?> </div> <?php } ?> 
                
					<dl>
                    
                    <dt><label >FAQ Category</label></dt>
						<dd>
                      		<select name="faq_category_id" id="faq_category_id" class="validate[required]" >
										   <option value="">--Select--</option>
										   <?
										   $sql_s="select * from `faq_category` where inactive='0'";
										   $query_s=mysql_query($sql_s);
										   while($res_s=mysql_fetch_array($query_s))
										   {
										   ?>
										   <option value="<?=$res_s[faq_category_id]?>" <?
										   if($array_sel_u[faq_category_id]==$res_s[faq_category_id] or $_REQUEST[faq_category_id]==$res_s[faq_category_id])
										   {
										   ?>
										   selected="selected"
										   <?
										   }
										   ?>
										   ><?=$res_s[name]?></option>
										   <?
										   }
										   ?>
										   </select>
                          
						</dd>
                        
						<dt><label >Title</label></dt>
						<dd><input type="text" name="title" id="title" class="big validate[required]" value="<?php if(isset($_REQUEST['faq_id'])) { ?><?=$array_sel_u['title']?><?php } ?><?php if (isset($_REQUEST['title'])) {?><?=$_REQUEST['title']?><?php }?>" /></dd>

						
						<dt><label for="newscontent">Description</label></dt>
						<dd>
						<textarea name="description"  id="description" class="big ckeditor"  rows="15">
						<?php if(isset($_REQUEST['faq_id'])) {?><?=stripslashes($array_sel_u['description'])?><?php } ?><?php if (isset($_REQUEST['description'])) {?><?=stripslashes($_REQUEST['description'])?><?php }?>
                        </textarea>
						</dd>


					
                    <!-- <dt><label>Image</label></dt>
						<dd>
                        <input type="file" name="image" id="image"  <?php
										   if(isset($_REQUEST['faq_id']))
										   {
										   ?>
										  
										   <?php
										   }
										   ?>/>&nbsp;<br />
										   <?php
										   if(isset($_REQUEST['faq_id'])){
										   if($array_sel_u['image']!="")
										   {
										   ?>
					   <img src="../image_faq/<?=$array_sel_u['image']?>" height="100px" width="100px" style="border:none" />
					   <a href="#" onclick="javascript:if(confirm('Do you want to delete?')){window.location='includes/delete_faq_img.php?faq_id=<?=$array_sel_u['faq_id'];?>&foot_id=<?=$_REQUEST['faq_id']?>'}"><img src="images/icons/cross.png" title="Delete" width="16" height="16" border="0" /></a>
				     					   <?php
										   }
											}
										   ?>
                                           
                      </dd>-->


					</dl>
                  	<p>
                    
                    
				
                        <input name="submit" class="button white" type="submit" value="Submit" /> &nbsp; <input class="button white" name="Cancel" type="reset" value="Reset"  /> <input type="button" value="Back" class="button white" onclick="window.location='index.php?module=faq&header=Manage Faq'" />
					
					</p>
				</form>
			</article>
			
		</section>








