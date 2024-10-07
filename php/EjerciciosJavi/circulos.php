<?php

function random_circle(){
echo "<svg height='100' width='100'>";
echo "<circle cx='50' cy='50' r='40' fill=rgb(". rand(0,255) ."," . rand(0,255) . "," . rand(0,255) . ")/>";
echo "</svg>";
};

random_circle();

?>