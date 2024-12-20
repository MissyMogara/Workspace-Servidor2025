<?php 

namespace Coworking\modelos;

use Coworking\modelos\Reservas;
use \PDO;

class ModeloReservas {

    /**
     * @param string
     * Returns all rooms by id.
     */
    public static function getAllByRoomId($id)
    {

        $conexion = new ConexionBD();

        // DB query to get all reservations        
        $stmt = $conexion->getConnexion()->prepare("SELECT * FROM reservas WHERE id_sala = ? ORDER BY reservas.fecha_reserva ASC");
        $stmt->bindParam(1, $id);
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Coworking\modelos\Reservas');
        $stmt->execute();
        $reservas = $stmt->fetchAll();

        $conexion->cerrarConexion();

        return $reservas;
    }

    /**
     * @param string 
     * Returns all reservations by user.
     */
    public static function getAllByUserEmail($email){
        
        $conexion = new ConexionBD();

        // DB query to get user's reservations  
        $stmt = $conexion->getConnexion()->prepare("SELECT reservas.id, reservas.id_usuario, reservas.id_sala, reservas.fecha_reserva,
        reservas.hora_inicio, reservas.hora_fin, reservas.estado
         FROM reservas 
         JOIN usuarios ON usuarios.id = reservas.id_usuario
         WHERE usuarios.email = ? AND reservas.estado != 'cancelada'
         ORDER BY reservas.fecha_reserva ASC, reservas.hora_inicio ASC");
        $stmt->bindParam(1, $email);
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Coworking\modelos\Reservas');
        $stmt->execute();
        $reservas = $stmt->fetchAll();

        $conexion->cerrarConexion();

        return $reservas;
    }
    
    /**
     * @param string 
     * Deletes a reservation from DB by ID.
     */
    public static function deleteUserReservation($id_reserva){
        
        $conexion = new ConexionBD();

        // DB query to delete a reservation
        $stmt = $conexion->getConnexion()->prepare("UPDATE reservas SET estado='cancelada' WHERE id = ?");
        $stmt->bindParam(1, $id_reserva);
        $stmt->execute();

        $conexion->cerrarConexion();

    }
    
    public static function insertReservation($reserva){
        
        $conexion = new ConexionBD();

        $stmt = $conexion->getConnexion()->prepare("INSERT INTO reservas (id_usuario, id_sala, 
        fecha_reserva, hora_inicio, hora_fin, estado) VALUES (?,?,?,?,?,?)");
        $stmt->bindValue(1, $reserva->getId_usuario());
        $stmt->bindValue(2, $reserva->getId_sala());
        $stmt->bindValue(3, $reserva->getFecha_reserva());
        $stmt->bindValue(4, $reserva->getHora_inicio());
        $stmt->bindValue(5, $reserva->getHora_fin());
        $stmt->bindValue(6, $reserva->getEstado());
        $stmt->execute();
        $conexion->cerrarConexion();

    }

    public static function checkIfRepeated($reserva){
        
        $conexion = new ConexionBD();

        $stmt = $conexion->getConnexion()->prepare("
            SELECT * 
            FROM reservas 
            WHERE id_sala = ? 
            AND fecha_reserva = ? 
            AND estado = 'confirmada' 
            AND (
                (? > hora_inicio AND ? < hora_fin) 
                OR (? > hora_inicio AND ? < hora_fin) 
                OR (hora_inicio > ? AND hora_inicio < ?) 
                OR (hora_fin > ? AND hora_fin < ?)
            )
        ");

        $stmt->bindValue(1, $reserva->getId_sala()); 
        $stmt->bindValue(2, $reserva->getFecha_reserva()); 
        $stmt->bindValue(3, $reserva->getHora_inicio() . ":00"); 
        $stmt->bindValue(4, $reserva->getHora_fin() . ":00"); 
        $stmt->bindValue(5, $reserva->getHora_inicio() . ":00"); 
        $stmt->bindValue(6, $reserva->getHora_fin() . ":00"); 
        $stmt->bindValue(7, $reserva->getHora_inicio() . ":00"); 
        $stmt->bindValue(8, $reserva->getHora_fin() . ":00"); 
        $stmt->bindValue(9, $reserva->getHora_inicio() . ":00"); 
        $stmt->bindValue(10, $reserva->getHora_fin() . ":00");
        

        $stmt->execute();

        $resultados = $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Coworking\modelos\Reservas');

        $conexion->cerrarConexion();
        
        // Return false if not repeated and true if repeated
        if (empty($resultados)) {    
            return false;
        } else {
            return true;
        }
        
    }

}


?>