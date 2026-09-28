@extends('app.layout-zona-privada')
@section('content')
    <div x-data="{ categoria: 'todas' }" class="font-['Nunito_Sans']">
        <div class="flex flex-col gap-[19px] mb-[46px]">
            <h1 class="font-['Nunito'] text-2xl font-extrabold md:text-3xl">Datos del pedido</h1>
            <p class=" max-w-[613px] text-[#5c5c5c]"> Por favor tenga a bien de rellenar los casilleros con la informacion
                requerida, de lo contrario no se podra enviar el mismo.</p>
        </div>
        @if ($errors->any())
            <div class="mb-6 rounded-xl border border-red-200 bg-red-50 p-4 text-sm text-red-700">
                <p class="font-bold">Revisá estos datos:</p>
                <ul class="mt-1 list-inside list-disc">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('zona.pedidos.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="grid grid-cols-1 gap-[24px] md:grid-cols-4">
                <div class="flex flex-col gap-5">
                    <label class=" text-[#5c5c5c]">Fecha*
                        <input type="date" name="fecha" value="{{ old('fecha', now()->toDateString()) }}" required
                            class="mt-[10px] h-11 w-full rounded-lg border border-[#DCDCDC] px-4  text-[#5c5c5c] text-[14px] focus:border-[#FFA221] focus:outline-none max-w-[295px] w-full opacity-80">
                    </label>
                    <label class="text-[#5c5c5c]">Localidad*
                        <input name="localidad" value="{{ old('localidad', $cliente->localidad) }}" required
                            class="mt-[10px] h-11 w-full rounded-lg border border-[#DCDCDC] px-4  text-[#5c5c5c] text-[14px] focus:border-[#FFA221] focus:outline-none max-w-[295px] w-full opacity-80">
                    </label>
                    <label class="text-[#5c5c5c]">Horario*
                        <input name="horario" value="{{ old('horario', $cliente->horario) }}" required
                            class="mt-[10px] h-11 w-full rounded-lg border border-[#DCDCDC] px-4  text-[#5c5c5c] text-[14px] focus:border-[#FFA221] focus:outline-none max-w-[295px] w-full opacity-80">
                    </label>
                </div>
                <div class="flex flex-col gap-5">
                    <label class="text-[#5c5c5c]">Razón social*
                        <input name="razon_social" value="{{ old('razon_social', $cliente->razon_social) }}" required
                            class="mt-[10px] h-11 w-full rounded-lg border border-[#DCDCDC] px-4  text-[#5c5c5c] text-[14px] focus:border-[#FFA221] focus:outline-none max-w-[295px] w-full opacity-80">
                    </label>
                    <label class="text-[#5c5c5c]">Código de cliente*
                        <input value="{{ $cliente->codigo_cliente }}" readonly
                            class="mt-2 h-11 w-full rounded-lg border border-[#DCDCDC] bg-gray-50 px-3 text-sm text-gray-600 max-w-[295px] w-full">
                    </label>
                    <label class="text-[#5c5c5c]">Condiciones de pago*
                        <input name="condiciones_pago" value="{{ old('condiciones_pago', $cliente->condiciones_pago) }}"
                            required
                            class="mt-[10px] h-11 w-full rounded-lg border border-[#DCDCDC] px-4  text-[#5c5c5c] text-[14px] focus:border-[#FFA221] focus:outline-none max-w-[295px] w-full opacity-80">
                    </label>
                </div>
                <div class="flex flex-col gap-[18px] md:col-span-2">
                    <label class="text-[#5c5c5c]">Observaciones*
                        <textarea name="observaciones" rows="4"
                            class="mt-2 h-[146px] w-full resize-y rounded-lg border border-[#DCDCDC] p-3 text-sm text-gray-800 focus:border-[#FFA221] focus:outline-none">{{ old('observaciones') }}</textarea>
                    </label>

                    <div x-data="{ fileName: 'Seleccionar archivo' }" class="flex flex-col">
                        <label for="archivo" class="text-[#5c5c5c]">¿Queres subir un archivo?</label>

                        <input type="file" id="archivo" name="archivo"
                            accept=".pdf,.jpg,.jpeg,.png,.xls,.xlsx,.doc,.docx" class="sr-only"
                            @change="fileName = $event.target.files[0] ? $event.target.files[0].name : 'Seleccionar archivo'">

                        <label for="archivo"
                            class="mt-2 h-11 w-full flex justify-between items-center rounded-lg border border-[#DCDCDC] px-4 cursor-pointer hover:border-[#FFA221] transition-all bg-white">
                            <span x-text="fileName" class="text-[#5c5c5c] text-[14px]"></span>

                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 flex-shrink-0">
                                <path
                                    d="M21 15V19C21 19.5304 20.7893 20.0391 20.4142 20.4142C20.0391 20.7893 19.5304 21 19 21H5C4.46957 21 3.96086 20.7893 3.58579 20.4142C3.21071 20.0391 3 19.5304 3 19V15M7 8L12 3L17 8M12 3V15"
                                    stroke="#FFA221" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </label>
                    </div>
                </div>
            </div>
            <div class="mt-[50px] mb-[53px] border-t border-[#DCDCDC]"></div>
            <div class="max-w-[616px] w-full relative" x-data="{ open: false, categoriaNombre: 'Todas' }">
                <button type="button" @click="open = !open"
                    class="w-full flex justify-between items-center rounded-lg border border-[#DCDCDC] bg-white px-4 py-[17px] text-[#5c5c5c] focus:border-[#FFA221] focus:outline-none">
                    <span>Filtrar por categoría:</span>
                    <span class="flex items-center gap-2 font-medium text-gray-800">
                        <span x-text="categoriaNombre"></span>
                        <svg class="w-4 h-4 text-gray-500 transition-transform" :class="{ 'rotate-180': open }"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </span>
                </button>

                <div x-show="open" @click.away="open = false"
                    class="absolute left-0 right-0 mt-2 bg-white border border-[#DCDCDC] rounded-lg shadow-lg z-50 overflow-hidden">

                    <div @click="categoria = 'todas'; categoriaNombre = 'Todas'; open = false"
                        class="px-4 py-3 hover:bg-gray-50 cursor-pointer text-[#5c5c5c]  border-b border-[#5c5c5c]/10">
                        Todas
                    </div>

                    @foreach ($categorias as $categoriaItem)
                        <div @click="categoria = '{{ $categoriaItem->id }}'; categoriaNombre = '{{ $categoriaItem->nombre_categoria }}'; open = false"
                            class="px-4 py-3 hover:bg-gray-50 cursor-pointer text-[#5c5c5c] font-semibold border-b border-gray-100 last:border-none">
                            {{ $categoriaItem->nombre_categoria }}
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="mx-auto max-w-[1258px] mt-[64px] flex flex-col gap-[64px]">
                @forelse ($categorias as $categoriaItem)
                    @if ($categoriaItem->productos->isNotEmpty())
                        <section x-show="categoria === 'todas' || categoria === '{{ $categoriaItem->id }}'" x-cloak>
                            <h2 class="mb-[21px] text-[#030303] font-['Nunito'] text-[28px] font-bold">
                                {{ $categoriaItem->nombre_categoria }}
                            </h2>
                            <div class="overflow-x-auto w-full">
                                <!-- Contenedor general con el ancho máximo exacto -->
                                <div class="w-full max-w-[1258px] flex flex-col">

                                    <!-- Encabezado -->
                                    <div
                                        class="bg-[#f5f5f5] font-semibold text-[#030303] flex items-center h-[48px] rounded-t-[8px] gap-6 text-left font-['Nunito_Sans']">
                                        <div class="w-[88px] flex-shrink-0"></div>
                                        <div class="w-[140px] flex-shrink-0">Código</div>
                                        <div class="w-[300px] flex-shrink-0">Nombre</div>
                                        <div class="w-[280px] flex-shrink-0">Presentación</div>
                                        <div class="w-[180px] flex-shrink-0">Cantidad</div>
                                        <div class="flex-grow"></div>
                                    </div>

                                    <!-- Filas de productos -->
                                    @foreach ($categoriaItem->productos as $producto)
                                        <div x-data="{ qty: {{ (int) old('items.' . $producto->id, 0) }} }"
                                            class="border-b border-[#DCDCDC] flex items-center gap-6 py-4">

                                            <!-- Imagen / Espacio inicial -->
                                            <div class="w-[88px] flex-shrink-0 flex items-center">
                                                <div
                                                    class="flex h-14 w-14 items-center justify-center rounded-lg border border-[#DCDCDC] bg-white py-2">
                                                    @if ($producto->imagen)
                                                        <img src="{{ asset('storage/' . str_replace('\\', '/', $producto->imagen)) }}"
                                                            alt="{{ $producto->nombre }}"
                                                            class="max-h-full max-w-full object-contain">
                                                    @endif
                                                </div>
                                            </div>

                                            <!-- Código -->
                                            <div
                                                class="w-[140px] flex-shrink-0 text-[#5c5c5c] font-light leading-[24px] font-['Nunito_Sans']">
                                                {{ $producto->codigo ?: $producto->id }}
                                            </div>

                                            <!-- Nombre -->
                                            <div
                                                class="w-[300px] flex-shrink-0 text-[#5c5c5c] font-light leading-[24px] font-['Nunito_Sans']">
                                                {{ $producto->nombre }}
                                            </div>

                                            <!-- Presentación -->
                                            <div
                                                class="w-[280px] flex-shrink-0 text-[#5c5c5c] font-light leading-[24px] font-['Nunito_Sans'] whitespace-nowrap">
                                                {{ $producto->cajas }}p x {{ $producto->unidades }}u x
                                                {{ $producto->peso }}g
                                            </div>

                                            <!-- Cantidad (Input) -->
                                            <div
                                                class="w-[180px] flex-shrink-0 text-[#5c5c5c] font-light leading-[24px] font-['Nunito_Sans']">
                                                <input type="number" min="0" max="9999" x-model.number="qty"
                                                    name="items[{{ $producto->id }}]"
                                                    aria-label="Cantidad de {{ $producto->nombre }}"
                                                    class="rounded-[8px] items-start border border-[#DCDCDC] flex justify-between h-[38px] px-[16px] w-[99px] text-[#5c5c5c] text-[15px] py-[9px] font-light font-['Nunito_Sans'] focus:border-[#FFA221] focus:outline-none">
                                            </div>

                                            <!-- Checkbox / Espacio final -->
                                            <div
                                                class="flex-grow text-[#5c5c5c] font-light leading-[24px] font-['Nunito_Sans'] flex justify-start">
                                                <label
                                                    class="relative flex items-center justify-center h-[38px] w-[38px] rounded-[8px] border border-[#DCDCDC] bg-white cursor-pointer">
                                                    <input type="checkbox" :checked="qty > 0"
                                                        @change="qty = $event.target.checked ? 1 : 0"
                                                        aria-label="Seleccionar {{ $producto->nombre }}" class="sr-only">
                                                    <div class="h-[18px] w-[18px] rounded-[4px] bg-[#ffa221]"
                                                        x-show="qty > 0">
                                                    </div>
                                                </label>
                                            </div>

                                        </div>
                                    @endforeach

                                </div>
                            </div>
                        </section>
                    @endif
                @empty
                    <p class="text-[#5c5c5c]">Todavía no hay productos disponibles.</p>
                @endforelse
            </div>

            <div class="mx-auto max-w-[1258px] mt-[64px] flex justify-end">
                <button type="submit"
                    class="min-w-[253px] rounded-[20px] bg-[#FFA221] py-[10px] font-semibold text-white hover:font-bold hover:bg-[#EE9237] transition-all duration-100">
                    Realizar pedido
                </button>
            </div>
        </form>
    </div>
@endsection
