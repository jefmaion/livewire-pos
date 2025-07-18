@props(['grid', 'products'])

@if($grid=='L')
    @foreach($products as $product)
    <x-pos.item-grid-list :product="$product" />
    @endforeach
@endif


@if($grid=='I')
    <div class="row">
        @foreach($products as $product)
        <div class="col-3 d-flex">
            <x-pos.item-grid :product="$product" />
        </div>
        @endforeach
    </div>

@endif