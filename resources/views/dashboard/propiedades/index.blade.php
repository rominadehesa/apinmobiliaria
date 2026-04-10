@extends('dashboard.base')

@section('title', 'Propiedades')

@section('content')
    <section class="bg-white mt-6 py-4 px-6 rounded-xl shadow flex items-center justify-between">
        <div>
            <h2 class="text-md font-bold text-gray-800 mb-0">
                Administrar propiedades
            </h2>

            <p class="text-gray-500 text-sm">
                Desde aquí podés ver, editar y gestionar todas tus propiedades publicadas.
                A continuación, encontrarás el listado completo con sus detalles.
            </p>
        </div>
        <div>
            <a href="{{ route('dashboard.propiedades.create') }}"
                class="bg-[#3E153D] text-white text-sm font-medium px-6 py-2 rounded-xl transition shadow-sm hover:bg-[#2c0f2b]">
                Agregar propiedad
            </a>
        </div>
    </section>
    <br>
    <section>
        <h2 class="text-lg font-bold text-gray-800">Todas las propiedades</h2>
    </section>
    <section>
        <div class="mt-8 bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">

            <table class="min-w-full">

                <!-- HEADER -->
                <thead class="bg-gray-50 border-b border-gray-200">
                    <tr class="text-xs font-semibold text-gray-500 uppercase tracking-wider">
                        <th class="px-6 py-4 text-left">Propiedad</th>
                        <th class="px-6 py-4 text-left">Detalles</th>
                        <th class="px-6 py-4 text-left">Características</th>
                        <th class="px-6 py-4 text-left">Imagenes</th>
                        <th class="px-6 py-4 text-left">Estado</th>
                        <th class="px-6 py-4 text-right">Acciones</th>
                    </tr>
                </thead>

                <!-- BODY -->
                <tbody class="divide-y divide-gray-100 text-sm">

                    @forelse($propiedades as $propiedad)
                        <tr class="hover:bg-gray-50 transition">

                            <!-- PROPIEDAD -->
                            <td class="px-6 py-4">
                                <div class="flex gap-4 items-center">

                                    <!-- Imagen -->
                                    <div class="w-16 h-16 bg-gray-100 rounded-xl overflow-hidden flex-shrink-0">
                                        @forelse($propiedad->imagenes as $imagen)
                                            <img src="{{ asset('storage/' . $imagen->ruta) }}" alt="">
                                        @empty
                                            <div
                                                class="w-full h-full flex items-center justify-center text-gray-400 text-xs">
                                                Sin imagen
                                            </div>
                                        @endforelse
                                    </div>

                                    <!-- Info -->
                                    <div>
                                        <div class="font-semibold text-gray-800">
                                            {{ $propiedad->titulo }}
                                        </div>

                                        <div class="text-xs text-gray-500">
                                            {{ $propiedad->ciudad }} · {{ $propiedad->barrio }}
                                        </div>

                                        <div class="flex gap-2 mt-1">
                                            <span class="text-xs px-2 py-0.5 bg-blue-50 text-blue-700 rounded-full">
                                                {{ $propiedad->operacion->nombre }}
                                            </span>

                                            <span class="text-xs px-2 py-0.5 bg-gray-100 text-gray-700 rounded-full">
                                                {{ $propiedad->tipoPropiedad->nombre }}
                                            </span>

                                            @if ($propiedad->destacada)
                                                <span
                                                    class="text-xs px-2 py-0.5 bg-yellow-100 text-yellow-700 rounded-full">
                                                    Destacada
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                </div>
                            </td>

                            <!-- DETALLES -->
                            <td class="px-6 py-4 text-xs text-gray-600 space-y-1">
                                <div>
                                    {{ $propiedad->direccion ?? 'Sin dirección' }}
                                </div>

                                @if ($propiedad->precio)
                                    <div class="font-medium text-gray-800">
                                        ${{ number_format($propiedad->precio, 0, ',', '.') }}
                                    </div>
                                @endif
                            </td>

                            <!-- CARACTERÍSTICAS -->
                            <td class="px-6 py-4 text-xs text-gray-600 space-y-1">

                                <div>
                                    {{ $propiedad->habitaciones ?? '-' }} hab ·
                                    {{ $propiedad->banios ?? '-' }} baños
                                </div>

                                <div>
                                    {{ $propiedad->superficie_total ?? '-' }} m² tot ·
                                    {{ $propiedad->superficie_cubierta ?? '-' }} m² cub
                                </div>

                                <div class="flex gap-3 mt-1 text-gray-500">
                                    @if ($propiedad->tiene_jardin)
                                        <span>Jardín</span>
                                    @endif
                                    @if ($propiedad->tiene_cochera)
                                        <span>Cochera</span>
                                    @endif
                                </div>

                            </td>

                            <!-- CARACTERÍSTICAS -->
                            <td class="px-6 py-4 text-xs text-blue space-y-1 flex items-center gap-2">
                                @forelse($propiedad->imagenes as $imagen)
                                    <div class="relative w-20">

                                        <img src="{{ asset('storage/' . $imagen->ruta) }}"
                                            class="w-full h-40 object-cover rounded">

                                        <form action="{{ route('dashboard.imagenes.destroy', $imagen->id) }}"
                                            method="POST" class="absolute top-2 right-2">
                                            @csrf
                                            @method('DELETE')

                                            <button onclick="return confirm('¿Eliminar imagen?')"
                                                class="bg-red-600 text-white px-2 py-1 rounded text-xs">
                                                ✕
                                            </button>
                                        </form>

                                    </div>
                                @empty
                                    <div class="w-full h-full flex items-center justify-center text-gray-400 text-xs">
                                        Sin imagen
                                    </div>
                                @endforelse
                            </td>

                            <!-- ESTADO -->
                            <td class="px-6 py-4">
                                <span
                                    class="
                            px-3 py-1 rounded-full text-xs font-medium
                            @if ($propiedad->estado == 'disponible') bg-green-50 text-green-700
                            @elseif($propiedad->estado == 'reservada') bg-yellow-50 text-yellow-700
                            @else bg-red-50 text-red-700 @endif
                        ">
                                    {{ ucfirst($propiedad->estado) }}
                                </span>
                            </td>

                            <!-- ACCIONES -->
                            <td class="px-6 py-4 text-right">
                                <div class="flex justify-end items-center gap-3">

                                    <a href="{{ route('dashboard.propiedades.edit', $propiedad->id) }}"
                                        class="px-3 py-1.5 rounded-lg text-xs font-medium bg-indigo-50 text-indigo-600 hover:bg-indigo-100 transition">
                                        Editar
                                    </a>

                                    <form action="{{ route('dashboard.propiedades.destroy', $propiedad->id) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button
                                            class="px-3 py-1.5 rounded-lg text-xs font-medium bg-red-50 text-red-600 hover:bg-red-100 transition">
                                            Eliminar
                                        </button>
                                    </form>

                                </div>
                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-16 text-center text-gray-500">
                                <div class="flex flex-col items-center gap-2">
                                    <p>No hay propiedades registradas</p>
                                    <a href="{{ route('dashboard.propiedades.create') }}"
                                        class="text-sm text-indigo-600 hover:underline">
                                        Crear propiedad
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforelse

                </tbody>

            </table>

        </div>
    </section>

@endsection
