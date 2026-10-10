CREATE DATABASE IF NOT EXISTS `lsasesores_db` 
CHARACTER SET utf8mb4 
COLLATE utf8mb4_unicode_ci;

USE `lsasesores_db`;

-- 2. Creación de la Tabla 'solicitudes'
DROP TABLE IF EXISTS `solicitudes`;

CREATE TABLE `solicitudes` (
    `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `nombre` VARCHAR(100) NOT NULL COMMENT 'Nombre completo del remitente',
    `email` VARCHAR(120) NOT NULL COMMENT 'Correo electrónico de contacto',
    `asunto` VARCHAR(150) NOT NULL COMMENT 'Asunto de la consulta',
    `mensaje` TEXT NOT NULL COMMENT 'Contenido o descripción del mensaje',
    `ip_address` VARCHAR(45) NULL DEFAULT NULL COMMENT 'Dirección IPv4 o IPv6 de origen',
    `user_agent` VARCHAR(255) NULL DEFAULT NULL COMMENT 'Navegador / dispositivo del usuario',
    `estado` ENUM('pendiente', 'en_proceso', 'atendido') NOT NULL DEFAULT 'pendiente' COMMENT 'Estatus de seguimiento',
    `creado_el` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha y hora de envío',
    INDEX `idx_email` (`email`),
    INDEX `idx_creado_el` (`creado_el`),
    INDEX `idx_estado` (`estado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Registro de solicitudes de contacto recibidas desde la landing page';

-- 3. Inserción de ejemplo (opcional para pruebas de consulta inicial)
INSERT INTO `solicitudes` (`nombre`, `email`, `asunto`, `mensaje`, `ip_address`, `estado`) 
VALUES 
('Carlos Mendoza', 'carlos.mendoza@empresa.com', 'Consulta sobre Planificación Fiscal 2026', 'Hola equipo de LS Asesores, estamos buscando reestructurar nuestra carga impositiva corporativa y nos gustaría coordinar una reunión inicial.', '127.0.0.1', 'pendiente');
