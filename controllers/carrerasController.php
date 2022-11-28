<?php

if (isset($_POST['action'])) {
    require_once '../models/carrerasModel.php';
}
    class carrerasController{
    private $id_carrera;
    private $nombre_carrera;
    private $nombre_profesor;
    private $horario;
    private $tipo;
    public function __construct() {
        
    }
    public function getId_carrera()
    {
        return $this->id_carrera;
    }
    public function setId_carrera($id_carrera)
    {
        $this->id_carrera = $id_carrera;

        return $this;
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
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }
    public function insertarCarreras()
    {

        $carrera = new carrerasModel();
        $carrera->setNombre_carrera($_POST['nombre_carrera']);
        $carrera->setNombre_profesor($_POST['nombre_profesor']);
        $carrera->setHorario($_POST['horario']);
        $carrera->setTipo($_POST['tipo']);
        $carrera->setIdUsuario($_POST['id']);
        $query = carrerasModel::insertar($carrera);
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