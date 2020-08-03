
<!DOCTYPE html>
<html>
<head>
<title>Emandi/Policies</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Grocery Store Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- font-awesome icons -->
<link href="css/font-awesome.css" rel="stylesheet" type="text/css" media="all" /> 
<!-- //font-awesome icons -->
<!-- js -->
<script src="js/jquery-1.11.1.min.js"></script>
<!-- //js -->
<link href='//fonts.googleapis.com/css?family=Ubuntu:400,300,300italic,400italic,500,500italic,700,700italic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<!-- start-smoth-scrolling -->
</head>
	
<body>
<!-- header -->
	<div class="agileits_header">
		<div class="w3l_offers">
			<a href="index.php">Today's special Offers !</a>
		</div>
		<div class="w3l_search">
			<form action="#" method="post">
				<input type="text" name="Product" value="Search a product..." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search a product...';}" required="">
				<input type="submit" value=" " name="search">
				<?php

      if(isset($_POST['Product']) && isset($_POST['search']))
      {

		  include('register.php');   //establish connection
		  include('sample.php');
          echo $_POST['Product']."<br>";
          $query= $_POST['Product'];
          //sepaerating words and appending the metaphone of
          //each words with a space
          $search=explode(" ",$query);
          $search_string="";
          foreach($search as $word)
          {
               $search_string.=metaphone($word)." ";
          }
          echo $search_string."<br>";
          $sql="SELECT * FROM product WHERE indexing like '%$search_string%'";
          $res=mysqli_query($link,$sql);
          if(!$res)
          {
              echo mysqli_error($link);
          }

          if(mysqli_num_rows($res)>0)
          {
              while($row=mysqli_fetch_assoc($res))
              {
                   ?>
				   
                   <?php
				   setcookie("prod",$row['Name']);
				   setcookie("img",$row['Image']);
				   setcookie("qty",$row['Quantity']);
				   setcookie("qlt",$row['Quality']);
				   setcookie("prc",$row['price']);
				   setcookie("hrv",$row['harvested']);
				   header('location:single.php');
              }
          }



          if(mysqli_num_rows($res)==0)
          {
              $count=0;
              $words=explode(" ",$query);
              foreach ($words as $word)
              {
                  $mword=metaphone($word);
                  $sql="SELECT * FROM product WHERE indexing like '%$mword%'";
                  $res=mysqli_query($link,$sql);
                  if(!$res)
                  {
                      echo mysqli_error($link);
                  }
                  if(mysqli_num_rows($res)>0)
                  {
                    while($row=mysqli_fetch_assoc($res))
                    {
                         $count++;
                         ?>
                         <?php
						 setcookie("prod",$row['Name']);
						 setcookie("img",$row['Image']);
						 setcookie("qty",$row['Quantity']);
						 setcookie("qlt",$row['Quality']);
						 setcookie("prc",$row['price']);
						 setcookie("hrv",$row['harvested']);
						 header('location:single.php');

                    }
                  }
              }
              if($count==0)
              {
                   echo "no search results found :(";
              }
          }


      }

    ?>
			</form>
		</div>
		<div class="product_list_header">  
			<form action="#" method="post" class="last">
                <fieldset>
                    <input type="hidden" name="cmd" value="_cart" />
                    <input type="hidden" name="display" value="1" />
                    <input type="submit" name="submit" value="View your cart" class="button" />
                </fieldset>
            </form>
		</div>
		<div class="w3l_header_right">
			<ul>
				<li class="dropdown profile_details_drop">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user" aria-hidden="true"></i><span class="caret"></span></a><?php
 // Check if the user is logged in, if not then redirect to login page

if(!empty($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
  					echo "<div class='mega-dropdown-menu'>
						<div class='w3ls_vegetables'>
							<ul class='dropdown-menu drp-mnu'>
							<li><a href='bootstrap-ecommerce.com\bootstrap-ecommerce-html\g.php'>User ID</a></li>
								<li><a href='logout.php'>Logout</a></li> 
							</ul>

						</div>                  
					</div>";
}
else
{
					echo "<div class='mega-dropdown-menu'>
						<div class='w3ls_vegetables'>
							<ul class='dropdown-menu drp-mnu'>
								<li><a href='login.php'>Login</a></li> 
								<li><a href='signup.php'>Sign Up</a></li>
							</ul>

						</div>                  
					</div>";
}
?>
				</li>
			</ul>
		</div>
		<div class="w3l_header_right1">
			<h2><a href="mail.php">Contact Us</a></h2>
		</div>
		<div class="clearfix"> </div>
	</div>
<!-- script-for sticky-nav -->
	<script>
	$(document).ready(function() {
		 var navoffeset=$(".agileits_header").offset().top;
		 $(window).scroll(function(){
			var scrollpos=$(window).scrollTop(); 
			if(scrollpos >=navoffeset){
				$(".agileits_header").addClass("fixed");
			}else{
				$(".agileits_header").removeClass("fixed");
			}
		 });
		 
	});
	</script>
<!-- //script-for sticky-nav -->
	<div class="logo_products">
		<div class="container">
		<div class="w3ls_logo_products_left">
				<h1><a href="index.php"><span>Apni Mandi</span> Store</a></h1>
			</div>
			<div class="w3ls_logo_products_left1">
				<ul class="special_items">
					<li><a href="events.php">Events</a><i>/</i></li>
					<li><a href="about.php">About Us</a><i>/</i></li>
					<li><a href="index.php">Best Deals</a><i>/</i></li>
					<li><a href="services.php">Services</a></li>
				</ul>
			</div>
			<div class="w3ls_logo_products_left1">
				<ul class="phone_email">
				<li><i class="fa fa-phone" aria-hidden="true"></i>(1800) 200 200</li>
					<li><i class="fa fa-envelope-o" aria-hidden="true"></i><a href="mailto:teamapnimandi@gmail.com">apni@mandi.com</a></li>
				</ul>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
<!-- //header -->
<!-- products-breadcrumb -->
	<div class="products-breadcrumb">
		<div class="container">
			<ul>
				<li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Home</a><span>|</span></li>
				<li>Policies</li>
			</ul>
		</div>
	</div>
<!-- //products-breadcrumb -->
<!-- banner -->
	<div class="banner">
		<div class="w3l_banner_nav_left">
		<nav class="navbar nav_bottom">
			 <!-- Brand and toggle get grouped for better mobile display -->
			  <div class="navbar-header nav_2">
				  <button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				  </button>
			   </div> 
			   <!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
					<br> &nbsp &nbsp <span> BUY FROM CATEGORIES </span> <br><br>
					<ul class="nav navbar-nav nav_1"><br>
										<li><a href="vegetables.php">Vegetables</a></li>
										<li><a href="fruits.php">Fruits</a></li>
										<li><a href="crop.php">Grains</a></li>
					</ul>
					<br> &nbsp &nbsp <span> FARMER </span> <br><br>
					<ul class="nav navbar-nav nav_1">
										<li><a href="sell.php">Sell Now</a></li>
										<li><a href="organic.php">Organic Farming</a></li>
										<li><a href="tips.php">Tips and Suggestions</a></li>
										<li><a href="policies.php">Government Policies</a></li>
					</ul>
				</div><!-- /.navbar-collapse -->	
			   
			</nav>
		</div>
		<div class="w3l_banner_nav_right">
<!-- faq -->
		<div class="faq">
			<h3>Government Policies</h3>
			<div class="panel-group w3l_panel_group_faq" id="accordion" role="tablist" aria-multiselectable="true">
			  <div class="panel panel-default">
				<div class="panel-heading" role="tab" id="headingOne">
				  <h4 class="panel-title asd">
					<a class="pa_italic" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
					  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span><i class="glyphicon glyphicon-minus" aria-hidden="true"></i>ENAM
					</a>
				  </h4>
				</div>
				<div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
				  <div class="panel-body panel_text">
					<a href='https://enam.gov.in/web/mobile-app'>National Agriculture Market (eNAM)</a> is a pan-India electronic trading portal which networks the existing APMC mandis to create a unified national market for agricultural commodities.
					Small Farmers Agribusiness Consortium (SFAC) is the lead agency for implementing eNAM under the aegis of Ministry of Agriculture and Farmers' Welfare, Government of India.					
				</div>
				</div>
			  </div>
			  <div class="panel panel-default">
				<div class="panel-heading" role="tab" id="headingTwo">
				  <h4 class="panel-title asd">
					<a class="pa_italic collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
					  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span><i class="glyphicon glyphicon-minus" aria-hidden="true"></i>National Mission For Sustainable Agriculture (NMSA)
					</a>
				  </h4>
				</div>
				<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
				   <div class="panel-body panel_text">
					<a href='https://nmsa.dac.gov.in/'>National Mission for Sustainable Agriculture (NMSA)</a> has been formulated for enhancing agricultural productivity especially in rainfed areas focusing on integrated farming, water use efficiency, soil health management and synergizing resource conservation.
					Schemes under NMSA
					•	Rainfed Area Development (RAD): RAD is being implemented by RFS Division
					•	Soil Health Management (SHM): SHM is being implemented by INM Division
					•	Sub Mission on Agro Forestry (SMAF): SMAF is being implemented by NRM Division
					•	Paramparagat Krishi Vikas Yojana (PKVY): PKVY is being implemented by INM Division
					•	Soil and Land Use Survey of India (SLUSI): Being implemented by RFS Division
					•	National Rainfed Area Authority (NRAA): Being implemented by RFS Division
					•	Mission Organic Value Chain Development in North Eastern Region (MOVCDNER): Being implemented by INM Division
					•	National Centre of Organic Farming (NCOF): Being implemented by INM Division
					•	Central Fertilizer Quality Control and Training Institute (CFQC&TI): implemented by INM Division
									  </div>
				</div>
			  </div>
			  <div class="panel panel-default">
				<div class="panel-heading" role="tab" id="headingThree">
				  <h4 class="panel-title asd">
					<a class="pa_italic collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
					  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span><i class="glyphicon glyphicon-minus" aria-hidden="true"></i>Paramparagat Krishi Vikas Yojana (PKVY)
					</a>
				  </h4>
				</div>
				<div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
				   <div class="panel-body panel_text">
					The<a href='https://vikaspedia.in/agriculture/policies-and-schemes/crops-related/krishi-unnati-yojana/paramparagat-krishi-vikas-yojana'> Paramparagat Krishi Vikas Yojana (PKVY)</a>, an initiative to promote organic farming in the country, was launched by the NDA government in 2015.
					According to the scheme, farmers will be encouraged to form groups or clusters and take to organic farming methods over large areas in the country.
					To avail the scheme, each cluster or group must have 50 farmers willing to take up organic farming under the PKVY and possess a total area of at least 50 acres. Each farmer enrolling in the scheme will be provided INR 20,000 per acre by the government spread over three years time.
									  </div>
				</div>
			  </div>
			  <div class="panel panel-default">
				<div class="panel-heading" role="tab" id="headingFour">
				  <h4 class="panel-title asd">
					<a class="pa_italic collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
					  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span><i class="glyphicon glyphicon-minus" aria-hidden="true"></i>Pradhan Mantri Fasal Bima Yojana (PMFBY)
					</a>
				  </h4>
				</div>
				<div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
				   <div class="panel-body panel_text">
					<a href='https://pmfby.gov.in/'>Pradhan Mantri Fasal Bima Yojana (PMFBY)</a> is the government sponsored crop insurance scheme that integrates multiple stakeholders on a single platform.
					Objectives
					1. To provide insurance coverage and financial support to the farmers in the event of failure of any of the notified crop as a result of natural calamities, pests & diseases.
					2. To stabilise the income of farmers to ensure their continuance in farming.
					3. To encourage farmers to adopt innovative and modern agricultural practices.
					4. To ensure flow of credit to the agriculture sector.
													  </div>
				</div>
			  </div>
			   <div class="panel panel-default">
				<div class="panel-heading" role="tab" id="headingFive">
				  <h4 class="panel-title asd">
					<a class="pa_italic collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
					  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span><i class="glyphicon glyphicon-minus" aria-hidden="true"></i>Gramin Bhandaran Yojna
					</a>
				  </h4>
				</div>
				<div id="collapseFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive">
				   <div class="panel-body panel_text">
					Objective of <a href='https://www.nabard.org/hindi/content1.aspx?id=593&catid=23&mid=530'>Gramin Bhandaran Yojna </a> Scheme:<br>
					•	Create scientific storage capacity with allied facilities in rural areas.<br>
					•	To meet the requirements of farmers for storing farm produce, processed farm produce and agricultural inputs.<br>
					•	Promotion of grading, standardization and quality control of agricultural produce to improve their marketability.<br>
					•	Prevent distress sale immediately after harvest by providing the facility of pledge financing and marketing credit by strengthening agricultural marketing infrastructure in the country.<br>
									  </div>
				</div>
			  </div>
			   <div class="panel panel-default">
				<div class="panel-heading" role="tab" id="headingSix">
				  <h4 class="panel-title asd">
					<a class="pa_italic collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
					  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span><i class="glyphicon glyphicon-minus" aria-hidden="true"></i>Livestock insurance Scheme
					</a>
				  </h4>
				</div>
				<div id="collapseSix" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSix">
				   <div class="panel-body panel_text">
					<a href='http://dadf.gov.in/related-links/livestock-insurance'>Livestock insurance Scheme</a> scheme aims to provide protection mechanism to the farmers and cattle rearers against any eventual loss of their animals due to death and to demonstrate the benefit of the insurance of livestock to the people and popularize it with the ultimate goal of attaining qualitative improvement in livestock and their products.				  </div>
				</div>
			  </div>
			   <div class="panel panel-default">
				<div class="panel-heading" role="tab" id="headingSeven">
				  <h4 class="panel-title asd">
					<a class="pa_italic collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
					  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span><i class="glyphicon glyphicon-minus" aria-hidden="true"></i>Scheme on Fisheries Training and Extension
					</a>
				  </h4>
				</div>
				<div id="collapseSeven" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSeven">
				   <div class="panel-body panel_text">
					<a href='http://dahd.nic.in/related-links/centrally-sponsored-scheme-fisheries-training-and-extension'>Scheme on Fisheries Training and Extension</a> was launched to provide training for fishery sector so as to assist in undertaking fisheries extension programmes effectively.				  </div>
				</div>
			  </div>
			   <div class="panel panel-default">
				<div class="panel-heading" role="tab" id="headingEight">
				  <h4 class="panel-title asd">
					<a class="pa_italic collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
					  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span><i class="glyphicon glyphicon-minus" aria-hidden="true"></i>National Scheme on Welfare of Fishermen
					</a>
				  </h4>
				</div>
				<div id="collapseEight" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingEight">
				   <div class="panel-body panel_text">
					<a href='http://dahd.nic.in/related-links/centrally-sponsored-national-scheme-welfare-fishermen'>National Scheme on Welfare of Fishermen</a> scheme was launched to provide financial assistance to fishers for construction of house, community hall for recreation and common working place. It also aims to install tube-wells for drinking water and assistance during lean period through saving cum relief component.				  </div>
				</div>
			  </div>
			   <div class="panel panel-default">
				<div class="panel-heading" role="tab" id="headingNine">
				  <h4 class="panel-title asd">
					<a class="pa_italic collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
					  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span><i class="glyphicon glyphicon-minus" aria-hidden="true"></i>Micro Irrigation Fund (MIF) 
					</a>
				  </h4>
				</div>
				<div id="collapseNine" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingNine">
				   <div class="panel-body panel_text">
				<a href='https://www.manifestias.com/2019/10/15/micro-irrigation-fund-mif/'>	Micro Irrigation Fund (MIF)</a> is a government approved a dedicated Rs5,000 crore fund to bring more land area under micro-irrigation as part of its objective to boost agriculture production and farmers income.
					The fund has been set up under NABARD, which will provide this amount to states on concessional rate of interest to promote micro-irrigation, which currently has a coverage of only 10 million hectares as against the potential of 70 million hectares.
									  </div>
				</div>
			  </div>
			</div>
		</div>
<!-- //faq -->
		</div>
		<div class="clearfix"></div>
	</div>
<!-- //banner -->
<!-- newsletter -->
	<div class="newsletter">
		<div class="container">
			<div class="w3agile_newsletter_left">
				<h3>sign up for our newsletter</h3>
			</div>
			<div class="w3agile_newsletter_right">
				<form method="post">
					<input type="email" name="Email" value="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" required="">
					<input type="submit" value="subscribe now">
				</form>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
<!-- //newsletter -->
<!-- footer -->
	<div class="footer">
		<div class="container">
			<div class="col-md-3 w3_footer_grid">
				<h3>information</h3>
				<ul class="w3_footer_grid_list">
					<li><a href="events.php">Events</a></li>
					<li><a href="about.php">About Us</a></li>
					<li><a href="index.php">Best Deals</a></li>
					<li><a href="services.php">Services</a></li>
				</ul>
			</div>
			<div class="col-md-3 w3_footer_grid">
				<h3>policy info</h3>
				<ul class="w3_footer_grid_list">
					<li><a href="faqs.php">FAQ</a></li>
					<li><a href="privacy.php">privacy policy</a></li>
					<li><a href="privacy.php">terms of use</a></li>
				</ul>
			</div>
			
			<div class="col-md-3 w3_footer_grid">
			<h3>Users Review</h3>
				<ul class="w3_footer_grid_list1">
					<li><label class="fa fa-twitter" aria-hidden="true"></label><i>01 day ago</i><span>Great place! These guys know what they are doing and go the extra mile.</span></li>
					<li><label class="fa fa-twitter" aria-hidden="true"></label><i>02 day ago</i><span>The support I got was thorough and timely.Awesome!!</span></li>
				</ul>
			</div>
			<div class="clearfix"> </div>
			<div class="agile_footer_grids">
				<div class="col-md-3 w3_footer_grid agile_footer_grids_w3_footer">
					<div class="w3_footer_grid_bottom">
						<h4>100% secure payments</h4>
						<img src="images/card.png" alt=" " class="img-responsive" />
					</div>
				</div>
				<div class="col-md-3 w3_footer_grid agile_footer_grids_w3_footer">
					<div class="w3_footer_grid_bottom">
						<h5>connect with us</h5>
						<ul class="agileits_social_icons">
							<li><a href="https://www.facebook.com/" class="facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
							<li><a href="https://twitter.com/LOGIN" class="twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
							<li><a href="https://accounts.google.com/ServiceLogin?service=lso&sacu=1&rip=1" class="google"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
							<li><a href="https://www.instagram.com/accounts/login/?hl=en" class="instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
						</ul>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
			<div class="wthree_footer_copy">
			<p>© 2020 Apni Mandi Store|All rights reserved.</p>
			</div>
		</div>
	</div>
<!-- //footer -->
<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>
<script>
$(document).ready(function(){
    $(".dropdown").hover(            
        function() {
            $('.dropdown-menu', this).stop( true, true ).slideDown("fast");
            $(this).toggleClass('open');        
        },
        function() {
            $('.dropdown-menu', this).stop( true, true ).slideUp("fast");
            $(this).toggleClass('open');       
        }
    );
});
</script>
<!-- here stars scrolling icon -->
	<script type="text/javascript">
		$(document).ready(function() {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
				};
			*/
								
			$().UItoTop({ easingType: 'easeOutQuart' });
								
			});
	</script>
<!-- //here ends scrolling icon -->
<script src="js/minicart.js"></script>
<script>
		paypal.minicart.render();

		paypal.minicart.cart.on('checkout', function (evt) {
			var items = this.items(),
				len = items.length,
				total = 0,
				i;

			// Count the number of each item in the cart
			var myStringArray = [];
// Count the number of each item in the cart
		for (i = 0; i < len; i++) {  myStringArray.push(items[i].get('item_name'));
myStringArray.push(items[i].get('quantity'));
myStringArray.push(items[i].get('amount'));
				total += items[i].get('quantity')*items[i].get('amount');
		}
localStorage.setItem("vOneLocalStorage", myStringArray);

			if (total < 3) {
				alert('The minimum order quantity is 3. Please add more to your shopping cart before checking out');
				evt.preventDefault();
			}
		});

	</script>
</body>
</html>
