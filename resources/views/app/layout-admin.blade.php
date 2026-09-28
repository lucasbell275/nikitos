<!DOCTYPE html>
<html lang="en" class="overflow-x-hidden">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nikitos</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('images/imagenes_default/favicon.ico') }}">
    <link rel="stylesheet" href="{{ asset('css/motion.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script defer src="{{ asset('js/motion.js') }}"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap');
    </style>
</head>

<body data-motion-scope="admin">
    <div class="flex h-screen overflow-hidden font-['Nunito_Sans'] ">
        <aside class="flex flex-col h-full flex-shrink-0 p-3 bg-white border-x   border-[#DCDCDC] gap-6 max-w-[600px]">
            <a href="{{ route('home') }}" class="flex items-center">
                <img src="{{ asset('images/components/header/logo.png') }}" alt="" class=" h-[100px]">
            </a>



            <nav
                class="overflow-y-auto divide-y divide-[#DCDCDC] mt-[35px] flex flex-col px-5 gap-5 max-h-[400px]  scrollbar-thumb-[#ffa221]/50 scrollbar-track-[#ffa221]/20">
                <div
                    class="flex flex-row items-center gap-2 border-b border-[#F29109]/40 group group-hover:text-[#F29109]/60  transition-colors duration-300 ">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24">
                        <title>dashboard-outline-rounded</title>
                        <path fill="currentColor"
                            d="M13.5 8.183V4.817q0-.357.234-.587t.58-.23h4.88q.347 0 .576.23t.23.587v3.366q0 .358-.234.587q-.234.23-.58.23h-4.88q-.346 0-.576-.23t-.23-.587M4 11.2V4.8q0-.34.234-.57t.58-.23h4.88q.347 0 .576.23t.23.57v6.4q0 .34-.234.57t-.58.23h-4.88q-.346 0-.576-.23T4 11.2m9.5 8v-6.4q0-.34.234-.57t.58-.23h4.88q.347 0 .576.23t.23.57v6.4q0 .34-.234.57t-.58.23h-4.88q-.346 0-.576-.23t-.23-.57M4 19.183v-3.366q0-.357.234-.587t.58-.23h4.88q.347 0 .576.23t.23.587v3.366q0 .358-.234.587q-.234.23-.58.23h-4.88q-.346 0-.576-.23T4 19.183M5 11h4.5V5H5zm9.5 8H19v-6h-4.5zm0-11H19V5h-4.5zM5 19h4.5v-3H5zm4.5-3" />
                    </svg>
                    <a href="{{ route('admin.dashboard') }}"
                        class="font-semibold text-black mt-1 group-hover:text-[#F29109]/60   duration-300">

                        Dashboard
                    </a>
                </div>
                <div
                    class="flex flex-row items-center gap-2 border-b border-[#F29109]/40 group group-hover:text-[#F29109]/60  transition-colors duration-300 ">
                    <svg xmlns="http://www.w3.org/2000/svg" class="group-hover:text-[#F29109]/60  duration-300"
                        width="24px" height="24px" viewBox="0 0 24 24">
                        <title>home-outline</title>
                        <path fill="currentColor"
                            d="M6 19h3v-6h6v6h3v-9l-6-4.5L6 10zm-2 2V9l8-6l8 6v12h-7v-6h-2v6zm8-8.75" />
                    </svg>
                    <a href="{{ route('admin.home.edit') }}"
                        class="font-semibold text-black mt-1 group-hover:text-[#F29109]/60   duration-300">

                        Editar Home
                    </a>
                </div>
                <div x-data="{ openSubmenu: false }" class="flex flex-col">


                    <div @click="openSubmenu = !openSubmenu"
                        class="flex flex-row items-center justify-between border-b border-[#F29109]/40 cursor-pointer group transition-colors duration-300">

                        <div class="flex flex-row items-center gap-2">

                            <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                class="group-hover:text-[#F29109]/60 duration-300" viewBox="0 0 32 32">
                                <title>potato</title>
                                <g fill="currentColor">
                                    <path
                                        d="M19.967 7.946a1.4 1.4 0 1 0 0-2.8a1.4 1.4 0 0 0 0 2.8m.36 5.55a1.83 1.83 0 1 1-3.66 0a1.83 1.83 0 0 1 3.66 0m-8.65 5.51a1.68 1.68 0 1 1-3.36 0a1.68 1.68 0 0 1 3.36 0m-.37 6.03a1.16 1.16 0 1 0 0-2.32a1.16 1.16 0 0 0 0 2.32m14.35-10.38a1.16 1.16 0 1 1-2.32 0a1.16 1.16 0 0 1 2.32 0" />
                                    <path
                                        d="M23.684 2.021A10.706 10.706 0 0 0 10.49 5.374l-5.24 7.14c-4.323 5.888-2.188 14.26 4.42 17.367c5.834 2.746 12.772.206 15.474-5.635a2294 2294 0 0 0 2.413-5.225l1.297-2.817c2.46-5.34.154-11.67-5.171-14.183m-11.58 4.536A8.706 8.706 0 0 1 22.83 3.83c4.335 2.046 6.209 7.196 4.209 11.537l-1.297 2.816v.002c-.65 1.41-.665 1.444-2.413 5.22c-2.237 4.839-7.98 6.938-12.806 4.666c-5.471-2.573-7.237-9.502-3.66-14.374z" />
                                </g>
                            </svg>

                            <span class="font-semibold text-black mt-1 group-hover:text-[#F29109]/60 duration-300">
                                Ver Productos
                            </span>
                        </div>


                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="h-4 w-4 text-gray-500 transition-transform duration-300"
                            :class="{ 'rotate-180': openSubmenu }" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </div>


                    <div x-show="openSubmenu" x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 -translate-y-2"
                        x-transition:enter-end="opacity-100 translate-y-0"
                        x-transition:leave="transition ease-in duration-150"
                        x-transition:leave-start="opacity-100 translate-y-0"
                        x-transition:leave-end="opacity-0 -translate-y-2"
                        class="flex flex-col pl-8 py-2 gap-2 bg-gray-50/50 border-b border-[#F29109]/40"
                        style="display: none;">
                        <a href="{{ route('admin.categorias.index') }}"
                            class="text-sm font-medium text-gray-700 font-['Nunito_Sans'] hover:text-[#F29109] transition-colors py-1">
                            Ver categorías
                        </a>
                        <a href="{{ route('admin.productos.index') }}"
                            class="text-sm font-medium text-gray-700 hover:text-[#F29109] font-['Nunito_Sans'] transition-colors py-1">
                            Ver productos
                        </a>


                    </div>

                </div>
                <div
                    class="flex flex-row items-center gap-2 border-b border-[#F29109]/40 group group-hover:text-[#F29109]/60 transition-colors duration-300 ">
                    <svg xmlns="http://www.w3.org/2000/svg" class="group-hover:text-[#F29109]/60  duration-300"
                        width="24px" height="24px" viewBox="0 0 16 16">
                        <title>distribution-filled</title>
                        <path fill="currentColor" fill-rule="evenodd"
                            d="M3 2h7v2h3.25L15 6.333V12.5h-1.063a2 2 0 0 1-3.874 0H5.437a2 2 0 1 1 0-1h4.626a2 2 0 0 1 3.874 0H14V7H9V3H3zm3.5 4H2V5h4.5zm-1 3H1V8h4.5zm-2 2a1 1 0 1 0 0 2a1 1 0 0 0 0-2m8.5 0a1 1 0 1 0 0 2a1 1 0 0 0 0-2"
                            clip-rule="evenodd" />
                    </svg>
                    <a href="{{ route('admin.mapa.index') }}"
                        class="font-semibold text-black mt-1 group-hover:text-[#F29109]/60   duration-300">

                        Ver Distribuidores
                    </a>
                </div>
                <div
                    class="flex flex-row items-center gap-2 border-b border-[#F29109]/40 group group-hover:text-[#F29109]/60 transition-colors duration-300 ">
                    <svg xmlns="http://www.w3.org/2000/svg" class="group-hover:text-[#F29109]/60  duration-300"
                        width="24px" height="24px" viewBox="0 0 24 24">
                        <title>dish-02</title>
                        <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-width="1.5">
                            <path d="M21 17a5 5 0 0 1 0-10" />
                            <path d="M21 21a9 9 0 1 1 0-18" />
                            <path stroke-linejoin="round" d="M6 3v5m0 13V11M3.5 8h5M9 3v4.352c0 4.864-6 4.864-6 0V3" />
                        </g>
                    </svg>
                    <a href="{{ route('admin.recetas.index') }}"
                        class="font-semibold text-black mt-1 group-hover:text-[#F29109]/60   duration-300">

                        Ver Recetas
                    </a>
                </div>
                <div
                    class="flex flex-row items-center gap-2 border-b border-[#F29109]/40 group group-hover:text-[#F29109]/60 transition-colors duration-300 ">
                    <svg xmlns="http://www.w3.org/2000/svg" class="group-hover:text-[#F29109]/60  duration-300"
                        width="24px" height="24px" viewBox="0 0 512 512">
                        <title>about</title>
                        <path fill="currentColor" fill-rule="evenodd"
                            d="M256 42.667C138.18 42.667 42.667 138.179 42.667 256c0 117.82 95.513 213.334 213.333 213.334c117.822 0 213.334-95.513 213.334-213.334S373.822 42.667 256 42.667m0 384c-94.105 0-170.666-76.561-170.666-170.667S161.894 85.334 256 85.334c94.107 0 170.667 76.56 170.667 170.666S350.107 426.667 256 426.667m26.714-256c0 15.468-11.262 26.667-26.497 26.667c-15.851 0-26.837-11.2-26.837-26.963c0-15.15 11.283-26.37 26.837-26.37c15.235 0 26.497 11.22 26.497 26.666m-48 64h42.666v128h-42.666z" />
                    </svg>
                    <a href="{{ route('admin.nosotros.edit') }}"
                        class="font-semibold text-black mt-1 group-hover:text-[#F29109]/60   duration-300">

                        Editar Nosotros
                    </a>
                </div>
                <div
                    class="flex flex-row items-center gap-2 border-b border-[#F29109]/40 group group-hover:text-[#F29109]/60 transition-colors duration-300 ">
                    <svg xmlns="http://www.w3.org/2000/svg" class="group-hover:text-[#F29109]/60  duration-300"
                        width="24px" height="24px" viewBox="0 0 24 24">
                        <title>contact-mail-outline-rounded</title>
                        <path fill="currentColor"
                            d="M15 11h5q.425 0 .713-.288T21 10V7q0-.425-.288-.712T20 6h-5q-.425 0-.712.288T14 7v3q0 .425.288.713T15 11m2.5-2.25l1.85-1.3q.2-.15.425-.038t.225.363q0 .025-.175.35l-1.75 1.225q-.275.2-.575.2t-.575-.2l-1.75-1.225Q15.15 8.1 15 7.775q0-.25.225-.363t.425.038zM2 21q-.825 0-1.412-.587T0 19V5q0-.825.588-1.412T2 3h20q.825 0 1.413.588T24 5v14q0 .825-.587 1.413T22 21zm13.9-2H22V5H2v14h.1q1.05-1.875 2.9-2.937T9 15t4 1.063T15.9 19m-4.775-5.875Q12 12.25 12 11t-.875-2.125T9 8t-2.125.875T6 11t.875 2.125T9 14t2.125-.875M4.55 19h8.9q-.85-.95-2.013-1.475T9 17t-2.425.525T4.55 19m3.737-7.288Q8 11.425 8 11t.288-.712T9 10t.713.288T10 11t-.288.713T9 12t-.712-.288M12 12" />
                    </svg>
                    <a href="{{ route('admin.contacto.index') }}"
                        class="font-semibold text-black mt-1 group-hover:text-[#F29109]/60   duration-300">

                        Solicitudes de Contacto
                    </a>

                </div>
                <div
                    class="flex flex-row items-center gap-2 border-b border-[#F29109]/40 group group-hover:text-[#F29109]/60 transition-colors duration-300 ">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24">
                        <title>metadata-store-outline-thin</title>
                        <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="1.5">
                            <path d="M2 6a2 2 0 0 1 2 -2h16a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2H4a2 2 0 0 1 -2 -2Z" />
                            <path d="M2 9h20" />
                            <path d="M6 13h4" />
                            <path d="M14 13h4" />
                            <path d="M6 17h4" />
                            <path d="M14 17h4" />
                        </g>
                    </svg>
                    <a href="{{ route('admin.metadata.index') }}"
                        class="font-semibold text-black mt-1 group-hover:text-[#F29109]/60   duration-300">

                        Ver Metadata
                    </a>

                </div>


                <div
                    class="flex flex-row items-center gap-2 border-b border-[#F29109]/40 group group-hover:text-[#F29109]/60 transition-colors duration-300 ">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 32 32">
                        <title>inbox-newsletter</title>
                        <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2"
                            d="M5 16v8c0 1.5 1.5 3 3 3h16c1.5 0 3-1.5 3-3v-8M5 16h5.5s1 3.5 5.5 3.5s5.5-3.5 5.5-3.5H27M5 16v3.5M5 16l1-5m21 5l-1-5M13.5 9h5m-5 4h5m-9 0V5h13v8" />
                    </svg>
                    <a href="{{ route('admin.newsletter.index') }}"
                        class="font-semibold text-black mt-1 group-hover:text-[#F29109]/60   duration-300">

                        Ver Newsletter
                    </a>

                </div>

                <div
                    class="flex flex-row items-center gap-2 border-b border-[#F29109]/40 group group-hover:text-[#F29109]/60 transition-colors duration-300 ">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24">
                        <title>users-outline-thin</title>
                        <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="1.5">
                            <path d="M5 8a3 3 0 1 0 6 0 3 3 0 1 0 -6 0" />
                            <path d="M3 20a5 5 0 0 1 10 0" />
                            <path d="M15 10a2 2 0 1 0 4 0 2 2 0 1 0 -4 0" />
                            <path d="M13 20a4 4 0 0 1 8 0" />
                        </g>
                    </svg>
                    <a href="{{ route('admin.users.index') }}"
                        class="font-semibold text-black mt-1 group-hover:text-[#F29109]/60   duration-300">

                        Ver Usuarios
                    </a>

                </div>
                <div
                    class="flex flex-row items-center gap-2 border-b border-[#F29109]/40 group group-hover:text-[#F29109]/60  transition-colors duration-300 ">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 20 20">
                        <title>tab-inprivate-account-20-regular</title>
                        <path fill="currentColor"
                            d="M5.5 3A2.5 2.5 0 0 0 3 5.5v9A2.5 2.5 0 0 0 5.5 17h4.66a3.5 3.5 0 0 1-.16-1H5.5A1.5 1.5 0 0 1 4 14.5v-9A1.5 1.5 0 0 1 5.5 4h9A1.5 1.5 0 0 1 16 5.5v1.645c.361.107.698.272 1 .482V5.5A2.5 2.5 0 0 0 14.5 3zm8 7.5A1.5 1.5 0 0 0 15 12h2a2.5 2.5 0 1 1 0-3h-2a1.5 1.5 0 0 0-1.5 1.5m-1.319 4.693c.12-.133.254-.193.369-.193h6.317a1.8 1.8 0 0 0-.3-.471c-.262-.294-.652-.529-1.117-.529h-4.9c-.465 0-.855.235-1.116.529c-.26.291-.434.686-.434 1.091v.32c0 1.634 1.633 3.06 4 3.06c1.24 0 2.28-.392 2.988-1H15c-2.03 0-3-1.171-3-2.06v-.32c0-.125.06-.29.181-.427M17.5 10.5q0 .257-.05.5H15v-1h2.45q.05.243.05.5m1.261 6.5H15v-1h4c-.01.347-.091.685-.239 1" />
                    </svg>
                    <a href="{{ route('admin.clientes.index') }}"
                        class="font-semibold text-black mt-1 group-hover:text-[#F29109]/60   duration-300">

                        Clientes de Zona Privada
                    </a>
                </div>
                <div
                    class="flex flex-row items-center gap-2 border-b border-[#F29109]/40 group group-hover:text-[#F29109]/60  transition-colors duration-300 ">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 16 16">
                        <title>order-outline</title>
                        <path fill="none" stroke="currentColor" stroke-linejoin="round"
                            d="M5 11.5h4M5 9h6M5 6.5h6m-5.5-4h-2v12h9v-12h-2m-5-1h5l-.625 2h-3.75z" />
                    </svg>
                    <a href="{{ route('admin.pedidos.index') }}"
                        class="font-semibold text-black mt-1 group-hover:text-[#F29109]/60   duration-300">

                        Pedidos de clientes
                    </a>
                </div>
                <div
                    class="flex flex-row items-center gap-2 border-b border-[#F29109]/40 group group-hover:text-[#F29109]/60  transition-colors duration-300 ">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24">
                        <title>outline-price-change</title>
                        <path fill="currentColor"
                            d="M8 17h2v-1h1c.55 0 1-.45 1-1v-3c0-.55-.45-1-1-1H8v-1h4V8h-2V7H8v1H7c-.55 0-1 .45-1 1v3c0 .55.45 1 1 1h3v1H6v2h2zM20 4H4c-1.11 0-1.99.89-1.99 2L2 18c0 1.11.89 2 2 2h16c1.11 0 2-.89 2-2V6c0-1.11-.89-2-2-2m0 14H4V6h16zm-6-8l2-2l2 2m0 4.25l-2 2l-2-2" />
                    </svg>
                    <a href="{{ route('admin.listas-precios.index') }}"
                        class="font-semibold text-black mt-1 group-hover:text-[#F29109]/60   duration-300">

                        Listas de precios
                    </a>
                </div>

            </nav>
        </aside>
        <div class="flex-1 flex flex-col h-full overflow-x-hidden overflow-y-auto">
            <main>
                @yield('content')
            </main>
        </div>
    </div>


</body>

</html>
