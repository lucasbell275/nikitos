@extends('app.layout-zona-privada')

@section('content')
    <section class="min-h-[520px] pt-2 md:pt-8">
        <h1 class="sr-only">Histórico de pedidos</h1>

        @if (session('success'))
            <div class="mb-6 rounded-xl bg-green-50 p-4 text-sm text-green-700">{{ session('success') }}</div>
        @endif

        <div class="overflow-x-auto">
            <div class="flex flex-col w-full max-w-[1258px] font-['Nunito_Sans'] text-left min-w-[1000px]">

                
                <div
                    class="flex flex-row items-center rounded-t-[8px] bg-[#F5F5F5]  font-semibold text-[#030303] px-6 py-[15px]">

                    
                    <div class="w-[200px] flex flex-row items-center gap-10 shrink-0">
                        <div class="w-10 shrink-0" aria-hidden="true"></div>
                        <span>Clientes</span>
                    </div>

                    
                    <div class="w-[250px] shrink-0">
                        Razón social cliente
                    </div>

                    
                    <div class="w-[180px] shrink-0">
                        N° de Pedido
                    </div>

                    
                    <div class="w-[180px] shrink-0">
                        Fecha del pedido
                    </div>

                    
                    <div class="flex-1"><span class="sr-only">Acciones</span></div>
                </div>


                <div class="flex flex-col">
                    @forelse ($pedidos as $pedido)
                        <div
                            class="flex flex-row items-center border-b border-[#DCDCDC]  font-['Nunito_Sans'] text-[#5c5c5c] px-6 py-[32px]">

                            
                            <div class="w-[200px] flex flex-row items-center gap-10 shrink-0">
                                <svg class="h-10 w-10 shrink-0 text-[#FFA221]" viewBox="0 0 36 42" fill="none"
                                    stroke="currentColor" stroke-width="2.5" aria-hidden="true">
                                    <rect x="5" y="5" width="26" height="34" rx="3" />
                                    <rect x="12" y="2" width="12" height="7" rx="2" fill="white" />
                                    <path stroke-linecap="round" d="M11 18h2m5 0h8M11 25h2m5 0h8M11 32h2m5 0h8" />
                                </svg>
                                <span>{{ $pedido->codigo_cliente }}</span>
                            </div>

                            
                            <div class="w-[250px] shrink-0 truncate pr-4">
                                {{ $pedido->razon_social }}
                            </div>

                            
                            <div class="w-[180px] shrink-0">
                                {{ str_pad((string) $pedido->id, 8, '0', STR_PAD_LEFT) }}
                            </div>

                            
                            <div class="w-[180px] shrink-0 leading-[24px]">
                                {{ $pedido->fecha->format('d/m/Y') }}
                            </div>

                            
                            <div class="flex-1 flex flex-row items-center justify-end gap-[28px]">
                                <a href="{{ route('zona.pedidos.show', $pedido) }}"
                                    class="inline-flex min-w-[130px] justify-center rounded-[20px] border border-[#FFA221] px-[30px] py-[10px] font-semibold text-[#ffa221]  hover:bg-orange-50">Ver
                                    detalle</a>

                                <form action="{{ route('zona.pedidos.repetir', $pedido) }}" method="POST" class="m-0 flex"
                                    onsubmit="return confirm('¿Querés repetir este pedido con los mismos productos y cantidades?')">
                                    @csrf
                                    <button type="submit"
                                        class="inline-flex min-w-[130px] justify-center rounded-[20px] bg-[#FFA221] px-[30px] py-[10px] font-semibold text-white hover:bg-[#EE9237]">Repetir
                                        pedido</button>
                                </form>
                            </div>

                        </div>
                    @empty
                        <div class="flex flex-row justify-center px-6 py-12">
                            <div class="text-center text-sm text-gray-500">
                                Todavía no realizaste pedidos. <a href="{{ route('zona.productos') }}"
                                    class="font-bold text-[#F29109]">Hacer un pedido</a>
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>

        <div class="mt-8">{{ $pedidos->links() }}</div>
    </section>
@endsection
