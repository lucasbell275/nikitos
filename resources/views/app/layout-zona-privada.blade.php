<!DOCTYPE html>
<html lang="es" class="overflow-x-hidden">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Zona privada | Nikitos</title>
    <link rel="icon" href="{{ asset('images/imagenes_default/favicon.ico') }}">
    <link rel="stylesheet" href="{{ asset('css/motion.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script defer src="{{ asset('js/motion.js') }}"></script>
    <style>@import url('https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@400;500;600;700;800&family=Nunito:wght@400;600;700;800&display=swap');[x-cloak] { display: none !important; }</style>
</head>
<body data-motion-scope="private" class="min-h-screen bg-white text-[#171717] font-['Nunito_Sans']">
    @include('components.header-zona-privada')
    <main class="mx-auto max-w-[1258px] px-4 pt-14 pb-8 md:pt-20">
        @yield('content')
    </main>
    <div class="mt-[80px]">@include('components.footer')</div>
</body>
</html>