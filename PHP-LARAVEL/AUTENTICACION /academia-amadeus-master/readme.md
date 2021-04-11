## Sistema de control academico Amadeus

Es una aplicacion hecha en laravel 5.4 usando los compoenentes de la plantilla Gentelella.

### Theme Demo
![Gentelella Bootstrap Admin Template](https://cdn.colorlib.com/wp/wp-content/uploads/sites/2/gentelella-admin-template-preview.jpg "Gentelella Theme Browser Preview")

**[Template Demo](https://colorlib.com/polygon/gentelella/index.html)**

## Laravel 5.4

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. Laravel attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as authentication, routing, sessions, queueing, and caching.

Laravel is accessible, yet powerful, providing tools needed for large, robust applications. A superb inversion of control container, expressive migration system, and tightly integrated unit testing support give you the tools you need to build any application with which you are tasked.

# Installation

## Descargar e instalar git.

## Descargar el repositorio: desde la linea de comandos ejecutar

```
git clone https://github.com/EarzS/academia-amadeus.git
cd academia-amadeus
```

## Descargar e instalar composer.
 - https://getcomposer.org/download/

## Instalar los paquetes del repositorio: desde la linea de comandos ejecutar

```
composer install (dentro del directorio raiz del repositorio).
copy .env.example .env
```

## Descargar e instalar nodejs.
 - https://nodejs.org/es/download/

## Instalar las dependencias del repositorio: desde la linea de comandos ejecutar

```
npm install (dentro del directorio raiz del proyecto, puede tomar un rato)
```

## Terminar de instalar vistas y demas: desde la linea de comandos ejecutar

```
bower install
gulp
```

## Configurar la base de datos
 - Desde MySQL, crear una base de datos con el nombre de "academia_amadeus"
 - Configurar la clave del usuario root a vacio
  - Usuario: root
  - Clave: ""

## Crear la base de datos, desde la linea de comandos ejecutar:

```
php artisan migrate (dentro del directorio raiz del repositorio).
```

## Correr la aplicacion, desde la linea de comandos ejecutar:

```
php artisan serve (dentro del directorio raiz del repositorio).
```