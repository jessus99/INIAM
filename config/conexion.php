<?php
class conexion{
    //VARIABLES NECESARIAS PARA CREAR LA CONEXION
    private static $instance = NULL; //VARIABLE DE LA CLASE, NO DEL OBJETO
    private function __construct(){}
    public static function getConnect(){
        try{
            //PREGUNTAR SI LA INSTANCIA NO EXISTE PARA CREARLA 
            if(!isset(self::$instance)){
                $pdo_options[PDO::ATTR_ERRMODE]=PDO::ERRMODE_EXCEPTION;//INVESTIGAR
                self::$instance=new PDO(
                        'mysql:host=localhost;dbname=matricula',
                        'root',
                        ''
                );
                
            }// DEVUELVE LA INSTANCIA SI EXISTE
            return self::$instance;
            
        }catch(PDOException $e){
            echo 'Conexion fallida ' . $e->getMessage();
        }
    }
}
?>

