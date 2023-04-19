<?php
session_start();

if ((!isset($_SESSION["username"]))||(!isset($_POST['submitted']))) {
  header("Location: ../");
  
};

$id=$_POST['id'];
$downloads=$_POST['downloads'];
$downloads++;



require_once("conexion.php");
require_once("Libros.php");

$database = new Conexion();
$dbh = $database->getConnection();

$user = new Libro($dbh);
$title=$user->getLibroById($id);
$updatedown=$user->updateDownloadsById($id,$downloads);
$dbh = $database->closeConnection();
downloadfile($title);




function downloadfile($title){
// Ruta del archivo que se va a descargar
$fullpath = PDFPATH.$title['filename'];

// Nombre con el que se descargará el archivo
$download_name = strtolower($title['filename']);

// Tipo de contenido que se va a descargar
$content_type = 'application/pdf';

// Forzamos la descarga del archivo
header('Content-Type: ' . $content_type);
header('Content-Disposition: attachment; filename="' . $download_name . '"');
header('Content-Length: ' . filesize($fullpath));
ob_clean();
// Enviamos el contenido del archivo al navegador
readfile($fullpath);
header("Location: ../");
exit;
}

