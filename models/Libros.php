<?php
require_once("conexion.php");

class Libro {

protected $dbh;
protected $titulo;
protected $genero;
protected $userid;
protected $id;

public function __construct($dbh)
{
    $this->dbh=$dbh;

}

public function insertLibro ($titulo,$genero,$userid){
    $this->titulo=$titulo;
    $this->genero=$genero;
    $this->userid=$userid;
  

    $stmt = $this->dbh->prepare("INSERT INTO libros (`titulo`, `genero`, `userid`) VALUES (:titulo, :genero, :userid)");
    $stmt->bindParam(':titulo', $this->titulo);
    $stmt->bindParam(':genero', $this->genero);
    $stmt->bindParam(':userid', $this->userid);


    $stmt->execute();

}

public function getAllLibros (){
$stmt = $this->dbh->query('SELECT * FROM libros');
$registros = $stmt->fetchAll(PDO::FETCH_ASSOC);
return $registros;
}

public function deleteLibroById ($id){
    $this->id=$id;
    $stmt = $this->dbh->prepare("DELETE FROM libros WHERE id=:id");
    $stmt->bindParam(':id', $this->id);
    $stmt->execute();
}

//--------------------updates---------------------------

public function updateTitulo ($id,$titulo){
    $this->id=$id;
    $this->titulo=$titulo;
    $stmt = $this->dbh->prepare("UPDATE libros SET titulo = :titulo WHERE id = :id");
    $stmt->bindParam(':id', $this->id);
    $stmt->bindParam(':titulo', $this->titulo);
    $stmt->execute();
}

public function updateGenero ($id,$genero){
    $this->id=$id;
    $this->genero=$genero;
    $stmt = $this->dbh->prepare("UPDATE libros SET genero = :genero WHERE id = :id");
    $stmt->bindParam(':id', $this->id);
    $stmt->bindParam(':genero', $this->genero);
    $stmt->execute();
}


}
