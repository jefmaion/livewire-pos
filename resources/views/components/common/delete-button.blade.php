<button type="button" wire:confirm="Deseja excluir esse registro?" {{ $attributes->merge(['class' => 'btn btn-danger']) }})>
    <i class="fas fa-trash-alt"></i>
</button>