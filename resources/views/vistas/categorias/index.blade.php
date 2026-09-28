@extends('app.layout')

@section('content')
    <div>
        <div class="relative h-[350px] md:h-[450px] w-full">
            <img src="{{ asset('images/imagenes_default/papas_relleno.png') }}" alt=""
                class="inset-0 z-0 w-full h-full  object-center">
            <div class="absolute inset-0 flex items-center justify-center">
                <h1
                    class=" flex justify-center text-['Nunito_Sans'] text-white font-semibold text-[50px] [text-shadow:_0_4px_4px_rgba(0,0,0,0.25)]">
                    Productos</h1>
            </div>

        </div>


        <div class="grid grid-cols-4 gap-6 max-w-[1258px] mx-auto mt-[85px]">
            @foreach ($categoria as $cat)
                <a href="{{ route('productos.index', ['categoria' => $cat->id]) }}">
                    <div
                        class=" bg-[{{ $cat->color }}] flex flex-col items-center rounded-[8px] h-[321px] gap-[13px] hover:contrast-130 transition-all duration-300 max-w-[297px] w-full">
                        <img src="{{ asset('storage/' . $cat->imagen) }}" alt=""
                            class="object-cover max-w-[297px] w-full max-h-[179px] h-[179px] mt-[11px]">
                        <p class="font-['Nunito_Sans'] text-[25px] font-bold text-white leading-[23px] ">
                            {{ $cat->nombre_categoria }}
                        </p>

                        <p
                            class="relative inline-block group text-white text-center font-['Nunito_Sans']  font-semibold mt-[16px] hover:text-gray-300 hover:font-bold transition-all duration-200 ">
                            Ver todos<span
                                class="absolute bottom-0 top-6   left-0 w-full h-0.5 bg-white transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-center "></span>
                        </p>


                    </div>
                </a>
            @endforeach
        </div>
    </div>
@endsection
