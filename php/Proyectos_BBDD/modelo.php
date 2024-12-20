<?php 
/**
 * Create a DB connection and return it
 */
function connectToDB() {
    $dbh = null;
    // Put connection into session
    try {
        // host-> container mariadb's name and internal port between containers 
        $dsn = "mysql:host=mariadb:3306;dbname=ejemplo;charset=utf8mb4";
        $dbh = new PDO($dsn, "usuario", "usuario");
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e){
        echo "ERROR CONEXION " . $e->getMessage();
    }
    return $dbh;  // Return the database connection object
}
/*---------- USERS ---------- */
/**
 * Check if email exists
 */
function checkEmail($email){
    $dbh = connectToDB();

    $stmt = $dbh->prepare("SELECT * FROM usuarios WHERE email = ?");
    $stmt -> bindParam(1, $email);
    $stmt -> setFetchMode(PDO::FETCH_ASSOC); // Return an array
    $stmt -> execute(); // Execute the query
    
    $dbh = null;

    // Show results, fetch return a row every time is called
    if ($row = $stmt->fetch()) { // Select is over a field UNIQUE only return 1 or nothing
        return 1;
    } else {
        return 0;
    }

}

/**
 * Return rol and hash via email
 */
function consultHashRole($email){
    $dbh = connectToDB();

    $stmt = $dbh->prepare("SELECT rol, password FROM usuarios WHERE email = ?");
    $stmt -> bindParam(1, $email);
    $stmt -> setFetchMode(PDO::FETCH_ASSOC); // Return an array
    $stmt -> execute(); // Execute the query

    $dbh = null;
    // Return password as user's hash by email
    if ($row = $stmt->fetch()) {
        return $row;
    } else {
        return 0;
    }
}

/**
 * Register user into the database
 */
function registerUser($email, $password, $nombre, $apellidos, $ciudad, $movil, $fecha_nacimiento){
    $dbh = connectToDB();

    $stmt = $dbh->prepare("INSERT INTO usuarios (email, password, nombre, apellidos, ciudad, movil, fecha_nacimiento, rol)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

    $rol = "user";

    // Save paswword hash instead of password
    $passwordHash = password_hash($password, PASSWORD_BCRYPT);

    $stmt->bindParam(1, $email);
    $stmt->bindParam(2, $passwordHash);
    $stmt->bindParam(3, $nombre);
    $stmt->bindParam(4, $apellidos);
    $stmt->bindParam(5, $ciudad);
    $stmt->bindParam(6, $movil);
    $stmt->bindParam(7, $fecha_nacimiento);
    $stmt->bindParam(8, $rol);
    $stmt->execute(); // Execute the query
    
    $dbh = null;

}
/*---------- PROJECTS ---------- */
/**
 * Register project into database
 */
function registerProject($nombre, $fechaInicio, $fechaFinPrevista, $diasTranscurridos, $porcentajeCompletado, $importancia, $id_usuario){
    
    $dbh = connectToDB();

    $stmt = $dbh->prepare("INSERT INTO proyectos (nombre, fecha_inicio, fecha_fin, dias_transcurridos, porcentaje_completado, importancia, id_usuario)
    VALUES (?,?,?,?,?,?,?)");

    
    $stmt->bindParam(1, $nombre);
    $stmt->bindParam(2, $fechaInicio);
    $stmt->bindParam(3, $fechaFinPrevista);
    $stmt->bindParam(4, $diasTranscurridos);
    $stmt->bindParam(5, $porcentajeCompletado);
    $stmt->bindParam(6, $importancia);
    $stmt->bindParam(7, $id_usuario);

    $stmt->execute(); // Execute the query

    $dbh = null;
}
/**
 * Get the project by ID from database
 */
function getProject($id){
    $dbh = connectToDB();

    $stmt = $dbh->prepare("SELECT * FROM proyectos WHERE id = ?");

    $stmt->bindParam(1, $id);

    $stmt->execute(); // Execute the query
    $proyecto = $stmt->fetch(PDO::FETCH_ASSOC); // Array

    $dbh = null;
    return $proyecto;
}
/**
 * Get projects from the database
 */
function getProjects($user_id) {
    $dbh = connectToDB();

    $stmt = $dbh->prepare("SELECT * FROM proyectos WHERE id_usuario = ?");
    $stmt->bindParam(1, $user_id);
    $stmt->execute(); // Execute the query
    $proyectos = $stmt->fetchAll(PDO::FETCH_ASSOC); // Array

    $dbh = null;
    return $proyectos;
}
/**
 * Delete a project from the database
 */
function deleteProject($id){

    $dbh = connectToDB();

    $stmt = $dbh->prepare("DELETE FROM proyectos WHERE id =?");
    $stmt->bindParam(1, $id);
    $stmt->execute(); // Execute the query

    $dbh = null;

}

/**
 * Delete all projects from database
 */
function deleteAllProjects($user_id){

    $dbh = connectToDB();
    $stmt = $dbh->prepare("DELETE FROM proyectos WHERE id_usuario = ?");
    $stmt -> bindParam(1, $user_id);
    $stmt->execute(); // Execute the query

    $dbh = null;

}

/**
 * Modified project in database
 */
function modifyProject($nombre, $fechaInicio, $fechaFinPrevista, $diasTranscurridos, $porcentajeCompletado, $importancia, $id){

    $dbh = connectToDB();

    $stmt = $dbh->prepare("UPDATE proyectos SET nombre =?, fecha_inicio =?, fecha_fin =?, dias_transcurridos =?, 
    porcentaje_completado =?, importancia =? WHERE id =?");

    $stmt->bindParam(1, $nombre);
    $stmt->bindParam(2, $fechaInicio);
    $stmt->bindParam(3, $fechaFinPrevista);
    $stmt->bindParam(4, $diasTranscurridos);
    $stmt->bindParam(5, $porcentajeCompletado);
    $stmt->bindParam(6, $importancia);
    $stmt->bindParam(7, $id);

    $stmt->execute(); // Execute the query
    
    $dbh = null;
}
/**
 * Get user id
 */
function getUserId($email){
    $dbh = connectToDB();

    $stmt = $dbh->prepare("SELECT id FROM usuarios WHERE email = ?");
    $stmt -> bindParam(1, $email);
    $stmt -> execute(); // Execute the query

    $user_id = $stmt -> fetchAll(PDO::FETCH_ASSOC); // Return an array

    $dbh = null;
    return $user_id[0]["id"]; // Return user id
}
?>