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
                    <textarea id="textArea" name="prompt" id="" cols="50" rows="2">

                    </textarea>
                    <br>
                    <button type="button" class="submit-btn btn" id="previsualizar">Previsualizar</button>
                    <h2 class="center-text">Previsualización</h2>
                    <hr>
                    <div id="previsualizacion">                                    
                        
                    </div>
                    <p id="message"></p>
                    <button type="submit" class="submit-btn btn" name="save_data" id="guardar">Guardar</button>
                    <button type="button" class="reset-btn btn" id="cancelar">Cancelar</button>
                    <br>
                    <button type="button" class="btn-volver" id="volver">Volver</button>
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