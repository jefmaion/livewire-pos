<button {{ $attributes->merge(['class' => 'btn btn-success']) }}>
    <i class="fa fa-plus-circle" aria-hidden="true"></i> 
    {{ $slot }}
</button>