<?php
    
     include('register.php');
     $sql1="SELECT * FROM product";
     $res1=mysqli_query($link,$sql1);
     if(!$res1)
     {
         echo "error ".mysqli_error($link);
     }


     while($row=mysqli_fetch_assoc($res1))
     {
         $sound=" ";
         if($row['Name']!=null)
         {
              $words=explode(" ",$row['Name']);
              foreach($words as $word)
              {
                 $sound.=metaphone($word)." ";
              }
         }
         $id=$row['pid'];
         $sql2="UPDATE product SET indexing='$sound' WHERE pid=$id";
         $res2=mysqli_query($link,$sql2);
         if(!$res2)
         {
             echo mysqli_error($link);
         }
     }


 ?>