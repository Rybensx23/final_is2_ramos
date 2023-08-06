<?php

namespace Model;

class Sexo extends ActiveRecord{
    public static $tabla = 'sexos';
    public static $columnasDB = ['sex_descr','sex_situacion'];
    public static $idTabla = 'sex_cod';

    public $sex_cod;
    public $sex_descr;
    public $sex_situacion;

    public function __construct($args =[])
    {
        $this->sex_cod = $args['sex_cod'] ?? null;
        $this->sex_descr = $args['sex_descr'] ?? '';
        $this->sex_situacion = $args['sex_situacion'] ?? '1';
    }

}