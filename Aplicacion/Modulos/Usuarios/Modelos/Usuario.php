<?php
/**
 * Creado por Jida Framework
 * 2019-06-07 13:31:26
 */

namespace App\Modulos\Usuarios\Modelos;
  
use Jida\Core\Modelo;

class Usuario extends Modelo{

    public $id_usuario;
    public $usuario;
    public $clave;
    public $nombres;
    public $apellidos;
    public $correo;
    public $sexo;
    public $id_estatus;

    protected $tablaBD = "s_usuarios";
    protected $pk = "id_usuario";
}
