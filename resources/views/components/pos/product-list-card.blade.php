@props(['products'])
<div class="row">
    @foreach($products as $product)
    <div class="col-3 d-flex">
        <x-pos.item-grid :product="$product" />
    </div>
    @endforeach
</div>
