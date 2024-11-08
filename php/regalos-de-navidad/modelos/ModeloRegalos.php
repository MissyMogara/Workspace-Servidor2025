<?php 

namespace Regalos\modelos;

use Regalos\modelos\Regalo;
use \PDO;

class ModeloRegalos {
    
    public static function getAll(){

        $conexion = new ConexionBD();

        // DB query to get all presents        
        $stmt = $conexion->getConnexion()->prepare("SELECT * FROM regalos");
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Regalos\modelos\Regalo');
        $stmt->execute();
        $regalos = $stmt->fetchAll();

        $conexion->cerrarConexion();

        return $regalos;

    }
}


?>