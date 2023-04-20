<?php
session_start();

if ((!isset($_SESSION["username"])) || (!isset($_POST['submitted']))) {
    header("Location: ../");
};
require_once("conexion.php");
require_once("Libros.php");


$id = $_POST['id'];
$noextensionname = $_POST['filename'];
$fullpath = PDFPATH . $noextensionname . ".pdf";



$database = new Conexion();
$dbh = $database->getConnection();

$usuario = new Libro($dbh);
$listado = $usuario->deleteLibroById($id);
if (file_exists($fullpath)) {
    unlink($fullpath);
    $dbh = $database->closeConnection();
    header("Location: ../views/admin.php");
} else {
    echo "El archivo $fullpath no existe.";
}
