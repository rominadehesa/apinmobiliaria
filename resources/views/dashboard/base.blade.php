<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Inmobiliaria')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="grid grid-cols-6 min-h-screen">
    <nav class="col-span-1 bg-white px-6 py-8">
        <div class="mb-8">
            <img src="{{ asset('logo-color.png') }}" alt="Logo" class="h-24">
        </div>
        <ul class="space-y-1">
            <li><a href="/dashboard">Inicio</a></li>
            <li><a href="/dashboard/tipos">Tipo de Propiedades</a></li>
            <li><a href="/dashboard/propiedades">Propiedades</a></li>
        </ul>
    </nav>

    <main class="col-span-5 px-10 py-8 bg-[#E8EBEA]">
        <section class="flex items-center justify-between">
                <div>
                   <h1 class="text-2xl font-bold">Panel de Control</h1>
                </div>
            @auth
                <div class="flex gap-2 items-center justify-end">
                    <span>
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8 0C9.06087 0 10.0783 0.421427 10.8284 1.17157C11.5786 1.92172 12 2.93913 12 4C12 5.06087 11.5786 6.07828 10.8284 6.82843C10.0783 7.57857 9.06087 8 8 8C6.93913 8 5.92172 7.57857 5.17157 6.82843C4.42143 6.07828 4 5.06087 4 4C4 2.93913 4.42143 1.92172 5.17157 1.17157C5.92172 0.421427 6.93913 0 8 0ZM8 10C12.42 10 16 11.79 16 14V16H0V14C0 11.79 3.58 10 8 10Z" fill="#471C47"/>
                        </svg>
                    </span>
                    <span class="text-sm text-gray-600 m-0 p-0">
                        {{ auth()->user()->name }}
                    </span>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="text-red-600 text-sm">
                            Cerrar sesión
                        </button>
                    </form>
                </div>
            @endauth
        </section>
        @yield('content')
    </main>
</body>
</html>