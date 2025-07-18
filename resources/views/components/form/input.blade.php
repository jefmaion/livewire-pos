@props(['name', 'type' => 'text'])
<input type="{{ $type }}" {{ $attributes->merge(['class' =>  ($errors->has($name) ? 'is-invalid' : ''). ' form-control form-control-lg']) }}>
<x-form.error :name="$name" />

