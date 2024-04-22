<?php
// Collaborator.php (Modelo de Colaborador)
include '../database/database.php';

class Collaborator
{
    public static function findByUsername($username)
    {
        try {
            // Conectar a la base de datos
            $conexion = conectarDB();

            // Preparar la consulta con un JOIN entre las tablas access y roles
            $consulta = $conexion->prepare("SELECT a.*, r.name AS role_name, r.description AS role_description 
                                            FROM access a
                                            INNER JOIN roles r ON a.id_role = r.id
                                            WHERE a.username = :username");

            // Ejecutar la consulta con parámetros
            $consulta->execute(['username' => $username]);

            // Obtener el resultado
            $usuario = $consulta->fetch(PDO::FETCH_ASSOC);

            // Cerrar la conexión
            $conexion = null;

            return $usuario; // Retorna el usuario con los datos del rol si es encontrado, de lo contrario, retorna null
        } catch (PDOException $e) {
            // Manejar errores de la base de datos
            echo "Error al buscar usuario: " . $e->getMessage();
            return null;
        }
    }

    // Método para verificar la contraseña...
    public static function verifyPassword($user, $password)
    {
        // Verificar si se encontró el usuario
        if ($user) {
            // Verificar la contraseña
            if ($user['password'] === $password) {
                return true; // La contraseña coincide
            }
        }

        return false; // La contraseña no coincide o el usuario no fue encontrado
    }
}
