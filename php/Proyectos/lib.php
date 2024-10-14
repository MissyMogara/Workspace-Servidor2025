<?php

/*
This function searches for an existing user.
*/
function searchUser($email, $password){
    foreach($_SESSION["usuarios"] as $usuario) {
        // We use a string comparator to compare user email from session with user email provided
        if(strcmp($usuario["email"], $email) == 0){
            // Email exists
            if(strcmp($usuario["password"], $password) == 0){
                return 1; // We checked both email and password and if exists return 1
            }
        }
    }
    return 0; // Email does not exist or password does not match
}

/*
Fuction that delete all projects from project array
*/
function deleteAllProjects(){
    // We are traveling through all projects
    foreach($_SESSION["proyectos"] as $proyecto) {
        unset($proyecto); // Delete every project
    }
}
?>