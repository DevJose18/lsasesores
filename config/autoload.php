<?php
// Autoloader para las librerías en Libs
spl_autoload_register(function ($class) {
    $file = __DIR__ . '/../Libs/' . str_replace('\\', '/', $class) . '.php';
    if (file_exists($file)) {
        require_once $file;
    }
});
