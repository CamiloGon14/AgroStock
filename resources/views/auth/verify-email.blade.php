<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Agrostock | Verificar Correo</title>

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
            
            <h2 class="text-2xl font-bold text-center text-gray-900 mb-2">Verificar Correo Electrónico</h2>
            
            <div class="mb-6 text-sm text-gray-600 text-center leading-relaxed">
                ¡Gracias por registrarse! Antes de comenzar, ¿podría verificar su dirección de correo electrónico haciendo clic en el enlace que le acabamos de enviar? Si no recibió el correo, con gusto le enviaremos otro.
            </div>

            @if (session('status') == 'verification-link-sent')
                <div class="mb-6 font-medium text-sm text-green-700 text-center p-3 bg-green-50 rounded-lg border border-green-200">
                    Se ha enviado un nuevo enlace de verificación a la dirección de correo electrónico que proporcionó durante el registro.
                </div>
            @endif

            <div class="mt-4 flex flex-col space-y-4 sm:flex-row sm:space-y-0 sm:items-center sm:justify-between">
                
                <form method="POST" action="{{ route('verification.send') }}" class="w-full sm:w-auto">
                    @csrf
                    <button type="submit" class="w-full sm:w-auto px-6 py-3 bg-amarillo-fuerte hover:bg-amarillo-oscuro text-gray-900 font-bold rounded-lg shadow-sm transition-all transform hover:-translate-y-0.5 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-amarillo-fuerte">
                        Reenviar correo
                    </button>
                </form>

                <form method="POST" action="{{ route('logout') }}" class="w-full sm:w-auto text-center sm:text-right">
                    @csrf
                    <button type="submit" class="text-sm font-bold text-gray-600 hover:text-gray-900 underline underline-offset-4 transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-amarillo