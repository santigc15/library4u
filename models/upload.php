<?php
session_start();
if ((!isset($_SESSION["username"]))||(!isset($_POST['submitted']))) {

    header("Location: ../");
}


require_once("conexion.php");
require_once("Libros.php");
require_once("Pdfvalidate.php");


  // Obtenemos la información del archivo
  $filename = $_FILES['archivo']['name'];
  $temporalpath = $_FILES['archivo']['tmp_name'];


  // Movemos el archivo a la ruta de destino
  $pdfpath = PDFPATH . $filename;

  if (move_uploaded_file( $temporalpath, $pdfpath)) {
    // Archivo subido exitosamente
    echo "El archivo \"$filename\" se ha subido correctamente.";
} else {
    echo "Error al subir el archivo.";
  }
   
$validate= new Pdfvalidate();
$result=$validate->pdfvalidation($pdfpath);







$database = new Conexion();
$dbh = $database->getConnection();

$usuario = new Libro($dbh);

    // Obtener el archivo cargado
    $archivo = $_FILES["archivo"];
    $nombreArchivo = $archivo["name"];
    $tamañoArchivo = $archivo["size"];

    // Obtener la imagen de portada cargada
    $portada = $_FILES["portada"];
    $nombrePortada = $portada["name"];
    $tamañoPortada = $portada["size"];

    // Obtener el ID del usuario que ha subido el archivo (puedes modificar esta lógica según tus necesidades)
    $idUsuario = 1;

    // Mover el archivo cargado y la imagen de portada a la carpeta de destino
    $carpetaDestino = "uploads/"; // Cambiar la ruta de la carpeta de destino según tu configuración
    move_uploaded_file($archivo["tmp_name"], $carpetaDestino . $nombreArchivo);
    move_uploaded_file($portada["tmp_name"], $carpetaDestino . $nombrePortada);

    // Insertar los datos del archivo en la base de datos
    $stmt = $conn->prepare("INSERT INTO archivos (nombre_archivo, tamaño_archivo, nombre_portada, tamaño_portada, id_usuario) VALUES (?, ?, ?, ?, ?)");
    $stmt->bindParam(1, $nombreArchivo);
    $stmt->bindParam(2, $tamañoArchivo);
    $stmt->bindParam(3, $nombrePortada);
    $stmt->bindParam(4, $tamañoPortada);
    $stmt->bindParam(5, $idUsuario);
    $stmt->execute();

    echo "Archivo cargado exitosamente y datos guardados en la base de datos.";

?>
