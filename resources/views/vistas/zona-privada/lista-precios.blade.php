@extends('app.layout-zona-privada')

@section('content')
    <section class="min-h-[520px] pt-2 md:pt-8">
        <h1 class="sr-only">Lista de precios</h1>

        <div class="overflow-x-auto">
            <div class="w-full min-w-[900px] max-w-[1258px] font-['Nunito_Sans'] text-left">
                <div class="flex items-center rounded-t-[8px] bg-[#F5F5F5] px-6 py-[15px] font-semibold text-[#030303]">
                    <div class="w-[42%] pl-[64px]">Nombre</div>
                    <div class="w-[22%]">Formato</div>
                    <div class="w-[14%]">Peso</div>
                    <div class="flex-1"><span class="sr-only">Acciones</span></div>
                </div>

                @forelse ($listas as $lista)
                    <div class="flex items-center border-b border-[#DCDCDC] px-6 py-[22px] text-[#737373]">
                        <div class="flex w-[42%] min-w-0 items-center gap-10 pr-4">
                            <svg class="h-10 w-10 shrink-0 text-[#FFA221]" viewBox="0 0 36 42" fill="none" stroke="currentColor" stroke-width="2.5" aria-hidden="true">
                                <path d="M7 2h15l8 8v27a3 3 0 0 1-3 3H7a3 3 0 0 1-3-3V5a3 3 0 0 1 3-3Z" stroke-linejoin="round"/>
                                <path d="M22 2v8h8M11 20h12M11 27h12M11 34h8" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            <span class="truncate" title="{{ $lista->titulo }}">{{ $lista->titulo }}</span>
                        </div>
                        <div class="w-[22%]">PDF</div>
                        <div class="w-[14%]">{{ $lista->pesoLegible() }}</div>
                        <div class="flex flex-1 items-center justify-end gap-5">
                            <a href="{{ route('zona.listas-precios.ver', $lista) }}" target="_blank" rel="noopener"
                                class="inline-flex min-w-[130px] justify-center whitespace-nowrap rounded-[20px] border border-[#FFA221] px-5 py-[10px] font-semibold text-[#FFA221]">Ver online</a>
                            <a href="{{ route('zona.listas-precios.descargar', $lista) }}"
                                class="inline-flex min-w-[130px] justify-center whitespace-nowrap rounded-[20px] bg-[#FFA221] px-5 py-[10px] font-semibold text-white">Descargar</a>
                        </div>
                    </div>
                @empty
                    <div class="border-b border-[#DCDCDC] px-6 py-12 text-center text-sm text-gray-500">
                        Todavía no hay listas de precios disponibles.
                    </div>
                @endforelse
            </div>
        </div>
    </section>
@endsection
