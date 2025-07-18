@props(['product'])

    <div class="card flex-fill" stsyle="width: 5rem;">
        <a href="#" class="flex-fill text-dark" wire:click="show({{ $product->id }})">
        <img src="{{ asset('template/dist/img/user2-160x160.jpg') }}" width="80px" class="mt-4 mx-auto d-block avatar avatar-lg" alt="...">
        <div class="card-body p-3">
            <div class="text-muted"><small>{{ $product->category->name }}</small></div>
            <div class="text-lg">{{ $product->name }}</div>
            <div class="d-flex justify-content-between">
                <div class="text-musted"><strong>R$ {{ usToBrl($product->value) }}</strong></div>
                <div class="text-muted">{{ $product->quantity }}un.</div>
            </div>
        </div>
        </a>
    </div>
