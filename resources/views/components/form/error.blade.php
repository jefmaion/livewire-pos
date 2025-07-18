@props(['name'])
@if($errors->has($name))
    <span class="invalid-feedback">{{ $errors->first($name) }} </span>
@endif
