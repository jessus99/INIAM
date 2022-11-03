<?php

if(isset($_POST['action'])){
require_once '../models/comidasModel.php';
} 
class comidasController{
    private $nombre;
    private $cantidad;
    private $calorias;
    private $tipo;
    public function getNombre() {
        return $this->nombre;
    }

    public function getCantidad() {
        return $this->cantidad;
    }

    public function getCalorias() {
        return $this->calorias;
    }

    public function getTipo() {
        return $this->tipo;
    }

    public function setNombre($nombre): void {
        $this->nombre = $nombre;
    }

    public function setCantidad($cantidad): void {
        $this->cantidad = $cantidad;
    }

    public function setCalorias($calorias): void {
        $this->calorias = $calorias;
    }

    public function setTipo($tipo): void {
        $this->tipo = $tipo;
    }

        public function insertarComidas(){
            
        $comida = new comidasModel();
            $comida->setNombre($_POST['nombre']);
            $comida->setCantidad($_POST['cantidad']);
            $comida->setCalorias($_POST['calorias']);
            $comida->setCantidad($_POST['cantidad']);
            $comida->setTipo($_POST['tipo']);
            
            $comida->setIdUsuario($_POST['id']);
            $query = comidasModel::insertar($comida);   
            return $query;
            
    }
    public function cargarTodasComidas(){
            
       
        if(is_numeric($_POST['idUsuario'])){
             $query = comidasModel::cargarTodasComidas($_POST['idUsuario']);
             echo json_encode($query);
         } else {
             return false;
         }
        
            
    }
    public function cargarComidas($idUsuario){
        
        $query = comidasModel::cargarComidas($idUsuario);
            return $query;
    }
    public function eliminarComidas(){
        
        $query = comidasModel::eliminarComidas($_POST['id']);
            return $query;
    }
        
    
}
if (isset($_POST['action'])) {

    $action = $_POST['action'] . "Comidas";
    $comidas = new comidasController();
    $response = $comidas->$action();
    echo $response;
    die();
} 
