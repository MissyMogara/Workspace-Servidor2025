<?php 

namespace Regalos;
use Regalos\controladores\ControladorRegalos;
use Regalos\modelos\Regalo;


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
if(isset($_REQUEST["action"])){


// Forms
} else if($_POST != null) {


} else {
    // Default page
    if(isset($_SESSION["user"])) {
        

    } else {
        // Login form
        ControladorRegalos::MostrarLogin();
        

    }
}


?>