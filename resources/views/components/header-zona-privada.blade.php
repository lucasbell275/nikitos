<header class="mx-auto mt-5 max-w-[1258px] rounded-b-xl bg-white px-5 py-4 shadow-[0_4px_10px_rgba(0,0,0,0.09)] md:px-10"
    x-data="{ menu: false, account: false }">
    <div class="flex items-center justify-between gap-5">
        <a href="{{ route('home') }}" aria-label="Nikitos, zona privada">
            <img src="{{ asset('images/components/header/logo.png') }}" alt="Nikitos"
                class="h-12 w-auto object-contain md:h-16">
        </a>
        <nav class="hidden items-center gap-8  md:flex" aria-label="Zona privada">
            <a href="{{ route('zona.productos') }}"
                class="{{ request()->routeIs('zona.productos') ? 'font-extrabold' : 'font-medium' }} hover:text-[#F29109]">Productos</a>
            <a href="{{ route('zona.pedidos.index') }}"
                class="{{ request()->routeIs('zona.pedidos.*') ? 'font-extrabold' : 'font-medium' }} hover:text-[#F29109]">Histórico
                de pedido</a>
            <a href="{{ route('zona.listas-precios.index') }}"
                class="{{ request()->routeIs('zona.listas-precios.*') ? 'font-extrabold' : 'font-medium' }} hover:text-[#F29109]">Lista
                de precios</a>
        </nav>
        <div class="relative hidden md:block">
            <button type="button" @click="account = !account" :aria-expanded="account.toString()"
                class=" rounded-[20px] border border-[#FFA221] px-[30px] py-[10px]  font-semibold text-[#ffa221] hover:bg-orange-50">
                {{ auth('cliente')->user()->nombre }}
            </button>
            <div x-show="account" x-cloak @click.outside="account = false"
                class="absolute right-0 z-50 mt-2 w-48 rounded-xl border border-gray-100 bg-white p-2 shadow-lg">
                <span class="block px-3 py-2 text-xs text-gray-500">{{ auth('cliente')->user()->codigo_cliente }}</span>
                <a href="{{ route('home') }}"
                    class="block rounded-lg px-3 py-2 text-left text-sm hover:bg-orange-50">Volver al Home</a>
                <form action="{{ route('clientes.logout') }}" method="POST">@csrf
                    <button type="submit"
                        class="w-full rounded-lg px-3 py-2 text-left text-sm hover:bg-orange-50">Cerrar sesión</button>
                </form>
            </div>
        </div>
        <button type="button" class="rounded-lg p-2 md:hidden" @click="menu = !menu" aria-label="Abrir menú">
            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-width="2" stroke-linecap="round" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>
    </div>
    <nav x-show="menu" x-cloak class="mt-4 flex flex-col gap-3 border-t border-gray-100 pt-4 text-sm md:hidden"
        aria-label="Zona privada móvil">
        <a href="{{ route('zona.productos') }}">Productos</a>
        <a href="{{ route('zona.pedidos.index') }}">Histórico de pedido</a>
        <a href="{{ route('zona.listas-precios.index') }}"
            class="{{ request()->routeIs('zona.listas-precios.*') ? 'font-extrabold' : 'font-medium' }}">Lista de
            precios</a>
        <a href="{{ route('home') }}">Volver al Home</a>
        <form action="{{ route('clientes.logout') }}" method="POST">@csrf<button type="submit"
                class="text-[#F29109]">Cerrar sesión</button></form>
    </nav>
</header>
