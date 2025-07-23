<div>
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="font-weight-light">Cadatro de Produtos</h1>
        </div>
        <div class="col-sm-6 text-right">
            <x-common.create-button wire:click='create'>Adicionar Produto</x-common.create-button>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <x-form.input-search class="mb-2" />
        </div>
        <div class="card-body">

            <x-common.table class=" mb-2">
                <thead class="thead-light">
                    <tr>
                        <th width="50%"><a href="#" class="text-muted">Produto</a></th>
                        <th class="text-center"><a href="#" class="text-muted">Valor</a></th>
                        <th class="text-center"><a href="#" class="text-muted">Estoque</a></th>
                        <th class="text-center"><a href="#" class="text-muted">Disponível</a></th>
                        <th class="text-center text-muted">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                    <tr wire:key="{{ $product->id }}" class="{{  (!$product->enabled) ? 'text-muted' : '' }}">
                        <td scope="row">
                            <x-common.product-detail :product="$product" />
                        </td>
                        <td class="text-center">R$ {{ number_format($product->value, 2, ',', '.') }}</td>
                        <td class="text-center">{{ $product->quantity }}</td>
                        <td class="text-center">
                            @if($product->enabled)
                            <span class="badge badge-pill bg-{{color()}}">Sim</span>
                            @else
                            <span class="badge badge-pill badge-secondary">Não</span>
                            @endif
                        </td>
                        <td class="text-center">
                            <x-common.edit-button wire:click="edit({{$product->id}})" />
                            <x-common.delete-button wire:click="delete({{ $product->id }})" />
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </x-common.table>
        </div>
        <div class="card-footer">
            {{ $products->links() }}
        </div>
    </div>

    <x-common.modal id="modal-product" class="mosdal-lg">
        <form wire:submit="save">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ $isEdit ? 'Editar' : 'Cadastrar' }} Produto</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @include('livewire.product.product-form')
                </div>
                <div class="modal-footer">
                    <x-common.close-button />
                    <x-common.save-button> Salvar</x-common.save-button>
                </div>
            </div>
        </form>
    </x-common.modal>

</div>

@section('scripts')
<script src="{{ asset('js/jquery.mask.js') }}"></script>
<script>
    window.addEventListener('open-modal', () => {
        $('#modal-product').modal('show');
    });
    window.addEventListener('close-modal', () => {
        $('#modal-product').modal('hide');
    });
</script>
@endsection
