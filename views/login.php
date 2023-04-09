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
      <form action="../models/validate.php" method="post">
        <label for="username">Username:</label>
        <input type="text" name="username" required placeholder="Type your username...">
        <label for="password">Password:</label>
        <input type="password" name="password" required placeholder="Type your password..."> 
        <input type="submit" name="login" value="Login">
      </form>
    </div>


</body>

</html>