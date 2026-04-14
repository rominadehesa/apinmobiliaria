<section class="py-32 px-64 bg-[#3E153D]">
    <div class="text-center">
        <h3 class="text-[#CECECE] mb-4">Propiedades destacadas</h3>
        <h1 class="text-white text-4xl font-bold mb-4">Tu próxima propiedad está aquí</h1>
    </div>
    <div id="gridPropiedades" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 mt-12">

                @forelse($propiedades as $propiedad)
                    <div class="propiedad group bg-white rounded-2xl overflow-hidden border border-gray-100
                    shadow-sm hover:shadow-[0_20px_50px_rgba(255,200,0,0.0.02)]
                    hover:-translate-y-1 transition duration-300 flex flex-col"
                        data-titulo="{{ strtolower($propiedad->titulo) }}"
                        data-ciudad="{{ strtolower($propiedad->ciudad) }}"
                        data-barrio="{{ strtolower($propiedad->barrio) }}"
                        data-tipo="{{ strtolower($propiedad->tipoPropiedad->nombre) }}">

                        <a>

                            <!-- 🖼️ Imagen -->
                            <div class="relative h-40 overflow-hidden">

                                @if ($propiedad->imagenes->first())
                                    <img src="{{ asset('storage/' . $propiedad->imagenes->first()->ruta) }}"
                                        class="w-full h-full object-cover transition duration-500">
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
                                        class="font-semibold text-gray-900 text-lg mb-2 transition">
                                        {{ $propiedad->titulo }}
                                    </h3>

                                    <p class="text-sm text-gray-500 mb-5 line-clamp-2">
                                        {{ $propiedad->descripcion }}
                                    </p>

                                    <div class="flex items-center justify-end mt-6">

                                        <!-- BOTÓN -->
                                        <div class="flex-shrink-0">
                                            <span
                                                class="text-xs bg-yellow-400 text-black px-3 py-1.5 rounded-full font-medium shadow-sm
                     group-hover:bg-yellow-300 transition flex items-center gap-1">
                                                Ver más
                                                <span class="transform group-hover:translate-x-1 transition">→</span>
                                            </span>
                                        </div>

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
</section>