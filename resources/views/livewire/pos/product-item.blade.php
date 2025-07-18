<div>
@if($type == 'icons')
    <div class="card flex-fill">
        <div class="py-4 px-2 text-center ">
            @if(!$product->enabled)
            <div class="ribbon-wrapper ribbon-lg">
                <div class="ribbon bg-danger">
                    INDÍSPONÍVEL
                </div>
            </div>
            @endif
            <a href="#" wire:click="show({{ $product->id }})">
                <img src="{{ asset('img/images.jpeg') }}" class="@if(!$product->enabled) img-gray @endif" width="140" alt="User Image">
                <div class="text-dark @if(!$product->enabled) text-muted @endif">
                    <strong>{{ $product->name }}</strong>
                    <div>R$ {{ usToBrl($product->value) }}</div>
                    <div>{{ $product->quantity }}</div>
                </div>
            </a>
        </div>
    </div>
@endif

@if($type == 'list')
<tr >
    <td class="d-flex align-items-center ">
        <div>

             <img src="{{ asset('img/images.jpeg') }}" class="rounded @if(!$product->enabled) img-gray @endif" width="60"  alt="User Image">
        </div>
        <div class="ml-2 ">
            <div>@if(!$product->enabled)
            <span class="badge badge-pill badge-danger">Acabou</span>

        @endif<strong>{{ $product->name }}</strong>   </div>
            <div class="text-muted text-sm">{{ $product->description }}</div>
        </div>
    </td>
    <td class="text-center">
        {{ $product->category->name }}
    </td>
    <td class="text-center " scope="row">
        {{ $product->quantity }}




    </td>
    <td class="text-center">
       <strong>R$ {{ usToBrl($product->value) }}</strong>
    </td>
    <td class="text-right">
         <a href="#" class="btn btn-lg btn-success" wire:click="show({{ $product->id }})">
                <i class="fa fa-plus-circle" aria-hidden="true"></i>
            </a>
    </td>
</tr>
@endif
</div>
