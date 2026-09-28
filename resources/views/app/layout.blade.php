<!DOCTYPE html>
<html lang="en" class="overflow-x-hidden">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ \App\Models\Metadata::where('key', 'meta_title')->value('value') ?? 'Nikitos' }}</title>
    <meta name="description" content="{{ \App\Models\Metadata::where('key', 'meta_description')->value('value') }}">
    <meta name="keywords" content="{{ \App\Models\Metadata::where('key', 'meta_keywords')->value('value') }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('images/imagenes_default/favicon.ico') }}">
    <link rel="stylesheet" href="{{ asset('css/motion.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script defer src="{{ asset('js/motion.js') }}"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap');
        [x-cloak] { display: none !important; }
    </style>
</head>

<body data-motion-scope="public" class="min-h-full w-full overflow-x-hidden m-0 p-0">
    @include('components.header')
    @yield('content')
    <div class="mt-[180px]">
        @include('components.footer')
    </div>



</body>

</html>
