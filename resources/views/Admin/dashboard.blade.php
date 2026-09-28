@extends('app.layout-admin')

@section('content')
    <div class="max-w-[1258px] mx-auto px-4 py-12 mt-5 font-['Nunito_Sans']">


        <div class="flex flex-col gap-1 my-10">
            <h1 class="text-3xl font-black text-black">Dashboard</h1>
            <p class="text-gray-600 text-sm">Bienvenido de nuevo, <span
                    class="font-semibold text-black">{{ $adminName }}</span></p>
        </div>


        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5 gap-6 mt-10">


            <div
                class="bg-white border border-[#DCDCDC] p-6 rounded-xl shadow-sm flex flex-col justify-between transition hover:shadow-md">
                <div class="flex items-center justify-center">
                    <span class="text-sm font-bold text-gray-500 uppercase tracking-wider text-center">Categorías</span>

                </div>
                <div class="text-3xl font-extrabold flex flex-row gap-5 pb-2 items-center">
                    <span class="p-2 bg-gray-100 rounded-lg"><svg xmlns="http://www.w3.org/2000/svg" width="40px"
                            height="40px" viewBox="0 0 24 24">
                            <title>category-plus-outline</title>
                            <path fill="currentColor"
                                d="M11 11V2H2v9m2-2V4h5v5m11-2.5C20 7.9 18.9 9 17.5 9S15 7.9 15 6.5S16.11 4 17.5 4S20 5.11 20 6.5M6.5 14L2 22h9m-3.42-2H5.42l1.08-1.92M22 6.5C22 4 20 2 17.5 2S13 4 13 6.5s2 4.5 4.5 4.5S22 9 22 6.5M19 17v-3h-2v3h-3v2h3v3h2v-3h3v-2Z" />
                        </svg></span>
                    <p class="text-[#ffa221] ">{{ $stats['categorias'] }}</p>
                </div>
            </div>

            <!-- Productos -->
            <div class="bg-white border border-[#DCDCDC] p-5 rounded-xl shadow-sm flex flex-col justify-between">
                <div class="flex items-center justify-center">
                    <span class="text-sm font-bold text-gray-500 uppercase tracking-wider text-center">Productos</span>

                </div>
                <div class="text-3xl font-extrabold flex flex-row items-center gap-5 pb-2">
                    <span class="p-2 bg-gray-100 rounded-lg"><svg xmlns="http://www.w3.org/2000/svg" width="40px"
                            height="40px" class="" viewBox="0 0 32 32">
                            <title>potato</title>
                            <g fill="currentColor">
                                <path
                                    d="M19.967 7.946a1.4 1.4 0 1 0 0-2.8a1.4 1.4 0 0 0 0 2.8m.36 5.55a1.83 1.83 0 1 1-3.66 0a1.83 1.83 0 0 1 3.66 0m-8.65 5.51a1.68 1.68 0 1 1-3.36 0a1.68 1.68 0 0 1 3.36 0m-.37 6.03a1.16 1.16 0 1 0 0-2.32a1.16 1.16 0 0 0 0 2.32m14.35-10.38a1.16 1.16 0 1 1-2.32 0a1.16 1.16 0 0 1 2.32 0" />
                                <path
                                    d="M23.684 2.021A10.706 10.706 0 0 0 10.49 5.374l-5.24 7.14c-4.323 5.888-2.188 14.26 4.42 17.367c5.834 2.746 12.772.206 15.474-5.635a2294 2294 0 0 0 2.413-5.225l1.297-2.817c2.46-5.34.154-11.67-5.171-14.183m-11.58 4.536A8.706 8.706 0 0 1 22.83 3.83c4.335 2.046 6.209 7.196 4.209 11.537l-1.297 2.816v.002c-.65 1.41-.665 1.444-2.413 5.22c-2.237 4.839-7.98 6.938-12.806 4.666c-5.471-2.573-7.237-9.502-3.66-14.374z" />
                            </g>
                        </svg></span>
                    <p class="text-[#ffa221]">{{ $stats['productos'] }}</p>
                </div>
            </div>

            <!-- Recetas -->
            <div
                class="bg-white border border-[#DCDCDC] p-6 rounded-xl shadow-sm flex flex-col justify-between transition hover:shadow-md">
                <div class="flex items-center justify-center">
                    <span class="text-sm font-bold text-gray-500 uppercase tracking-wider text-center">Recetas</span>

                </div>
                <div class="text-3xl font-extrabold  flex flex-row gap-5 mb-2 items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="group-hover:text-[#F29109]/60  duration-300"
                        width="40px" height="40px" viewBox="0 0 24 24">
                        <title>dish-02</title>
                        <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-width="1.5">
                            <path d="M21 17a5 5 0 0 1 0-10" />
                            <path d="M21 21a9 9 0 1 1 0-18" />
                            <path stroke-linejoin="round" d="M6 3v5m0 13V11M3.5 8h5M9 3v4.352c0 4.864-6 4.864-6 0V3" />
                        </g>
                    </svg>
                    <p class="text-[#Ffa221]">{{ $stats['recetas'] }}</p>
                </div>
            </div>


            <div
                class="bg-white border border-[#DCDCDC] p-6 rounded-xl shadow-sm flex flex-col justify-between  transition hover:shadow-md">
                <div class="flex items-center justify-center">
                    <span class="text-sm font-bold text-gray-500 uppercase tracking-wider text-center">Distribuidores</span>

                </div>
                <div class="text-3xl font-extrabold flex flex-row gap-5 items-center mb-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="group-hover:text-[#F29109]/60  duration-300"
                        width="40px" height="40px" viewBox="0 0 16 16">
                        <title>distribution-filled</title>
                        <path fill="currentColor" fill-rule="evenodd"
                            d="M3 2h7v2h3.25L15 6.333V12.5h-1.063a2 2 0 0 1-3.874 0H5.437a2 2 0 1 1 0-1h4.626a2 2 0 0 1 3.874 0H14V7H9V3H3zm3.5 4H2V5h4.5zm-1 3H1V8h4.5zm-2 2a1 1 0 1 0 0 2a1 1 0 0 0 0-2m8.5 0a1 1 0 1 0 0 2a1 1 0 0 0 0-2"
                            clip-rule="evenodd" />
                    </svg>
                    <p class="text-[#ffa221]">{{ $stats['distribuidores'] }}</p>
                </div>
            </div>

            
            <div
                class="bg-white border border-[#DCDCDC] p-6 rounded-xl shadow-sm flex flex-col justify-between  transition hover:shadow-md">
                <div class="flex items-center justify-center">
                    <span class="text-sm font-bold text-gray-500 uppercase tracking-wider text-center">Contactos</span>

                </div>
                <div class="text-3xl font-extrabold flex flex-row gap-5 items-center mb-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="group-hover:text-[#F29109]/60  duration-300"
                        width="40px" height="40px" viewBox="0 0 24 24">
                        <title>contact-mail-outline-rounded</title>
                        <path fill="currentColor"
                            d="M15 11h5q.425 0 .713-.288T21 10V7q0-.425-.288-.712T20 6h-5q-.425 0-.712.288T14 7v3q0 .425.288.713T15 11m2.5-2.25l1.85-1.3q.2-.15.425-.038t.225.363q0 .025-.175.35l-1.75 1.225q-.275.2-.575.2t-.575-.2l-1.75-1.225Q15.15 8.1 15 7.775q0-.25.225-.363t.425.038zM2 21q-.825 0-1.412-.587T0 19V5q0-.825.588-1.412T2 3h20q.825 0 1.413.588T24 5v14q0 .825-.587 1.413T22 21zm13.9-2H22V5H2v14h.1q1.05-1.875 2.9-2.937T9 15t4 1.063T15.9 19m-4.775-5.875Q12 12.25 12 11t-.875-2.125T9 8t-2.125.875T6 11t.875 2.125T9 14t2.125-.875M4.55 19h8.9q-.85-.95-2.013-1.475T9 17t-2.425.525T4.55 19m3.737-7.288Q8 11.425 8 11t.288-.712T9 10t.713.288T10 11t-.288.713T9 12t-.712-.288M12 12" />
                    </svg>
                    <p class="text-[#ffa221]">{{ $stats['contactos'] }}</p>
                </div>
            </div>

        </div>

    </div>
@endsection
