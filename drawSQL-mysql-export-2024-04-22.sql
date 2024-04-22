DROP DATABASE IF EXISTS db_restaurante_jael;
CREATE DATABASE db_restaurante_jael;
USE db_restaurante_jael;
CREATE TABLE `payments`(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `id_order` INT UNSIGNED NOT NULL,
    `igv` INT NOT NULL,
    `discount` INT NOT NULL,
    `status` INT NOT NULL,
    `total` DECIMAL(8, 2) NOT NULL,
    `id_payment_type` INT UNSIGNED NOT NULL
);
CREATE TABLE `roles`(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(255) NOT NULL,
    `description` VARCHAR(255) NULL
);
CREATE TABLE `cliente`(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `fullname` VARCHAR(255) NOT NULL,
    `dni` VARCHAR(255) NOT NULL,
    `document_type` VARCHAR(255) NOT NULL,
    `phone` VARCHAR(255) NULL,
    `address` VARCHAR(255) NULL,
    `email` VARCHAR(255) NULL,
    `photo_profile_url` VARCHAR(255) NULL
);
CREATE TABLE `tables`(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `table_number` INT NOT NULL,
    `status` VARCHAR(255) NOT NULL,
    `capacity` INT NOT NULL,
    `observations` VARCHAR(255) NOT NULL
);
CREATE TABLE `vouchers`(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `voucher_number` VARCHAR(255) NOT NULL,
    `id_payment` INT UNSIGNED NOT NULL,
    `hash` VARCHAR(255) NOT NULL
);
CREATE TABLE `collaborators`(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(255) NOT NULL,
    `surname` VARCHAR(255) NOT NULL,
    `document_type` VARCHAR(255) NOT NULL,
    `dni` VARCHAR(50) NOT NULL,
    `phone` VARCHAR(20) NOT NULL,
    `email` VARCHAR(255) NULL,
    `address` VARCHAR(255) NOT NULL,
    `photo_profile_url` VARCHAR(255) NULL
);
CREATE TABLE `order`(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `date` DATETIME NOT NULL,
    `id_collaborator` INT UNSIGNED NOT NULL,
    `id_client` INT UNSIGNED NOT NULL,
    `id_table` INT UNSIGNED NOT NULL,
    `total_cost` DECIMAL(8, 2) NOT NULL
);
CREATE TABLE `access`(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `username` VARCHAR(255) NOT NULL,
    `password` VARCHAR(255) NOT NULL,
    `id_collaborator` INT UNSIGNED NOT NULL,
    `id_role` INT UNSIGNED NOT NULL
);
CREATE TABLE `products`(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(255) NOT NULL,
    `price` DECIMAL(8, 2) NOT NULL,
    `status` VARCHAR(255) NOT NULL,
    `id_category` INT UNSIGNED NOT NULL
);
CREATE TABLE `voucher_type`(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(255) NOT NULL,
    `status` VARCHAR(255) NULL
);
CREATE TABLE `order_detail`(
    `id_order` INT UNSIGNED NOT NULL,
    `id_product` INT UNSIGNED NOT NULL,
    `quantity` INT NOT NULL
);
CREATE TABLE `category`(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(255) NOT NULL,
    `status` VARCHAR(255) NULL
);
CREATE TABLE `commands`(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `id_order` INT UNSIGNED NOT NULL,
    `preparation status` VARCHAR(255) NOT NULL
);
ALTER TABLE
    `products` ADD CONSTRAINT `product_id_category_foreign` FOREIGN KEY(`id_category`) REFERENCES `category`(`id`);
ALTER TABLE
    `payments` ADD CONSTRAINT `payments_id_payment_type_foreign` FOREIGN KEY(`id_payment_type`) REFERENCES `voucher_type`(`id`);
ALTER TABLE
    `order` ADD CONSTRAINT `order_id_table_foreign` FOREIGN KEY(`id_table`) REFERENCES `tables`(`id`);
ALTER TABLE
    `order` ADD CONSTRAINT `order_id_collaborator_foreign` FOREIGN KEY(`id_collaborator`) REFERENCES `collaborators`(`id`);
ALTER TABLE
    `access` ADD CONSTRAINT `access_id_collaborator_foreign` FOREIGN KEY(`id_collaborator`) REFERENCES `collaborators`(`id`);
ALTER TABLE
    `order` ADD CONSTRAINT `order_id_client_foreign` FOREIGN KEY(`id_client`) REFERENCES `cliente`(`id`);
ALTER TABLE
    `vouchers` ADD CONSTRAINT `voucher_id_payment_foreign` FOREIGN KEY(`id_payment`) REFERENCES `payments`(`id`);
ALTER TABLE
    `access` ADD CONSTRAINT `access_id_role_foreign` FOREIGN KEY(`id_role`) REFERENCES `roles`(`id`);
ALTER TABLE
    `order_detail` ADD CONSTRAINT `order_detail_id_order_foreign` FOREIGN KEY(`id_order`) REFERENCES `order`(`id`);
ALTER TABLE
    `order_detail` ADD CONSTRAINT `order_detail_id_product_foreign` FOREIGN KEY(`id_product`) REFERENCES `products`(`id`);
ALTER TABLE
    `commands` ADD CONSTRAINT `commands_id_order_foreign` FOREIGN KEY(`id_order`) REFERENCES `order`(`id`);
ALTER TABLE
    `payments` ADD CONSTRAINT `payments_id_foreign` FOREIGN KEY(`id`) REFERENCES `order`(`id`);