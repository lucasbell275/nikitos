@extends('app.layout-admin')
@section('content')
    <div class="max-w-[1258px] mx-auto px-4 py-10 mt-5 font-['Nunito_Sans']">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Detalle del Contacto</h1>
            <a href="{{ route('admin.contacto.index') }}"
                class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-100 rounded-lg hover:bg-gray-200 transition-colors">
                Volver
            </a>
        </div>

        <div class="bg-white shadow-sm rounded-xl overflow-hidden border border-gray-200 p-6 space-y-6">
            <div>
                <p
                    class="inline-block px-5 py-3 text-md font-semibold rounded {{ $contacto->razon_social ? 'bg-orange-100 text-orange-800' : 'bg-blue-100 text-blue-800' }}">
                    {{ $contacto->razon_social ? 'Ventas' : 'Recursos Humanos' }}
                </p>
            </div>

            @if ($contacto->razon_social)
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm">
                    <div>
                        <p class="block text-xs font-bold text-gray-500 uppercase">Razón Social</p>
                        <p class="text-gray-800 font-medium">{{ $contacto->razon_social }}</p>
                    </div>
                    <div>
                        <p class="block text-xs font-bold text-gray-500 uppercase">CUIT</p>
                        <p class="text-gray-800 font-medium">{{ $contacto->cuit }}</p>
                    </div>
                    <div>
                        <p class="block text-xs font-bold text-gray-500 uppercase">Tipo de Negocio</p>
                        <p class="text-gray-800 font-medium">{{ $contacto->tipo_negocio }}</p>
                    </div>
                    <div>
                        <p class="block text-xs font-bold text-gray-500 uppercase">Trayectoria de Mercado</p>
                        <p class="text-gray-800 font-medium">{{ $contacto->trayectoria_mercado }}</p>
                    </div>
                </div>
            @else
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm">
                    <div>
                        <p class="block text-xs font-bold text-gray-500 uppercase">Nombre Completo</p>
                        <p class="text-gray-800 font-medium">{{ $contacto->nombre }}</p>
                    </div>
                    <div>
                        <p class="block text-xs font-bold text-gray-500 uppercase">Género</p>
                        <p class="text-gray-800 font-medium">{{ $contacto->genero ?? 'No especificado' }}</p>
                    </div>
                </div>
            @endif

            <hr class="border-gray-200">

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm">
                <div>
                    <p class="block text-xs font-bold text-gray-500 uppercase">Dirección</p>
                    <p class="text-gray-800 font-medium">{{ $contacto->direccion }}</p>
                </div>
                <div>
                    <p class="block text-xs font-bold text-gray-500 uppercase">Localidad</p>
                    <p class="text-gray-800 font-medium">{{ $contacto->localidad }}</p>
                </div>
                <div>
                    <p class="block text-xs font-bold text-gray-500 uppercase">Teléfono</p>
                    <p class="text-gray-800 font-medium">{{ $contacto->telefono ?? 'No especificado' }}</p>
                </div>
                <div>
                    <p class="block text-xs font-bold text-gray-500 uppercase">Celular</p>
                    <p class="text-gray-800 font-medium">{{ $contacto->celular ?? 'No especificado' }}</p>
                </div>
                <div>
                    <p class="block text-xs font-bold text-gray-500 uppercase">Correo Electrónico</p>
                    <p class="text-gray-800 font-medium">{{ $contacto->email }}</p>
                </div>
                <div>
                    <p class="block text-xs font-bold text-gray-500 uppercase">Horario de Atención</p>
                    <p class="text-gray-800 font-medium">{{ $contacto->horario_atencion ?? 'No especificado' }}</p>
                </div>
            </div>

            @if ($contacto->observaciones || $contacto->curriculum)
                <hr class="border-gray-200">
                <div class="text-sm space-y-2">
                    @if ($contacto->observaciones)
                        <div>
                            <p class="block text-xs font-bold text-gray-500 uppercase mb-1">Observaciones</p>
                            <p class="text-gray-700 bg-gray-50 p-3 rounded-lg border border-gray-200">
                                {{ $contacto->observaciones }}</p>
                        </div>
                    @endif

                    @if ($contacto->curriculum)
                        <div>
                            <p class="block text-xs font-bold text-gray-500 uppercase mb-1">Currículum</p>
                            <a href="{{ asset('storage/' . $contacto->curriculum) }}" target="_blank"
                                class="inline-flex items-center gap-2 text-blue-600 hover:underline font-semibold">
                                Ver o Descargar Archivo Adjunto
                            </a>
                        </div>
                    @endif
                </div>
            @endif
        </div>
    </div>
@endsection
