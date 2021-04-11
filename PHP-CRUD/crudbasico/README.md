## Web-WP-Project
Pagina realizada con Laravel 5.4, Infyom para la generación del crud basico

Tener instalado php y composer en tu ordenador, para evitar tiempo de configuración del php puedes descargarte el xampp
que te genera el php [Xampp](https://www.apachefriends.org/es/index.html).

Para el composer depende del php [Composer](https://getcomposer.org/) 

IDE recomendado: **PHPStorm**

### Installation
* git clone https://github.com/ZalloB/laravel-infyom.git
* `cd web-wp`
* `composer install` - para descargar las dependencias // composer update 
* `php artisan serve` - para iniciarlo en local

### Infyom - generator
Se ha usado infyom para generar controllers, request, repository 
[infyom](http://labs.infyom.com/laravelgenerator/docs/5.4/generator-options#generate-from-table)

### Comandos utiles
* `php artisan cache:clear`
* `php artisan view:clear`
* `php artisan optimize `

### Deploy 
* quitar log AppServiceProvider
* ocultar debug bar
* cambiar el env a produccion

Revisar [deploy](https://medium.com/laravel-news/the-simple-guide-to-deploy-laravel-5-application-on-shared-hosting-1a8d0aee923e)


![cat](http://www.iconninja.com/files/354/430/444/development-programmers-programming-kitty-git-hub-cat-github-icon.png )