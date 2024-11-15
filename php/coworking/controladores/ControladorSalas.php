<?php 

namespace Coworking\controladores;
use Coworking\vistas\VistaSalas;
use Coworking\modelos\ModeloSalas;

class ControladorSalas {
    /**
     * Shows all available coworking spaces.
     */
    public static function mostrarSalas($salas) {
        $salas = ModeloSalas::getAll();
        VistaSalas::render($salas);
    }

    /**
     * Insert rooms into session.
     */
    public static function cargarSalasSession() {

        $_SESSION['datos_salas'] = ModeloSalas::getAllNames();

    }
}

?>