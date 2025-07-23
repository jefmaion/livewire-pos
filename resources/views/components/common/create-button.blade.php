<button {{ $attributes->merge(['class' => 'btn bg-'.color()]) }}>
    <x-icons.plus />
    {{ $slot }}
</button>
