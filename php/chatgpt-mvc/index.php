<?php 

namespace Chatgpt;

use Chatgpt\controladores\ControladorNoticias;

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

// Forms
} else if($_POST != null) {

} else {
    // Default page
    ControladorNoticias::MostrarNoticias("");

}


?>