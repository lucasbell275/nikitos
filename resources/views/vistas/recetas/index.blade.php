@extends('app.layout')
@section('content')
    @if (session('success'))
        <div class="flex justify-center mt-6">
            <p class="bg-orange-300/70 text-lg font-semibold py-2 px-4 rounded-[20px] font-['Nunito_Sans']">
                {{ session('success') }}
            </p>
        </div>
    @endif
    <div>
        <div class="relative h-[350px] md:h-[450px] w-full">
            <img src="{{ asset('images/imagenes_default/fondo_nosotros.png') }}" alt=""
                class="absolute inset-0 z-0 w-full h-full  object-center">
            <div class="absolute inset-0 flex items-center justify-center">
                <h1
                    class=" flex justify-center text-['Nunito_Sans'] text-white font-semibold text-[50px] [text-shadow:_0_4px_4px_rgba(0,0,0,0.25)]">
                    Recetas
                </h1>
            </div>
        </div>
    </div>
    <div class="max-w-[1258px] mx-auto mt-[85px] grid grid-cols-3 gap-6 ">
        @foreach ($receta as $rec)
            <a href="{{ route('recetas.show', $rec) }}">
                <div
                    class="flex flex-col border rounded-[8px] border-[#DCDCDC] p-[16px] items-center gap-[16px] max-w-[403px] max-h-[422px] h-full w-full">
                    <img src="{{ 'storage/' . $rec->imagen }}" alt=""
                        class="rounded-t-[8px] max-w-[371px] max-h-[255px] w-full h-full object-cover object-center">
                    <p
                        class="text-black text-[24px] h-[70px] font-['Nunito_Sans']  text-center font-bold leading-[29px] max-w-[371px] ">
                        {{ $rec->titulo_receta }}
                    </p>

                    <p
                        class="text-center text-black  font-semibold font-['Nunito_Sans']  group relative inline-block mb-[4px] mt-[9px] hover:font-bold transition-all duration-200">
                        Ver receta 
                        <span
                            class="absolute bottom-0   left-0 w-full h-0.5 bg-black transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-center ">
                        </span>
                    </p>

                </div>
            </a>
        @endforeach
    </div>
@endsection
