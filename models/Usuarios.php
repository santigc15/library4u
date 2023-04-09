<?php
require_once("conexion.php");

class Usuario {

protected $dbh;
protected $username;
protected $email;
protected $telefono;
protected $password;
protected $id;

public function __construct($dbh)
{
    $this->dbh=$dbh;

}

public function insertUser ($username,$email,$telefono,$password){
    $this->username=$username;
    $this->email=$email;
    $this->telefono=$telefono;
    $this->password=$password;

    $stmt = $this->dbh->prepare("INSERT INTO usuarios (`username`, `email`, `telefono`, `password`) VALUES (:username, :email, :telefono, :password)");
    $stmt->bindParam(':username', $this->username);
    $stmt->bindParam(':email', $this->email);
    $stmt->bindParam(':telefono', $this->telefono);
    $stmt->bindParam(':password', $this->password);

    $stmt->execute();

}

public function getAllUsers (){
$stmt = $this->dbh->query('SELECT * FROM usuarios');
$registros = $stmt->fetchAll(PDO::FETCH_ASSOC);
return $registros;
}

public function deleteUserById ($id){
    $this->id=$id;
    $stmt = $this->dbh->prepare("DELETE FROM usuarios WHERE id=:id");
    $stmt->bindParam(':id', $this->id);
    $stmt->execute();
}

//--------------------updates---------------------------

public function updateUsername ($id,$username){
    $this->id=$id;
    $this->username=$username;
    $stmt = $this->dbh->prepare("UPDATE usuarios SET username = :username WHERE id = :id");
    $stmt->bindParam(':id', $this->id);
    $stmt->bindParam(':username', $this->username);
    $stmt->execute();
}

public function updateEmail ($id,$email){
    $this->id=$id;
    $this->email=$email;
    $stmt = $this->dbh->prepare("UPDATE usuarios SET email = :email WHERE id = :id");
    $stmt->bindParam(':id', $this->id);
    $stmt->bindParam(':email', $this->email);
    $stmt->execute();
}

public function updateTelefono ($id,$telefono){
    $this->id=$id;
    $this->telefono=$telefono;
    $stmt = $this->dbh->prepare("UPDATE usuarios SET telefono = :telefono WHERE id = :id");
    $stmt->bindParam(':id', $this->id);
    $stmt->bindParam(':telefono', $this->telefono);
    $stmt->execute();
}

public function updatePassword ($id,$password){
    $this->id=$id;
    $this->password=$password;
    $stmt = $this->dbh->prepare("UPDATE usuarios SET password = :password WHERE id = :id");
    $stmt->bindParam(':id', $this->id);
    $stmt->bindParam(':password', $this->password);
    $stmt->execute();
}

//---------------------User Validation ----------------

public function checkUser($dbh, $username, $password)
{

    // Consulta preparada para verificar si el usuario existe en la base de datos
    $sql = "SELECT * FROM usuarios WHERE username = :username";
    $stmt = $dbh->prepare($sql);
    $stmt->execute(['username' => $username]);

    // Verificar si se encontró el usuario en la base de datos
    if ($stmt->rowCount() == 0) {
        echo "Usuario o contraseña incorrectas";
        die();
    }

    $usuario = $stmt->fetch();



    if (password_verify($password, $usuario['password'])) {
        

        session_start();
        $_SESSION["id"]=$usuario["id"];
        $_SESSION["username"]=$username;
        return $_SESSION["username"];
    } else {
        echo "Usuario o contraseña incorrectas";
        die();
    }
}





}












?>