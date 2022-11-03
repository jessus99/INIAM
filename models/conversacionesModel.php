<?php
if(isset($_POST['action'])|| isset($_POST['hidden'])){
require_once '../config/conexion.php';
} else {
    require_once './config/conexion.php';
}
class conversacionesModel{
    
    private $idemisor;
    private $idreceptor;
    private $nombre;
    
    
    public static function crearConversacion($emisor,$receptor,$nombre){
        
            try{
            $db = conexion::getConnect(); //inicia la conexion
            $db->beginTransaction(); //inicia la transaccion
            $consulta = $db->prepare("insert into tbl_conversaciones (nombre,idemisor,idreceptor)"
                    . " values (:nombre,:idemisor,:idreceptor)");
            $consulta->bindValue(':nombre', $nombre);
            $consulta->bindValue(':idemisor', $emisor);
            $consulta->bindValue(':idreceptor', $receptor);
          $consulta->execute(); //ejecuta la consulta
            $db->commit(); //verifica la ejecucion
            return true;
        } catch (Exception $e) {     //captura en caso de error de proceso db
            echo "se ha presentado un error " . $e->getMessage();
            $db->rollBack();
            throw $e;
        }
        $result= $consulta->fetch(PDO::FETCH_OBJ);
      
        
    }
    public static function consultarConversacion($idemisor,$idreceptor){
      $result;
         try {
            $db = conexion::getConnect();
            $consulta = $db->prepare("SELECT id from tbl_conversaciones WHERE (idemisor = :idemisor AND idreceptor= :idreceptor) OR (idemisor= :idreceptor AND idreceptor= :idemisor)");
           
            $consulta->bindValue(':idemisor', $idemisor);
             $consulta->bindValue(':idreceptor', $idreceptor);
            $consulta->execute();
            $result= $consulta->fetch(PDO::FETCH_OBJ);
            
        } catch (PDOException $e) {
            echo "se ha presentado un error " . $e->getMessage();
            throw $e;
        }
      
        return $result;
    }
    public static function consultarTodas($id){
           $conver; //arreglo 
        try {
            $db = conexion::getConnect();
            $consulta = $db->prepare("SELECT c.id, c.nombre, c.idemisor, c.idreceptor, me.name AS emisor, mr.name AS receptor from tbl_conversaciones c INNER JOIN tbl_usuarios me ON c.idemisor= me.id INNER JOIN tbl_usuarios mr ON c.idreceptor= mr.id where c.idemisor= $id OR c.idreceptor= $id");
            $consulta->execute();
            foreach ($consulta->fetchAll(PDO::FETCH_ASSOC) as $conversacion) {
                $conver[] = $conversacion;
            }
        } catch (PDOException $e) {
            echo "se ha presentado un error " . $e->getMessage();
            throw $e;
        }
       if(isset($conver)){
       return $conver;} else {return false;}
        
    }
    public static function consultarTodasId($id){
           $conver; //arreglo 
        try {
            $db = conexion::getConnect();
            $consulta = $db->prepare("SELECT c.id, c.nombre, c.idemisor, c.idreceptor, me.name AS emisor, mr.name AS receptor from tbl_conversaciones c INNER JOIN tbl_usuarios me ON c.idemisor= me.id INNER JOIN tbl_usuarios mr ON c.idreceptor= mr.id where c.idemisor= $id OR c.idreceptor= $id");
            $consulta->execute();
            foreach ($consulta->fetchAll(PDO::FETCH_ASSOC) as $conversacion) {
                $conver[] = $conversacion;
            }
        } catch (PDOException $e) {
            echo "se ha presentado un error " . $e->getMessage();
            throw $e;
        }
       if(isset($conver)){
       return true;} else {return false;}
        
    }
    public static function eliminarPorId($id){
        try {

            $db = conexion::getConnect();
            $consulta = $db->prepare("DELETE FROM tbl_conversaciones WHERE idemisor =:id OR idreceptor=:id");
            $consulta->bindValue(':id', $id);
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
