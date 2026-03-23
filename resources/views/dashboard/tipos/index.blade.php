@extends('dashboard.base')

@section('title', 'Tipos de Propiedad')

@section('content')

<section 
x-data="{
    open: false,
    editMode: false,
    tipo: { id: null, nombre: '' },

    openCreate() {
        this.open = true
        this.editMode = false
        this.tipo = { id: null, nombre: '' }
    },

    openEdit(tipo) {
        this.open = true
        this.editMode = true
        this.tipo = { ...tipo }
    }
}"
>

<!-- Header -->
<div class="bg-white mt-6 py-4 px-6 rounded-xl shadow flex items-center justify-between">
   <div>
      <h2 class="text-md font-bold text-gray-800">
         Tipos de propiedad
      </h2>
      
      <p class="text-gray-500 text-sm">
         Gestioná los tipos de propiedades que vas a usar en tus publicaciones.
      </p>
   </div>

   <!-- Botón crear -->
   <div>
      <button @click="openCreate()"
         class="bg-[#3E153D] text-white text-sm font-medium px-6 py-2 rounded-xl shadow-sm">
         Agregar tipo de propiedad
      </button>
   </div>
</div>

<br>

<!-- Listado -->
<div>
   <h2 class="text-lg font-bold text-gray-800">Listado</h2>

   <div class="mt-8 bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
      
      <table class="min-w-full divide-y divide-gray-300">
         
         <!-- Header -->
         <thead>
            <tr class="text-sm font-semibold text-gray-600">
               <th class="px-6 py-3 text-left">Nombre</th>
               <th class="px-6 py-3 text-right">Acciones</th>
            </tr>
         </thead>

         <!-- Body -->
         <tbody class="divide-y divide-gray-100 text-sm text-gray-700">

            @forelse($tipos as $tipo)
               <tr class="hover:bg-gray-50 transition">

                  <td class="px-6 py-3">
                     <span class="font-medium text-gray-800">
                        {{ $tipo->nombre }}
                     </span>
                  </td>

                  <td class="px-6 py-3 text-right">
                     <div class="flex justify-end gap-3">

                        <!-- Editar -->
                        <button 
                           @click="openEdit({ id: {{ $tipo->id }}, nombre: '{{ $tipo->nombre }}' })"
                           class="text-indigo-600 hover:text-indigo-800 text-sm font-medium">
                           Editar
                        </button>

                        <!-- Eliminar -->
                        <form action="{{ route('dashboard.tipos.destroy', $tipo->id) }}" 
                              method="POST"
                              onsubmit="return confirm('¿Seguro que querés eliminar este tipo?')">
                           @csrf
                           @method('DELETE')

                           <button class="text-red-600 hover:text-red-800 text-sm font-medium">
                              Eliminar
                           </button>
                        </form>

                     </div>
                  </td>

               </tr>

            @empty
               <tr>
                  <td colspan="2" class="px-6 py-10 text-center text-gray-500">
                     No hay tipos de propiedad creados todavía.
                  </td>
               </tr>
            @endforelse

         </tbody>

      </table>

   </div>
</div>

<!-- MODAL -->
<div x-show="open" 
     x-transition
     class="fixed inset-0 flex items-center justify-center z-50">

   <!-- Overlay -->
   <div class="absolute inset-0 bg-black/50" @click="open = false"></div>

   <!-- Contenido -->
   <div class="relative bg-white rounded-2xl shadow-xl w-full max-w-md p-6">

      <!-- Header -->
      <div class="flex justify-between items-center mb-4">
         <h2 class="text-lg font-bold text-gray-800" x-text="editMode ? 'Editar tipo' : 'Nuevo tipo de propiedad'"></h2>

         <button @click="open = false" class="text-gray-400 hover:text-gray-600">
            ✕
         </button>
      </div>

      <!-- Form -->
      <form 
    :action="editMode 
        ? `{{ route('dashboard.tipos.update', ':id') }}`.replace(':id', tipo.id)
        : `{{ route('dashboard.tipos.save') }}`" 
    method="POST">

         @csrf

         <!-- PUT si es edición -->
         <template x-if="editMode">
            <input type="hidden" name="_method" value="PUT">
         </template>

         <div class="mb-4">
            <label class="block text-sm text-gray-600 mb-1">
               Nombre
            </label>

            <input 
               type="text" 
               name="nombre"
               x-model="tipo.nombre"
               class="w-full border border-gray-300 rounded-xl px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[#3E153D]"
               placeholder="Ej: Casa, Departamento..."
            >
         </div>

         <!-- Botones -->
         <div class="flex justify-end gap-3">
            <button type="button" 
               @click="open = false"
               class="px-4 py-2 text-sm text-gray-600">
               Cancelar
            </button>

            <button type="submit"
               class="bg-[#3E153D] text-white px-4 py-2 rounded-xl text-sm">
               Guardar
            </button>
         </div>

      </form>

   </div>
</div>

</section>

@endsection