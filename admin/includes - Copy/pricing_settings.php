		<?php
		
		
		
	
					
					
					
function pagination_list($query,$page,$url){
		global $language_next,$language_prev,$language_last,$language_first,$language_page,$language_page_of;
		$per_page='20';
		if($page=='')
		{
			$page='1';
		}
		$row=array('num'=>$query);
    	$total = $row['num'];
        $adjacents = "2"; 

    	$page = ($page == 0 ? 1 : $page);  
    	$start = ($page - 1) * $per_page;								
		
    	$prev = $page - 1;							
    	$next = $page + 1;
        $lastpage = ceil($total/$per_page);
    	$lpm1 = $lastpage - 1;
    	
    	$pagination = "";
    	if($lastpage > 1)
    	{	
		
    		$pagination .= "<div class='pagination'>";
                    $pagination .= "<span class='details'>".$language_page." $page ".$language_page_of." $lastpage</span>"."&nbsp; &nbsp;";
				if($page > 1 ){	
					$pagination.= "<a href='{$url}page=1'>".$language_first."</a>";
					$pagination.= "<a href='{$url}page=$prev'>".$language_prev."</a>";
					}else{
					$pagination.= "<a class='current'>".$language_first."</a>";	
					$pagination.= "<a class='current' >".$language_prev."</a>";
					}
    		if ($lastpage < 7 + ($adjacents * 2))
    		{	
			
    			for ($counter = 1; $counter <= $lastpage; $counter++)
    			{
				
    				if ($counter == $page){
						
    					$pagination.= "<a class='current'>$counter</a>";
					}
    				else
					{
    					$pagination.= "<a href='{$url}page=$counter'>$counter</a>";		
					}
    			}
    		}
    		elseif($lastpage > 5 + ($adjacents * 2))
    		{
    			if($page < 1 + ($adjacents * 2))		
    			{
    				for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
    				{
    					if ($counter == $page)
    						$pagination.= "<a class='current'>$counter</a>";
    					else
    						$pagination.= "<a href='{$url}page=$counter'>$counter</a>";					
    				}
    				$pagination.= "...";
    				$pagination.= "<a href='{$url}page=$lpm1'>$lpm1</a>";
    				$pagination.= "<a href='{$url}page=$lastpage'>$lastpage</a>";		
    			}
    			elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
    			{
    				$pagination.= "<a href='{$url}page=1'>1</a>";
    				$pagination.= "<a href='{$url}page=2'>2</a>";
    				$pagination.= "...";
    				for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
    				{
    					if ($counter == $page)
    						$pagination.= "<a class='current'>$counter</a>";
    					else
    						$pagination.= "<a href='{$url}page=$counter'>$counter</a>";					
    				}
    				$pagination.= "..";
    				$pagination.= "<a href='{$url}page=$lpm1'>$lpm1</a>";
    				$pagination.= "<a href='{$url}page=$lastpage'>$lastpage</a>";		
    			}
    			else
    			{
    				$pagination.= "<a href='{$url}page=1'>1</a>";
    				$pagination.= "<a href='{$url}page=2'>2</a>";
    				$pagination.= "..";
    				for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
    				{
    					if ($counter == $page)
    						$pagination.= "<a class='current'>$counter</a>";
    					else
    						$pagination.= "<a href='{$url}page=$counter'>$counter</a>";					
    				}
    			}
    		}
    		
    		if ($page < $counter - 1){ 
    			$pagination.= "<a href='{$url}page=$next'>".$language_next."</a>";
                $pagination.= "<a href='{$url}page=$lastpage'>".$language_last."</a>";
    		}else{
    			$pagination.= "<a class='current'>".$language_next."</a>";
                $pagination.= "<a class='current'>".$language_last."</a>";
            }
    		$pagination.= "</div>\n";		
    	}
        return $pagination;
}


function get_total_faq_count()
{
	$com_total="select * from `user_quote` where `package_category_id`='$array_sel_u[id]'";
	$query_com_total=mysql_query($com_total);
	return $num_com_total=mysql_num_rows($query_com_total);
}


?>
<script type="text/javascript">
checked=false;
function checkedAll (mark) {
	var aa= document.getElementById('mark');
	 if (checked == false)
          {
           checked = true
          }
        else
          {
          checked = false
          }
	for (var i =0; i < aa.elements.length; i++) 
	{
	 aa.elements[i].checked = checked;
	}
      }
</script>

    	<section id="main" class="grid_12">
			<article>
            	<h1><?=$_REQUEST['header']?></h1>
                
                <form name="frm" id="frm" method="post" action="" enctype="multipart/form-data">
   
                 <!--<table  cellpadding="10px" width="100%" cellspacing="10px" >
                       <tr>
                    <td >
                   
                	 <input type="text" class="power-tool-keyword-input page-sprite" placeholder="#Order ID" name="order_id" id="order_id" <?
                if(trim(isset($_REQUEST['order_id']))){?>value="<?=trim($_REQUEST['order_id'])?>"<? }?> />
				
				
				<input type="text" class="power-tool-keyword-input page-sprite" placeholder="Name" name="name" id="name" <?
                if(trim(isset($_REQUEST['name']))){?>value="<?=trim($_REQUEST['name'])?>"<? }?> />
				
				<input type="text" class="power-tool-keyword-input page-sprite" placeholder="Email" name="email" id="email" <?
                if(trim(isset($_REQUEST['email']))){?>value="<?=trim($_REQUEST['email'])?>"<? }?> />
				</td>    
                       
                <td >&nbsp;<input name="search"  class="button" type="submit" value="Search"/></td>
            
                        </tr>
        			</table>-->
       			</form>
                     <?php 
					 error_reporting(E_ALL ^ E_NOTICE);
					 extract($_POST);
					$order_id=(trim($_REQUEST['order_id']));
					$name=(trim($_REQUEST['name']));
					$email=(trim($_REQUEST['email']));
					
					
					function get_default_per_page_price()
{


$totla_price_val=0.00;
$sql_ad_com_pack_default=mysql_query("select id from `package_category` where inactive='0'");
$row_ad_com_pack_default=mysql_num_rows($sql_ad_com_pack_default);
while($res_ad_com_pack_default=mysql_fetch_array($sql_ad_com_pack_default))
{


$sql_ad_com_pack_default_option=mysql_query("select `price` from `package_option` where inactive='0' and `package_category_id`='$res_ad_com_pack_default[id]' and `default_selected`='1'");
$row_ad_com_pack_default_option=mysql_num_rows($sql_ad_com_pack_default_option);
$res_ad_com_pack_default_option=mysql_fetch_array($sql_ad_com_pack_default_option);

$totla_price_val = $totla_price_val+$res_ad_com_pack_default_option[price];
}
return $totla_price_val;

}
					  ?>
					  
					  
				
				<form id="mark" name="formt" method="post" action="includes/update_default_select.php">
					<table id="table1" class="gtable" style="width:100%;">
						<thead>
							<tr>
								<th width="91">Default price per page : $<?=get_default_per_page_price()?></th>
						    </tr>
						</thead>
						<tbody>
                <?php
				$i=1;
				$rowsPerPage =20;
				$pageNum = 1;
										 $sql_ad_com_pack_default=mysql_query("select * from `package_category`");
$row_ad_com_pack_default=mysql_num_rows($sql_ad_com_pack_default);

if($row_ad_com_pack_default>0){
while($res_ad_com_pack_default=mysql_fetch_array($sql_ad_com_pack_default))
{

?>
							<tr>
								<td><strong><?=$res_ad_com_pack_default['title']?></strong><br />
								
								
								
								<div class="row" style="float:left; width:100%">
										<?php
										$sql_ad_com_pack_default_option=mysql_query("select * from `package_option` where `package_category_id`='$res_ad_com_pack_default[id]' order by `default_selected` desc, id");
$row_ad_com_pack_default_option=mysql_num_rows($sql_ad_com_pack_default_option);
while($res_ad_com_pack_default_option=mysql_fetch_array($sql_ad_com_pack_default_option))
{
										?>
										
                        <div class="col-md-6" style="float:left; width:40%; padding:5px; margin:5px; border:#CCCCCC 1px solid">
                            
                            <div id="div_p_<?=$res_ad_com_pack_default_option[id]?>" class="div_p_<?=$res_ad_com_pack_default[id]?> panel <? if($res_ad_com_pack_default_option[default_selected]=='1'){?>panel-primary<? }?> element-top-0 element-bottom-20 os-animation" data-os-animation="fadeInUp" data-os-animation-delay="0.6s">
							
							
							
                                <div class="panel-heading">
								<label>
							
							
                                    <p class="panel-title" style="font-size: 14px;font-weight: 400;"><?=$res_ad_com_pack_default_option[title]?></p> 
									
									
									 <div class="panel-body">
                                    <div class="panel-title">
                                        <p style="font-size: 14px;font-weight: 400;"><?=nl2br(stripslashes($res_ad_com_pack_default_option[des]))?></p>
                                    </div>
                                </div>
								
								<input type="hidden" name="get_price_f_<?=$res_ad_com_pack_default_option[id]?>" id="get_price_f_<?=$res_ad_com_pack_default_option[id]?>" value="<?=$res_ad_com_pack_default_option[price]?>">
								
								<input type="hidden" name="get_text_f_<?=$res_ad_com_pack_default_option[id]?>" id="get_text_f_<?=$res_ad_com_pack_default_option[id]?>" value="<?=$res_ad_com_pack_default_option[price_box_text]?>">
								
								<a href="index.php?module=edit_pricing&header=Pricing and Options Settings&id=<?=$res_ad_com_pack_default_option['id']?>" title="Edit"><img src="images/icons/edit.png"  alt="Edit" /></a> <input type="radio" name="radio_f_<?=$res_ad_com_pack_default[id]?>" <? if($res_ad_com_pack_default_option[default_selected]=='1'){?> checked="checked"<? }?> value="<?=$res_ad_com_pack_default_option[id]?>"> mark default
									
							
							</label>
									
									</div>
									
                                
                            </div>
                        </div>
						
						<?php
						}
						?>
                       
                        
                    </div>
								
								</td>
							</tr>
               <?php
				$i++; }
				?>

		    <?php }else{ ?>
 		  <tr>
        <td height="27" colspan="6" align="center" valign="middle"  class="odd"><label class="style2">No Packages are available ..! </label></td>
          </tr>
									  
			 <?php }?>
						</tbody>
					</table>
					<div class="tablefooter clearfix">
					 <div class="pagination" >
             
				
               
                    </div>
			
                    <input  type="submit" class="button" value="Update default">
						
					</div>
				</form>
                
			
		</article>
		</section>
		
	
