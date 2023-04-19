<?php


if (isset($_POST["login"])) {

    require_once("conexion.php");
    require_once("Usuarios.php");

    $username = $_POST["username"];
    $password = $_POST["password"];


    $database = new Conexion();
    $dbh = $database->getConnection();

    $validate = new Usuario($dbh);
    $validate->checkUser($dbh, $username, $password);

    $dbh = $database->closeConnection();


    header("Location: ../views/admin.php");
} else {
    header("Location: ../login.php");
}
