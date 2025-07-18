@props(['product'])
<div class="d-flex align-items-center text-lg">

       <img src="{{ asset('template/dist/img/user2-160x160.jpg') }}" width="60px" class="rounded mr-2">
    
    <div>
        <div class="p-0 text-lg">{{ $product->name }}</div>
        <div class="m-0 p-0"><strong>R$ {{ usToBrl($product->value) }}</strong></div>
    </div>
</div>