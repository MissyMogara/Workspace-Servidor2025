import OpenAI from "openai";

window.onload = inicio;

// Initialize the key
async function inicio() {

const openai = new OpenAI();

const key = (await fetch("./api-key/api_key.txt")).text();

console.log(key);

}


// This function calls the API to generate text
async function generateText(prompt) {

    const url = "https://api.openai.com/v1/chat/completions";

    const datos = {
        model: "gpt-4o-mini",
        messages: [
            { role: "system", content: "Eres un generador de contenido profesional para blogs. Escribes artículos informativos, bien estructurados y atractivos sobre temas de actualidad. Las noticias deben ser claras, precisas y atractivas, con títulos llamativos y un tono profesional. Siempre proporciona información relevante y evita incluir datos incorrectos o inventados."},
            { role: "user", content: `generame un texto no muy largo para un blog con el titulo ${prompt}`}
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
        const response = await fetch(`index.php`,{
            method: 'POST',
            hedaers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                url: url,
                action: image
            })
        });

        const data = await response.json();
        console.log("URL enviada al servidor: ", data.message);

    } catch (e) {
        console.log("Error al enviar la URL al servidor: " + e.message);
    };

}
