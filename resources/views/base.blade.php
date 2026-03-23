<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Inmobiliaria')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <header class="relative h-[85vh] overflow-hidden">

    <!-- 🎥 Video fondo -->
    <video autoplay muted loop playsinline 
        class="absolute top-0 left-0 w-full h-full object-cover">
        <source src="{{ asset('images/hero-video.mp4') }}" type="video/mp4">
    </video>

    <!-- 🎨 Overlay oscuro elegante -->
    <div class="absolute inset-0 bg-gradient-to-r 
        from-[#3E153D]/90 
        via-[#3E153D]/60 
        to-white/40">
    </div>

    <!-- Contenido -->
    <div class="relative z-10 px-64 py-12 h-full flex flex-col justify-between">

        <!-- NAV -->
        <nav class="w-full px-8 py-4 flex items-center justify-between bg-white/90 backdrop-blur-md rounded-2xl shadow-lg">

            <img src="{{ asset('images/logo-nav.png') }}" class="h-12">

            <ul class="flex items-center gap-8 text-sm text-gray-700">
                <li><a href="#" class="hover:text-[#3E153D] transition">Inicio</a></li>
                <li><a href="#" class="hover:text-[#3E153D] transition">Propiedades</a></li>
                <li><a href="#" class="hover:text-[#3E153D] transition">Inversiones</a></li>
                <li><a href="#" class="hover:text-[#3E153D] transition">Contacto</a></li>
            </ul>

        </nav>

        <!-- HERO CONTENT -->
        <div class="mx-auto w-full">

            <div class="text-center mb-10">
                <h3 class="text-[#CECECE] mb-4">
                    Explorar todas las propiedades
                </h3>

                <h1 class="text-[#EDCB2F] text-4xl font-bold">
                    Encontrá la propiedad ideal para vos
                </h1>
            </div>

            <div class="bg-[#2A2A2A] rounded-2xl p-8 w-full">

                <form action="#" class="grid grid-cols-4 gap-4">

                    <!-- Operación -->
                    <select name="operacion" class="col-span-1 rounded-xl py-3 px-4 text-sm">
                        <option value="">Operación</option>
                        <option value="venta">Venta</option>
                        <option value="alquiler">Alquiler</option>
                    </select>

                    <!-- Tipo -->
                    <select name="tipo" class="col-span-1 rounded-xl py-3 px-4 text-sm">
                        <option value="">Tipo</option>
                        <option value="casa">Casa</option>
                        <option value="departamento">Departamento</option>
                        <option value="terreno">Terreno</option>
                    </select>

                    <!-- Ciudad -->
                    <input 
                        type="text"
                        name="ciudad"
                        placeholder="Ciudad"
                        class="col-span-1 rounded-xl py-3 px-4 text-sm"
                    >

                    <!-- Botón -->
                    <button class="col-span-1 bg-[#EDCB2F] text-[#1E1E1E] font-semibold rounded-xl py-3 hover:bg-[#D4B02A] transition">Buscar</button>

                </form>

            </div>

        </div>

    </div>

</header>
    <main class="bg-white">
        @yield('content')
    </main>
</body>
</html>