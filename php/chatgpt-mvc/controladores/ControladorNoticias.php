<?php

namespace Chatgpt\controladores;
use Chatgpt\vistas\VistaBlog;


class ControladorNoticias {

    /**
     * Function that prints the news added by the admin.
     * Recive a string with the error message if it exists.
     */
    public static function MostrarNoticias($error) {

        VistaBlog::render($error);

    }

}

?>