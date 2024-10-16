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
?>