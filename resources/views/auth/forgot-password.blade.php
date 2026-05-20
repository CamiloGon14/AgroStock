<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Agrostock | Recuperar Contraseña</title>

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
            
            <h2 class="text-2xl font-bold text-center text-gray-900 mb-2">Recuperar Contraseña</h2>
            
            <div class="mb-6 text-sm text-gray-600 text-center leading-relaxed">
                ¿Olvidó su contraseña? No hay problema. Simplemente indíquenos su dirección de correo electrónico y le enviaremos un enlace de restablecimiento que le permitirá elegir una nueva.
            </div>

            <x-auth-session-status class="mb-4 text-sm font-medium text-green-600 text-center" :status="session('status')" />

            <form method="POST" action="{{ route('password.email') }}" class="space-y-5">
                @csrf

                <div>
                    <label for="email" class="block font-bold text-sm text-gray-700 mb-1">Correo Electrónico</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus 
                           class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-amarillo-fuerte focus:border-transparent transition-all" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-sm text-red-600" />
                </div>

                <div class="pt-2">
                    <button type="submit" class="w-full py-3 bg-amarillo-fuerte hover:bg-amarillo-oscuro text-gray-900 font-bold rounded-lg shadow-sm transition-all transform hover:-translate-y-0.5">
                        Enviar enlace de recuperación
                    </button>
                </div>
                
                <div class="text-center mt-6 pt-6 border-t border-gray-100">
                    <a href="{{ route('login') }}" class="text-sm font-bold text-gray-600 hover:text-gray-900 hover:underline transition-colors">
                        Volver al inicio de sesión
                    </a>
                </div>
            </form>

        </div>
    </div>
</body>
</html>