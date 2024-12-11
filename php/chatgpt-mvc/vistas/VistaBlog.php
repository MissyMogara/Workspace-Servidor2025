<?php

namespace Chatgpt\vistas;
use Chatgpt\modelos\Noticia;

class VistaBlog
{
    public static function render($noticias)
    {
        include_once "head.php";
        include_once "header.php";

?>

        <body>
            <div id="columna_noticias">
                <a href="index.php?action=delete">Borrar</a>
                <?php
                if (isset($noticias)) {
                    foreach ($noticias as $noticia) {
                        echo '<div class="noticia">
                        <h2>' . $noticia->getTitulo() . '</h2>
                        <img src="./public/downloads/images/' . $noticia->getImagen() . '.png" alt="">
                        <p>' . $noticia->getDescripcion() . '</p>
                        </div><hr>';
                    }
                }
                ?>

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