@extends('admin.layout')

@section('main')
    <div class="container px-4 pt-24 mx-auto md:pt-32 lg:px-0">

        <div class="mb-4">
            <x-migas texto="Eventos" />
            <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl">Eventos</h1>
        </div>

        <section class="grid grid-cols-1 space-y-12 md:space-y-0 md:grid-cols-2 lg:grid-cols-3 md:gap-x-6 md:gap-6 pt-9">
            <!-- Pricing Card -->
            <div class="flex flex-col max-w-lg p-6 mx-auto text-gray-900 bg-white border border-gray-200 rounded-lg shadow-sm xl:p-8">
                <img src="{{ asset($evento->url_imagen) }}" class="mb-4" />
                <h3 class="mb-4 text-2xl font-semibold">{{ $evento->nombre }}</h3>
                <p class="font-light text-gray-500 sm:text-lg">{{ $evento->descripcion }}</p>
                <div class="flex items-baseline my-4">
                    <span class="text-gray-800">Categoría: &nbsp;</span>
                    <span class="text-gray-500"> {{ $evento->categoria->nombre }}</span>
                </div>
                <div class="flex items-baseline my-4">
                    <span class="text-gray-500">{{ $evento->fecha }} / {{ $evento->hora }}</span>
                </div>

                <!-- List -->
                <ul role="list" class="mb-8 space-y-4 text-left">
                    <li class="flex items-center space-x-3">
                        <span>{{ $evento->ciudad }}</span>
                    </li>
                    <li class="flex items-center space-x-3">
                        <span>{{ $evento->direccion }}</span>
                    </li>
                </ul>
                <a href="#" class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-primary-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">Inscribirse</a>
            </div>
        </section>

    </div>
@endsection
