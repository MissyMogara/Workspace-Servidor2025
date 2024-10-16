<?php 
session_start();
include "cartas.php";
include "lib.php";

// Create the hand empty
if (!isset($_SESSION["cardsDisplayed"])) {
    $_SESSION["cardsDisplayed"] = array();
};

// Action control
if (isset($_GET['action'])){
    // Draw card from deck
    if (strcmp($_GET['action'], "draw") == 0){
        drawCard($_SESSION["deck"]);
        header("Location: juego.php");
    };
    // Reset the game
    if (strcmp($_GET['action'], "reset") == 0){
        session_destroy();
        header("Location: juego.php");
    };
};

?>