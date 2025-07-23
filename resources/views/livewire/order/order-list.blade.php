<div>
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="font-weight-light"><x-icons.order /> Pedidos</h1>
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
                        <th><a href="#" class="text-muted" wire:click="sort('name')">Nº Pedido</a></th>
                        <th class="stext-center"><a href="#" class="text-muted" wire:click="sort('value')">Mesa</a></th>
                        <th class="tsext-center"><a href="#" class="text-muted" wire:click="sort('value')">Valor</a></th>
                        <th class="tsext-center"><a href="#" class="text-muted" wire:click="sort('value')">Forma</a></th>
                        <th class="tsext-center"><a href="#" class="text-muted" wire:click="sort('status')">Status</a></th>
                        <th class="tsext-center"><a href="#" class="text-muted" wire:click="sort('status')">Data</a></th>
                        <th class="tsext-center"><a href="#" class="text-muted" wire:click="sort('status')">Cliente</a></th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                        <tr wire:key="{{ $order->id }}">
                            <td scope="row">{{ $order->orderCode()  }}</td>
                            <td>{{ $order->table }}</td>
                            <td>R$ {{ usToBrl($order->value) }}</td>
                            <td>{{ $order->payment }}</td>
                            <td>{{ $order->status }}</td>
                            <td>{{ $order->created_at->format('d/m/Y H:i') }}</td>
                            <td>{{ $order->customer }}</td>
                            <td>
                                <a href="#" wire:click='showItems({{ $order->id }})'>Ver Itens</a>
                                <a href="#" wire:click='print({{ $order->id }})'>Imprimir</a>
                                <a href="#" wire:click='showStatus({{ $order->id }})'>Status</a>
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

       <!-- Modal -->
    <div class="modal fade" wire:ignore.self id="modal-status" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <div class="modal-body">
                    <x-form.input wire:model="status" />
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" wire:click="saveStatus()">Save</button>
                </div>
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

                                         @if(!empty($item->to_go))
                                        <div>*VIAGEM</div>
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
                        <button type="submit" class="btn btn-success" wire:click='print({{ $selectedOrder->id ?? '' }})'> <i class="fa fa-check-circle" aria-hidden="true"></i> Imprimir</button>
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

    window.addEventListener('show-status', () => {
        $('#modal-status').modal('show');
    });
    window.addEventListener('close-status', () => {
        $('#modal-status').modal('hide');
    });
</script>
