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

        // Check if email exists in the database
        $stmt = $conexion->getConnexion()->prepare("SELECT email FROM usuarios WHERE email =?");
        $stmt->bindValue(1, $usuario->getEmail());
        $stmt->execute();
        $emailExiste = $stmt->fetch();

        if ($emailExiste) {
            return $error="El email ya está en uso.";
        } else {

        // Hash password before storing it in the database
        $passwordHash = password_hash($usuario->getPassword(), PASSWORD_BCRYPT);

        // DB query to insert a new user with the provided data
        $stmt = $conexion->getConnexion()->prepare("INSERT INTO usuarios (nombre, apellidos, email, password, telefono, fecha_creacion) VALUES (?,?,?,?,?,?)");
        $stmt->bindValue(1, $usuario->getNombre());
        $stmt->bindValue(2, $usuario->getApellidos());
        $stmt->bindValue(3, $usuario->getEmail());
        $stmt->bindValue(4, $passwordHash);
        $stmt->bindValue(5, $usuario->getTelefono());
        $stmt->bindValue(6, $usuario->getFecha_creacion());
        $stmt->execute();
        $conexion->cerrarConexion();

        }
    }

    /**
     * Get user by email.
     */
    public static function getUsuarioByEmail($email) {
        
        $conexion = new ConexionBD();

        // DB query to get user by email
        $stmt = $conexion->getConnexion()->prepare("SELECT * FROM usuarios WHERE email =?");
        $stmt->bindValue(1, $email);
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Coworking\modelos\Usuario');
        $stmt->execute();
        $usuario = $stmt->fetch();

        return $usuario;

        $conexion->cerrarConexion();
    }

    /**
     * Get password by users' email address.
     */
    public static function getPassword($email) {
        
        $conexion = new ConexionBD();

        // DB query to get user's password   
        $stmt = $conexion->getConnexion()->prepare("SELECT id, password FROM usuarios WHERE email = '$email'");
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Coworking\modelos\Usuario');
        $stmt->execute();
        $password = $stmt->fetch();

        $conexion->cerrarConexion();

        return $password;

    }

}

?>