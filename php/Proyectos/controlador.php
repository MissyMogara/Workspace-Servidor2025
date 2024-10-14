<?php session_start(); 

include ("lib.php");

$_SESSION["proyectos"] = array(
    array(
        "id" => 1,
        "nombre" => "Desarrollo de Sitio Web",
        "fechaInicio" => "2023-01-15",
        "fechaFinPrevista" => "2023-06-15",
        "diasTranscurridos" => 175,
        "porcentajeCompletado" => 60,
        "importancia" => 3
    ),
    array(
        "id" => 2,
        "nombre" => "Aplicación Móvil",
        "fechaInicio" => "2023-02-10",
        "fechaFinPrevista" => "2023-09-10",
        "diasTranscurridos" => 145,
        "porcentajeCompletado" => 40,
        "importancia" => 5
    )
);

//Create user array for users for the first time with an example user
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
        

        //Check if user exists
        if(searchUser($email, $password) == 1){
            header("Location: proyectos.php");
            
        } else {
            header("Location: login.php?error=notFound");
        }
        
    }
}

//Actions
if(isset($_GET["action"])){
    //Logout functionality
    if(strcmp($_GET["action"], "logout") == 0){
        session_destroy();
        header("Location: login.php");
    }

    //Detele project functionality
     if (strcmp($_GET['action'], "eliminar") == 0) {
        $id = $_GET['id'];
        unset($_SESSION['proyectos'][$id]);
        $_SESSION['proyectos'] = array_values($_SESSION['proyectos']);
        header("Location: proyectos.php");
    }
    
    //Detele all projects functionality
    if (strcmp($_GET['action'], "eliminarTodo") == 0) {
        deleteAllProjects();
        header("Location: proyectos.php");
    }

    
};


?>

