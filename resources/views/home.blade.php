@extends('base')

@section('title', 'Inicio')


@section('header_title', 'Explorar todas las propiedades')
@section('header_subtitle', 'Encontrá tu próxima propiedad')


@section('content')
    <section class="py-32 px-64 pt-0 bg-[#F1F1F1]">
        <div class="flex justify-center">
            <svg width="52" height="109" viewBox="0 0 52 109" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 0H52V89C52 100.046 43.0457 109 32 109H20C8.9543 109 0 100.046 0 89V0Z" fill="#EDCB2F" />
            </svg>
        </div>
        <div class="text-center mt-12">
            <h3 class="text-gray-400 mb-4">Nuestros servicios</h3>
            <h1 class="text-[#1E1E1E] text-4xl font-bold mb-4">¿Cómo podemos ayudarte?</h1>
            <p class="text-gray-600">Trabajamos con un enfoque basado en la confianza, la transparencia y el acompañamiento
                profesional. Nos especializamos en la intermediación de propiedades urbanas y rurales, brindando
                asesoramiento claro y responsable en cada etapa del proceso.</p>
        </div>
        <div class="grid grid-cols-3 gap-6 mt-16">
            <article
                class="bg-white rounded-2xl shadow-lg group 
transition-all duration-300 
hover:-translate-y-1 hover:shadow-xl 
flex flex-col justify-between h-full">

                <div class="bg-[#3E153D] text-white p-6 rounded-t-2xl group-hover:bg-[#4C1C4B] transition-colors">
                    <h2 class="text-sm font-semibold leading-tight">
                        Estrategia de venta
                    </h2>
                </div>

                <div class="py-10 px-6">
                    <p class="text-[#1E1E1E] font-black text-xl mb-4 leading-tight">
                        Vendé tu propiedad <br> al mejor valor
                    </p>

                    <p class="text-gray-600 mb-8 text-sm">
                        Creamos un plan de marketing a medida, con publicidad segmentada, fotos y videos profesionales para
                        lograr más visibilidad y mejores resultados.
                    </p>

                    <div class="flex justify-end">
                        <button
                            class="bg-[#EDCB2F] text-white text-sm font-semibold rounded-2xl py-2 px-6 hover:bg-[#D4B02A]">
                            Consultar
                        </button>
                    </div>
                </div>

            </article>
            <article
                class="bg-white rounded-2xl shadow-lg group 
transition-all duration-300 
hover:-translate-y-1 hover:shadow-xl 
flex flex-col justify-between h-full">

                <div class="bg-[#3E153D] text-white p-6 rounded-t-2xl group-hover:bg-[#4C1C4B] transition-colors">
                    <h2 class="text-sm font-semibold leading-tight">
                        Valor de mercado
                    </h2>
                </div>

                <div class="py-10 px-6">
                    <p class="text-[#1E1E1E] font-black text-xl mb-4 leading-tight">
                        Tasaciones precisas y confiables
                    </p>

                    <p class="text-gray-600 mb-8 text-sm">
                        Determinamos el valor real de tu propiedad mediante un análisis detallado del mercado y un informe
                        personalizado.
                    </p>

                    <div class="flex justify-end">
                        <button
                            class="bg-[#EDCB2F] text-white text-sm font-semibold rounded-2xl py-2 px-6 hover:bg-[#D4B02A]">
                            Consultar
                        </button>
                    </div>
                </div>

            </article>
            <article
               class="bg-white rounded-2xl shadow-lg group 
transition-all duration-300 
hover:-translate-y-1 hover:shadow-xl 
flex flex-col justify-between h-full">
                <div class="bg-[#3E153D] text-white p-6 rounded-t-2xl group-hover:bg-[#4C1C4B] transition-colors">
                    <h2 class="text-sm font-semibold leading-tight">
                        Seguridad legal
                    </h2>
                </div>

                <div class="py-10 px-6">
                    <p class="text-[#1E1E1E] font-black text-xl mb-4 leading-tight">
                        Revisamos la documentación de tu propiedad
                    </p>

                    <p class="text-gray-600 mb-8 text-sm">
                        Analizamos que toda la documentación esté en condiciones para una operación segura y sin
                        inconvenientes.
                    </p>

                    <div class="flex justify-end">
                        <button
                            class="bg-[#EDCB2F] text-white text-sm font-semibold rounded-2xl py-2 px-6 hover:bg-[#D4B02A]">
                            Consultar
                        </button>
                    </div>
                </div>

            </article>
        </div>
    </section>
    @include('sections.featured_properties')
    @include('sections.investment_opportunity')
    @include('sections.form_search')
    @include('sections.team_ap')
@endsection
