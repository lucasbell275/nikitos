@extends('app.layout-admin')

@section('content')
    <div class="max-w-[1258px] mx-auto px-4 py-10 mt-5 font-['Nunito_Sans']">
        
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Mensajes de Contacto</h1>
        </div>

        
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg mb-6 text-sm">
                {{ session('success') }}
            </div>
        @endif

        
        <div class="flex flex-col shadow-sm rounded-xl overflow-hidden border border-gray-200 bg-white">

            
            <div
                class="flex items-center bg-gray-50 px-6 py-3 border-b border-gray-200 text-xs font-bold text-gray-600 uppercase tracking-wider">
                <div class="w-1/6">Tipo / Contacto</div>
                <div class="w-1/6">Datos Comerciales / Personales</div>
                <div class="w-1/6">Ubicación / Teléfono</div>
                <div class="w-1/6">Correo / Horario</div>
                <div class="w-1/6">Detalle / CV</div>
                <div class="w-1/6 text-right">Acciones</div>
            </div>

            
            <div class="flex flex-col divide-y divide-gray-200 text-sm">
                @forelse($contacto as $contacto)
                    <div class="flex items-center px-6 py-4 hover:bg-gray-50/50 transition-colors">

                        
                        <div class="w-1/6 pr-2">
                            @if ($contacto->razon_social)
                                <span
                                    class="inline-block px-2 py-0.5 text-xs font-semibold bg-orange-100 text-orange-800 rounded mb-1">Ventas</span>
                                <div class="font-bold text-gray-900">{{ $contacto->razon_social }}</div>
                                <div class="text-xs text-gray-500">CUIT: {{ $contacto->cuit }}</div>
                            @else
                                <span
                                    class="inline-block px-2 py-0.5 text-xs font-semibold bg-blue-100 text-blue-800 rounded mb-1">RRHH</span>
                                <div class="font-bold text-gray-900">{{ $contacto->nombre }}</div>
                                <div class="text-xs text-gray-500">Género: {{ $contacto->genero ?? 'No especificado' }}
                                </div>
                            @endif
                        </div>

                        
                        <div class="w-1/6 pr-2 text-xs text-gray-600">
                            @if ($contacto->razon_social)
                                <div><strong>Negocio:</strong> {{ $contacto->tipo_negocio }}</div>
                                <div><strong>Trayectoria:</strong> {{ $contacto->trayectoria_mercado }}</div>
                            @else
                                <span class="italic text-gray-400">N/A (Postulación CV)</span>
                            @endif
                        </div>

                        
                        <div class="w-1/6 pr-2 text-xs text-gray-600">
                            <div> {{ $contacto->direccion }}, {{ $contacto->localidad }}</div>
                            <div> {{ $contacto->telefono ?? $contacto->celular }}</div>
                        </div>

                        
                        <div class="w-1/6 pr-2 text-xs text-gray-600">
                            <div class="truncate"> {{ $contacto->email }}</div>
                            @if ($contacto->horario_atencion)
                                <div class="text-gray-500"> {{ $contacto->horario_atencion }}</div>
                            @endif
                        </div>

                        
                        <div class="w-1/6 pr-2 text-xs text-gray-600">
                            @if ($contacto->curriculum)
                                <a href="{{ asset('storage/' . $contacto->curriculum) }}" target="_blank"
                                    class="text-blue-600 hover:underline font-semibold flex items-center gap-1">
                                    Ver Currículum
                                </a>
                            @elseif($contacto->observaciones)
                                <div class="truncate text-gray-500" title="{{ $contacto->observaciones }}">
                                    {{ $contacto->observaciones }}
                                </div>
                            @else
                                <span class="italic text-gray-400">Sin detalles</span>
                            @endif
                        </div>

                        
                        <div class="w-1/6 flex items-center justify-end gap-2">
                            <a href="{{route('admin.contacto.show', $contacto->id)}}">Ver
                            </a>
                            <form action="{{ route('admin.contacto.destroy', $contacto->id) }}" method="POST"
                                onsubmit="return confirm('¿Estás seguro de eliminar este mensaje?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="text-red-600 hover:text-red-100 hover:bg-[#ffa221] hover:font-semibold px-2 py-1.5 rounded-md transition text-sm font-medium">
                                    Eliminar
                                </button>
                            </form>
                        </div>

                    </div>
                @empty
                    <div class="px-6 py-10 text-center text-gray-500 text-sm">
                        No hay mensajes de contacto registrados todavía.
                    </div>
                @endforelse
            </div>

        </div>
    </div>
@endsection
