@props(['name'])
<textarea {{ $attributes->merge(['class' =>  ($errors->has($name) ? 'is-invalid' : ''). ' form-control form-control-lg']) }}>{{ $slot }}</textarea>
<x-form.error :name="$name" />
