# pizzeria
proyecto de clase
Instala dependencias:

composer install
npm install

Configura tu base de datos en el archivo .env
Ejecuta migraciones y seeders:

php artisan migrate:fresh --seed

Crea el enlace simbólico para imágenes:

php artisan storage:link

Inicia el servidor local:

php artisan serve

Accede a la aplicación: http://localhost:8000
