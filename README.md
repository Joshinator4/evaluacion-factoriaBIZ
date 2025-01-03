🗂️ Carpetas principales

1.1. app/ ⚙️
Es el corazón del backend en Laravel, donde se encuentra toda la lógica de la aplicación.
Http/Controllers/: Aquí están los controladores con los métodos usados en las interacciones.
Http/Requests/: Aquí están los "filtros" añadidos a las peticiones recibidas por las vistas.
Http/Livewire/: Aquí están los componentes Livewire, que gestionan la interacción entre el frontend y el backend. (apenas se ha usado por falta de tiempo)
Models/: Contiene los modelos Eloquent que representan las tablas de la base de datos de la aplicación.
Providers/: Configuración de servicios adicionales, como Livewire o Tailwind.

1.2. resources/ 🎨
Aquí se encuentran todos los archivos que corresponden al frontend de la aplicación.
css/: Archivos de estilos, con Tailwind CSS como el principal framework utilizado.
js/: Archivos JavaScript, donde reside la lógica para Alpine.js y otros scripts personalizados.
views/: Las vistas Blade que renderizan la UI de la aplicación.
livewire/: Vistas para componentes específicos de Livewire.
layouts/: Plantillas base de la aplicación (por ejemplo, la estructura común).
components/: Componentes reutilizables de Blade que pueden ser utilizados en diversas vistas.

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

livewire.php: Configuración relacionada con los componentes Livewire.
view.php: Configuración de las vistas Blade.
tailwind.php: Si estás utilizando algún paquete adicional para Tailwind CSS, se encuentra aquí.

1.6. tests/ 🔬
Aquí se pueden agregar todas las pruebas de la aplicación, ya sean unitarias o de características:
Feature/: Pruebas que verifican la funcionalidad general de la aplicación.
Unit/: Pruebas más específicas para lógica de componentes o modelos.

