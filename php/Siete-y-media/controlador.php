<?php
session_start();
include "cartas.php";
include "lib.php";

// Initialize total matches
if (!isset($_SESSION['totalMatches'])) {
    $_SESSION['totalMatches'] = 0;
}


// Initialize won matches
if (!isset($_SESSION['wonMatches'])) {
    $_SESSION['wonMatches'] = 0;
}


// Initialize lost matches
if (!isset($_SESSION['lostMatches'])) {
    $_SESSION['lostMatches'] = 0;
}

// Initialize game status
if (!isset($_SESSION["gameStatus"])) {
    $_SESSION["gameStatus"] = "none";
}

// Initialize the score
if (!isset($_SESSION["actualScore"])) {
    $_SESSION["actualScore"] = 0;
}

// Create the hand empty
if (!isset($_SESSION["cardsDisplayed"])) {
    $_SESSION["cardsDisplayed"] = array();
};

if ($_GET) {
    // Action control
    if (isset($_GET['action'])) {
        // Draw card from deck
        if (strcmp($_GET['action'], "draw") == 0) {
            
            if (!strcmp($_SESSION["gameStatus"], "lost") == 0 && !strcmp($_SESSION["gameStatus"], "won") == 0) { 
            // If game is lost you can't draw cards
            drawCard($_SESSION["deck"]);
            checkScoreHand();
            checkGameStatus($_SESSION["actualScore"]); // Check game status
            }   
            
            header("Location: juego.php");
        };
        // Reset the game
        if (strcmp($_GET['action'], "reset") == 0) {
            $_SESSION["cardsDisplayed"] = array();
            $_SESSION["actualScore"] = 0;
            $_SESSION["gameStatus"] = "none";
            header("Location: juego.php");
        };
        // Reset session if you want to check how it works in a new session
        if (strcmp($_GET['action'], "resetsessison") == 0) {
            session_destroy();
            header("Location: juego.php");
        };
    };
}
