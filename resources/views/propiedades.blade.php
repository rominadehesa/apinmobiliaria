@extends('base')

@section('title', 'Inicio')

@section('header_title', 'Filtra para encontrar lo que buscas')
@section('header_subtitle', 'Todas las propiedades')

@section('content')

    <section class="py-32 px-64 bg-[#F1F1F1]">

        <div class="max-w-6xl mx-auto px-4">

            <!-- 🧠 FILTRO UX -->
            <div class="mb-12">

                <h1 class="text-4xl font-bold mb-4">
                    Explorar propiedades
                </h1>

                

                <p class="text-sm text-gray-500 mb-4">
                    Buscá por ciudad, barrio o tipo de propiedad
                </p>

                <div class="flex flex-col md:flex-row gap-4">

                    <!-- input -->
                    <input type="text" id="filtro" placeholder="Ej: Tigre, departamento, casa..."
                        class="w-full md:w-1/2 px-4 py-3 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-yellow-400 bg-white">

                    <!-- contador -->
                    <div id="contador" class="text-sm text-gray-500 flex items-center">
                        Resultados: {{ count($propiedades) }} propiedades
                    </div>

                </div>

            </div>

            <!-- 🧱 GRID -->
            <div id="gridPropiedades" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 gap-8">

                @forelse($propiedades as $propiedad)
                    <div class="propiedad group bg-white rounded-2xl overflow-hidden border border-gray-100
                    shadow-sm hover:shadow-[0_20px_50px_rgba(255,200,0,0.25)]
                    hover:-translate-y-1 transition duration-300 flex flex-col"
                        data-titulo="{{ strtolower($propiedad->titulo) }}"
                        data-ciudad="{{ strtolower($propiedad->ciudad) }}"
                        data-barrio="{{ strtolower($propiedad->barrio) }}"
                        data-tipo="{{ strtolower($propiedad->tipoPropiedad->nombre) }}">

                        <a>

                            <!-- 🖼️ Imagen -->
                            <div class="relative h-60 overflow-hidden">

                                @if ($propiedad->imagenes->first())
                                    <img src="{{ asset('storage/' . $propiedad->imagenes->first()->ruta) }}"
                                        class="w-full h-full object-cover transition duration-500 group-hover:scale-110">
                                @endif

                                <!-- overlay -->
                                <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-black/10 to-transparent">
                                </div>

                                <!-- badges -->
                                <div class="absolute top-3 left-3 flex gap-2">

                                    <span class="text-xs bg-white text-gray-800 px-3 py-1 rounded-full shadow">
                                        {{ $propiedad->operacion->nombre }}
                                    </span>

                                    <span class="text-xs bg-yellow-400 text-black px-3 py-1 rounded-full shadow">
                                        {{ $propiedad->tipoPropiedad->nombre }}
                                    </span>

                                </div>

                                @if ($propiedad->destacada)
                                    <div
                                        class="absolute top-3 right-3 text-xs bg-black text-white px-3 py-1 rounded-full shadow">
                                        Destacada
                                    </div>
                                @endif

                            </div>

                            <!-- 📄 CONTENIDO -->
                            <div class="p-6 flex flex-col justify-between flex-1">

                                <div>

                                    <!-- ubicación -->
                                    <p class="text-xs text-gray-400 mb-1">
                                        {{ $propiedad->ciudad }} · {{ $propiedad->barrio }}
                                    </p>

                                    <!-- título -->
                                    <h3
                                        class="font-semibold text-gray-900 text-lg mb-2 group-hover:text-yellow-600 transition">
                                        {{ $propiedad->titulo }}
                                    </h3>

                                    <!-- descripción -->
                                    <p class="text-sm text-gray-500 mb-5 line-clamp-2">
                                        {{ $propiedad->descripcion }}
                                    </p>

                                    <div class="flex items-center justify-between mt-6">

                                        <!-- TAGS -->
                                        <div class="flex flex-wrap gap-2">

                                            <span class="text-xs bg-gray-100 px-2 py-1 rounded">
                                                {{ $propiedad->ciudad }}
                                            </span>

                                            <span class="text-xs bg-gray-100 px-2 py-1 rounded">
                                                {{ $propiedad->superficie_total ?? '-' }} m²
                                            </span>

                                        </div>

                                        <!-- BOTÓN -->
                                        <a href="{{ route('propiedades.show', $propiedad->id) }}">

                                            <div class="flex-shrink-0">
                                                <span
                                                class="text-xs bg-yellow-400 text-black px-3 py-1.5 rounded-full font-medium shadow-sm
                                                group-hover:bg-yellow-300 transition flex items-center gap-1">
                                                Ver más
                                                <span class="transform group-hover:translate-x-1 transition">→</span>
                                            </span>
                                        </div>
                                        </a>

                                    </div>

                                </div>

                            </div>

                        </a>

                    </div>

                @empty
                    <p class="col-span-2 text-center text-gray-400">
                        No hay propiedades
                    </p>
                @endforelse

            </div>

        </div>

    </section>

    <!-- ⚡ JS FILTRO MEJORADO -->
    <script>
        const input = document.getElementById('filtro');
        const propiedades = document.querySelectorAll('.propiedad');
        const contador = document.getElementById('contador');

        input.addEventListener('keyup', function() {

            let valor = input.value.toLowerCase();
            let visibles = 0;

            propiedades.forEach(prop => {

                let texto =
                    prop.dataset.titulo + " " +
                    prop.dataset.ciudad + " " +
                    prop.dataset.barrio + " " +
                    prop.dataset.tipo;

                if (texto.includes(valor)) {
                    prop.style.display = "flex";
                    visibles++;
                } else {
                    prop.style.display = "none";
                }

            });

            contador.innerText = visibles + " propiedades";

        });
    </script>
    @include('sections.form_search')
@endsection
