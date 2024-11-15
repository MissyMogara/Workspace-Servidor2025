<?php

namespace Coworking\controladores;

use Coworking\vistas\VistaReservas;
use Coworking\modelos\ModeloReservas;

class ControladorReservas
{

    /**
     * @param string
     * @param string
     * Shows all reservations.
     */
    public static function mostrarReservas($id, $nombre_sala)
    {
        $reservas = ModeloReservas::getAllByRoomId($id);
        VistaReservas::render($reservas, $nombre_sala, "");
    }

    /**
     * @param string
     * Shows user's reservations.
     */
    public static function mostrarReservasUsuario($email, $error)
    {

        $reservas = ModeloReservas::getAllByUserEmail($email);
        VistaReservas::render($reservas, "", $error);
    }

    /**
     * @param string
     * Deletes reservation from user.
     */
    public static function borrarReservaUsuario($id_reserva, $error)
    {

        ModeloReservas::deleteUserReservation($id_reserva);
        header("Location: index.php?action=verReservasUsuario&error=" . $error);
    }

    /**
     * @param object
     * Insert reservation into DB.
     */
    public static function crearReserva($reserva)
    {
        // Insert reservation into DB

        if ($reserva->getHora_inicio() >= $reserva->getHora_fin()) {
            header("Location: index.php?action=verReservasUsuario&error='Hora incorrecta, la hora de inicio no puede ser menor a la de finalización.'");
        } else {

            if (ModeloReservas::checkIfRepeated($reserva) == false) {

                ModeloReservas::insertReservation($reserva);
                header("Location: index.php?action=verReservasUsuario&error=");

            } else {
                
                header("Location: index.php?action=verReservasUsuario&error='La fecha no es correcta, ya hay reservas para esa hora.'");
            
            }
        }
    }
}
