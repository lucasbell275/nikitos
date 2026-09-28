@extends('app.layout')

@section('content')
    <div>
        <div class="relative h-[350px] md:h-[450px] w-full">
            <img src="{{ asset('images/imagenes_default/papas_relleno.png') }}" alt=""
                class="absolute inset-0 z-0 w-full h-full  object-center">
            <div class="absolute inset-0 flex items-center justify-center">
                <h1
                    class=" flex justify-center text-['Nunito_Sans'] text-white font-semibold text-[50px] [text-shadow:_0_4px_4px_rgba(0,0,0,0.25)]">
                    Productos</h1>
            </div>
        </div>

        <div class="relative z-10 max-w-[1258px]  mx-auto">
            <div class="flex justify-self-end max-w-[243px] w-full ">
                <div class=" flex justify-center max-w-[243px] w-full items-center">
                    <a href="#"
                        class="text-[#FFA221] text-center font-semibold font-['Nunito_Sans'] hover:text-[#e65100]   max-w-[243px] w-full px-[30px] py-[10px] border border-[#ffa221] rounded-[20px] items-center mt-[85px] hover:border-[#e65100] hover:font-bold group transition-all duration-200">Descargar
                        catalogo</a>
                </div>
            </div>

            <div class="flex flex-row gap-[93px] max-w-[1258px] mt-[40px] mx-auto">
                <div class="flex flex-col border-t border-[#DDDDDD] max-w-[297px] w-full">
                    @foreach ($categoria as $cat)
                        @php
                            $isSelected = request('categoria') == $cat->id;
                        @endphp

                        <div
                            class="flex flex-row items-center gap-[13px] border-b border-[#DDDDDD] py-[7px] transition-all duration-200
                                {{ $isSelected ? 'text-black font-bold' : 'hover:bg-[#ffa221]/25 hover:font-bold' }}">

                            <div class="w-[9px] h-[30px] bg-[{{ $cat->color }}]"></div>

                            <a href="{{ route('productos.index', ['categoria' => $cat->id]) }}"
                                class="font-['Nunito_Sans'] leading-[45px] text-[18px] {{ $isSelected ? 'text-black' : 'text-[#5c5c5c]' }}">
                                {{ $cat->nombre_categoria }}
                            </a>
                        </div>
                    @endforeach
                </div>
                <div class="grid grid-cols-3 gap-[24px] mx-auto max-w-[1258px] w-full mb-10">
                    @foreach ($productos as $producto)
                        <a href="{{ route('productos.show', $producto) }}">
                            <div
                                class="border border-[#DCDCDC] items-center flex flex-col gap-[7px] max-h-[321px] w-full max-w-[297px] w-full h-[321px]">
                                <img src="{{ asset('storage/' . $producto->imagen) }}" alt=""
                                    class="max-h-[179px] max-w-[297px] h-[179px] mt-6  hover:scale-101 transition-all duration-200  ">
                                <p class="font-['Nunito_Sans'] font-extrabold text-[13px] mt-[4px] uppercase"
                                    style="color: {{ $producto->categorias->color }};">
                                    {{ $producto->categorias->nombre_categoria }}</p>
                                <p class="text-[21px] font-bold font-['Nunito_Sans'] leading-[23px] ">
                                    {{ $producto->nombre }}
                                </p>
                                <p
                                    class="mb-[11px] mt-[9px] text-[16px] font-['Nunito_Sans'] font-semibold text-black text-center group relative inline-block mt-[9px] mb-[21px] hover:font-bold transition-all duration-200">
                                    Ver
                                    producto
                                    <span
                                        class="absolute bottom-0   left-0 w-full h-[0.3px] bg-black transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-center ">
                                    </span>
                                </p>


                            </div>
                        </a>
                    @endforeach

                </div>
            </div>

        </div>

    </div>
@endsection
