@props(['name', 'type' => 'text'])
<input type="{{ $type }}" {{ $attributes->merge(['class' =>  ($errors->has($name) ? 'is-invalid' : ''). ' form-control form-csontrol-lg']) }}>
<x-form.error :name="$name" />

