<?php 
if(!empty($_COOKIE['payment'])&&($_COOKIE['payment']==true))
header('location:invoice.php');
else
header('location:checkout.php');
?>

