<?php
declare(strict_types=1);

/**
 * Configuración de la aplicación LS ASESORES.
 *
 * Entorno configurado con Base de Datos Ficticia (Mock Database).
 * No requiere conexiones a servidores MySQL/MariaDB reales.
 */

// Carga opcional de .env, sin dependencias externas.
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

return [
    'app_name' => 'LS ASESORES',
    'env'      => env('APP_ENV', 'development'),
    'db' => [
        'driver'  => 'mock',
        'storage' => dirname(__DIR__) . '/database/mock_database.json',
    ],
];
