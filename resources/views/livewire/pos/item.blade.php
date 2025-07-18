<div class="card bg-light">
    
    <div class="card-body">

        <div class="row">
            <div class="col d-flex align-items-center">
                {{-- <img src="{{ asset('img/images.jpeg') }}" class="avatar mr-2" alt="User Image"> --}}
                <button type="button" class="btn mr-2 btn-danger btn-sm rounded-circle" wire:confirm="Deseja remover esse item?" wire:click="removeItem({{ $item['product_id'] }})">
                    <i class="fas fa-trash-alt    "></i>
                </button>
                <div>
                    <div>{{ $item['name'] }}</div>
                    <div><strong>R$ {{ usToBrl($item['value']) }}</strong></div>
                    <div>{{ $item['description'] }}</div>
                </div>
            </div>
            <div class="col-4 d-flex">

                <div class="d-flex align-items-center justify-content-end">
                    <button type="button" class="btn btn-dark mr-1 rounded-circle btn-sm" wire:click="dec">
                        <i class="fa fa-minus" aria-hidden="true"></i>
                    </button>
                    <input type="text" class="form-control font-weight-bold border-0 bg-transparent text-center" wire:model="quantity" wire:keyup="updateCart">
                    <button type="button" class="btn btn-dark btn-sm ml-1 mr-2 rounded-circle" wire:click="inc"><i class="fa fa-plus" aria-hidden="true"></i></button>
                    
                </div>

            </div>
        </div>

     
    </div>
</div>