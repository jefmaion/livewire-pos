@props(['product_id' => "''", 'quantity', 'size' => '2em'])
<div class="d-flex justify-content-between align-items-center badge badge-pill badge-light border p-1 " style="width:calc(70px + {{ $size }});">
    <div style="font-size:{{ $size }}">
        <a href="#" wire:click="setQuantity(-1, {{ $product_id }})"><x-icons.minus-circle  class="text-{{color()}} cursor-pointer"  /></a>
    </div>
    <span class="m-0 text-sm mx-1">{{ $quantity }}</span>
    <div style="font-size:{{ $size }}">
        <a href="#" wire:click="setQuantity(1, {{ $product_id }})"><x-icons.plus-circle  class="text-{{color()}} cursor-pointer" /></a></div>
</div>
