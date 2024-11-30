<?php

    namespace Coworking\controladores;
    use Coworking\vistas\VistaLogin;
    use Coworking\vistas\VistaRegistroUsuario;
    use Coworking\modelos\ModeloUsuarios;

    class ControladorUsuarios {
        /**
         *Method that shows login if not logged in.
        */
        public static function mostrarLogin($error) {
            VistaLogin::render($error);
        }

        /**
         * Method that shows register form.
         */
        public static function mostrarRegistro($error) {
            VistaRegistroUsuario::render($error);
        }

        /**
         * Add user into database.
         */
        public static function registrarUsuario($usuario) {
            return ModeloUsuarios::meterUsuarioDB($usuario);
        }

        /**
         * Login user into session.
         */
        public static function login($email, $password) {
            $usuario = ModeloUsuarios::getPassword($email);

            if (password_verify($password, $usuario->getPassword())) {
                $_SESSION["id_usuario"] = $usuario->get_id();
                $_SESSION['coworking-user'] = $email;
                header("Location: index.php?accion=mostrarReservas");

            } else {
                ControladorUsuarios::mostrarLogin("Error login.");
            }
        }

    }

?>