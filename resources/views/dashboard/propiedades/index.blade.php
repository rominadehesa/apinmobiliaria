@extends('dashboard.base')

@section('title', 'Propiedades')

@section('content')
    <!-- HEADER -->
    <section class="bg-white mt-6 py-4 px-6 rounded-xl shadow flex items-center justify-between">
        <div>
            <h2 class="text-md font-bold text-gray-800 mb-0">
                Administrar propiedades
            </h2>

            <p class="text-gray-500 text-sm">
                Desde aquí podés ver, editar y gestionar todas tus propiedades publicadas.
            </p>
        </div>

        <a href="{{ route('dashboard.propiedades.create') }}"
            class="bg-[#3E153D] text-white text-sm font-medium px-6 py-2 rounded-xl transition shadow-sm hover:bg-[#2c0f2b]">
            Agregar propiedad
        </a>
    </section>

    <!-- TITLE -->
    <section class="mt-6">
        <h2 class="text-lg font-bold text-gray-800">Todas las propiedades</h2>
    </section>

    <!-- TABLE -->
    <section>
        <div class="mt-4 bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <table class="min-w-full text-sm">

    <!-- HEADER -->
    <thead class="bg-gray-50 border-b border-gray-200">
        <tr class="text-xs font-semibold text-gray-500 uppercase tracking-wider">
            <th class="px-6 py-4 text-left">Propiedad</th>
            <th class="px-6 py-4 text-left">Ubicación</th>
            <th class="px-6 py-4 text-left">Características</th>
            <th class="px-6 py-4 text-left">Imágenes</th>
            <th class="px-6 py-4 text-left">Estado</th>
            <th class="px-6 py-4 text-right">Acciones</th>
        </tr>
    </thead>

    <!-- BODY -->
    <tbody class="divide-y divide-gray-100">

        @forelse($propiedades as $propiedad)
            <tr class="hover:bg-gray-50 transition">

                <!-- PROPIEDAD -->
                <td class="px-6 py-4">
                    <div class="flex gap-4 items-center">

                        <!-- Imagen -->
                        <div class="w-20 h-16 rounded-lg overflow-hidden bg-gray-100 flex-shrink-0">
                            @if($propiedad->imagenes->first())
                                <img 
                                    src="{{ asset('storage/' . $propiedad->imagenes->first()->ruta) }}"
                                    class="w-full h-full object-cover"
                                >
                            @else
                                <div class="w-full h-full flex items-center justify-center text-gray-400 text-xs">
                                    Sin imagen
                                </div>
                            @endif
                        </div>

                        <!-- Info -->
                        <div>
                            <div class="font-medium text-gray-800">
                                {{ $propiedad->titulo }}
                            </div>

                            <div class="text-xs text-gray-500 mt-1">
                                {{ $propiedad->operacion->nombre }} · {{ $propiedad->tipoPropiedad->nombre }}
                            </div>

                            @if ($propiedad->destacada)
                                <div class="text-xs text-gray-400 mt-1">
                                    Destacada
                                </div>
                            @endif
                        </div>

                    </div>
                </td>

                <!-- UBICACIÓN -->
                <td class="px-6 py-4 text-sm text-gray-600">
                    {{ $propiedad->ciudad }}<br>
                    <span class="text-xs text-gray-400">{{ $propiedad->barrio }}</span>
                </td>

                <!-- CARACTERÍSTICAS -->
                <td class="px-6 py-4 text-sm text-gray-600">
                    <div>
                        {{ $propiedad->habitaciones ?? '-' }} hab ·
                        {{ $propiedad->banios ?? '-' }} baños
                    </div>

                    <div class="text-xs text-gray-400 mt-1">
                        {{ $propiedad->superficie_total ?? '-' }} m² tot ·
                        {{ $propiedad->superficie_cubierta ?? '-' }} m² cub
                    </div>
                </td>

                <!-- IMÁGENES -->
                <td class="px-6 py-4">
                    <div class="flex items-center gap-2">

                        <!-- mini preview -->
                        <div class="flex -space-x-2">
                            @foreach($propiedad->imagenes->take(3) as $img)
                                <img src="{{ asset('storage/' . $img->ruta) }}"
                                    class="w-8 h-8 rounded object-cover border">
                            @endforeach
                        </div>

                        <!-- contador -->
                        <span class="text-xs text-gray-500">
                            ({{ $propiedad->imagenes->count() }})
                        </span>

                        <!-- botón -->
                        <a href="{{ route('dashboard.propiedades.imagenes.create', $propiedad->id) }}"
                            class="text-xs text-gray-600 underline hover:text-black">
                            Agregar
                        </a>

                    </div>
                </td>

                <!-- ESTADO -->
                <td class="px-6 py-4">
                    <span class="
                        px-2 py-1 rounded text-xs font-medium
                        @if ($propiedad->estado == 'disponible') bg-gray-100 text-gray-700
                        @elseif($propiedad->estado == 'reservada') bg-gray-200 text-gray-700
                        @else bg-gray-300 text-gray-700 @endif
                    ">
                        {{ ucfirst($propiedad->estado) }}
                    </span>
                </td>

                <!-- ACCIONES -->
                <td class="px-6 py-4 text-right">
                    <div class="flex justify-end gap-3 text-xs">

                        <a href="{{ route('dashboard.propiedades.edit', $propiedad->id) }}"
                            class="text-gray-600 hover:text-black">
                            Editar
                        </a>

                        <form action="{{ route('dashboard.propiedades.destroy', $propiedad->id) }}"
                            method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="text-gray-600 hover:text-red-600">
                                Eliminar
                            </button>
                        </form>

                    </div>
                </td>

            </tr>
        @empty
            <tr>
                <td colspan="6" class="text-center py-16 text-gray-400">
                    No hay propiedades registradas
                </td>
            </tr>
        @endforelse

    </tbody>

</table>
        </div>
    </section>
@endsection
