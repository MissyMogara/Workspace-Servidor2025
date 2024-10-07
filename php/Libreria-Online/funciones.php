<?php
namespace funciones_categorias;
/*
Función que crea una categoría en la librería con sus productos correspondientes.
*/
function crearCategoria($productos , $categoria){
    $contador = 0;

    foreach ($productos as $producto) {
        
        if ($contador < 4){
            
                

            if ($categoria == $producto["categoria"]) {
                echo "<div class='col border border-2 border-dark-subtle mx-3 pt-4 pb-4'>";  

                if (isset($producto["foto"])) {
                    echo "<div class='row justify-content-center'><img style='width: 100px; height: 150px;' src='./imagenes-libreria/" . $producto["foto"] . ".jpg' alt='" . $producto["titulo"] . "'></div>";
                } 

                if(isset($producto["titulo"])) {
                    echo "<p class='text-dark-emphasis' style='height: 46px;'><strong>" . $producto["titulo"] . "</strong></p>";
                } 

                if(isset($producto["editorial"])) {
                    echo "<p style='height: 46px;'><strong>" . $producto["editorial"] . "</strong></p>";
                } 
                
                if(isset($producto["precio"])) {
                    echo "<p class='text-danger'>" . number_format($producto["precio"], 2) . "€</p>";
                }     
                echo "<div class='text-center'><button class='btn btn-primary'>Comprar ahora</button></div>";
                echo "</div>";
            } else {
                
                continue;
            }
            
            $contador++;
        }           
        
        
    }
};

?>