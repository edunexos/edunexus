EduNexus

EduNexus es una plataforma educativa desarrollada con Laravel, Vue.js y con la posibilidad de tener juego más elaborados externos realizados en react.js, que incluye funcionalidades como gestión de usuarios, calendario, y juegos educativos.


Prerrequisitos
Antes de empezar, asegúrarse de tener instalados los siguientes componentes en el sistema:

Node.js (versión mínima 14)
Composer
PHP (versión mínima 8.1)

Apache y MariaDB configurados localmente. Recomendamos usar Laragon para simplificar la instalación.

Configuración con Laragon
Laragon es una herramienta que facilita la configuración de un entorno de desarrollo local con Apache y MariaDB.

Descargar e instalar Laragon:

Ir al sitio web uficial de Laragon y descargar e instalar la versión adecuada para el sistema operativo que se quiere utilizar. 

Iniciar Laragon:

Abrir Laragon y asegúrate de que los servicios de Apache y MariaDB estén en ejecución y en la versión correcta.


Configurar tu proyecto en Laragon:

Colocar el proyecto en el directorio C:\laragon\www\ y hacer click en la interfaz de la aplicación Start All
Laragon automáticamente configurará un host virtual para el proyecto.



**** Instalación ****

Clonar el repositorio:

git clone https://github.com/edunexos/edunexus.git
cd edunexus


Instalar las dependencias de PHP:

composer install


Instalar las dependencias de Node.js:

npm install


**** Configurar el archivo de entorno: ****

Copiar el archivo .env.example a .env y configurar las variables de entorno, especialmente las relacionadas con la base de datos.

cp .env.example .env


Generar la clave de la aplicación:

php artisan key:generate


**** Migrar y siembrar con los registros la base de datos: ****

Este comando migrará y sembrará la base de datos con datos de prueba.

php artisan migrate:fresh --seed


**** Crear un enlace simbólico para el almacenamiento: ****

Este comando creará un enlace simbólico para que los archivos de almacenamiento sean accesibles públicamente.

php artisan storage:link


**** Configuración Adicional ****

Instalar Wire Elements Modal:

Este paquete puede ser necesario para la funcionalidad de los modales.

composer require wire-elements/modal


Instalar Livewire Tables:

Este paquete es útil para crear tablas interactivas con Livewire.

composer require ramonrietdijk/livewire-tables


**** Compilación entornos ****

Compilar los entornos de desarrollo de JavaScript:

npm run dev
npm run build (producción)


**** Ejecución del Servidor ****
Iniciar el servidor de desarrollo de Laravel:

php artisan serve


Para acceder a la aplicación:

Con artesan: Abrir el navegador y navegar a http://localhost:8000 para ver la aplicación en funcionamiento.

Con Laragan o servidor local o en la nube: Abrir un navegador y navegar a http://localhost/edunexus para ver la aplicación en funcionamiento.


**** Estructura del Proyecto: ****

resources/views: Contiene las vistas Blade de Laravel.
resources/js/components: Contiene los componentes Vue.js.
public: Contiene los archivos públicos como imágenes, CSS y JS compilados.
database: Contiene las migraciones y semillas de la base de datos.
app: Contiene los controladores, modelos y otros archivos de la lógica de la aplicación.

Test users:

admin@edunexus => admin123

robertomanca@edunexus => 12345678

student@edunexus => student123


Licencia: proyecto licenciado bajo la Licencia BY-NC-ND Reconocimiento-NoComercial-SinObraDerivada 3.0 . 
