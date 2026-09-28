@extends('app.layout')

@section('content')
    <div>
        {{-- Fondo papas con nombre productos por encima --}}
        <div class="relative h-[350px] md:h-[450px] w-full">
            <img src="{{ asset('images/imagenes_default/papas_relleno.png') }}" alt=""
                class="absolute inset-0 z-0 w-full h-full  object-center">
            <div class="absolute inset-0 flex items-center justify-center">
                <h1
                    class=" flex justify-center text-['Nunito_Sans'] text-white font-semibold text-[50px] [text-shadow:_0_4px_4px_rgba(0,0,0,0.25)]">
                    Productos</h1>
            </div>
        </div>
        {{-- Contenido parte productos (vista show en este caso) --}}
        <div class="relative z-10 max-w-[1258px] mt-[85px] mx-auto">
            <div class="flex flex-row gap-[93px]">
                <div class="flex flex-col border-t border-[#DDDDDD] max-w-[297px] w-full">
                    @foreach ($categoria as $cat)
                        @php
                            $isSelected = isset($producto) && $producto->categoria_id == $cat->id;
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
                {{-- Aca esta la card con toda la informacion del producto --}}
                <div class="flex flex-col gap-[94px]">


                    <div class="flex flex-row gap-6">
                        <div class="flex flex-col" x-data="{ abierta: false }">
                            <div class="px-[62px] py-[47px] border rounded-[12px] border-[#DCDCDC]">
                                <button type="button" @click="abierta = true" aria-label="Ampliar imagen de {{ $producto->nombre }}">
                                    <img src="{{ asset('storage/' . $producto->imagen) }}" alt="{{ $producto->nombre }}"
                                        class="hover:scale-101 transition-all duration-100 h-[307px] w-[269px] object-cover cursor-pointer">
                                </button>
                            </div>
                            <div class="flex flex-row gap-2 mt-3">
                                <button type="button" @click="abierta = true" aria-label="Ampliar imagen de {{ $producto->nombre }}">
                                    <img src="{{ asset('storage/' . $producto->imagen) }}" alt="{{ $producto->nombre }}"
                                        class="w-[60px] h-[60px] py-2 px-[10px] border rounded-[12px] border-[#DCDCDC] hover:scale-101 transition-all duration-100 object-center cursor-pointer">
                                </button>
                                <button type="button" @click="abierta = true" aria-label="Ampliar imagen de {{ $producto->nombre }}">
                                    <img src="{{ asset('storage/' . $producto->imagen) }}" alt="{{ $producto->nombre }}"
                                        class="w-[60px] h-[60px] py-2 px-[10px] border rounded-[12px] border-[#DCDCDC] hover:scale-101 transition-all duration-100 object-center cursor-pointer">
                                </button>
                            </div>

                            <template x-teleport="body">
                                <div x-show="abierta" x-cloak x-transition.opacity
                                    @click.self="abierta = false" @keydown.escape.window="abierta = false"
                                    role="dialog" aria-modal="true" aria-label="Imagen ampliada de {{ $producto->nombre }}"
                                    class="fixed inset-0 z-[100] flex items-center justify-center bg-black/80 p-4">
                                    <button type="button" @click="abierta = false" aria-label="Cerrar imagen ampliada"
                                        class="absolute right-5 top-5 text-4xl leading-none text-white">&times;</button>
                                    <img src="{{ asset('storage/' . $producto->imagen) }}" alt="{{ $producto->nombre }}"
                                        class="max-h-[90vh] max-w-[90vw] rounded-xl object-contain">
                                </div>
                            </template>
                        </div>
                        <div class="flex flex-col gap-2">
                            <h2 class="font-['Nunito_Sans'] font-bold text-[13px] uppercase"
                                style="color: {{ $producto->categorias->color }};">
                                {{ $producto->categorias->nombre_categoria }}</h2>
                            <p class="text-black text-[30px] font-bold leading-[23px] font-['Nunito_Sans']">
                                {{ $producto->nombre }}
                            </p>
                            <p class="font-['Nunito_Sans'] text-[#5c5c5c] leading-[23px] text-[18px] mt-2">
                                {{ $producto->descripcion }}
                            </p>
                            <div>
                                <p class="font-['Nunito_Sans'] font-semibold leading-[40px] text-[#5c5c5c]">Codigo</p>
                                <p class="font-['Nunito_Sans'] text-[#5c5c5c] leading-[23px]">
                                    {{ $producto->id }}
                                </p>
                            </div>
                            <div>
                                <p class="font-['Nunito_Sans'] font-semibold leading-[40px] text-[#5c5c5c]">Tamaño</p>
                                <p class="font-['Nunito_Sans'] text-[#5c5c5c] leading-[23px]">{{ $producto->cajas }}p x
                                    {{ $producto->unidades }}u x {{ $producto->peso }}grs.</p>
                            </div>
                            <div>
                                <p class="font-['Nunito_Sans'] font-semibold leading-[40px] text-[#5c5c5c]">
                                    Vida util
                                </p>
                                <p class="font-['Nunito_Sans'] text-[#5c5c5c] leading-[23px]">
                                    {{ $producto->vida_util }} semanas.
                                </p>
                            </div>
                            <a href=""
                                class="bg-[#FFA321] text-white font-semibold font-['Nunito_Sans'] max-w-[243px] px-[30px] rounded-[20px] py-[10px] text-center mt-[47px] hover:font-black hover:bg-[#FFA321]/80 transition-all duration-200">Consultar</a>
                        </div>
                    </div>
                    <div class="flex flex-col gap-6">
                        <h3 class="text-[28px] font-semibold leading-[23px] font-['Nunito_Sans'] text-black">Productos
                            relacionados</h3>
                        <div class="grid grid-cols-3 gap-3 mx-auto max-w-[1258px] w-full mb-10">
                            @foreach ($productosRelacionados as $producto)
                                <div
                                    class="border border-[#DCDCDC] items-center flex flex-col gap-[7px] max-h-[321px] w-full max-w-[297px] w-full h-[321px]">
                                    <img src="{{ asset('storage/' . $producto->imagen) }}" alt=""
                                        class="max-h-[179px] max-w-[297px] h-[179px] mt-6  hover:scale-101 transition-all object-cover overflow-hidden duration-200  ">
                                    <p class="font-['Nunito_Sans'] font-extrabold text-[13px] mt-[4px] uppercase"
                                        style="color: {{ $producto->categorias->color }};">
                                        {{ $producto->categorias->nombre_categoria }}</p>
                                    <p class="text-[21px] font-bold font-['Nunito_Sans'] leading-[23px] ">
                                        {{ $producto->nombre }}
                                    </p>
                                    <a href="{{ route('productos.show', $producto) }}"
                                        class="mb-[11px] mt-[9px] text-[16px] font-['Nunito_Sans'] font-semibold text-black text-center group relative inline-block mt-[9px] mb-[21px] hover:font-bold transition-all duration-200">Ver
                                        producto
                                        <span
                                            class="absolute bottom-0   left-0 w-full h-[0.3px] bg-black transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-center ">
                                        </span>
                                    </a>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
