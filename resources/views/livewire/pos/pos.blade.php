<div>

    <div class="row">
        <div class="col-12 col-xl-8">

            <a href="#" wire:click="list('icons')">Icons</a>
            <a href="#" wire:click="list('list')">Table</a>

            <div class="row">


                <div class="col-12">
                    <div class="card card-prismary card-oustline card-outsline-tabs">
                        <div class="card-header border-bottom-0">


                            <ul class="nav nav-tabs nav-pills nav-sjustified border-bottom-0 mb-3" id="custom-tabs-four-tab"
                                role="tablist">
                                <a class="nav-link border {{ '' == $categoryId ? 'active' : '' }}" wire:click='setCategory()'
                                    id="full-tab" data-toggle="pill" href="#" role="tab" aria-controls="full"
                                    aria-selected="true">(TUDO)</a>
                                @foreach ($categories as $category)
                                    <li class="nav-item" wire:key='{{ $category->id }}'>
                                        <a class="nav-link border  {{ $category->id == $categoryId ? 'active' : '' }}"
                                            wire:click='setCategory({{ $category->id }})' id="{{ $category->id }}-tab"
                                            data-toggle="pill" href="#" role="tab"
                                            aria-controls="{{ $category->id }}"
                                            aria-selected="true">{{ $category->name }}</a>
                                    </li>
                                @endforeach
                            </ul>

                            <input class="form-control form-control-lg mb-2" placeholder="Pesquisar"
                                wire:model.live="search">

                        </div>
                        <div class="card-body pt-0">

                            @if ($show == 'icons')
                                <div class="row">
                                    @foreach ($products as $prod)
                                        <div class="col-6 col-xs-4 col-sm-4 col-lg-3 col-xl-3 "
                                            wire:key="item-{{ $prod->id }}">
                                            <livewire:pos.product-item :type="$show ?? 'list'" :product="$prod"
                                                wire:key="{{ $prod->id }}{{ now() }}" />
                                        </div>
                                    @endforeach
                                </div>
                            @endif

                            @if ($show == 'list')
                                <table class="table tablle-sm table-striped texta-lg mt-0">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">Descrição</th>
                                            <th class="border-top-0 text-center">Categoria</th>
                                            <th class="border-top-0 text-center" wsidth="5%" class="text-center"> QTD
                                            </th>
                                            <th class="border-top-0 text-center">Valor</th>
                                            <th class="border-top-0 text-center"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($products as $prod)
                                            <livewire:pos.product-item :type="$show ?? 'list'" :product="$prod" wire:key="t{{ $prod->id }}{{ now() }}" />
                                        @endforeach
                                    </tbody>
                                </table>

                            @endif


                        </div>
                        <!-- /.card -->
                    </div>




                </div>





            </div>

            <div>
                {{ $products->links() }}



                <!-- Modal -->
                <div class="modal" wire:ignore.self id="modal-detail" tabindex="-1" role="dialog"
                    aria-labelledby="modelTitleId" aria-hidden="true">
                    @if ($selectedProduct)
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">

                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-9">
                                            <h4>{{ $selectedProduct->name }}</h4>
                                            <p class="text-muted">{{ $selectedProduct->description ?? null }}</p>
                                        </div>
                                        <div class="col text-right">
                                            <h4><span class="badge badge-pill badge-primary">R$
                                                    {{ usToBrl($selectedProduct->value ?? null) }}</span></h4>
                                        </div>
                                    </div>

                                    <textarea class="form-control" wire:model="description" rows="5" placeholder="Observações"></textarea>



                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-success"
                                        wire:click="addItem({{ $selectedProduct->id }})"> <i
                                            class="fa fa-plus-circle"></i>
                                        Adicionar</button>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-12 col-xl-4 d-flex flex-column">



            <div class="card flex-fill d-flex flex-column">

                <div class="card-body d-flex flex-column justify-content-between">

                    <div class="row mb-2">
                        <div class="col-4 d-flex align-items-center">
                            <label for="" class="mr-2 mb-0">Mesa</label>
                            <select class="form-control form-control-lg  " wire:model='table'>
                                <option value=""></option>
                                @for ($i = 1; $i <= 10; $i++)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>

                        </div>



                        <div class="col d-flex align-items-center">
                            <label for="" class="mr-2 mb-0">Nome</label>
                            <input type="text" class="form-control form-control-lg text-uppercase"
                                wire:model='customer' aria-describedby="helpId" placeholder="">
                        </div>
                    </div>


                    <div class="flex-grow-1">
                        @foreach ($items as $x => $item)
                            <livewire:pos.item wire:key="product-{{ $item['product_id'] }}" :item="$item" />
                        @endforeach
                    </div>


                    <div class="d-flex justify-content-between h3">
                        <span>Total:</span>
                        <span> R$ {{ usToBrl($total) }}</span>
                    </div>
                    {{-- @if ($isMoney) --}}
                    <div class="card">
                        <div class="card-body p-3 d-slex">

                            <div class="d-flex align-items-center">
                                <span class="mr-4">Dinheiro</span>
                                <input type="text" class="form-control form-control-lg text-right" />
                            </div>

                            <div class="d-flex align-items-center justify-content-between">
                                <span class="mr-4">Troco </span>
                                <span class="text-muted">R$ {{ $change }}</span>
                            </div>






                        </div>
                    </div>
                    {{-- @endif --}}

                    <div class="btn-group-toggle d-flex " data-toggle="buttons">
                        <label class="btn btn-outline-secondary btn-sm btn-block m-1 d-flex justify-content-center align-items-center ">
                            <input type="radio" class="align-middle" wire:model='payment' value="A" @if ($payment == 'A') checked @endif>
                            Pix
                        </label>
                        <label class="btn btn-outline-secondary btn-sm m-1 btn-block d-flex justify-content-center align-items-center">
                            <input type="radio" wire:model='payment' value="B"
                                @if ($payment == 'B') checked @endif>
                            Cartão Credito
                        </label>
                        <label class="btn btn-outline-secondary btn-sm m-1 btn-block d-flex justify-content-center align-items-center">
                            <input type="radio" wire:model='payment' value="C"
                                @if ($payment == 'C') checked @endif>
                            Cartão Debito
                        </label>
                        <label class="btn btn-outline-secondary btn-sm m-1 btn-block d-flex justify-content-center align-items-center">
                            <input type="radio" wire:model='payment' value="D"
                                @if ($payment == 'D') checked @endif>
                            Dinheiro
                        </label>
                        <label class="btn btn-outline-secondary btn-sm m-1 btn-block d-flex justify-content-center align-items-center">
                            <input type="radio" wire:model='payment' value="E"
                                @if ($payment == 'E') checked @endif>
                            Outros
                        </label>
                    </div>



                </div>
                <div class="card-footer">
                    <button type="button" class="btn btn-primary btn-block btn-lg" wire:click="pay">Fechar
                        Pedido</button>
                </div>
            </div>
        </div>


    </div>



    <!-- Modal -->
    <div class="modal" wire:ignore.self id="modal-order" tabindex="-1" role="dialog"
        aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered msodal-lg" role="document">
            <div class="modal-content">
                {{-- <div class="modal-header border-0">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div> --}}
                <div class="p-2">
                    <img class="mx-auto d-block" src="{{ asset('img/logo.png') }}" width="30%" alt="">

                    <p class="text-center">Resumo do Pedido</p>
                </div>
                <div class="p-2">
                    <table class="table texst-lg table-sm table-striped">
                        <thead>
                            <tr>
                                <th class="text-center">Qtd</th>
                                <th>Item</th>
                                <th class="text-center">SubTotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $v => $item)
                                <tr>
                                    <td class="text-center">{{ $item['quantity'] }}x</td>
                                    <td width="70%">
                                        <div><strong>{{ $item['name'] }}</strong></div>
                                        <div class="text-muted">R$ {{ usToBrl($item['value']) }}</div>
                                        @if (!empty($item['description']))
                                            <div>*{{ $item['description'] }}</div>
                                        @endif
                                    </td>
                                    <td class="text-center"><strong>R$
                                            {{ usToBrl($item['quantity'] * $item['value']) }}
                                        </strong></td>
                                </tr>
                            @endforeach



                        </tbody>
                    </table>

                    <div class="row">
                        <div class="col-4"></div>
                        <div class="col">
                            <table class="table texst-lg table-sm">

                                <tbody>
                                    <tr>
                                        <th scope="row">Total</th>
                                        <th class="text-right">R$ {{ usToBrl($total) }}</th>
                                    </tr>
                                    <tr>
                                        <th scope="row">Forma de Pagto</th>
                                        <th class="text-right">{{ $payment }}</th>
                                    </tr>
                                    <tr>
                                        <th scope="row">Troco</th>
                                        <th class="text-right">R$ {{ usToBrl($change) }}</th>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>



                <div class="modal-footer bg-whsite border-0 d-flex gap-2">
                    <button type="button" class="btn btn-light  border btn-lg w-auto"
                        data-dismiss="modal">Fechar</button>
                    <button type="button" class="btn btn-primary btn-lg flex-grow-1" wire:click='createOrder'>Enviar
                        Pedido</button>
                </div>
            </div>
        </div>
    </div>



</div>

<script>
    window.addEventListener('abrir-modal', () => {
        $('#modal-detail').modal('show');
    });

    window.addEventListener('close-modal', () => {
        $('#modal-detail').modal('hide');
    });

    window.addEventListener('abrir-order', () => {
        $('#modal-order').modal('show');
    });

    window.addEventListener('close-order', () => {
        $('#modal-order').modal('hide');
    });
</script>
