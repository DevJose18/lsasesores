<?php
declare(strict_types=1);

/**
 * LS ASESORES - Configuración del Sistema
 *
 * Gestión de configuración basada en la estructura del entorno de clase.
 * Define constantes del entorno y configuración de base de datos ficticia (Mock DB).
 */

if (!defined('DEV_ENV')) {
    define('DEV_ENV', true);
}

// Carga opcional de variables de entorno desde .env si existe
$envFile = dirname(__DIR__) . '/.env';
if (is_readable($envFile)) {
    foreach (file($envFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) as $line) {
        $line = trim($line);
        if ($line === '' || str_starts_with($line, '#') || !str_contains($line, '=')) {
            continue;
        }
        [$key, $value] = explode('=', $line, 2);
        $key = trim($key);
        $value = trim($value, " \t\n\r\0\x0B\"'");
        if ($key !== '' && getenv($key) === false) {
            putenv("$key=$value");
        }
    }
}

/**
 * Devuelve una variable de entorno con un valor por defecto.
 */
function env(string $key, string $default = ''): string
{
    $value = getenv($key);

    return ($value === false || $value === '') ? $default : $value;
}

// Rutas base de la aplicación
if (!defined('ROOT_DIR')) {
    define('ROOT_DIR', dirname(__DIR__));
}
if (!defined('APPLICATION')) {
    define('APPLICATION', ROOT_DIR . '/app');
}
if (!defined('SOURCE')) {
    define('SOURCE', APPLICATION);
}
if (!defined('CONFIG_DIR')) {
    define('CONFIG_DIR', __DIR__);
}

return [
    'app_name' => 'LS ASESORES',
    'env'      => env('APP_ENV', 'development'),
    'db' => [
        'driver'  => 'mock',
        'storage' => ROOT_DIR . '/database/mock_database.json',
    ],
];
