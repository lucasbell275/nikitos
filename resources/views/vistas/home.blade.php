@extends('app.layout')

@section('content')
    <div class="relative w-full h-full flex flex-col  bg-transparent">

        <video autoplay loop muted playsinline src="{{ asset('storage/' . $home->video) }}"
            class="absolute top-0 left-0 w-full h-full object-cover z-0">
        </video>

        <div class="absolute inset-0 bg-black/30 z-10"></div>
        {{--  --}}
        <div class="relative z-20 mb-[180px]">

            <div class="flex flex-col relative mt-[208px] mx-auto max-w-[1258px]">
                <h1
                    class="text-white drop-shadow-[0_4px_4px_rgba(0,0,0,0.25)] font-['Nunito'] text-3xl md:text-[85px] font-semibold leading-normal mx-2 md:mx-0 ">
                    {{ $home->titulo }}
                </h1>
                <p class="text-lg mx-2 md:mx-0 md:text-[24px] text-white max-w-[600px] font-semibold">
                    {{ $home->descripcion }}</p>
                <div class="flex flex-col md:flex-row mt-[49px] gap-[19px] items-center z-20 mx-2 md:mx-0 ">
                    <div
                        class="bg-white text-black rounded-[20px]  px-5 py-2 flex gap-2 items-center w-full md:w-auto flex justify-center hover:bg-[#ffdbbb]/80 transition-colors duration-200">
                        <a href="{{ $home->boton_descripcion_1_redireccion }}" class="">
                            {{ $home->boton_descripcion_1_texto }}
                        </a>
                        <img src="{{ asset('images/body/flecha.png') }}" alt="" class="w-[20px] h-[20px] ">
                    </div>

                    <a href="{{ $home->boton_descripcion_2_redireccion }}"
                        class="text-white border rounded-[20px]  px-11 py-2 cursor-pointer w-full flex justify-center md:w-auto hover:text-[#ffa221]  transition-colors duration-200">
                        {{ $home->boton_descripcion_2_texto }}
                    </a>

                </div>
            </div>
        </div>
    </div>

    <div class="w-full relative z-20 h-full max-h-[695px] overflow-visible -mt-20">
        <div class="">
            <img src="{{ asset('images/body/fondo_naranja.png') }}" alt=""
                class="w-screen object-center inset-0 h-full max-h-[695px] z-0 absolute ">
            <img src="" alt="">
            <div class="flex flex-row justify-between max-w-[1258px] mx-auto">
                <div class="relative flex flex-col  mt-[80px] justify-start container gap-[23px]">
                    <h2 class="top-0 text-white font-['Nunito_Sans'] text-[45px] font-semibold ">
                        {{ $home->nosotros_titulo }}
                    </h2>
                    <p class="max-w-[611px] max-h-[232px] leading-[29px] text-white font-['Nunito_Sans'] text-[20px] ">
                        {{ $home->nosotros_descripcion }}
                    </p>
                    <a href=""
                        class="flex justify-center py-[10px] px-[30px]  max-w-[164px] bg-white rounded-[20px] font-['Nunito_Sans'] text-[#FFA221] font-semibold mt-[8px] hover:bg-gray-200 hover:font-bold transition-all duration-200">
                        {{ $home->nosotros_boton_texto }}
                    </a>
                </div>

                <img src="{{ asset('images/body/bowl_papas.png') }}" alt=""
                    class="relative bottom-30 w-full h-full mx-auto max-w-[503px] max-h-[663px] object-cover object-center">
            </div>
        </div>
    </div>
    {{-- Aca va a estar la demostracion de categorias --}}
    <div class="flex flex-col max-w-[1258px] mx-auto ">
        {{-- Aca van a aparecer 4 lineas de productos, con sus informaciones correspondientes y un boton para ir hacia ellos. --}}
        @if (optional($home)->mostrar_linea_productos)
            <h3 class="text-black text-[45px] font-bold font-['Nunito_Sans']">Linea de productos</h3>

            <div class="grid grid-cols-4 gap-6 max-w-[1258px] mx-auto mt-[85px]">
                @foreach ($categorias as $cat)
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



            <div class="flex justify-center mt-[30px]">
                <a href="{{ route('categorias.index') }}"
                    class="font-['Nunito_Sans'] text-black font-bold   px-[30px] py-[10px] border rounded-[20px] border-black w-full max-w-[192px] text-center hover:bg-[#FFA220]/60 hover:scale-103 transition-all duration-200">Ver
                    todas
                </a>
            </div>
        @endif

        {{-- Aca van a aparecer los productos destacados con su titulo, nombre y para ir hacia ellos --}}
        @if (optional($home)->mostrar_productos_destacados)
            <div class="flex flex-col mt-[60px] gap-[24px]">
                <h4 class="text-black text-[45px] font-bold font-['Nunito_Sans']">Productos destacados</h4>
                <div class="grid grid-cols-4 gap-[22px]">
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
        @endif

        @if (optional($home)->mostrar_recetas)
            <div class="flex flex-col mt-[60px] gap-[24px]">
                <h5 class="text-black text-[45px] font-bold font-['Nunito_Sans']">Recetas</h5>
                <div class="max-w-[1258px] mx-auto  grid grid-cols-3 gap-6 ">

                    @foreach ($recetas as $rec)
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
        @endif
    </div>

    </div>
@endsection
