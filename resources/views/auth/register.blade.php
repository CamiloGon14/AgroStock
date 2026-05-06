<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Agrostock | Registrarse</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700,800,900" rel="stylesheet" />

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        amarillo: {
                            fuerte: '#FFC107',
                            oscuro: '#F59E0B',
                        }
                    },
                    fontFamily: {
                        sans: ['Instrument Sans', 'sans-serif'],
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gray-50 text-gray-800 font-sans antialiased flex flex-col min-h-screen">

    <nav class="w-full bg-white border-b border-gray-100 py-4 px-8 flex justify-center items-center shadow-sm">
        <a href="/" class="text-2xl font-black tracking-tighter text-gray-900">
            AGROSTOCK
        </a>
    </nav>

    <div class="flex-1 flex flex-col justify-center items-center pt-8 pb-12 px-4">
        <div class="w-full sm:max-w-md px-8 py-10 bg-white shadow-lg overflow-hidden sm:rounded-xl border border-gray-100">
            
            <h2 class="text-2xl font-bold text-center text-gray-900 mb-2">Crear Cuenta Nueva</h2>
            <p class="text-sm text-center text-gray-500 mb-8">Únase al sistema de gestión de inventarios.</p>

            <form method="POST" action="{{ route('register') }}" class="space-y-4">
                @csrf

                <div>
                    <label for="name" class="block font-bold text-sm text-gray-700 mb-1">Nombre Completo</label>
                    <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name" 
                           class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-amarillo-fuerte focus:border-transparent transition-all" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2 text-sm text-red-600" />
                </div>

                <div>
                    <label for="email" class="block font-bold text-sm text-gray-700 mb-1">Correo Electrónico</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="username" 
                           class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-amarillo-fuerte focus:border-transparent transition-all" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-sm text-red-600" />
                </div>

                <div>
                    <label for="password" class="block font-bold text-sm text-gray-700 mb-1">Contraseña</label>
                    <input id="password" type="password" name="password" required autocomplete="new-password" 
                           class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-amarillo-fuerte focus:border-transparent transition-all" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-sm text-red-600" />
                </div>

                <div>
                    <label for="password_confirmation" class="block font-bold text-sm text-gray-700 mb-1">Confirmar Contraseña</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" 
                           class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-amarillo-fuerte focus:border-transparent transition-all" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-sm text-red-600" />
                </div>

                <div class="flex items-center justify-between mt-8">
                    <a class="underline underline-offset-4 text-sm font-medium text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-amarillo-fuerte transition-colors" href="{{ route('login') }}">
                        ¿Ya está registrado?
                    </a>

                    <button type="submit" class="ms-4 inline-flex items-center px-6 py-3 bg-amarillo-fuerte border border-transparent rounded-md font-bold text-gray-900 uppercase tracking-widest hover:bg-amarillo-oscuro focus:bg-amarillo-oscuro active:bg-amarillo-oscuro focus:outline-none focus:ring-2 focus:ring-amarillo-fuerte focus:ring-offset-2 transition ease-in-out duration-150 shadow-sm transform hover:-translate-y-0.5">
                        Registrarse
                    </button>
                </div>
            </form>

        </div>
    </div>
</body>
</html>