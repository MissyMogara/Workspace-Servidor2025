<?php 

namespace Chatgpt\vistas;

class VistaBlog {
    public static function render($noticias) {
        include_once "head.php";
        include_once "header.php";
?>

<body>
    <div id="columna_noticias">
        <div class="noticia">
            <h2>Título de la noticia 1</h2>
            <img src="./vistas/assets/images/orange-cat-breed.jpg" alt="Gato naranja">
            <p>Contenido de la noticia 1</p>
        </div>
    </div>

    <?php 
    include_once "footer.php";
    ?>
    
</body>
</html>

<?php

    }
}

?>