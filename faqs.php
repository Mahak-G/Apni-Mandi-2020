
<!DOCTYPE html>
<html>
<head>
<title>Emandi/FAQS</title>
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
				<li><i class="fa fa-home" aria-hidden="true"></i><a href="index.html">Home</a><span>|</span></li>
				<li>FAQ's</li>
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
			<h3>FAQ's</h3>
			<div class="panel-group w3l_panel_group_faq" id="accordion" role="tablist" aria-multiselectable="true">
			  <div class="panel panel-default">
				<div class="panel-heading" role="tab" id="headingOne">
				  <h4 class="panel-title asd">
					<a class="pa_italic" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
					  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span><i class="glyphicon glyphicon-minus" aria-hidden="true"></i>Registration
					</a>
				  </h4>
				</div>
				<div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
				  <div class="panel-body panel_text">
				<p>	1.	How do I register? </p>
<p>You can register by clicking on the "Register" link at the top right corner of the homepage. Please provide the information in the form that appears. You can review the terms and conditions, provide your payment mode details and submit the registration information. Through sign up, you have to provide mobile number, compulsory for everyone and will be verified, email optional for notifications or newsletter, username, password, address. </p>
<br>
<p>2.	Are there any charges for registration?  </p>
<p>No. Registration on apni mandi is absolutely free.  </p>
<br>
<p>3.	Do I have to necessarily register to shop on apni mandi? </p>
<p>You can shop on apni mandi without creating an account by our guest login facility. </p>
<br>
<p>4.	Can I have multiple registrations?   </p>
<p>Each email address and contact phone number can only be associated with one apni mandi account.  </p>
<br>
<p>5.	Can I add more than one delivery address in an account? </p>
<p>Yes, you can add multiple delivery addresses in your apni mandi account. However, remember that all items placed in a single order can only be delivered to one address. If you want different products delivered to different address you need to place them as separate orders. </p>
<br>
<p>6.	Can I have multiple accounts with same mobile number and email id?  </p>
<p>Each email address and phone number can be associated with one apni mandi account only.  </p>
<br>
<p>7.	Can I have multiple accounts for members in my family with different mobile number and email address but same or common delivery address?   </p>
<p>Yes, we do understand the importance of time and the toil involved in shopping groceries. Up to three members in a family can have the same address provided the email address and phone number associated with the accounts are unique.  </p>
<br>
<p>8.	Can I have different city addresses under one account and still place orders for multiple cities?  </p>
<p>Yes, you can place orders for multiple cities.                                                                    </p>
				  </div>
				</div>
			  </div>
			  <div class="panel panel-default">
				<div class="panel-heading" role="tab" id="headingTwo">
				  <h4 class="panel-title asd">
					<a class="pa_italic collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
					  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span><i class="glyphicon glyphicon-minus" aria-hidden="true"></i>Account Related
					</a>
				  </h4>
				</div>
				<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
				   <div class="panel-body panel_text">
					<p>1.	What is My Account? </p>
<p>My Account is the section you reach after you log in at apni mandi. My Account allows you to track your active orders, credit note details as well as see your order history and update your contact details.</p>
<br>
<p>2.	How do I reset my password?</p>
<p>You need to enter your email address on the Login page and click on forgot password. An email with a reset password will be sent to your email address. With this, you can change your password. In case of any further issues please contact our customer support team.</p>
<br>
<p>3.	What are credit notes & where can I see my credit notes?</p>
<p>Credit notes reflect the amount of money which you have pending in your apni mandi account to use against future purchases. This is calculated by deducting your total order value minus undelivered value. You can see this in "My Account" under credit note details. </p>
<br>
<p>4.	What is My Shopping List?</p>
<p>My Shopping List is a comprehensive list of all the items previously ordered by you on apni mandi. This enables you to shop quickly and easily in future. </p>
				  </div>
				</div>
			  </div>
			  <div class="panel panel-default">
				<div class="panel-heading" role="tab" id="headingThree">
				  <h4 class="panel-title asd">
					<a class="pa_italic collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
					  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span><i class="glyphicon glyphicon-minus" aria-hidden="true"></i>Payment
					</a>
				  </h4>
				</div>
				<div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
				   <div class="panel-body panel_text">
					<p>1.	What are the modes of payment?</p>
<p>You can pay for your order on apni mandi using the following modes of payment:</p>
<p>a. Cash on delivery</p>
<p>b. Credit and debit cards (VISA / Mastercard / Rupay)</p>
<p>c. Third party apps (Paytm / Phonepay / Google Pay)</p>
<br>
<p>2.	Are there any other charges or taxes in addition to the price shown? Is VAT added to the invoice?</p>
<p>There is no VAT. However, GST will be applicable as per Government Regulations.</p>
<br>
<p>3.	Is it safe to use my credit/ debit card on apni mandi?</p>
<p>Yes, it is absolutely safe to use your card on apni mandi. A recent directive from RBI makes it mandatory to have an additional authentication pass code verified by VISA (VBV) or MSC (Master Secure Code) which has to be entered by online shoppers while paying online using visa or master credit card. It means extra security for customers, thus making online shopping safer.</p>
<br>
<p>4.	What is the meaning of cash on delivery?</p>
<p>Cash on delivery means that you can pay for your order at the time of order delivery at your doorstep.</p>
<br>
<p>5.	If I pay by credit card how do I get the amount back for items not delivered?</p>
<p>If we are not able to delivery all the products in your order and you have already paid for them online, the balance amount will be refunded to your apni mandi account as store credit and you can use it at any time against your future orders. Should you want it to be credited to your bank account please contact our customer support team and we will refund it back on to your card.   </p>

				  </div>
				</div>
			  </div>
			  <div class="panel panel-default">
				<div class="panel-heading" role="tab" id="headingFour">
				  <h4 class="panel-title asd">
					<a class="pa_italic collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
					  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span><i class="glyphicon glyphicon-minus" aria-hidden="true"></i>Delivery Related
					</a>
				  </h4>
				</div>
				<div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
				   <div class="panel-body panel_text">
					<p>1.	When will I receive my order?</p>
<p>Once you are done selecting your products and click on checkout , the date on which you receive the order will also be displayed according to the place you live and the place you order from.</p>
<br>
<p>2.	How are the fruits and vegetables packaged?</p>
<p>Fresh fruits and vegetables are handpicked, hand cleaned and hand packed in reusable plastic trays covered with cling. We ensure hygienic and careful handling of all our products.</p>
<br>
<p>3.	How will the delivery be done?</p>
<p>We use third party delivery service to deliver the products (cost of delivering will be added separately).</p>
<br>
<p>4.	How do I change the delivery info (address to which I want products delivered)?</p>
<p>You can change your delivery address on our website once you log into your account. Click on "My Account" at the top right-hand corner and go to the "Update My Profile" section to change your delivery address. However you cannot change the delivery address of an order once placed and shipped.</p>
<br>
<p>5.	How much are the delivery charges?</p>
<p>You will be able to check this detail at the time of checkout when you enter the address.</p>
<br>
<p>6.	Do you deliver in my area?</p>
<p>You will be able to check this detail at the time of checkout when you enter the address. If we are unable to deliver in your area - we will inform you before checkout.</p>
<br>
<p>7.	Will someone inform me if my order delivery gets delayed?</p>
<p>In case of a delay, our customer support team will keep you updated about your delivery.</p>
<br>
<p>8.	What is the minimum order for delivery?</p>
<p>There is no minimum order for delivery. </p>
<br>
<p>9.	Do you do same day delivery? </p>
<p>It depends on the delivery location provided by you and the place from where you order your products.</p>

				  </div>
				</div>
			  </div>
			   <div class="panel panel-default">
				<div class="panel-heading" role="tab" id="headingFive">
				  <h4 class="panel-title asd">
					<a class="pa_italic collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
					  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span><i class="glyphicon glyphicon-minus" aria-hidden="true"></i>Order Related
					</a>
				  </h4>
				</div>
				<div id="collapseFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive">
				   <div class="panel-body panel_text">
					<p>1.	How do I add or remove products after placing my order?</p>
<p>Once you have placed your order you will not be able to make modifications on the website. Please contact our customer support team for any modification of order.</p>
<br>
<p>2.	Is it possible to order an item which is out of stock?</p>
<p>No you can only order products which are in stock. We try to ensure availability of all products on our website however due to supply chain issues sometimes this is not possible. </p>
<br>
<p>3.	How do I check the current status of my order? </p>
<p>You will be provided an option to track the delivery of your order.</p>
<p>To do so, go on your orders page, select the order you want to track , open its details and click on track order option. You will be able to see the status of your order at all times.</p>
<br>
<p>4.	How do I check which items were not available from my order? Will someone inform me about the items unavailable in my order before delivery?</p>
<p>You will be able to see that on your order details page as your products can be shipped t you in various different shipments based on the location from which you ordered and the size of your order.</p>
<br>
<p>5.	Why is there an order cancellation fee?</p>
<p>YOU DO NOT NEED TO PAY ANY CANCELLATION FEE IF YOUR ORDER HAS NOT BEEN SHIPPED.</p>
<p>We charge an order cancellation fee to compensate for the charges incurred in shipping the order and time and effort incurred towards processing an order. Every order placed has to undergo a system driven process as well as a manual process in order to make sure the order reaches our customers on time, every time. For this purpose, a slot is booked for every order that gets placed in our system and the order picking process happens seamlessly. In this entire process we incur labour as well as an opportunity cost on the booked slot. During the event of a cancellation the entire process has to be stopped and reset. This takes up considerable processing time to open the slot yet again for another customer to order.</p>
<br>
<p>6.	What You Receive Is What You Pay For. </p>
<p>At the time of delivery, we advise you to kindly check every item as in the invoice. Please report any missing item that is invoiced. As a benefit to our customers, if you are not available at the time of order delivery or you haven’t checked the list at the time of delivery, we provide a window of 48hrs to report missing items. This is applicable only for items that are invoiced.</p>
<br>
<p>7.	When and how can I cancel an order?</p>
<p>You can cancel an order before it is shipped by contacting our customer support team or you can also cancel your order from the Customer Service section on the apni mandi app.</p>
<p>IF YOUR ORDER IS SHIPPED, IT CAN NOT BE CANCELLED AND IF YOU REFUSE TO TAKE THE ORDER, A CANCELLATION FEE WILL BE DEDUCTED. </p>

				  </div>
				</div>
			  </div>
			   <div class="panel panel-default">
				<div class="panel-heading" role="tab" id="headingSix">
				  <h4 class="panel-title asd">
					<a class="pa_italic collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
					  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span><i class="glyphicon glyphicon-minus" aria-hidden="true"></i>Customer Service Related 
					</a>
				  </h4>
				</div>
				<div id="collapseSix" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSix">
				   <div class="panel-body panel_text">
					<p>1.	How do I contact customer service?<p>
<p>Our customer service team is available throughout the week, all seven days from 7 am to 10 pm. You can see other details on the customer service page.</p>
<br>
<p>2.	What are your timings to contact customer service?</p>
<p>  	Our customer service team is available throughout the week, all seven days from 7 am to 10 pm.</p>
<br>
<p>3.	How can I give feedback on the quality of customer service?</p>
<p>Our customer support team constantly strives to ensure the best shopping experience for all our customers. We would love to hear about your experience with Apni Mandi. You can mail us on the email provided on the customer service page.</p>
<br>
<p>4.	How do I raise a claim with customer service for any of the Guarantees - Delivery Guarantee, Quality Guarantee?</p>
<p>If you face any issues with price, quality or delivery of products we will take every measure to address the issue and make it up to you. Please contact our customer support team with details or your order as well as the issue you faced.</p>
<p>Returns & Refund Policy (Updated)</p>
<p>We have a "no questions asked return at delivery and refund policy" which entitles all our members to return the product at the time of  delivery if due to some reason they are not satisfied with the products delivered. We will take the returned product back with us and issue a credit note for the value of the returned products which will be credited to your account on Apni Mandi. This can be used to pay for your subsequent shopping bills. </p>
<p>Post-delivery returns are accepted only if there is an issue with the quality or freshness of the food products or if the product you received is damaged in case of non-food products. In such cases, we will issue a credit note for the value of the returned products which will be credited to your account on Apni Mandi. This can be used to pay for your subsequent shopping bills.</p>
<p>Acceptance of returns & refund post-delivery is subject to a satisfactory inspection by our customer service team. Please get in touch with us via self-service on the Apni Mandi app or call on 1860 123 1000 for any such requests.</p>
<br>
<p>5.	Do you have offline stores?</p>
<p>No we are a purely internet based company and do not have any brick and mortar stores.</p>
<br>
<p>6.	What do I do if an item is defective (broken, leaking, expired)?</p>
<p>We have a no questions asked return policy. In case you are not satisfied with a product received you can return it to the delivery personnel at time of delivery or you can contact our customer support team and we will do the needful.</p>
<br>
<p>7.	How will I get my money back in case of a cancellation or return?</p>
<p>What are the modes of refund? If payed by COD, you have to provide your account details for refund. In other cases, the amount is refunded to your original method of payment. The money will be credited back to your account in 7-10 working days.  Please contact customer support for any further assistance regarding this issue.</p>
<br>
<p>8.	I am a corporate/ business. Can I place orders with Apni Mandi.com?</p>
<p>Yes, we do bulk supply of products at special prices to institutions such as schools, restaurants and corporates. Please contact at our customer service for more details.</p>
<br>
<p>9.	How & where I can give my feedback?</p>
<p>We always welcome feedback, both positive and negative from all our customers. Please feel free to write to us at our customer service email. You can give reviews for the products you purchased.</p>

				  </div>
				</div>
			  </div>
			   <div class="panel panel-default">
				<div class="panel-heading" role="tab" id="headingSeven">
				  <h4 class="panel-title asd">
					<a class="pa_italic collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
					  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span><i class="glyphicon glyphicon-minus" aria-hidden="true"></i>Seller / Farmer Related
					</a>
				  </h4>
				</div>
				<div id="collapseSeven" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSeven">
				   <div class="panel-body panel_text">
					<p>1.	How to register as a seller on Apni Mandi?</p>
<p>To register as a seller on Apni Mandi, you have to create an account as a seller and provide information asked (such as Place where you reside and the address of your land, your account details for the account you want payment in, the types of fruits and vegetables you grow , etc ) , which would then be verified with us . Once verified, you will officially be a seller and you can list the products and the prices for your products on the basis of daily market price displayed for the product.</p>
<br>
<p>2.	How does selling on Apni Mandi works?</p>
<p>Selling on Apni Mandi is very easy. You just need to add the list of products you want to sell along with appropriate prices for them according to the daily market price displayed on the website. To add the products, go to sell option, add the products you want to sell, give their description, quality, type, apt price, whether they are organically sourced or not , etc and add the products along with the qty displayed. Once a customer likes your product, they can go and buy it and once your order is checked for quality and shipped, you get your profit, after deducting our percentage for service. In case of any query, you can contact our customer care team or use our chatbot services.</p>
<br>
<p>3.	Will the customer be able to see the seller he/she is purchasing the product on?</p>
<p>Yes, the buyer will be able to see the seller and after the purchase they can rate your products and you as a seller, so if your products are not good, they can rate you less as a seller too.</p>
<br>
<p>4.	What can I do to increase the demand for my product or to have my product in the mandi choice department and recommended department?</p>
<p>You do not need to worry about these things, in fact, you should focus on providing the correct description and quality for your product.As people buy your product, they are asked to rate them and as per your ratings and reviews and customer satisfaction scores, our website decides to recommend your products or not.</p>
<br>
<p>5.	Do I have to pay to the website for the services?</p>
<p>YES, BUT IT IS PURELY BASED ON THE PRICE AND AMOUNT OF ORDERS YOU RECEIVE THROUGH THE WEBSITE. THERE ARE NO MONTHLY OR YEARLY CHARGES.</p>
<br>
<p>6.	What do I do if an item broken, leaking, expired in shipping?</p>
<p>Such a matter would be taken care by us. In case of any other such problems, you can contact us through chatbot service or call or emails.</p>
<br>
<p>7.	How much is the operational fee that I have to pay for using the website for selling goods?</p>
<p>This charge is purely based on the price of orders that are placed through our website. We deduct 20% of the order money as operational charge for the website. THERE IS NO MONTHLY OR YEARLY CHARGE. IT IS PURELY ON ORDER BASIS. In case of any query regarding this, you can contact our customer service.</p>
<br>
<p>8.	Do I need to have GST number to be a seller with Apni Mandi.com?</p>
<p>NO, it is not compulsory. Please contact at our customer service for more details.</p>
<br>
<p>9.	How and when do I get paid?</p>
<p>We transfer the money to your account provided once your order is checked for quality and shipped. You will receive the money within a week of the transfer.</p>
<br>
<p>10.	Do I need to courier the products?</p>
<p>No, you do not need to courier the products on your own. We have ties with various courier companies, whose executives will come to collect the order from you, you have to just give them the products.</p>
<br>
<p>11.	I am having problem with my account that I do not understand, what should I do?</p>
<p>You do not need to panic; we are here for your service at all times. You can just call us or have a chat with us. If you are having problems with understanding how to use this website, we also provide virtual assistance with that or at home assistance (if available in your area). Your convenience is our top priority so you can contact us in case of any troubles.</p>

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
