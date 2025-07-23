@props(['products'])
<table class="table tasble-sm table-striped table-hover">
    <thead class="thead-light">
        <tr>
            <th width="50%">Descrição</th>
            <th class="text-center">Estoque</th>
            <th class="text-center">Categoria</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $product)
            <tr style="cursor:pointer" @if($product->quantity > 0) wire:click="show({{ $product->id }})" @endif>
                <td scope="row">
                    <x-pos.item :product="$product" />
                </td>
                <td class="text-center">
                    <x-pos.product-stock-status :product="$product" />
                </td>
                <td class="text-center">{{ $product->category->name }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
