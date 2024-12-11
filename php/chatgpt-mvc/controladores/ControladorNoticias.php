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

        $noticias = ModeloNoticias::getNoticias();

        VistaBlog::render($noticias);

    }

    /**
     * This function saves title and content to the database
     */
    public static function GuardarNoticia($title, $content, $img) {

        ModeloNoticias::InsertNoticia($title, $content, $img);

        $noticias = ModeloNoticias::getNoticias();

        VistaBlog::render($noticias);


    }

    /**
     * This function deletes all news
     */
    public static function BorrarNoticias() {

        ModeloNoticias::BorrarTodo();

    }

}

?>