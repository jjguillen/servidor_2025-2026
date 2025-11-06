@extends('admin.layout')

@section('main')

    <div class="container px-4 pt-24 mx-auto md:pt-32 lg:px-0">

        <div class="mb-4">
            <x-migas texto="Eventos" />
            <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl">Eventos</h1>
        </div>

        <x-form ruta="{{ isset($evento) ? route('eventos.update', ['evento' => $evento]) : route('eventos.store') }}"
                nombre="Nuevo Evento"
                metodo="{{ isset($evento) ? 'put' : 'post' }}">
            <x-form.input tipo="text" nombre="nombre" label="Nombre" required="required" valor="{{ $evento->nombre ?? '' }}"/>
            <x-form.input tipo="text" nombre="descripcion" label="Descripción" required="required" valor="{{ $evento->descripcion ?? '' }}"/>
            <x-form.input tipo="text" nombre="ciudad" label="Ciudad" required="required" valor="{{ $evento->ciudad ?? '' }}"/>
            <x-form.input tipo="text" nombre="direccion" label="Dirección" required="required" valor="{{ $evento->direccion ?? '' }}"/>
            <x-form.input tipo="date" nombre="fecha" label="Fecha" required="required" valor="{{ $evento->fecha ?? '' }}" />
            <x-form.input tipo="time" nombre="hora" label="Hora" required="required" valor="{{ $evento->hora ?? '' }}"/>
            <x-form.input tipo="file" nombre="url_imagen" label="Imagen" required="" valor="{{ $evento->url_imagen ?? '' }}"/>
            <x-form.input tipo="number" nombre="aforo_maximo" label="Aforo máximo" required="required" valor="{{ $evento->aforo_maximo ?? '' }}"/>
            <x-form.select nombre="categoria_id" label="Categoría" required="required" :opciones="$categorias" valor="{{ $evento->categoria_id ?? '' }}"/>
            <x-form.button />
        </x-form>

    </div>
@endsection
