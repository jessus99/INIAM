<?php

session_start();
if (isset($_SESSION['perfil'])) {
$perfil=$_SESSION['perfil'];
if($perfil==4){
    $perfil=2;
}
    switch ($perfil) {
        case 2:
            if (isset($_GET['pagina'])) {
                $pagina = $_GET['pagina'];
            } else {
                $pagina = "principal";
            }

            require_once './views/clientes/navbar.php';
            switch ($pagina) {
                case 'principal':
                    require_once './config/conexion.php';
                    require_once './models/recomendacionModel.php';
                    require_once './controllers/recomendacionController.php';
                    $respuesta = new recomendacionController();
                    $respuesta = $respuesta->cargarRecomendaciones($_SESSION['id']);
                    require_once './views/clientes/inicio.php';
                    break;
                case 'comidas':
                    require_once './config/conexion.php';
                    require_once './models/comidasModel.php';
                    require_once './controllers/comidasController.php';

                    $comidas = new comidasController();

                    $respuesta_comidas = $comidas->cargarComidas($_SESSION['id']);

                    require_once './views/clientes/comidas.php';
                    require_once './views/comidas/lista_comidas.php';
                    echo "<script src='./js/script_comidas.js'></script>";
                    break;
                case 'mensajes':
                    require_once './config/conexion.php';
                    require_once './models/mensajesModel.php';
                    require_once './models/userModel.php';
                    require_once './models/conversacionesModel.php';
                    require_once './controllers/userController.php';
                    require_once './controllers/mensajesController.php';
                    $usuarios = new userController();
                    $respuestaUsuarios = $usuarios->readAllUser();
                    $mensajes = new mensajesController();
                    $respuesta_mensajes = $mensajes->cargarMensajes($_SESSION['id']);
                    echo "<div class='row'>";
                    require_once './views/mensajes/mensajes.php';

                    if ($respuesta_mensajes) {
                        require_once './views/mensajes/lista_mensajes.php';
                    } else {
                        echo "<h4>No hay mensajes</h4>";
                    }
                    echo "<script src='./js/script_mensajes4.js'></script>";
                    echo '</div>';
                    break;
                case 'citas':
                    require_once './views/mensajes/mensajes.php';
                    break;
                default:
                    require_once './views/clientes/inicio.php';
                    break;
            }




            break;
        case 3:
            if (isset($_GET['pagina'])) {
                $pagina = $_GET['pagina'];
            } else {
                $pagina = "principal_profesional";
            }
            switch ($pagina) {
                case "principal_profesional":
                    require_once './config/conexion.php';
                    require_once './views/profesionales/navbar.php';
                    require_once './models/userModel.php';
                    require_once './controllers/userController.php';
                    $clientes = new userController();
                    $respuesta_clientes = $clientes->readAllUser();
                    require_once './views/profesionales/lista_clientes.php';
                    echo "<script src='./js/script_clientes6.js'></script>";
                    echo "<script src='./js/script_clientes_mensajes.js'></script>";
                    break;
                case "cargas":
                    require_once '../config/conexion.php';
                    require_once '../controllers/userController.php';
                    require_once '../models/userModel.php';
                    $usuarios = new userController();
                    $respuestaUsuarios = $usuarios->readAllUser();
                    require_once '../controllers/mensajesController.php';
                    require_once '../models/mensajesModel.php';
                    require_once '../models/conversacionesModel.php';
                    $mensaje = new mensajesController();
                    $respuesta_mensajes = $mensaje->cargarMensajes($_SESSION['id']);
                    require_once '../views/mensajes/mensajes_clientes.php';
                    require_once '../views/mensajes/lista_mensajes.php';
                    break;
                case "comidas":
                   
                    require_once '../config/conexion.php';
                    require_once '../controllers/comidasController.php';
                    
                    break;
                case "recomendaciones":
                    require_once '../config/conexion.php';
                    require_once '../controllers/userController.php';
                    require_once '../models/userModel.php';
                    $usuarios = new userController();
                    $respuestaUsuarios = $usuarios->readAllUser();
                    require_once '../views/recomendaciones/recomendaciones.php';
                    $_POST['action']="listar";
                    require_once '../models/recomendacionModel.php';
                    require_once '../controllers/recomendacionController.php';
                    $recomendacion=new recomendacionController(); 
                    $respuesta_recomendaciones=$recomendacion->listar();
                    require_once '../views/recomendaciones/listado_recomendaciones.php';
                default:
                    
                    break;
            }

            break;
        case 1:
if (isset($_GET['pagina'])) {
                $pagina = $_GET['pagina'];
            } else {
                $pagina = "admin";
            }
            switch ($pagina) {
                case "admin":
                    require_once './views/admin/navbar.php';
                    require_once './config/conexion.php';
                    require_once './models/userModel.php';
                    require_once './controllers/userController.php';
                    
                    $usuarios = new userController();
                    $respuestaUsuarios = $usuarios->readAllUser();
                    require_once './views/admin/lista_usuarios.php';
                    require_once './views/admin/registro.php';
                    require_once './views/admin/modificar.php';
                    echo "<script src='./js/script_admin.js'></script>";
                    break;

                default:
                    break;
            }

            break;
    

        default:
            break;
    }
} else {

    require_once './views/login.php';
    require_once './views/registro.php';
}