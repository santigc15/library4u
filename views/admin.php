<?php
session_start();
if (isset($_SESSION["username"])) {
    $sessionid = $_SESSION["username"];
} else {
    header("Location: ../");
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
    <script src="../assets/js/codigo.js"></script>
</head>

<body>
    <video autoplay loop muted id="background-video">
        <source src="../assets/vid/fondovid.mp4" type="video/mp4">
    </video>
    <header>
        <div class="header-logo admin">
            <a href="" id="enlace" class="hadmin"><img src="../assets/img/profile.jpg" alt="logo" title="PROFILE" class="logo"></a>
            <a href="" id="home" class="hadmin"><img src="../assets/img/home.jpg" alt="logo" title="HOME" class="logo"></a>
            <a href="http://localhost/library/models/logout.php" class="hadmin"><img src="../assets/img/logout.jpg" alt="logo" title="LOGOUT" class="logo"></a>
        </div>

        <div class="header-container">
            <span>LIBRARY4U</span>
        </div>
        <div class="header-description">
            <span>Welcome <?php echo "$sessionid" ?></span>
        </div>
    </header>
    <section id="profile"></section>




</body>

</html>