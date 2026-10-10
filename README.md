# LS ASESORES - Landing Page de Servicios Contables y Fiscales

Este repositorio contiene el código fuente y el entorno de datos de la **Landing Page** para **LS ASESORES**, desarrollada para la captación de clientes interesados en servicios de contabilidad general, declaraciones de impuestos y asesoría financiera.

---

## 🚀 Características y Estructura

La landing page cumple con la estructura requerida para la conversión de clientes:

- **Header:** Logo oficial de LS ASESORES, navegación y menú responsivo.
- **Hero Section:** Título principal, subtítulo, llamada a la acción y portada (*Hero Shot*) orientada a la asesoría fiscal.
- **Servicios:** Contabilidad general, declaraciones de impuestos y asesoría financiera.
- **Beneficios:** Sección destacada con los valores principales de la firma (Ahorro fiscal, Portal seguro 24/7, Atención personalizada).
- **Formulario con Validación (Call to Action):** Captura de datos del cliente con validaciones en cliente (JS) y servidor (PHP).
- **Entorno de Base de Datos Ficticia (Mock DB):** Guardado automático y simulación de base de datos sin requerir conexiones externas a MySQL/MariaDB.
- **Diseño CSS Simplificado:** Estilos modernos, limpios y optimizados con tipografía fluida y maquetación responsiva sin sobrecarga de código.
- **Mensaje de Confirmación (Reward Message):** Notificación dinámica tras completar el envío del formulario.
- **Footer:** Datos de contacto, ubicación e iconos de redes sociales.

---

## 🛠️ Tecnologías Utilizadas

- **Frontend:** HTML5, CSS3 (simplificado y moderno), JavaScript vanilla.
- **Backend:** PHP 8.2+.
- **Base de Datos:** Entorno ficticio (`MockDatabase` persistido en `database/mock_database.json`) y esquema SQL de referencia (`database/schema.sql`).
- **Contenedores:** Docker & Docker Compose (conservados para desarrollo y despliegue).

---

## 📁 Estructura del Proyecto

```
lsasesores/
├── index.php                 # Landing page (punto de entrada)
├── procesar.php              # Endpoint del formulario (validación + guardado en Mock DB)
├── config/
│   ├── autoload.php          # Autocargador del sistema
│   └── config.php            # Configuración general y constantes de entorno
├── app/
│   ├── libs/
│   │   └── db/
│   │       └── db.php        # Capa de base de datos ficticia (MockDatabase)
│   ├── utilities/
│   │   └── validaciones.php  # Utilidades de validación del servidor
│   └── views/
│       ├── header.php        # Vista de cabecera y navegación
│       └── footer.php        # Vista de pie de página
├── assets/
│   ├── css/estilos.css       # Estilos simplificados y responsive
│   ├── js/validacion.js      # Validación cliente + envío AJAX
│   └── img/                  # Logo y recursos gráficos
├── database/
│   ├── mock_database.json    # Almacenamiento de base de datos ficticia
│   └── schema.sql            # Esquema SQL de referencia
├── docker/
│   └── start-apache.sh       # Script de inicio para Apache en contenedor
├── docker-compose.yml        # Configuración de Docker Compose (web + db + adminer)
├── Dockerfile                # Definición de la imagen del contenedor web
└── .env.example              # Variables de entorno de ejemplo
```

---

## ⚙️ Cómo ejecutar el proyecto

### Opción A — Docker (Recomendado)

Requiere [Docker Desktop](https://www.docker.com/products/docker-desktop/).

```bash
docker compose up -d --build
```

| Servicio  | URL / Puerto                    |
|-----------|---------------------------------|
| Landing   | http://localhost:8080           |
| Adminer   | http://localhost:8081 (opcional)|
| MariaDB   | `localhost:3307` (opcional)     |

Para detener el entorno:

```bash
docker compose down
```

### Opción B — Servidor Local (XAMPP / PHP Built-in Server)

Al no requerir servidor de base de datos MySQL para funcionar, puedes ejecutarlo directamente:

```bash
php -S localhost:8000
```
O copiando la carpeta a tu directorio `htdocs` en XAMPP y abriendo `http://localhost/lsasesores/`.

---

## 🗄️ Entorno de Base de Datos Ficticia

Las solicitudes enviadas desde el formulario de contacto se procesan y almacenan en `database/mock_database.json` a través de la clase `MockDatabase` (`includes/db.php`).

Cada lead registrado contiene:
- `id`: Identificador incremental simulado.
- `nombre`: Nombre del prospecto.
- `email`: Correo electrónico validado.
- `telefono`: Teléfono de contacto.
- `servicio`: Servicio de interés seleccionado.
- `mensaje`: Observaciones o detalles adicionales.
- `ip`: Dirección IP del remitente.
- `fecha_creacion`: Marca de tiempo de registro.

---

## 🔌 Endpoint del Formulario

`POST procesar.php` — recibe los datos del formulario y responde en JSON.

- **Éxito (201):** `{ "ok": true, "mensaje": "...", "id": 4 }`
- **Error de validación (422):** `{ "ok": false, "errores": { "campo": "mensaje" } }`
- **Error de servidor (500):** `{ "ok": false, "mensaje": "..." }`
