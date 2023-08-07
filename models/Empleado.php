<?php

namespace Model;

class Empleado extends ActiveRecord{
    public static $tabla = 'empleados';
    public static $columnasDB = ['emp_nom','emp_dpi','emp_puesto_cod','emp_edad','emp_sex_cod','emp_area_cod','emp_situacion'];
    public static $idTabla = 'emp_cod';

    public $emp_cod;
    public $emp_nom;
    public $emp_dpi;
    public $emp_puesto_cod;
    public $emp_edad;
    public $emp_sex_cod;
    public $emp_area_cod;
    public $emp_situacion;

    public function __construct($args = [])
    {
        $this->emp_cod = $args['emp_cod'] ?? null;
        $this->emp_nom = utf8_decode($args['emp_nom']) ?? '';
        $this->emp_dpi = $args['emp_dpi'] ?? '';
        $this->emp_puesto_cod = $args['emp_puesto_cod'] ?? '';
        $this->emp_edad = $args['emp_edad'] ?? '';
        $this->emp_sex_cod = $args['emp_sex_cod'] ?? '';
        $this->emp_area_cod = $args['emp_area_cod'] ?? '';
        $this->emp_situacion = $args['emp_situacion'] ?? '1';;
    }

}