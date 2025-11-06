
<!doctype html>
<html>
<head>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body class="bg-gray-50">

<nav class="fixed z-50 w-full bg-white border-b border-gray-200 sm:py-2">
    <div class="container py-3 mx-auto">
        <div class="flex items-center justify-between">
            <div class="flex items-center justify-start">
                <a href="https://flowbite-admin-dashboard.vercel.app/" class="flex mr-4">
                    <span class="self-center text-2xl font-semibold whitespace-nowrap">EVENTOS</span>
                </a>
                <div class="hidden sm:flex sm:ml-6">
                    <ul class="flex space-x-8">
                        <li>
                            <a href="{{ route('eventos.index') }}"
                               class="text-sm font-medium text-gray-700 hover:text-primary-700"
                               aria-current="page">Home</a>
                        </li>
                        <li>
                            <a href="{{ route('usuarios.index') }}"
                               class="text-sm font-medium text-gray-700 hover:text-primary-700"
                               aria-current="page">Usuarios</a>
                        </li>
                        <li>
                            <a href="#"
                               class="text-sm font-medium text-gray-700 hover:text-primary-700"
                               aria-current="page">Inscripciones</a>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </div>

    <div class="hidden sm:hidden" id="mobile-menu">
        <ul class="pt-2">
            <li>
                <a href="#"
                   class="block py-2 pl-3 pr-4 text-base font-normal text-gray-900 bg-gray-100">Dashboard</a>
            </li>
            <li>
                <a href="#"
                   class="block px-3 py-2 text-base font-normal text-gray-600 border-b border-gray-100 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-900">Team</a>
            </li>
            <li>
                <a href="#"
                   class="block px-3 py-2 text-base font-normal text-gray-600 border-b border-gray-100 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-900">Projects</a>
            </li>
            <li>
                <a href="#"
                   class="block px-3 py-2 text-base font-normal text-gray-600 border-b border-gray-100 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-900">Calendar
                </a>
            </li>
            <li class="block">
                <a href="#"
                   class="inline-flex items-center w-full px-3 py-2 text-base font-normal text-gray-600 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-900">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                         xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
                    </svg>
                    Login/Register
                </a>
            </li>
        </ul>
    </div>
</nav>

<main class="bg-gray-50">
    @yield('main')
</main>

<footer class="py-12 bg-white xl:py-24">
    <div class="container px-4 mx-auto xl:px-0">
        <hr class="my-8 border-gray-200 lg:my-12">
        <span class="block text-center text-gray-600">© 2019-<span id="currentYear">2023</span> <a href="https://flowbite.com" target="_blank" rel="noreferrer">Flowbite</a>. All Rights Reserved.
        </span>
    </div>
</footer>



<script async defer src="https://buttons.github.io/buttons.js"></script>
<script src="https://flowbite-admin-dashboard.vercel.app//app.bundle.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.2/datepicker.min.js"></script>
</body>
</html>
</html>


