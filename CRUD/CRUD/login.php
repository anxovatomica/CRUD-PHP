<?php
   include("../config.php");
   include("../common.php");

   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $email = mysqli_real_escape_string($mysqli,trim($_POST['email']));
      $password = mysqli_real_escape_string($mysqli,$_POST['password']); 
      
      $sql = "SELECT id FROM user WHERE email = '$email' and password = '$password'";
      $result = mysqli_query($mysqli, $sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      //$active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $email and $password, table row must be 1 row
		
      if($count == 1) {
         //$_SESSION["email"];
         $_SESSION['email'] = $email;
         
         header("location: welcome.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>
<html>
   
   <head>
      <title>Login Page</title>
      
      <style type = "text/css">
         body {
            font-family:Arial, Helvetica, sans-serif;
            font-size:14px;
         }
         label {
            font-weight:bold;
            width:100px;
            font-size:14px;
         }
         .box {
            border:#666666 solid 1px;
         }
      </style>
      
   </head>
   
   <body style= "bgcolor = #FFFFFF">
	
      <div  style = "align = center">
         <div style = "width:300px; border: solid 1px #333333; align = left">
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Login</b></div>
				
            <div style = "margin:30px">
               
               <form action = "" method = "post">
                  <label>Email  :</label><input type = "text" name = "email"/><br /><br />
                  <label>Password  :</label><input type = "password" name = "password"/><br/><br />
                  <input type = "submit" value = " Submit "/><br />
               </form>
               
               <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo "Your Login Name or Password is invalid"; ?></div>
					
            </div>
				
         </div>
			
      </div>

   </body>
</html>