<?php
session_start();

require_once("conexion.php");
require_once("usuarios.php");



if (isset($_POST['delete'])) {


    if ($_POST['delete'] == "Yes") {
        $id=$_SESSION["id"];
        unset($_SESSION["username"]);
        unset($_SESSION["id"]);
        unset($_SESSION["email"]);
        unset($_SESSION["telefono"]);
        session_destroy();

        $database = new Conexion();
        $dbh = $database->getConnection();
    
        $usuario = new Usuario($dbh);

        $usuario->deleteUserById($id);
        $dbh = $database->closeConnection();
        header('Location: ../');
    }






    header('Location: ../views/admin.php');
}else {

    header('Location: ../index.php');
}
