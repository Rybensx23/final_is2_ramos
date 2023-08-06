<?php

namespace Controllers;

use Exception;
use Model\Sexo;
use MVC\Router;

class SexoController{
    public static function index(Router $router){
        $sexos = Sexo::all();        
        $router->render('sexos/index', [
            'sexos' => $sexos,
        ]);

    }

    public static function guardarAPI(){
        try {
            $sexo = new Sexo($_POST);
            $resultado = $sexo->crear();

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
            $sexo = new Sexo($_POST);
            $resultado = $sexo->actualizar();

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
            $sex_cod = $_POST['sex_cod'];
            $sexo = Sexo::find($sex_cod);
            $sexo->sexo_situacion = 0;
            $resultado = $sexo->actualizar();

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
        $sex_descr = $_GET['sex_descr'];

        $sql = "SELECT * FROM sexos where sex_situacion = 1 ";
        if($sex_descr != '') {
            $sql.= " and sex_descr like '%$sex_descr%' ";
        }
        
        try {
            
            $sexos = Sexo::fetchArray($sql);
    
            echo json_encode($sexos);
        } catch (Exception $e) {
            echo json_encode([
                'detalle' => $e->getMessage(),
                'mensaje' => 'Ocurrió un error',
                'codigo' => 0
            ]);
        }
    }
}