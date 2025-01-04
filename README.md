Hola, este es un repositorio para la evaluación de preselección para FactoriaBIZ.

A continuación se describe la estructura TALL del proyecto, asi como el flujo de trabajo y como poder descargar y probar el proyecto.

Desarrollador: Joshua Sangareau Quesada.

Explición de la organización de carpetas de mi proyecto.



🗂️ 1. Carpetas principales.

1.1. app/ ⚙️

Es el corazón del backend en Laravel, donde se encuentra toda la lógica de la aplicación.

Http/Controllers/: Aquí están los controladores con los métodos usados en las interacciones.

Http/Requests/: Aquí están los "filtros" añadidos a las peticiones recibidas por las vistas.

Livewire/: Aquí están los componentes Livewire, que gestionan la interacción entre el frontend y el backend. (apenas se ha usado por falta de tiempo).

Models/: Contiene los modelos Eloquent que representan las tablas de la base de datos de la aplicación.

Providers/: Configuración de servicios adicionales, como Livewire o Tailwind.

1.2. resources/ 🎨

Aquí se encuentran todos los archivos que corresponden al frontend de la aplicación.

css/: Archivos de estilos, con Tailwind CSS como el principal framework utilizado.

js/: Archivos JavaScript, donde reside la lógica para Alpine.js y otros scripts personalizados.

views/: Las vistas Blade que renderizan la UI (User Inteface) de la aplicación.

livewire/: Vistas para componentes específicos de Livewire.

layouts/: Plantillas base de la aplicación (por ejemplo, la estructura común, app.blade.php).

components/: Componentes reutilizables de Blade que pueden ser utilizados en diversas vistas.

Las vistas necesarias para cada componente se han creado en carpetas con sus respectivos nombres (ejemplo productos/index.blade.php)

1.3. public/ 🌐

El punto de entrada de la aplicación, donde se encuentran los archivos accesibles públicamente:

index.php: El archivo que Laravel usa para iniciar la aplicación.

Archivos compilados de CSS y JS, procesados por herramientas como Vite o Webpack.

Imágenes y otros assets estáticos.

Se han añadido 2 carpetas para las imagenes, las guardadas por los usuarios y las predefinidas para el uso del seeder.

1.4. routes/ 🌍

Define todas las rutas de la aplicación:

web.php: Contiene las rutas generales de la aplicación, generalmente las vistas de Livewire.

api.php: Rutas destinadas a las APIs de la aplicación, como endpoints JSON.

1.5. config/ ⚙️

Archivos de configuración que personalizan el comportamiento de la aplicación:

El usado en mi caso es el filestsyem.php para configurar la donde se guardan las nuevas imagenes introducidas al crear productos.

Tambíen se ha usado para crear el vinculo (link) entre las carpetas de public/imagenes-guardar y storage/app/public/imagenes



2. Explicación del flujo de trabajo de mi proyecto:

2.1 Planificación y Diseño 📋

Lo primero fue la definición del diagrama de la BBDD, para definir como se relacionan entre sí las tablas.

Después definir las funcionalidades clave que debía tener el proyecto, como la visualización de productos con y sin filtrado por categoría y gestión de usuarios y clientes.

2.2 Configuración del Proyecto ⚙️

Inicialicé un nuevo proyecto Laravel.

Instalé y configuré Livewire, Tailwind CSS y Alpine.js. Esta parte es fundamental para habilitar la comunicación eficiente entre el frontend y el backend.

2.3 Desarrollo de la Lógica de Backend 🖥️

Creé los Modelos Eloquent para interactuar con la base de datos.

Implementé las rutas en web.php para manejar las solicitudes del usuario.

Desarrollé los crontroladores y peticiones 

2.4 Desarrollo de la Interfaz de Usuario 🎨

Añadí interactividad en el frontend utilizando los componenetes instalados con livewire y breeze.
Aproveché los componentes Blade para reutilizar estructuras y simplificar la gestión del diseño.

2.5 Pruebas y Depuración 🔍

Realicé pruebas en el frontend y backend para asegurarme de que todo funcionara como esperaba, que los CRUDs solicitados funcionen correctamente.



3. Detallando los pasos necesarios para instalar y probar el proyecto.

Lo primero es tener un entorno XAMPP, WAMPP o una plataforma de desarrollo como puede ser HERP (como es mi caso), instalado para poder ejecutar el proyecto.

Tambien se requiere tener instalado Composer, Node y NPM 

En mi caso explicaré como probarlo con HERP.

Pasos a seguir.

1º Descargar el repositorio de GitHub de este proyecto en una carpeta en tu ordenador.

2º Realizar el archivo ".env". Se puede usar como base el archivo ".env.example". En este archivo están definidas las variables de entorno como:
Configuración de la base de datos 🛠️
Configuración del entorno de la aplicación 🌍
Claves y tokens 🔑
Configuración del servidor de correo 📧
Configuración de servicios externos 🌐
En nuestro caso solo con configurar las variables de la base de datos debería bastar. Puedes replicar la BBDD de datos que yo he usado o cambiarla y configurarla como tú quieras, sientete libre de hacerlo.
En una consola dentro del proyecto usa:
copy .env.example .env en Windows para generar el archivo .env a partir del .env.example y poder modificarlo.
composer install para instalar las dependencias necesarias para el proyecto.
Tras configurarlo a tu gusto usa: php artisan key:generate para la generación de la clave única que se guarda en el archivo ".env".

3º En este paso se van a realizar las migraciones y se va a poblar con datos aleatorios la BBDD. En una consola dentro del proyecto usa:
php artisan migrate:fresh --seed   con migrate:fresh se elimina todo lo que pudiera haber en la BBDD y se genera toda la estructura de tablas definidas en la migración y con --seed se lanza también el seeder para poblar la BBDD.
Tambien se puede hacer en 2 pasos (solo cuando nunca se haya realizado ninguna migración a la BBDD). En una consola dentro del proyecto usa:
php artisan migrate 
php artisan db:seed

4º Tras esto, instalaremos las dependencias de la carpeta node_modules usa:
npm install y espera que se decarguen todos los paquetes. Esto prepara el entorno instalando todas las dependencias necesarias.
npm run build Esto compila y optimiza los archivos CSS y JavaScript del proyecto. 
npm run dev 

5º Como último paso será abrir el proyecto con Laravel Herd. (Si estás usando un entorno XAMPP usa php artisan serve para ejecutar el proyecto en local)
Abre Herd como administrador (IMPORTANTE para evitar problemas con los permisos), en el panel principal, en la parte derecha, haz click Open Sites. Tras esto en la parte izquierda arriba haz click en add, elige link existing project y navega hasta la carpeta donde tengas el proyecto (IMPORTANTE debe ser la carpeta que contiene el proyecto).
Tras esto marca la opcion de Https. y haz click en next.
Una vez hecho todo, puedes ir al navegador y poner el nombre de la carpeta .test y ver el proyecto en ejecución. (ejemplo si la carpeta se llama evaluacion-factoriabiz, en el navegador escribe evaluacion-factoriabiz.test)

¡Listo, ya puedes probar el proyecto!

Espero que te guste. 

¡Un saludo!

PD: No se ha podido implementar el uso de alguna interacción básica de Livewire (por ejemplo, un formulario con actualización en tiempo real), debido a la falta de tiempo para hacer el curso en el cual se explica como hacerlo. Dicho esto, procedo a la realización de dichos cursos para así seguir con el aprendizaje, habiendo asentado toda la parte anterior del uso de PHP y Laravel básico.  
