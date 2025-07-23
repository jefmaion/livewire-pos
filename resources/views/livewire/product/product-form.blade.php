<div class="form-row">


    <div class="form-group col-md-12">
        <label for="form.name">Nome do Produto</label>
        <x-form.input name="form.name" class="font-weight-bold" wire:model="form.name" />
    </div>



    <div class="form-group col-md-4">
        <label for="form.quantity">Estoque Min.</label>
        <x-form.input name="form.min" class="text-center" wire:model="form.min" />
    </div>

    <div class="form-group col-md-4">
        <label for="form.quantity">Estoque Atual</label>
        <x-form.input name="form.quantity" class="text-center" wire:model="form.quantity" />
    </div>




    <div class="form-group col-md-4">
        <label for="form.value">Preço</label>
        <x-form.currency type="text" name="form.value" wire:model="form.value" />

    </div>

    <div class="form-group col-md-12">
        <label for="form.category_id">Categoria</label>
        <x-form.select-category name="form.category_id" wire:model="form.category_id" />
    </div>


    <div class="form-group col-md-12">
        <label for="form.description">Descrição do produto</label>
        <x-form.text-area name="form.description" wire:model="form.description" />
    </div>

    <div class="form-group col-md-4">
        <x-form.check-switch name="form.enabled" value="{{ $product->enabled ?? null }}" wire:model="form.enabled">
            Ativo
        </x-form.check-switch>
    </div>

    <div class="form-group col-md-8 text-right">
        <x-form.check-switch name="form.sell_no_stock" value="{{ $product->sell_no_stock ?? null }}" wire:model="form.sell_no_stock">
            Permitir venda sem estoque
        </x-form.check-switch>
    </div>
</div>
