<?php 
session_start();
if (isset($_SESSION["username"])){
$sesionid=$_SESSION["username"];
header("Location: views/admin.php");
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Libray4U</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>
    <video autoplay loop muted id="background-video">
        <source src="../assets/vid/fondovid.mp4" type="video/mp4">
    </video>
    <header>
        <div class="header-logo">
            <a href="http://localhost/library"><img src="../assets/img/home.jpg" alt="logo" class="logo"></a>
        </div>

        <div class="header-container">
            <span>LIBRARY4U</span>
        </div>
        <div class="header-description">
            <span>Enjoy of sharing ebooks</span>
        </div>
    </header>


<div class="form-container">
    <form action="../models/newuser.php" method="post">

        <label for="username">Username:</label>
        <input type="text" pattern="^[a-zA-Z0-9]+$" name="username" title="Up to 20 mixed alphabetic and numeric characters" maxlength="20" required placeholder="Choose an username...">

        <label for="email">Email:</label>
        <input type="email" name="email" required placeholder="Introduce your email...">

        <label for="telefono">Phone number:</label>
        <input type="text" name="telefono" pattern="^[+]?[0-9]{9,13}$" required placeholder="Write your phone number ...">

        <label>Password:</label>
        <input type="password" name="password" pattern="(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).{8,12}" title="At least:1 uppercase, 1 lowercase, 1 number. Length between 8 and 12 characters"  minlength="8" maxlength="12" required placeholder="Choose your password ...">

        <input type="submit" name="register" value="Register">
    </form>
</div>





</body>

</html>