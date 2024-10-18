<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Las siete y media</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="./my-styles.css" rel="stylesheet">
</head>

<body>
     
    <!-- Primary container -->
    <div class="container">
        <h1>Las siete y media</h1>
        <p>Haz clic en el dorso de la carta para pedir más cartas:</p>
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
            if(isset($_SESSION["gameStatus"])){
                if (strcmp($_SESSION["gameStatus"], "won") == 0) {
                    echo "<div><img src='./images/cool-emoji.png' class='mogImg'></div>";
                }
            };
            if(isset($_SESSION["gameStatus"])){
                if (strcmp($_SESSION["gameStatus"], "lost") == 0) {
                echo "<div><img src='./images/sad-emoji.png' class='mogImg'></div>";
                }
            };
            ?>
            

        </div>
        <p><?php 
            if(isset($_SESSION["gameStatus"])){
                if(strcmp($_SESSION["gameStatus"], "won") == 0){
                    echo "Has ganado!";
                } else if(strcmp($_SESSION["gameStatus"], "lost") == 0){
                    echo "Has perdido!";
                }
            }
        ?></p>
        <p>Puntuación actual: <?php  
        if(isset($_SESSION["actualScore"])) { // Print score if exists
            echo $_SESSION["actualScore"];
        } ?>
        <p>Partidas totales: <?php  
        if(isset($_SESSION["totalMatches"])) { // Print total matches if exists
            echo $_SESSION["totalMatches"];
        } ?>
        <p>Partidas ganadas: <?php  
        if(isset($_SESSION["wonMatches"])) { // Print won matches if exists
            echo $_SESSION["wonMatches"];
        } ?>
        <p>Partidas perdidas: <?php  
        if(isset($_SESSION["lostMatches"])) { // Print lost matches if exists
            echo $_SESSION["lostMatches"];
        } ?>
        </p>
        <a class="btn btn-primary" href="controlador.php?action=reset">Reiniciar</a>
        <a class="btn btn-primary" href="controlador.php?action=resetsessison">Reiniciar sesión</a>
    </div>

</body>

</html>