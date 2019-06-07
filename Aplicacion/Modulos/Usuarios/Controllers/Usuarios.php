<?php
/**
 * Creado por Jida Framework
 * 2019-06-07 13:31:26
 */

namespace App\Modulos\Usuarios\Controllers;
  
use App\Controllers\App;
use App\Modulos\Usuarios\Modelos\Usuario;
use Jida\Render\Formulario;

class Usuarios extends App{
      
    public function index() {

        $form = new Formulario('usuarios/registro');

        //var_dump($form);

        $this->data(['form' => $form->render()]);

        if ($this->post('btnRegistro')) {
            $this->procesarRegistro($form);
            return;
        }

    }

    public function procesarRegistro(Formulario $form) {

        if (!$form->validar()) {
            return;
        }

        $usuario = new Usuario();
        var_dump($usuario);
        if ($usuario->salvar($this->post())) {

        }
    }
    
}
