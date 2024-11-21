window.onload = inicio;

async function inicio() {
    
    const response = await fetch('https://api.pokemontcg.io/v2/cards');
    const json = await response.json();

    let contador = 0;

    let dataHtml = "<div class='card-gallery'>";
    json.data.forEach(carta =>{

        dataHtml += "<div class='card'>";
        dataHtml += "<img src='" + carta.images.small + "'>";
        dataHtml += "<h3>" + carta.name + "</h3>";
        
        dataHtml += "</div>";
        
        contador++;

    });
    dataHtml += "</div>";
    document.getElementById("principal").innerHTML = dataHtml;

}