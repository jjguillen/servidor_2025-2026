
@extends('admin.layout')
@section('main')
    <div class="container px-4 pt-24 mx-auto md:pt-32 lg:px-0">

        <div class="mb-4">
            <x-migas texto="Usuarios" />
            <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl">Usuarios inscritos en el evento: {{ $evento->nombre }}</h1>
        </div>

        <div class="items-center justify-between block sm:flex md:divide-x md:divide-gray-100 mb-2">
            <div class="flex items-center mb-4 sm:mb-0">
                <form class="sm:pr-3" action="#" method="GET">
                    <label for="products-search" class="sr-only">Search</label>
                    <div class="relative w-48 mt-1 sm:w-64 xl:w-96">
                        <input type="text" name="email" id="products-search" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5" placeholder="Buscar eventos">
                    </div>
                </form>
                <div class="flex items-center w-full sm:justify-end">
                    <div class="flex pl-2 space-x-1">
                        <a href="{{ route('eventos.inscribir', ['evento' => $evento]) }}" class="inline-flex justify-center p-1 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100">
                            <svg class="w-6 h-6" viewBox="0 0 25 25" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path fill-rule="evenodd" clip-rule="evenodd" d="M3.691 8.507c0 2.847 1.582 5.29 3.806 5.29 2.223 0 3.803-2.443 3.803-5.29 0-2.846-1.348-4.51-3.803-4.51-2.456 0-3.806 1.664-3.806 4.51zM1.326 19.192c.82.537 2.879.805 6.174.805 3.295 0 5.353-.268 6.174-.804a.5.5 0 0 0 .225-.453c-.152-2.228-2.287-3.343-6.403-3.343-4.117 0-6.249 1.115-6.395 3.344a.5.5 0 0 0 .225.451zM18 17a1 1 0 0 1-1-1v-3h-3a1 1 0 1 1 0-2h3V8a1 1 0 1 1 2 0v3h3a1 1 0 1 1 0 2h-3v3a1 1 0 0 1-1 1z" fill="#000000"></path></g></svg>
                        </a>
                        <a href="#" class="inline-flex justify-center p-1 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z"></path></svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- TABLA DE USUARIOS -->
        <div class="flex flex-col">
            <div class="overflow-x-auto">
                <div class="inline-block min-w-full align-middle">
                    <div class="overflow-hidden shadow">
                        <x-table.table>
                            <x-table.thead color="red">
                                <x-table.th color="gray">Nombre</x-table.th>
                                <x-table.th color="gray">Email</x-table.th>
                                <x-table.th color="gray">Rol</x-table.th>
                                <x-table.th color="gray">Acciones</x-table.th>
                            </x-table.thead>
                            <x-table.tbody color="bg-white-200">
                            @foreach($inscritos as $usuario)
                                <x-table.tr>

                                    <x-table.td>{{ $usuario->name }}</x-table.td>
                                    <x-table.td>{{ $usuario->email }}</x-table.td>
                                    <x-table.td>{{ $usuario->rol }}</x-table.td>

                                    <x-table.td>
                                        <x-button identifier="verInscripciones" color="blue"
                                                  ruta="{{ route('eventos.desinscribir-usuario', ['usuario' => $usuario, 'evento' => $evento]) }}">
                                           Desinscribir
                                        </x-button>
                                    </x-table.td>
                                </x-table.tr>
                            @endforeach
                            </x-table.tbody>
                        </x-table.table>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection


