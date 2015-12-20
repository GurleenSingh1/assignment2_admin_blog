
		<section id="main" class="grid_9 push_3">
			<article>
				<h1><?=$_REQUEST['header']?></h1>
                
               		<?php
                    if(isset($_REQUEST['testimonials_id']))
					{
					$query_sel_u="select * from `testimonials` where `testimonials_id`='$_REQUEST[testimonials_id]'";
					$res_sel_u=mysql_query($query_sel_u);
					$row=mysql_num_rows($res_sel_u);
					$array_sel_u=mysql_fetch_array($res_sel_u);
					}
					?>
				<form class="uniform" id="frm" action="includes/insert_testimonial.php<?php if(isset($_REQUEST['testimonials_id'])) { ?>?testimonials_id=<?=$_REQUEST['testimonials_id']?> <?php } ?>" method="post"  enctype="multipart/form-data">
                
                <?php if(isset($_REQUEST['msg'])) { ?> <div class="success msg"> <?=$_REQUEST['msg']?> </div> <?php } ?> 
                
					<dl>
                    
               
						<dt><label >Name</label></dt>
						<dd><input type="text" name="name" id="name" class="big validate[required]" value="<?php if(isset($_REQUEST['testimonials_id'])) { ?><?=$array_sel_u['name']?><?php } ?><?php if (isset($_REQUEST['name'])) {?><?=$_REQUEST['name']?><?php }?>" /></dd>

							<dt><label >Language</label></dt>
						<dd><input type="text" name="language" id="language" class="big validate[required]" value="<?php if(isset($_REQUEST['testimonials_id'])) { ?><?=$array_sel_u['language']?><?php } ?><?php if (isset($_REQUEST['language'])) {?><?=$_REQUEST['language']?><?php }?>" /></dd>

						
						<dt><label for="newscontent">Description</label></dt>
						<dd>
						<textarea name="description"  id="description" class="big ckeditor"  rows="15">
						<?php if(isset($_REQUEST['testimonials_id'])) {?><?=stripslashes($array_sel_u['description'])?><?php } ?><?php if (isset($_REQUEST['description'])) {?><?=stripslashes($_REQUEST['description'])?><?php }?>
                        </textarea>
						</dd>

					
                    <!-- <dt><label>Image</label></dt>
						<dd>
                        <input type="file" name="image" id="image"  <?php
										   if(isset($_REQUEST['testimonials_id']))
										   {
										   ?>
										  
										   <?php
										   }
										   ?>/>&nbsp;<br />
										   <?php
										   if(isset($_REQUEST['testimonials_id'])){
										   if($array_sel_u['image']!="")
										   {
										   ?>
					   <img src="../image_testimonial/<?=$array_sel_u['image']?>" height="100px" width="100px" style="border:none" />
					   <a href="#" onclick="javascript:if(confirm('Do you want to delete?')){window.location='includes/delete_testimonial_img.php?testimonials_id=<?=$array_sel_u['testimonials_id'];?>&foot_id=<?=$_REQUEST['testimonials_id']?>'}"><img src="images/icons/cross.png" title="Delete" width="16" height="16" border="0" /></a>
				     					   <?php
										   }
											}
										   ?>
                                           
                      </dd>-->


					</dl>
                  	<p>
                    
                    
				
                        <input name="submit" class="button white" type="submit" value="Submit" /> &nbsp; <input class="button white" name="Cancel" type="reset" value="Reset"  /> <input type="button" value="Back" class="button white" onclick="window.location='index.php?module=testimonial&header=Manage Faq'" />
					
					</p>
				</form>
			</article>
			
		</section>








