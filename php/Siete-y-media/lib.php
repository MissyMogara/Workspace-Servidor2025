<?php
/*
This fuction return if the card is already on the hand
*/ 
function checkCard($deckCard, $hand){
    // Check if the card is already in the hand, we use the img as an unique identifier
    $imgDeck = $deckCard['img'];

    foreach($hand as $onHandCard){
        if($onHandCard["img"] == $imgDeck){
            return 1; // It's already on the hand
        }
    }
    return 0; // It's not on the hand
}
/*
This function draw a card from the deck
*/
function drawCard($deck){
    // The bucle will repeat until it finds a card that is on the hand
    $repeated = true;
    if (count($_SESSION["cardsDisplayed"]) < 40) {
        while($repeated == true){
            $randomNumber = random_int(0,39);
            if(checkCard($_SESSION["deck"][$randomNumber], $_SESSION["cardsDisplayed"]) == 0){
                $repeated = false;
                array_push($_SESSION["cardsDisplayed"], $deck[$randomNumber]);   
            };
        };
    };
}

/*
This function checks player's score and actualizes the actual score
*/
function checkScoreHand(){
    $score = 0; // We'll save the total score here
    foreach($_SESSION["cardsDisplayed"] as $card){
        if (strcmp($card["nombre"], "A") == 0 || strcmp($card["nombre"], "J") == 0 || // Check if the card is A, J, Q or K 
        strcmp($card["nombre"], "Q") == 0 || strcmp($card["nombre"], "K") == 0)  {
            $score += 0.5;
        } else {
            $score += intval($card["nombre"]);
        }
    }
    $_SESSION["actualScore"] = $score; // save the actual score
}

/*
This function check game status, if you won, lose or continue
*/
function checkGameStatus($actualScore) {
    if ($actualScore == 7.5) {
        $_SESSION["gameStatus"] = "won"; // You won if you have 7.5 points
        $_SESSION['wonMatches'] += 1;
        $_SESSION['totalMatches'] += 1;
    }
    if ($actualScore > 7.5) {
        $_SESSION["gameStatus"] = "lost"; // You lost if you have more than 7.5 points
        $_SESSION['lostMatches'] += 1;
        $_SESSION['totalMatches'] += 1;
    }
    
}
?>