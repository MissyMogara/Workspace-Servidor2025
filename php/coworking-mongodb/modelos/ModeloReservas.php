<?php 

namespace Coworking\modelos;

require 'vendor/autoload.php';

use Coworking\modelos\Reservas;

class ModeloReservas {

    /**
     * @param string
     * Returns all rooms by id.
     */
    public static function getAllByRoomId($id)
    {

        $conexion = new ConexionBD();
        $baseDatos = $conexion->getBaseDatos();
        $colection = $baseDatos->reservas;

        // DB query to get all reservations
        $reservas = $colection->find(["id_sala" => $id]);

        
        $reservas_arr = [];

        foreach ($reservas as $reserva) {
            $reservaObj = new Reservas($reserva["_id"],$reserva["id_reserva"], $reserva["id_usuario"], $reserva["id_sala"], 
            $reserva["fecha_reserva"], $reserva["hora_inicio"], $reserva["hora_fin"], $reserva["estado"], $reserva["email_usuario"]);
            array_push($reservas_arr, $reservaObj);
        }
        

        $conexion->cerrarConexion();

        return $reservas_arr;
    }
    
    /**
     * @param string 
     * Returns all reservations by user.
     */
    public static function getAllByUserEmail($email){
        
        $conexion = new ConexionBD();
        $baseDatos = $conexion->getBaseDatos();
        $colection = $baseDatos->reservas;

        // DB query to get user's reservations  
        $reservas = $colection->find(["email_usuario" => $email, "estado" => "confirmada"], ['sort' => ['fecha' => 1]]);

        $reservas_arr = [];

        foreach ($reservas as $reserva) {
            $reservaObj = new Reservas($reserva["_id"], $reserva["id_reserva"], $reserva["id_usuario"], $reserva["id_sala"], 
            $reserva["fecha_reserva"], $reserva["hora_inicio"], $reserva["hora_fin"], $reserva["estado"], $reserva["email_usuario"]);
            array_push($reservas_arr, $reservaObj);
        }

        $conexion->cerrarConexion();

        return $reservas_arr;
    }
    
    /**
     * @param string 
     * Deletes a reservation from DB by ID.
     */
    public static function deleteUserReservation($id_reserva){
        
        $conexion = new ConexionBD();
        $baseDatos = $conexion->getBaseDatos();
        $colection = $baseDatos->reservas;


        // DB query to delete a reservation
        $colection->updateOne(["id_reserva" => $id_reserva], ['$set' => ["estado" => "cancelada"]]);

        $conexion->cerrarConexion();

    }

    /**
     * Insert a reservation into database.
     */
    public static function insertReservation($reserva){
        
        $conexion = new ConexionBD();
        $baseDatos = $conexion->getBaseDatos();
        $colection = $baseDatos->reservas;
        $reservas = [
                "id_reserva" => uniqid(),
                "id_usuario" => $reserva->getId_usuario(),
                "id_sala" => $reserva->getId_sala(),
                "fecha_reserva" => $reserva->getFecha_reserva(),
                "hora_inicio" => $reserva->getHora_inicio(),
                "hora_fin" => $reserva->getHora_fin(),
                "estado" => $reserva->getEstado(), 
                "email_usuario" => $reserva->getEmail_usuario()
        ];

        $colection->insertOne($reservas);

        $conexion->cerrarConexion();

    }

    public static function checkIfRepeated($reserva){
        
        $conexion = new ConexionBD();
        $baseDatos = $conexion->getBaseDatos();
        $colection = $baseDatos->reservas;

        $filtro = [
            "id_sala" => $reserva->getId_sala(),
            "fecha_reserva" => $reserva->getFecha_reserva(),
            "estado" => "confirmada",
            '$or' => [
                [
                    // First condition: the start_time of the new reservation is within the range of another.
                    '$and' => [
                        ["hora_inicio" => ['$lt' => $reserva->getHora_fin() . ":00"]],
                        ["hora_fin" => ['$gt' => $reserva->getHora_inicio() . ":00"]]
                    ]
                ],
                [
                    // Second condition: the end_time of the new reservation is within the range of another.
                    '$and' => [
                        ["hora_inicio" => ['$lt' => $reserva->getHora_fin() . ":00"]],
                        ["hora_fin" => ['$gt' => $reserva->getHora_inicio() . ":00"]]
                    ]
                ],
                [
                    // Third condition: another reservation starts within the range of the new reservation.
                    '$and' => [
                        ["hora_inicio" => ['$gt' => $reserva->getHora_inicio() . ":00"]],
                        ["hora_inicio" => ['$lt' => $reserva->getHora_fin() . ":00"]]
                    ]
                ],
                [
                    // Fourth condition: another reservation ends within the range of the new reservation.
                    '$and' => [
                        ["hora_fin" => ['$gt' => $reserva->getHora_inicio() . ":00"]],
                        ["hora_fin" => ['$lt' => $reserva->getHora_fin() . ":00"]]
                    ]
                ]
            ]
        ];

        

        $resultadosN = $colection->countDocuments($filtro);

        $conexion->cerrarConexion();
        
        // Return false if not repeated and true if repeated
        if ($resultadosN == 0) {    
            return false;
        } else {
            return true;
        }
        
    }

}


?>