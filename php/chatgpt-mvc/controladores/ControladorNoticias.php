<?php

namespace Chatgpt\controladores;
use Chatgpt\vistas\VistaBlog;
use Chatgpt\modelos\ModeloNoticias;


class ControladorNoticias {

    /**
     * Function that prints the news added by the admin.
     * Recive a string with the error message if it exists.
     */
    public static function MostrarNoticias($error) {

        VistaBlog::render($error);

    }

    /**
     * This function saves title and content to the database
     */
    public static function GuardarNoticia($title, $content) {

        ModeloNoticias::InsertNoticia($title, $content);

    }

    /**
     * This function updates img on database
     */
    public static function UpdateNoticia($id) {

        ModeloNoticias::CambiarNoticia($id);

    }

}

?>