<?php
/**
 * Creado por Jida Framework
 * 2019-06-07 13:31:26
 */

namespace App\Modulos\Usuarios\Modelos;
  
use Jida\Core\Modelo;

class Usuario extends Modelo{

    public $id_usuario;
    public $nombre_usuario;
    public $clave_usuario;
    public $nombres;
    public $apellidos;
    public $correo;
    public $sexo;

    protected $tablaBD = "s_usuarios";
    protected $pk = "id_usuario";
}
