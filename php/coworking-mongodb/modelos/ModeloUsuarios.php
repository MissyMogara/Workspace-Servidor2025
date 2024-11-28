<?php

namespace Coworking\modelos;

use Coworking\modelos\Usuario;
use \PDO;


class ModeloUsuarios {

    public static function getAll(){

        $conexion = new ConexionBD();
        $baseDatos = $conexion->getBaseDatos();
        $colection = $baseDatos->usuarios;
        $usuarios = $colection->find();

        $usuarios_arr = iterator_to_array($usuarios);

        // DB query to get all users        
        // $stmt = $conexion->getConnexion()->prepare("SELECT * FROM usuarios");
        // $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Coworking\modelos\Usuario');
        // $stmt->execute();
        // $usuarios = $stmt->fetchAll();

        $conexion->cerrarConexion();

        return $usuarios_arr;

    }
    // VOY POR AQUI
    /**
     * Insert an user into the database
     */
    public static function meterUsuarioDB($usuario) {

        $conexion = new ConexionBD();
        $baseDatos = $conexion->getBaseDatos();
        $colection = $baseDatos->usuarios;

        // // Check if email exists in the database
        // $stmt = $conexion->getConnexion()->prepare("SELECT email FROM usuarios WHERE email =?");
        // $stmt->bindValue(1, $usuario->getEmail());
        // $stmt->execute();
        // $emailExiste = $stmt->fetch();
        $emailExiste = $colection->findOne(["email" => $usuario->getEmail()]);

        if ($emailExiste) {
            return $error="El email ya está en uso.";
        } else {

        // Hash password before storing it in the database
        $passwordHash = password_hash($usuario->getPassword(), PASSWORD_BCRYPT);

        // DB query to insert a new user with the provided data
        // $stmt = $conexion->getConnexion()->prepare("INSERT INTO usuarios (nombre, apellidos, email, password, telefono, fecha_creacion) VALUES (?,?,?,?,?,?)");
        // $stmt->bindValue(1, $usuario->getNombre());
        // $stmt->bindValue(2, $usuario->getApellidos());
        // $stmt->bindValue(3, $usuario->getEmail());
        // $stmt->bindValue(4, $passwordHash);
        // $stmt->bindValue(5, $usuario->getTelefono());
        // $stmt->bindValue(6, $usuario->getFecha_creacion());
        // $stmt->execute();
        $user = [
            [
                "nombre" => $usuario->getNombre(),
                "apellidos" => $usuario->getApellidos(),
                "email" => $usuario->getEmail(),
                "password" => $usuario->getPassword(),
                "telefono" => $usuario->getTelefono(),
                "fecha_creacion" => $usuario->getFecha_creacion()
            ]
        ];
        $colection->insertOne($user);

        $conexion->cerrarConexion();

        }
    }

    /**
     * Get user by email.
     */
    public static function getUsuarioByEmail($email) {
        
        $conexion = new ConexionBD();
        $baseDatos = $conexion->getBaseDatos();
        $colection = $baseDatos->usuarios;

        // // DB query to get user by email
        // $stmt = $conexion->getConnexion()->prepare("SELECT * FROM usuarios WHERE email =?");
        // $stmt->bindValue(1, $email);
        // $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Coworking\modelos\Usuario');
        // $stmt->execute();
        // $usuario = $stmt->fetch();
        $usuario = $colection->findOne(["email" => $email]);

        $conexion->cerrarConexion();

        $usuario_arr = iterator_to_array($usuario);

        return $usuario_arr;

    }

    /**
     * Get password by users' email address.
     */
    public static function getPassword($email) {
        
        $conexion = new ConexionBD();
        $baseDatos = $conexion->getBaseDatos();
        $colection = $baseDatos->usuarios;

        // // DB query to get user's password   
        // $stmt = $conexion->getConnexion()->prepare("SELECT id, password FROM usuarios WHERE email = '$email'");
        // $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Coworking\modelos\Usuario');
        // $stmt->execute();
        // $password = $stmt->fetch();
        $password = $colection->findOne(["email" => $email], ["projection" => ["password" => 1], ["_id" => 1]]);

        $conexion->cerrarConexion();

        $password_arr = iterator_to_array($password);

        return $password_arr;

    }

}

?>