@extends('dashboard.base')

@section('title', 'Editar propiedad')

@section('content')

    <div class="w-full mx-auto mt-6 space-y-6">

        <!-- HEADER -->
        <div class="bg-[#3E153D] p-6 rounded-2xl shadow flex justify-between items-center">
            <div>
                <h2 class="text-lg font-bold text-white">Editar propiedad</h2>
                <p class="text-sm text-white">Modificá los datos de la propiedad</p>
            </div>
        </div>

        <form action="{{ route('dashboard.propiedades.update', $propiedad->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- 🏷️ INFO BÁSICA -->
            <div class="bg-white p-6 rounded-2xl shadow space-y-4">
                <div>
                    <h3 class="font-semibold text-gray-700">Información básica</h3>
                    <p class="text-sm text-gray-500">Datos principales visibles en el listado.</p>
                </div>

                <div>
                    <label class="text-sm text-gray-600 block mb-1">Título de la propiedad</label>
                    <input type="text" name="titulo" value="{{ old('titulo', $propiedad->titulo) }}"
                        placeholder="Ej: Casa moderna en el centro" class="w-full border border-gray-200 rounded-xl p-3">
                </div>

                <div>
                    <label class="text-sm text-gray-600 block mb-1">Descripción</label>
                    <textarea name="descripcion" rows="4" placeholder="Describí la propiedad..."
                        class="w-full border border-gray-200 rounded-xl p-3">{{ old('descripcion', $propiedad->descripcion) }}</textarea>
                </div>

                <div>
                    <label class="text-sm text-gray-600 block mb-1">Precio</label>
                    <p class="text-xs text-gray-400 mb-2">
                        Este valor no es público. Se utiliza como referencia interna.
                    </p>
                    <input type="text" name="precio" value="{{ old('precio', $propiedad->precio) }}"
                        class="w-full border border-gray-200 rounded-xl p-3">
                </div>
            </div>

            <!-- 📐 CARACTERÍSTICAS -->
            <div class="bg-white p-6 rounded-2xl shadow space-y-4">
                <div>
                    <h3 class="font-semibold text-gray-700">Características</h3>
                    <p class="text-sm text-gray-500">
                        Completá solo lo que aplique (por ejemplo, en lotes podés dejar vacío).
                    </p>
                </div>

                <div class="grid grid-cols-2 gap-4">

                    <div>
                        <label class="text-sm text-gray-600 block mb-1">Habitaciones</label>
                        <input type="number" name="habitaciones"
                            value="{{ old('habitaciones', $propiedad->habitaciones) }}"
                            class="w-full border border-gray-200 rounded-xl p-3">
                    </div>

                    <div>
                        <label class="text-sm text-gray-600 block mb-1">Baños</label>
                        <input type="number" name="banios" value="{{ old('banios', $propiedad->banios) }}"
                            class="w-full border border-gray-200 rounded-xl p-3">
                    </div>

                    <div>
                        <label class="text-sm text-gray-600 block mb-1">Superficie total (m²)</label>
                        <input type="number" name="superficie_total"
                            value="{{ old('superficie_total', $propiedad->superficie_total) }}"
                            class="w-full border border-gray-200 rounded-xl p-3">
                    </div>

                    <div>
                        <label class="text-sm text-gray-600 block mb-1">Superficie cubierta (m²)</label>
                        <input type="number" name="superficie_cubierta"
                            value="{{ old('superficie_cubierta', $propiedad->superficie_cubierta) }}"
                            class="w-full border border-gray-200 rounded-xl p-3">
                    </div>

                </div>
            </div>

            <!-- 📍 UBICACIÓN -->
            <div class="bg-white p-6 rounded-2xl shadow space-y-4">
                <div>
                    <h3 class="font-semibold text-gray-700">Ubicación</h3>
                    <p class="text-sm text-gray-500">
                        Cuanto más precisa, mejor calidad de consulta.
                    </p>
                </div>

                <div>
                    <label class="text-sm text-gray-600 block mb-1">Dirección</label>
                    <input type="text" name="direccion" value="{{ old('direccion', $propiedad->direccion) }}"
                        class="w-full border border-gray-200 rounded-xl p-3">
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="text-sm text-gray-600 block mb-1">Ciudad</label>
                        <input type="text" name="ciudad" value="{{ old('ciudad', $propiedad->ciudad) }}"
                            class="w-full border border-gray-200 rounded-xl p-3">
                    </div>

                    <div>
                        <label class="text-sm text-gray-600 block mb-1">Barrio / zona</label>
                        <input type="text" name="barrio" value="{{ old('barrio', $propiedad->barrio) }}"
                            class="w-full border border-gray-200 rounded-xl p-3">
                    </div>
                </div>
            </div>

            <!-- 🏡 EXTRAS -->
            <div class="bg-white p-6 rounded-2xl shadow space-y-4">
                <div>
                    <h3 class="font-semibold text-gray-700">Extras</h3>
                    <p class="text-sm text-gray-500">Detalles que ayudan a destacar la propiedad.</p>
                </div>

                <div class="flex flex-wrap gap-6 text-sm text-gray-700">
                    <label class="flex items-center gap-2">
                        <input type="checkbox" name="tiene_jardin"
                            {{ old('tiene_jardin', $propiedad->tiene_jardin) ? 'checked' : '' }}>
                        Jardín
                    </label>

                    <label class="flex items-center gap-2">
                        <input type="checkbox" name="tiene_cochera"
                            {{ old('tiene_cochera', $propiedad->tiene_cochera) ? 'checked' : '' }}>
                        Cochera
                    </label>
                </div>
            </div>

            <!-- ⚡ DETALLES -->
            <div class="bg-white p-6 rounded-2xl shadow space-y-4">
                <div>
                    <h3 class="font-semibold text-gray-700">Detalles adicionales</h3>
                    <p class="text-sm text-gray-500">Información complementaria.</p>
                </div>

                <div>
                    <label class="text-sm text-gray-600 block mb-1">Servicios</label>
                    <textarea name="servicios" rows="3" placeholder="Ej: agua, luz, gas, internet..."
                        class="w-full border border-gray-200 rounded-xl p-3">{{ old('servicios', $propiedad->servicios) }}</textarea>
                </div>

                <div>
                    <label class="text-sm text-gray-600 block mb-1">Observaciones</label>
                    <textarea name="observaciones" rows="3" placeholder="Notas internas o detalles importantes..."
                        class="w-full border border-gray-200 rounded-xl p-3">{{ old('observaciones', $propiedad->observaciones) }}</textarea>
                </div>
            </div>

            <!-- ⭐ VISIBILIDAD -->
            <div class="bg-white p-6 rounded-2xl shadow space-y-4">
                <div>
                    <h3 class="font-semibold text-gray-700">Visibilidad</h3>
                    <p class="text-sm text-gray-500">Define si aparece destacada en el sitio.</p>
                </div>

                <div>
                    <label class="text-sm text-gray-600 block mb-1">Estado de visibilidad</label>
                    <select name="destacada" class="w-full border border-gray-200 rounded-xl p-3">
                        <option value="1" {{ old('destacada', $propiedad->destacada) == 1 ? 'selected' : '' }}>
                            Destacada (aparece primero)
                        </option>
                        <option value="0" {{ old('destacada', $propiedad->destacada) == 0 ? 'selected' : '' }}>
                            Normal
                        </option>
                    </select>
                </div>
            </div>

            <!-- 🔗 CLASIFICACIÓN -->
            <div class="bg-white p-6 rounded-2xl shadow space-y-4">
                <div>
                    <h3 class="font-semibold text-gray-700">Clasificación</h3>
                    <p class="text-sm text-gray-500">Define cómo se organiza la propiedad.</p>
                </div>

                <div>
                    <label class="text-sm text-gray-600 block mb-1">Operación</label>
                    <select name="operacion_id" class="w-full border border-gray-200 rounded-xl p-3">
                        @foreach ($operaciones as $item)
                            <option value="{{ $item->id }}"
                                {{ old('operacion_id', $propiedad->operacion_id) == $item->id ? 'selected' : '' }}>
                                {{ $item->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="text-sm text-gray-600 block mb-1">Tipo de propiedad</label>
                    <select name="tipo_propiedad_id" class="w-full border border-gray-200 rounded-xl p-3">
                        @foreach ($tipos as $item)
                            <option value="{{ $item->id }}"
                                {{ old('tipo_propiedad_id', $propiedad->tipo_propiedad_id) == $item->id ? 'selected' : '' }}>
                                {{ $item->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="text-sm text-gray-600 block mb-1">Estado</label>
                    <select name="estado" class="w-full border border-gray-200 rounded-xl p-3">
                        <option value="disponible" {{ $propiedad->estado == 'disponible' ? 'selected' : '' }}>Disponible
                        </option>
                        <option value="reservada" {{ $propiedad->estado == 'reservada' ? 'selected' : '' }}>Reservada
                        </option>
                        <option value="vendida" {{ $propiedad->estado == 'vendida' ? 'selected' : '' }}>Vendida</option>
                    </select>
                </div>
            </div>

            <!-- BOTÓN -->
            <div class="flex justify-end">
                <button class="bg-[#3E153D] text-white px-8 py-3 rounded-xl shadow hover:bg-[#2c0f2b] transition">
                    Actualizar propiedad
                </button>
            </div>

        </form>

    </div>

@endsection
