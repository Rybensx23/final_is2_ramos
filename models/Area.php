<?php

namespace Model;

class Area extends ActiveRecord{
    public static $tabla = 'areas';
    public static $columnasDB = ['area_nom','area_situacion'];
    public static $idTabla = 'area_cod';

    public $area_cod;
    public $area_nom;
    public $area_situacion;

    public function __construct($args =[])
    {
        $this->area_cod = $args['area_cod'] ?? null;
        $this->area_nom = $args['area_nom'] ?? '';
        $this->area_situacion = $args['area_situacion'] ?? '1';
    }

}