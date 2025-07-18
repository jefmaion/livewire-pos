@props(['product'])
<div class="card">
    <div class="card-body">

        <div class="row">
            <div class="col"><x-pos.item :product="$product" /></div>
            <div class="col d-flex justify-content-center align-items-center">{{ $product->category->name }}</div>
            <div class="col text-right d-flex justify-content-end align-items-center">
                <button type="button" wire:click="show({{ $product->id }})" class="btn btn-outline-success btn-lg">
                    <i class="fa fa-cart-plus" aria-hidden="true"></i>
                </button>
            </div>
        </div>

        
        
    </div>
</div>