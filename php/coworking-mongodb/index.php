<?php 

namespace Coworking;
use Coworking\controladores\ControladorUsuarios;
use Coworking\modelos\Usuario;
use Coworking\controladores\ControladorReservas;
use Coworking\controladores\ControladorSalas;
use Coworking\modelos\Reservas;


session_start();


/**
 * AUTOLOAD
 */
spl_autoload_register(function ($class){
    $ruta = substr($class, strpos($class, "\\") + 1);
    $ruta = str_replace("\\", "/", $ruta);
    include_once "./" . $ruta . ".php";
});

// ROUTER

// Buttons/Links
if(isset($_REQUEST["action"])) {
    
    if(strcmp($_REQUEST["action"], "registrarse") == 0) {
        // Register form
        ControladorUsuarios::mostrarRegistro("");
    }

    if(strcmp($_REQUEST["action"], "mostrarReservas") == 0) {
        // Coworking rooms
        
        ControladorSalas::mostrarSalas("");
    }

    if(strcmp($_REQUEST["action"], "destroySession") == 0) {
        // Destroys the session
        
        session_destroy();
        ControladorUsuarios::mostrarLogin("");
    }

    if(strcmp($_REQUEST["action"], "verReservas") == 0) {
        // Shows all reservations from a room
        $id = $_REQUEST["id"];
        $nombre_sala = $_REQUEST["nombre"];
        ControladorReservas::mostrarReservas($id, $nombre_sala);
    }
    
    if(strcmp($_REQUEST["action"], "verReservasUsuario") == 0) {
        // Shows user's reservations from a room
        if(isset($_REQUEST["error"])){
            ControladorReservas::mostrarReservasUsuario($_SESSION['coworking-user'], $_REQUEST["error"]);
        } else {
            ControladorReservas::mostrarReservasUsuario($_SESSION['coworking-user'], "");
        }
    }
    
    if(strcmp($_REQUEST["action"], "borrarReserva") == 0) {
        // Deletes user's reservation
        $id = $_REQUEST["id"]; // Reservation id
        ControladorReservas::borrarReservaUsuario($id, "");
    }

// Forms
} else if($_POST != null) {
    
    
    if(isset($_POST["meterUsuarioBBDD"])) {
        // Add user into database
        $fechaActual = date("Y-m-d");

        $usuario = new Usuario(0,$_POST['nombre'], $_POST['apellidos'],
        $_POST['email'], $_POST['password'], $_POST['telefono'], $fechaActual);
        if(ControladorUsuarios::registrarUsuario($usuario) == "El email ya está en uso.") {
            ControladorUsuarios::mostrarRegistro("El email ya está en uso.");
        } else {
            ControladorUsuarios::mostrarLogin("");
        }
        
    }

    if(isset($_POST["logearse"])) {
        // Show reservations
        ControladorUsuarios::login($_POST['user-email'], $_POST['user-password']);
        ControladorSalas::cargarSalasSession();
    }

    if(isset($_POST["realizarReserva"])) {
        // Create reservation
        $reserva = new Reservas(0, $_SESSION["id_usuario"], 
        $_POST["id_sala"], $_POST["fecha_reserva"], $_POST["hora_inicio"], $_POST["hora_fin"], "confirmada");
        ControladorReservas::crearReserva($reserva);
    }

} else {
    // Default page
    if(isset($_SESSION["coworking-user"])) {
        ControladorSalas::mostrarSalas("");
    } else {
        // Login form
        ControladorUsuarios::mostrarLogin("");
    }
}


?>