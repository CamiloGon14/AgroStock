<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Agrostock | Restablecer Contraseña</title>

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

    <div class="flex-1 flex flex-col justify-center items-center pt-6 sm:pt-0 px-4">
        <div class="w-full sm:max-w-md px-8 py-10 bg-white shadow-lg overflow-hidden sm:rounded-xl border border-gray-100">
            
            <h2 class="text-2xl font-bold text-center text-gray-900 mb-2">Restablecer Contraseña</h2>
            <p class="text-sm text-center text-gray-500 mb-8">Por favor, ingrese y confirme su nueva contraseña.</p>

            <form method="POST" action="{{ route('password.store') }}" class="space-y-5">
                @csrf

                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <div>
                    <label for="email" class="block font-bold text-sm text-gray-700 mb-1">Correo Electrónico</label>
                    <input id="email" type="email" name="email" value="{{ old('email', $request->email) }}" required autofocus autocomplete="username" 
                           class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-amarillo-fuerte focus:border-transparent transition-all" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-sm text-red-600" />
                </div>

                <div>
                    <label for="password" class="block font-bold text-sm text-gray-700 mb-1">Nueva Contraseña</label>
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

                <div class="pt-2">
                    <button type="submit" class="w-full py-3 bg-amarillo-fuerte hover:bg-amarillo-oscuro text-gray-900 font-bold rounded-lg shadow-sm transition-all transform hover:-translate-y-0.5">
                        Restablecer Contraseña
                    </button>
                </div>
            </form>

        </div>
    </div>
</body>
</html>