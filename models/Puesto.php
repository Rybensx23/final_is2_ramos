<?php

namespace Model;

class Puesto extends ActiveRecord{
    public static $tabla = 'puestos';
    public static $columnasDB = ['pue_descr','pue_suel','pue_situacion'];
    public static $idTabla = 'pue_cod';

    public $pue_cod;
    public $pue_descr;
    public $pue_suel;
    public $pue_situacion;

    public function __construct($args =[])
    {
        $this->pue_cod = $args['pue_cod'] ?? null;
        $this->pue_descr = $args['pue_descr'] ?? '';
        $this->pue_suel = $args['pue_suel'] ?? '';
        $this->pue_situacion = $args['pue_situacion'] ?? '1';
    }

}