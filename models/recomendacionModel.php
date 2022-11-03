<?php
if(isset($_POST['action'])){
    //ACTION VIENE DESDE JAVASCRIPT CON AJAX POR LO QUE SE DEBE CAMBIAR LA DIRECCION DEL MODEL
    require_once '../config/conexion.php';
} else {
require_once './config/conexion.php';}
class recomendacionModel{
    private $tipo;
    private $estado;
    private $idemisor;
    private $idreceptor;
    private $titulo;
    private $asunto;
    private $fecha;
    
     public function __construct() {
        
    }
    public function getTipo() {
        return $this->tipo;
    }

    public function getEstado() {
        return $this->estado;
    }

    public function getIdemisor() {
        return $this->idemisor;
    }

    public function getIdreceptor() {
        return $this->idreceptor;
    }

    public function getTitulo() {
        return $this->titulo;
    }

    public function getAsunto() {
        return $this->asunto;
    }

    public function getFecha() {
        return $this->fecha;
    }

    public function setTipo($tipo): void {
        $this->tipo = $tipo;
    }

    public function setEstado($estado): void {
        $this->estado = $estado;
    }

    public function setIdemisor($idemisor): void {
        $this->idemisor = $idemisor;
    }

    public function setIdreceptor($idreceptor): void {
        $this->idreceptor = $idreceptor;
    }

    public function setTitulo($titulo): void {
        $this->titulo = $titulo;
    }

    public function setAsunto($asunto): void {
        $this->asunto = $asunto;
    }

    public function setFecha($fecha): void {
        $this->fecha = $fecha;
    }

    public static function cargarRecomendaciones($id){
     $result;
         try {
            $db = conexion::getConnect();
            $consulta = $db->prepare("SELECT re.id, tr.nombre AS tipo, e.nombre AS estado, us.name AS receptor, us.id AS idreceptor, usa.name AS emisor, usa.id AS idemisor, t.nombre AS perfil, re.titulo, re.asunto AS mensaje, re.fecha from tbl_recomendaciones re INNER JOIN tbl_tipos_recomendaciones tr ON re.tipo=tr.id INNER JOIN tbl_estado_recomendaciones e ON re.estado=e.id INNER JOIN tbl_usuarios usa ON re.idemisor = usa.id INNER JOIN tbl_usuarios us ON re.idreceptor=us.id INNER JOIN tbl_perfiles t ON usa.id_perfil = t.id where re.idreceptor = :id");
            $consulta->bindValue(':id', $id);
            $consulta->execute();
            foreach ($consulta->fetchAll(PDO::FETCH_ASSOC) as $recommend) {
                $result[] = $recommend;
            }
           
        } catch (PDOException $e) {
            echo "se ha presentado un error " . $e->getMessage();
            throw $e;
        }
     
        if(isset($result)){
        return $result;} else {return false;}
        
    }
    public static function actualizar($id) {
        try {
            $db = conexion::getConnect();
            //(name,lastname,address,email,password,phone,id_perfil,id_estado)
            $consulta = $db->prepare("UPDATE tbl_recomendaciones SET estado = :estado WHERE id =:id");
            $consulta->bindValue(':id', $id);
            $consulta->bindValue(':estado',2);
            $respuesta=$consulta->execute();
            return $respuesta;
        } catch (PDOException $e) { //captura en caso de error de proceso db
            echo "se ha presentado un error " . $e->getMessage(); //muestra el mensaje de error.
            $db->rollBack(); //en caso de error, elimina las transacciones que se han realizado
            throw $e;
        }
    }
    public static function insertar($recomendacion) {
        
        try {
           
            $db = conexion::getConnect(); //inicia la conexion
            
            $db->beginTransaction(); //inicia la transaccion
            
            $consulta = $db->prepare("insert into tbl_recomendaciones (tipo,estado,idemisor,idreceptor,titulo,asunto)"
                    . " values (:tipo,:estado,:idemisor,:idreceptor,:titulo,:asunto)");
            $db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $consulta->bindValue(':tipo', $recomendacion->getTipo());
            $consulta->bindValue(':estado', $recomendacion->getEstado());            
            $consulta->bindValue(':asunto', $recomendacion->getAsunto());
            $consulta->bindValue(':idemisor', $recomendacion->getIdemisor());
            $consulta->bindValue(':idreceptor', $recomendacion->getIdreceptor());
            $consulta->bindValue(':titulo', $recomendacion->getTitulo());
            $consulta->bindValue(':asunto', $recomendacion->getAsunto());
           
            $consulta->execute(); //ejecuta la consulta 
            $db->commit(); //verifica la ejecucion
            
             return true;
        } catch (Exception $e) { //captura en caso de error de proceso db
            echo "se ha presentado un error " . $e->getMessage();
            $db->rollBack();
            throw $e;
            return false;
        }
        
    }
    public static function listar($id){
              $result;
      
         try {
            $db = conexion::getConnect();
            $consulta = $db->prepare("SELECT tr.id, tt.nombre AS tipo, te.nombre AS estado , tr.titulo, tr.asunto, tr.fecha  FROM tbl_recomendaciones tr INNER JOIN tbl_tipos_recomendaciones tt ON tr.tipo = tt.id INNER JOIN tbl_estado_recomendaciones te ON tr.estado = te.id WHERE tr.idreceptor= :id");
            $consulta->bindValue(':id', $id);
            $consulta->execute();
            foreach ($consulta->fetchAll(PDO::FETCH_ASSOC) as $recommend) {
                $result[] = $recommend;
            }
           
        } catch (PDOException $e) {
            echo "se ha presentado un error " . $e->getMessage();
            throw $e;
            
        }
        if(isset($result)){
              return $result;
        } else {
            return false;
        }
      
        }
        public static function listarPorId($id){
              $result;
      
         try {
            $db = conexion::getConnect();
            $consulta = $db->prepare("SELECT * FROM tbl_recomendaciones WHERE idemisor= :id OR idreceptor=:id");
            $consulta->bindValue(':id', $id);
            $consulta->execute();
            foreach ($consulta->fetchAll(PDO::FETCH_ASSOC) as $recommend) {
                $result[] = $recommend;
            }
           
        } catch (PDOException $e) {
            echo "se ha presentado un error " . $e->getMessage();
            throw $e;
            
        }
        if(isset($result)){
              return true;
        } else {
            return false;
        }
      
        }
    public static function eliminar($id){
        
        try {
            $db = conexion::getConnect();
            $consulta = $db->prepare("DELETE FROM tbl_recomendaciones WHERE id =:id");
            $consulta->bindValue(':id', $id);
            $result=$consulta->execute();
            
            if($result){
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
    public static function eliminarPorId($id){
        
        try {
            $db = conexion::getConnect();
            $consulta = $db->prepare("DELETE FROM tbl_recomendaciones WHERE idemisor =:id OR idreceptor=:id");
            $consulta->bindValue(':id', $id);
            $result=$consulta->execute();
            
            if($result){
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
