<?php
// // Incluir el archivo de configuración de la base de datos
// include './database/database.php';

// // Obtener la conexión a la base de datos
// $conexion = conectarDB();

// // Verificar si la conexión es válida
// if ($conexion) {
//     echo "Conexión exitosa";;
// } else {
//     echo "Error al conectar a la base de datos";
// };


// index.php

// Incluir el archivo de rutas
include './routes/index.php';

// Obtener la ruta solicitada
$route = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '/';

echo  $route;

// Cargar la vista correspondiente
if (array_key_exists($route, $routes)) {
    include $routes[$route];
} else {
    // Manejar rutas no encontradas
    include './pages/404.php';
}
