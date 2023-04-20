<?php
session_start();

if (!isset($_SESSION["username"])) {
  header("Location: ../");
  
}


$userid=$_SESSION["id"];


require_once("conexion.php");
require_once("Libros.php");

$database = new Conexion();
$dbh = $database->getConnection();

$user = new Libro($dbh);
$listado=$user->getAllLibrosByUser($userid);

$dbh = $database->closeConnection();
echo json_encode($listado);
