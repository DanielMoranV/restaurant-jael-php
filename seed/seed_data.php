<?php
// seed_data.php

// Incluir el archivo de configuración de la base de datos
include '../database/database.php';

// Conectar a la base de datos utilizando la función conectarDB()
$conexion = conectarDB();

// Código SQL para insertar datos de semilla
$sql = "
-- Insertar roles
INSERT INTO roles (name, description) VALUES 
('admin', 'Administrador del sistema'),
('mesero', 'Encargado de tomar pedidos y servir a los clientes'),
('cocinero', 'Encargado de preparar los platos en la cocina');

-- Insertar clientes
INSERT INTO cliente (fullname, dni, document_type, phone, address, email, photo_profile_url) VALUES 
('Juan Pérez', '12345678', 'DNI', '987654321', 'Calle 123', 'juan@example.com', 'url_de_la_foto'),
('María López', '87654321', 'DNI', '23456789', 'Av. Principal', 'maria@example.com', 'url_de_la_foto');

-- Insertar mesas
INSERT INTO `tables` (table_number, status, capacity, observations) VALUES 
(1, 'Disponible', 4, 'Cerca de la ventana'),
(2, 'Ocupada', 6, 'Esquina');

-- Insertar colaboradores
INSERT INTO collaborators (name, surname, document_type, dni, phone, email, address, photo_profile_url) VALUES 
('Luis', 'González', 'DNI', '11111111', '987654321', 'luis@example.com', 'Calle 123', 'url_de_la_foto'),
('Ana', 'Martínez', 'DNI', '22222222', '123456789', 'ana@example.com', 'Av. Principal', 'url_de_la_foto');

-- Insertar productos
INSERT INTO product (name, price, status, id_category) VALUES 
('Ceviche de pescado', 20.00, 'Disponible', 1),
('Lomo saltado', 25.00, 'Disponible', 1),
('Pollo a la brasa', 18.00, 'Disponible', 1),
('Arroz con mariscos', 22.00, 'Disponible', 1),
('Coca-Cola', 3.00, 'Disponible', 2),
('Jugo de naranja', 4.00, 'Disponible', 2);

-- Insertar categorías
INSERT INTO category (name, status) VALUES 
('Platos principales', 'Activo'),
('Bebidas', 'Activo');

-- Insertar tipos de comprobante
INSERT INTO voucher_type (name, status) VALUES 
('Boleta', 'Activo'),
('Factura', 'Activo');

-- Insertar órdenes
INSERT INTO `order` (date, id_collaborator, id_client, id_table, total_cost) VALUES 
('2024-04-22 12:00:00', 1, 1, 1, 50.00),
('2024-04-22 13:00:00', 2, 2, 2, 30.00);

-- Insertar detalles de órdenes
INSERT INTO order_detail (id_order, id_product, quantity) VALUES 
(1, 1, 2),
(1, 5, 3),
(2, 3, 1),
(2, 6, 2);

-- Insertar acceso
INSERT INTO access (username, password, id_collaborator, id_role) VALUES 
('11111111', 'contraseña', 1, 1),
('22222222', 'contraseña', 2, 2);
";

// Ejecutar las consultas SQL
if ($conn->multi_query($sql) === TRUE) {
    echo "Datos insertados correctamente.";
} else {
    echo "Error al insertar datos: " . $conn->error;
}

// Cerrar conexión
$conn->close();
