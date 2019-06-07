<?php
/**
 * Creado por Jida Framework
 * 2019-06-07 13:31:26
 */

namespace App\Modulos\Usuarios\Jadmin\Controllers;
  
use Jida\Jadmin\Controllers\JControl;

class Usuarios extends JControl{
      
    public function index() {
    
        $this->data(['mensaje' => 'Controlador '.self::class]);


    }
    
}
