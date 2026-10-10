<?php
declare(strict_types=1);

// Iniciar sesión para soportar tokens CSRF y mensajes flash
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Credenciales de la Base de Datos MySQL
define('DB_HOST', 'localhost');          // Servidor de base de datos
define('DB_NAME', 'lsasesores_db');       // Nombre de la base de datos
define('DB_USER', 'root');                // Usuario de MySQL
define('DB_PASS', '');                    // Contraseña de MySQL
define('DB_PORT', '3306');                // Puerto MySQL
define('DB_CHARSET', 'utf8mb4');          // Codificación recomendada

/**
 * Retorna una instancia PDO configurada de forma segura
 *
 * @return PDO
 */
function getDBConnection(): PDO {
    static $pdo = null;

    if ($pdo === null) {
        $dsn = "mysql:host=" . DB_HOST . ";port=" . DB_PORT . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET;
        
        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES " . DB_CHARSET
        ];

        try {
            $pdo = new PDO($dsn, DB_USER, DB_PASS, $options);
        } catch (PDOException $e) {
            error_log("Error de conexión a la Base de Datos: " . $e->getMessage());
            throw new PDOException("No se pudo conectar a la base de datos. Por favor verifica config/config.php.");
        }
    }

    return $pdo;
}

/**
 * Genera un token CSRF seguro en la sesión
 *
 * @return string
 */
function generateCsrfToken(): string {
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

/**
 * Valida el token CSRF recibido
 *
 * @param string|null $token
 * @return bool
 */
function validateCsrfToken(?string $token): bool {
    if (empty($_SESSION['csrf_token']) || empty($token)) {
        return false;
    }
    return hash_equals($_SESSION['csrf_token'], $token);
}
