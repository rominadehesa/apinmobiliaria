<section class="py-32 px-64 bg-[#1E1E1E]">

    <!-- TITULOS -->
    <div class="col-span-2">
        <div class="mb-10">
            <h3 class="text-gray-600 mb-4">Contacto</h3>
            <h1 class="text-[#EDCB2F] text-4xl font-bold mb-4">Contanos qué necesitás</h1>
            <p class="text-white">Completá el formulario o escribinos y te asesoramos sin compromiso.</p>
        </div>
    </div>
    
    <div class="grid grid-cols-2 gap-16">
        <div class="col-span-1">
            <div class="pr-12 space-y-8">
                <!-- CANALES -->
                <div class="space-y-4">

                    <!-- WhatsApp -->
                    <a href="#" class="flex items-center gap-4 bg-white/5 hover:bg-white/10 transition p-4 rounded-xl">
                        
                        <div>
                            <p class="text-[#EDCB2F] font-semibold">WhatsApp</p>
                            <p class="text-sm text-gray-400">Escribinos para una respuesta rápida</p>
                        </div>
                    </a>

                    <!-- Teléfono -->
                    <a href="tel:+541112345678" class="flex items-center gap-4 bg-white/5 hover:bg-white/10 transition p-4 rounded-xl">
                       
                        <div>
                            <p class="text-[#EDCB2F] font-semibold">Teléfono</p>
                            <p class="text-sm text-gray-400">+54 11 1234 5678</p>
                        </div>
                    </a>

                    <!-- Email -->
                    <a href="mailto:info@tuinmobiliaria.com" class="flex items-center gap-4 bg-white/5 hover:bg-white/10 transition p-4 rounded-xl">
                        
                        <div>
                            <p class="text-[#EDCB2F] font-semibold">Email</p>
                            <p class="text-sm text-gray-400">info@tuinmobiliaria.com</p>
                        </div>
                    </a>

                    <!-- Oficina -->
                    <div class="flex items-center gap-4 bg-white/5 p-4 rounded-xl">
                        
                        <div>
                            <p class="text-[#EDCB2F] font-semibold">Oficina</p>
                            <p class="text-sm text-gray-400">Buenos Aires · Lun a Vie 9 a 18 hs</p>
                        </div>
                    </div>

                    <div class="flex items-center gap-4 bg-white/5 p-4 rounded-xl">
                        
                        <div>
                            <p class="text-[#EDCB2F] font-semibold">¿No nos conocés?</p>
                            <p class="text-sm text-gray-400"> 
                            <a href="#quienes-somos" class="text-sm text-white font-semibold hover:underline">
                                Conocer más sobre nosotros →
                            </a></p>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    
        <!-- FORMULARIO -->
        <div class="col-span-1">

            <form action="#" class="flex flex-col gap-3">

                <!-- Nombre -->
                <input 
                    type="text"
                    name="nombre"
                    placeholder="Nombre"
                    class="w-full rounded-xl py-3 px-4 text-sm border border-gray-300 focus:ring-2 focus:ring-[#EDCB2F]"
                >

                <!-- Email -->
                <input 
                    type="email"
                    name="email"
                    placeholder="Email"
                    class="w-full rounded-xl py-3 px-4 text-sm border border-gray-300 focus:ring-2 focus:ring-[#EDCB2F]"
                >

                <!-- Teléfono -->
                <input 
                    type="text"
                    name="telefono"
                    placeholder="Teléfono (opcional)"
                    class="w-full rounded-xl py-3 px-4 text-sm border border-gray-300 focus:ring-2 focus:ring-[#EDCB2F]"
                >

                <!-- Motivo -->
                <select name="motivo" class="w-full rounded-xl py-3 px-4 text-sm border border-gray-300 focus:ring-2 focus:ring-[#EDCB2F]">
                    <option value="">Motivo de consulta</option>
                    <option>Consulta general</option>
                    <option>Comprar propiedad</option>
                    <option>Alquilar</option>
                    <option>Invertir</option>
                    <option>Tasar mi propiedad</option>
                </select>

                <!-- Mensaje -->
                <textarea 
                    rows="4"
                    name="mensaje"
                    placeholder="Escribinos tu consulta..."
                    class="w-full rounded-xl py-3 px-4 text-sm border border-gray-300 focus:ring-2 focus:ring-[#EDCB2F]"
                ></textarea>

                <!-- CTA -->
                <button class="bg-[#EDCB2F] text-[#1E1E1E] mt-4 font-semibold rounded-xl py-3 hover:bg-[#D4B02A] transition w-full">
                    Enviar consulta
                </button>

                <!-- Nota -->
                <p class="text-xs text-gray-500 text-center mt-2">
                    Te respondemos a la brevedad
                </p>

            </form>

        </div>
    </div>
</section>