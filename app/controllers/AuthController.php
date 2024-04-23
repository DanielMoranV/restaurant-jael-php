<?php
// AuthController.php (Controlador de Autenticación)

// Incluir el modelo de usuario
include '../models/Collaborator.php';
session_start();

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibir los datos del formulario
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Buscar el usuario por nombre de usuario en la base de datos
    $user = Collaborator::findByUsername($username);

    // Verificar si se encontró el usuario y si la contraseña es correcta
    if ($user && Collaborator::verifyPassword($user, $password)) {
        // Iniciar sesión, establecer variables de sesión, etc.
        // Redirigir al usuario al dashboard
        $_SESSION['usuario'] = $user;
        header("Location: /dashboard");
        exit(); // Asegurar que el script se detenga después de la redirección
    } else {
        $_SESSION['mensaje'] = 'Nombre de usuario o contraseña incorrectos';
        header("Location: /"); // Redirigir de vuelta al formulario de inicio de sesión
        exit();
    }
}
