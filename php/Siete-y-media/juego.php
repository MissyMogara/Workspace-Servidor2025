<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Las siete y media</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="./myStyles.css" rel="stylesheet">
</head>

<body>
     
    <!-- Primary container -->
    <div class="container">
        <h1>Las siete y media</h1>
        <div class="deckContainer">
            <!-- List with all cards -->

            <?php     
            // Shuffle the deck of cards
            if (isset($_SESSION["deck"])){
                shuffle($_SESSION["deck"]);
            };
            
            // Print cards
            echo "<div><a href='controlador.php?action=draw'><img class='Mogcard' src='./cartas/dorso-rojo.svg'></a></div>";

            if (isset($_SESSION["cardsDisplayed"])) {
                foreach ($_SESSION["cardsDisplayed"] as $card) {
                    echo "<div><img class='Mogcard' src='./cartas/" . $card["img"] . "'></div>";
                };    
            };
            
            ?>
            

        </div>
        <a class="btn btn-primary" href="controlador.php?action=reset">Reiniciar</a>
    </div>

</body>

</html>