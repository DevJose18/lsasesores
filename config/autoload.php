<?php
declare(strict_types=1);

/**
 * LS ASESORES - Autocargador (Autoload)
 *
 * Basado en la gestión de autoload de clase para cargar automáticamente
 * librerías y utilidades desde app/libs y app/utilities.
 */

if (!defined('APPLICATION')) {
    define('APPLICATION', dirname(__DIR__) . '/app');
}

spl_autoload_register(function (string $className): void {
    $normalized = str_replace('\\', '/', $className);
    $normalizedLower = strtolower($normalized);

    $candidates = [
        APPLICATION . '/' . $normalized . '.php',
        APPLICATION . '/' . $normalizedLower . '.php',
        APPLICATION . '/libs/' . $normalized . '.php',
        APPLICATION . '/libs/' . $normalizedLower . '.php',
        APPLICATION . '/libs/db/' . $normalized . '.php',
        APPLICATION . '/libs/db/' . $normalizedLower . '.php',
        APPLICATION . '/utilities/' . $normalized . '.php',
        APPLICATION . '/utilities/' . $normalizedLower . '.php',
    ];

    foreach ($candidates as $file) {
        if (is_file($file)) {
            require_once $file;
            return;
        }
    }
});
