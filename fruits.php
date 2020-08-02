
<!DOCTYPE html>
<html>
<head>
<title>Emandi/fruits</title>
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
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user" aria-hidden="true"></i><span class="caret"></span></a>
					<?php
session_start();
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
				<li>Fruits</li>
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
			<div class="w3l_banner_nav_right_banner5">
				<h3>Best Deals For New Products<span class="blink_me"></span></h3>
			</div>
			<div class="w3l_banner_nav_right_banner3_btm">
				<div class="col-md-4 w3l_banner_nav_right_banner3_btml">
					<div class="view view-tenth">
						<img src="images/19.jpg" alt=" " class="img-responsive" />
						<div class="mask">
							<h4>Emandi</h4>
							<p>Beware what you eat, it becomes part of you.</p>
						</div>
					</div>
					<h4>Grains</h4>
					<ol>
						<li>Affordable grains</li>
						<li>Best in quality</li>
						<li>Just try us out</li>
					</ol>
				</div>
				<div class="col-md-4 w3l_banner_nav_right_banner3_btml">
					<div class="view view-tenth">
						<img src="images/18.jpg" alt=" " class="img-responsive" />
						<div class="mask">
							<h4>Emandi</h4>
							<p>Beware what you eat, it becomes part of you.</p>
						</div>
					</div>
					<h4>Fruits</h4>
					<ol>
						<li>Fresh fruit for you</li>
						<li>A place for fruits</li>
						<li>Find your fruit here</li>
					</ol>
				</div>
				<div class="col-md-4 w3l_banner_nav_right_banner3_btml">
					<div class="view view-tenth">
						<img src="images/20.jpg" alt=" " class="img-responsive" />
						<div class="mask">
							<h4>Emandi</h4>
							<p>Beware what you eat, it becomes part of you.</p>
						</div>
					</div>
					<h4>Vegetables</h4>
					<ol>
						<li>Enjoy fresh veggies</li>
						<li>Eat veggies stay healthy</li>
						<li>Switch to veggies</li>
					</ol>
				</div>
				<div class="clearfix"> </div>
			</div>
			<div class="w3ls_w3l_banner_nav_right_grid w3ls_w3l_banner_nav_right_grid_veg">
				<h3 class="w3l_fruit">Fruits</h3>
				<div class="w3ls_w3l_banner_nav_right_grid1 w3ls_w3l_banner_nav_right_grid1_veg">
					<div class="col-md-3 w3ls_w3l_banner_left w3ls_w3l_banner_left_asdfdfd">
						<div class="hover14 column">
						<div class="agile_top_brand_left_grid w3l_agile_top_brand_left_grid">
							<div class="agile_top_brand_left_grid1">
								<figure>
									<div class="snipcart-item block">
										<div class="snipcart-thumb">
											<img src="images/29.png" alt=" " class="img-responsive" /></a>
											<p>Fresh Bananas (1 kg)</p>
											<h4>Rs 20.00 <span>Rs 21.00</span></h4>
										</div>
										<div class="snipcart-details">
											<form action="#" method="post">
												<fieldset>
													<input type="hidden" name="cmd" value="_cart" />
													<input type="hidden" name="add" value="1" />
													<input type="hidden" name="business" value=" " />
													<input type="hidden" name="item_name" value="Fresh Bananas" />
													<input type="hidden" name="amount" value="20.00" />
													<input type="hidden" name="discount_amount" value="0.00" />
													<input type="hidden" name="currency_code" value="INR" />
													<input type="hidden" name="return" value=" " />
													<input type="hidden" name="cancel_return" value=" " />
													<input type="submit" name="submit" value="Add to cart" class="button" />
												</fieldset>
											</form>
										</div>
									</div>
								</figure>
							</div>
						</div>
						</div>
					</div>
					<div class="col-md-3 w3ls_w3l_banner_left">
						<div class="hover14 column">
						<div class="agile_top_brand_left_grid w3l_agile_top_brand_left_grid">
							<div class="agile_top_brand_left_grid_pos">
								<img src="images/offer.png" alt=" " class="img-responsive" />
							</div>
							<div class="agile_top_brand_left_grid1">
								<figure>
									<div class="snipcart-item block">
										<div class="snipcart-thumb">
											<a href="single.php"><img src="images/or.jpg" alt=" " class="img-responsive" /></a>
											<p>Orange (1 Kg)</p>
											<h4>Rs 15.00 <span>Rs 16.00</span></h4>
										</div>
										<div class="snipcart-details">
											<form action="#" method="post">
												<fieldset>
													<input type="hidden" name="cmd" value="_cart" />
													<input type="hidden" name="add" value="1" />
													<input type="hidden" name="business" value=" " />
													<input type="hidden" name="item_name" value="orange" />
													<input type="hidden" name="amount" value="15.00" />
													<input type="hidden" name="discount_amount" value="0.00" />
													<input type="hidden" name="currency_code" value="INR" />
													<input type="hidden" name="return" value=" " />
													<input type="hidden" name="cancel_return" value=" " />
													<input type="submit" name="submit" value="Add to cart" class="button" />
												</fieldset>
											</form>
										</div>
									</div>
								</figure>
							</div>
						</div>
						</div>
					</div>
					<div class="col-md-3 w3ls_w3l_banner_left w3ls_w3l_banner_left_asd">
						<div class="hover14 column">
						<div class="agile_top_brand_left_grid w3l_agile_top_brand_left_grid">
							<div class="agile_top_brand_left_grid_pos">
								<img src="images/offer.png" alt=" " class="img-responsive" />
							</div>
							<div class="agile_top_brand_left_grid1">
								<figure>
									<div class="snipcart-item block">
										<div class="snipcart-thumb">
											<a href="single.php"><img src="images/gua.jpeg" alt=" " class="img-responsive" /></a>
											<p>Guava (1 kg)</p>
											<h4>Rs 80.00 <span>Rs 81.00</span></h4>
										</div>
										<div class="snipcart-details">
											<form action="#" method="post">
												<fieldset>
													<input type="hidden" name="cmd" value="_cart" />
													<input type="hidden" name="add" value="1" />
													<input type="hidden" name="business" value=" " />
													<input type="hidden" name="item_name" value="Guava" />
													<input type="hidden" name="amount" value="80.00" />
													<input type="hidden" name="discount_amount" value="0.00" />
													<input type="hidden" name="currency_code" value="INR" />
													<input type="hidden" name="return" value=" " />
													<input type="hidden" name="cancel_return" value=" " />
													<input type="submit" name="submit" value="Add to cart" class="button" />
												</fieldset>
											</form>
										</div>
									</div>
								</figure>
							</div>
						</div>
						</div>
					</div>
					<div class="col-md-3 w3ls_w3l_banner_left">
						<div class="hover14 column">
						<div class="agile_top_brand_left_grid w3l_agile_top_brand_left_grid">
							<div class="agile_top_brand_left_grid_pos">
								<img src="images/offer.png" alt=" " class="img-responsive" />
							</div>
							<div class="agile_top_brand_left_grid1">
								<figure>
									<div class="snipcart-item block">
										<div class="snipcart-thumb">
											<a href="single.php"><img src="images/pap.jpg" alt=" " class="img-responsive" /></a>
											<p>Papaya (1 Kg)</p>
											<h4>Rs 15.00 <span>Rs 16.00</span></h4>
										</div>
										<div class="snipcart-details">
											<form action="#" method="post">
												<fieldset>
													<input type="hidden" name="cmd" value="_cart" />
													<input type="hidden" name="add" value="1" />
													<input type="hidden" name="business" value=" " />
													<input type="hidden" name="item_name" value="Papaya" />
													<input type="hidden" name="amount" value="15.00" />
													<input type="hidden" name="discount_amount" value="0.00" />
													<input type="hidden" name="currency_code" value="INR" />
													<input type="hidden" name="return" value=" " />
													<input type="hidden" name="cancel_return" value=" " />
													<input type="submit" name="submit" value="Add to cart" class="button" />
												</fieldset>
											</form>
										</div>
									</div>
								</figure>
							</div>
						</div>
						</div>
					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="w3ls_w3l_banner_nav_right_grid1 w3ls_w3l_banner_nav_right_grid1_veg">
					<div class="col-md-3 w3ls_w3l_banner_left w3ls_w3l_banner_left_asdfdfd">
						<div class="hover14 column">
						<div class="agile_top_brand_left_grid w3l_agile_top_brand_left_grid">
							<div class="agile_top_brand_left_grid_pos">
								<img src="images/offer.png" alt=" " class="img-responsive" />
							</div>
							<div class="agile_top_brand_left_grid1">
								<figure>
									<div class="snipcart-item block">
										<div class="snipcart-thumb">
											<a href="single.php"><img src="images/water.jpg" alt=" " class="img-responsive" /></a>
											<p>Watermelon (1kg)</p>
											<h4>Rs 7.00 <span>Rs 8.00</span></h4>
										</div>
										<div class="snipcart-details">
											<form action="#" method="post">
												<fieldset>
													<input type="hidden" name="cmd" value="_cart" />
													<input type="hidden" name="add" value="1" />
													<input type="hidden" name="business" value=" " />
													<input type="hidden" name="item_name" value="Watermelon" />
													<input type="hidden" name="amount" value="7.00" />
													<input type="hidden" name="discount_amount" value="0.00" />
													<input type="hidden" name="currency_code" value="INR" />
													<input type="hidden" name="return" value=" " />
													<input type="hidden" name="cancel_return" value=" " />
													<input type="submit" name="submit" value="Add to cart" class="button" />
												</fieldset>
											</form>
										</div>
									</div>
								</figure>
							</div>
						</div>
						</div>
					</div>
					<div class="col-md-3 w3ls_w3l_banner_left">
						<div class="hover14 column">
						<div class="agile_top_brand_left_grid w3l_agile_top_brand_left_grid">
							<div class="agile_top_brand_left_grid_pos">
								<img src="images/offer.png" alt=" " class="img-responsive" />
							</div>
							<div class="agile_top_brand_left_grid1">
								<figure>
									<div class="snipcart-item block">
										<div class="snipcart-thumb">
											<a href="single.php"><img src="images/10.png" alt=" " class="img-responsive" /></a>
											<p>Mango (1 kg)</p>
											<h4>Rs 30.00 <span>Rs 31.00</span></h4>
										</div>
										<div class="snipcart-details">
											<form action="#" method="post">
												<fieldset>
													<input type="hidden" name="cmd" value="_cart" />
													<input type="hidden" name="add" value="1" />
													<input type="hidden" name="business" value=" " />
													<input type="hidden" name="item_name" value="mango" />
													<input type="hidden" name="amount" value="30.00" />
													<input type="hidden" name="discount_amount" value="0.00" />
													<input type="hidden" name="currency_code" value="INR" />
													<input type="hidden" name="return" value=" " />
													<input type="hidden" name="cancel_return" value=" " />
													<input type="submit" name="submit" value="Add to cart" class="button" />
												</fieldset>
											</form>
										</div>
									</div>
								</figure>
							</div>
						</div>
						</div>
					</div>
					<div class="col-md-3 w3ls_w3l_banner_left w3ls_w3l_banner_left_asd">
						<div class="hover14 column">
						<div class="agile_top_brand_left_grid w3l_agile_top_brand_left_grid">
							<div class="tag"><img src="images/tag.png" alt=" " class="img-responsive" /></div>
							<div class="agile_top_brand_left_grid1">
								<figure>
									<div class="snipcart-item block">
										<div class="snipcart-thumb">
											<a href="single.php"><img src="images/11.png" alt=" " class="img-responsive" /></a>
											<p>Apple (1 kg)</p>
											<h4>Rs 180.00 <span>Rs 181.00</span></h4>
										</div>
										<div class="snipcart-details">
											<form action="#" method="post">
												<fieldset>
													<input type="hidden" name="cmd" value="_cart" />
													<input type="hidden" name="add" value="1" />
													<input type="hidden" name="business" value=" " />
													<input type="hidden" name="item_name" value="Apple" />
													<input type="hidden" name="amount" value="180.00" />
													<input type="hidden" name="discount_amount" value="0.00" />
													<input type="hidden" name="currency_code" value="INR" />
													<input type="hidden" name="return" value=" " />
													<input type="hidden" name="cancel_return" value=" " />
													<input type="submit" name="submit" value="Add to cart" class="button" />
												</fieldset>
											</form>
										</div>
									</div>
								</figure>
							</div>
						</div>
						</div>
					</div>
					<div class="col-md-3 w3ls_w3l_banner_left">
						<div class="hover14 column">
						<div class="agile_top_brand_left_grid w3l_agile_top_brand_left_grid">
							<div class="agile_top_brand_left_grid_pos">
								<img src="images/offer.png" alt=" " class="img-responsive" />
							</div>
							<div class="agile_top_brand_left_grid1">
								<figure>
									<div class="snipcart-item block">
										<div class="snipcart-thumb">
											<a href="single.php"><img src="images/pom.jpg" alt=" " class="img-responsive" /></a>
											<p>Pomegranate (1 Kg)</p>
											<h4>Rs 90.00 <span>Rs 91.00</span></h4>
										</div>
										<div class="snipcart-details">
											<form action="#" method="post">
												<fieldset>
													<input type="hidden" name="cmd" value="_cart" />
													<input type="hidden" name="add" value="1" />
													<input type="hidden" name="business" value=" " />
													<input type="hidden" name="item_name" value="Pomegranate" />
													<input type="hidden" name="amount" value="90.00" />
													<input type="hidden" name="discount_amount" value="0.00" />
													<input type="hidden" name="currency_code" value="INR" />
													<input type="hidden" name="return" value=" " />
													<input type="hidden" name="cancel_return" value=" " />
													<input type="submit" name="submit" value="Add to cart" class="button" />
												</fieldset>
											</form>
										</div>
									</div>
								</figure>
							</div>
						</div>
						</div>
					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="w3ls_w3l_banner_nav_right_grid1 w3ls_w3l_banner_nav_right_grid1_veg">
					<div class="col-md-3 w3ls_w3l_banner_left w3ls_w3l_banner_left_asdfdfd">
						<div class="hover14 column">
						<div class="agile_top_brand_left_grid w3l_agile_top_brand_left_grid">
							<div class="agile_top_brand_left_grid_pos">
								<img src="images/offer.png" alt=" " class="img-responsive" />
							</div>
							<div class="agile_top_brand_left_grid1">
								<figure>
									<div class="snipcart-item block">
										<div class="snipcart-thumb">
											<a href="single.php"><img src="images/grapes.jpg" alt=" " class="img-responsive" /></a>
											<p>Grapes (1 kg)</p>
											<h4>Rs 35.00 <span>Rs 37.00</span></h4>
										</div>
										<div class="snipcart-details">
											<form action="#" method="post">
												<fieldset>
													<input type="hidden" name="cmd" value="_cart" />
													<input type="hidden" name="add" value="1" />
													<input type="hidden" name="business" value=" " />
													<input type="hidden" name="item_name" value="Grapes" />
													<input type="hidden" name="amount" value="35.00" />
													<input type="hidden" name="discount_amount" value="0.00" />
													<input type="hidden" name="currency_code" value="INR" />
													<input type="hidden" name="return" value=" " />
													<input type="hidden" name="cancel_return" value=" " />
													<input type="submit" name="submit" value="Add to cart" class="button" />
												</fieldset>
											</form>
										</div>
									</div>
								</figure>
							</div>
						</div>
						</div>
					</div>
					<div class="clearfix"> </div>
				</div>
			</div>
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
			for (i = 0; i < len; i++) {
				total += items[i].get('quantity');
			}

			if (total < 3) {
				alert('The minimum order quantity is 3. Please add more to your shopping cart before checking out');
				evt.preventDefault();
			}
		});

	</script>
</body>
</html>
