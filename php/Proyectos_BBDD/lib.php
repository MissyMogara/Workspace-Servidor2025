<?php
/*
Function that counter how many projects we have and return the id for the new project
*/
function counterProjects(){
    // Create a counter
    $counter = 0;

    //Check how many projects we have
    foreach ($_SESSION["proyectos"] as $proyecto) {
        $counter++;
    }

    return $counter;
}
?>