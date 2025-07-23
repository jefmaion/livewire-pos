@props(['id'])
<div class="modal fawde" wire:ignore.self id="{{ $id }}" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="modelTitleId" aria-hidden="true">
    <div {{ $attributes->merge(['class' => 'modal-dialog modal-dialog-centered']) }} role="document">
        {{ $slot }}
    </div>
</div>
