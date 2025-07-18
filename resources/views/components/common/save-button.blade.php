<button {{ $attributes->merge(['class' => 'btn btn-success btn-lg']) }}>
    <i class="fa fa-check-circle" aria-hidden="true"></i>
    {{ $slot }}
</button>