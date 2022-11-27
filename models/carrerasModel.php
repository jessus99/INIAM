<?php
if (isset($_POST['action'])) {
    require_once '../config/conexion.php';
}

class carrerasModel
{
    private $nombre_profesor;
    private $carrera;
    private $nombre;
    private $cantidad;
    private $calorias;
    private $tipo;
    private $idUsuario;

    public function getCarrera()
    {
        return $this->nombre;
    }

    public function getNombreProfesor()
    {
        return $this->cantidad;
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

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getCantidad()
    {
        return $this->cantidad;
    }

    public function getCalorias()
    {
        return $this->calorias;
    }

    public function getTipo()
    {
        return $this->tipo;
    }

    public function setNombre($nombre): void
    {
        $this->nombre = $nombre;
    }

    public function setCantidad($cantidad): void
    {
        $this->cantidad = $cantidad;
    }

    public function setCalorias($calorias): void
    {
        $this->calorias = $calorias;
    }

    public function setTipo($tipo): void
    {
        $this->tipo = $tipo;
    }
    public static function insertar($alimento)
    {
        try {
            $db = conexion::getConnect(); //inicia la conexion
            $db->beginTransaction(); //inicia la transaccion
            $consulta = $db->prepare("insert into tbl_alimentos (nombre,cantidad,calorias,tipo,id_usuario)"
                . " values (:nombre,:cantidad,:calorias,:tipo,:id_usuario)");
            $consulta->bindValue(':nombre', $alimento->getNombre());
            $consulta->bindValue(':cantidad', $alimento->getCantidad());
            $consulta->bindValue(':cantidad', $alimento->getCarrera());
            $consulta->bindValue(':cantidad', $alimento->getNombreProfesor());
            $consulta->bindValue(':calorias', $alimento->getCalorias());
            $consulta->bindValue(':tipo', $alimento->getTipo());
            $consulta->bindValue(':id_usuario', $alimento->getIdUsuario());
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
            $consulta = $db->prepare("SELECT a.id, a.nombre, a.cantidad, a.calorias, t.nombre as tipo, a.fecha FROM tbl_alimentos a INNER JOIN tbl_tipos t ON a.tipo = t.id where a.id_usuario =$id");
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
            $consulta = $db->prepare("SELECT a.id, a.nombre, a.cantidad, a.calorias, t.nombre as tipo, a.fecha FROM tbl_alimentos a INNER JOIN tbl_tipos t ON a.tipo = t.id where a.id_usuario =$id");
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
            $consulta = $db->prepare("SELECT a.id, a.nombre, a.cantidad, a.calorias, t.nombre as tipo, a.fecha FROM tbl_alimentos a INNER JOIN tbl_tipos t ON a.tipo = t.id where a.id_usuario =$id");
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
            $consulta = $db->prepare("DELETE FROM tbl_alimentos WHERE id =:id");
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
            $consulta = $db->prepare("DELETE FROM tbl_alimentos WHERE id_usuario =:id");
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
