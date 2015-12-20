<section id="main" class="grid_9 push_3">
			<article id="dashboard">
            
    <?php
	$sql_mod=mysql_query("select * from `dt_module` where user_id='$_SESSION[admin_user_id]'");
	$res_mod=mysql_fetch_array($sql_mod);

	  $j=0;
	  $sql_welcome=mysql_query("select * from `dt_welcome` order by `id`");
	  while($res_welcome=mysql_fetch_array($sql_welcome))
	  { 
	  $get_val=$res_welcome['chk_value'];
		if($res_mod[$get_val]=='1')
		{
	 $mod[$j]=$res_welcome['id'];
		$j++;
		}
	  }
	   
  //$num_welcome=mysql_num_rows($sql_welcome);
   
	$num_row=ceil(count($mod)/5);

 // print_r($mod);
 
  $k='0';
  for($i=1;$i<$num_row;$i++)
  {
  ?>
	<?php
 	$id=@$mod[$k];
	$k++;

	$dt_welcome_show="select * from `dt_welcome` where id='$id'";
    $sql_wel=mysql_query($dt_welcome_show);
	$res_wel=mysql_fetch_array($sql_wel);
	$get_val=$res_wel['chk_value'];
	?>
    
  		
            	<h2>Quick Links</h2>
				<section class="icons">
					<ul>
    <?php
		if($res_wel['id']!='')
	{
	?>
						<li>
							<a href="<?=$res_wel['url']?>">
								<img src="images/eleganticons/<?=$res_wel['icon']?>" />
								<span><?=$res_wel['title']?></span>
							</a>
						</li>
   	<?php
	}
	?> 
    
    <?php
    $id=@$mod[$k];
	$k++;
	
    $sql_wel=mysql_query("select * from dt_welcome where id='$id'");
	$res_wel=mysql_fetch_array($sql_wel);
	$get_val=$res_wel['chk_value'];
	if($res_wel['id']!='')
	{
	?>           
           
						<li>
							<a href="<?=$res_wel['url']?>">
								<img src="images/eleganticons/<?=$res_wel['icon']?>" />
								<span><?=$res_wel['title']?></span>
							</a>
						</li>
     <?php
	}
	 ?>  
      <?php
    $id=@$mod[$k];
	$k++;
	
    $sql_wel=mysql_query("select * from dt_welcome where id='$id'");
	$res_wel=mysql_fetch_array($sql_wel);
	$get_val=$res_wel['chk_value'];
	if($res_wel['id']!='')
	{
	?>                 
						<li>
							<a href="<?=$res_wel['url']?>">
								<img src="images/eleganticons/<?=$res_wel['icon']?>"  />
								<span><?=$res_wel['title']?></span>
							</a>
						</li>
     <?php
 	 }
	 ?>  
       <?php
    $id=@$mod[$k];
	$k++;
	
    $sql_wel=mysql_query("select * from dt_welcome where id='$id'");
	$res_wel=mysql_fetch_array($sql_wel);
	$get_val=$res_wel['chk_value'];
	if($res_wel['id']!='')
	{
	?>                    
						<li>
							<a href="<?=$res_wel['url']?>">
								<img src="images/eleganticons/<?=$res_wel['icon']?>"  />
								<span><?=$res_wel['title']?></span>
							</a>
						</li>
    <?php
	}
	?>    
      <?php
    $id=@$mod[$k];
	$k++;
	
    $sql_wel=mysql_query("select * from dt_welcome where id='$id'");
	$res_wel=mysql_fetch_array($sql_wel);
	$get_val=$res_wel['chk_value'];
	if($res_wel['id']!='')
	{
	?>                  
						<li>
							<a href="<?=$res_wel['url']?>">
								<img src="images/eleganticons/<?=$res_wel['icon']?>"  />
								<span><?=$res_wel['title']?></span>
							</a>
						</li>
    <?php
	}
	?>  
    <?php
    $id=@$mod[$k];
	$k++;
	
    $sql_wel=mysql_query("select * from dt_welcome where id='$id'");
	$res_wel=mysql_fetch_array($sql_wel);
	$get_val=$res_wel['chk_value'];
	if($res_wel['id']!='')
	{
	?>                  
						<li>
							<a href="<?=$res_wel['url']?>">
								<img src="images/eleganticons/<?=$res_wel['icon']?>"  />
								<span><?=$res_wel['title']?></span>
							</a>
						</li>
    <?php
	}
	?>  
     <?php
    $id=@$mod[$k];
	$k++;
	
    $sql_wel=mysql_query("select * from dt_welcome where id='$id'");
	$res_wel=mysql_fetch_array($sql_wel);
	$get_val=$res_wel['chk_value'];
	if($res_wel['id']!='')
	{
	?>                    
						<li>
							<a href="<?=$res_wel['url']?>">
								<img src="images/eleganticons/<?=$res_wel['icon']?>"  />
								<span><?=$res_wel['title']?></span>
							</a>
						</li>
    <?php
	}
	?> 

					</ul>
				</section>
  <?php
  }
  ?>
			</article>
		</section>
		
		
		
		
		
		
		