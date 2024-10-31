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

   git clone https://github.com/mauriciojrmv/agricultorapp.git

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

DB_DATABASE=agricultorapp

DB_USERNAME=root

DB_PASSWORD=

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


## Estructura de las solicitudes

### 1. Agricultores

GET /api/agricultores: Listar todos los agricultores.

POST /api/agricultores: Crear un nuevo agricultor.

**Cuerpo de la Solicitud:** 

{ "nombre": "Nombre", "apellido": "Apellido", "email": "email@example.com", "telefono": "123456789", "informacion_bancaria": "Información bancaria", "nit": "NIT123456", "carnet": "Carnet123", "licencia_funcionamiento": "Licencia123", "estado": "Activo", "direccion": "Dirección del agricultor" }

### 2. Categorías

GET /api/categorias: Listar todas las categorías.

POST /api/categorias: Crear una nueva categoría.

**Cuerpo de la Solicitud:** 

{ "nombre": "Nombre de la categoría" }

### 3. Clientes

GET /api/clientes: Listar todos los clientes.

POST /api/clientes: Crear un nuevo cliente.

**Cuerpo de la Solicitud:**

{ "nombre": "Nombre", "apellido": "Apellido", "email": "email@example.com", "telefono": "123456789", "password": "tu_contraseña", "direccion": "Dirección del cliente", "ubicacion_latitud": "0.000000", "ubicacion_longitud": "0.000000" }

### 4. Productos

GET /api/productos: Listar todos los productos.

POST /api/productos: Crear un nuevo producto.

**Cuerpo de la Solicitud:** 

{ "nombre": "Nombre del producto", "descripcion": "Descripción del producto", "id_categoria": 1 }

### 5. Producciones

GET /api/producciones: Listar todas las producciones.

POST /api/producciones: Crear una nueva producción.

**Cuerpo de la Solicitud:**

{ "id_terreno": 1, "id_temporada": 1, "id_producto": 1, "cantidad_disponible": 100, "fecha_recoleccion": "2024-12-01" }

### 6. Pedidos

GET /api/pedidos: Listar todos los pedidos.

POST /api/pedidos: Crear un nuevo pedido.

**Cuerpo de la Solicitud:** 

{ "id_cliente": 1, "estado": "Pendiente", "fecha_entrega": "2024-12-02" }

### 7. Detalles de Pedido

GET /api/pedido-detalles: Listar todos los detalles de pedidos.

POST /api/pedido-detalles: Crear un nuevo detalle de pedido.

**Cuerpo de la Solicitud:**

{ "id_pedido": 1, "id_producto": 1, "cantidad": 2, "precio_unitario": 10.00 }

### 8. Oferta

GET /api/ofertas: Listar todas las ofertas.

POST /api/ofertas: Crear una nueva oferta.

**Cuerpo de la Solicitud:**

{
    "id_produccion": 1,      // ID de una producción válida
    "id_agricultor": 1,      // ID de un agricultor válido
    "precio_oferta": 150.0,  // Precio total de la oferta
    "cantidad_oferta": 50    // Cantidad ofrecida en esta oferta
}

