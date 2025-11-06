<thead {{ $attributes->merge(['class' => 'bg-'.$color.'-500'.$color.'-700']) }} >
    <tr>
        {{ $slot }}
    </tr>
</thead>
