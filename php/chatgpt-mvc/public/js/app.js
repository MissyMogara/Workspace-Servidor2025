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
            action: "generate_content",  // Action
            prompt: prompt               
        });

        const response = await fetch(`index.php?${params.toString()}`, {
            method: "GET",  
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
