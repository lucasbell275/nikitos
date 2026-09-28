<!DOCTYPE html>
<html lang="en" class="overflow-x-hidden">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nikitos</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('images/imagenes_default/favicon.ico') }}">
    <link rel="stylesheet" href="{{ asset('css/motion.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script defer src="{{ asset('js/motion.js') }}"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap');
    </style>

<body data-motion-scope="auth" class="bg-gray-100 h-screen m-0 flex items-center justify-center">

    <div class="bg-white p-8 rounded-xl shadow-lg w-full max-w-[600px] border-[2px] border-[#ffa221]  hover:border-[#ffa221]/50 transition-all duration-200">
        <div class="flex items-center">
            <img src="{{ asset('images/components/header/logo.png') }}" alt=""
                class="w-full max-w-[200px] h-auto mx-auto object-center object-cover">
        </div>
        <h2 class="text-2xl font-bold text-center text-gray-800 font-['Nunito'] my-6">
            Panel de Administración
        </h2>

        <!-- Mensaje de error si las credenciales fallan -->
        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg mb-4 text-sm">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('login.submit') }}" method="POST" class="flex flex-col  gap-4 font-['Nunito_Sans']">
            @csrf


            <div>
                <label for="email" class="block text-sm font-semibold text-gray-600 mb-1">
                    Correo Electrónico
                </label>
                <input type="email" id="email" name="email" required value="{{ old('email') }}"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 text-sm focus:outline-none focus:border-[#EE9237] focus:ring-1 focus:ring-[#EE9237]">
            </div>

            <div>
                <label for="password" class="block text-sm font-semibold text-gray-600 mb-1">
                    Contraseña
                </label>
                <input type="password" id="password" name="password" required
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 text-sm focus:outline-none focus:border-[#EE9237] ">
            </div>

            <button type="submit"
                class="w-full bg-[#EE9237] hover:bg-[#EE9237]/80 text-white font-semibold hover:font-bold py-3 rounded-lg shadow-sm mt-2 transition-all duration-200 cursor-pointer">
                Ingresar
            </button>
        </form>
    </div>

</body>

</html>
