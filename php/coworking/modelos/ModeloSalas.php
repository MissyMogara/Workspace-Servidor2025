<?php

namespace Coworking\modelos;

use Coworking\modelos\Sala;
use \PDO;

class ModeloSalas {

    public static function getAll()
    {

        $conexion = new ConexionBD();

        // DB query to get all rooms        
        $stmt = $conexion->getConnexion()->prepare("SELECT * FROM salas");
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Coworking\modelos\Sala');
        $stmt->execute();
        $salas = $stmt->fetchAll();

        $conexion->cerrarConexion();

        return $salas;
    }

    public static function getAllNames()
    {

        $conexion = new ConexionBD();

        // DB query to get all rooms        
        $stmt = $conexion->getConnexion()->prepare("SELECT id, nombre FROM salas");
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Coworking\modelos\Sala');
        $stmt->execute();
        $salas = $stmt->fetchAll();

        $conexion->cerrarConexion();

        return $salas;
    }
    

}
