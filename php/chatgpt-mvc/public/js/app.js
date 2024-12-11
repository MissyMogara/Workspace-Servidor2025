window.onload = inicio;

// Initialize the key
async function inicio() {

    if (document.getElementById("previsualizar")) {

        //document.getElementById('guardar').addEventListener('click', saveData);

        document.getElementById("previsualizar").addEventListener("click", async function () {

            document.getElementById("previsualizar").disabled = true;

            const prompt = document.getElementById("textArea").value;

            preview(prompt);

        });

        document.getElementById("cancelar").addEventListener("click", function () {
            const container = document.getElementById('previsualizacion');
            container.innerHTML = '';
            document.getElementById("previsualizar").disabled = false;
            document.getElementById('message').textContent = "";
        });

        document.getElementById("volver").addEventListener("click", function () {
            document.getElementById("previsualizar").disabled = false;
            document.getElementById('message').textContent = "";
            window.location.href = "index.php?action=logout";
        });

    }

}

// This function calls the API to generate an image
async function preview(prompt) {
    console.log("generando... " + prompt);
    const data = await fetchContentFromPHP(prompt);

    console.log(data);
    console.log(data.image);
    console.log(data.text);

    const container = document.getElementById('previsualizacion');

    const containerTitle = document.createElement('h2');
    containerTitle.textContent = prompt;
    containerTitle.id = "title";

    const containerImage = document.createElement('img');
    containerImage.src = data.image;
    containerImage.id = "image";

    const containerText = document.createElement('p');
    containerText.textContent = data.text;
    containerText.id = "text";

    container.innerHTML = '';
    container.appendChild(containerTitle);
    container.appendChild(containerImage);
    container.appendChild(containerText);

}

async function fetchContentFromPHP(prompt) {

    try {
        const params = new URLSearchParams({
            action: "generate_content",  // Identificador de la acción
            prompt: prompt               // El contenido del prompt
        });

        const response = await fetch(`index.php?${params.toString()}`, {
            method: "GET",  // Usamos GET en lugar de POST
        });

        if (!response.ok) {
            throw new Error(`Error HTTP: ${response.status}`);
        }

        const data = await response.json();
        console.log("Respuesta del backend:", data);
        return data;
    } catch (error) {
        console.error("Error al obtener contenido del backend:", error);
    }
}

/*
async function saveData() {
    // Send the action to the backend
    try {
        const params = new URLSearchParams({
            action: "save_news"
        });

        const response = await fetch(`index.php${params.toString()}`, {
            method: "GET",
        });

        if (!response.ok) {
            throw new Error(`Error HTTP: ${response.status}`);
        }

    } catch (error) {

        console.log("Error al enviar la acción de guardar");

    }
}


/*
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

    console.log("Clave obtenida:", key); // Check key


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
    try {
        const encodedUrl = encodeURIComponent(url);

        // Params
        const params = new URLSearchParams({
            url: encodedUrl,
            action: "image",
        });

        // Get
        const response = await fetch(`index.php?${params.toString()}`, {
            method: 'GET',
            headers: {
                'Content-Type': 'application/json', // Optional
            },
        });

        document.getElementById('message').textContent = "Puedes pulsar el botón de volver para ver el resultado en el blog.";

        // Check if response was successful
        if (!response.ok) {
            throw new Error(`HTTP error! Status: ${response.status}`);
        }

        const data = await response.json();
        console.log("URL enviada al servidor: ", data.message);

    } catch (e) {
        console.log("Error al enviar la URL al servidor: " + e.message);
    }
}
*/