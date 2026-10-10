<?php
declare(strict_types=1);

require_once __DIR__ . '/config/config.php';
require_once __DIR__ . '/Libs/DB/dbpdo.php';

/**
 * Redirecciona al usuario a la sección de contacto con un mensaje en sesión
 *
 * @param bool $success
 * @param string $message
 * @param array $errors
 * @return void
 */
function redirectWithFlash(bool $success, string $message, array $errors = []): void {
    $_SESSION['flash'] = [
        'type'    => $success ? 'success' : 'danger',
        'message' => $message,
        'errors'  => $errors
    ];
    header('Location: index.php#contacto');
    exit;
}

// 1. Validar que la solicitud sea exclusivamente POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    redirectWithFlash(false, 'Método de solicitud no permitido.', ['request' => 'Solo se admiten envíos POST.']);
}

// 2. Mecanismo Anti-Spam: Honeypot (campo oculto invisible para humanos)
if (!empty($_POST['empresa_hp'])) {
    redirectWithFlash(true, 'Tu solicitud ha sido procesada correctamente.');
}

// 3. Validación de Token CSRF
$csrfToken = $_POST['csrf_token'] ?? null;
if (!validateCsrfToken($csrfToken)) {
    redirectWithFlash(false, 'Sesión expirada o token de seguridad inválido. Por favor recarga la página e intenta de nuevo.', ['csrf' => 'Token CSRF inválido.']);
}

// 4. Captura y Sanitización de los datos recibidos
$nombre  = trim((string)($_POST['nombre'] ?? ''));
$email   = trim((string)($_POST['email'] ?? ''));
$asunto  = trim((string)($_POST['asunto'] ?? ''));
$mensaje = trim((string)($_POST['mensaje'] ?? ''));

// 5. Validación de campos obligatorios
$validationErrors = [];

// Nombre
if (empty($nombre)) {
    $validationErrors['nombre'] = 'El nombre completo es obligatorio.';
} elseif (mb_strlen($nombre) < 3) {
    $validationErrors['nombre'] = 'El nombre debe tener al menos 3 caracteres.';
} elseif (mb_strlen($nombre) > 100) {
    $validationErrors['nombre'] = 'El nombre no puede exceder los 100 caracteres.';
}

// Correo electrónico
if (empty($email)) {
    $validationErrors['email'] = 'El correo electrónico es obligatorio.';
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $validationErrors['email'] = 'Por favor ingresa un correo electrónico válido.';
} elseif (mb_strlen($email) > 120) {
    $validationErrors['email'] = 'El correo no puede exceder los 120 caracteres.';
}

// Asunto
if (empty($asunto)) {
    $validationErrors['asunto'] = 'El asunto del mensaje es obligatorio.';
} elseif (mb_strlen($asunto) < 3) {
    $validationErrors['asunto'] = 'El asunto debe tener al menos 3 caracteres.';
} elseif (mb_strlen($asunto) > 150) {
    $validationErrors['asunto'] = 'El asunto no puede superar los 150 caracteres.';
}

// Mensaje
if (empty($mensaje)) {
    $validationErrors['mensaje'] = 'El mensaje no puede estar vacío.';
} elseif (mb_strlen($mensaje) < 10) {
    $validationErrors['mensaje'] = 'El mensaje debe contener al menos 10 caracteres explicativos.';
} elseif (mb_strlen($mensaje) > 3000) {
    $validationErrors['mensaje'] = 'El mensaje es demasiado extenso (máximo 3,000 caracteres).';
}

if (!empty($validationErrors)) {
    redirectWithFlash(false, 'Por favor corrige los errores indicados en el formulario.', $validationErrors);
}

// 6. Metadatos de seguridad
$ipAddress = $_SERVER['REMOTE_ADDR'] ?? '0.0.0.0';
if (!filter_var($ipAddress, FILTER_VALIDATE_IP)) {
    $ipAddress = '0.0.0.0';
}
$userAgent = mb_substr((string)($_SERVER['HTTP_USER_AGENT'] ?? 'Desconocido'), 0, 255);

// 7. Inserción Segura en la Base de Datos mediante PDO y Prepared Statements
try {
    $pdo = getDBConnection();

    $sql = "INSERT INTO solicitudes (nombre, email, asunto, mensaje, ip_address, user_agent, creado_el) 
            VALUES (:nombre, :email, :asunto, :mensaje, :ip_address, :user_agent, NOW())";

    $stmt = $pdo->prepare($sql);

    $stmt->bindValue(':nombre', $nombre, PDO::PARAM_STR);
    $stmt->bindValue(':email', $email, PDO::PARAM_STR);
    $stmt->bindValue(':asunto', $asunto, PDO::PARAM_STR);
    $stmt->bindValue(':mensaje', $mensaje, PDO::PARAM_STR);
    $stmt->bindValue(':ip_address', $ipAddress, PDO::PARAM_STR);
    $stmt->bindValue(':user_agent', $userAgent, PDO::PARAM_STR);

    $stmt->execute();

    $successMessage = "¡Muchas gracias, {$nombre}! Tu solicitud ha sido registrada correctamente en el sistema. Un asesor se comunicará contigo a la brevedad.";
    redirectWithFlash(true, $successMessage);

} catch (PDOException $e) {
    error_log("Fallo al guardar solicitud en base de datos: " . $e->getMessage());
    redirectWithFlash(false, "Ocurrió un error al procesar tu solicitud con la base de datos. Por favor verifica las credenciales en config/config.php o intenta más tarde.", ['db' => 'Error de conexión o guardado en la base de datos.']);
} catch (Throwable $e) {
    error_log("Error imprevisto en process.php: " . $e->getMessage());
    redirectWithFlash(false, "Error interno del servidor al procesar la solicitud.", []);
}
