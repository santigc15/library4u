<?php
session_start();

if (!isset($_SESSION["username"])) {
  header("Location: ../");
  
}elseif ($_FILES['archivo']['size']>26214400){

  echo json_encode("Error tamaño excesivo");

}else{
  require_once("conexion.php");
  require_once("Libros.php");
  
  
  // Obtenemos la información del archivo
  $filename = $_FILES['archivo']['name'];
  $filesize = $_FILES['archivo']['size'];
  $temporalpath = $_FILES['archivo']['tmp_name'];
  $userid = $_SESSION['id'];
  
  
  // Movemos el archivo a la ruta de destino
  $pdfpath = PDFPATH . $filename;
  
  move_uploaded_file($temporalpath, $pdfpath);
  
  
  $database = new Conexion();
  $dbh = $database->getConnection();
  
  $usuario = new Libro($dbh);
  $usuario->insertLibro($filename,$filesize,$userid);
  echo json_encode("Archivo subido");
}






