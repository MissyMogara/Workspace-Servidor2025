<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Librería online IES Jaroso</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <header>
        
    <div class="text-bg-secondary p-3">
        <h1>
        Librería Online<small class="text-body-secondary"> IES Jaroso</small>
        </h1>    
    </div>
        
    </header>
    
    <main>
        <div class="container">

            <?php
            /* 
            Importamos los datos de libros desde un archivo externo en este ejercicio para 
            que el código sea más legible y fácil de mantener. 
            */
            include "datos-libros.php";  
            ?>
            
            <!-- Empezamos por las novelas históricas -->
            
            <h2 class="text-center text-info-emphasis">Novela histórica</h2>
            
            <div class="row g-5 w-75 mx-auto">

                <?php
                
                // Importamos la función para crear categorías
                include "funciones.php";

                use function funciones_categorias\crearCategoria;

                crearCategoria($productos, "Novela historica");
                

                ?>

            </div>


        </div>
        <div class="container">
            <h2 class="text-center text-info-emphasis">Novela negra</h2>

            <div class="row g-5 w-75 mx-auto">

                <?php

                crearCategoria($productos, "Novela negra");

                ?>
            </div>

        </div>
        <div class="container">
            <h2 class="text-center text-info-emphasis">Misterio</h2>

            <div class="row g-5 w-75 mx-auto">

                <?php

                crearCategoria($productos, "Misterio");

                ?>
            </div>

        </div>

    </main>

    <footer>
        <div class="text-bg-secondary p-3 mt-4">
            <p class="text-center">IES Jaroso - Todos los derechos reservados</p>
        </div>
    </footer>
</body>
</html>