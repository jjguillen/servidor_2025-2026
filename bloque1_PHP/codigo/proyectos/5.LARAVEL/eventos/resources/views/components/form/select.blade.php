<div>
    <label class="block mb-2 text-sm font-medium text-gray-900">{{ $label }}</label>
    <select name="{{ $nombre }}" id="{{ $nombre }}"  {{ $required ?? '' }}
           class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5">
        @foreach($opciones as $opcion)
            <option value="{{ $opcion->id }}"
                    @if(isset($valor) && $opcion->id == $valor)
                    selected
                    @endif
            >{{ $opcion->nombre }}</option>
        @endforeach
    </select>
</div>
