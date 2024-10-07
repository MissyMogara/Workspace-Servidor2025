<?php

// This function creates a character sheet 
function createCharacterSheet($personajes, $name) {
    // Character list
    foreach ($personajes as $personaje) {
       
        
        // Check character name
        if ($personaje["name"] == $name){
             // Character div
            echo "<div>
            <h1 class='text-center' style='color:  white;'>" . $personaje["name"] . "</h1>
            
            <div class='circle my-2 ms-2' style='flex-direction: column;'>
            <img class='img-fluid' style='transform: scale(1.3);'   src='./personajes/" . $personaje["element"] . ".webp'>
            <p class='ps-1 m-0' style='color: white;'>" . $personaje["element"] . "</p>
            </div>
            ";
            if (isset($personaje["image"])) {
                // BG character div
                echo "
                <div >
                    
                    <div class='position-relative mb-5'>
                    <img class='img-fluid' style='width: 1920px'  src='./personajes/" . $personaje['image'] . ".webp'>
                       <div class='position-absolute d-flex flex-column ms-2' style='top: 5px;'>
                            
                            <div class='circle mb-2'>
                            <img class='img-fluid' style='transform: scale(1.3);' src='./personajes/health.webp'>
                            <p class='ps-1 m-0' style='color: white;'>" . $personaje["health"] . "</p>
                            </div>

                            <div class='circle my-2'>
                            <img class='img-fluid' style='transform: scale(1.3);'   src='./personajes/shields.webp'>
                            <p class='ps-1 m-0' style='color: white;'>" . $personaje["shield"] . "</p>
                            </div>

                            <div class='circle my-2' style='flex-direction: column;'>
                            <img class='img-fluid' style='transform: scale(1.3);'   src='./personajes/Movement_Speed.webp'>
                            <p class='ps-1 m-0' style='color: white;'>" . $personaje["Movement_Speed"] . "</p>
                            </div>


                        </div>
                        <div class='position-absolute py-3 py-lg-5' style='left:60%; bottom:0%; width:40%; height: 100%; 
                        background: linear-gradient(to left, rgba(0, 0, 0, 1), rgba(0, 0, 0, 0)); padding: 1rem; overflow: auto; overflow-x: hidden;'>
                        ";

                        if (isset($personaje["character_description"])){
                        echo "<p style='padding-top:0%; color: #FFFFFF;'>" . $personaje["character_description"]  . "</p>";
                        }
                        echo "
                        </div>
                    </div>
                </div>";
            }
            // Abilites div
            echo "<div class='d-flex flex-row mb-3 justify-content-center'>";

            createAbilities($personaje, "ability_1", "descriptionA1");
            createAbilities($personaje, "ability_2", "descriptionA2");
            createAbilities($personaje, "ultimate", "descriptionU");
            createAbilities($personaje, "ability_3", "descriptionA3");
            createAbilities($personaje, "ability_4", "descriptionA4");
            

            echo "</div>";

            echo "<div class='d-flex flex-column px-3 px-lg-5'>
            <p id='ability-name-" . $personaje["name"] . "' style='color: white;'></p>
            
            <p id='ability-description-" . $personaje["name"] . "' style='color: white;'></p>
                
            </p>
            </div>";
            echo "</div>";
        }

        
    }
}
// This function create abilities
function createAbilities($pj, $ability, $descriptionA) {
    echo "<div class='p-2  my-5 py-5'>";        
            if (isset($pj[$ability])) {
                
                

                if ($ability == "ultimate"){
                    echo "
                    <img class='img-fluid' onclick='showDescription(\"" . $pj["name"] . "\", \"" . $ability . "\", \"" . $descriptionA . "\")' style='cursor: pointer; transform: scale(1.3); ' src='./personajes/" . $pj[$ability] . ".webp'>
                    ";
                } else {
                    echo "
                    <img class='img-fluid' onclick='showDescription(\"" . $pj["name"] . "\", \"" . $ability . "\", \"" . $descriptionA . "\")' style='cursor: pointer;' src='./personajes/" . $pj[$ability] . ".webp'>
                    ";
                }
                
            }
            echo "</div>";
}
// This function converts characters to JSON so we can manipulate it later with JavaScript
function convertJSONChar($personajes) {
    return json_encode($personajes);
}
?>