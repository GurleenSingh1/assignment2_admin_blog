<?php include"config.php"; ?>
<?php include"location.php";
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Conestoga Pizzeria</title>
<link rel="stylesheet" href="css/style.css" />
<link href='http://fonts.googleapis.com/css?family=Engagement' rel='stylesheet' type='text/css'>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="js/jquery.uniform.min.js" type="text/javascript" charset="utf-8"></script>
    <script type="text/javascript" charset="utf-8">
      $(function(){
        $("input:checkbox, input:radio, input:file, select").uniform();
      });
    </script>
	
</head>
<body>
<article>
<h1><img src="images/logo.png"></h1>

<form action="insert_contacts2.php?pizza_list_id=<?=$_REQUEST['pizza_list_id']?>" method="post" enctype="multipart/form-data">

<div style="padding: 5% 35% 0% 0%; font-weight:bold; font-size:20px;"><img src="images/step2.png" /></div>

<h2 style=" text-align:center;">Order Information</h2>
	
<!--You just need to verify your listing Click to generate code (Verification SMS will be sent on the Mobile Number 
		 <?php  if (isset($_REQUEST['msg'])) {echo '<script type="text/javascript">alert("Form Step 1 Is Submited Successfully please submit Step 2");</script>';} ?>
         <?php  if (isset($_REQUEST['msg1'])) {echo '<script type="text/javascript">alert("You must add a picture for your listing");</script>';} ?>
		 -->	
		 
		
         
	<ul>
	
        <li>
        	<label for="company_name1">Number of Pizzas :</label>
            <input type="number" size="40" id="number_pizza" required  name="number_pizza" />
        </li>
		
		
		<li>
            <label for="size">Size </label>
     	   <label><input type="radio" value="small-5"  <? if($array_sel_u['size']=='small-5' or $_REQUEST['size']=='small-5'){?> checked="checked" <? }?> name="size" />Small &nbsp; costs $5</label>
            <label><input type="radio" value="medium-10"  <? if($array_sel_u['size']=='medium-10' or $_REQUEST['size']=='medium-10'){?> checked="checked" <? }?> name="size" />medium  &nbsp; costs $10</label>
              <label for="size">&nbsp; </label>
            <label><input type="radio" value="large-15"  <? if($array_sel_u['size']=='large-15' or $_REQUEST['size']=='large-15'){?> checked="checked" <? }?> name="size" />Large  &nbsp; costs $15</label>
            
            <label><input type="radio" value="xlarge-20"  <? if($array_sel_u['size']=='xlarge-20' or $_REQUEST['size']=='xlarge-20'){?> checked="checked" <? }?> name="size" />X-Large  &nbsp; costs $20</label>
            
   </li>
		
   <li>
            <label for="crust_types">Crust Types  </label>
     	   <label><input type="radio" value="hand-tossed"  <? if($array_sel_u['crust_types']=='hand-tossed' or $_REQUEST['crust_types']=='hand-tossed'){?> checked="checked" <? }?> name="crust_types" />hand-tossed</label>
            <label><input type="radio" value="pan"  <? if($array_sel_u['crust_types']=='pan' or $_REQUEST['crust_types']=='pan'){?> checked="checked" <? }?> name="crust_types" />pan</label>
              <label for="crust_types">&nbsp; </label>
            <label><input type="radio" value="stuffed"  <? if($array_sel_u['crust_types']=='stuffed' or $_REQUEST['crust_types']=='stuffed'){?> checked="checked" <? }?> name="crust_types" />stuffed</label>
             <label><input type="radio" value="thin"  <? if($array_sel_u['crust_types']=='thin' or $_REQUEST['crust_types']=='thin'){?> checked="checked" <? }?> name="crust_types" />thin</label>
            
            
   </li>
   
   
   <li>
        					
     <label for="toppings_code">Select Toppings category:</label><label for="toppings_code">&nbsp; </label><label for="toppings_code">&nbsp; </label><label for="toppings_code">&nbsp; </label><label for="toppings_code">&nbsp; </label><label for="toppings_code">&nbsp; </label>
                         <label><input type="checkbox" value="ground beef"  <? if($array_sel_u['toppings']=='ground beef' or $_REQUEST['toppings']=='ground beef'){?> checked="checked" <? }?> name="toppings[]" />ground beef</label>
                         
                         <label><input type="checkbox" value="pepporoni"  <? if($array_sel_u['toppings']=='pepporoni' or $_REQUEST['toppings']=='pepporoni'){?> checked="checked" <? }?> name="toppings[]" />pepporoni</label>
                         <label for="toppings_code">&nbsp; </label>
                         
                          
                          
                          <label><input  type="checkbox" value="cheese"  <? if($array_sel_u['toppings']=='cheese' or $_REQUEST['toppings']=='cheese'){?> checked="checked" <? }?> name="toppings[]" />cheese</label>
                          
                          <label><input  type="checkbox" value="pineaple"  <? if($array_sel_u['toppings']=='pineaple' or $_REQUEST['toppings']=='pineaple'){?> checked="checked" <? }?> name="toppings[]" />pineapple</label>
            
            <label><input  type="checkbox" value="mushrooms"  <? if($array_sel_u['toppings']=='mushrooms' or $_REQUEST['toppings']=='mushrooms'){?> checked="checked" <? }?> name="toppings[]" />mushrooms</label>
            
            <label><input  type="checkbox" value="tomatoes"  <? if($array_sel_u['toppings']=='tomatoes' or $_REQUEST['toppings']=='tomatoes'){?> checked="checked" <? }?> name="toppings[]" />tomatoes</label>
            
            <label><input  type="checkbox" value="onions"  <? if($array_sel_u['toppings']=='onions' or $_REQUEST['toppings']=='onions'){?> checked="checked" <? }?> name="toppings[]" />onions</label>
            
            <label><input  type="checkbox" value="jalapenos"  <? if($array_sel_u['toppings']=='jalapenos' or $_REQUEST['toppings']=='jalapenos'){?> checked="checked" <? }?> name="toppings[]" />jalapenos</label>
            

            
           <label><input  type="checkbox" value="chicken"  <? if($array_sel_u['toppings']=='chicken' or $_REQUEST['toppings']=='chicken'){?> checked="checked" <? }?> name="toppings[]" />chicken</label>
            
            <label><input  type="checkbox" value="anchovles"  <? if($array_sel_u['toppings']=='anchovles' or $_REQUEST['toppings']=='anchovles'){?> checked="checked" <? }?> name="toppings[]" />anchovles</label>
                         
            
            
           <label for="toppings_code">&nbsp; </label>
                         
   
        </li>
        
        
        
   
   
   
   <li>
 <label for="toppings_code">&nbsp; </label> <label for="toppings_code">&nbsp; </label> <label for="toppings_code">&nbsp; </label>

        					<?php
						    $user_country_query="select `toppings_code`  from `toppings` where `inactive`='0' ";
							$user_country_run=mysql_query($user_country_query);
							$user_country_count=mysql_num_rows($user_country_run); 
							?>
                            <label for="toppings_code" style="text-align:left;">Toppings Size:</label>
                          <select name="toppings_code" id="toppings_code" >
                             <?php while ($user_country_array=mysql_fetch_array($user_country_run)){ ?>
                                  <option  value="<?=$user_country_array['toppings_code']?>" <?php if($array_sel_u['toppings_code']==$user_country_array['toppings_code']) { ?> selected="selected" <?php } ?> ><?= $user_country_array['toppings_code'] ?> </option>
                             <?php } ?>
                          </select>
   
        </li>
		
		
	

<li>
<label for="toll_free">Tax </label>


        
     	  
            
            <label><input type="radio" value="1"  <? if($array_sel_u['tax']=='1' or $_REQUEST['tax']=='1'){?> checked="checked" <? }?> name="tax" />Tax  &nbsp; 13%</label>
            
   </li>





	
		
     
      
        
         <p>
        <button type="submit" class="right action">Next</button>
    </p>
    <div>&nbsp;</div>
    
        
	</ul>
   
</form>
</article>
<footer>
<p>Copywright 2015  Conestoga Pizzeria</p>
</footer>