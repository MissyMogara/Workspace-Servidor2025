window.onload = inicio;

// Initialize the key
async function inicio() {

    if(document.getElementById("previsualizar")){
        document.getElementById("previsualizar").addEventListener("click", async function() {

            const textArea = document.getElementById("textArea");
    
            const textoAI = await generateText(textArea.value);
    
            const urlAI = await generateImage(textArea.value);
    
            preview(textoAI, urlAI, textArea.value);
    
        });
    }
    
}

async function preview(text, image, title) {

    const container = document.getElementById('previsualizacion');

    const containerTitle = document.createElement('h2');
    containerTitle.textContent = title;
    
    const containerImage = document.createElement('img');
    containerImage.src = image;

    const containerText = document.createElement('p');
    containerText.textContent = text;

    container.innerHTML = '';
    container.appendChild(containerTitle);
    container.appendChild(containerImage);
    container.appendChild(containerText);

}


// This function calls the API to generate text
async function generateText(prompt) {

    const response = await fetch("./api-key/api_key.txt");
    const key = await response.text();

    console.log("Clave obtenida:", key); // Verifica la clave obtenida


    const url = "https://api.openai.com/v1/chat/completions";

    const datos = {
        model: "gpt-4o-mini",
        messages: [
            { role: "system", content: "Eres un generador de contenido profesional para blogs. Escribes artículos informativos, bien estructurados y atractivos sobre temas de actualidad. Las noticias deben ser claras, precisas y atractivas, con títulos llamativos y un tono profesional. Siempre proporciona información relevante y evita incluir datos incorrectos o inventados." },
            { role: "user", content: `generame un texto no muy largo para un blog con el titulo ${prompt}` }
        ],
        temperature: 0.7,
    }

    try {
        const response = await fetch(url, {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "Authorization": `Bearer ${key}`
            },
            body: JSON.stringify(datos)
        });

        const resultado = await response.json();
        console.log("Respuesta generada:", resultado.choices[0].message.content);
        return resultado.choices[0].message.content;
    } catch (e) {
        console.log("Error al generar el texto: " + e.message);
    }

}

// This function calls the API to generate an image
async function generateImage(prompt) {

    const response = await fetch("./api-key/api_key.txt");
    const key = await response.text();

    console.log("Clave obtenida:", key); // Verifica la clave obtenida


    const promptAI = `Generame una imagen para un blog que con el título ${prompt}`;

    const url = "https://api.openai.com/v1/images/generations";

    const datos = {
        prompt: prompt, // Image description
        n: 1, // Number of images
        size: "512x512" // Size of image
    };

    try {
        const response = await fetch(url, {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "Authorization": `Bearer ${key}`
            },
            body: JSON.stringify(datos)
        });

        const resultado = await response.json();
        console.log("Imagen generada:", resultado.data[0].url);
        return resultado.data[0].url;
    } catch (e) {
        console.log("Error al generar la imagen: " + e.message);
    }

}

// This function sends the generated image to a local server
async function sendUrlToLocalServer(url) {
    // try {
    //     const response = await fetch("index.php", {
    //         method: 'POST',
    //         headers: {
    //             'Content-Type': 'application/json'
    //         },
    //         body: JSON.stringify({
    //             url: url,
    //             action: "image"
    //         })
    //     });

    //     const data = await response.json();
    //     console.log("URL enviada al servidor: ", data.message);

    // } catch (e) {
    //     console.log("Error al enviar la URL al servidor: " + e.message);
    // };
    try {
        // Construimos la URL con los parámetros de consulta
        const params = new URLSearchParams({
            url: url,
            action: "image",
        });

        // Hacemos la solicitud GET con los parámetros en la URL
        const response = await fetch(`index.php?${params.toString()}`, {
            method: 'GET',
            headers: {
                'Content-Type': 'application/json', // Opcional en GET, pero puedes incluirlo
            },
        });

        // Verificamos que la respuesta sea exitosa
        if (!response.ok) {
            throw new Error(`HTTP error! Status: ${response.status}`);
        }

        // Obtenemos y procesamos la respuesta
        const data = await response.json();
        console.log("URL enviada al servidor: ", data.message);

    } catch (e) {
        console.log("Error al enviar la URL al servidor: " + e.message);
    }
}
