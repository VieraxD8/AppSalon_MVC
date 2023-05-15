<?php


namespace Controllers;

use MVC\Router;
use Model\AdminCita;



class AdminControllers {


    public static function index( Router $router) {

        session_start();

        isAdmin();

         $fecha = $_GET['fecha'] ?? date('Y-m-d') ;
         $fechas = explode('-', $fecha);

         if(!checkdate($fechas[1], $fechas[2], $fechas[0])){
                header('Location: /404');
         }


        //Consultar la base de datos

        $consulta = "SELECT citas.id, citas.hora, CONCAT(usuarios.nombre, ' ', usuarios.apellido) AS cliente, ";
        $consulta .= " usuarios.email, usuarios.telefono, servicios.nombre as servicio, servicios.precio  ";
        $consulta .= " FROM citas  ";
        $consulta .= " LEFT OUTER JOIN usuarios ";
        $consulta .= " ON citas.usuarioid = usuarios.id  ";
        $consulta .= " LEFT OUTER JOIN citaservicio ";
        $consulta .= " ON citaservicio.citaid=citas.id ";
        $consulta .= " LEFT OUTER JOIN servicios ";
        $consulta .= " ON servicios.id = citaservicio.servicioid ";
        $consulta .= " WHERE fecha =  '{$fecha}' ";

        $citas =  AdminCita::SQL($consulta);



        $router->render('admin/index', [
            'nombre' => $_SESSION['nombre'],
            'citas' => $citas,
            'fecha' => $fecha
        ]);

    }


}



?>