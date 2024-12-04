<?php 

namespace Chatgpt\vistas;

class VistaAdmin {
    public static function render() {
        include_once "head.php";
        include_once "header.php";
?>

        <body>
            <div class="container">
            <h2>Generador de noticias por IA</h2>
                <form action="index.php" method="post">
                    <label>
                        Ingresa el texto de entrada para generar la noticia:
                    </label>
                    <br>
                    <textarea name="prompt" id="" cols="50" rows="2">

                    </textarea>
                    <br>
                    <button type="button" class="submit-btn btn">Previsualizar</button>
                    <h2 class="center-text">Previsualización</h2>
                    <hr>
                    <div id="previsualizacion">                                    
                        <h2>Título de la noticia 1</h2>
                        <img src="./vistas/assets/images/orange-cat-breed.jpg" alt="Gato naranja">
                        <p>Contenido de la noticia 1</p>
                    </div>
                    <button type="button" class="submit-btn btn">Guardar</button>
                    <button type="button" class="reset-btn btn">Cancelar</button>
                </form>
            </div>
        </body>
        </html>

<?php 
        include_once "footer.php";
?>

<?php
    }
}
?>