@props(['product'])
<div class="d-flex align-items-center">
    <img src="{{ asset('template/dist/img/user2-160x160.jpg') }}" width="60px" class="rounded mr-2">
    <div>
        <div class="p-0"><strong>{{ $product->name }}</strong></div>
        <div class="text-muted m-0 p-0"><small>{{ $product->description }}</small></div>
    </div>
</div>