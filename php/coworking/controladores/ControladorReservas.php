<?php 

namespace Coworking\controladores;
use Coworking\vistas\VistaReservas;

class ControladorReservas {

    /**
     * Shows all reservations.
     */
    public static function mostrarReservas() {
        VistaReservas::render();
    }

}

?>