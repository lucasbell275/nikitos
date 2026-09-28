Esta es la pagina web de Nikitos.
Requerimientos: XAMPP (para usarlo con Apache y mySQL), Editor de codigo fuente (Yo en mi caso uso VSC), Composer, PHP 8.2 (minimo), Node.JS, NPM. 

Una vez que se descarga todos los requerimientos, en el xampp en el config de Apache vamos al php.ini, buscamos la extension zip y la descomentamos (sacamos el ; del inicio para descomentarla)
Para usar este proyecto, tenes que descargar el respectivo repositorio, o clonarlo usando "git clone https://github.com/lucasbell275/nikitos.git" (o el link que aparezca al hacer click en code, clone y https) .
Una vez descargado y extraido en una carpeta, abrimos el editor de codigo y su respectiva terminal. Nos aseguramos de que la terminal este posicionada en nuestro proyecto.

Configurar el .env con los datos que quieras. (copiandolo previamente desde env.example, principalmente descomentar todo lo relacionado con la database, y, por ejemplo, poner mysql en db_connection)

Ejecutar
Php artisan key:generate
Vincular public con storage
Php artisan storage:link

Instalar dependencias JS
npm install
npm run build

Instalar las dependencias de PHP ejecutando composer install en la terminal.



Antes de arrancar el servidor local y tratar de visualizar el proyecto, es importante correr las respectivas migraciones con sus seeders y tambien haber vinculado el public con la carpeta storage. Para hacer esto, se usa php artisan migrate:fresh --seed
Cuando se corre los seeders, se proveen imagenes desde el storage.
Para levantar el servidor local, pones en la terminal de tu editor de codigo el comando "php artisan serve"

Para acceder admin se usa /login/admin. Usuario: lucas@gmail.com contraseña: lucas123
Para acceder a la vista de zona privada usuario: cliente contraseña cliente123