@props(['product'])

<div class="d-flex align-items-center texts-lg">

       <x-common.product-image width="60px" />

    <div>
        <div class="p-0 texst-lg"><strong>{{ $product->name }}</strong></div>
        <div class="m-0 p-0">R$ {{ usToBrl($product->value) }}</div>

    </div>
</div>
