<div>
    <div class="row vh-100">

        {{-- product list --}}
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-0">
                        <div class="col mb-0">
                            <x-form.input-search class="" />
                        </div>
                        <div class="col-2">
                            <button wire:click="grids('L')"
                                class="btn btn-lg {{ $grid == 'L' ? 'btn-secondary' : 'btn-light border' }} border ">
                                <i class="fa fa-list" aria-hidden="true"></i>
                            </button>
                            <button wire:click="grids('I')"
                                class="btn btn-lg {{ $grid == 'I' ? 'btn-secondary' : 'btn-light border' }} border ">
                                <i class="fa fa-th" aria-hidden="true"></i>
                            </button>
                        </div>
                    </div>
                    <div class="my-4">
                        <a href="#" wire:click="category()"
                            class="btn {{ empty($categoryId) ? 'btn-secondary' : 'btn-light border' }}">(TUDO)</a>
                        @foreach($categories as $category)
                        <a href="#" wire:click="category({{ $category->id }})"
                            class="btn {{ ($categoryId==$category->id) ? 'btn-secondary' : 'btn-light border' }}">{{
                            $category->name }}</a>
                        @endforeach
                    </div>
                    <x-pos.item-list :products="$products" :grid="$grid" />

                </div>
                <div class="card-footer">
                    {{ $products->links() }}
                </div>
            </div>
        </div>

        {{-- cart --}}
        <div class="col-4">
            <div class="card h-90">
                <div class="card-body ">
                    @foreach($items as $i => $item)
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <x-pos.item :product="$item['product']" />
                                <div class="d-flex justify-content-center align-items-center">
                                    <a wire:click="setQuantity(-1, {{ $i }})"
                                        class="btn btn-primary rounded-circle mx-1" href="#" role="button">
                                        <i class="fa fa-minus" aria-hidden="true"></i>
                                    </a>
                                    <x-form.input style="width:100px" value="{{ $item['quantity'] }}" class="text-center" />
                                    <a wire:click="setQuantity(1, {{ $i }})"
                                        class="btn btn-primary rounded-circle mx-1" href="#" role="button">
                                        <i class="fa fa-plus" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>


    <x-common.modal id="modal-product">
        <div class="modal-content">

            <div class="modal-body">
                <img src="{{ asset('template/dist/img/user2-160x160.jpg') }}" width="120px"
                    class="mb-4 mx-auto d-block rounded" alt="...">
                <div class="text-center">
                    <div class="text-muted">{{ $product->category->name ?? '' }}</div>
                    <p class="h4 text-center"><strong>{{ $product->name ?? null }}</strong></p>
                    <p class="text-muted">{{ $product->description ?? '' }}</p>
                    <p class="h4"><strong>R${{ usToBrl($product->value ?? 0) }}</strong></p>
                    <br>

                    <div class="d-flex justify-content-center align-items-center">
                        <a name="" id="" wire:click="setQuantity(-1)" class="btn btn-primary rounded-circle mx-1"
                            href="#" role="button">
                            <i class="fa fa-minus" aria-hidden="true"></i>
                        </a>
                        <x-form.input style="width:100px" class="text-center" wire:model="quantity" />
                        <a name="" id="" wire:click="setQuantity(1)" class="btn btn-primary rounded-circle mx-1"
                            href="#" role="button">
                            <i class="fa fa-plus" aria-hidden="true"></i>
                        </a>
                    </div>

                    <br>

                    <x-form.text-area placeholder="Observações" wire:model='comments'></x-form.text-area>

                    <br>
                    <div class="custom-control custom-switch">
                        <input type="checkbox" wire:model='toGo' value="1" class="custom-control-input"
                            id="customSwitch1">
                        <label class="custom-control-label" for="customSwitch1">Item para Viagem</label>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <x-common.close-button />
                <x-common.save-button wire:click="add({{ $product->id ?? null }})"> Adicionar ao Carrinho
                </x-common.save-button>
            </div>
        </div>
    </x-common.modal>

</div>

@section('scripts')
<script>
    window.addEventListener('open-modal', () => {
        $('#modal-product').modal('show');
    });
    window.addEventListener('close-modal', () => {
        $('#modal-product').modal('hide');
    });
</script>
@endsection