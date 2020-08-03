<?php
require_once "register.php";
session_start();
$CONTACT="";
$CONTACT_err="";
$a="";


	$CONTACT=$_SESSION["phone"];
    $NAME=htmlspecialchars($_SESSION["name"]);
    $Invoice=$_SESSION['a'];
    $amt=$_COOKIE['product'];
    $crd=htmlspecialchars($_SESSION["cardno"]);
		require('textlocal.class.php');

		$textlocal = new Textlocal(false, false,'lfotIw1FFnQ-B0jVy4xsgZpcWbWmYiJ47Ah9S1C2py');

		// You can access MOBILE from credential.php
		// $numbers = array(MOBILE);
		// Access enter mobile number in input box
		$numbers = array($_SESSION["phone"]);
		$sender = 'TXTLCL';
		
        $message = "Hello:".$NAME." Invoice Number:".$Invoice." Total Amount:".$amt.
        " Card Number:".$crd ;
		try {
			$result = $textlocal->sendSms($numbers, $message, $sender);
			$a="Invoice successfully send..";
			echo $a;
		} catch (Exception $e) {
			die('Error: ' . $e->getMessage());
		}
	
	mysqli_close($link);

?>
