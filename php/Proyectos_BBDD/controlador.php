<?php session_start(); 

include ("lib.php");
include("modelo.php");


//FORMS
if($_POST){

    //Register form
    if(isset($_POST["register"])){
        //Get all user information
       
            $nombre = $_POST["register-name"];
            $apellidos = $_POST["register-last-name"];
            $password = $_POST["register-password"];
            $email = $_POST["register-email"];
            $birthdate = $_POST["register-birthdate"];
            $telefone = $_POST["register-tel"];
            $city = $_POST["register-city"];
        
            // Check if user is already registered
            if(checkEmail($email)) {
                header("Location: login.php?error=Already-Registered");
            } else {
                // Register user
                registerUser($email, $password, $nombre, $apellidos, $city, $telefone, $birthdate);

                // If successful put user into session
                $_SESSION["usuario"] = array("email" => $email, "rol" => "user", "id" => getUserId($email));
                header("Location: proyectos.php");
            }
        
        
    }

    //Login form
    if(isset($_POST["login"])){
        $email = $_POST["email"];
        $password = $_POST["password"];

        // Check if user exists
        if(checkEmail($email)){
            // Check password
            $data = consultHashRole($email);
            $passwordHash = $data['password'];
            

    
            if (password_verify($password, $passwordHash)){
                // Verify role
                if (strcmp($data["rol"], "admin") == 0) {
                    $_SESSION["usuario"] = array("email" => $email, "rol" => "admin", "id" => getUserId($email));
                    header("Location: proyectos.php"); // Admin login
                } else {
                    $_SESSION["usuario"] = array("email" => $email, "rol" => "user", "id" => getUserId($email));
                    header("Location: proyectos.php"); // User login
                }
            } else {
                header("Location: login.php?error=notFound");
            }
            
        } else {
            header("Location: login.php?error=notFound");
        }
        
    }
    // Create new project
    if(isset($_POST["nuevo"])){
        
        //  Recive project information from form
        
        $nombre = $_POST["project-name"];
        $fechaInicio = $_POST["initial-date"];
        $fechaFinPrevista = $_POST["finishig-date"];
        $diasTranscurridos = $_POST["days-passed"];
        $porcentajeCompletado = $_POST["percentage"];
        $importancia = $_POST["importance"];
        $id_ususario = $_SESSION["usuario"]["id"];

        // Put the project into the database
        registerProject($nombre, $fechaInicio, $fechaFinPrevista, $diasTranscurridos, $porcentajeCompletado, $importancia, $id_ususario);
        header("Location: proyectos.php");

    }
    if(isset($_POST["modificarProyecto"])){
        //  Recive project information from form
        
        $nombre = $_POST["project-name"];
        $fechaInicio = $_POST["initial-date"];
        $fechaFinPrevista = $_POST["finishig-date"];
        $diasTranscurridos = $_POST["days-passed"];
        $porcentajeCompletado = $_POST["percentage"];
        $importancia = $_POST["importance"];
        $id = $_POST["id"];


        modifyProject($nombre, $fechaInicio, $fechaFinPrevista, $diasTranscurridos, $porcentajeCompletado, $importancia, $id);
        header("Location: proyectos.php");
    }
}

// Actions
if(isset($_GET["action"])){
    // Logout functionality
    if(strcmp($_GET["action"], "logout") == 0){
        session_destroy();
        header("Location: login.php");
    }

    // Detele project functionality
     if (strcmp($_GET['action'], "eliminar") == 0) {
        $id = $_GET['id'];
        deleteProject($id);
        header("Location: proyectos.php");
    }
    
    // Detele all projects functionality
    if (strcmp($_GET['action'], "eliminarTodo") == 0) {
        deleteAllProjects();
        header("Location: proyectos.php");
    }

    // View project functionality
    if(strcmp($_GET["action"], "ver") == 0){
        
        $id = $_GET["id"];
        header("Location: verProyecto.php?id=" . $id);

    }

    // Edit project functionality
    if(strcmp($_GET["action"], "modificar") == 0){
        
        $id = $_GET["id"];
        header("Location: modProyecto.php?id=" . $id);

    }

};


?>

