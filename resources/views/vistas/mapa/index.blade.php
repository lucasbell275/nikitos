@extends('app.layout')

@section('content')
    <div>
        <div class="relative h-[350px] md:h-[450px] w-full">
            <img src="{{ asset('images/imagenes_default/papas_relleno.png') }}" alt=""
                class="inset-0 z-0 w-full h-full object-center">
            <div class="absolute inset-0 flex items-center justify-center">
                <h1
                    class="flex justify-center text-['Nunito_Sans'] text-white font-semibold text-[50px] [text-shadow:_0_4px_4px_rgba(0,0,0,0.25)]">
                    Donde comprar</h1>
            </div>
        </div>

        <div class="flex flex-col lg:flex-row max-w-[1258px] mx-auto gap-[40px] px-4 lg:px-0">
            <div class="flex flex-col mt-[88px] w-full lg:w-[318px] lg:shrink-0">
                <div class="flex flex-row gap-[10px] font-['Nunito_Sans']">
                    <div
                        class="relative flex flex-row justify-between px-[10px] items-center gap-[43px] text-[#5c5c5c] font-['Nunito_Sans'] cursor-pointer border border-[#DEDEDE] py-[10px] max-w-[170px] w-full">
                        <label for="filtro-provincia" class="sr-only">Provincia</label>
                        <select id="filtro-provincia"
                            class="absolute inset-0 h-full w-full appearance-none bg-transparent pl-[10px] pr-[28px] text-[14px] outline-none"
                            aria-label="Filtrar por provincia">
                            <option value="">Provincia</option>
                        </select>
                        <span class="invisible" aria-hidden="true">Provincia</span>
                        <svg width="16" height="16" class="mr-[6px] shrink-0 pointer-events-none" viewBox="0 0 16 16"
                            fill="none" aria-hidden="true">
                            <path d="M7.54736 3.33337V12.6667" stroke="#5C5C5C" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M11.9496 8L7.54705 12.6667L3.14453 8" stroke="#5C5C5C" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                    </div>
                    <div
                        class="relative flex flex-row justify-between items-center gap-[43px] text-[#5c5c5c] font-['Nunito_Sans'] cursor-pointer ml-[2px] px-[10px] border border-[#DEDEDE] py-[10px] max-w-[170px] w-full">
                        <label for="filtro-ciudad" class="sr-only">Ciudad</label>
                        <select id="filtro-ciudad"
                            class="absolute inset-0 h-full w-full appearance-none bg-transparent pl-[10px] pr-[28px] text-[14px] outline-none"
                            aria-label="Filtrar por ciudad">
                            <option value="">Ciudad</option>
                        </select>
                        <span class="invisible" aria-hidden="true">Ciudad</span>
                        <svg width="16" height="16" class="mr-[6px] shrink-0 pointer-events-none cursor-pointer"
                            viewBox="0 0 16 16" fill="none" aria-hidden="true">
                            <path d="M7.54736 3.33337V12.6667" stroke="#5C5C5C" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M11.9496 8L7.54705 12.6667L3.14453 8" stroke="#5C5C5C" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>

                    </div>
                    <button type="button" id="abrir-busqueda" aria-label="Buscar direcciones" aria-expanded="false"
                        class="shrink-0 cursor-pointer">
                        <svg width="24" height="25" viewBox="0 0 24 25" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M11 19.0734C15.4183 19.0734 19 15.4779 19 11.0425C19 6.60716 15.4183 3.0116 11 3.0116C6.58172 3.0116 3 6.60716 3 11.0425C3 15.4779 6.58172 19.0734 11 19.0734Z"
                                stroke="#FFA221" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M21 21.0811L16.7 16.7645" stroke="#FFA221" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>

                    </button>

                </div>
                <label for="buscar-direccion" class="sr-only">Buscar por dirección o distribuidor</label>
                <input id="buscar-direccion" type="search" placeholder="Buscar dirección" hidden
                    class="mt-[10px] w-full border border-[#DEDEDE] px-[10px] py-[10px] font-['Nunito_Sans'] text-[14px] text-[#5c5c5c] outline-none">

                <div id="lista-distribuidores"
                    class="border-t border-gray-200 mt-[25px] max-w-[373px] max-h-[530px] overflow-y-auto divide-y divide-[#DCDCDC] [&::-webkit-scrollbar]:w-1.5 [&::-webkit-scrollbar-track]:bg-[#f2f2f2] [&::-webkit-scrollbar-thumb]:bg-[#E4E4E4] [&::-webkit-scrollbar-thumb:hover]:bg-[#E4E4E4] [scrollbar-color:#E4E4E4_#f2f2f2] [scrollbar-width:thin] appearance-none">
                    @forelse ($distribuidores as $distribuidor)
                        <button type="button" data-distribuidor-id="{{ $distribuidor->id }}"
                            class="border-b border-gray-200 py-2 flex flex-col gap-[4px] w-full text-left">
                            <h2 class="mb-2 font-['Nunito_Sans'] text-[#5C5C5C] text-[18px] font-medium">
                                {{ $distribuidor->nombre }}</h2>
                            <p class="font-['Nunito_Sans'] text-[#5C5C5C] leading-[22px] text-[14px]">
                                {{ $distribuidor->ciudad }}</p>
                            <p class="font-['Nunito_Sans'] text-[#5C5C5C] leading-[22px] text-[14px]">
                                {{ $distribuidor->provincia }}</p>
                            <p class="font-['Nunito_Sans'] text-[#5C5C5C] leading-[22px] text-[14px]">
                                {{ $distribuidor->direccion }}</p>
                        </button>
                    @empty
                        <p class="py-6 text-[14px] text-[#5C5C5C]">Todavía no hay distribuidores disponibles.</p>
                    @endforelse
                    <p id="sin-resultados" hidden class="py-6 text-[14px] text-[#5C5C5C]">No se encontraron distribuidores.
                    </p>
                </div>
            </div>
            <div id="mapa-distribuidores" role="region" aria-label="Mapa de distribuidores"
                data-logo-url="{{ asset('images/components/header/logo.png') }}"
                class="rounded-[20px] mt-[88px] w-full lg:w-[900px] h-[824px] overflow-hidden"></div>
        </div>
    </div>

    <script id="datos-distribuidores" type="application/json">@json($mapLocations)</script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="">
    <style>
        #lista-distribuidores [hidden],
        #buscar-direccion[hidden],
        #sin-resultados[hidden] {
            display: none !important;
        }

        #mapa-distribuidores .leaflet-tile-pane {
            filter: grayscale(1);
        }

        #mapa-distribuidores .leaflet-marker-pane {
            filter: none;
        }

        .nikitos-marker {
            width: 42px;
            height: 42px;
            background: #ffa221;
            border-radius: 50% 50% 50% 0;
            transform: rotate(-45deg);
            border: 2px solid #fff;
            box-shadow: 0 2px 5px #0005;
        }

        .nikitos-marker img {
            width: 32px;
            height: 24px;
            object-fit: contain;
            transform: rotate(45deg);
            margin: 8px 0 0 3px;
        }
    </style>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <script src="{{ asset('js/distribuidores-mapa.js') }}" defer></script>
@endsection
