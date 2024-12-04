<?php 

namespace Chatgpt\controladores;
use Chatgpt\vistas\VistaLogin;
use Chatgpt\modelos\ModeloAdmin;
use Chatgpt\vistas\VistaAdmin;

class ControladorAdmin {

    /**
     * This function shows login screen.
     * Recive a string error message.
     */
    public static function MostrarLogin($error){

        VistaLogin::render($error);

    }

    /**
     * This function checks if password is correct and email.
     * returns true if password is correct or false otherwise.
     */
    public static function IniciarSesion($email, $password) {

        // Check if user exists
        $admin = ModeloAdmin::getAdminByEmail($email);
        
        // Check password and email. If both are correct, set session and redirect to dashboard. Else, show error message.
        if($admin != null && password_verify($password, $admin->getPassword())) {
            $_SESSION["admin-user"] = $email;
            header("Location: index.php?action=mostrarDashboard");
        } else {
            header("Location: index.php?action=errorLogin?error=usuarioIncorrecto");
        }

    }

    /**
     * This function shows dashboard screen.
     * Receives an admin email.
     */
    public static function MostrarDashboard($admin) {

        VistaAdmin::render($admin);

    }

    /**
     * This function logs out the admin.
     */
    public static function CerrarSesion() {
        
        
        session_destroy();
        header("Location: index.php");

    }

}

?>