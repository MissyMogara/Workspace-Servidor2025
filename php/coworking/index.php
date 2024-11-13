<?php 

namespace Coworking;
use Coworking\controladores\ControladorUsuarios;
use Coworking\modelos\Usuario;
use Coworking\controladores\ControladorReservas;
use Coworking\controladores\ControladorSalas;


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
        // Coworking reservations
        
        ControladorSalas::mostrarSalas("");
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
    }

} else {
    // Default page
    if(isset($_SESSION["coworking-user"])) {
        ControladorSalas::mostrarSalas("");
    } else {
        // Login form
        ControladorUsuarios::mostrarLogin("");
        //echo $passwordHash = password_hash("123456789", PASSWORD_BCRYPT);
        

    }
}


?>