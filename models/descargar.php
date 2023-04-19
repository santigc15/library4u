<?php
session_start();

if ((!isset($_SESSION["username"]))||(!isset($_POST['idlibro']))) {
  header("Location: ../");
  
};

$id=$_POST['idlibro'];



require_once("conexion.php");
require_once("Libros.php");

$database = new Conexion();
$dbh = $database->getConnection();

$usuario = new Libro($dbh);
$titulo=$usuario->getLibroById($id);

downloadfile($titulo);
$dbh = $database->closeConnection();


function downloadfile($titulo){
// Ruta del archivo que se va a descargar
$fullpath = PDFPATH.$titulo['filename'];

// Nombre con el que se descargará el archivo
$download_name = strtolower($titulo['filename']);

// Tipo de contenido que se va a descargar
$content_type = 'application/pdf';

// Forzamos la descarga del archivo
header('Content-Type: ' . $content_type);
header('Content-Disposition: attachment; filename="' . $download_name . '"');
header('Content-Length: ' . filesize($fullpath));

// Enviamos el contenido del archivo al navegador
readfile($fullpath);

}

