<?php
session_start();
unset($_SESSION["username"]);
unset($_SESSION["id"]);
unset($_SESSION["email"]);
unset($_SESSION["telefono"]);
session_destroy();
header("Location: ../");

?>


