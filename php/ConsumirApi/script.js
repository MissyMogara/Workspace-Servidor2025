window.onload = function () {
    inicio();
    showTypes();
};


let cardGallery; // Galery
cardGallery = document.createElement('div');
cardGallery.id = 'cardGallery';
cardGallery.className = 'card-gallery';


let lookCard;    // Card detail
lookCard = document.createElement('div');
lookCard.className = 'cardDetails';

let currentType = ""; // Save card type

let totalPages = 0;


let page = 1;

// Initiation
async function inicio(type = "") {
    
    cardGallery.innerHTML = "";
    currentType = type;

    let url = `https://api.pokemontcg.io/v2/cards?page=${page}&pageSize=50`;
    if (type !== "") {
        url += `&q=types:${type}`;
    }

    const response = await fetch(url);
    const json = await response.json();
    

    createPrincipal(json);

}

// Function to display card details
async function verDetalle(id) {

    lookCard.innerHTML = '';

    const response = await fetch('https://api.pokemontcg.io/v2/cards/' + id);
    const json = await response.json();
    const carta = json.data;

    const container = document.createElement('div');
    container.className = 'cardContainer';

    const card = document.createElement('div');
    card.className = 'bigCard';

    // Image
    const img = document.createElement('img');
    img.src = carta.images.small;

    // Title
    const title = document.createElement('h3');
    title.innerText = carta.name;

    // Types
    const type = document.createElement('p');
    type.innerText = 'Tipo: ';
    carta.types.forEach(function (tipo) {
        type.innerText += tipo + '';
    });

    // Attacks
    const attacks = document.createElement('p');
    attacks.innerText = 'Ataques: ';
    carta.attacks.forEach(function (ataque) {
        let movimientoNombre = document.createElement('p');
        movimientoNombre.innerText += `-${ataque.name}`;
        attacks.appendChild(movimientoNombre);

        let movimientoCoste = document.createElement('p');
        movimientoCoste.innerText += `coste: ${ataque.cost}`;
        attacks.appendChild(movimientoCoste);

        let movimientoPoder = document.createElement('p');
        movimientoPoder.innerText += `poder: ${ataque.damage}`;
        attacks.appendChild(movimientoPoder);

    });

    const backButton = document.createElement('button');
    backButton.className = 'buttonCard';
    backButton.innerText = 'Volver a la galería';
    backButton.addEventListener('click', () => {
        lookCard.style.display = 'none'; // Hide details
        cardGallery.style.display = 'flex'; // Show galery
    });

    card.appendChild(img);
    card.appendChild(title);
    card.appendChild(type);
    card.appendChild(attacks);
    card.appendChild(backButton);
    container.appendChild(card);
    lookCard.appendChild(container);

    cardGallery.style.display = 'none'; // Hide galery
    lookCard.style.display = 'block'; // Show details
    document.getElementById("leftButton").style.display = 'none';
    document.getElementById("rightButton").style.display = 'none';

}

// Function that create links to display card list by type
async function showTypes() {


    const response = await fetch('https://api.pokemontcg.io/v2/types');
    const json = await response.json();

    const ul = document.getElementById('tipos');

    const all = document.createElement('a');
    all.addEventListener("click", () =>{
        inicio("");
    });
    const alist = document.createElement('li');
    all.textContent = "Todos";
    alist.appendChild(all);
    ul.appendChild(alist);


    json.data.forEach(tipo => {

        const li = document.createElement('li');
        li.className = 'lista';
        const a = document.createElement('a');
        a.href = '#';
        a.textContent = tipo;
        a.className = "listaLink";

        
        a.addEventListener('click', () => {
            inicio(tipo);
        });

        li.appendChild(a);
        ul.appendChild(li);


    });


}

// Function that creates all
async function createPrincipal(json) {


    // 250 Pokemon cards
    document.getElementById("principal").innerHTML = "";

    



    json.data.forEach(carta => {

        const card = document.createElement('div');
        card.className = 'card';

        const img = document.createElement('img');
        img.src = carta.images.small;

        const title = document.createElement('h3');
        title.innerText = carta.name;

        const button = document.createElement('button');
        button.addEventListener('click', () => {
            verDetalle(carta.id);
        });
        button.innerText = 'Ver en detalle';
        button.value = carta.name;
        button.className = "buttonCard";

        card.appendChild(img);
        card.appendChild(title);
        card.appendChild(button);

        cardGallery.appendChild(card);


    });

    let leftButton = document.createElement("button");
    leftButton.id = "leftButton";
    let rightButton = document.createElement("button");
    rightButton.id = "rightButton";

    leftButton.innerText = "Anterior";
    leftButton.className = "buttonCard";
    rightButton.innerText = "Siguiente";
    rightButton.className = "buttonCard";


    // Div with buttons

    let buttons = document.createElement("div");
    buttons.className = 'lateralButtons';
    buttons.appendChild(leftButton);
    buttons.appendChild(rightButton);

    // Go back
    if (page === 1) {
        leftButton.style.display = "none";
    } else {
        leftButton.style.display = "inline";
        leftButton.addEventListener('click', () => {
            page--;
            document.getElementById("principal").innerHTML = "";
            inicio(currentType);
        });
    }

    // Next
    if (page === 5) {

        rightButton.style.display = "none";

    } else {
        rightButton.style.display = "inline";
        rightButton.addEventListener('click', () => {
            page++;
            document.getElementById("principal").innerHTML = "";
            inicio(currentType);
        });
    }

    // Append the letf and right button


    document.getElementById("principal").appendChild(cardGallery);
    document.getElementById("principal").appendChild(buttons);


    
    lookCard.style.display = 'none'; // Hide at the start
    document.getElementById("principal").appendChild(lookCard);


}


