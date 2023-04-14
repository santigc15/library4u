<?php
require_once("conexion.php");

class Libro
{

    protected $dbh;
    protected $filename;
    protected $filesize;
    protected $userid;
    protected $id;

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

    public function updateDownloadsById($id)
    {
        $this->id = $id;
        $stmt = $this->dbh->prepare("SELECT downloads FROM libros WHERE id = :id");
        $stmt->bindParam(':id', $this->id);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($result as $row) {
            // Acceder a los valores de los campos
            $downloads = $row['downloads'];
        }
        $downloads++;
        $stmt = $this->dbh->prepare("UPDATE libros SET downloads = :downloads WHERE id = :id");
        $stmt->bindParam(':id', $this->id);
        $stmt->bindParam(':downloads', $downloads);
        $stmt->execute();
    }
}
