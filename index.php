<?php
/**
 * ============================================================================
 * LS ASESORES - Enrutador Principal (Front Controller)
 * ============================================================================
 */

error_reporting(E_ALL);
ini_set('display_errors', '1');

require_once __DIR__ . "/config/config.php";
require_once __DIR__ . "/Libs/DB/dbpdo.php";

$pdb = new DBPDO();

// Obtener la URI solicitada
$uri = $_SERVER['REQUEST_URI'] ?? '/';
$uri = parse_url($uri, PHP_URL_PATH);

// Ajustar automáticamente si el proyecto se encuentra en una subcarpeta
$scriptDir = dirname($_SERVER['SCRIPT_NAME']);
if ($scriptDir !== '/' && $scriptDir !== '\\' && strpos($uri, $scriptDir) === 0) {
    $uri = substr($uri, strlen($scriptDir));
}

// Limpiar slashes y separar segmentos
$uri = trim($uri, '/');
$url = explode('/', $uri);

if (empty($url[0])) {
    $fileName = 'index';
} else {
    // Sanitizar nombre de archivo para evitar Path Traversal
    $fileName = basename($url[0], '.php');
}

$dir = __DIR__ . "/views/sections/";
$file = $dir . $fileName . ".php";

// Cargar vista solicitada
if (is_file($file) && file_exists($file)) {   
    include __DIR__ . "/views/sections/general/top.php";
    include $file;
    include __DIR__ . "/views/sections/general/bottom.php";
} else {
    header("HTTP/1.0 404 Not Found");
    include __DIR__ . "/views/sections/404.html";
}
