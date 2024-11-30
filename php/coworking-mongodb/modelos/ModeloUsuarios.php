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

        $usuarios_arr = [];

        foreach ($usuarios as $usuario) {
            $userObj = new Usuario($usuario["_id"], $usuario["nombre"], $usuario["apellidos"], 
            $usuario["email"], $usuario["password"], $usuario["telefono"], $usuario["fecha_creacion"]);
            array_unshift($usuarios_arr, $userObj);
        }

        // DB query to get all users        

        $conexion->cerrarConexion();

        return $usuarios_arr;

    }

    /**
     * Insert an user into the database
     */
    public static function meterUsuarioDB($usuario) {
        $conexion = new ConexionBD();
        $baseDatos = $conexion->getBaseDatos();
        $colection = $baseDatos->usuarios;

        // // Check if email exists in the database
        $emailExiste = $colection->findOne(["email" => $usuario->getEmail()]);

        if ($emailExiste) {
            return $error="El email ya está en uso.";
        } else {

        // Hash password before storing it in the database
        $passwordHash = password_hash($usuario->getPassword(), PASSWORD_BCRYPT);

        // DB query to insert a new user with the provided data
        $user = [
                "nombre" => $usuario->getNombre(),
                "apellidos" => $usuario->getApellidos(),
                "email" => $usuario->getEmail(),
                "password" => $passwordHash,
                "telefono" => $usuario->getTelefono(),
                "fecha_creacion" => $usuario->getFecha_creacion()
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
        $usuario = $colection->findOne(["email" => $email]);

        $usuarioObj = new Usuario($usuario["_id"], $usuario["nombre"], $usuario["apellidos"], 
        $usuario["email"], $usuario["password"], $usuario["telefono"], $usuario["fecha_creacion"]);

        $conexion->cerrarConexion();

        //$usuario_arr = iterator_to_array($usuario);

        return $usuarioObj;

    }

    /**
     * Get password by users' email address.
     */
    public static function getPassword($email) {
        
        $conexion = new ConexionBD();
        $baseDatos = $conexion->getBaseDatos();
        $colection = $baseDatos->usuarios;

        // // DB query to get user's password   
        $password = $colection->findOne(["email" => $email]);

        $passwordArr = $password->getArrayCopy();

        $passwordObj = new Usuario($passwordArr["_id"]->__toString(),"","","",$passwordArr["password"],"","","");

        $conexion->cerrarConexion();

        return $passwordObj;

    }

}

?>