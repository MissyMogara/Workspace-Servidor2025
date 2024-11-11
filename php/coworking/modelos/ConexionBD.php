<?php 

namespace Coworking\modelos;

use \PDO;
use \PDOException;

class ConexionBD {

    private $conexion;

    public function __construct() {

        $host = "mariadb:3306"; // Docker container's ip or container's name and internal docker container port.
        try {

            if($this->conexion == null) {

                $this->conexion = new PDO("mysql:host=" . $host . ";dbname=" . "coworking", "root", "toor");
                $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->conexion->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

            }

        } catch (PDOException $e) {

            echo $e->getMessage();

        }
    }
    
    /**
     * Getter conexion
     */
    public function getConnexion() {

        return $this->conexion;

    }

    /**
     * Close connection method
     */
    public function cerrarConexion() {
        
        $this->conexion = null;
        
    }

}

?>