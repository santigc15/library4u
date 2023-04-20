<?php
require_once("conexion.php");

class Libro
{

    protected $dbh;
    protected $filename;
    protected $filesize;
    protected $userid;
    protected $id;
    protected $registro;
    protected $downloads;

    public function __construct($dbh)
    {
        $this->dbh = $dbh;
    }

    public function insertLibro($filename, $filesize, $userid)
    {
        $this->filename = $filename;
        $this->filesize = $filesize;
        $this->userid = $userid;


        $stmt = $this->dbh->prepare("INSERT INTO libros (`filename`, `filesize`, `userid`) VALUES (:filename, :filesize, :userid)");
        $stmt->bindParam(':filename', $this->filename);
        $stmt->bindParam(':filesize', $this->filesize);
        $stmt->bindParam(':userid', $this->userid);


        $stmt->execute();
    }

    public function getAllLibros()
    {
        $stmt = $this->dbh->query('SELECT * FROM libros');
        $registros = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $registros;
    }

    public function getAllLibrosByUser($userid)
    {
        $this->userid = $userid;
        $stmt = $this->dbh->prepare("SELECT * FROM libros WHERE userid=:userid");
        $stmt->bindParam(':userid', $this->userid);
        $stmt->execute();
        $registros = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $registros;
    }

    public function getLibroById($id)
    {
        $this->id = $id;

        $stmt = $this->dbh->prepare("SELECT filename FROM libros WHERE id=:id");
        $stmt->bindParam(':id', $this->id);
        $stmt->execute();
        $registro = $stmt->fetch(PDO::FETCH_ASSOC);
        return $registro;
        
    }

    public function deleteLibroById($id)
    {
        $this->id = $id;
        $stmt = $this->dbh->prepare("DELETE FROM libros WHERE id=:id");
        $stmt->bindParam(':id', $this->id);
        $stmt->execute();
    }

    //--------------------updates---------------------------

    public function updateTitulo($id, $filename)
    {
        $this->id = $id;
        $this->filename = $filename;
        $stmt = $this->dbh->prepare("UPDATE libros SET filename = :filename WHERE id = :id");
        $stmt->bindParam(':id', $this->id);
        $stmt->bindParam(':filename', $this->filename);
        $stmt->execute();
    }

    public function updateGenero($id, $filesize)
    {
        $this->id = $id;
        $this->filesize = $filesize;
        $stmt = $this->dbh->prepare("UPDATE libros SET filesize = :filesize WHERE id = :id");
        $stmt->bindParam(':id', $this->id);
        $stmt->bindParam(':filesize', $this->filesize);
        $stmt->execute();
    }

    public function updateDownloadsById($id,$downloads)
    {
        $this->id = $id;
        $this->downloads = $downloads;

        $stmt = $this->dbh->prepare("UPDATE libros SET downloads = :downloads WHERE id = :id");
        $stmt->bindParam(':id', $this->id);
        $stmt->bindParam(':downloads', $downloads);
        $stmt->execute();
    }
}
