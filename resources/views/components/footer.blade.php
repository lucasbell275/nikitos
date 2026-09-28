<footer class="relative w-full bg-white overflow-hidden">
    <div class="absolute inset-0 w-full h-full">
        <img src="{{ asset('images/components/footer/franja-naranja-footer.png') }}" alt=""
            class="w-full h-full object-center">
    </div>

    <div
        class="relative z-10 grid grid-cols-1 md:grid-cols-4 max-w-[1258px] mx-auto px-4 pt-16 pb-12 gap-12 items-start mt-[100px]">
        <div class="flex flex-col items-center gap-[29px]">
            <img src="{{ asset('images/components/header/logo.png') }}" alt="" class="w-[140px] h-[67px]">
            <div class="flex gap-2 items-center">
                <a href="https://www.facebook.com/Nikitossnacksarg">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M15 1.66675H12.5C11.3949 1.66675 10.3351 2.10573 9.5537 2.88714C8.7723 3.66854 8.33331 4.72835 8.33331 5.83341V8.33341H5.83331V11.6667H8.33331V18.3334H11.6666V11.6667H14.1666L15 8.33341H11.6666V5.83341C11.6666 5.6124 11.7544 5.40044 11.9107 5.24416C12.067 5.08788 12.279 5.00008 12.5 5.00008H15V1.66675Z"
                            fill="white" />
                    </svg>
                </a>
                <a href="https://www.instagram.com/nikitos_snacks/?hl=es">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_5007_395)">
                            <path
                                d="M14.1667 1.66675H5.83335C3.53217 1.66675 1.66669 3.53223 1.66669 5.83341V14.1667C1.66669 16.4679 3.53217 18.3334 5.83335 18.3334H14.1667C16.4679 18.3334 18.3334 16.4679 18.3334 14.1667V5.83341C18.3334 3.53223 16.4679 1.66675 14.1667 1.66675Z"
                                stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            <path
                                d="M13.3333 9.47501C13.4362 10.1685 13.3177 10.8769 12.9948 11.4992C12.6719 12.1215 12.1609 12.6262 11.5347 12.9414C10.9084 13.2566 10.1987 13.3663 9.50647 13.255C8.81425 13.1436 8.17478 12.8167 7.67901 12.321C7.18324 11.8252 6.85642 11.1857 6.74504 10.4935C6.63365 9.8013 6.74337 9.09159 7.05858 8.46532C7.3738 7.83905 7.87847 7.32812 8.5008 7.00521C9.12313 6.68229 9.83144 6.56383 10.525 6.66667C11.2324 6.77158 11.8874 7.10123 12.3931 7.60693C12.8988 8.11263 13.2284 8.76757 13.3333 9.47501Z"
                                stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M14.5833 5.41675H14.5916" stroke="white" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </g>
                        <defs>
                            <clipPath id="clip0_5007_395">
                                <rect width="20" height="20" fill="white" />
                            </clipPath>
                        </defs>
                    </svg>
                </a>
            </div>
        </div>

        <nav class="flex flex-col gap-[26px]">
            <h3 class="font-['Nunito_Sans'] text-white text-[19px] font-bold">
                Secciones
            </h3>
            <ul class="grid grid-cols-2 gap-x-8 gap-y-[14px] font-['Nunito_Sans'] text-white text-sm">
                <li>
                    <a href="{{ route('home') }}" class="relative inline-block group">
                        Home
                        <span
                            class="absolute bottom-0 left-0 w-full h-[0.5px] bg-white transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-center"></span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('productos.index') }}" class="relative inline-block group">
                        Productos
                        <span
                            class="absolute bottom-0 left-0 w-full h-[0.5px] bg-white transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-center"></span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('mapa.index') }}" class="relative inline-block group">Donde comprar
                        <span
                            class="absolute bottom-0 left-0 w-full h-[0.5px] bg-white transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-center"></span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('home') }}" class="relative inline-block group">
                        RSE
                        <span
                            class="absolute bottom-0 left-0 w-full h-[0.5px] bg-white transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-center"></span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('recetas.index') }}" class="relative inline-block group">
                        Recetas
                        <span
                            class="absolute bottom-0 left-0 w-full h-[0.5px] bg-white transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-center"></span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('nosotros.index') }}" class="relative inline-block group">
                        Nosotros
                        <span
                            class="absolute bottom-0 left-0 w-full h-[0.5px] bg-white transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-center"></span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('contacto.create') }}" class="relative inline-block group">
                        Contacto
                        <span
                            class="absolute bottom-0 left-0 w-full h-[0.5px] bg-white transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-center"></span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('home') }}" class="relative inline-block group">
                        Politicas de calidad
                        <span
                            class="absolute bottom-0 left-0 w-full h-[0.5px] bg-white transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-center"></span>
                    </a>
                </li>
            </ul>
        </nav>

        <form action="{{ route('newsletter.store') }}" method="POST" class="flex flex-col gap-[26px]">
            <h6 class="text-[19px] text-white font-bold font-['Nunito_Sans']">Subscribite al Newsletter</h6>
            @csrf
            <div
                class="w-full max-w-[298px] h-[45px] rounded-[12px] bg-white px-[17px] flex justify-between items-center">
                <input type="email" name="email" required
                    class="text-start w-full text-black text-[14px] font-['Nunito_Sans'] outline-none"
                    placeholder="Email">
                <button type="submit" class="">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M5 12H19" stroke="#F29109" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" />
                        <path d="M12 5L19 12L12 19" stroke="#F29109" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>

                </button>
            </div>
            @error('email')
                <span class="text-xs text-red-500">{{ $message }}</span>
            @enderror
            @if (session('newsletter_success'))
                <span class="text-xs text-green-600 font-semibold">{{ session('newsletter_success') }}</span>
            @endif
        </form>

        <div class="flex flex-col text-white font-['Nunito_Sans'] gap-[14px] text-sm">
            <h5 class="text-white text-[19px] font-bold">
                Contacto
            </h5>
            <p class="flex flex-row gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 20 20"
                    fill="none">
                    <path
                        d="M16.6667 8.33342C16.6667 12.4942 12.0509 16.8276 10.5009 18.1659C10.3565 18.2745 10.1807 18.3332 10 18.3332C9.81938 18.3332 9.6436 18.2745 9.49921 18.1659C7.94921 16.8276 3.33337 12.4942 3.33337 8.33342C3.33337 6.56531 4.03575 4.86961 5.286 3.61937C6.53624 2.36913 8.23193 1.66675 10 1.66675C11.7681 1.66675 13.4638 2.36913 14.7141 3.61937C15.9643 4.86961 16.6667 6.56531 16.6667 8.33342Z"
                        stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    <path
                        d="M10 10.8334C11.3808 10.8334 12.5 9.71413 12.5 8.33342C12.5 6.9527 11.3808 5.83342 10 5.83342C8.61933 5.83342 7.50004 6.9527 7.50004 8.33342C7.50004 9.71413 8.61933 10.8334 10 10.8334Z"
                        stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                <span>Av. Otero y Gibraltar - Km 32 CP.1761 Pontevedra, Merlo, Argentina</span>
            </p>
            <p class="flex flex-row gap-2">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0_5043_754)">
                        <path
                            d="M18.3332 14.0999V16.5999C18.3341 16.832 18.2866 17.0617 18.1936 17.2744C18.1006 17.487 17.9643 17.6779 17.7933 17.8348C17.6222 17.9917 17.4203 18.1112 17.2005 18.1855C16.9806 18.2599 16.7477 18.2875 16.5165 18.2666C13.9522 17.988 11.489 17.1117 9.32486 15.7083C7.31139 14.4288 5.60431 12.7217 4.32486 10.7083C2.91651 8.53426 2.04007 6.05908 1.76653 3.48325C1.7457 3.25281 1.77309 3.02055 1.84695 2.80127C1.9208 2.58199 2.03951 2.38049 2.1955 2.2096C2.3515 2.03871 2.54137 1.90218 2.75302 1.80869C2.96468 1.7152 3.19348 1.6668 3.42486 1.66658H5.92486C6.32928 1.6626 6.72136 1.80582 7.028 2.06953C7.33464 2.33324 7.53493 2.69946 7.59153 3.09992C7.69705 3.89997 7.89274 4.68552 8.17486 5.44158C8.28698 5.73985 8.31125 6.06401 8.24478 6.37565C8.17832 6.68729 8.02392 6.97334 7.79986 7.19992L6.74153 8.25825C7.92783 10.3445 9.65524 12.072 11.7415 13.2583L12.7999 12.1999C13.0264 11.9759 13.3125 11.8215 13.6241 11.755C13.9358 11.6885 14.2599 11.7128 14.5582 11.8249C15.3143 12.107 16.0998 12.3027 16.8999 12.4083C17.3047 12.4654 17.6744 12.6693 17.9386 12.9812C18.2029 13.2931 18.3433 13.6912 18.3332 14.0999Z"
                            stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </g>
                    <defs>
                        <clipPath id="clip0_5043_754">
                            <rect width="20" height="20" fill="white" />
                        </clipPath>
                    </defs>
                </svg>
                0220.492.4752
            </p>
            <p class="flex flex-row gap-2">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M16.667 3.33325H3.33366C2.41318 3.33325 1.66699 4.07944 1.66699 4.99992V14.9999C1.66699 15.9204 2.41318 16.6666 3.33366 16.6666H16.667C17.5875 16.6666 18.3337 15.9204 18.3337 14.9999V4.99992C18.3337 4.07944 17.5875 3.33325 16.667 3.33325Z"
                        stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    <path
                        d="M18.3337 5.83325L10.8587 10.5833C10.6014 10.7444 10.3039 10.8299 10.0003 10.8299C9.69673 10.8299 9.39927 10.7444 9.14199 10.5833L1.66699 5.83325"
                        stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                ventas@nikitos.com.ar
            </p>
            <p class="flex flex-row gap-2">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0_5043_752)">
                        <path
                            d="M10.0003 5.00008V10.0001H13.7503M18.3337 10.0001C18.3337 14.6025 14.6027 18.3334 10.0003 18.3334C5.39795 18.3334 1.66699 14.6025 1.66699 10.0001C1.66699 5.39771 5.39795 1.66675 10.0003 1.66675C14.6027 1.66675 18.3337 5.39771 18.3337 10.0001Z"
                            stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </g>
                    <defs>
                        <clipPath id="clip0_5043_752">
                            <rect width="20" height="20" fill="white" />
                        </clipPath>
                    </defs>
                </svg>
                Lunes a Viernes 9:00 a 17:30hs
            </p>
        </div>
    </div>

    <div
        class="relative z-10 px-[50px] py-6 flex flex-row justify-between text-white font-['Nunito_Sans'] text-[14px] bg-[#F39617]">
        <p>© Copyright 2024 Nikitos Snacks. Todos los derechos reservados</p>
        <p>By <span class="font-bold">Osole</span></p>
    </div>
</footer>
