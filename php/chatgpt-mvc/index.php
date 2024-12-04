<?php 

namespace Chatgpt;

use Chatgpt\controladores\ControladorNoticias;
use Chatgpt\controladores\ControladorAdmin;

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

    if(strcmp($_REQUEST["action"], "loginAdmin") == 0) {
        // Show login form
        ControladorAdmin::MostrarLogin("");
    }

    if(strcmp($_REQUEST["action"], "errorLogin") == 0) {
        // Show error login form
        ControladorAdmin::MostrarLogin("El email o la contraseña son incorrectos.");
    }

    if(strcmp($_REQUEST["action"], "mostrarDashboard") == 0) {
        // Show dashboard
        ControladorAdmin::MostrarDashboard($_SESSION["admin-user"]);
    }
    
    if(strcmp($_REQUEST["action"], "logout") == 0) {
        // Logout admin
        ControladorAdmin::CerrarSesion();
    }

// Forms
} else if($_POST != null) {

    if(isset($_POST["loggear"])) {
        // Login admin
        ControladorAdmin::IniciarSesion($_POST["email"], $_POST["password"]);
        //echo password_hash("1234567a", PASSWORD_BCRYPT);
        
    }

    if(isset($_POST["image"])) {

        $data = json_decode(file_get_contents("php://input"), true);

        if (isset($data["url"])) {
            $imageUrl = $data["url"];

            $imageData = file_get_contents($imageUrl);

            if ($imageData !== false) {
                $filePath = "./vistas/assets/images" . basename($imageUrl);
                file_put_contents($filePath, $imageData);
            }
        }

    }

} else {
    // Default page
    ControladorNoticias::MostrarNoticias("");

}


?>