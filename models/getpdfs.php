<?php
session_start();

if (!isset($_SESSION["username"])) {
  header("Location: ../");
  
}
require_once("conexion.php");
require_once("Libros.php");

$database = new Conexion();
$dbh = $database->getConnection();

$usuario = new Libro($dbh);
$listado=$usuario->getAllLibros();

echo json_encode($listado);






