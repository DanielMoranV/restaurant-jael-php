<?php
// database.php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', 'admin');
define('DB_NAME', 'db_restaurante_jael');
// function conectarDB()
// {
//     $host = 'localhost';
//     $username = 'root';
//     $password = '';
//     $database = 'db_restaurante_jael';

//     try {
//         $conexion = new PDO("mysql:host=$host;dbname=$database", $username, $password);
//         $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//         return $conexion;
//     } catch (PDOException $e) {
//         echo "Error al conectar a la base de datos: " . $e->getMessage();
//         return null;
//     }
// }