
@props(['name'])
<x-form.select :name="$name" {{ $attributes }}>
    <option value="">-- Selecione --</option>
    @foreach($categories as $category)
        <option value="{{ $category->id }}">
            {{ $category->name }}
        </option>
    @endforeach
</x-form.select>



