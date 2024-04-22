-- Limpiar base de datos
SET FOREIGN_KEY_CHECKS = 0;
-- Desactiva la verificación de claves foráneas para evitar errores
-- Obtiene todas las tablas en la base de datos actual
SELECT CONCAT(
        'TRUNCATE TABLE ',
        table_schema,
        '.',
        table_name,
        ';'
    )
FROM information_schema.tables
WHERE table_schema = 'db_restaurante_jael';
-- Reemplaza 'nombre_de_tu_base_de_datos' por el nombre de tu base de datos
-- Una vez que hayas verificado que la consulta anterior selecciona las tablas correctas,
-- ejecuta las consultas TRUNCATE resultantes para limpiar las tablas
SET FOREIGN_KEY_CHECKS = 1;
-- Vuelve a activar la verificación de claves foráneas
-- Insertar roles
INSERT INTO roles (name, description)
VALUES ('admin', 'Administrador del sistema'),
    (
        'mesero',
        'Encargado de tomar pedidos y servir a los clientes'
    ),
    (
        'cocinero',
        'Encargado de preparar los platos en la cocina'
    );
-- Insertar clientes
INSERT INTO cliente (
        fullname,
        dni,
        document_type,
        phone,
        address,
        email,
        photo_profile_url
    )
VALUES (
        'Juan Pérez',
        '12345678',
        'DNI',
        '987654321',
        'Calle 123',
        'juan@example.com',
        'url_de_la_foto'
    ),
    (
        'María López',
        '87654321',
        'DNI',
        '123456789',
        'Av. Principal',
        'maria@example.com',
        'url_de_la_foto'
    );
-- Insertar mesas
INSERT INTO `tables` (table_number, status, capacity, observations)
VALUES (1, 'Disponible', 4, 'Cerca de la ventana'),
    (2, 'Ocupada', 6, 'Esquina');
-- Insertar colaboradores
INSERT INTO collaborators (
        name,
        surname,
        document_type,
        dni,
        phone,
        email,
        address,
        photo_profile_url
    )
VALUES (
        'Luis',
        'González',
        'DNI',
        '11111111',
        '987654321',
        'luis@example.com',
        'Calle 123',
        'url_de_la_foto'
    ),
    (
        'Ana',
        'Martínez',
        'DNI',
        '22222222',
        '123456789',
        'ana@example.com',
        'Av. Principal',
        'url_de_la_foto'
    );
-- Insertar categorías
INSERT INTO category (name, status)
VALUES ('Platos principales', 'Activo'),
    ('Bebidas', 'Activo');
-- Insertar productos
INSERT INTO products (name, price, status, id_category)
VALUES ('Ceviche de pescado', 20.00, 'Disponible', 1),
    ('Lomo saltado', 25.00, 'Disponible', 1),
    ('Pollo a la brasa', 18.00, 'Disponible', 1),
    ('Arroz con mariscos', 22.00, 'Disponible', 1),
    ('Coca-Cola', 3.00, 'Disponible', 2),
    ('Jugo de naranja', 4.00, 'Disponible', 2);
-- Insertar tipos de comprobante
INSERT INTO voucher_type (name, status)
VALUES ('Boleta', 'Activo'),
    ('Factura', 'Activo');
-- Insertar órdenes
INSERT INTO `order` (
        date,
        id_collaborator,
        id_client,
        id_table,
        total_cost
    )
VALUES ('2024-04-22 12:00:00', 1, 1, 1, 50.00),
    ('2024-04-22 13:00:00', 2, 2, 2, 30.00);
-- Insertar acceso
INSERT INTO access (username, password, id_collaborator, id_role)
VALUES ('11111111', 'contraseña', 1, 1),
    ('22222222', 'contraseña', 2, 2);
-- Insertar detalles de órdenes
INSERT INTO order_detail (id_order, id_product, quantity)
VALUES (1, 1, 2),
    (1, 5, 3),
    (2, 3, 1),
    (2, 6, 2);