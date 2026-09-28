@extends('app.layout')

@section('content')

    <div class="">
        {{-- imagen header --}}
        <div class="relative h-[350px] md:h-[450px] w-full">
            <img src="{{ asset('images/imagenes_default/contacto_fondo.png') }}" alt=""
                class="absolute inset-0 z-0 w-full h-full object-center">
            <div class="absolute inset-0 flex items-center justify-center">
                <h1
                    class="flex justify-center text-['Nunito_Sans'] text-white font-semibold text-[50px] [text-shadow:_0_4px_4px_rgba(0,0,0,0.25)]">
                    Contacto
                </h1>
            </div>
        </div>
        @if (session('success'))
            <div class="flex justify-center mt-35">
                <p class="bg-orange-300/70 text-lg font-semibold py-2 px-2 rounded-[20px] font-['Nunito_Sans']">
                    {{ session('success') }}</p>

            </div>
        @endif
        @if ($errors->any())
            <div
                class="bg-[#FF4500] border border-red-400 text-lg font-semibold py-2 px-2 rounded-[20px] font-['Nunito_Sans'] flex justify-center mt-35">
                <strong class="font-bold">¡Por favor corrige los siguientes errores!</strong>
                <ul class="mt-2 list-disc list-inside text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <!-- Contenedor Principal con Alpine.js -->
        <div class="flex flex-row justify-between max-w-[1258px] gap-[200px] mt-[65px] mx-auto " x-data="{ tab: 'ventas' }">



            {{-- pesta;as correspondientes --}}
            <div class="flex flex-col gap-[30px] flex-shrink-0 w-[200px]">
                {{-- Boton ventas --}}
                <button @click="tab = 'ventas'"
                    :class="tab === 'ventas' ? 'text-[#ffa221] font-semibold ' : 'text-black font-semibold'"
                    class="text-left text-[20px] font-['Nunito_Sans'] flex items-center gap-[10px] transition-colors duration-200 hover:text-[#ffa221] cursor-pointer">
                    Ventas <span><svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M7.5 15L12.5 10L7.5 5" stroke="#FFA221" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                    </span>
                </button>

                {{-- Botón RRHH --}}
                <button @click="tab = 'rrhh'"
                    :class="tab === 'rrhh' ? 'text-[#ffa221] font-semibold ' : 'text-black font-semibold'"
                    class="text-left text-[20px] font-['Nunito_Sans'] flex items-center  transition-colors duration-200 hover:text-[#ffa221] cursor-pointer gap-[10px]">
                    RRHH <span><svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M7.5 15L12.5 10L7.5 5" stroke="#FFA221" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                    </span>
                </button>
            </div>

            {{-- formularios --}}
            <div class="max-w-[1258px] mx-auto w-full">

                {{-- Form Ventas con alpine --}}
                <form x-show="tab === 'ventas'" action="{{ route('contacto.store') }}" method="POST"
                    enctype="multipart/form-data" class="w-full">
                    @csrf
                    <input type="hidden" name="tipo_formulario" value="ventas">

                    <div class="grid grid-cols-2 gap-[25px] max-w-[1258px] mx-auto">
                        {{-- Razón Social  --}}
                        <div>
                            <label class="flex flex-col gap-[10px] font-['Nunito_Sans'] text-[#5c5c5c]">
                                Razón Social*
                                <input type="text" name="razon_social" value="{{ old('razon_social') }}" required
                                    class=" max-h-[45px] w-full py-[22.5px] px-3 border border-[#DCDCDC] rounded-[5px]">
                            </label>
                        </div>

                        {{-- CUIT  --}}
                        <div>
                            <label class="flex flex-col gap-[10px] font-['Nunito_Sans'] text-[#5c5c5c]">
                                CUIT (sin guiones)*
                                <input type="text" name="cuit" value="{{ old('cuit') }}" required
                                    class=" max-h-[45px] w-full py-[22.5px] px-3 border border-[#DCDCDC] rounded-[5px]">
                            </label>
                        </div>

                        {{-- Tipo de Negocio  --}}
                        <div>
                            <label class="flex flex-col gap-[10px] font-['Nunito_Sans'] text-[#5c5c5c]">
                                Tipo de Negocio*
                                <input type="text" name="tipo_negocio" value="{{ old('tipo_negocio') }}" required
                                    class=" max-h-[45px] w-full py-[22.5px] px-3 border border-[#DCDCDC] rounded-[5px]">
                            </label>
                        </div>

                        {{-- Trayectoria en el Mercado --}}
                        <div>
                            <label class="flex flex-col gap-[10px] font-['Nunito_Sans'] text-[#5c5c5c]">
                                Trayectoria en el mercado
                                <input type="text" name="trayectoria_mercado" value="{{ old('trayectoria_mercado') }}"
                                    class=" max-h-[45px] w-full py-[22.5px] px-3 border border-[#DCDCDC] rounded-[5px]">
                            </label>
                        </div>

                        {{-- Direccion --}}
                        <div>
                            <label class="flex flex-col gap-[10px] font-['Nunito_Sans'] text-[#5c5c5c]">
                                Dirección*
                                <input type="text" name="direccion" value="{{ old('direccion') }}" required
                                    class=" max-h-[45px] w-full py-[22.5px] px-3 border border-[#DCDCDC] rounded-[5px]">
                            </label>
                        </div>

                        {{-- Localidad --}}
                        <div>
                            <label class="flex flex-col gap-[10px] font-['Nunito_Sans'] text-[#5c5c5c]">
                                Localidad*
                                <input type="text" name="localidad" value="{{ old('localidad') }}" required
                                    class=" max-h-[45px] w-full py-[22.5px] px-3 border border-[#DCDCDC] rounded-[5px]">
                            </label>
                        </div>

                        {{-- Telefono --}}
                        <div>
                            <label class="flex flex-col gap-[10px] font-['Nunito_Sans'] text-[#5c5c5c]">
                                Teléfono*
                                <input type="text" name="telefono" value="{{ old('telefono') }}" required
                                    class=" max-h-[45px] w-full py-[22.5px] px-3 border border-[#DCDCDC] rounded-[5px]">
                            </label>
                        </div>

                        {{-- Celular --}}
                        <div>
                            <label class="flex flex-col gap-[10px] font-['Nunito_Sans'] text-[#5c5c5c]">
                                Celular*
                                <input type="text" name="celular" value="{{ old('celular') }}" required
                                    class=" max-h-[45px] w-full py-[22.5px] px-3 border border-[#DCDCDC] rounded-[5px]">
                            </label>
                        </div>

                        {{-- Horario de atencion --}}
                        <div>
                            <label class="flex flex-col gap-[10px] font-['Nunito_Sans'] text-[#5c5c5c]">
                                Horario de atención*
                                <input type="text" name="horario_atencion" value="{{ old('horario_atencion') }}"
                                    required
                                    class=" max-h-[45px] w-full py-[22.5px] px-3 border border-[#DCDCDC] rounded-[5px]">
                            </label>
                        </div>

                        {{-- Email --}}
                        <div>
                            <label class="flex flex-col gap-[10px] font-['Nunito_Sans'] text-[#5c5c5c]">
                                Correo Electrónico*
                                <input type="email" name="email" value="{{ old('email') }}" required
                                    class=" max-h-[45px] w-full py-[22.5px] px-3 border border-[#DCDCDC] rounded-[5px]">
                            </label>
                        </div>

                        {{-- Observaciones --}}
                        <div class="col-span-2">
                            <label class="flex flex-col gap-[10px] font-['Nunito_Sans'] text-[#5c5c5c]">
                                Observaciones*
                                <textarea name="observaciones" required class=" w-full p-3 border border-[#DCDCDC] rounded-[5px]" rows="4">{{ old('observaciones') }}</textarea>
                            </label>
                        </div>
                    </div>

                    {{-- Botón submit --}}
                    <div class="flex flex-row justify-between font-['Nunito_Sans'] items-center text-[#5c5c5c] mt-[36px]">
                        <p>*Campos obligatorios</p>
                        <button type="submit"
                            class="btn btn-primary px-[30px] py-[10px] bg-[#FFA221] text-white rounded-[20px] hover:bg-[#FFA221]/80 transition-colors duration-200">
                            Enviar consulta
                        </button>
                    </div>
                </form>

                {{-- FORMULARIO DE RRHH --}}
                <form x-show="tab === 'rrhh'" action="{{ route('contacto.store') }}" method="POST"
                    enctype="multipart/form-data" class="w-full" style="display: none;">
                    @csrf
                    <input type="hidden" name="tipo_formulario" value="rrhh">

                    <div class="grid grid-cols-2 gap-[25px] max-w-[1258px] mx-auto">
                        {{-- Nombre --}}
                        <div>
                            <label class="flex flex-col gap-[10px] font-['Nunito_Sans'] text-[#5c5c5c]">
                                Nombre y Apellido*
                                <input type="text" name="nombre" value="{{ old('nombre') }}" required
                                    class=" max-h-[45px] w-full py-[22.5px] px-3 border border-[#DCDCDC] rounded-[5px]">
                            </label>
                        </div>

                        {{-- Género --}}
                        <div>
                            <label class="flex flex-col gap-[10px] font-['Nunito_Sans'] text-[#5c5c5c]">
                                Género*
                                <select name="genero" required
                                    class=" max-h-[45px] w-full px-3 border border-[#DCDCDC] rounded-[5px] bg-white">
                                    <option value="">Seleccione...</option>
                                    <option value="Masculino" {{ old('genero') == 'Masculino' ? 'selected' : '' }}>
                                        Masculino</option>
                                    <option value="Femenino" {{ old('genero') == 'Femenino' ? 'selected' : '' }}>Femenino
                                    </option>
                                    <option value="Otro" {{ old('genero') == 'Otro' ? 'selected' : '' }}>Otro / Prefiero
                                        no decirlo</option>
                                </select>
                            </label>
                        </div>

                        {{-- Localidad --}}
                        <div>
                            <label class="flex flex-col gap-[10px] font-['Nunito_Sans'] text-[#5c5c5c]">
                                Localidad*
                                <input type="text" name="localidad" value="{{ old('localidad') }}" required
                                    class=" max-h-[45px] w-full py-[22.5px] px-3 border border-[#DCDCDC] rounded-[5px]">
                            </label>
                        </div>

                        {{-- Celular --}}
                        <div>
                            <label class="flex flex-col gap-[10px] font-['Nunito_Sans'] text-[#5c5c5c]">
                                Celular*
                                <input type="text" name="celular" value="{{ old('celular') }}" required
                                    class=" max-h-[45px] w-full py-[22.5px] px-3 border border-[#DCDCDC] rounded-[5px]">
                            </label>
                        </div>

                        {{-- Email --}}
                        <div class="col-span-2">
                            <label class="flex flex-col gap-[10px] font-['Nunito_Sans'] text-[#5c5c5c]">
                                Correo Electrónico*
                                <input type="email" name="email" value="{{ old('email') }}" required
                                    class=" max-h-[45px] w-full py-[22.5px] px-3 border border-[#DCDCDC] rounded-[5px]">
                            </label>
                        </div>

                        {{-- Currículum --}}
                        <div class="col-span-2">
                            <label class="flex flex-col gap-[10px] font-['Nunito_Sans'] text-[#5c5c5c]">
                                Currículum (PDF o Word)*
                                <input type="file" name="curriculum" accept=".pdf,.doc,.docx" required
                                    class=" max-h-[45px] w-full py-[10px] px-3 border border-[#DCDCDC] rounded-[5px]">
                            </label>
                        </div>
                    </div>

                    {{-- Botón envio RRHH --}}
                    <div class="flex flex-row justify-between font-['Nunito_Sans'] items-center text-[#5c5c5c] mt-[36px]">
                        <p>*Campos obligatorios</p>
                        <button type="submit"
                            class="btn btn-primary px-[30px] py-[10px] bg-[#FFA221] text-white rounded-[20px] hover:bg-[#FFA221]/80 transition-colors duration-200">
                            Enviar CV
                        </button>
                    </div>
                </form>

            </div>
        </div>

        {{-- Datos de contacto --}}
        <div class="flex flex-row max-w-[1258px] mx-auto font-['Nunito_Sans'] gap-[51px] mt-[137px]">
            <div class="flex flex-col gap-[25px] flex-shrink-0 max-w-[340px] w-full container">
                <h2 class="text-black text-[18px] font-bold leading-[25px]">
                    Datos de contacto
                </h2>
                <ul class="flex flex-col gap-[20px]">
                    <li class="flex flex-row gap-[11px]">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_2181_2473)">
                                <path
                                    d="M16.6666 8.33341C16.6666 13.3334 9.99992 18.3334 9.99992 18.3334C9.99992 18.3334 3.33325 13.3334 3.33325 8.33341C3.33325 6.5653 4.03563 4.86961 5.28587 3.61937C6.53612 2.36913 8.23181 1.66675 9.99992 1.66675C11.768 1.66675 13.4637 2.36913 14.714 3.61937C15.9642 4.86961 16.6666 6.5653 16.6666 8.33341Z"
                                    stroke="#FFA221" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                <path
                                    d="M10 10.8333C11.3807 10.8333 12.5 9.71396 12.5 8.33325C12.5 6.95254 11.3807 5.83325 10 5.83325C8.61929 5.83325 7.5 6.95254 7.5 8.33325C7.5 9.71396 8.61929 10.8333 10 10.8333Z"
                                    stroke="#FFA221" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </g>
                            <defs>
                                <clipPath id="clip0_2181_2473">
                                    <rect width="20" height="20" fill="white" />
                                </clipPath>
                            </defs>
                        </svg>
                        <p class="text-[#5c5c5c] leading-[25px]">Av. Otero y Gibraltar - Km 32 CP.1761
                            Pontevedra, Merlo, Buenos Aires, Argentina
                        </p>
                    </li>
                    <li class="flex flex-row gap-[11px]">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_2181_2476)">
                                <path
                                    d="M18.3334 14.0999V16.5999C18.3344 16.832 18.2868 17.0617 18.1939 17.2744C18.1009 17.487 17.9645 17.6779 17.7935 17.8348C17.6225 17.9917 17.4206 18.1112 17.2007 18.1855C16.9809 18.2599 16.7479 18.2875 16.5168 18.2666C13.9525 17.988 11.4893 17.1117 9.32511 15.7083C7.31163 14.4288 5.60455 12.7217 4.32511 10.7083C2.91676 8.53426 2.04031 6.05908 1.76677 3.48325C1.74595 3.25281 1.77334 3.02055 1.84719 2.80127C1.92105 2.58199 2.03975 2.38049 2.19575 2.2096C2.35174 2.03871 2.54161 1.90218 2.75327 1.80869C2.96492 1.7152 3.19372 1.6668 3.42511 1.66658H5.92511C6.32953 1.6626 6.7216 1.80582 7.02824 2.06953C7.33488 2.33324 7.53517 2.69946 7.59177 3.09992C7.69729 3.89997 7.89298 4.68552 8.17511 5.44158C8.28723 5.73985 8.31149 6.06401 8.24503 6.37565C8.17857 6.68729 8.02416 6.97334 7.80011 7.19992L6.74177 8.25825C7.92807 10.3445 9.65549 12.072 11.7418 13.2583L12.8001 12.1999C13.0267 11.9759 13.3127 11.8215 13.6244 11.755C13.936 11.6885 14.2602 11.7128 14.5584 11.8249C15.3145 12.107 16.1001 12.3027 16.9001 12.4083C17.3049 12.4654 17.6746 12.6693 17.9389 12.9812C18.2032 13.2931 18.3436 13.6912 18.3334 14.0999Z"
                                    stroke="#FFA221" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </g>
                            <defs>
                                <clipPath id="clip0_2181_2476">
                                    <rect width="20" height="20" fill="white" />
                                </clipPath>
                            </defs>
                        </svg>
                        <p class="text-[#5c5c5c] leading-[25px]">0220.492.4752</p>
                    </li>
                    <li class="flex flex-row gap-[11px]">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M16.6667 3.33325H3.33341C2.41294 3.33325 1.66675 4.07944 1.66675 4.99992V14.9999C1.66675 15.9204 2.41294 16.6666 3.33341 16.6666H16.6667C17.5872 16.6666 18.3334 15.9204 18.3334 14.9999V4.99992C18.3334 4.07944 17.5872 3.33325 16.6667 3.33325Z"
                                stroke="#FFA221" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            <path
                                d="M18.3334 5.83325L10.8584 10.5833C10.6011 10.7444 10.3037 10.8299 10.0001 10.8299C9.69648 10.8299 9.39902 10.7444 9.14175 10.5833L1.66675 5.83325"
                                stroke="#FFA221" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <p class="text-[#5c5c5c] leading-[25px]">ventas@nikitos.com.ar</p>
                    </li>
                    <li class="flex flex-row gap-[11px]">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_2181_2481)">
                                <path
                                    d="M10.0001 5.00008V10.0001H13.7501M18.3334 10.0001C18.3334 14.6025 14.6025 18.3334 10.0001 18.3334C5.39771 18.3334 1.66675 14.6025 1.66675 10.0001C1.66675 5.39771 5.39771 1.66675 10.0001 1.66675C14.6025 1.66675 18.3334 5.39771 18.3334 10.0001Z"
                                    stroke="#FFA221" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </g>
                            <defs>
                                <clipPath id="clip0_2181_2481">
                                    <rect width="20" height="20" fill="white" />
                                </clipPath>
                            </defs>
                        </svg>
                        <p class="text-[#5c5c5c] leading-[25px]">Lunes a Viernes 9.00 a 17:30hs</p>
                    </li>
                </ul>
            </div>
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6556.517275002196!2d-58.70301200287691!3d-34.74907709160986!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bcc3005351a2e3%3A0x6d9610dbfa3b53c5!2s68W2%2B6P%20Pontevedra%2C%20Provincia%20de%20Buenos%20Aires!5e0!3m2!1ses-419!2sar!4v1790450800826!5m2!1ses-419!2sar"
                height="500" class="w-full mx-auto rounded-[20px] flex-1 grayscale-90" style="border:0;"
                allowfullscreen="" loading="lazy" referrerpolicy="strict-origin-when-cross-origin">
            </iframe>
        </div>
    </div>
@endsection
