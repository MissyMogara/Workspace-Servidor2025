<?php 

namespace Chatgpt\vistas;

class VistaBlog {
    public static function render() {
        include_once "head.php";
        include_once "header.php";
?>

<body>
    <div id="columna_noticias">
        <div class="noticia">
            <img src="" alt="">
            <h2>Título de la noticia 1</h2>
            <p>Contenido de la noticia 1</p>
        </div>
    </div>
</body>
</html>

<?php

    }
}

?>