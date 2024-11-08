<?php 

namespace Regalos\controladores;

use Regalos\modelos\ModeloRegalo;
use Regalos\vistas\VistaRegalos;
use Regalos\modelos\ModeloRegalos;
use Regalos\vistas\VistaLogin;

class ControladorRegalos {

    /**
     *Method that shows login if not logged in.
     */
    public static function mostrarLogin() {
        VistaLogin::render();
    }

    /**
     * Method that shows all presents.
     */
    public static function mostrarRegalos() {

        $regalos = ModeloRegalos::getAll();
        VistaRegalos::render($regalos);

    }

}


?>