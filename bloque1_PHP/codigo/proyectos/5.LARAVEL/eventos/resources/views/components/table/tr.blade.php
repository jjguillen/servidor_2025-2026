<tr scope="col" {{ $attributes->merge(['class' => 'hover:bg-'.$color.'gray-100'.$color.'gray-700']) }} >
    {{ $slot }}
</tr>
