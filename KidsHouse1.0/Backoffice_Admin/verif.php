<?php

   $servername = "localhost";
   $username = "root";
   $password = "";
   $dbname = "tp_db";

     // Create connection
     $conn = new mysqli($servername, $username, $password, $dbname);

     
     $email=$_POST['username'];
     $password=$_POST['password'];

      $sql="select * from user where email ='$email' and password = '$password'" ;
     $res= mysqli_query($conn,$sql);
      $nbr=mysqli_num_rows($res);
      if($nbr==1)
      {echo "Success";
  		session_start();
  		 $_SESSION["email"]=$email;
  		 

}
      	
      else
      	echo "echec";

?>