<?php session_start(); 

include ("lib.php");

//Create user array for users for the first time with an example user
if (!isset($__SESSION["usuarios"])){
    $_SESSION["usuarios"] = array(
        array(
            "nombre" => "Miqota",
            "apellidos" => "PurrPurr",
            "password" => "1234567e",
            "email" => "miqota@gmail.com",
            "birthdate" => "1997-08-12",
            "telefone" => "666777889"
        )
    );
}

if(!isset($_SESSION["proyectos"])){
    $_SESSION["proyectos"] = array();
};

//FORMS
if($_POST){

    //Register form
    if(isset($_POST["register"])){
        //Get all user information
        $registeredUser = [
            "nombre" => $_POST["register-name"],
            "apellido" => $_POST["register-last-name"],
            "password" => $_POST["register-password"],
            "email" => $_POST["register-email"],
            "birthdate" => $_POST["register-birthdate"],
            "telefone" => $_POST["register-tel"]
        ];
        //Add user to users array
        array_push($_SESSION["usuarios"], $registeredUser);
        header("Location: login.php");
    }

    //Login form
    if(isset($_POST["login"])){
        $email = $_POST["email"];
        $password = $_POST["password"];

        $_SESSION["usuarioActual"] = $email;
        

        // Check if user exists
        if(searchUser($email, $password) == 1){
            header("Location: proyectos.php");
            
        } else {
            header("Location: login.php?error=notFound");
        }
        
    }
    // Create new project
    if(isset($_POST["nuevo"])){
        
        //  Recive project information from form
        $registeredProject = [
            "id" => counterProjects() + 1,
            "nombre" => $_POST["project-name"],
            "fechaInicio" => $_POST["initial-date"],
            "fechaFinPrevista" => $_POST["finishig-date"],
            "diasTranscurridos" => $_POST["days-passed"],
            "porcentajeCompletado" => $_POST["percentage"],
            "importancia" => $_POST["importance"]
        ];

        // Put the project into the session
        array_push($_SESSION["proyectos"], $registeredProject);
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
        unset($_SESSION['proyectos'][$id]);
        $_SESSION['proyectos'] = array_values($_SESSION['proyectos']);
        header("Location: proyectos.php?id=" . $id);
    }
    
    // Detele all projects functionality
    if (strcmp($_GET['action'], "eliminarTodo") == 0) {
        $_SESSION["proyectos"] = array();
        header("Location: proyectos.php");
    }

    // View project functionality
    if(strcmp($_GET["action"], "ver") == 0){
        $_SESSION["proyectoActual"] = [];
        $id = $_GET["id"];
        $_SESSION["proyectoActual"] = $_SESSION["proyectos"][$id]; // Save current project in the session
        header("Location: verProyecto.php");
    }

};


?>

