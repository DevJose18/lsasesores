# LS ASESORES - Arquitectura Modular MVC (Bootstrap 5 & PHP / MySQL)

Landing page corporativa moderna y minimalista desarrollada con **Bootstrap 5**, **PHP con PDO / MySQL** y una arquitectura modular organizada en vistas y componentes (`views/sections/`).

---

## 📁 Estructura del Proyecto

```text
lsasesores/
│
├── .htaccess                   # Reglas de reescritura para el enrutador Front Controller
├── index.php                   # Enrutador principal (despacha vistas modularmente)
├── index.html                  # Versión estática sincronizada para previsualización directa
├── process.php                 # Procesamiento seguro de formulario (CSRF, sanitización y MySQL)
├── database.sql                # Script para la base de datos y la tabla `solicitudes`
│
├── config/
│   ├── config.php              # Parámetros de conexión a MySQL, sesión y helpers CSRF
│   └── autoload.php            # Registro de autocarga de clases
│
├── Libs/
│   └── DB/
│       └── dbpdo.php           # Clase DBPDO para conexión y consultas preparadas
│
├── assets/
│   └── css/
│       └── style.css           # Estilos personalizados (:root amarillo #ffd72d y border-radius)
│
└── views/
    └── sections/
        ├── index.php           # Contenido principal: Hero, Logos, Servicios, 2 Columnas y Formulario
        ├── 404.html            # Plantilla para páginas no encontradas
        └── general/
            ├── top.php         # Encabezado HTML, fuentes, Bootstrap y CSS
            ├── header.php      # Contenedor con logotipo centrado
            └── bottom.php      # Pie de página, redes sociales, copyright y cierre
```

---

## 🚀 Guía de Instalación y Configuración

### 1. Importar la Base de Datos

Ejecuta el archivo [`database.sql`](./database.sql) en **phpMyAdmin**, **MySQL Workbench** o desde tu terminal MySQL:
```sql
CREATE DATABASE IF NOT EXISTS `lsasesores_db` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `lsasesores_db`;
-- Crea la tabla 'solicitudes'
```

### 2. Configurar `config/config.php`

Abre [`config/config.php`](./config/config.php) y coloca las credenciales de tu base de datos:

```php
define('DB_HOST', 'localhost');          // Servidor de base de datos
define('DB_NAME', 'lsasesores_db');       // Nombre de la base de datos
define('DB_USER', 'tu_usuario');          // Usuario de MySQL
define('DB_PASS', 'tu_contraseña');       // Contraseña de MySQL
define('DB_PORT', '3306');
```

### 3. Despliegue

- **En XAMPP / WAMP / Laragon**: Ubica la carpeta `lsasesores` dentro de `htdocs` o `www` y visita `http://localhost/lsasesores/`.
- **En Hosting (cPanel / Plesk)**: Sube todos los archivos a `public_html`.
- **En PHP CLI**:
  ```bash
  php -S localhost:8000
  ```
