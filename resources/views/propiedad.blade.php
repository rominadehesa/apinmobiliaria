@extends('base')

@section('title', 'Detalle propiedad')

@section('content')

<section class="bg-[#F1F1F1] py-32 px-4 md:px-10 scroll-smooth">
<div class="max-w-6xl mx-auto space-y-16">

    {{-- 🧭 HERO --}}
    <div class="relative h-[420px] rounded-3xl overflow-hidden shadow-sm">

        @if ($propiedad->imagenes->first())
            <img src="{{ asset('storage/' . $propiedad->imagenes->first()->ruta) }}"
                class="w-full h-full object-cover">
        @endif

        <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/30 to-transparent"></div>

        <div class="absolute bottom-0 p-8 md:p-10 text-white max-w-2xl">

            <span class="text-xs bg-[#EDCB2F] text-[#1E1E1E] px-3 py-1 rounded-full font-semibold">
                {{ ucfirst($propiedad->estado) }}
            </span>

            <h1 class="text-3xl md:text-4xl font-bold mt-4 leading-tight">
                {{ $propiedad->titulo }}
            </h1>

            <p class="text-sm text-gray-200 mt-3">
                {{ $propiedad->descripcion_breve }}
            </p>

            <p class="text-xs text-gray-300 mt-3">
                📍 {{ $propiedad->direccion }}, {{ $propiedad->ciudad }}
            </p>

            <button onclick="scrollToForm()"
                class="mt-6 bg-[#EDCB2F] text-[#1E1E1E] px-6 py-3 rounded-xl font-semibold hover:bg-[#d4b02a] transition">
                Consultar propiedad
            </button>

        </div>
    </div>

    {{-- ⭐ DATOS IMPORTANTES --}}
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">

        <div class="bg-white p-5 rounded-2xl shadow-sm text-center">
            <p class="text-xs text-gray-400">Ambientes</p>
            <p class="font-bold text-[#3E153D]">{{ $propiedad->ambientes ?? '-' }}</p>
        </div>

        <div class="bg-white p-5 rounded-2xl shadow-sm text-center">
            <p class="text-xs text-gray-400">Habitaciones</p>
            <p class="font-bold text-[#3E153D]">{{ $propiedad->habitaciones ?? '-' }}</p>
        </div>

        <div class="bg-white p-5 rounded-2xl shadow-sm text-center">
            <p class="text-xs text-gray-400">Baños</p>
            <p class="font-bold text-[#3E153D]">{{ $propiedad->banios ?? '-' }}</p>

            @if($propiedad->banios_extra)
                <div class="mt-2 bg-[#3E153D]/5 text-[#3E153D] text-xs px-3 py-1 rounded-xl inline-block">
                    {{ $propiedad->banios_extra }}
                </div>
            @endif
        </div>

        <div class="bg-white p-5 rounded-2xl shadow-sm text-center">
            <p class="text-xs text-gray-400">Plantas</p>
            <p class="font-bold text-[#3E153D]">{{ $propiedad->cant_plantas ?? '-' }}</p>
        </div>

    </div>

    {{-- 🖼️ GALERÍA --}}
    <div class="space-y-4">

        <div>
            <h2 class="text-2xl font-bold text-[#3E153D]">Recorrido visual</h2>
            <p class="text-sm text-gray-500">
                Explorá los espacios y descubrí cada detalle de la propiedad.
            </p>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">

            @foreach ($propiedad->imagenes as $img)
                <div class="h-[160px] rounded-2xl overflow-hidden cursor-pointer group"
                    onclick="openPreview('{{ asset('storage/' . $img->ruta) }}')">

                    <img src="{{ asset('storage/' . $img->ruta) }}"
                        class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                </div>
            @endforeach

        </div>

    </div>

    {{-- 📊 INFO --}}
    <div class="grid md:grid-cols-2 gap-6">

        {{-- DETALLES --}}
        <div class="bg-white p-7 rounded-2xl shadow-sm">
            <h3 class="text-xl font-bold text-[#3E153D] mb-5">Información general</h3>

            <div class="space-y-3 text-sm text-gray-600">

                <div class="flex justify-between">
                    <span>Tipo</span>
                    <b>{{ $propiedad->tipoPropiedad->nombre ?? '-' }}</b>
                </div>

                <div class="flex justify-between">
                    <span>Operación</span>
                    <b>{{ $propiedad->operacion->nombre ?? '-' }}</b>
                </div>

                <div class="flex justify-between">
                    <span>Estado</span>
                    <b>{{ ucfirst($propiedad->estado) }}</b>
                </div>

            </div>
        </div>

        {{-- MEDIDAS --}}
        <div class="bg-white p-7 rounded-2xl shadow-sm">
            <h3 class="text-xl font-bold text-[#3E153D] mb-5">Medidas</h3>

            <div class="space-y-3 text-sm text-gray-600">

                <div class="flex justify-between">
                    <span>Terreno</span>
                    <b>{{ $propiedad->superficie_total ?? '-' }} m²</b>
                </div>

                @if ($propiedad->superficie_cubierta)
                    <div class="flex justify-between">
                        <span>Cubierta</span>
                        <b>{{ $propiedad->superficie_cubierta }} m²</b>
                    </div>
                @endif

                <div class="flex justify-between">
                    <span>Plantas</span>
                    <b>{{ $propiedad->cant_plantas ?? '-' }}</b>
                </div>

            </div>
        </div>

    </div>

    {{-- 🏡 EXTRAS + SERVICIOS --}}
    <div class="grid md:grid-cols-2 gap-6">

        <div class="bg-white p-7 rounded-2xl shadow-sm">
            <h3 class="text-xl font-bold text-[#3E153D] mb-5">Comodidades</h3>

            <div class="flex flex-wrap gap-3 text-sm">
                @if ($propiedad->tiene_jardin)
                    <span class="bg-gray-100 px-4 py-2 rounded-xl">🌿 Jardín</span>
                @endif
                @if ($propiedad->tiene_cochera)
                    <span class="bg-gray-100 px-4 py-2 rounded-xl">🚗 Cochera</span>
                @endif
            </div>
        </div>

        <div class="bg-white p-7 rounded-2xl shadow-sm">
            <h3 class="text-xl font-bold text-[#3E153D] mb-5">Servicios</h3>

            <div class="grid grid-cols-2 gap-3 text-sm">
                <div>{{ $propiedad->luz ? '✔️ Luz' : '❌ Luz' }}</div>
                <div>{{ $propiedad->gas ? '✔️ Gas' : '❌ Gas' }}</div>
                <div>{{ $propiedad->calefaccion ? '✔️ Calefacción' : '❌ Calefacción' }}</div>
                <div>{{ $propiedad->calefaccion_extra ? '✔️ Extra' : '❌ Extra' }}</div>
            </div>
        </div>

    </div>

    {{-- 📝 DESCRIPCIÓN --}}
    @if ($propiedad->descripcion)
        <div class="bg-white p-8 rounded-2xl shadow-sm">
            <h2 class="text-2xl font-bold text-[#3E153D] mb-4">
                Sobre esta propiedad
            </h2>

            <p class="text-gray-600 leading-relaxed max-w-3xl">
                {{ $propiedad->descripcion }}
            </p>
        </div>
    @endif

</div>
</section>

{{-- 📩 FORMULARIO FULL --}}
<section id="formulario" class="py-28 px-4 md:px-10 bg-[#1E1E1E]">

    <div class="max-w-6xl mx-auto">

        <div class="mb-14 max-w-2xl">
            <h3 class="text-gray-500 mb-3 text-sm">Contacto</h3>

            <h2 class="text-[#EDCB2F] text-3xl md:text-4xl font-bold mb-4">
                Consultá por esta propiedad
            </h2>

            <p class="text-gray-300 text-sm">
                Dejanos tus datos y coordinamos una visita o te brindamos más información.
            </p>
        </div>

        <div class="grid md:grid-cols-2 gap-16">

            {{-- INFO --}}
            <div class="space-y-4">
                <div class="bg-white/5 p-5 rounded-xl">
                    <p class="text-[#EDCB2F] font-semibold">WhatsApp</p>
                    <p class="text-sm text-gray-400">Respuesta rápida</p>
                </div>

                <div class="bg-white/5 p-5 rounded-xl">
                    <p class="text-[#EDCB2F] font-semibold">Teléfono</p>
                    <p class="text-sm text-gray-400">+54 11 1234 5678</p>
                </div>

                <div class="bg-white/5 p-5 rounded-xl">
                    <p class="text-[#EDCB2F] font-semibold">Email</p>
                    <p class="text-sm text-gray-400">info@tuinmobiliaria.com</p>
                </div>
            </div>

            {{-- FORM --}}
            <form class="flex flex-col gap-4">

                <input type="text" placeholder="Nombre"
                    class="w-full rounded-xl py-3 px-4 text-sm bg-white border border-gray-300 focus:ring-2 focus:ring-[#EDCB2F]">

                <input type="email" placeholder="Email"
                    class="w-full rounded-xl py-3 px-4 text-sm bg-white border border-gray-300 focus:ring-2 focus:ring-[#EDCB2F]">

                <input type="text" placeholder="Teléfono (opcional)"
                    class="w-full rounded-xl py-3 px-4 text-sm bg-white border border-gray-300 focus:ring-2 focus:ring-[#EDCB2F]">

                <textarea rows="4"
                    class="w-full rounded-xl py-3 px-4 text-sm bg-white border border-gray-300 focus:ring-2 focus:ring-[#EDCB2F]">
Hola, me interesa "{{ $propiedad->titulo }}".
                </textarea>

                <button class="bg-[#EDCB2F] text-[#1E1E1E] font-semibold rounded-xl py-3 hover:bg-[#D4B02A] transition w-full">
                    Enviar consulta
                </button>

            </form>

        </div>

    </div>

</section>

{{-- 🔍 LIGHTBOX --}}
<div id="previewModal" class="fixed inset-0 bg-black/90 hidden items-center justify-center z-50"
    onclick="closePreview()">

    <img id="previewImage" class="max-w-[90%] max-h-[85%] rounded-xl">

</div>

<script>
function openPreview(src) {
    document.getElementById('previewImage').src = src;
    document.getElementById('previewModal').classList.remove('hidden');
    document.getElementById('previewModal').classList.add('flex');
}

function closePreview() {
    document.getElementById('previewModal').classList.add('hidden');
}

function scrollToForm() {
    document.getElementById('formulario').scrollIntoView({
        behavior: 'smooth'
    });
}
</script>

@endsection