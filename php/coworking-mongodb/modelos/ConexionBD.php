<?php 

namespace Coworking\modelos;

use MongoDB\Client; // Importar el cliente de MongoDB
use MongoDB\Exception\Exception;


require './vendor/autoload.php';

class ConexionBD {

    private $conexion;
    private $baseDatos;


    public function __construct() {

        $host = "mongodb://localhost:27017"; // Docker container's ip or container's name and internal docker container port.

        try {
            if ($this->conexion == null) {
                // Crear la conexión al cliente de MongoDB
                $this->conexion = new Client($host);
                // Seleccionar la base de datos
                $this->baseDatos = $this->conexion->selectDatabase("coworking");
            }
        } catch (\Exception $e) {
            echo "Error al conectar con MongoDB: " . $e->getMessage();
        }
    }

    
    /**
     * Getter conexion
     */
    public function getConnexion() {

        return $this->conexion;

    }

    /**
     * Getter para la base de datos seleccionada
     */
    public function getBaseDatos() {
        return $this->baseDatos;
    }

    /**
     * Close connection method
     */
    public function cerrarConexion() {
        
        $this->conexion = null;
        $this->baseDatos = null;
        
    }

}

?>