<?php 

namespace Chatgpt\modelos;

use Chatgpt\modelos\Admin;

class ModeloAdmin {

    /**
     * This function returns the admin user by email.
     */
    public static function getAdminByEmail($email){

        $conexion = new ConexionBD();
        $baseDatos = $conexion->getBaseDatos();
        $collection = $baseDatos->admin;

        $admin = $collection->findOne(["email" => $email]);

        if ($admin !== null) {

            $adminObj = new Admin($admin["_id"], $admin["email"], $admin["password"]);

            return $adminObj;
        } else {
            return null;
        }

    }

}

?>