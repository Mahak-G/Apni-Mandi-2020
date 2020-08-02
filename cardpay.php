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


require_once "register.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){
	
	echo "reached";
 
    $name=$_POST["name"];
	$no=$_POST["cardno"];
	$cvv=$_POST["cvv"];
	$exp=$_POST["exp"];
	$balance = 0;
	
        $sql = "SELECT Balance FROM card WHERE cardname = ? AND Cardno = ? AND cvvno = ?";
		echo "1";
        
        if($stmt = mysqli_prepare($link, $sql)){
          echo "2";
            mysqli_stmt_bind_param($stmt, "sdi", $name , $no , $cvv);
            echo "3";
            if(mysqli_stmt_execute($stmt)){
        echo "4";
                mysqli_stmt_store_result($stmt);
              echo "5";
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    echo "6";
                    mysqli_stmt_bind_result($stmt, $balance);
echo "7";
                    if(mysqli_stmt_fetch($stmt)){
						echo "8";
                            session_start();
                            echo "9";
                            // Store data in session variables
                            $_SESSION["balance"] = $balance;
                            $_SESSION["name"] = $name; 
                            $_SESSION["cardno"] = $no; 							
                            
                            // Redirect user to welcome page
                            header("location: done.php");
                    }else{
						echo "10";
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