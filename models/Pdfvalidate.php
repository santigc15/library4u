<?php

class Pdfvalidate {
public $pdfpath;

public function pdfvalidation($pdfpath){
    $this->pdfpath=$pdfpath;



// Comando para ejecutar Ghostscript y validar el archivo PDF
$comando = 'gswin64c.exe -q -dNOPAUSE -dBATCH -sDEVICE=nullpage ' . escapeshellarg($this->pdfpath) . ' 2>&1';

// Ejecutar el comando y obtener la salida
$output = shell_exec($comando);

// Verificar si no hubo errores en la salida
if (strpos($output, 'Error:') === false) {
    // El archivo es un PDF válido
    echo "El archivo es un PDF válido.";
    exit;
} else {
    // El archivo no es un PDF válido
    echo "Error: El archivo no es un PDF válido.";
    exit;
}



}


}

?>
