<?php 

namespace Chatgpt\modelos;

class ModeloNoticias {
    
    public static function InsertNoticia($title, $content) {

        $conexion = new ConexionBD();
        $baseDatos = $conexion->getBaseDatos();
        $collection = $baseDatos->noticias;

        $number = $collection->countDocuments();

        $noticia = [
            "id" => $number + 1,
            "title" => $title,
            "content" => $content
        ];

        $collection->insertOne($noticia);

        $conexion->cerrarConexion();

    }

    public static function CambiarNoticia($id) {
        
        $conexion = new ConexionBD();
        $baseDatos = $conexion->getBaseDatos();
        $collection = $baseDatos->noticias;

        $number = $collection->countDocuments();

        $filter = ['id' => $number];

        $update = ['$set' => ['image' => $id]];

        $collection->updateOne($filter, $update);

        $conexion->cerrarConexion();

    }

}

?>