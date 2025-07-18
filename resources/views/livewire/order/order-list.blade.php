<div>
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="font-weight-light">Pedidos</h1>
        </div>
        <div class="col-sm-6 text-right"></div>
    </div>
    <div class="card">
        <div class="card-header">
            <input class="form-control" placeholder="Pesquisar" wire:model.live="search">
        </div>
        <div class="csard-body" wire:poll.visible.2s>
            <table class="table table-striped mb-2">
                <thead class="thead-light">
                    <tr>
                        <th width="5%"><a href="#" class="text-muted" wire:click="sort('name')">Nº Pedido</a></th>
                        <th width="10%" class="stext-center"><a href="#" class="text-muted" wire:click="sort('value')">Cliente</a></th>
                        <th width="10%" class="tsext-center"><a href="#" class="text-muted" wire:click="sort('quantity')">Mesa</a></th>
                        <th width="10%" class="tsext-center"><a href="#" class="text-muted" wire:click="sort('value')">Valor</a></th>
                        <th width="10%" class="tsext-center"><a href="#" class="text-muted" wire:click="sort('value')">Valor</a></th>
                        <th width="10%" class="tsext-center"><a href="#" class="text-muted" wire:click="sort('status')">Status</a></th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                        <tr wire:key="{{ $order->id }}">
                            <td scope="row">{{ $order->id  }}</td>
                            <td>{{ $order->customer }}</td>
                            <td>{{ $order->table }}</td>
                            <td>R$ {{ usToBrl($order->value) }}</td>
                            <td>{{ $order->payment }}</td>
                            <td>{{ $order->status }}</td>
                            <td>
                                <a href="#" wire:click='showItems({{ $order->id }})'>Ver Itens</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="card-body">
                {{ $orders->links() }}
            </div>
        </div>
    </div>

    <style>
        .cupom {
            width:58mm;
            font-family: 'Courier New', Courier, monospace;
        }
    </style>

    <div class="modal fade" wire:ignore.self id="modal-details" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered msodal-lg" role="document">
                <div class="modal-content">

                    <div class="modal-body text-center">


                        <div class="cupom">
                        <div>Pedido {{ $selectedOrder->id ?? null }}</div>
                        {{ Str::repeat('-', 22 ) }}

                        <div class="row">
                            @if(!empty($selectedOrder->table))
                            <div class="col-12"><strong>Mesa: </strong>{{ $selectedOrder->table ?? '-' }}</div>
                            @endif

                            @if(!empty($selectedOrder->customer))
                            <div class="col-12"><strong>Nome: </strong>{{ $selectedOrder->customer ?? '-' }}</div>
                            @endif

                            @if(!empty($selectedOrder->customer))
                            <div class="col-12"><strong>Atendente: </strong>{{ $selectedOrder->customer ?? '-' }}</div>
                            @endif
                        </div>



                        <table class="tasble" width="100%">
                            <thead>
                                <tr>
                                    <th>QTD</th>
                                    <th>DESCRICAO</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($selectedOrder->items ?? [] as $item)
                                <tr class="">
                                    <td class="text-left"><p>{{ $item->quantity }}x </p></td>
                                    <td class="text-left"><p>{{ $item->product->name }}</p>
                                        @if(!empty($item->description))
                                        <div>*{{ $item->description }}</div>
                                        @endif
                                    </td>
                                    <td class="text-right">R$ {{ usToBrl($item->value * $item->quantity) }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        {{ Str::repeat('-', 22 ) }}


                       <table class="tsable" width="100%">
                                    <tbody>
                                        <tr>
                                            <th scope="row"><Strong>Total</Strong></th>
                                            <th class="text-right">R$ {{ usToBrl($selectedOrder->value ?? 0) }}</th>
                                        </tr>
                                        <tr>
                                            <th>Pagamento</th>
                                            <th class="text-right">{{ $selectedOrder->payment ?? '-' }}</th>
                                        </tr>
                                    </tbody>
                                </table>

                    </div>
                    <div class="modal-footer">
                        <a href="#" data-dismiss="modal">Fechar</a>
                        {{-- <button type="submit" class="btn btn-success"> <i class="fa fa-check-circle" aria-hidden="true"></i> Salvar</button> --}}
                    </div>

                </div>
        </div>
    </div>
</div>
<script>
    window.addEventListener('open-modal', () => {
        $('#modal-details').modal('show');
    });
    window.addEventListener('close-modal', () => {
        $('#modal-details').modal('hide');
    });
</script>
