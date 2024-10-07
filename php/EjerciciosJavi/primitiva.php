<?php

$combinacionPrimitiva = array();

$ramdonNumber = 0;

for ($i = 0; $i < 6; $i++) {
    $ramdonNumber = rand(1,49); 
    if (in_array($ramdonNumber, $combinacionPrimitiva)){
        $i -= 1;
    } else {
        $combinacionPrimitiva[$i] = $ramdonNumber;
    }
};

foreach ($combinacionPrimitiva as $numero){
    echo $numero . " ";
}

?>