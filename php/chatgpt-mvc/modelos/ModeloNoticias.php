<?php

namespace Chatgpt\modelos;

class ModeloNoticias
{

    public static function getNoticias()
    {

        $conexion = new ConexionBD();
        $baseDatos = $conexion->getBaseDatos();
        $collection = $baseDatos->noticias;

        $noticias = $collection->find();

        $noticias_arr = [];

        foreach ($noticias as $noticia) {
            $objNoticia = new Noticia(0, $noticia["id"], $noticia["title"], $noticia["content"], $noticia["date"], $noticia["image"]);
            array_push($noticias_arr, $objNoticia);
        }

        return $noticias_arr;

        $conexion->cerrarConexion();
    }

    public static function InsertNoticia($title, $content, $image)
    {

        $conexion = new ConexionBD();
        $baseDatos = $conexion->getBaseDatos();
        $collection = $baseDatos->noticias;

        $number = $collection->countDocuments();

        $currentDate = date('Y-m-d H:i:s');

        $noticia = [
            "id" => $number + 1,
            "title" => $title,
            "content" => $content,
            "date" => $currentDate,
            "image" => $image
        ];

        $collection->insertOne($noticia);

        $conexion->cerrarConexion();
    }

    // Delete all news, this function is only if you generated a lot of news, 
    //not gonna lie this function is for the developer, on production this never gonna be live
    public static function BorrarTodo()
    {

        $conexion = new ConexionBD();
        $baseDatos = $conexion->getBaseDatos();
        $collection = $baseDatos->noticias;

        $deleteResult = $collection->deleteMany([]);

        echo "Documentos eliminados: " . $deleteResult->getDeletedCount() . "\n";

        $conexion->cerrarConexion();
    }
}
