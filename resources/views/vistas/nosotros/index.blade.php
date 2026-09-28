@extends('app.layout')

@section('content')
    <div>
        {{-- Fondo superior con palabra nosotros --}}
        <div class="relative h-[350px] md:h-[450px] w-full">
            <img src="{{ asset('images/imagenes_default/nosotros_fondo.png') }}" alt=""
                class="absolute inset-0 z-0 w-full h-full object-center">
            <div class="absolute inset-0 flex items-center justify-center">
                <h1
                    class=" flex justify-center text-['Nunito_Sans'] text-white font-semibold text-[50px] [text-shadow:_0_4px_4px_rgba(0,0,0,0.25)]">
                    Nosotros</h1>
            </div>
        </div>


        <div class="flex flex-row w-full justify-between gap-[108px] mt-[100px] mx-auto max-w-[1254px]">
            <div class="w-full flex  max-w-[535px] ">
                <div class="w-full mx-auto max-w-[1258px]"> 
                    <h3 class="text-black font-['Nunito'] text-[35px] font-bold">
                        {{ $nosotros->titulo }}
                    </h3>

                    <p class="text-[#5C5C5C] font-['Nunito'] text-[18px] font-bold mt-[26px] mb-[20px]">
                        {{ $nosotros->subtitulo_1 }}
                    </p>

                    <p class="text-[#5C5C5C] font-['Nunito'] text-[18px] w-full">
                        {{ $nosotros->descripcion_1 }}
                    </p>
                </div>
            </div>

            <img src="{{ asset('storage/' . $nosotros->imagen_1) }}" alt=""
                class="absolute right-0 top-[530px] w-[49vw]  h-[507px] ] object-cover object-center" style="border-radius: 12px 0 0 12px;">

        </div>
        <div class="max-w-[1258px] mx-auto flex flex-col gap-[108px] mt-[100px]">
            <div class="flex flex-row gap-[57px]">

                <img src="{{ asset('storage/' . $nosotros->imagen_2) }}" alt="">
                <div class="flex flex-col">

                    <p class=" text-black font-['Nunito_Sans'] text-[28px] font-bold">
                        {{ $nosotros->subtitulo_2 }}
                    </p>
                    <p class="text-[#5C5C5C] font-['Nunito'] text-[18px]">
                        {{ $nosotros->descripcion_2 }}
                    </p>

                </div>
            </div>
            <div class="flex flex-row gap-[57px]">
                <div class="flex flex-col">

                    <p class=" text-black font-['Nunito_Sans'] text-[28px] font-bold">
                        {{ $nosotros->subtitulo_3 }}
                    </p>
                    <p class="text-[#5C5C5C] font-['Nunito'] text-[18px]">
                        {{ $nosotros->descripcion_3 }}
                    </p>

                </div>

                <img src="{{ asset('storage/' . $nosotros->imagen_3) }}" alt="">
            </div>
            <div class="flex flex-row gap-[57px]">

                <img src="{{ asset('storage/' . $nosotros->imagen_4) }}" alt="">
                <div class="flex flex-col">

                    <p class=" text-black font-['Nunito_Sans'] text-[28px] font-bold">
                        {{ $nosotros->subtitulo_4 }}
                    </p>
                    <p class="text-[#5C5C5C] font-['Nunito'] text-[18px]">
                        {{ $nosotros->descripcion_4 }}
                    </p>

                </div>
            </div>
        </div>

    </div>
@endsection
