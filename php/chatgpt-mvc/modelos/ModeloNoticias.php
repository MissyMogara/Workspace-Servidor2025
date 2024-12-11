<?php 

namespace Chatgpt\modelos;

class ModeloNoticias {

    public static function getNoticias() {

        $conexion = new ConexionBD();
        $baseDatos = $conexion->getBaseDatos();
        $collection = $baseDatos->noticias;

        $noticias = $collection->find();

        $noticias_arr = [];

        foreach ($noticias as $noticia) {
            $objNoticia = new Noticia(0 , $noticia["id"], $noticia["title"], $noticia["content"], $noticia["date"], $noticia["image"]);
            array_push($noticias_arr, $objNoticia);
        }

        return $noticias_arr;

        $conexion->cerrarConexion();

    }
    
    public static function InsertNoticia($title, $content, $image) {

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

    // public static function CambiarNoticia($id) {
        
    //     $conexion = new ConexionBD();
    //     $baseDatos = $conexion->getBaseDatos();
    //     $collection = $baseDatos->noticias;

    //     $number = $collection->countDocuments();

    //     $filter = ['id' => $number];

    //     $update = ['$set' => ['image' => $id]];

    //     $collection->updateOne($filter, $update);

    //     $conexion->cerrarConexion();

    // }

}

?>