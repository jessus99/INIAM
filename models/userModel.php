<?php
if (isset($_GET['action']) || isset($_POST['action'])) {
    require_once '../config/conexion.php';
}
class userModel
{

    private $id;
    private $nombre;
    private $apellidos;
    private $email;
    private $password;
    private $perfil;
    private $db;
    public function getId()
    {
        return $this->id;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getApellidos()
    {
        return $this->apellidos;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getPerfil()
    {
        return $this->perfil;
    }

    public function getDb()
    {
        return $this->db;
    }

    public function setId($id): void
    {
        $this->id = $id;
    }

    public function setNombre($nombre): void
    {
        $this->nombre = $nombre;
    }

    public function setApellidos($apellidos): void
    {
        $this->apellidos = $apellidos;
    }

    public function setEmail($email): void
    {
        $this->email = $email;
    }

    public function setPassword($password): void
    {
        $this->password = $password;
    }

    public function setPerfil($perfil): void
    {
        $this->perfil = $perfil;
    }

    public function setDb($db): void
    {
        $this->db = $db;
    }


    public static function createUsuario($usuario)
    {
        try {

            $db = conexion::getConnect(); //inicia la conexion
            $db->beginTransaction(); //inicia la transaccion
            $consulta = $db->prepare("insert into tbl_usuarios (name,lastname,email,password,id_perfil)"
                . " values (:name,:lastname,:email,:password,:id_perfil)");
            $consulta->bindValue(':name', $usuario->getNombre());
            $consulta->bindValue(':lastname', $usuario->getApellidos());

            $consulta->bindValue(':email', $usuario->getEmail());
            $consulta->bindValue(':password', $usuario->getPassword());

            $consulta->bindValue(':id_perfil', $usuario->getPerfil());

            $consulta->execute(); //ejecuta la consulta 
            $db->commit(); //verifica la ejecucion
            return true;
        } catch (Exception $e) { //captura en caso de error de proceso db
            echo "se ha presentado un error " . $e->getMessage();
            $db->rollBack();
            throw $e;
        }
    }

    public static function readOnceUser($user)
    {

        $email = $user->getEmail();

        try {
            $db = conexion::getConnect();
            $consulta = $db->prepare("SELECT * from tbl_usuarios where email = :email");
            $consulta->bindValue(':email', $email);
            $consulta->execute();
            $ingreso = $consulta->fetch(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            echo "se ha presentado un error " . $e->getMessage();
            throw $e;
        }
        return $ingreso;
    }
    public static function readOnceUserPerId($id)
    {



        try {
            $db = conexion::getConnect();
            $consulta = $db->prepare("SELECT * from tbl_usuarios where id = :id");
            $consulta->bindValue(':id', $id);
            $consulta->execute();
            $result = $consulta->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "se ha presentado un error " . $e->getMessage();
            throw $e;
        }
        return $result;
    }

    public static function updateUsuario($usuario)
    {

        try {
            $db = conexion::getConnect();
            //(name,lastname,email,password,id_perfil)
            $consulta = $db->prepare("UPDATE tbl_usuarios SET name = :name, lastname = :lastname, " . "
                    email= :email, id_perfil= :id_perfil" . "
                    WHERE id =:id");
            $consulta->bindValue(':id', $usuario->getId());
            $consulta->bindValue(':name', $usuario->getNombre());
            $consulta->bindValue(':lastname', $usuario->getApellidos());
            
            $consulta->bindValue(':email', $usuario->getEmail());

            $consulta->bindValue(':id_perfil', $usuario->getPerfil());

            $consulta->execute();
            return true;
        } catch (PDOException $e) { //captura en caso de error de proceso db
            echo "se ha presentado un error " . $e->getMessage(); //muestra el mensaje de error.
            $db->rollBack(); //en caso de error, elimina las transacciones que se han realizado
            throw $e;
        }
    }

    public static function readAllUsuarios()
    {
        $usuarios; //arreglo 
        try {
            $db = conexion::getConnect();
            $consulta = $db->prepare("SELECT u.id, u.name, u.lastname,u.email,u.password, p.nombre AS perfil FROM tbl_usuarios u INNER JOIN tbl_perfiles p ON u.id_perfil = p.id ");
            $consulta->execute();
            foreach ($consulta->fetchAll(PDO::FETCH_ASSOC) as $usuario) {
                $usuarios[] = $usuario;
            }
        } catch (PDOException $e) {
            echo "se ha presentado un error " . $e->getMessage();
            throw $e;
        }
        return $usuarios;
    }

    public static function deleteUser($usuario)
    {
        try {

            $db = conexion::getConnect();
            $consulta = $db->prepare("DELETE FROM tbl_usuarios WHERE id =:id");
            $consulta->bindValue(':id', $usuario->getId());
            $resultado = $consulta->execute();
            if ($resultado) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) { //captura en caso de error de proceso db
            echo "se ha presentado un error " . $e->getMessage(); //muestra el mensaje de error.
            $db->rollBack(); //en caso de error, elimina las transacciones que se han realizado
            throw $e;
        }
    }
}
