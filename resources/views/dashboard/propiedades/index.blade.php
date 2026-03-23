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
            A continuación,  encontrarás el listado completo con sus detalles.
         </p>
      </div>
      <div>
         <a href="" class="bg-[#3E153D] text-white text-sm font-medium px-6 py-2 rounded-xl transition shadow-sm">
            Agregar propiedad
         </a>
      </div>
   </section>
   <br>
   <section>
      <h2 class="text-lg font-bold text-gray-800">Todas las propiedades</h2>
      <div class="flex items-center gap-4 mt-2">
         <p class="text-gray-500 text-sm"> Filtrar por:</p>
         <div class="flex gap-2">
            <button class="px-4 py-1.5 text-sm font-medium rounded-full bg-[#3E153D] border text-white hover:bg-gray-200 transition">
               En venta
            </button>
            <button class="px-4 py-1.5 text-sm font-medium rounded-full bg-gray-100 text-gray-600 hover:bg-gray-200 transition">
               Duplex
            </button>
            <button class="px-4 py-1.5 text-sm font-medium rounded-full bg-gray-100 text-gray-600 hover:bg-gray-200 transition">
               Casa
            </button>
            <button class="px-4 py-1.5 text-sm font-medium rounded-full bg-gray-100 text-gray-600 hover:bg-gray-200 transition">
               Terreno
            </button>
         </div>
      </div>
   </section>
   <section>
      <div class="mt-8 bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
         <table class="min-w-full divide-y divide-gray-300 rounded-xl">
            
            <!-- Header -->
            <thead class="bg-gray">
               <tr class="text-sm font-semibold text-gray-600">
                  <th class="px-4 text-start py-2">Propiedad</th>
                  <th class="px-4 text-start py-2">Operación</th>
                  <th class="px-4 text-start py-2">Tipo</th>
                  <th class="px-4 text-start py-2">Descripcion</th>
                  <th class="px-4 text-start py-2">Metros Cuadrados</th>
                  <th class="px-4 text-start py-2">Detalles extras</th>
                  <th class="px-4 text-start py-2">Imagenes</th>
                  <th class="px-4 text-start py-2 text-right">Acciones</th>
               </tr>
            </thead>

            <!-- Body -->
            <tbody class="divide-y divide-gray-100 text-sm text-gray-700">

               @forelse($propiedades as $propiedad)
                  <tr class="hover:bg-gray-50 transition">

                     <td class="px-4 text-start py-2">
                        <div class="font-medium text-gray-800">
                           {{ $propiedad->titulo }}
                        </div>
                     </td>

                     <td class="px-4 text-start py-2">
                        <div class="font-medium text-gray-800">
                           {{ $propiedad->operacion->nombre }}
                        </div>
                     </td>

                    <td class="px-4 text-start py-2">
                        <div class="font-medium text-gray-800">
                           {{ $propiedad->tipoPropiedad->nombre }}
                        </div>
                     </td>

                     <td class="px-4 text-start py-2">
                        <div class="font-medium text-gray-800">
                           {{ $propiedad->descripcion }}
                        </div>
                     </td>

                      <td class="px-4 text-start py-2">
                        <div class="font-medium text-gray-800">
                           {{ $propiedad->metros_cuadrados }} m²
                        </div>
                     </td>

                     <td class="px-4 text-start py-2">
                        <div class="font-medium text-gray-800">
                           {{ $propiedad->banios }} baños | 
                           {{ $propiedad->habitaciones }} habitaciones 
                        </div>
                     </td>

                      <td class="px-4 text-start py-2">
                        <div class="font-medium text-gray-800">
                           Ver imagenes
                        </div>
                     </td>

                     <!-- Acciones -->
                     <td class="px-4 text-start py-2 text-right">
                        <div class="flex justify-end gap-3">

                           <a href=""
                              class="text-indigo-600 hover:text-indigo-800 text-sm font-medium">
                              Editar
                           </a>

                           <form action="" method="POST">
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
                  <!-- Empty state -->
                  <tr>
                     <td colspan="5" class="px-6 py-10 text-center text-gray-500">
                        No hay propiedades registradas todavía.
                     </td>
                  </tr>
               @endforelse

            </tbody>
         </table>
      </div>
   </section>
   
@endsection