<?php

namespace Chatgpt\vistas;

class VistaLogin
{
    public static function render($error)
    {
        include_once "head.php";

?>

        <body>
            <div id="login_container">
                <!-- LOGIN FORM -->
                <div id="content_login_container">
                    <div id="login_title">
                        <h1>Formulario de login</h1>
                    </div>
                    <form action="index.php" method="POST">

                        <?php 
                        if ($error != "") {
                            echo "<p class='error'>$error</p>";
                        }
                        ?>

                        <input type="text" name="email" placeholder="Email...">
                        <br>
                        <br>
                        <input type="password" name="password" placeholder="Contraseña...">
                        <br>
                        <button type="submit" class="submit-btn" name="loggear">Entrar</button>
                        <br>
                        <br>
                        <button type="reset" class="reset-btn">Borrar</button>
                    </form>
                </div>
            </div>
        </body>

        </html>

<?php

    }
}

?>