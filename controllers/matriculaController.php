<?php

if (isset($_POST['action'])) {
    require_once '../models/carrerasModel.php';
}
    class carrerasController{
    private $nombre_carrera;
    private $nombre_profesor;
    private $horario;
    private $tipo;
    
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
    public function insertarCarreras()
    {

        $carrera = new carrerasModel();
        $carrera->setNombreCarrera($_POST['nombre_carrera']);
        $carrera->setNombreProfesor($_POST['nombre_profesor']);
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