<button {{ $attributes->merge(['class' => 'btn  btn-lg bg-'.color()]) }}>
    <x-icons.plus />
    {{ $slot }}
</button>
