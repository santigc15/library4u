<?php
session_start();

if (isset($_POST['modify'])) {
    require_once("conexion.php");
    require_once("usuarios.php");



    $database = new Conexion();
    $dbh = $database->getConnection();

    $usuario = new Usuario($dbh);


    if (isset($_POST['newpassword'])) {

        $password = password_hash($_POST['newpassword'], PASSWORD_DEFAULT);
        $usuario->updatePassword($_SESSION["id"], $password);
    }




    $dbh = $database->closeConnection();



    header('Location: ../views/admin.php');
} else {
    header('Location: ../index.php');
}
