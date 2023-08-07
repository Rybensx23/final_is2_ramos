<?php

namespace Controllers;

use Exception;
use Model\Puesto;
use MVC\Router;

class PuestoController{
    public static function index(Router $router){
        $Puestos = Puesto::all();        
        $router->render('puestos/index', [
                   ]);

    }

    public static function guardarAPI(){
        try {
            $puesto = new Puesto($_POST);
            $resultado = $puesto->crear();

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
            $puesto = new Puesto($_POST);
            $resultado = $puesto->actualizar();

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
            $pue_cod = $_POST['pue_cod'];
            $puesto = Puesto::find($pue_cod);
            $puesto->pue_situacion = 0;
            $resultado = $puesto->actualizar();

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
        $pue_descr = $_GET['pue_descr'];
        $pue_suel = $_GET['pue_suel'];

        $sql = "SELECT * FROM puestos where pue_situacion = 1 ";
        if($pue_descr != '') {
            $sql.= " and pue_descr like '%$pue_descr%' ";
        }
        if($pue_suel != '') {
            $sql.= " and pue_suel like '%$pue_suel%' ";
        }
        
        try {
            
            $puestos = Puesto::fetchArray($sql);
    
            echo json_encode($puestos);
        } catch (Exception $e) {
            echo json_encode([
                'detalle' => $e->getMessage(),
                'mensaje' => 'Ocurrió un error',
                'codigo' => 0
            ]);
        }
    }
}