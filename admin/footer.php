

<!--For satrting Tag see header-->
</section>
</section>
<footer id="bottom" >
	<section class="container_12 clearfix">
   			<?php
			$query_up_mem="select * from `users` where id=1";
			$res_up_mem=mysql_query($query_up_mem);
			$array_up_mem=mysql_fetch_array($res_up_mem);
			?>
		<div class="grid_6">
			<a href="#">Menu 1</a>
			&middot; <a href="#">Menu 2</a>
			&middot; <a href="#">Menu 3</a>
			&middot; <a href="#">Menu 4</a>
		</div>
		<div class="grid_6 alignright">
        
			Copyright &copy; <?=date('Y')?> <a href="../index.php" target="_blank"><?=$array_up_mem['company_name']?></a>
		</div>
	</section>
</footer>
