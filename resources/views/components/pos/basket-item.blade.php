@props(['item'])
<div class="card border">
    <div class="card-body p-2">
        <div class="row">
            <div class="col-8">
                <div class="d-flex align-items-center texts-lg">
                    <x-common.product-image height="60px" class="mr-2" />
                    <div>
                        <div class="p-0 texst-lg">
                            <strong>{{ $item['product']->name }}</strong>
                        </div>
                        <div>
                            <x-pos.item-quantity product_id="{{$item['product_id']}}" quantity="{{$item['quantity']}}" />
                        </div>

                        <ul class="list-unstyled text-sm text-muted">


                        @if (!empty($item['description']))
                            <li><span class="">*{{ $item['description'] }}</span></li>
                        @endif
                        @if (!empty($item['to_go']))
                                <li>*Viagem</li>
                            @endif
                            </ul>


                    </div>
                </div>
            </div>
            <div class="col-4 d-flex justify-content-end align-items-center ">
                <div class="text-muted"><strong>R$ {{ usToBrl($item['subtotal']) }}</strong></div>
                <div class="cursor-pointer"><x-icons.trash wire:click="remove({{$item['product_id']}})" class="text-danger mx-3 "  /></div>
            </div>
            {{-- <div class="col-2 d-flex justify-content-center align-items-center">
                <a href="#" wire:click="remove({{ $item['product_id'] }})" class="badge badge-danger badge-pill"><x-icons.trash class="h5 mx-0 my-1" /></a>
            </div> --}}
        </div>

    </div>
</div>
