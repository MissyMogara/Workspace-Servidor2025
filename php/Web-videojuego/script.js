// This function displays the description of a character's ability
function showDescription(charName, ability, abilityDescription){
    // Search for the character in the array of characters by name
    const character = characters.find(char => char.name === charName);
    
    

    document.getElementById("ability-name-" + charName).textContent = character[ability].replace(/_/g, ' ');
    document.getElementById("ability-description-" + charName).textContent = character[abilityDescription];
    
};