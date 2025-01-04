<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased font-sans">
        <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">
            <div class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
                <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                    <header class="grid grid-cols-2 items-center gap-2 py-10 lg:grid-cols-3">
                        <div class="flex lg:justify-center lg:col-start-2">
                            <img src="{{ asset('imagenes-guardar/logoBIZ.jpg') }}" alt="Logo" width="100">
                        </div>

                        @if (Route::has('login'))
                            <livewire:welcome.navigation />
                        @endif
                    </header>

                    <main class="mt-6">

                            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-center">
                                {{ __('Bienvenido a la evaluacion FactoriaBIZ') }}
                            </h2>
                            <div class="py-12">
                                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg text-center">
                                        <div class="p-6 text-gray-900 dark:text-gray-100">
                                            {{ __("Desarrollador: Joshua Sangareau Quesada") }}
                                            @auth

                                            @else
                                                <br>Si quieres acceder con un usuario administrador, por favor accede con usuario:<br> josh@hotmail.com <br> contraseña: hola1234<br>Si deseas acceder con un usuario no administrador, crea uno desde el panel registrarse o accede con:<br>
                                                test@hotmail.com <br> contraseña: password1234
                                            @endauth

                                        </div>
                                        <div class="text-center">
                                            <img
                                                src="{{ asset('imagenes-guardar/logo.jpg') }}"
                                                width="350"
                                                class="d-block mx-auto"
                                                alt="imagen factoriaBiz"

                                            />
                                        </div>

                                    </div>

                                </div>
                            </div>

                    </main>

                </div>
            </div>
        </div>
    </body>
</html>
