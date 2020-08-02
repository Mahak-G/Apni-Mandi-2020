<?php

session_start();

require_once "register.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){
	
	
 
    $name=$_POST["name"];
	$no=$_POST["cardno"];
	$cvv=$_POST["cvv"];
	$exp=$_POST["exp"];
	$balance = 0;
	
        $sql = "SELECT Balance FROM card WHERE cardname = ? AND Cardno = ? AND cvvno = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
       
            mysqli_stmt_bind_param($stmt, "sdi", $name , $no , $cvv);
           
            if(mysqli_stmt_execute($stmt)){
        
                mysqli_stmt_store_result($stmt);
             
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    
                    mysqli_stmt_bind_result($stmt, $balance);

                    if(mysqli_stmt_fetch($stmt)){
						
                            // Store data in session variables
                            $_SESSION["balance"] = $balance;
                            $_SESSION["name"] = $name; 
                            $_SESSION["cardno"] = $no; 							
                            
                            // Redirect user to welcome page
                            //header("location: invoice.php");
                    }
                } else{
                   echo "No card found.";
				   
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            mysqli_stmt_close($stmt);
        }
    
    
    mysqli_close($link);
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Emandi/payment</title>
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

<link href='//fonts.googleapis.com/css?family=Ubuntu:400,300,300italic,400italic,500,500italic,700,700italic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>

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
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user" aria-hidden="true"></i><span class="caret"></span></a>
					<?php
if(!empty($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
  					echo "<div class='mega-dropdown-menu'>
						<div class='w3ls_vegetables'>
							<ul class='dropdown-menu drp-mnu'>
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
				<li>Payment</li>
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
					<ul class="nav navbar-nav nav_1">
										
										<li><a href="vegetables.php">Vegetables</a></li>
										<li><a href="fruits.php">Fruits</a></li>
										<li><a href="crop.php">Grains</a></li>
					</ul>
				 </div><!-- /.navbar-collapse -->
			</nav>
		</div>
		<div class="w3l_banner_nav_right">
<!-- payment -->
		<div class="privacy about">
			<h3>Pay<span>ment</span></h3>
			
	         <div class="checkout-right">
				<!--Horizontal Tab-->
        <div id="parentHorizontalTab">
            <ul class="resp-tabs-list hor_1">
				<li>Card Details</li>
                
            </ul>
            <div class="resp-tabs-container hor_1">

           <div>
                    								  
																		  <form action="#" method="post" >
									
										<div >
											<div >
												<div >
													<label >Name on Card</label>
													<input type="text" name="name" placeholder="John Smith">
												</div>
												<div >
													<div >
														<div>
															<label >Card Number</label>
															<input type="text" name="cardno" inputmode="numeric" placeholder="&#149;&#149;&#149;&#149; &#149;&#149;&#149;&#149; &#149;&#149;&#149;&#149; &#149;&#149;&#149;&#149;">
														</div>
													</div>
													<div >
														<div >
															<label >CVV</label>
															<input inputmode="numeric" type="text" name="cvv" placeholder="&#149;&#149;&#149;">
														</div>
													</div>
													<div > </div>
												</div>
												<div >
													<label >Expiration Date</label>
													<input type="text" name="exp" placeholder="MM / YY">
												</div>
											</div>
											
										</div>
								<button class="submit"><span>Make a payment </span></button>
								</form>

                </div>
<form action="#" align="center" method="post" class="last">
                <fieldset>
                    <input type="hidden" name="cmd" value="_cart" />
                    <input type="hidden" name="display" value="1" />
                    <input type="submit" name="submit" style="background-color: #4CAF50;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;" value="Final Cart" class="button" />
                </fieldset>
            </form>
                </div>
        </div>
	
	<!--Plug-in Initialisation-->

	<!-- // Pay -->
	
			 </div>

		</div>
<!-- //payment -->
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
				<form action="#" method="post">
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
				<h3>Farmer Section</h3>
				<ul class="w3_footer_grid_list">
					<li><a href="organic.php">Organic Farming</a></li>
					<li><a href="tips.php">Tips and Suggestions</a></li>
					<li><a href="policies.php">Government Policies</a></li>
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
							<li><a href="#" class="facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
							<li><a href="#" class="twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
							<li><a href="#" class="google"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
							<li><a href="#" class="instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
							<li><a href="#" class="dribbble"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
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
<!-- js -->
<script src="js/jquery-1.11.1.min.js"></script>
<!-- easy-responsive-tabs -->    
<link rel="stylesheet" type="text/css" href="css/easy-responsive-tabs.css " />
<script src="js/easyResponsiveTabs.js"></script>
<!-- //easy-responsive-tabs --> 
	<script type="text/javascript">
    $(document).ready(function() {
        //Horizontal Tab
        $('#parentHorizontalTab').easyResponsiveTabs({
            type: 'default', //Types: default, vertical, accordion
            width: 'auto', //auto or any width like 600px
            fit: true, // 100% fit in a container
            tabidentify: 'hor_1', // The tab groups identifier
            activate: function(event) { // Callback function if tab is switched
                var $tab = $(this);
                var $info = $('#nested-tabInfo');
                var $name = $('span', $info);
                $name.text($tab.text());
                $info.show();
            }
        });
    });
</script>
<!-- credit-card -->
		<script type="text/javascript" src="js/creditly.js"></script>
        <link rel="stylesheet" href="css/creditly.css" type="text/css" media="all" />

		<script type="text/javascript">
			$(function() {
			  var creditly = Creditly.initialize(
				  '.creditly-wrapper .expiration-month-and-year',
				  '.creditly-wrapper .credit-card-number',
				  '.creditly-wrapper .security-code',
				  '.creditly-wrapper .card-type');

			  $(".creditly-card-form .submit").click(function(e) {
				e.preventDefault();
				var output = creditly.validate();
				if (output) {
				  // Your validated credit card output
				  console.log(output);
				}
			  });
			});
		</script>
	<!-- //credit-card -->

<!-- //js -->
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
			for (i = 0; i < len; i++) {
				total += items[i].get('quantity')*items[i].get('amount');
			}
			document.cookie = 'prod='+total;
			document.cookie = 'payment=true';
			if (total ==0) {
				alert('your cart is empty');
				evt.preventDefault();
			}
		});


	</script>
</body>
</html>
