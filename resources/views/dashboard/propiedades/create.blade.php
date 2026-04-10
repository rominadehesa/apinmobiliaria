@extends('dashboard.base')

@section('title', 'Nueva propiedad')

@section('content')

    <div class="w-full mx-auto mt-6 space-y-6">

        <!-- HEADER -->
        <div class="bg-[#3E153D] p-6 rounded-2xl shadow flex justify-between items-center">
            <div>
                <h2 class="text-lg font-bold text-white">Nueva propiedad</h2>
                <p class="text-sm text-white">Completá los datos para publicar</p>
            </div>
        </div>

        <form action="{{ route('dashboard.propiedades.store') }}"  method="POST" class="space-y-6">
            @csrf
            <!-- 🏷️ CARD: INFO BÁSICA -->
            <div class="bg-white p-6 rounded-2xl shadow space-y-2">
                <h3 class="font-semibold text-gray-700">Información básica</h3>
                <p class="text-sm text-gray-500">Datos principales que verán los usuarios en el listado.</p>

                <input type="text" name="titulo" placeholder="Ej: Casa moderna en el centro"
                    class="w-full border border-gray-200 rounded-xl p-3">

                <textarea name="descripcion" placeholder="Describí la propiedad, sus espacios y lo más destacado..."
                    class="w-full border border-gray-200 rounded-xl p-3"></textarea>

                <p class="text-xs text-gray-400">
                    El precio no será visible públicamente. Los interesados lo solicitarán por contacto.
                </p>

                <input type="text" name="precio" placeholder="Precio (opcional)"
                    class="w-full border border-gray-200 rounded-xl p-3">
            </div>


            <!-- 📐 CARD: CARACTERÍSTICAS -->
            <div class="bg-white p-6 rounded-2xl shadow space-y-2">
                <h3 class="font-semibold text-gray-700">Características</h3>
                <p class="text-sm text-gray-500">
                    Completá solo lo que aplique. Podés dejar campos vacíos en terrenos o lotes.
                </p>

                <div class="grid grid-cols-2 gap-2">
                    <input type="number" name="habitaciones" placeholder="Habitaciones"
                        class="border border-gray-200 rounded-xl p-3">

                    <input type="number" name="banios" placeholder="Baños" class="border border-gray-200 rounded-xl p-3">

                    <input type="number" name="superficie_total" placeholder="Superficie total (m²)"
                        class="border border-gray-200 rounded-xl p-3">

                    <input type="number" name="superficie_cubierta" placeholder="Superficie cubierta (m²)"
                        class="border border-gray-200 rounded-xl p-3">
                </div>
            </div>

            <!-- 📍 CARD: UBICACIÓN -->
            <div class="bg-white p-6 rounded-2xl shadow space-y-2">
                <h3 class="font-semibold text-gray-700">Ubicación</h3>
                <p class="text-sm text-gray-500">
                    Mientras más precisa sea, mejor calidad tendrá la consulta.
                </p>

                <input type="text" name="direccion" placeholder="Dirección (ej: Av. San Martín 123)"
                    class="w-full border border-gray-200 rounded-xl p-3">

                <div class="grid grid-cols-2 gap-4">
                    <input type="text" name="ciudad" placeholder="Ciudad" class="border border-gray-200 rounded-xl p-3">

                    <input type="text" name="barrio" placeholder="Barrio / zona"
                        class="border border-gray-200 rounded-xl p-3">
                </div>
            </div>

            <!-- 🏡 CARD: EXTRAS -->
            <div class="bg-white p-6 rounded-2xl shadow space-y-2">
                <h3 class="font-semibold text-gray-700">Extras</h3>
                <p class="text-sm text-gray-500">
                    Estos detalles ayudan a destacar la propiedad frente a otras.
                </p>

                <div class="flex gap-6 text-sm text-gray-700">
                    <label class="flex items-center gap-2">
                        <input type="checkbox" name="tiene_jardin">
                        Jardín
                    </label>

                    <label class="flex items-center gap-2">
                        <input type="checkbox" name="tiene_cochera">
                        Cochera
                    </label>
                </div>
            </div>

            <!-- ⚡ CARD: DETALLES -->
            <div class="bg-white p-6 rounded-2xl shadow space-y-2">
                <h3 class="font-semibold text-gray-700">Detalles adicionales</h3>
                <p class="text-sm text-gray-500">
                    Información extra que puede influir en la decisión del cliente.
                </p>

                <textarea name="servicios" placeholder="Ej: agua, luz, gas, internet..."
                    class="w-full border border-gray-200 rounded-xl p-3"></textarea>

                <textarea name="observaciones" placeholder="Notas internas o detalles importantes..."
                    class="w-full border border-gray-200 rounded-xl p-3"></textarea>
            </div>

            <!-- ⭐ DESTACAR -->
            <div class="bg-white p-6 rounded-2xl shadow space-y-2">
                <h3 class="font-semibold text-gray-700">Visibilidad</h3>
                <p class="text-sm text-gray-500">
                    Las propiedades destacadas se muestran primero en el sitio.
                </p>

                <select name="destacada" class="w-full border border-gray-200 rounded-xl p-3">
                    <option value="1">Destacar propiedad</option>
                    <option value="0">No destacar</option>
                </select>
            </div>

            <!-- 🔗 CARD: CLASIFICACIÓN -->
            <div class="bg-white p-6 rounded-2xl shadow space-y-2">
                <h3 class="font-semibold text-gray-700">Clasificación</h3>
                <p class="text-sm text-gray-500">
                    Define cómo se mostrará la propiedad en el sitio.
                </p>

                <select name="operacion_id" class="w-full border border-gray-200 rounded-xl p-3">
                    <option value="">Seleccionar operación</option>
                    @foreach ($operaciones as $item)
                        <option value="{{ $item->id }}">{{ $item->nombre }}</option>
                    @endforeach
                </select>

                <select name="tipo_propiedad_id" class="w-full border border-gray-200 rounded-xl p-3">
                    <option value="">Seleccionar tipo</option>
                    @foreach ($tipos as $item)
                        <option value="{{ $item->id }}">{{ $item->nombre }}</option>
                    @endforeach
                </select>

                <select name="estado" class="w-full border border-gray-200 rounded-xl p-3">
                    <option value="disponible">Disponible</option>
                    <option value="reservada">Reservada</option>
                    <option value="vendida">Vendida</option>
                </select>
            </div>

            <!-- BOTÓN -->
            <div class="flex justify-end">
                <button class="bg-[#3E153D] text-white px-8 py-3 rounded-xl shadow hover:bg-[#2c0f2b] transition">
                    Guardar propiedad
                </button>
            </div>

        </form>

    </div>

@endsection
