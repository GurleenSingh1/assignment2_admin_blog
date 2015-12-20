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



<div style="padding: 5% 35% 0% 0%; font-weight:bold; font-size:20px;"><img src="images/step3.png" /></div>



<div align="center">



<h2 style="color:#a11530;">Thank you for your Order we will contact you very soon</h2>



</div>



							<?php

						    $user_pizza_list_query="select * from `pizza_list` where  `pizza_list_id`=$_REQUEST[pizza_list_id] ";

							$user_pizza_list_run=mysql_query($user_pizza_list_query);

							$user_pizza_list_count=mysql_num_rows($user_pizza_list_run); 

							$user_pizza_list_array=mysql_fetch_array($user_pizza_list_run);

							?>

	

<ul>



 <li>

        	<label for="first_name">First Name :</label>

            <input type="text" size="40" required id="first_name"  name="first_name" disabled value="<?=$user_pizza_list_array['first_name']?>"  />

        </li>

        <li>

        	<label for="last_name">Last Name :</label>

            <input type="text" size="40" required id="last_name" name="last_name" disabled value="<?=$user_pizza_list_array['last_name']?>" />

        </li>

        

        <li>

        	<label for="address">Address #:</label>

            <input type="text" size="40" required id="address" name="address" disabled value="<?=$user_pizza_list_array['address']?>" />

        </li>

        <li>

        	<label for="city">City :</label>

            <input type="text" size="40" id="city" name="city" disabled value="<?=$user_pizza_list_array['city']?>"  />

        </li>

        

        <li>

            <label for="province">Province :</label>

            <input type="text" size="40" id="province" name="province" disabled value="<?=$user_pizza_list_array['province']?>"  />

        </li>

        

        <li> 

            <label for="postal_code">Postal Code :</label>

            <input type="text" size="40" id="postal_code" name="postal_code" disabled value="<?=$user_pizza_list_array['postal_code']?>"  />

        </li>

        

        <li> 

            <label for="phone">Telephone :</label>

            <input type="text" size="40" id="phone" name="phone" disabled value="<?=$user_pizza_list_array['phone']?>"  />

        </li>

        

        <li>

        	<label for="email">Email :</label>

            <input type="text" size="40" id="email" name="email" disabled value="<?=$user_pizza_list_array['email']?>"  />

        </li>

        

	

        <li>

        	<label for="company_name1">Number of Pizzas :</label>

            <input type="number" size="40" required id="number_pizza" required  name="number_pizza" disabled value="<?=$user_pizza_list_array['number_pizza']?>"/>

        </li>

		

		

		<li>

            <label for="size">Size </label>

     	   <label><input type="radio" value="small-5" disabled <? if($user_pizza_list_array['size']=='small-5'){?> checked="checked" <? }?> name="size" />Small &nbsp; costs $5</label>

            <label><input type="radio" value="medium-10" disabled <? if($user_pizza_list_array['size']=='medium-10'){?> checked="checked" <? }?> name="size" />medium  &nbsp; costs $10</label>

              <label for="size">&nbsp; </label>

            <label><input type="radio" value="<?=$user_pizza_list_array['size']?>" disabled <? if($user_pizza_list_array['size']=='medium-15'){?> checked="checked" <? }?> name="size" />Large  &nbsp; costs $15</label>

            

            <label><input type="radio" value="<?=$user_pizza_list_array['size']?>" disabled <? if($user_pizza_list_array['size']=='medium-20'){?> checked="checked" <? }?> name="size" />X-Large  &nbsp; costs $20</label>

            

   </li>

		

   <li>

            <label for="crust_types">Crust Types  </label>

     	   <label><input type="radio" value="hand-tossed" disabled <? if($user_pizza_list_array['crust_types']=='hand-tossed' or $_REQUEST['crust_types']=='hand-tossed'){?> checked="checked" <? }?> name="crust_types" />hand-tossed</label>

            <label><input type="radio" value="pan"  <? if($user_pizza_list_array['crust_types']=='pan' or $_REQUEST['crust_types']=='pan'){?> checked="checked" <? }?> name="crust_types" />pan</label>

              <label for="crust_types">&nbsp; </label>

            <label><input type="radio" value="stuffed" disabled <? if($user_pizza_list_array['crust_types']=='stuffed' or $_REQUEST['crust_types']=='stuffed'){?> checked="checked" <? }?> name="crust_types" />stuffed</label>

             <label><input type="radio" value="thin" disabled <? if($user_pizza_list_array['crust_types']=='thin' or $_REQUEST['crust_types']=='thin'){?> checked="checked" <? }?> name="crust_types" />thin</label>

            

            

   </li>

   

   

   <li>

        					<?php
							$my_toopings=explode(",",$user_pizza_list_array['toppings']);
							?>

     <label for="toppings_code">Select Toppings category:</label>

                         <label><input type="checkbox" value="ground beef" disabled <? if(in_array("ground beef", $my_toopings) or $_REQUEST['toppings']=='ground beef'){?> checked="checked" <? }?> name="toppings[]" />ground beef</label>

                         

                         <label><input type="checkbox" value="pepporoni" disabled <? if(in_array("pepporoni", $my_toopings) or $_REQUEST['toppings']=='pepporoni'){?> checked="checked" <? }?> name="toppings[]" />pepporoni</label>

                         <label for="toppings_code">&nbsp; </label>

                         

                        
			
			<label><input  type="checkbox" value="cheese" disabled <? if(in_array("cheese", $my_toopings) or $_REQUEST['toppings']=='cheese'){?> checked="checked" <? }?> name="toppings[]" />cheese</label>

                          

                          <label><input  type="checkbox" value="pineaple" disabled <? if(in_array("pineaple", $my_toopings) or $_REQUEST['toppings']=='pineaple'){?> checked="checked" <? }?> name="toppings[]" />pineapple</label>

            

            <label><input  type="checkbox" value="mushrooms" disabled <? if(in_array("mushrooms", $my_toopings) or $_REQUEST['toppings']=='mushrooms'){?> checked="checked" <? }?> name="toppings[]" />mushrooms</label>

            

            <label><input  type="checkbox" value="tomatoes" disabled <? if(in_array("tomatoes", $my_toopings) or $_REQUEST['toppings']=='tomatoes'){?> checked="checked" <? }?> name="toppings[]" />tomatoes</label>

            

            <label><input  type="checkbox" value="onions" disabled <? if(in_array("onions", $my_toopings) or $_REQUEST['toppings']=='onions'){?> checked="checked" <? }?> name="toppings[]" />onions</label>

            

            <label><input  type="checkbox" value="jalapenos" disabled <? if(in_array("jalapenos", $my_toopings) or $_REQUEST['toppings']=='jalapenos'){?> checked="checked" <? }?> name="toppings[]" />jalapenos</label>

            



            

           <label><input  type="checkbox" value="chicken" disabled <? if(in_array("chicken", $my_toopings) or $_REQUEST['toppings']=='chicken'){?> checked="checked" <? }?> name="toppings[]" />chicken</label>

            

            <label><input  type="checkbox" value="anchovles" disabled <? if(in_array("anchovles", $my_toopings) or $_REQUEST['toppings']=='anchovles'){?> checked="checked" <? }?> name="toppings[]" />anchovles</label>


            

            <label for="toppings_code">&nbsp; </label>

            

            

            <!-- <label><input type="checkbox" value="ground beef" disabled <? if($user_pizza_list_array['toll_free']=='1' or $_REQUEST['toll_free']=='1'){?> checked="checked" <? }?> name="toll_free" />ground beef</label>



            

            <label for="toppings_code"><input type="checkbox" value="0" disabled <? if($user_pizza_list_array['toll_free']=='0' or $_REQUEST['toll_free']=='0'){?> checked="checked" <? }?> name="toll_free" />pepporoni </label>-->

         

                

   

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

                                  <option disabled  value="<?=$user_country_array['toppings_code']?>" <?php if($user_pizza_list_array['toppings_code']==$user_country_array['toppings_code']) { ?> selected="selected" <?php } ?> ><?= $user_country_array['toppings_code'] ?> </option>

                             <?php } ?>

                          </select>

   

        </li>

		

		

	



<li>

<label for="toll_free">Tax </label>

        

            <label><input type="radio" value="1"  <? if($user_pizza_list_array['tax']=='1' or $_REQUEST['tax']=='1'){?> checked="checked" <? }?> name="tax" />Tax  &nbsp; 13%</label>

            

   </li>







<li>

<label for="toll_free">Total Amount </label>

   

          <!--  <label><input type="radio" value="1"  <? if($user_pizza_list_array['total_cost']=='1' or $_REQUEST['tax']=='1'){?> checked="checked" <? }?> name="tax" />Tax  &nbsp; 13%</label>-->

            

            <input type="text" size="40" id="phone" name="phone" disabled value="$<?=$user_pizza_list_array['total_cost']?>"  />

            

   </li>



	

		

     

      

        

         <div align="center">



<h2 style="color:#a11530;">Thank you for your Order we will contact you very soon</h2>



</div>

    <div>&nbsp;</div>

    

        

	</ul>

	<ul>



    <div>&nbsp;</div>

    

        

	</ul>

   

</form>

</article>

<footer>

<p>Copywright 2015 Conestoga Pizzeria</p>

</footer>
</body>
</html>