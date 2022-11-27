<?php

if (isset($_POST['action'])) {
    require_once '../models/carrerasModel.php';
}
class carrerasController
{
    private $id_carrera;
    private $nombre_carrera;
    private $nombre_profesor;
    private $horario;
    private $tipo;
    public function __construct() {
        
    }

    
    }
    public function insertarCarreras()
    {

        $comida = new carrerasModel();
        $comida->setCarrera($_POST['nombre']);
        $comida->setCantidad($_POST['cantidad']);
        $comida->setCalorias($_POST['calorias']);
        $comida->setCantidad($_POST['cantidad']);
        $comida->setTipo($_POST['tipo']);

        $comida->setIdUsuario($_POST['id']);
        $query = carrerasModel::insertar($comida);
        return $query;
    }
    public function cargarTodasCarreras()
    {


        if (is_numeric($_POST['idUsuario'])) {
            $query = carrerasModel::cargarTodasCarreras($_POST['idUsuario']);
            echo json_encode($query);
        } else {
            return false;
        }
    }
    public function cargarCarreras($idUsuario)
    {

        $query = carrerasModel::cargarCarreras($idUsuario);
        return $query;
    }
    public function eliminarCarreras()
    {

        $query = carrerasModel::eliminarCarreras($_POST['id']);
        return $query;
    }
}
if (isset($_POST['action'])) {

    $action = $_POST['action'] . "Carreras";
    $carreras = new carrerasController();
    $response = $carreras->$action();
    echo $response;
    die();
}
