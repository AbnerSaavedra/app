# Creación de aplicación básica con jida Framework


Para empezar, haremos un fork o clone del repositorio para aplicaciones de jida
[https://github.com/jidadesarrollos/app](https://github.com/jidadesarrollos/app).

Luego de la clonación, debemos realizar los siguientes pasos:

- `composer install`
- Instalaremos el backup de la base de dats ubicado en  `BD/app.sql`
- Adentro del repositorio, dirigirnos a `Aplicacion\Config` y renombrar el archivo
   BD_copia.php como 'BD.php', luego acceder a el y configurar el acceso a base de datos. 
   el key 'bd' dentro del arreglo default, corresponde al nombre de base de datos, debe ser
   el mismo que le pusimos a la base de datos creada en el paso previo.
   
La base de datos tiene una estructura básica de tablas que complementan un conjunto de funcionalidades
que ya ofrece el Jida. El objetivo del tutorial no es repasarlas todas, para la funcionalidad que desarrollaremos
solo haremos uso de la tabla `s_usuarios`.

## Modulo de usuarios

Para crear el modulo, voleremos a la consola y ejecutaremos el siguiente comando
```console
php vendor/jida/jida/bin/jida crear:modulo Usuarios 
```
Cuando finalice, podremos ver que se creo la estructura del modulo `Usuarios` en el directorio
`Aplicacion/Modulos/Usuarios`.

Jida es un framework que tiene una estructura basada principalmente en el patrón hMVC, por lo que todo es considerado
un modulo y cada modulo a su vez puede constar de Modelos, Controladores y Vistas.
Para que el modulo de usuarios esté disponible en la aplicacion, es necesario conceder el acceso, esto se hace
modificando la clase de configuracion `App\Config\Configuracion` y agregando el modulo en la propiedad $modulos de tipo arreglo.


> NOTA: Jida es case sensitive por lo que la estructura de nombres debe ser respetada, todas las carpetas de clases y objetos
son nombradas con la primera letra en mayuscula. Las clases deben ser nombradas en _UpperCamelCase_ y los metodos en 
_lowerCamelCase_

En la clase de configuración, la propiedad `$modulos` debe quedar similar a lo siguiente:
```php
    static $modulos = [
        'Usuarios'
    ];
```
Si ahora accedemos a la ruta `[ruta-app]/usuarios` podremos ver una vista que imprime el nombre del controlador.

Para darle dinamica, crearemos un formulario de inicio de sesión y otro de registro.

## Formulario de inicio de sesion.

Jida, tiene unos utilitarios para la renderización y manejo de funcionalidades basicas de html y javascript.
Hoy los formularios se manejan por medio de la clase `Jida\Render\Formulario` la cual debe lee la configuración de
los formularios a partir de un archivo `.json`. Por tanto, para crear el formulario, procederemos a crear una carpeta
"Formularios" adentro del modulo Usuarios y adentro crearemos un archivo json "Registro.json" con la siguiente estructura:

```angular2
{
  "nombre": "Gestion Usuarios",
  "identificador": "GestionUsuarios",
  "campos": [
    {
      "name": "nombres",
      "id": "nombres",
      "label": "Nombres"
    },
    {
      "name": "correo",
      "type": "email",
      "id": "correo",
      "label": "Correo"
    },
    {
      "name": "sexo",
      "type": "select",
      "id": "sexo",
      "label": "Sexo",
      "opciones": "M=Masculino;F=Femenino"
    },
    {
      "name": "usuario",
      "type": "text",
      "id": "usuario",
      "label": "Nombre de usuario"
    },
    {
      "name": "clave_usuario",
      "id": "clave_usuario",
      "label": "Clave",
      "eventos": [
        "obligatorio"
      ]
    },
    {
      "name": "clave_usuario_2",
      "id": "clave_usuario_2",
      "label": "Clave",
      "eventos": [
        "obligatorio"
      ]
    },
    {
      "name": "apellidos",
      "id": "apellidos",
      "label": "Apellidos"
    }
  ]
}

```
> Nota: el formulario habria quedado en la siguiente ubicación: `App\Modulos\Usuarios\Formularios\Registro.json`;

Ya con el formulario creado, procedemos a instanciarlo, para ello debemos modificar el Controlador principal del modulo.
`App\Modulos\Controllers\Usuarios` en el metodo index.

```php
class Usuarios extends App {

    public function index() {

        $form = new Formulario('usuarios/registro');

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
        if ($usuario->salvar($this->post())) {

        }
    }

}

```




   