# Agricultor App API

Este es un proyecto de API REST para la gestión de agricultores, productos, ofertas, pedidos y más. La API está construida utilizando Laravel.

## Requisitos Previos

Asegúrate de tener instalados los siguientes programas:

- [PHP](https://www.php.net/downloads) (versión 8.0 o superior)
- [Composer](https://getcomposer.org/download/)
- [MySQL](https://dev.mysql.com/downloads/mysql/) o [MariaDB](https://mariadb.org/download/)
- [Laravel](https://laravel.com/docs/9.x/installation) (opcional, para el entorno de desarrollo)
- [Postman](https://www.postman.com/downloads/) (para realizar pruebas de la API)

## Instalación

1. **Clona el repositorio:**

   git clone https://github.com/tu_usuario/agricultorapp-api.git

2. **Accede a la carpeta del proyecto:**

cd agricultorapp-api

3. **Instala las dependencias de PHP utilizando Composer:**

composer install

4. **Copia el archivo de entorno:**

cp .env.example .env

5. **Genera la clave de la aplicación:**

php artisan key:generate

6. **Configura la base de datos:**

Abre el archivo .env y configura los siguientes parámetros según tu entorno de base de datos:

DB_CONNECTION=mysql

DB_HOST=127.0.0.1

DB_PORT=3306

DB_DATABASE=nombre_de_tu_base_de_datos

DB_USERNAME=tu_usuario

DB_PASSWORD=tu_contraseña

7. **Ejecuta las migraciones para crear las tablas:**

php artisan migrate

8. **(Opcional) Si deseas cargar datos de prueba, puedes ejecutar:**

php artisan db:seed

9. **Inicia el servidor de desarrollo de Laravel:**

php artisan serve

El servidor estará disponible en **http://127.0.0.1:8000.**

## Uso de la API

Puedes probar la API utilizando Postman o cualquier otra herramienta de cliente HTTP. A continuación se presentan algunos ejemplos de endpoints que puedes probar:

**Crear un agricultor:**

POST /api/agricultores

**Listar todos los agricultores:**

GET /api/agricultores

**Crear una categoría:**

POST /api/categorias

**Listar todas las categorías:**

GET /api/categorias

**Crear un cliente:**

POST /api/clientes

**Listar todos los clientes:**

GET /api/clientes

**Crear un pedido:**

POST /api/pedidos

**Listar todos los pedidos:**

GET /api/pedidos
