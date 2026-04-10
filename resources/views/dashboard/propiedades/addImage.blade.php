@extends('dashboard.base')

@section('title', 'Nueva propiedad')

@section('content')

    <div class="w-full mx-auto mt-6 space-y-6">

        <!-- HEADER -->
        <div class="bg-[#3E153D] p-6 rounded-2xl shadow flex justify-between items-center">
            <div>
                <h2 class="text-lg font-bold text-white">Suma imagenes a tu propiedad</h2>
                <p class="text-sm text-white">Al menos una para la portada, y imaganes extras para la galeria de fotos cada
                    bez </p>
            </div>
        </div>

        <form action="{{ route('dashboard.propiedades.imagenes.store', $propiedad->id) }}" method="POST"
            enctype="multipart/form-data" x-data="imagenesForm()" class="bg-white p-6 rounded-2xl shadow space-y-2">
            @csrf

            <div>
                <h3 class="font-bold mb-1">Galería</h3>
                <p class="text-sm text-gray-600 mb-2">Agrega (+) imágenes para mostrar en la galería de tu propiedad.</p>
                <template x-for="(img, index) in imagenes" :key="index">
                    <div class="flex items-center justify-between space-x-4 mb-4 bg-gray-100 p-4 rounded-lg">

                        <input type="file" :name="'imagenes[]'" @change="previewImagen($event, index)" class="w-30">

                        <!-- preview -->
                        <img x-show="img.preview" :src="img.preview" class="w-20 h-20 object-cover rounded-lg">

                        <!-- eliminar -->
                        <button type="button" @click="eliminar(index)" class="text-red-600 hover:text-red-800 bg-red-100 px-2 py-1 rounded-lg">
                            ✕
                        </button>
                    </div>
                </template>

                <!-- botón agregar -->
                <button type="button" @click="agregar" class="bg-[#3E153D] text-white px-4 py-2 rounded-lg hover:bg-[#2c0f2b] transition">
                    +
                </button>
            </div>

            <!-- BOTÓN -->
            <div class="flex justify-end">
                <button class="bg-[#3E153D] text-white px-8 py-3 rounded-xl shadow hover:bg-[#2c0f2b] transition">
                    Guardar imágenes
                </button>
            </div>
            
        </form>

    </div>

@endsection


<script>
function imagenesForm() {
    return {
        portadaPreview: null,
        imagenes: [],

        agregar() {
            this.imagenes.push({ file: null, preview: null });
        },

        eliminar(index) {
            this.imagenes.splice(index, 1);
        },

        previewPortada(e) {
            const file = e.target.files[0];
            if (file) {
                this.portadaPreview = URL.createObjectURL(file);
            }
        },

        previewImagen(e, index) {
            const file = e.target.files[0];
            if (file) {
                this.imagenes[index].file = file;
                this.imagenes[index].preview = URL.createObjectURL(file);
            }
        }
    }
}
</script>