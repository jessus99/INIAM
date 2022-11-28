<?php
if (isset($_POST['action'])) {
    require_once '../config/conexion.php';
}

class carrerasModel
{
    private $id_carrera;
    private $nombre_carrera;
    private $nombre_profesor;
    private $horario;
    private $tipo;
    private $idUsuario;

    public function getCarrera()
    {
        return $this->nombre;
    }

    public function getNombreProfesor()
    {
        return $this->nombre_profesor;
    }

    public function setCarrera($carrera): void
    {
        $this->carrera = $carrera;
    }

    public function setNombreProfesor($nombre_Profesor): void
    {
        //$this->getnombre_profesor = $nombre_Profesor;
        $this->nombre_profesor = $nombre_Profesor;
    }

    public function getIdUsuario()
    {
        return $this->idUsuario;
    }

    public function setIdUsuario($idUsuario): void
    {
        $this->idUsuario = $idUsuario;
    }
    public function getNombre_carrera()
    {
        return $this->nombre_carrera;
    }
    public function setNombre_carrera($nombre_carrera)
    {
        $this->nombre_carrera = $nombre_carrera;

        return $this;
    } 
    public function getNombre_profesor()
    {
        return $this->nombre_profesor;
    }

    public function setNombre_profesor($nombre_profesor)
    {
        $this->nombre_profesor = $nombre_profesor;

        return $this;
    }
    public function getHorario()
    {
        return $this->horario;
    }

    public function setHorario($horario)
    {
        $this->horario = $horario;

        return $this;
    }

    public function getTipo()
    {
        return $this->tipo;
    }

    public function setTipo($tipo): void
    {
        $this->tipo = $tipo;
    }
    public static function insertar($carrera)
    {
        try {
            $db = conexion::getConnect(); //inicia la conexion
            $db->beginTransaction(); //inicia la transaccion
            $consulta = $db->prepare("insert into tbl_carreras (nombre_carrera,nombre_profesor,horario,tipo,id_usuario)"
                . " values (:nombre,:nombre_profesor,:horario,:tipo,:id_usuario)");
            $consulta->bindValue(':nombre_carrera', $carrera->getNombre());
            $consulta->bindValue(':nombre_profesor', $carrera->getnombre_profesor());
            $consulta->bindValue(':horario', $carrera->gethorario());
            $consulta->bindValue(':tipo', $carrera->getTipo());
            $consulta->bindValue(':id_usuario', $carrera->getIdUsuario());
            $consulta->execute(); //ejecuta la consulta
            $db->commit(); //verifica la ejecucion
            return true;
        } catch (Exception $e) {     //captura en caso de error de proceso db
            echo "se ha presentado un error " . $e->getMessage();
            $db->rollBack();
            throw $e;
        }
    }
    public static function cargarCarreras($id)
    {
        $comidas = []; //arreglo 
        try {
            $db = conexion::getConnect();
            $consulta = $db->prepare("SELECT a.id, a.nombre_carrera, a.nombre_profesor, a.horario, t.nombre as tipo, a.fecha FROM tbl_carreras a INNER JOIN tbl_tipos t ON a.tipo = t.id where a.id_usuario =$id");
            $consulta->execute();
            foreach ($consulta->fetchAll(PDO::FETCH_ASSOC) as $comida) {
                $comidas[] = $comida;
            }
        } catch (PDOException $e) {
            echo "se ha presentado un error " . $e->getMessage();
            throw $e;
        }

        return $comidas;
    }
    public static function cargarTodasCarreras($id)
    {

        $comidas = []; //arreglo 
        try {
            $db = conexion::getConnect();
            $consulta = $db->prepare("SELECT a.id, a.nombre_carrera, a.nombre_profesor, a.horario, t.nombre as tipo, a.fecha FROM tbl_carreras a INNER JOIN tbl_tipos t ON a.tipo = t.id where a.id_usuario =$id");
            $consulta->execute();
            foreach ($consulta->fetchAll(PDO::FETCH_ASSOC) as $comida) {
                $comidas[] = $comida;
            }
        } catch (PDOException $e) {
            echo "se ha presentado un error " . $e->getMessage();
            throw $e;
            $comidas = false;
        }

        return $comidas;
    }
    public static function listarComidasPorIdUsuario($id)
    {

        $comidas = []; //arreglo 
        try {
            $db = conexion::getConnect();
            $consulta = $db->prepare("SELECT a.id, a.nombre, a.nombre_profesor, a.horario, t.nombre as tipo, a.fecha FROM tbl_carreras a INNER JOIN tbl_tipos t ON a.tipo = t.id where a.id_usuario =$id");
            $consulta->execute();
            foreach ($consulta->fetchAll(PDO::FETCH_ASSOC) as $comida) {
                $comidas[] = $comida;
            }
        } catch (PDOException $e) {
            echo "se ha presentado un error " . $e->getMessage();
            throw $e;
            $comidas = false;
        }

        if (isset($comidas)) {
            return true;
        } else {
            return false;
        }
    }
    public static function eliminarCarreras($id)
    {
        try {
            $db = conexion::getConnect();
            $consulta = $db->prepare("DELETE FROM tbl_carreras WHERE id =:id");
            $consulta->bindValue(':id', $id);
            $result = $consulta->execute();

            if ($result) {
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
    public static function eliminarPorIdUsuario($id)
    {
        try {
            $db = conexion::getConnect();
            $consulta = $db->prepare("DELETE FROM tbl_carreras WHERE id_usuario =:id");
            $consulta->bindValue(':id', $id);
            $result = $consulta->execute();

            if ($result) {
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
