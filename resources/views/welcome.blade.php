<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Agrostock | Inicio</title>

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
<body class="bg-white text-gray-800 font-sans antialiased">

    <nav class="w-full bg-white border-b border-gray-100 py-4 px-8 flex justify-between items-center fixed top-0 z-50 shadow-sm">
        <div class="text-2xl font-black tracking-tighter text-gray-900">
            AGROSTOCK
        </div>
        
        @if (Route::has('login'))
            <div class="space-x-4 flex items-center">
                @auth
                    <a href="{{ url('/dashboard') }}" class="px-5 py-2 text-sm font-bold bg-amarillo-fuerte text-gray-900 rounded-md hover:bg-amarillo-oscuro transition-colors shadow-sm">
                        Ir al Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}" class="px-5 py-2 text-sm font-semibold text-gray-700 hover:text-gray-900 transition-colors">
                        Iniciar Sesión
                    </a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="px-5 py-2 text-sm font-bold bg-amarillo-fuerte text-gray-900 rounded-md hover:bg-amarillo-oscuro transition-colors shadow-sm">
                            Registrarse
                        </a>
                    @endif
                @endauth
            </div>
        @endif
    </nav>

    <section class="mt-20 pt-24 pb-16 px-8 text-center bg-white flex flex-col items-center">
        <h1 class="text-6xl font-black text-gray-900 mb-6 tracking-tight">
            AGROSTOCK
        </h1>
        <p class="text-xl text-gray-500 max-w-2xl mb-10 leading-relaxed">
            La plataforma profesional diseñada para transformar y optimizar la gestión de inventarios en el sector agropecuario y ganadero.
        </p>
        
        @if (Route::has('login'))
            <div class="flex space-x-6">
                @auth
                    <a href="{{ url('/dashboard') }}" class="px-8 py-3 text-base font-bold bg-amarillo-fuerte text-gray-900 rounded-lg hover:bg-amarillo-oscuro transition-all shadow-md">
                        Panel de Control
                    </a>
                @else
                    <a href="{{ route('login') }}" class="px-8 py-3 text-base font-bold bg-white border-2 border-gray-200 text-gray-700 rounded-lg hover:border-gray-300 transition-all shadow-sm">
                        Ir al Login
                    </a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="px-8 py-3 text-base font-bold bg-amarillo-fuerte text-gray-900 rounded-lg hover:bg-amarillo-oscuro transition-all shadow-md">
                            Crear una Cuenta
                        </a>
                    @endif
                @endauth
            </div>
        @endif
    </section>

    <section class="py-20 px-8 bg-gray-50">
        <div class="max-w-6xl mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-gray-900">¿Cómo funcionamos?</h2>
                <div class="w-24 h-1 bg-amarillo-fuerte mx-auto mt-4"></div>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
                <div class="bg-white p-8 rounded-xl shadow-md border border-gray-100 text-center hover:-translate-y-1 transition-transform">
                    <div class="w-16 h-16 bg-amarillo-fuerte rounded-full flex items-center justify-center mx-auto mb-6 text-xl font-black text-gray-900">1</div>
                    <h3 class="text-xl font-bold mb-4 text-gray-900">Registro Centralizado</h3>
                    <p class="text-gray-600">Centraliza la información de todos tus insumos. Ideal para registrar alimento, medicamentos veterinarios o herramientas para el mantenimiento de la Finca La Laguneta de forma segura.</p>
                </div>
                <div class="bg-white p-8 rounded-xl shadow-md border border-gray-100 text-center hover:-translate-y-1 transition-transform">
                    <div class="w-16 h-16 bg-amarillo-fuerte rounded-full flex items-center justify-center mx-auto mb-6 text-xl font-black text-gray-900">2</div>
                    <h3 class="text-xl font-bold mb-4 text-gray-900">Control de Movimientos</h3>
                    <p class="text-gray-600">Registra cada entrada y salida con precisión. Mantén un historial detallado de quién, cuándo y por qué se movió la mercancía en el almacén.</p>
                </div>
                <div class="bg-white p-8 rounded-xl shadow-md border border-gray-100 text-center hover:-translate-y-1 transition-transform">
                    <div class="w-16 h-16 bg-amarillo-fuerte rounded-full flex items-center justify-center mx-auto mb-6 text-xl font-black text-gray-900">3</div>
                    <h3 class="text-xl font-bold mb-4 text-gray-900">Análisis y Alertas</h3>
                    <p class="text-gray-600">El sistema te notifica cuando los niveles de stock son críticos y genera reportes exactos para facilitar tus decisiones de compra.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-20 px-8 bg-white">
        <div class="max-w-6xl mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-gray-900">Objetivos de nuestro inventario</h2>
                <div class="w-24 h-1 bg-amarillo-fuerte mx-auto mt-4"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                <div class="border border-gray-200 p-8 rounded-xl hover:shadow-lg transition-shadow bg-white hover:border-amarillo-fuerte">
                    <h4 class="text-lg font-bold text-gray-900 mb-2">Reducción de Mermas</h4>
                    <p class="text-gray-600">Minimizar la pérdida de productos por caducidad o mal manejo mediante un control estricto de fechas y lotes.</p>
                </div>
                <div class="border border-gray-200 p-8 rounded-xl hover:shadow-lg transition-shadow bg-white hover:border-amarillo-fuerte">
                    <h4 class="text-lg font-bold text-gray-900 mb-2">Optimización de Recursos</h4>
                    <p class="text-gray-600">Asegurar que siempre haya disponibilidad de los insumos necesarios sin caer en el sobrestock que inmoviliza capital.</p>
                </div>
                <div class="border border-gray-200 p-8 rounded-xl hover:shadow-lg transition-shadow bg-white hover:border-amarillo-fuerte">
                    <h4 class="text-lg font-bold text-gray-900 mb-2">Trazabilidad Total</h4>
                    <p class="text-gray-600">Conocer el origen y destino de cada artículo, desde el ingreso de insumos hasta el uso en potreros o en las operaciones de Ganadería JJ, asegurando un control profesional para auditorías.</p>
                </div>
                <div class="border border-gray-200 p-8 rounded-xl hover:shadow-lg transition-shadow bg-white hover:border-amarillo-fuerte">
                    <h4 class="text-lg font-bold text-gray-900 mb-2">Toma de Decisiones</h4>
                    <p class="text-gray-600">Proveer datos en tiempo real que permitan a los administradores planificar compras y presupuestos con exactitud operativa.</p>
                </div>
            </div>
        </div>
    </section>

    <footer class="bg-gray-900 border-t border-gray-800 py-8 text-center">
        <p class="text-gray-400 text-sm font-medium">&copy; {{ date('Y') }} Agrostock. Todos los derechos reservados.</p>
    </footer>

</body>
</html>