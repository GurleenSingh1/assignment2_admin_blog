<?php
                    if(isset($_REQUEST['id']))
					{
					$query_sel_u="select * from `content` where `id`='$_REQUEST[id]'";
					$res_sel_u=mysql_query($query_sel_u);
					$row=mysql_num_rows($res_sel_u);
					$array_sel_u=mysql_fetch_array($res_sel_u);
					}
					?><section id="content">
	<section class="container_12 clearfix">
		<section id="main" class="grid_9 push_3">
			<article>
				<h1><?=$_REQUEST['header']?> > <?=$array_sel_u['title']?></h1>
                
               		
				<form class="uniform" id="frm" action="includes/insert_content.php<?php if(isset($_REQUEST['id'])) { ?>?id=<?=$_REQUEST['id']?> <?php } ?>" method="post"  enctype="multipart/form-data">
                
                <?php if(isset($_REQUEST['msg'])) { ?> <div class="success msg"> <?=$_REQUEST['msg']?> </div> <?php } ?> 
                
					<dl>
						
                       <!-- <dt><label ><?=$array_sel_u['title']?></label></dt>-->
					<!--	<dd><input type="text" disabled="disabled" name="title" id="title" class="big validate[required]" value="<?php if(isset($_REQUEST['id'])) { ?><?=$array_sel_u['title']?><?php } ?><?php if (isset($_REQUEST['title'])) {?><?=$_REQUEST['title']?><?php }?>" /></dd>-->

						
						<dt><label for="newscontent">Heading</label></dt>
						<dd>
						<textarea name="heading"  id="heading"class="big"  rows="5"><?php if(isset($_REQUEST['id'])) {?><?=stripslashes($array_sel_u['heading'])?><?php } ?><?php if (isset($_REQUEST['heading'])) {?><?=stripslashes($_REQUEST['heading'])?><?php }?></textarea>
						</dd>
						
						<?
						if($_REQUEST[id]=='6')
						{
						?>
						<dt><label for="newscontent">OUR ORGANIZATION(Description)</label></dt>
						<dd>
						<textarea name="description"  id="description"class="big ckeditor"  rows="15"><?php if(isset($_REQUEST['id'])) {?><?=stripslashes($array_sel_u['description'])?><?php } ?><?php if (isset($_REQUEST['description'])) {?><?=stripslashes($_REQUEST['description'])?><?php }?></textarea>
						</dd>
						
						
						<dt><label for="newscontent">CONFIDENTIALITY(Description)</label></dt>
						<dd>
						<textarea name="des2"  id="des2"class="big ckeditor"  rows="15"><?php if(isset($_REQUEST['id'])) {?><?=stripslashes($array_sel_u['des2'])?><?php } ?><?php if (isset($_REQUEST['des2'])) {?><?=stripslashes($_REQUEST['des2'])?><?php }?></textarea>
						</dd>
						
						<dt><label for="newscontent">OUR MISSION STATEMENT(Description)</label></dt>
						<dd>
						<textarea name="des3"  id="des3"class="big ckeditor"  rows="15"><?php if(isset($_REQUEST['id'])) {?><?=stripslashes($array_sel_u['des3'])?><?php } ?><?php if (isset($_REQUEST['des3'])) {?><?=stripslashes($_REQUEST['des3'])?><?php }?></textarea>
						</dd>
						
						<?
						}
						else
						{
						?>
						<dt><label for="newscontent">Description</label></dt>
						<dd>
						<textarea name="description"  id="description"class="big ckeditor"  rows="15"><?php if(isset($_REQUEST['id'])) {?><?=stripslashes($array_sel_u['description'])?><?php } ?><?php if (isset($_REQUEST['description'])) {?><?=stripslashes($_REQUEST['description'])?><?php }?></textarea>
						</dd>
						
						
						
						
						<?
						}
						?>

					
                     <!--<dt><label>Image</label></dt>
						<dd>
                        <input type="file" name="image" id="image"  <?php
										   if(isset($_REQUEST['id']))
										   {
										   ?>
										  
										   <?php
										   }
										   ?>/>&nbsp;<br />
										   <?php
										   if(isset($_REQUEST['id'])){
										   if($array_sel_u['image']!="")
										   {
										   ?>
					   <img src="../image_content/<?=$array_sel_u['image']?>" height="100px" width="100px" style="border:none" />
					   <a href="#" onclick="javascript:if(confirm('Do you want to delete?')){window.location='includes/delete_content_img.php?id=<?=$array_sel_u['id'];?>&foot_id=<?=$_REQUEST['id']?>'}"><img src="images/icons/cross.png" title="Delete" width="16" height="16" border="0" /></a>
				     					   <?php
										   }
											}
										   ?>
                                           
                      </dd>-->


					</dl>
                    
                   
                        
                        
					<p>
				
                        <input name="submit" class="button white" type="submit" value="Submit" /> 
					</p>
				</form>
			</article>
			
		</section>
		
		<aside id="sidebar" class="grid_3 pull_9">
			<div class="box search">
				<form>
					<label for="s">Search:</label>
					<input id="s" type="text" size="20" />
					<button class="button small">Go</button>
				</form>
			</div>
		</aside>
	</section>
</section>

