<?php

namespace Controllers;

use Exception;
use Model\Empleado;
use MVC\Router;

class EmpleadoController{

    public static function index(Router $router){
        $empleados = Empleado::all();
        $puestos = static::buscarPuestos();
        $sexos = static::buscarSexos();
        $areas = static::buscarAreas();

        $empleados = Empleado::all();

        $router->render('empleados/index', [
            'empleados' => $empleados,
            'puestos' => $puestos,
            'sexos' => $sexos,
            'areas' => $areas,
        ]);

    }

    public static function guardarAPI(){
// echo json_encode($_POST);
// exit;

        try {
            $empleado = new Empleado($_POST);
            $resultado = $empleado->crear();

            if($resultado['resultado'] == 1){
                echo json_encode([
                    'mensaje' => 'Registro guardado correctamente',
                    'codigo' => 1
                ]);
            }else{
                echo json_encode([
                    'mensaje' => 'Ocurrió un error',
                    'codigo' => 0
                ]);
            }
            // echo json_encode($resultado);
        } catch (Exception $e) {
            echo json_encode([
                'detalle' => $e->getMessage(),
                'mensaje' => 'Ocurrió un error',
                'codigo' => 0
            ]);
        }
    }

    public static function modificarAPI(){
        try {
            $empleado = new Empleado($_POST);
            $resultado = $empleado->actualizar();

            if($resultado['resultado'] == 1){
                echo json_encode([
                    'mensaje' => 'Registro modificado correctamente',
                    'codigo' => 1
                ]);
            }else{
                echo json_encode([
                    'mensaje' => 'Ocurrió un error',
                    'codigo' => 0
                ]);
            }
            // echo json_encode($resultado);
        } catch (Exception $e) {
            echo json_encode([
                'detalle' => $e->getMessage(),
                'mensaje' => 'Ocurrió un error',
                'codigo' => 0
            ]);
        }
    }

    public static function eliminarAPI(){
        try {
            $emp_cod = $_POST['emp_cod'];
            $empleado = Empleado::find($emp_cod);
            $empleado->emp_situacion = 0;
            $resultado = $empleado->actualizar();

            if($resultado['resultado'] == 1){
                echo json_encode([
                    'mensaje' => 'Registro eliminado correctamente',
                    'codigo' => 1
                ]);
            }else{
                echo json_encode([
                    'mensaje' => 'Ocurrió un error',
                    'codigo' => 0
                ]);
            }
            // echo json_encode($resultado);
        } catch (Exception $e) {
            echo json_encode([
                'detalle' => $e->getMessage(),
                'mensaje' => 'Ocurrió un error',
                'codigo' => 0
            ]);
        }
    }

    public static function buscarAPI(){
        $emp_nom = $_GET['emp_nom'];
        $emp_dpi = $_GET['emp_dpi'];
        $emp_puesto_cod = $_GET['emp_puesto_cod'];
        $emp_edad = $_GET['emp_edad'];
        $emp_sex_cod = $_GET['emp_sex_cod'];
        $emp_area_cod = $_GET['emp_area_cod'];

        $sql = "SELECT * FROM empleados where emp_situacion = 1 ";
        if($emp_nom != '') {
            $sql.= " and emp_nom like '%$emp_nom%' ";
        }
        if($emp_dpi != '') {
            $sql.= " and emp_dpi like '%$emp_dpi%' ";
        }
        if($emp_puesto_cod != '') {
            $sql.= " and emp_puesto_cod like '%$emp_puesto_cod%' ";
        }
        if($emp_edad != '') {
            $sql.= " and emp_edad ";
        }
        if($emp_sex_cod != '') {
            $sql.= " and emp_sex_cod like '%$emp_sex_cod%' ";
        }
        if($emp_area_cod != '') {
            $sql.= " and emp_area_cod like '%$emp_area_cod%' ";
        }
        
        try {
            
            $empleados = Empleado::fetchArray($sql);
    
            echo json_encode($empleados);
        } catch (Exception $e) {
            echo json_encode([
                'detalle' => $e->getMessage(),
                'mensaje' => 'Ocurrió un error',
                'codigo' => 0
            ]);
        }
    }

    public static function buscarSexos(){
  

        $sql = "SELECT * FROM sexos where sex_situacion = 1 ";
        
        try {
            
            $sexos = Empleado::fetchArray($sql);
    
            if ($sexos){
                return $sexos;

            }else {
                return 0;
            }
        } catch (Exception $e) {
     
        }
        
    }


    public static function buscarAreas(){
       
        $sql = "SELECT * FROM areas where area_situacion = 1 ";
        
        try {
            
            $areas = Empleado::fetchArray($sql);
    
            if ($areas){
                return $areas;

            }else {
                return 0;
            }
        } catch (Exception $e) {
     
        }
    }

    public static function buscarPuestos(){
       
        $sql = "SELECT * FROM puestos where pue_situacion = 1 ";
       
        try {
            
            $puestos = Empleado::fetchArray($sql);
    
            if ($puestos){
                return $puestos;

            }else {
                return 0;
            }
        } catch (Exception $e) {
     
        }
    }


}