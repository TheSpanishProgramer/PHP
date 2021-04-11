# XAMPP directory 
/opt/lampp

# Iniciar servidor xammp
sudo /opt/lampp/lampp start

# stop mysql
sudo /etc/init.d/mysql stop
sudo /etc/init.d/mysqld stop

# Ver puertos usados
netstat -putona | grep numero-de-puerto

sudo lsof -i -P -n | grep LISTEN

## ******************************************
## migraciones
## ******************************************

# crear la tabla de migraciones 
php artisan migrate:install

# crear una nueva migración se utiliza el comando de Artisan
# make:migration <nombre fichero a crear, nombre tabla>:
# create_movies_table para la tabla movies.
php artisan make:migration create_movies_table --create=movies

# aplicar las migraciones
php artisan migrate

# crear un modelo 
php artisan make:model Movie

# Llenar los datos semilla
php artisan db:seed Users
php artisan db:seed

# Crear cosas de users
# generar las rutas yvistas necesarias para realizar el login,
# registro y para recuperar la contraseña
composer require laravel/ui
php artisan ui vue --auth
php artisan migrate

php artisan make:auth

php artisan make:auth


# esta si
composer require laravel/ui 
php artisan ui vue --auth


## Borradores
foreach ($movies as $movie) 
{ 
    echo $movie->title; 
 	echo '<br>';
}

echo 'ESTATICO <br>';
foreach ($this->arrayPeliculas as $key => $movie)
{ 
    echo $movie['title']; 
    echo '<br>';
}

// array('arrayPeliculas' => $this->arrayPeliculas));




=======
# Run server
php artisan serve

# install migration
php artisan migrate:install -v
# crear fichero migrate
php artisan make:migration create_movies_table --create=movies
# Si queremos deshacer los ultimos cambios
php artisan migrate:rollback
# O si queremos deshacer todas las migraciones
php artisan migrate:reset
# el cual deshará todos los cambios y volver a aplicar las migraciones:
php artisan migrate:refresh

php artisan migrate:status

# Crear fichero semilla
php artisan make:seeder MoviesTableSeeder
php artisan make:seeder UsersTableSeeder

php artisan db:seed
>>>>>>> a35e50fa998694435d7150d861488705e33a0dd5


class UserController extends Controller{
    public function store(Request $request){
        $name = $request->input('nombre');//...    
    }
}


# #############################################################################
# PAQUETES REST Y CURL
# #############################################################################

# Instalar un paquete de terceros
sudo composer require <nombre-del-paquete-a-instalar>

# O editar el fichero composer.json de la raíz de nuestro proyecto, 
# añadir el paquete en su
# sección " require ", y por último ejecutar el comando:
sudo composer update

# Lista de paquetes disponibles
https://packagist.org/

# Una vez añadido el paquete tendremos que modificar también el fichero 
# de configuración config/app.php , en su sección providers y aliases