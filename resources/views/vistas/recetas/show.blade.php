@extends('app.layout')

@section('content')
    <div>
        <div class="relative h-[350px] md:h-[450px] w-full">
            <img src="{{ asset('images/imagenes_default/fondo_nosotros.png') }}" alt=""
                class="absolute inset-0 z-0 w-full h-full  object-center ">
            <div class="absolute inset-0 flex items-center justify-center">
                <h1
                    class=" flex justify-center text-['Nunito_Sans'] text-white font-semibold text-[50px] [text-shadow:_0_4px_4px_rgba(0,0,0,0.25)]">
                    Recetas
                </h1>
            </div>
        </div>
        <div class="flex flex-col gap-[70px] mt-[80px]">
            <div class="flex flex-row gap-[30px] ">

                <img src="{{ asset('storage/' . $receta->imagen) }}" alt=""
                    class="max-w-[933px] max-h-[531px]  w-full h-full rounded-r-[12px] object-center object-cover">

                <div class="flex flex-col max-w-[1258px] mx-auto container ">
                    <h2 class="text-[35px] text-black font-['Nunito_Sans'] font-bold">
                        {{ $receta->titulo_receta }}

                    </h2>
                    <div class="flex flex-col mt-[23px] mb-2">
                        <p class="text-[18px] font-bold leading-[40px] text-[#5C5C5C]">Tiempo de preparacion</p>
                        <p class="text-[18px] text-[#5c5c5c] leading-[23px] font-['Nunito_Sans']">
                            {{ $receta->tiempo_preparacion }}</p>
                    </div>
                    <div class="flex flex-col mb-2">
                        <p class="text-[18px] font-bold leading-[40px] text-[#5C5C5C]">
                            Tiempo de coccion
                        </p>
                        <p class="text-[18px] text-[#5c5c5c] leading-[23px] font-['Nunito_Sans']">
                            {{ $receta->tiempo_coccion }}
                        </p>
                    </div>
                    <div class="flex flex-col mb-2">
                        <p class="text-[18px] font-bold leading-[40px] text-[#5C5C5C]">Porciones</p>
                        <p class="text-[18px] text-[#5c5c5c] leading-[23px] font-['Nunito_Sans']">
                            {{ $receta->porciones }}
                        </p>
                    </div>
                    <div class="flex flex-col gap-2">
                        <p class="text-[18px] font-bold leading-[40px] text-[#5C5C5C]">Comparte esta receta</p>
                        <div class="flex flex-row gap-[18px]">
                            <a href="https://www.facebook.com/">
                                <svg width="23" height="23" viewBox="0 0 23 23" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M17.25 1.91663H14.375C13.1042 1.91663 11.8854 2.42146 10.9868 3.32007C10.0882 4.21868 9.58334 5.43746 9.58334 6.70829V9.58329H6.70834V13.4166H9.58334V21.0833H13.4167V13.4166H16.2917L17.25 9.58329H13.4167V6.70829C13.4167 6.45413 13.5176 6.21037 13.6974 6.03065C13.8771 5.85093 14.1208 5.74996 14.375 5.74996H17.25V1.91663Z"
                                        fill="#030303" />
                                </svg>
                            </a>
                            <a href="https://www.instagram.com/">
                                <svg width="23" height="23" viewBox="0 0 23 23" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_2181_2816)">
                                        <path
                                            d="M16.2917 1.91663H6.70832C4.06196 1.91663 1.91666 4.06193 1.91666 6.70829V16.2916C1.91666 18.938 4.06196 21.0833 6.70832 21.0833H16.2917C18.938 21.0833 21.0833 18.938 21.0833 16.2916V6.70829C21.0833 4.06193 18.938 1.91663 16.2917 1.91663Z"
                                            stroke="#030303" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path
                                            d="M15.3333 10.8963C15.4516 11.6939 15.3154 12.5084 14.944 13.2241C14.5727 13.9398 13.9851 14.5201 13.2649 14.8826C12.5447 15.2451 11.7285 15.3713 10.9325 15.2432C10.1364 15.1151 9.40102 14.7393 8.83089 14.1692C8.26076 13.599 7.88491 12.8636 7.75682 12.0676C7.62872 11.2715 7.7549 10.4554 8.1174 9.73515C8.4799 9.01495 9.06027 8.42738 9.77595 8.05603C10.4916 7.68467 11.3062 7.54844 12.1038 7.66671C12.9173 7.78735 13.6705 8.16645 14.252 8.74801C14.8336 9.32956 15.2127 10.0827 15.3333 10.8963Z"
                                            stroke="#030303" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path d="M16.7708 6.22913H16.7792" stroke="#030303" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_2181_2816">
                                            <rect width="23" height="23" fill="white" />
                                        </clipPath>
                                    </defs>
                                </svg>

                            </a>
                        </div>

                    </div>


                </div>
            </div>
            {{-- Pasos e ingredientes --}}
            <div class="flex flex-row justify-between gap-6 w-full mx-auto container max-w-[1258px]">
                <div class="flex flex-col gap-5">
                    <h3 class="text-[28px] font-bold text-black leading-[23px]">Ingredientes</h3>
                    @foreach ($receta->ingredientes as $item)
                        <div class=" flex items-center gap-2 ">

                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M15.75 7.875V14.25C15.75 14.6478 15.592 15.0294 15.3107 15.3107C15.0294 15.592 14.6478 15.75 14.25 15.75H3.75C3.35218 15.75 2.97064 15.592 2.68934 15.3107C2.40804 15.0294 2.25 14.6478 2.25 14.25V3.75C2.25 3.35218 2.40804 2.97064 2.68934 2.68934C2.97064 2.40804 3.35218 2.25 3.75 2.25H13.125M6.75 8.25L9 10.5L16.5 3"
                                    stroke="#FFA221" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>

                            <p class="text-[18px] text-[#5c5c5c] leading-[40px] font-['Nunito_Sans'] -mb-4">
                                {{ $item->ingrediente }}</p>
                        </div>
                    @endforeach
                </div>
                <div class="flex flex-col gap-6  min-w-[600px] max-w-[1258px] block ">
                    <h4 class="text-[28px] font-bold text-black leading-[23px]">
                        Preparacion
                    </h4>
                    @foreach ($receta->preparacion as $index => $paso)
                        <div class="flex flex-row items-start items-center gap-2">
                            <svg class="mt-2" width="18" height="18" viewBox="0 0 18 18" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M15.75 7.875V14.25C15.75 14.6478 15.592 15.0294 15.3107 15.3107C15.0294 15.592 14.6478 15.75 14.25 15.75H3.75C3.35218 15.75 2.97064 15.592 2.68934 15.3107C2.40804 15.0294 2.25 14.6478 2.25 14.25V3.75C2.25 3.35218 2.40804 2.97064 2.68934 2.68934C2.97064 2.40804 3.35218 2.25 3.75 2.25H13.125M6.75 8.25L9 10.5L16.5 3"
                                    stroke="#FFA221" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>

                            <div class="flex flex-col -mb-4 ">

                                <p class="font-bold text-[#5c5c5c] text-[18px] leading-[40px] font-['Nunito_Sans']">
                                    Paso {{ $index + 1 }}
                                </p>
                                <p class="text-[#5c5c5c] font-['Nunito_Sans'] max-w-[600px] text-[18px]">
                                    {{ $paso->descripcion }}
                                </p>
                            </div>


                        </div>
                    @endforeach

                </div>
            </div>

            {{-- Otras recetas --}}
            <div class="max-w-[1258px] mx-auto">
                <h5 class="text-black font-['Nunito_Sans'] leading-[23px] font-bold text-[28px]">Otras recetas</h5>

                <div class="  mt-[25px] grid grid-cols-3 gap-6 ">

                    @foreach ($recetaRelacionada as $rec)
                        <div class="flex flex-col border rounded-[8px] border-[#DCDCDC] p-[16px] items-center gap-[16px] max-w-[403px] max-h-[422px]">

                            <img src="{{asset( 'storage/' . $rec->imagen)}}" alt=""
                                class="rounded-t-[8px] max-w-[371px] max-h-[255px] w-full h-full object-cover object-center">

                            <p class="text-black text-[24px] font-['Nunito_Sans'] font-bold leading-[29px] text-center">
                                {{ $rec->titulo_receta }}
                            </p>
                            <a href="{{ route('recetas.show', $rec) }}"
                                class="text-center text-black font-semibold font-['Nunito_Sans'] hover:text-black/70 group relative inline-block mt-[9px] mb-[14px]">
                                Ver receta
                                <span
                                    class="absolute bottom-0   left-0 w-full h-0.5 bg-black transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-center ">
                                </span>
                            </a>

                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endsection
