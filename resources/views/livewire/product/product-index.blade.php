<div>
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="font-weight-light">Produtos</h1>
        </div>
        <div class="col-sm-6 text-right">
            <button class="btn btn-success" wire:click="$dispatch('create-product')"> <i class="fa fa-plus-circle" aria-hidden="true"></i> Adicionar Produto</button>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <livewire:product.product-list />
        </div>
    </div>

<livewire:product.product-create />
<livewire:product.product-update />

</div>

@section('scripts')
<script src="{{asset('js/jquery.mask.js')}}"></script>
<script>
    window.addEventListener('abrir-modal', () => {
        $('#modal-product').modal('show');
    });

    window.addEventListener('close-modal', () => {
        $('#modal-product').modal('hide');
    });
</script>
@endsection
