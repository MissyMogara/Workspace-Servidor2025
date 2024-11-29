<?php



use MongoDB\Client; // Importar el cliente de MongoDB
use MongoDB\Exception\Exception;


require './vendor/autoload.php';

class ConexionBD {

    private $conexion;
    


    public function __construct() {

        $host = "mongodb://root:toor@mongodb:27017"; // Docker container's ip or container's name and internal docker container port.

        try {
            if ($this->conexion == null) {
                // Crear la conexión al cliente de MongoDB
                $this->conexion = (new Client($host))->coworking;
                // Seleccionar la base de datos
                
            }
        } catch (\Exception $e) {
            echo "Error al conectar con MongoDB: " . $e->getMessage();
        }
    }

    
    /**
     * Getter conexion
     */
    public function getConexion() {

        return $this->conexion;

    }

    /**
     * Close connection method
     */
    public function cerrarConexion() {
        
        $this->conexion = null;
        
    }

}

$conexionObj = new ConexionBD();
$conexion = $conexionObj->getConexion();

$collection = $conexion->salas;
$salas = $collection->find();

foreach ($salas as $sala) {
    echo "ID: ". $sala["_id"]. ", Nombre: ". $sala["nombre"]. ", Capacidad: ". $sala["capacidad"]. "<br>";
}




?>