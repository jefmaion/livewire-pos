@props(['id'])
<div class="modal fade" wire:ignore.self id="{{ $id }}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div {{ $attributes->merge(['class' => 'modal-dialog modal-dialog-centered']) }} role="document">
        {{ $slot }}
    </div>
</div>