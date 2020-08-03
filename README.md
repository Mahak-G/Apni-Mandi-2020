# RA27_Shakti_WIMDR
## APNI MANDI - An E-Commerce Portal providing direct link between Farmers and Buyers
<p>

> <em> Agriculture is known as primary sector of country and contributes only 17% GDP of country by providing 53% employment.
Farmers are directly linked to agriculture sector but many of them are committing suicide or have big loans to pay. 
Main root causes are low selling price, corruption of aarthis, spoilage of production etc. With this website, we ought to solve this problem by removing the aarthi 
from this process so that both buyers and sellers can benefit from the same. In these times of pandemic too, the farmers are suffering a lot, as people are skeptical
about going to market to buy veggies and consider online buying a favourable option. </em>
</p>

## Demo Images:
<b><em>These images show how the website is displayed and how it works .</em></b><br><br>
<img src="https://github.com/AyushiAgrawal9501/RA27_Shakti_WIMDR/blob/master/images/initial.jpg" height="300" width="500" />
<img src="https://github.com/AyushiAgrawal9501/RA27_Shakti_WIMDR/blob/master/images/signup.jpg" height="300" width="500" />
<br><br><b><em>While registering on the website, OTP verification is done by sending otp messages through textlocal.in .</em></b><br><br>
<img src="https://github.com/AyushiAgrawal9501/RA27_Shakti_WIMDR/blob/master/images/otp.jpg" height="300" width="500" />
<img src="https://github.com/AyushiAgrawal9501/RA27_Shakti_WIMDR/blob/master/images/signin.jpg" height="300" width="500" />
<img src="https://github.com/AyushiAgrawal9501/RA27_Shakti_WIMDR/blob/master/images/accountdet.jpg" height="300" width="500" />
<img src="https://github.com/AyushiAgrawal9501/RA27_Shakti_WIMDR/blob/master/images/cart.jpeg" height="300" width="500" />
<br><br><b><em>Both pickup and doorstep delivery options are provided. If you select pickup, the farmer with the same pincode as yours or the 
nearest farmer with the available products is displayed.</em></b><br><br>
<img src="https://github.com/AyushiAgrawal9501/RA27_Shakti_WIMDR/blob/master/images/payment.jpeg" height="300" width="500" />
<img src="https://github.com/AyushiAgrawal9501/RA27_Shakti_WIMDR/blob/master/images/famer%20gps.jpeg" height="300" width="500" />
<img src="https://github.com/AyushiAgrawal9501/RA27_Shakti_WIMDR/blob/master/images/pay%20card.jpeg" height="300" width="500" />
<img src="https://github.com/AyushiAgrawal9501/RA27_Shakti_WIMDR/blob/master/images/invoice.jpeg" height="300" width="500" />
<br><br><b><em>Google Action Invocation is displayed in the image below.</em></b><br><br>
<img src="https://github.com/AyushiAgrawal9501/RA27_Shakti_WIMDR/blob/master/images/gac.png" height="300" width="500" />


## Overview:
- The front end of the website is made using html , CSS and javascript.
- PHP is used for server site scripting along with Node js. 
- Python and R are used for machine learning algorithms.
- <b><em>Google Actions</em></b> is used to provide chatbot service and app invocation by Google Assistant.
- <b><em>Textlocal.in</em></b> is used t send messages for otps and order confirmation and status.
- All the queries are written in PDO style so there can be <b><em>no SQL injection</em></b> .
- HTML special chars and HTML entities are used wherever possible to <b><em>prevent XSS attacks</em></b>.
- For payment purpose, we are importing a card.ods file to check card values against it, so you need to import the file in the database.
- All the databases would be automatically made once you run the code.
- <b><em>ML Algorithms</em></b> are used for <b><em>metaphor searching</em></b> and <b><em>cost and consumption prediction</em>.</b>
- <b><em>GPS Tracking and Pincode Tracking</em></b> to find nerby farmers with the products you want to buy.
- <b><em>Doorstep delivery and Pickup Options available</em></b>.
- <b><em>Regional language support</em></b> for a variety of languages using the <b><em>"go translate" plugin by the Ministry of Electronics.</em></b>

## Technology stack:
### Languages:
     Python, R, MySQL, CSS, HTML, JavaScript, PHP , Node js
### Software: 
     Tenser flow , Anaconda, Visual studio code , Image editors , GitHub, Google   
     chatbot ,  MySQL workbench, Xampp, Rstudio, R-3.3.1, WhatsApp(or corresponding 
     social media), PHPMyAdmin, TextLocal.in  , "go translate" plugin. 
     
## Installation:
### To run the website on local host
- Make sure all the required software are installed on your computer
- Run the Apache and Mysql servers.
- Save all the code as it is in a folder in htdocs in xampp.
- <em>Make an account on Textlocal.in</em> and use it in code.
- Download "go translate" plugin from https://localization.gov website .
- Go to localhost/filename and run the website.
- Import the card.ods file in the database.
