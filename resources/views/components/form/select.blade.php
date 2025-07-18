@props(['name'])
<select {{ $attributes->merge(['class' =>  ($errors->has($name) ? 'is-invalid' : ''). ' form-control form-control-lg']) }}>
    {{ $slot }}
</select>
<x-form.error :name="$name" />
