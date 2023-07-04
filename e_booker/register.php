<?php

include 'config/config.php';

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
   $cpass = mysqli_real_escape_string($conn, md5($_POST['cpassword']));

   $select = mysqli_query($conn, "SELECT * FROM `user` WHERE email = '$email'") or die('query failed');

   if(mysqli_num_rows($select) > 0){
      $message[] = 'User already exist';
   }else{
      if($pass != $cpass){
         $message[] = 'Password does not match!';
      }else{
         $insert = mysqli_query($conn, "INSERT INTO `user`(name, email, password) VALUES('$name', '$email', '$pass')") or die('query failed');

         if($insert){
            $message[] = 'Account Registered!';
            header('location:login.php');
         }else{
            $message[] = 'Failed to register account!';
         }
      }
   }

}

?>

<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/ClientSide/html.html to edit this template
-->
<html>
    <head>
        <title>E ★ BOOKER &bull; Register</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/style.css">
    </head>
  <body style="background-image:url('img/bg-login.jpg'); display: flex; justify-content: center; align-items: center;">
        
        <div class="frame" align="middle">
            <h2>Create an account</h2>
            <form action="" id="registerToLogin" method="POST" enctype="multipart/form-data">
                <div class="field">
                    <input type="name" class='textbox' name="name" placeholder="User Name" required="required" autofocus>
                </div>
                <div class="field">
                    <input type="email" class='textbox' name="email" placeholder="Email" required="required">
                </div>
                <div class="field">
                    <input type="password" class='textbox' name="password" placeholder="Password" id="password" required="required">
                </div>
                <div class="field">
                    <input type="password" class='textbox' name="cpassword" placeholder="Confirm Password" id="cpassword" required="required">
                </div>
                 <div class="field">
                    <input type="checkbox" onclick="showPass()">Show Password
                </div>
                <?php
                  if(isset($message)){
                     foreach($message as $message){
                        echo '<div class="message" style="color:red; font-size:12px;">'.$message.'</div><br/>';
                     }
                  }
               ?>
                 <div class="field">
                     <button class="buttondeco" name="submit" type="submit"><b>Register</b></button>
                </div>
                <div class="field">
                     <a style="font-family:'verdana'" href="login.php">Already have an account?</a>
                </div>
                <!-- Other login methods
                <div class="field">
                     <a style="font-family:'verdana'" href="other_login.php">Looking for other login methods?</a>
                </div>
                -->
        
    <script src="js/main.js"></script>
    </body>
</html>
