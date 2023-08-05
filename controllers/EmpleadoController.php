<?php

namespace Controllers;

use Exception;
use Model\Empleado;
use MVC\Router;

class EmpleadoController{
    public static function index(Router $router){
        $empleados = Empleado::all();
        // $empleados2 = Empleado::all();
        // var_dump($empleados);
        // exit;
        $router->render('empleados/index', [
            'empleados' => $empleados,
            // 'empleados2' => $empleados2,
        ]);

    }

    public static function guardarAPI(){
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
            $empleado->empleado_situacion = 0;
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
        // $productos = Producto::all();
        $emp_nom = $_GET['emp_nom'];
        $emp_dpi = $_GET['emp_dpi'];

        $sql = "SELECT * FROM empleados where emp_situacion = 1 ";
        if($emp_nom != '') {
            $sql.= " and emp_nom like '%$emp_nom%' ";
        }
        if($emp_dpi != '') {
            $sql.= " and emp_dpi = $emp_dpi ";
        }
        try {
            
            $empleados = Empleado::fetchArray($sql);
    
            echo json_encode($productos);
        } catch (Exception $e) {
            echo json_encode([
                'detalle' => $e->getMessage(),
                'mensaje' => 'Ocurrió un error',
                'codigo' => 0
            ]);
        }
    }
}