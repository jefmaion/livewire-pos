@props(['value', 'name'])
<div {{  $attributes->whereDoesntStartWith('wire:')->merge(['class' => 'custom-control custom-control-lg custom-switch'])  }}>
    <input type="checkbox" class="custom-control-input" {{ $attributes->whereStartsWith('wire:') }}  id="{{ $name }}-{{ $value }}" {{ ($value == true) ? 'checked' : ''  }} >
    <label class="custom-control-label" for="{{ $name }}-{{ $value }}">{{ $slot }}</label>
</div>