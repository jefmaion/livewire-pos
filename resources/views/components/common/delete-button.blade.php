<button type="button" wire:confirm="Deseja excluir esse registro?" {{ $attributes->merge(['class' => 'btn btn-danger']) }})>
    <x-icons.trash />
</button>
