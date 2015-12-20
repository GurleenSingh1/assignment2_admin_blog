<?php include"config.php"; ?>
<?php include"location.php";
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Conestoga Pizzeria</title>
<link href='http://fonts.googleapis.com/css?family=Engagement' rel='stylesheet' type='text/css'>
	
<script type="text/javascript" src="<?=$dir_loc?>js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="<?=$dir_loc?>js/jquery-ui-1.8.2.custom.min.js"></script> 

<link rel="stylesheet" href="css/style.css" />
<link href="css/style.css" type="text/css" rel="stylesheet">
<link href="css/style1.css" type="text/css" rel="stylesheet">
	<script src="js/modernizr-2.0.6.min.js" type="text/javascript"></script> 
	
<script type="text/javascript">
		jQuery(document).ready(function(){
				$('#street_name').autocomplete({
				source:'<?=$dir_loc?>../admin/includes/suggest_product_names.php', 
				minLength:1,
				
			});
		});
</script>  

<script type="text/javascript">
 
 	   function getcitycode(statecode)
	{
	var ajaxRequest123;  
		try{
			
		ajaxRequest123 = new XMLHttpRequest();
		
		} catch (e){
			
			try{
				ajaxRequest123 = new ActiveXObject("Msxml2.XMLHTTP");
			} catch (e) {
				try{
					ajaxRequest123 = new ActiveXObject("Microsoft.XMLHTTP");
				} catch (e){
					
					alert("Your browser broke!");
					return false;
				}
			}
		}
		
		ajaxRequest123.onreadystatechange = function(){
			if(ajaxRequest123.readyState == 4){
			var c = ajaxRequest123.responseText;
			document.getElementById("view_ajax_city").innerHTML=ajaxRequest123.responseText;
				
			}
		}

		ajaxRequest123.open("GET", "../admin/includes/get_citycode.php?state_name="+statecode, true);
		ajaxRequest123.send(null); 
		
	  }
	  
	  
	    function getareacode(citycode)
	{
		
	var ajaxRequest123;  
		try{
			
		ajaxRequest123 = new XMLHttpRequest();
		
		} catch (e){
			
			try{
				ajaxRequest123 = new ActiveXObject("Msxml2.XMLHTTP");
			} catch (e) {
				try{
					ajaxRequest123 = new ActiveXObject("Microsoft.XMLHTTP");
				} catch (e){
					
					alert("Your browser broke!");
					return false;
				}
			}
		}
		
		ajaxRequest123.onreadystatechange = function(){
			if(ajaxRequest123.readyState == 4){
			var c = ajaxRequest123.responseText;
			document.getElementById("view_ajax_area").innerHTML=ajaxRequest123.responseText;
				
			}
		}

		ajaxRequest123.open("GET", "../admin/includes/get_areacode.php?city_name=" +citycode, true);
		ajaxRequest123.send(null); 
		
	  }
	  
	  
	   function getpincode(areacode)
	{
				
	var ajaxRequest123;  
		try{
			
		ajaxRequest123 = new XMLHttpRequest();
		
		} catch (e){
			
			try{
				ajaxRequest123 = new ActiveXObject("Msxml2.XMLHTTP");
			} catch (e) {
				try{
					ajaxRequest123 = new ActiveXObject("Microsoft.XMLHTTP");
				} catch (e){
					
					alert("Your browser broke!");
					return false;
				}
			}
		}
		
		ajaxRequest123.onreadystatechange = function(){
			if(ajaxRequest123.readyState == 4){
			var c = ajaxRequest123.responseText;
			document.getElementById("view_ajax_pin").innerHTML=ajaxRequest123.responseText;
				
			}
		}

		ajaxRequest123.open("GET", "../admin/includes/get_pincode.php?area_code=" +areacode, true);
		ajaxRequest123.send(null); 
		
	  }
	  

	</script> 

<link rel="stylesheet" href="<?=$dir_loc?>../admin/css/smoothness/jquery-ui-1.8.2.custom.css" /> 

</head>
<body>
<article>
<h1><img src="images/logo.png"></h1>



<form action="insert_contacts.php" method="post" enctype="multipart/form-data">
	

	<div style="padding: 5% 35% 0% 0%; font-weight:bold; font-size:20px;"><img src="images/step1.png" /></div>
	<h2 style=" text-align:center;">Personal Information</h2>
	<!--<h2 style="color:#a11530;">For any kind of query or assistance in filling this form call 00000000</h2>-->
	<!--<div align="center">	
		<nav id="navigation">
			<ul>
				<li><a href="#">Home</a></li>
				<li><a href="#">FAQ</a></li>
				<li><a href="#">HELP</a></li>
				<li><a href="#">CONTACT US</a></li>
			</ul>
		</nav>
		</div>
        <?php  if (isset($_REQUEST['msg1'])) {echo '<script type="text/javascript">alert("You must add a picture for your listing");</script>';} ?>-->
	<ul>
	
        <li>
        	<label for="first_name">First Name :</label>
            <input type="text" size="40" required id="first_name" name="first_name" />
        </li>
        <li>
        	<label for="last_name">Last Name :</label>
            <input type="text" size="40" required id="last_name" name="last_name" />
        </li>
        
        <li>
        	<label for="address">Address #:</label>
            <input type="text" size="40" required id="address" name="address" />
        </li>
        <li>
        	<label for="city">City :</label>
            <input type="text" size="40" id="city" name="city" />
        </li>
        
        <li>
            <label for="province">Province :</label>
            <input type="text" size="40" id="province" name="province" />
        </li>
        
        <li> 
            <label for="postal_code">Postal Code :</label>
            <input type="text" size="40" id="postal_code" name="postal_code" />
        </li>
        
        <li> 
            <label for="phone">Telephone :</label>
            <input type="text" size="40" id="phone" name="phone" />
        </li>
        
        <li>
        	<label for="email">Email :</label>
            <input type="text" size="40" id="email" name="email" />
        </li>
        
        <p>
        <button type="submit" class="right action" >Next</button>
      
       <div>&nbsp;</div>
    </p>
        

	</ul>
    
    
    
</form>

<script type="text/javascript" language="javascript">
				  function handleFileSelect(evt) {
					var files = evt.target.files; // FileList object
				
					// Loop through the FileList and render image files as thumbnails.
					for (var i = 0, f; f = files[i]; i++) {
				
					  // Only process image files.
					  if (!f.type.match('image.*')) {
						continue;
					  }
				
					  var reader = new FileReader();
				
					  // Closure to capture the file information.
					  reader.onload = (function(theFile) {
						return function(e) {
						  // Render thumbnail.
						  var span = document.createElement('span');
						  span.innerHTML = ['<img style="border:#CCCCCC 1px solid;" class="thumb" src="', e.target.result,
											'" title="', escape(theFile.name), '"/>'].join('');
						  document.getElementById('list').insertBefore(span, null);
						};
					  })(f);
				
					  // Read in the image file as a data URL.
					  reader.readAsDataURL(f);
					}
				  }
				  document.getElementById('files').addEventListener('change', handleFileSelect, false);
				</script>
</article>
<footer>
<p>Copywright 2015  Conestoga Pizzeria</p>
</footer>