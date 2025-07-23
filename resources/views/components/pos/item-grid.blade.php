@props(['product'])

<div class="card flex-fill" stsyle="width: 5rem;">
    {{-- <a href="#" class="flex-fill text-dark" wire:click="show({{ $product->id }})"> --}}


    <div class="card-body p-3">

        <div class="d-flex justify-content-end">
            @if($product->quantity != 0)
                <span class="badge badge-pill badge-light border">{{ $product->quantity }}</span>
            @else
            <x-pos.product-stock-status :product="$product" />
            @endif
        </div>
        <x-common.product-image width="100px" class="d-flex mx-auto my-3" />
        <div class="d-flex align-items-center justify-content-between">
            <div>
                <div class=""><strong>{{ $product->name }}</strong></div>
                <div class="text-muted">R$ {{ usToBrl($product->value) }}</div>
            </div>

            <div>
                <a href="#" style="font-size: 3.5em" class="text-{{ ($product->quantity > 0) ? color() : 'muted' }}" @if($product->quantity > 0) wire:click="show({{ $product->id }})" @endif>
                    <x-icons.plus-circle  />
                </a>
            </div>
        </div>
    </div>
    {{-- </a> --}}
</div>
