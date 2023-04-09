<?php
session_start();

if (isset($_POST['modify'])) {
    require_once("conexion.php");
    require_once("usuarios.php");


    $database = new Conexion();
    $dbh = $database->getConnection();

    $usuario = new Usuario($dbh);


    if ($_POST['telefono'] != $_SESSION["telefono"]) {
        $_SESSION["telefono"]=$_POST['telefono'];
        $usuario->updateTelefono($_SESSION["id"], $_SESSION["telefono"]);
    }

    if ($_POST['username'] != $_SESSION["username"]) {
        $_SESSION["username"]=$_POST['username'];
        $usuario->updateUsername($_SESSION["id"], $_SESSION["username"]);
    }

    if ($_POST['email'] != $_SESSION["email"]) {
        $_SESSION["email"]=$_POST['email'];
        $usuario->updateEmail($_SESSION["id"], $_SESSION["email"]);
    }



    $dbh = $database->closeConnection();



    header('Location: ../views/admin.php');
} else {
    header('Location: ../index.php');
}
