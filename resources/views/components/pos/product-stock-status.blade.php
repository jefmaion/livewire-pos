@props(['product'])
@if($product->sell_no_stock)
    -
@else
    @if($product->quantity == 0)
        <span class="badge badge-pill badge-danger">Esgotado!</span>
    @else
            @if(!$product->sell_no_stock && $product->quantity <= $product->min)
            <span class="badge badge-pill badge-warning">Restam apenas {{ $product->quantity }}</span>
        @else
            {{ $product->quantity }}
        @endif
    @endif
@endif
