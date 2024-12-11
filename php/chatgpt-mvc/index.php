<?php

namespace Chatgpt;

use Chatgpt\controladores\ControladorNoticias;
use Chatgpt\controladores\ControladorAdmin;
use Chatgpt\ApiGPT;

session_start();

// Habilitar CORS para las solicitudes desde el frontend, si es necesario
header("Access-Control-Allow-Origin: *");


include_once('./lib.php');

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

    if (strcmp($_REQUEST["action"], "generate_content") == 0) {
        header("Content-Type: application/json");

        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);

        // Get value from prompt
        if (!isset($_GET['prompt']) || empty($_GET['prompt'])) {
            echo json_encode(["status" => "error", "message" => "Prompt no proporcionado"]);
            exit;
        }

        $prompt = $_GET['prompt'];

        // API key
        $api_key = file_get_contents("./api-key/api_key.txt");
        $url_text = "https://api.openai.com/v1/chat/completions";
        $url_image = "https://api.openai.com/v1/images/generations";

        // Data for the text request
        $request_text = [
            "model" => "gpt-4o-mini",
            "messages" => [
                ["role" => "system", "content" => "Eres un generador de contenido profesional para blogs. Escribes artículos informativos, bien estructurados y atractivos sobre temas de actualidad. Las noticias deben ser claras, precisas y atractivas, con títulos llamativos y un tono profesional. Siempre proporciona información relevante y evita incluir datos incorrectos o inventados."],
                ["role" => "user", "content" => "generame un texto no muy largo para un blog con el titulo " . $prompt]
            ],
            "temperature" => 0.7
        ];

        // Data for the image request
        $request_image = [
            "prompt" => "Genera una imagen para un blog con el título " . $prompt,
            "n" => 1,
            "size" => "512x512"
        ];

        // Realize the request to Chatgpt API and get the text
        $response_text = ApiGPT::callApi($url_text, $api_key, $request_text);

        // Realize the request to Chatgpt API and get the image
        $response_image = ApiGPT::callApi($url_image, $api_key, $request_image);

        if ($response_image['status'] === "error") {
            echo json_encode(["status" => "error", "message" => "Error al obtener la imagen", "details" => $response_image['details']]);
            exit;
        }

        $_SESSION["title"] = $prompt;
        $_SESSION["text"] = $response_text['response']['choices'][0]['message']['content'];
        $_SESSION["image"] = $response_image['response']['data'][0]['url'];

        // Send both data frontend
        echo json_encode([
            "status" => "success",
            "text" => $response_text['response']['choices'][0]['message']['content'],
            "image" => $response_image['response']['data'][0]['url']
        ]);
    }

    // if (strcmp($_REQUEST["action"], "save_data") == 0) {
    // }

    // Forms
} else if ($_POST != null) {

    if (isset($_POST["loggear"])) {
        // Login admin
        ControladorAdmin::IniciarSesion($_POST["email"], $_POST["password"]);
        //echo password_hash("1234567a", PASSWORD_BCRYPT);

    }

    if (isset($_POST["save_data"])) {

        //Download image

        $imageUrl = $_SESSION["image"]; // Get the URL from the GET parameters

        $imageUrl = urldecode($imageUrl);

        // Attempt to download the image from the provided URL
        $imageData = file_get_contents($imageUrl);

        // Generate a unique ID
        $id = uniqid();
        $_SESSION["id"] = $id;

        if ($imageData !== false) {

            // Create the new file name
            $newFileName = $id . '.' . "png";

            // Define the path where the image will be saved
            $filePath = "./public/downloads/images/" . $newFileName;

            // Save the image on the server
            if (file_put_contents($filePath, $imageData) !== false) {
                // echo json_encode([
                //     "status" => "success",
                //     "message" => "Imagen descargada exitosamente",
                //     "path" => $filePath
                // ]);
                // Save news data
                ControladorNoticias::GuardarNoticia($_SESSION["title"], $_SESSION["text"], $_SESSION["id"]);
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
        
    }
} else {
    // Default page
    ControladorNoticias::MostrarNoticias("");
}
