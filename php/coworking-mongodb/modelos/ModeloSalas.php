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
        $salas_arr = [];
        foreach ($salas as $sala) {
            $salaObj = new Sala($sala["_id"], $sala["nombre"], $sala["capacidad"], $sala["ubicacion"], $sala["id"]);
            array_unshift($salas_arr, $salaObj);
        }

        // Sorting by ID in ascending order
        usort($salas_arr, function($a, $b) {
            return $a->getId() <=> $b->getId();
        });

        $conexion->cerrarConexion();

        

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

        // DB query to get all rooms 
        $salas = $colection->find(); 
        
        $names_arr = [];

        foreach ($salas as $sala) {
            $nameObj = new Sala($sala["_id"], $sala["nombre"], "", "", $sala["id"]); // Only names and ids.
            array_unshift($names_arr, $nameObj);
        }
        
        $conexion->cerrarConexion();

        
        return $names_arr;
    }
    

}
