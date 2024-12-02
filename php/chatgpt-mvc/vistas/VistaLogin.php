<?php

namespace Chatgpt\vistas;

class VistaLogin
{
    public static function render($error)
    {
        include_once "head.php";
    }
}

?>

<body>
    <div>
        <!-- LOGIN FORM -->
         <form action="index.php" method="POST">
            <input type="text" name="email" placeholder="Email...">
            <input type="password" name="password" placeholder="Contraseña...">
         </form>
    </div>
</body>

</html>