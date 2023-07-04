<?php include('config/constants.php'); ?>
<?php

include 'config/config.php';
$_SESSION['rand'] = null;

if(isset($_POST['submit'])){
 
 $email = mysqli_real_escape_string($conn, $_POST['email']);
 $pass = mysqli_real_escape_string($conn, md5($_POST['password']));

 $select = mysqli_query($conn, "SELECT * FROM `user` WHERE email = '$email' AND password = '$pass'") or die('query failed');

 if(mysqli_num_rows($select) > 0){
    $row = mysqli_fetch_assoc($select);
    $_SESSION['user_id'] = $row['id'];
    $_SESSION['user_name'] = $row['name'];
    header('location:index.php');
 }else{
    $message[] = 'Incorrect email or password!';
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
        <title>E ★ BOOKER &bull; Login</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body style="background-image:url('img/bg-login.jpg'); display: flex; justify-content: center; align-items: center;" id="welcome">
        <div style="width:75%;overflow:hidden"></div>
        
        <div class="frame" align="middle">
            <a href="index.php"><img class="login-logo" src="img/E-Booker.jpg" alt="main_logo" width="235"/></a>
            <form action="" id="loginToIndex" method="POST" enctype="multipart/form-data">
                <div class="field">
                    <input type="email" class="textbox" name="email" placeholder="Email" required="required" autofocus>
                </div>
                <div class="field">
                    <input type="password" class="textbox" name="password" placeholder="Password" id="pass" required="required">
                </div>
                <?php
                    if(isset($message)){
                        foreach($message as $message){
                        echo '<div class="message" style="color:red; font-size:12px;">'.$message.'</div><br/>';
                        }
                    }
                ?>
                 <div class="field">
                     <button class="buttondeco" name="submit" type="submit"><b>Log In</b></button>
                </div>
                <div class="field">
                     <a style="font-family:'verdana'" href="password-reset.php">Forgot password?</a>
                </div>
                <div style="width:90%"><hr color="#999999"></div>
                
                <a href="register.php" class="button_register" style="font-family:'verdana'"><b>Create an Account</b></a>
            </form>
        </div>
        
        <script src="js/main.js"></script>
    </body>
</html>
