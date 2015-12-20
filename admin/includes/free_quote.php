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
	$com_total="select * from `pizza_list` where `date_time`!='0000-00-00 00:00:00'";
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
   
                 <table  cellpadding="10px" width="100%" cellspacing="10px" >
                       <tr>
                    <td >
                   
                	 <input type="text" class="power-tool-keyword-input page-sprite" placeholder="#Pizza List Id" name="pizza_list_id" id="pizza_list_id" <?
                if(trim(isset($_REQUEST['pizza_list_id']))){?>value="<?=trim($_REQUEST['pizza_list_id'])?>"<? }?> />
				
				
				<input type="text" class="power-tool-keyword-input page-sprite" placeholder="First Name" name="first_name" id="first_name" <?
                if(trim(isset($_REQUEST['first_name']))){?>value="<?=trim($_REQUEST['first_name'])?>"<? }?> />
				
				<input type="text" class="power-tool-keyword-input page-sprite" placeholder="Email" name="email" id="email" <?
                if(trim(isset($_REQUEST['email']))){?>value="<?=trim($_REQUEST['email'])?>"<? }?> />
				</td>    
                       
                <td >&nbsp;<input name="search"  class="button" type="submit" value="Search"/></td>
            
                        </tr>
        			</table>
       			</form>
                     <?php 
					 error_reporting(E_ALL ^ E_NOTICE);
					 extract($_POST);
					$order_id=(trim($_REQUEST['pizza_list_id']));
					$name=(trim($_REQUEST['first_name']));
					$email=(trim($_REQUEST['email']));
					  ?>
				
				<form id="mark" name="formt" method="post" action="includes/delete_multiple_free_quote.php">
					<table id="table1" class="gtable" style="width:100%;">
						<thead>
							<tr>
								<th width="28"><input type="checkbox" class="checkall" onclick='checkedAll(mark);'/></th>
                                <th width="91">
                                
                             
										
 										#Pizza List ID                                        </th>
								
								<th width="229">
                             
										
										First Name                                        </th>
                    	<th width="171">Email</th>
								<th width="170">Status</th>
								<th width="157">Date Time</th>
                                <th width="95">Action</th>
							</tr>
						</thead>
						<tbody>
                <?php
				$i=1;
				$rowsPerPage =20;
				$pageNum = 1;
				if(isset($_GET['page']))
				{
				$pageNum = $_GET['page'];
				}
				$offset = ($pageNum - 1) * $rowsPerPage;
				
				 $query_sel_u="select * from `pizza_list` where ";
				
				
				if($name!=='')
				{
				$query_sel_u.=" `first_name` like '%$first_name%' AND ";
				}
				
				if($email!=='')
				{
				$query_sel_u.=" `email` like '%$email%' AND ";
				}
				
				$query_sel_u.="pizza_list_id!='' and `date_time`!='0000-00-00 00:00:00'";
						
				$query_sel_u.=" order by `pizza_list_id` desc";
						
				
				$com_total=$query_sel_u;
										
				
				$query_sel_u.=" LIMIT $offset, $rowsPerPage";
				
				
				
				$res_sel_u=mysql_query($query_sel_u);
				$row=mysql_num_rows($res_sel_u);
				if($row>0){
				while($array_sel_u=mysql_fetch_array($res_sel_u)){
				



				?>
							<tr>
								<td><input type="checkbox" name="mark[]" id="mark<?=$array_sel_u['pizza_list_id']?>" value="<?=$array_sel_u['id']?>" /></td>
								<td><?=$array_sel_u['pizza_list_id']?></td>
								
								<td><?=$array_sel_u['first_name']?>&nbsp;<?=$array_sel_u['last_name']?></td>
                               
                            
                                <td> <?=$array_sel_u['email']?></td>
                                
                               
                                <td><? if($array_sel_u['status']=="Requested"){?>Pending<? }else{?><?=$array_sel_u['status']?><? }?></td>
                                <td>
								<?php
                                $add_date=substr($array_sel_u['date_time'],0,10);
                                $day_add=explode("-",$add_date);
                                echo date("d-M-Y", mktime(0,0,0,$day_add[1],$day_add[2],$day_add[0]));
                                ?>
                                <?php
                                echo $add_date1=substr($array_sel_u['date_time'],11);
                                ?>                                </td>
								<td>
								
                              
                                
								<!--<a href="#" title="inactive"><img  src="images/icons/active_on.gif" alt="Move" title="Move" /></a>-->
								<a href="index.php?module=free_quote_dtl&header=Free Quote Orders Details&pizza_list_id=<?=$array_sel_u['pizza_list_id']?>" title="Details"><img src="images/icons/edit.png"  alt="Details" /></a>
								<a href="#" onclick="javascript:if(confirm('Do you want to delete?')) {window.location='includes/delete_free_quote.php?pizza_list_id=<?=$array_sel_u['pizza_list_id'];?>'}" title="Delete"><img src="images/icons/cross.png"  alt="Delete" /></a>                               </td>
							</tr>
               <?php
				$i++; }
				?>

		    <?php }else{ ?>
 		  <tr>
        <td height="27" colspan="13" align="center" valign="middle"  class="odd"><label class="style2">No orders are available ..! </label></td>
          </tr>
									  
			 <?php }?>
						</tbody>
					</table>
					<div class="tablefooter clearfix">
					 <div class="pagination" >
             
				<?php $query_com_total=mysql_query($com_total);
	 $num_com_total=mysql_num_rows($query_com_total);
	$total_search_count=num_com_total;  ?>
				<?= pagination_list($total_search_count,$_REQUEST['page'],$dir_loc."index.php?module=".$_REQUEST[module]."&&header=".$_REQUEST[header]."&order_id=".$_REQUEST[order_id]."&name=".$_REQUEST[name]."&email=".$_REQUEST[email]."&"); ?>
               
                    </div>
			
                    <div class="actions">
                       <!-- <select name="action_type">
                            <option value="">Action:</option>
                            <option value="del">Delete</option>
							<option value="Requested">Status : Pending</option>
							<option value="Processing">Status : Processing</option>
							<option value="Cancelled">Status : Cancelled</option>
							<option value="Delivered">Status : Delivered</option>
                            
                        </select>-->
                  
						
						<input  type="submit" class="button" value="Apply">
						
                    </div>
						
					</div>
				</form>
                
			
		</article>
		</section>
		
	
