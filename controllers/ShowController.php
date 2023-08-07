<?php
// ShowController.php

namespace Controllers;

use Exception;
use Model\Empleado;
use Model\Area;
use Model\Puesto;
use Model\Sexo;
use MVC\Router;

class ShowController
{
    public static function index(Router $router)
    {
        $empleadosPorAreas = static::EmpleadosPorAreas();        
        $router->render('shows/index', [
            'empleadosPorAreas' => $empleadosPorAreas
        ]);
    }

    public static function EmpleadosPorAreas()
    {
        $sql = "
        SELECT
            e.emp_cod AS emp_cod,
            e.emp_nom AS emp_nom,
            e.emp_dpi AS emp_dpi,
            e.emp_edad AS emp_edad,
            s.sex_descr AS sex_descr,
            p.pue_descr AS pue_descr,
            p.pue_suel AS pue_suel,
            a.area_nom AS area_nombre
        FROM
            empleados e
        JOIN puestos p ON e.emp_puesto_cod = p.pue_cod
        JOIN areas a ON e.emp_area_cod = a.area_cod
        JOIN sexos s ON e.emp_sex_cod = s.sex_cod
        WHERE
            e.emp_situacion = '1' 
        AND p.pue_situacion = '1' 
        AND a.area_situacion = '1'
        AND s.sex_situacion = '1'
        order by area_nombre;
    ";

        try {           
            $empleadosPorAreas = Empleado::fetchArray($sql);           
            $empleadosAgrupadosPorAreas = [];
            foreach ($empleadosPorAreas as $empleadoPorArea) {
                $areaNombre = $empleadoPorArea['area_nombre'];
                if (!isset($empleadosAgrupadosPorAreas[$areaNombre])) {
                    $empleadosAgrupadosPorAreas[$areaNombre] = [];
                }
                $empleadosAgrupadosPorAreas[$areaNombre][] = $empleadoPorArea;
            }

            return $empleadosAgrupadosPorAreas;
        } catch (Exception $e) {
            return [];
        }
    }
}
