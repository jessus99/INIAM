<?php
if(isset($_POST['action'])){
    //ACTION VIENE DESDE JAVASCRIPT CON AJAX POR LO QUE SE DEBE CAMBIAR LA DIRECCION DEL MODEL
    require_once '../models/recomendacionModel.php';
   
} 
class recomendacionController{
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

    public function cargarRecomendaciones($id){
       
        $response= recomendacionModel::cargarRecomendaciones($id);
        return $response;
        
    }
    public function actualizar($id){
        $respuesta= recomendacionModel::actualizar($id);
        return $respuesta;
    }
    public function insertar(){
        $recomendacion= new recomendacionModel();
        $idEmisor=$_POST['idEmisor'];
        $titulo=$_POST['titulo'];
        $asunto=$_POST['asunto'];
        $idReceptor=$_POST['idReceptor'];
        $tipo=$_POST['tipo'];
        $estado=1;
        if($idEmisor && $titulo && $asunto && $idReceptor && $tipo && $estado){
            $recomendacion->setAsunto($asunto);
            $recomendacion->setEstado($estado);
            $recomendacion->setIdemisor($idEmisor);
            $recomendacion->setIdreceptor($idReceptor);
            $recomendacion->setTipo($tipo);
            $recomendacion->setTitulo($titulo);
            $respuesta= recomendacionModel::insertar($recomendacion);
            echo $respuesta;
        }
        else {
            echo "Datos vacíos o nulos, intentenuevamente";
        }
        
    }
    public function listar(){
        $respuesta= recomendacionModel::listar($_POST['id']);
        return $respuesta;
    }
    public function eliminar(){
        $respuesta= recomendacionModel::eliminar($_POST['id']);
        echo $respuesta;
    }
    

}
if(isset($_POST['action'])){
//ACTION VIENE DESDE JAVASCRIPT CON AJAX POR LO QUE SE DEBE CAMBIAR LA DIRECCION DEL MODEL
   $action=$_POST['action'];
 
    $recomendacion= new recomendacionController();
    switch ($action) {
        case "actualizar":
            $respuesta=$recomendacion->actualizar($_POST['id']);
          echo $respuesta;
            break;
        case "insertar":
            
            $respuesta=$recomendacion->insertar();
            break;
        case "eliminar":
            
            $respuesta=$recomendacion->eliminar();
            break;
     
        default:
            break;
    }
}

