@props(['product'])
<div class="d-flex align-items-center">
    <x-common.product-image width="60px" class="rounded mr-2" />
    <div>
        <div class="p-0"><strong>{{ $product->name }}</strong></div>
        <div class="text-muted m-0 p-0"><small>{{ $product->description }}</small></div>
    </div>
</div>
