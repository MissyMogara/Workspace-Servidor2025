<?php 
/**
 * Create a DB connection and return it
 */
function connectToDB() {
    $dbh = null;
    // Put connection into session
    try {
        // host-> container mariadb's name and internal port between containers 
        $dsn = "mysql:host=mariadb:3306;dbname=ejemplo";
        $dbh = new PDO($dsn, "usuario", "usuario");
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e){
        echo "ERROR CONEXION " . $e->getMessage();
    }
    return $dbh;  // Return the database connection object
}

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

?>