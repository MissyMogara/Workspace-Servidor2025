<?php

namespace Chatgpt;

use Chatgpt\controladores\ControladorNoticias;
use Chatgpt\controladores\ControladorAdmin;

session_start();


/**
 * AUTOLOAD
 */
spl_autoload_register(function ($class) {
    $ruta = substr($class, strpos($class, "\\") + 1);
    $ruta = str_replace("\\", "/", $ruta);
    include_once "./" . $ruta . ".php";
});

// ROUTER
// Buttons/Links
if (isset($_REQUEST["action"])) {

    if (strcmp($_REQUEST["action"], "loginAdmin") == 0) {
        // Show login form
        ControladorAdmin::MostrarLogin("");
    }

    if (strcmp($_REQUEST["action"], "errorLogin") == 0) {
        // Show error login form
        ControladorAdmin::MostrarLogin("El email o la contraseña son incorrectos.");
    }

    if (strcmp($_REQUEST["action"], "mostrarDashboard") == 0) {
        // Show dashboard
        ControladorAdmin::MostrarDashboard($_SESSION["admin-user"]);
    }

    if (strcmp($_REQUEST["action"], "logout") == 0) {
        // Logout admin
        ControladorAdmin::CerrarSesion();
    }

    if (strcmp($_REQUEST["action"], "image") == 0) {
        //Download image
        if (isset($_GET["url"])) {
            $imageUrl = $_GET["url"]; // Get the URL from the GET parameters

            // Attempt to download the image from the provided URL
            $imageData = file_get_contents($imageUrl);

            if ($imageData !== false) {
                // Generate a unique ID
                $id = uniqid();

                // Create the new file name
                $newFileName = $id . '.' . "png";

                // Define the path where the image will be saved
                $filePath = "./public/downloads/images/" . $newFileName;

                // Save the image on the server
                if (file_put_contents($filePath, $imageData) !== false) {
                    echo json_encode([
                        "status" => "success",
                        "message" => "Imagen descargada exitosamente",
                        "path" => $filePath
                    ]);

                    ControladorNoticias::UpdateNoticia($id);

                } else {
                    echo json_encode([
                        "status" => "error",
                        "message" => "Error al guardar la imagen en el servidor"
                    ]);
                }
            } else {
                echo json_encode([
                    "status" => "error",
                    "message" => "Error al descargar la imagen desde la URL proporcionada"
                ]);
            }
        } else {
            echo json_encode([
                "status" => "error",
                "message" => "Parámetro 'url' no proporcionado"
            ]);
        }
    }
    // Forms
} else if ($_POST != null) {

    if (isset($_POST["loggear"])) {
        // Login admin
        ControladorAdmin::IniciarSesion($_POST["email"], $_POST["password"]);
        //echo password_hash("1234567a", PASSWORD_BCRYPT);

    }

    if (isset($_POST["newsData"])) {
        // Save news data
        ControladorNoticias::GuardarNoticia($_POST["title"], $_POST["textArea"]);
    }

} else {
    // Default page
    ControladorNoticias::MostrarNoticias("");
}
