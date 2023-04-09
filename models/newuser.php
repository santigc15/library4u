<?php


if (isset($_POST['register'])) {
    require_once("conexion.php");
    require_once("usuarios.php");

    $username = $_POST['username'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $database = new Conexion();
    $dbh= $database->getConnection();

    $usuario= new  Usuario($dbh);
    $usuario->insertUser($username,$email,$telefono,$password);
    $dbh= $database->closeConnection();
   


    header('Location: ../views/login.php');
} else {
    header('Location: ../views/register.php');
}
?>
