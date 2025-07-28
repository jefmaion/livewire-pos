<div>
    <div class="row">
        {{-- product list --}}
        <div class="col-md-8 d-flex flex-column">
            <div class="row mb-0 ">
                <div class="col-12 d-flex justify-content-end">
                    <x-form.input-search class="mr-2" />
                    <button wire:click="grids('L')"
                        class="mr-2 btn btn-lg {{ $grid == 'L' ? 'bg-' . color() . ' border-0' : 'btn-light border' }} border ">
                        <i class="fa fa-list" aria-hidden="true"></i>
                    </button>
                    <button wire:click="grids('I')"
                        class="btn btn-lg {{ $grid == 'I' ? 'bg-' . color() . ' border-0' : 'btn-light border' }} border ">
                        <i class="fa fa-th" aria-hidden="true"></i>
                    </button>
                </div>
            </div>
            <div class="mt-2 mb-2 d-flex flex-wrap justify-content-start">
                <x-pos.category-list :categories="$categories" :id="$categoryId" />
            </div>
            <div class="card flex-fill">

                <div class="card-body">
                    @if ($grid == 'L')
                        <x-pos.product-list-table :products="$products" />
                    @else
                        <x-pos.product-list-card :products="$products" />
                    @endif
                </div>
                <div class="card-footer">
                    {{ $products->links() }}
                </div>
            </div>
        </div>

        {{-- cart --}}
        <div class="col-4  d-flex flex-column" style="height: calc(100vh - 100px);">
            <div class="card d-flex flex-column flex-grow-1">
                <div class="card-header d-flesx justify-contesnt-between">
                    <div class="row">
                        <div class="col">
                            <x-icons.basket />
                            <span class="badge badge-secondary">{{ count($items) }}</span>
                        </div>
                        <div class="col text-right"> <a href="#" wire:click="clear">Limpar Cesta</a></div>
                    </div>

                </div>
                <div class="card-body  d-flex flex-column">

                    <x-pos.cart :items="$items" />

                    <div class="mt-auto">
                            <div id="total" class=" py-3 mt-auto d-flex justify-content-between">
                            <h3><strong>Total:</strong></h3>
                            <h3><strong>R$ {{ usToBrl($total) }}</strong></h3>
                        </div>

                        <div class="row mb-2">
                            <div class="col-4 d-sflex alisgn-items-center">
                                <label for="" class="mr-2 mb-0">Mesa</label>
                                <select class="form-control form-control-lg  " wire:model='table'>
                                    <option value=""></option>
                                    @for ($i = 1; $i <= 10; $i++)
                                        <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                </select>

                            </div>





                            <div class="col d-flesx align-sitems-center">
                                <label for="" class="mr-2 mb-0">Nome</label>
                                <input type="text" class="form-control form-control-lg text-uppercase"
                                    wire:model='customer' aria-describedby="helpId" placeholder="">
                            </div>

                            <div class="col-12 mt-2">
                                <label for="" class="mr-2 mb-0">Pagamento</label>
                                {{-- <x-common.select-payment name="payment" wire:model="payment" /> --}}
                                <div class="d-flex justify-content-between">
                                    @foreach(['Pix', 'Cartão Crédito', 'Cartão Débito', 'Dinheiro', 'Outros'] as $pay)
                                            <a  wire:click="setPayment('{{ $pay }}')" class="d-flex  align-items-center btn {{ ($payment == $pay) ? 'bg-'.color().'' : 'btn-light border' }}" href="#" role="button">{{ $pay }}</a>
                                        @endforeach
                                </div>
                            </div>
                        </div>





                    </div>
                </div>

                <div class="card-footer">
                    <button type="button" wire:click="resume"
                            class="btn bg-{{ color() }} btn-block btn-lg">Pedido</button>
                </div>
            </div>
        </div>
    </div>


    <x-common.modal id="modal-product">
        @if ($product)
            <div class="modal-content">
                <div class="modal-body pt-4">

                    <div class="row">
                        <div class="col-12">
                            <div class="d-flex align-items-top">
                                <x-common.product-image height="100px" class="mr-2 d-flex" />
                                <div>
                                    <p class="h4 m-0"><strong>{{ $product->name ?? null }}</strong></p>
                                    <p class="text-muted m-0">{{ $product->description ?? '' }}</p>
                                    <strong>R${{ usToBrl($product->value ?? 0) }}</strong>
                                    <span class="badge badge-pill badge-light border">{{ $product->quantity }}
                                        disponível</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 mt-4 text-right">
                            <div class="form-group">
                                <x-form.text-area rows="5" name="description" wire:model="comments" placeholder="Observações (Exemplo: Tirar cebola, viagem...)" />
                            </div>

                            <x-pos.item-quantity size="3em" :quantity="$quantity" />
                        </div>
                    </div>
                </div>
                <div class="modal-footer bg-transparent border-0 d-flex justify-content-between">

                    <x-common.close-button />
                    <x-common.save-button clsass="btn-block" wire:click="add({{ $product->id ?? null }})"> Adicionar ao
                        Carrinho
                    </x-common.save-button>

                </div>
            </div>
        @endif
    </x-common.modal>

    <x-common.modal id="modal-resume">
        @if ($items)
            <div class="modal-content">
                <div class="modal-body pt-4">

                    Opa
                </div>
                <div class="modal-footer bg-transparent border-0 d-flex justify-content-between">

                    <x-common.close-button />
                    <x-common.save-button clsass="btn-block"> Realizar Pedido
                    </x-common.save-button>

                </div>
            </div>
        @endif
    </x-common.modal>

</div>

@section('scripts')
    <script>
        window.addEventListener('open-modal', (e) => {
            $('#' + e.detail.modal).modal('show');
        });
        window.addEventListener('close-modal', (e) => {
            $('#' + e.detail.modal).modal('hide');
        });
    </script>
@endsection
