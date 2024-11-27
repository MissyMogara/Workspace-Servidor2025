<?php

namespace Coworking\modelos;

use Coworking\modelos\Sala;
use \PDO;

class ModeloSalas {

    /**
     * Get all rooms
     */
    public static function getAll()
    {

        $conexion = new ConexionBD();
        $baseDatos = $conexion->getBaseDatos();
        $colection = $baseDatos->salas;
        $salas = $colection->find();

        // DB query to get all rooms        
        // $stmt = $conexion->getConnexion()->prepare("SELECT * FROM salas");
        // $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Coworking\modelos\Sala');
        // $stmt->execute();
        // $salas = $stmt->fetchAll();

        $conexion->cerrarConexion();

        $salas_arr = iterator_to_array($salas);

        return $salas_arr;
    }
    /**
     * Get all room names.
     */
    public static function getAllNames()
    {

        $conexion = new ConexionBD();
        $baseDatos = $conexion->getBaseDatos();
        $colection = $baseDatos->salas;


        $filtro = []; // Filter of what attributes we want
        $proyector = [ '_id' => 1,'nombre' => 1, "capacidad" => 0, "ubicacion" => 0];
        $names = $colection->find($filtro, ['projection' => $proyector]); // Only names and ids.


        // // DB query to get all rooms        
        // $stmt = $conexion->getConnexion()->prepare("SELECT id, nombre FROM salas");
        // $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Coworking\modelos\Sala');
        // $stmt->execute();
        // $salas = $stmt->fetchAll();

        $conexion->cerrarConexion();

        $names_arr = iterator_to_array($names);

        return $names_arr;
    }
    

}
