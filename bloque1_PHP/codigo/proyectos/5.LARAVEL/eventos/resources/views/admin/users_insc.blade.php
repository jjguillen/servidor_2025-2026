
@extends('admin.layout')
@section('main')
    <div class="container px-4 pt-24 mx-auto md:pt-32 lg:px-0">

        <div class="mb-4">
            <x-migas texto="Usuarios" />
            <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl">Usuarios para inscribir en el evento: {{ $evento->nombre }}</h1>
        </div>

        <div class="items-center justify-between block sm:flex md:divide-x md:divide-gray-100 mb-2">
            <div class="flex items-center mb-4 sm:mb-0">
                <form class="sm:pr-3" action="#" method="GET">
                    <label for="products-search" class="sr-only">Search</label>
                    <div class="relative w-48 mt-1 sm:w-64 xl:w-96">
                        <input type="text" name="email" id="products-search" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5" placeholder="Buscar">
                    </div>
                </form>
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
                            @foreach($usuarios as $usuario)
                                <x-table.tr>

                                    <x-table.td>{{ $usuario->name }}</x-table.td>
                                    <x-table.td>{{ $usuario->email }}</x-table.td>
                                    <x-table.td>{{ $usuario->rol }}</x-table.td>

                                    <x-table.td>
                                        <x-button identifier="verInscripciones" color="blue"
                                                  ruta="{{ route('eventos.inscribir-usuario', ['usuario' => $usuario, 'evento' => $evento]) }}">
                                           Añadir
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


