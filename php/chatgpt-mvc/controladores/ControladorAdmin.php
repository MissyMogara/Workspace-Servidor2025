<?php 

namespace Chatgpt\controladores;
use Chatgpt\vistas\VistaLogin;

class ControladorAdmin {

    /**
     * This function shows login screen.
     * Recive a string error message.
     */
    public static function MostrarLogin($error){

        VistaLogin::render($error);

    }

}

?>