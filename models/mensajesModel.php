<?php
if(isset($_POST['action']) || isset($_POST['hidden'])){
require_once '../config/conexion.php';
} else {
    require_once './config/conexion.php';
}
class mensajesModel{
    private $idMensaje;
    private $idEmisor;
    private $idReceptor;
    private $asunto;
    private $mensaje;
    private $idConversacion;
    public function __construct() {
        
    }
    public function getIdMensaje() {
        return $this->idMensaje;
    }

    public function getIdEmisor() {
        return $this->idEmisor;
    }

    public function getIdReceptor() {
        return $this->idReceptor;
    }

    public function getAsunto() {
        return $this->asunto;
    }

    public function getMensaje() {
        return $this->mensaje;
    }

    public function getIdConversacion() {
        return $this->idConversacion;
    }

    public function setIdMensaje($idMensaje): void {
        $this->idMensaje = $idMensaje;
    }

    public function setIdEmisor($idEmisor): void {
        $this->idEmisor = $idEmisor;
    }

    public function setIdReceptor($idReceptor): void {
        $this->idReceptor = $idReceptor;
    }

    public function setAsunto($asunto): void {
        $this->asunto = $asunto;
    }

    public function setMensaje($mensaje): void {
        $this->mensaje = $mensaje;
    }

    public function setIdConversacion($idConversacion): void {
        $this->idConversacion = $idConversacion;
    }

   public function insertarMensaje($mensajes){
    try {
           
            $db = conexion::getConnect(); //inicia la conexion
            $db->beginTransaction(); //inicia la transaccion
            $consulta = $db->prepare("insert into tbl_mensajes (idreceptor,idemisor,asunto,mensaje,idconversacion)"
                    . " values (:idreceptor,:idemisor,:asunto,:mensaje,:idconversacion)");
            $consulta->bindValue(':idreceptor', $mensajes->getIdReceptor());
            $consulta->bindValue(':idemisor', $mensajes->getIdEmisor());
            
            $consulta->bindValue(':asunto', $mensajes->getAsunto());
            $consulta->bindValue(':mensaje', $mensajes->getMensaje());
         
            $consulta->bindValue(':idconversacion', $mensajes->getIdConversacion());
           
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
   public function listarMensajes($idconver){
      
         try {
            $db = conexion::getConnect();
            $consulta = $db->prepare("SELECT * FROM tbl_mensajes WHERE idconversacion= :id");
            $consulta->bindValue(':id', $idconver);
            $consulta->execute();
            foreach ($consulta->fetchAll(PDO::FETCH_ASSOC) as $recommend) {
                $result[] = $recommend;
            }
           
        } catch (PDOException $e) {
            echo "se ha presentado un error " . $e->getMessage();
            throw $e;
        }
        return $result;
        
   }
   public static function listarMensajesPorId($id){
      
         try {
            $db = conexion::getConnect();
            $consulta = $db->prepare("SELECT * FROM tbl_mensajes WHERE idemisor= :id OR idreceptor=:id");
            $consulta->bindValue(':id', $id);
            $resultado=$consulta->execute();
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
   public static function eliminarPorId($idMensaje){
        try {

            $db = conexion::getConnect();
            $consulta = $db->prepare("DELETE FROM tbl_mensajes WHERE idemisor =:id OR idreceptor=:id");
            $consulta->bindValue(':id', $idMensaje);
            $resultado=$consulta->execute();
            if($resultado==true)
            { return true;}else {return false;}
        } catch (PDOException $e) { //captura en caso de error de proceso db
            echo "se ha presentado un error " . $e->getMessage(); //muestra el mensaje de error.
            $db->rollBack(); //en caso de error, elimina las transacciones que se han realizado
            throw $e;
        }
    }
}
