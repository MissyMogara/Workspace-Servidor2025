<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Probando PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
    <h1>Probando PHP</h1>
    <?php
    //Ejemplo comentario
    echo "<strong>Hola mundo<strong>";
    /* 
    Declaración de variables
    */
    $precio = 5.6;
    echo "el precio es" . $precio;

    $precio = "Cinco coma seis";

    echo "<br>el precio es " . $precio;

    var_dump($precio); //Solo para depurar

    $edad = TRUE;

    //Links a tareas
    echo "<br>";
    echo "<a href='http://localhost:8080/carrito-compra.php'>Carrito de la compra</a>";
    echo "<br>";
    echo "<a href='http://localhost:8080/libreria-online.php'>Libreria online</a>";

    

    ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>