<?php
if(isset($_POST['action'])){
require_once '../models/mensajesModel.php';
require_once '../models/conversacionesModel.php';
} 
 
class mensajesController{
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

   public function insertarMensaje(){
       require_once '../models/mensajesModel.php';
require_once '../models/conversacionesModel.php';
      $idconver;
        $conversacion= conversacionesModel::consultarConversacion($_POST['idemisor'],$_POST['idReceptor']);
        if($conversacion){
            $idconver=$conversacion->id;
            
        } else {
            $conversacion= conversacionesModel::crearConversacion($_POST['idemisor'],$_POST['idReceptor'],$_POST['asunto']);
        $conversacion= conversacionesModel::consultarConversacion($_POST['idemisor'],$_POST['idReceptor']);
        $idconver=$conversacion->id;    
        
        }
        if($idconver){
    $mensajes = new mensajesModel();
    $mensajes->setAsunto($_POST['asunto']);
    $mensajes->setMensaje($_POST['mensaje']);
    $mensajes->setIdEmisor($_POST['idemisor']);
    $mensajes->setIdReceptor($_POST['idReceptor']);
    $mensajes->setIdConversacion($idconver);
    $resultado=$mensajes->insertarMensaje($mensajes);
    echo $resultado;
        } else {
            echo "ha ocurrido un error, intente nuevamente";
        }
   }
   public function cargarMensajes($id){
       $conversacion= conversacionesModel::consultarTodas($id);
       return $conversacion;
   }
   public function listarMensaje(){
      
       $mensajes= new mensajesModel();
       $mensajes->setIdConversacion($_POST['id']);
       $mensajes=$mensajes->listarMensajes($_POST['id']);
       if($mensajes){
           require_once '../views/mensajes/conversacion.php';
       }
       
       
   }
}
if(isset($_POST['action'])){
    
    $action = $_POST['action'] . "Mensaje";
    $mensaje = new mensajesController();
    $response = $mensaje->$action();
    echo $response;
    die();
    
}
if(isset($_GET['action'])){
    
    $action = $_GET['action'] . "Mensaje";
    $mensaje = new mensajesController();
    $response = $mensaje->$action();
    echo $response;
    die();
    
}

