<?php
if(isset($_GET['action']) || isset($_POST['action'])){
 
require_once '../models/userModel.php';


}
if(!isset($_SESSION['perfil'])){
    session_start();
}
class userController {

    private $id;
    private $name;
    private $lastname;
    private $addresses;
    private $email;
    private $password;
    private $contact;
    private $perfil;
    private $db;

    public function getDb() {
        return $this->db;
    }

    public function setDb($db): void {
        $this->db = $db;
    }

    function _construct() {
        
    }

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getLastname() {
        return $this->lastname;
    }


    public function getEmail() {
        return $this->email;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getPerfil() {
        return $this->perfil;
    }

    public function setId($id): void {
        $this->id = $id;
    }

    public function setName($name): void {
        $this->name = $name;
    }

    public function setLastname($lastname): void {
        $this->lastname = $lastname;
    }


    public function setEmail($email): void {
        $this->email = $email;
    }

    public function setPassword($password): void {
        $this->password = $password;
    }


    public function setPerfil($perfil): void {
        $this->perfil = $perfil;
    }

    public function readAllUser() {
        
        $response = userModel::readAllUsuarios();
        return $response;
    }
    public function readAllClientUser() {
        
         
    }

    public function loginUser() {
       
        $email = $_POST['email'];
        $password = $_POST['password'];
        $user = new userModel();
        $user->setEmail($email);
        $user->setPassword($password);
        $response = userModel::readOnceUser($user);
        
        if($response){
        if ($response->email == $email && $password== $response->password) {

            $_SESSION['id'] = $response->id;
            $_SESSION['name'] = $response->name;
            $_SESSION['lastname'] = $response->lastname;
           
            $_SESSION['email'] = $response->email;
            $_SESSION['password'] = $response->password;
            $_SESSION['perfil'] = $response->id_perfil;

            return true;
        } else {
            return false;
        }
       } else {
          return false; 
       }
    }

    public function logoutUser() {
        if (isset($_SESSION)) {
            session_destroy();
            unset($_SESSION);
           
           header('Location:../');
        } else {
            return false;
        }
    }

    public function insertUser() {
$query;
     
        $nombre = !empty($_POST['nombre']) ? $_POST['nombre'] : false;
        $apellidos = !empty($_POST['apellidos']) ? $_POST['apellidos'] : false;
        $correo = !empty($_POST['email']) ? $_POST['email'] : false;
        $perfil = !empty($_POST['perfil']) ? $_POST['perfil'] : false;
        $password = !empty($_POST['password']) ? $_POST['password'] : false;
       
        

        if ($nombre && $apellidos && $correo && $perfil && $password) {


            $response = new userModel();
            $response->setNombre($nombre);
            $response->setApellidos($apellidos);
            $response->setEmail($correo);
            $response->setPassword($password);
            $response->setPerfil($perfil);
            $query = userModel::createUsuario($response);
            
        }
        if($query && !isset($_SESSION['perfil'])){
            $response = userModel::readOnceUser($response);
            $_SESSION['id'] = $response->id;
            $_SESSION['name'] = $response->name;
            $_SESSION['lastname'] = $response->lastname;
           
            $_SESSION['email'] = $response->email;
            $_SESSION['password'] = $response->password;
            $_SESSION['perfil'] = $response->id_perfil;
        }
        return $query;
    }
 public function deleteuser() {
     require_once '../models/conversacionesModel.php';
require_once '../models/mensajesModel.php';
require_once '../models/recomendacionModel.php';
require_once '../models/comidasModel.php';
        $id=$_POST['id'];
        $validacion;
        //validar si existen recomendaciones, mensajes, registro de comidas, conversaciones y eliminarlas
        $validacion=mensajesModel::listarMensajesPorId($id);
        if($validacion==true){
        $validacion= mensajesModel::eliminarPorId($id);
        }
            $validacion=conversacionesModel::consultarTodasId($id);
            if($validacion==true){
        $validacion= conversacionesModel::eliminarPorId($id);
        }
            
            $validacion= recomendacionModel::listarPorId($id);
            if($validacion==true){
                $validacion= recomendacionModel::eliminarPorId($id);
       
            }
        $validacion= comidasModel::listarComidasPorIdUsuario($id);
        if($validacion==true){
                $validacion= comidasModel::eliminarPorIdUsuario($id);
       
            }
        $response = new userModel();
        $response->setId($id);
        $query = userModel::deleteUser($response);
        return $query;
    }
    public function updateuser() {

$id = !empty($_POST['id']) ? $_POST['id'] : false;
        $nombre = !empty($_POST['nombre']) ? $_POST['nombre'] : false;
        $apellidos = !empty($_POST['apellidos']) ? $_POST['apellidos'] : false;
        $correo = !empty($_POST['email']) ? $_POST['email'] : false;
        $perfil = !empty($_POST['perfil']) ? $_POST['perfil'] : false;
       
       
        

        if ($nombre && $apellidos && $correo && $perfil && $id) {


            $response = new userModel();
            $response->setId($id);
            $response->setNombre($nombre);
            $response->setApellidos($apellidos);
            $response->setEmail($correo);
            
            $response->setPerfil($perfil);
            $query = userModel::updateUsuario($response);
            
        }
       return $query;
     
        
    }

}

if (isset($_POST['action'])) {
   
    $action = $_POST['action'] . "user";
    $user = new userController();
    $response = $user->$action();
    echo $response;
    die();
} 
if (isset($_GET['action'])) {

    $action = $_GET['action'] . "user";

    $user = new userController();
    $response = $user->$action();
    
    die();
} 