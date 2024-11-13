<?php 

namespace Coworking\controladores;
use Coworking\vistas\VistaSalas;
use Coworking\modelos\ModeloSalas;

class ControladorSalas {
    /**
     * Shows all available coworking spaces.
     */
    public static function mostrarSalas($salas) {
        // TODO: Implement logic to show all available coworking spaces.
        $salas = ModeloSalas::getAll();
        VistaSalas::render($salas);
    }
}

?>