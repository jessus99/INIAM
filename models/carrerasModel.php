<?php
if (isset($_POST['action'])) {
    require_once '../config/conexion.php';
}

class carrerasModel{

    private $nombre_carrera;
    private $nombre_profesor;
    private $horario;
    private $tipo;
    public function getIdUsuario()  {
        return $this->idUsuario;
    }

    public function setIdUsuario($idUsuario): void {
        $this->idUsuario = $idUsuario;
    }
    
        public function getNombreCarrera() {
        return $this->nombre_carrera;
    }

    public function getNombreProfesor() {
        return $this->nombre_profesor;
    }

    public function getHorario() {
        return $this->horario;
    }

    public function getTipo() {
        return $this->tipo;
    }

    public function setNombreCarrera($nombre_carrera): void {
        $this->nombre_carrera = $nombre_carrera;
    }

    public function setNombreProfesor($nombre_profesor): void {
        $this->nombre_profesor = $nombre_profesor;
    }

    public function setHorario($horario): void {
        $this->horario = $horario;
    }

    public function setTipo($tipo): void {
        $this->tipo = $tipo;
    }
    public static function insertar($carrera)
    {
        try {
            $db = conexion::getConnect(); //inicia la conexion
            $db->beginTransaction(); //inicia la transaccion
            $consulta = $db->prepare("insert into tbl_carreras (nombre_carrera,nombre_profesor,horario,tipo,id_usuario)"
                . " values (:nombre_carrera,:nombre_profesor,:horario,:tipo,:id_usuario)");
            $consulta->bindValue(':nombre_carrera', $carrera->getNombreCarrera());
            $consulta->bindValue(':nombre_profesor', $carrera->getnombreProfesor());
            $consulta->bindValue(':horario', $carrera->getHorario());
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
    public static function cargarCarreras($id){
        $carreras = []; //arreglo 
        try {
            $db = conexion::getConnect();
            $consulta = $db->prepare("SELECT a.id, a.nombre_carrera, a.nombre_profesor, a.horario, t.nombre as tipo, a.fecha FROM tbl_carreras a INNER JOIN tbl_tipos t ON a.tipo = t.id where a.id_usuario =$id");
            $consulta->execute();
            foreach ($consulta->fetchAll(PDO::FETCH_ASSOC) as $carrera) {
                $carreras[] = $carrera;
            }
        } catch (PDOException $e) {
            echo "se ha presentado un error " . $e->getMessage();
            throw $e;
        }

        return $carreras;
    }
    public static function cargarTodasCarreras($id)
    {

        $carreras = []; //arreglo 
        try {
            $db = conexion::getConnect();
            $consulta = $db->prepare("SELECT a.id, a.nombre_carrera, a.nombre_profesor, a.horario, t.nombre as tipo, a.fecha FROM tbl_carreras a INNER JOIN tbl_tipos t ON a.tipo = t.id where a.id_usuario =$id");
            $consulta->execute();
            foreach ($consulta->fetchAll(PDO::FETCH_ASSOC) as $carrera) {
                $carreras[] = $carrera;
            }
        } catch (PDOException $e) {
            echo "se ha presentado un error " . $e->getMessage();
            throw $e;
            $carreras = false;
        }

        return $carreras;
    }
    public static function listarCarrerasPorIdUsuario($id)
    {

        $carreras = []; //arreglo 
        try {
            $db = conexion::getConnect();
            $consulta = $db->prepare("SELECT a.id, a.nombre_carrera, a.nombre_profesor, a.horario, t.nombre as tipo, a.fecha FROM tbl_carreras a INNER JOIN tbl_tipos t ON a.tipo = t.id where a.id_usuario =$id");
            $consulta->execute();
            foreach ($consulta->fetchAll(PDO::FETCH_ASSOC) as $carrera) {
                $carreras[] = $carrera;
            }
        } catch (PDOException $e) {
            echo "se ha presentado un error " . $e->getMessage();
            throw $e;
            $carreras = false;
        }

        if(isset($carreras)){ return true;}else {return false;}
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
