<header
    class="fixed left-0 right-0 top-0 z-50 mx-auto mt-[22px] flex max-w-[1258px] items-center justify-between gap-4 rounded-xl bg-white px-4 py-4 font-['Nunito_Sans'] shadow-lg md:px-10"
    x-data="{ menu: false, login: {{ $errors->has('username') ? 'true' : 'false' }} }">
    <a href="{{ route('home') }}" class="shrink-0" aria-label="Nikitos, inicio">
        <img src="{{ asset('images/components/header/logo.png') }}" alt="Nikitos"
            class="h-[50px] w-auto object-contain md:h-[67px]">
    </a>

    <nav class="hidden items-center gap-[24px] lg:flex" aria-label="Menú principal">
        <a href="{{ route('home') }}"
            class="text-[16px] leading-normal text-[#030303] hover:text-[#EE9237] {{ request()->routeIs('home') ? 'font-bold' : 'font-normal' }}"
            @if (request()->routeIs('home')) aria-current="page" @endif>Home</a>
        <a href="{{ route('categorias.index') }}"
            class="text-[16px] leading-normal text-[#030303] hover:text-[#EE9237] {{ request()->routeIs('categorias.*', 'productos.*') ? 'font-bold' : 'font-normal' }}"
            @if (request()->routeIs('categorias.*', 'productos.*')) aria-current="page" @endif>Productos</a>
        <a href="{{ route('mapa.index') }}"
            class="text-[16px] leading-normal text-[#030303] hover:text-[#EE9237] {{ request()->routeIs('mapa.*') ? 'font-bold' : 'font-normal' }}"
            @if (request()->routeIs('mapa.*')) aria-current="page" @endif>Donde comprar

        </a>

        <a href="{{ route('recetas.index') }}"
            class="text-[16px] leading-normal text-[#030303] hover:text-[#EE9237] {{ request()->routeIs('recetas.*') ? 'font-bold' : 'font-normal' }}"
            @if (request()->routeIs('recetas.*')) aria-current="page" @endif>Recetas</a>
        <a href="{{ route('nosotros.index') }}"
            class="text-[16px] leading-normal text-[#030303] hover:text-[#EE9237] {{ request()->routeIs('nosotros.*') ? 'font-bold' : 'font-normal' }}"
            @if (request()->routeIs('nosotros.*')) aria-current="page" @endif>Nosotros</a>
        <a href="{{ route('contacto.create') }}"
            class="text-[16px] leading-normal text-[#030303] hover:text-[#EE9237] {{ request()->routeIs('contacto.*') ? 'font-bold' : 'font-normal' }}"
            @if (request()->routeIs('contacto.*')) aria-current="page" @endif>Contacto</a>
    </nav>

    <div class="relative hidden shrink-0 lg:block">
        @auth('cliente')
            <a href="{{ route('zona.productos') }}"
                class="flex py-[10px] items-center justify-center rounded-[20px] bg-[#0D3F81] px-[30px] text-[16px] font-semibold text-white hover:opacity-90 transition-opacity">
                Zona privada
            </a>
        @else
            <button type="button" @click="login = !login" :aria-expanded="login.toString()"
                class="flex w-[165px] items-center justify-center gap-[10px] rounded-full bg-[#FFA221] px-[20px] py-[10px] text-[16px] font-bold leading-normal text-white hover:bg-[#EE9237]">
                <span>Ingresar</span>
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M5.83333 8.33335V5.83335C5.83333 4.72828 6.27232 3.66848 7.05372 2.88708C7.83512 2.10567 8.89493 1.66669 10 1.66669C11.1051 1.66669 12.1649 2.10567 12.9463 2.88708C13.7277 3.66848 14.1667 4.72828 14.1667 5.83335V8.33335M10.8333 13.3334C10.8333 13.7936 10.4602 14.1667 10 14.1667C9.53976 14.1667 9.16667 13.7936 9.16667 13.3334C9.16667 12.8731 9.53976 12.5 10 12.5C10.4602 12.5 10.8333 12.8731 10.8333 13.3334ZM4.16667 8.33335H15.8333C16.7538 8.33335 17.5 9.07955 17.5 10V16.6667C17.5 17.5872 16.7538 18.3334 15.8333 18.3334H4.16667C3.24619 18.3334 2.5 17.5872 2.5 16.6667V10C2.5 9.07955 3.24619 8.33335 4.16667 8.33335Z"
                        stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>

            </button>
            <div x-show="login" x-cloak @click.outside="login = false"
                class="absolute right-0 z-50 mt-4 w-80 rounded-2xl border border-gray-100 bg-white p-6 shadow-2xl">
                <div class="flex items-center justify-between border-b border-gray-100 pb-4">
                    <h3 class="font-['Nunito'] text-xl font-bold">Iniciar sesión</h3>
                    <button type="button" @click="login = false" class="text-xl text-gray-400"
                        aria-label="Cerrar">&times;</button>
                </div>
                <p class="mt-4 text-xs text-gray-500">Acceso exclusivo para clientes registrados.</p>
                @if ($errors->has('username'))
                    <p class="mt-3 text-xs text-red-600">{{ $errors->first('username') }}</p>
                @endif
                <form action="{{ route('clientes.login.submit') }}" method="POST" class="mt-4 flex flex-col gap-3">
                    @csrf
                    <label class="text-xs font-semibold text-gray-600">Usuario
                        <input type="text" name="username" value="{{ old('username') }}" autocomplete="username"
                            required
                            class="mt-1 w-full rounded-lg border border-gray-300 px-3 py-2 text-sm focus:border-[#FFA221] focus:outline-none">
                    </label>
                    <label class="text-xs font-semibold text-gray-600">Contraseña
                        <input type="password" name="password" autocomplete="current-password" required
                            class="mt-1 w-full rounded-lg border border-gray-300 px-3 py-2 text-sm focus:border-[#FFA221] focus:outline-none">
                    </label>
                    <button type="submit"
                        class="mt-2 rounded-lg bg-[#FFA221] py-2.5 text-sm font-bold text-white hover:bg-[#EE9237]">Entrar</button>
                </form>
                <p class="mt-4 border-t border-gray-100 pt-3 text-center text-xs text-gray-500">
                    Solicitá tu acceso a Nikitos si todavía no tenés cuenta.
                </p>
            </div>
        @endauth
    </div>

    <button type="button" @click="menu = !menu" class="p-2 lg:hidden" aria-label="Abrir menú"
        :aria-expanded="menu.toString()">
        <svg class="h-7 w-7" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
            <path stroke-width="2" stroke-linecap="round" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
    </button>
    <nav x-show="menu" x-cloak
        class="absolute left-4 right-4 top-full mt-2 flex flex-col gap-3 rounded-xl bg-white p-5 shadow-xl lg:hidden"
        aria-label="Menú móvil">
        <a href="{{ route('home') }}"
            class="text-[16px] text-[#030303] {{ request()->routeIs('home') ? 'font-bold' : 'font-normal' }}">Home</a>
        <a href="{{ route('categorias.index') }}"
            class="text-[16px] text-[#030303] {{ request()->routeIs('categorias.*', 'productos.*') ? 'font-bold' : 'font-normal' }}">Productos</a>
        <a href="{{ route('mapa.index') }}"
            class="text-[16px] text-[#030303] {{ request()->routeIs('mapa.*') ? 'font-bold' : 'font-normal' }}">Donde
            comprar</a>
        <a href="{{ route('recetas.index') }}"
            class="text-[16px] text-[#030303] {{ request()->routeIs('recetas.*') ? 'font-bold' : 'font-normal' }}">Recetas</a>
        <a href="{{ route('nosotros.index') }}"
            class="text-[16px] text-[#030303] {{ request()->routeIs('nosotros.*') ? 'font-bold' : 'font-normal' }}">Nosotros</a>
        <a href="{{ route('contacto.create') }}"
            class="text-[16px] text-[#030303] {{ request()->routeIs('contacto.*') ? 'font-bold' : 'font-normal' }}">Contacto</a>
        <a href="{{ auth('cliente')->check() ? route('zona.productos') : route('clientes.login') }}"
            class="mt-2 flex w-[165px] items-center justify-center gap-[10px] px-[20px] py-[10px] text-[16px] font-bold text-white {{ auth('cliente')->check() ? 'bg-[#0D3F81] rounded-[20px]' : 'bg-[#FFA221] rounded-full' }}">
            {{ auth('cliente')->check() ? 'Zona privada' : 'Ingresar' }}
        </a>
    </nav>
</header>
