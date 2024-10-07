<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de la compra</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
    <div class="text-bg-dark p-3 text-center"><h1>Carrito de la compra</h1></div>
    
    
    <table class="table table-dark table-striped-columns">
        <thead>
            <tr>
                <th>
                    #
                </th>
                <th>
                    Nombre
                </th>
                <th>
                    Precio
                </th>
                <th>
                    Cantidad
                </th>
                <th>
                    IVA
                </th>
                <th>
                    Subtotal
                </th>
            </tr>
        </thead>
        <tbody>
            <?php
            // llamamos a la función que calcula el subtotal de cada producto
            include "funciones_carrito.php";
            use function funciones_calcular\subtotal;;
                // Simulando un carrito de compra
                $carrito = array(
                    array("id" => 1234, "nombre" => "PS4", "precio" => 349.95, "cantidad" => 2, "iva" => 0),
                    array("id" => 1235, "nombre" => "Iphone XS", "precio" => 1249.95, "cantidad" => 1, "iva" => 0),
                    array("id" => 1236, "nombre" => "Chocolate", "precio" => 9.95, "cantidad" => 5, "iva" => 1),
                    array("id" => 1237, "nombre" => "Nintendo Switch", "precio" => 399.95, "cantidad" => 3, "iva" => 0),
                    array("id" => 1238, "nombre" => "PC Gaming", "precio" => 1349.95, "cantidad" => 1, "iva" => 0)
                );
                // Variable para almacenar el total del carrito
                $totalTodo = 0;
                // For each que recorre cada producto en el carrito
                foreach ($carrito as $producto){
                    echo "<tr>";
                    //For each que recorre cada valor del producto
                    foreach ($producto as $clave => $valor){
                        if ($clave == "precio"){
                            echo "<td>". $valor. "€" . "</td>";
                        }else if ($clave == "iva"){
                            if ($valor == 0){
                                echo "<td>". "21%" . "</td>";
                            } else if($valor == 1) {
                                echo "<td>". "10%" . "</td>";
                            } else {
                                // Si no es ni 0 ni 1 entenderemos que no tiene IVA
                                echo "<td>". "No tiene IVA" . "</td>";
                            }
                        }  else {
                            echo "<td>". $valor. "</td>";
                        }
                    }
                    // Calcula el subtotal del producto multiplicando el precio por la cantidad y añade el IVA
                    /*
                    Utilizamos number_format para mostrar el precio con dos decimales en lugar de round porque
                    number_format se usa para mostrar número por pantalla en formato string mientras que round 
                    se utiliza para operaciones matemáticas.
                    */
                    echo "<td>". number_format(subtotal($producto), 2) . "€" . "</td>";
                    $totalTodo += subtotal($producto);
                    echo "</tr>";
                }
                echo "<tr>";

                echo "<td colspan='5' class='text-end'>" . "Total" . "</td>";

                echo "<td>" . number_format($totalTodo, 2) . "€" . "</td>";
                
                echo "</tr>";
                
            ?>
        </tbody>    
    </div>
    
</body>
</html>