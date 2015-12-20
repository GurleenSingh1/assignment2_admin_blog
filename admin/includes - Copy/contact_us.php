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


function get_total_testimonial_count()
{
	$com_total="select * from `contact_us`";
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

    	<section id="main" class="grid_9 push_3">
			<article>
            	<h1><?=$_REQUEST['header']?></h1>
                
                <form name="frm" id="frm" method="post" action="" enctype="multipart/form-data">
   
                 <table  cellpadding="10px" width="100%" cellspacing="10px" >
                       <tr>
                    <td >
                   
                	 <input type="text" class="power-tool-keyword-input page-sprite" placeholder="Name" name="name" id="name" <?
                if(trim(isset($_REQUEST['name']))){?>value="<?=trim($_REQUEST['name'])?>"<? }?> /></td>    
                       
                <td >&nbsp;<input name="search"  class="button" type="submit" value="Search"/></td>
            
                        </tr>
        			</table>
       			</form>
                     <?php 
					 error_reporting(E_ALL ^ E_NOTICE);
					 extract($_POST);
					$name=(trim($_REQUEST['name']));
					  ?>
				
				<form id="mark" name="formt" method="post" action="includes/delete_multiple_contact_us.php?page=<?php if($_REQUEST['page']=="") {?>1<?php  } else { ?><?=$_REQUEST['page']?><?php } ?>&header=<?=$_REQUEST[header]?>">
					<table id="table1" class="gtable">
						<thead>
							<tr>
								<th width="20"><input type="checkbox" class="checkall" onclick='checkedAll(mark);'/></th>
                                <th width="39">
                                <a href="index.php?module=testimonial&&header=<?=$_REQUEST[header]?>&<? if($_REQUEST['id']=="" or $_REQUEST['id']==2){?>id=1<? }?><? if($_REQUEST['id']==1){?>id=2<? }?>" class="column_heading">
                             
										
										ID <? if(isset($_REQUEST['id'])){?>&nbsp;&nbsp;<? if($_REQUEST['id']=="1"){?><img src="images/open_top_game_black.png" style="border:none; width:9px" /><? }?><? if($_REQUEST['id']=="2"){?><img src="images/open_top_game_black.png" style="border:none; width:9px" /><? }?><? }?></a>
                                        </th>
								<th width="103"><a href="index.php?module=testimonial&&header=<?=$_REQUEST[header]?>&<? if($_REQUEST['user_sort']=="" or $_REQUEST['user_sort']==2){?>user_sort=1<? }?><? if($_REQUEST['user_sort']==1){?>user_sort=2<? }?>" class="column_heading">
                             
										
										Name <? if( isset($_REQUEST['id']) ){?>&nbsp;&nbsp;<? if($_REQUEST[user_sort]=="1"){?><img src="images/open_top_game_black.png" style="border:none; width:9px" /><? }?><? if($_REQUEST[user_sort]=="2"){?><img src="images/open_top_game_black.png" style="border:none; width:9px" /><? }?><? }?></a>
                                        
                                        </th>
                                        
                                      <th width="140"><a href="index.php?module=testimonial&&header=<?=$_REQUEST[header]?>&<? if($_REQUEST['user_sort']=="" or $_REQUEST['user_sort']==2){?>user_sort=1<? }?><? if($_REQUEST['user_sort']==1){?>user_sort=2<? }?>" class="column_heading">
                             
										
										Email <? if( isset($_REQUEST['id']) ){?>&nbsp;&nbsp;<? if($_REQUEST[user_sort]=="1"){?><img src="images/open_top_game_black.png" style="border:none; width:9px" /><? }?><? if($_REQUEST[user_sort]=="2"){?><img src="images/open_top_game_black.png" style="border:none; width:9px" /><? }?><? }?></a>
                                        
                                        </th>
                                          
                              <th width="95">Phone</th> 
                    	
								<th width="115">Date Time</th>
                                <th width="64">Action</th>
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
				
				 $query_sel_u="select * from `contact_us` where ";
				
				if($name!=='')
				{
				$query_sel_u.=" `name` like '%$name%' AND ";
				}
				
				$query_sel_u.="id!=''";
				
				if(isset($_REQUEST['id']))
				{
						if($_REQUEST['id']==1)
						{
						$query_sel_u.=" order by `id` desc";
						}
						else
						{
						$query_sel_u.=" order by `id` asc";
						}
				
				}
						$_REQUEST['user_sort']='';
						if($_REQUEST['user_sort']!="")
				{
						if($_REQUEST['user_sort']==1)
						{
						$query_sel_u.=" order by `name` asc";
						}
						else
						{
						$query_sel_u.=" order by `name` desc";
						}
				
				}
				
				
				if($_REQUEST['user_sort']="" && $_REQUEST['id']="")
				{
						
						$query_sel_u.=" order by `id` asc";
						
				
				}
										
				
				$query_sel_u.=" LIMIT $offset, $rowsPerPage";
				
				
				
				$res_sel_u=mysql_query($query_sel_u);
				$row=mysql_num_rows($res_sel_u);
				if($row>0){
				while($array_sel_u=mysql_fetch_array($res_sel_u)){
				?>
							<tr>
								<td><input type="checkbox" name="mark[]" id="mark<?=$array_sel_u['id']?>" value="<?=$array_sel_u['id']?>" /></td>
								<td><?=$array_sel_u['id']?></td>
								<td><?=$array_sel_u['name']?></td>
                                
                             <td><?=$array_sel_u['email']?></td>
                             <td><?=$array_sel_u['phone']?></td>
                         
                             
                             
                               
                                <td>
								<?php
                                $add_date=substr($array_sel_u['date_time'],0,10);
                                $day_add=explode("-",$add_date);
                                echo date("d-M-Y", mktime(0,0,0,$day_add[1],$day_add[2],$day_add[0]));
                                ?>
                                <?php
                                echo $add_date1=substr($array_sel_u['date_time'],11);
                                ?>								
                                </td>
								<td>
								
								<a href="#" onclick="javascript:if(confirm('Do you want to delete?')) {window.location='includes/delete_contact_us.php?id=<?=$array_sel_u['id'];?>'}" title="Delete"><img src="images/icons/cross.png"  alt="Delete" /></a>
                               </td>
							</tr>
               <?php
				$i++; }
				?>

		    <?php }else{ ?>
 		  <tr>
        <td height="27" colspan="11" align="center" valign="middle"  class="odd"><label class="style2">No Area are available <?php if($_REQUEST['page']!="1") {?>in Page No <?=$_REQUEST['page'] ?> <?php  }?>..! </label></td>
          </tr>
									  
			 <?php }?>
                
                
						</tbody>
					</table>
					<div class="tablefooter clearfix">
					 <div class="pagination" >
             
				<?php $total_search_count=get_total_testimonial_count();  ?>
				<?= pagination_list($total_search_count,$_REQUEST['page'],$dir_loc."index.php?module=testimonial&&header=Manage Award List&"); ?>
               
                    </div>
			
                    <div class="actions">
                        <select>
                            <option>Delete</option>
                        </select>
						
						<input  type="submit" class="button" value="Apply">
						
                    </div>
						
					</div>
				</form>
                
			
		</article>
		</section>
		
	
