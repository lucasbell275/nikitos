@extends('app.layout-admin')

@section('content')
    <div class="max-w-[1258px] mx-auto px-4 mt-5 font-['Nunito_Sans']">
        <div class="bg-white rounded-2xl shadow-xl p-8 border border-gray-100">
            <h1 class="text-2xl md:text-3xl font-bold font-['Nunito'] text-black mb-6">Crear Nuevo Producto</h1>

            @if ($errors->any())
                <div role="alert" class="mb-6 rounded-xl border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-700">
                    <p class="font-bold">No se pudo guardar el producto. Revisá los campos marcados.</p>
                    <ul class="mt-2 list-disc pl-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.productos.store') }}" method="POST" enctype="multipart/form-data" novalidate
                x-data="{ imagenError: '' }" @submit="if (imagenError) $event.preventDefault()" class="space-y-6">
                @csrf

                <div>
                    <label for="nombre" class="block text-sm font-semibold text-black mb-2">Nombre</label>
                    <input type="text" name="nombre" id="nombre" value="{{ old('nombre') }}" required maxlength="255"
                        aria-invalid="{{ $errors->has('nombre') ? 'true' : 'false' }}"
                        class="w-full px-4 py-2 border border-[#DCDCDC] rounded-xl focus:ring-2 focus:ring-[#FFA221] focus:outline-none transition-all text-sm"
                        placeholder="Ej: Papas F.c/ Clásico">
                    @error('nombre') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="descripcion" class="block text-sm font-semibold text-black mb-2">Descripción</label>
                    <textarea name="descripcion" id="descripcion" rows="3"
                        class="w-full px-4 py-2 border border-[#DCDCDC] rounded-xl focus:ring-2 focus:ring-[#FFA221] focus:outline-none transition-all text-sm resize-y"
                        placeholder="Detalles del producto...">{{ old('descripcion') }}</textarea>
                    @error('descripcion') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="imagen" class="block text-sm font-semibold text-black mb-2">Imagen del Producto</label>
                    <input type="file" name="imagen" id="imagen" accept=".jpg,.jpeg,.png,.webp,image/jpeg,image/png,image/webp" required
                        @change="imagenError = $event.target.files[0] && $event.target.files[0].size > 2097152 ? 'La imagen no puede superar los 2 MB.' : ''"
                        aria-invalid="{{ $errors->has('imagen') ? 'true' : 'false' }}"
                        class="w-full px-4 py-2 border border-[#DCDCDC] rounded-xl focus:ring-2 focus:ring-[#FFA221] focus:outline-none transition-all bg-white text-sm file:mr-4 file:py-1.5 file:px-3 file:border-0 file:bg-gray-100 file:text-black file:hover:font-semibold file:hover:bg-[#ffa221] file:rounded-md file:transition file:text-sm file:font-['Nunito_Sans']">
                    <span class="text-[11px] text-gray-500">Recomendado: 800x800 px | Máx: 2 MB | Formato: JPG, PNG, WebP</span>
                    <p x-show="imagenError" x-text="imagenError" role="alert" style="display: none" class="mt-1 text-sm text-red-600"></p>
                    @error('imagen') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <label class="block text-sm font-semibold">Código comercial
                        <input name="codigo" value="{{ old('codigo') }}" maxlength="80"
                            class="mt-2 w-full rounded-xl border border-[#DCDCDC] px-4 py-2 text-sm" placeholder="Ej: NK-0001">
                    </label>
                    @error('codigo') <p class="text-sm text-red-600">{{ $message }}</p> @enderror
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="cajas" class="block text-sm font-semibold text-black mb-2">Cajas (tx)</label>
                        <input type="number" name="cajas" id="cajas" value="{{ old('cajas') }}" min="1" step="1" required
                            class="w-full px-4 py-2 border border-[#DCDCDC] rounded-xl focus:ring-2 focus:ring-[#FFA221] focus:outline-none transition-all text-sm"
                            placeholder="Ej: 15">
                        @error('cajas') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label for="unidades" class="block text-sm font-semibold text-black mb-2">Unidades (ux)</label>
                        <input type="number" name="unidades" id="unidades" value="{{ old('unidades') }}" min="1" step="1" required
                            class="w-full px-4 py-2 border border-[#DCDCDC] rounded-xl focus:ring-2 focus:ring-[#FFA221] focus:outline-none transition-all text-sm"
                            placeholder="Ej: 5">
                        @error('unidades') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="peso" class="block text-sm font-semibold text-black mb-2">Peso (gramos)</label>
                        <input type="number" name="peso" id="peso" value="{{ old('peso') }}" min="1" step="1" required
                            class="w-full px-4 py-2 border border-[#DCDCDC] rounded-xl focus:ring-2 focus:ring-[#FFA221] focus:outline-none transition-all text-sm"
                            placeholder="Ej: 20">
                        @error('peso') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label for="vida_util" class="block text-sm font-semibold text-black mb-2">Vida Útil (meses)</label>
                        <input type="number" name="vida_util" id="vida_util" value="{{ old('vida_util') }}" min="1" step="1" required
                            class="w-full px-4 py-2 border border-[#DCDCDC] rounded-xl focus:ring-2 focus:ring-[#FFA221] focus:outline-none transition-all text-sm"
                            placeholder="Ej: 8">
                        @error('vida_util') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label for="categoria_id" class="block text-sm font-semibold text-black mb-2">Categoría</label>
                        <select name="categoria_id" id="categoria_id" required
                            class="w-full px-4 py-2 border border-[#DCDCDC] rounded-xl focus:ring-2 focus:ring-[#FFA221] focus:outline-none transition-all bg-white text-sm">
                            <option value="">Selecciona una categoría</option>
                            @foreach ($categoria as $cat)
                                <option value="{{ $cat->id }}" {{ old('categoria_id') == $cat->id ? 'selected' : '' }}>
                                    {{ $cat->nombre_categoria }}
                                </option>
                            @endforeach
                        </select>
                        @error('categoria_id') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                    </div>
                </div>

                <div class="flex items-center justify-end gap-3 pt-4 border-t border-gray-100">
                    <a href="{{ route('admin.productos.index') }}"
                        class="bg-gray-300/70 hover:bg-gray-200 text-black px-4 py-2 rounded-lg text-sm font-semibold font-['Nunito_Sans'] transition">
                        Cancelar
                    </a>
                    <button type="submit"
                        class="bg-black text-white hover:bg-[#ffa221] hover:text-black px-4 py-2 rounded-lg text-sm font-semibold font-['Nunito_Sans'] transition">
                        Guardar Producto
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
