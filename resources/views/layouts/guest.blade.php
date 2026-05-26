<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Agrostock') }}</title>

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
            <a href="/" class="text-2xl font-black tracking-tighter text-gray-900 hover:text-amarillo-oscuro transition-colors">
                AGROSTOCK
            </a>
        </nav>

        <div class="flex-1 flex flex-col justify-center items-center pt-6 sm:pt-0 px-4">
            
            <div class="w-full sm:max-w-md px-8 py-10 bg-white shadow-lg overflow-hidden sm:rounded-xl border border-gray-100">
                {{ $slot }}
            </div>
            
        </div>
    </body>
</html>