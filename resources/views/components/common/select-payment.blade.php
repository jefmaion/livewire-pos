@props(['name'])
<x-form.select :name="$name" {{ $attributes }}>
    <option value="">-- Selecione --</option>
    @foreach($payments as $payment)
        <option value="{{ $payment }}">
            {{ $payment }}
        </option>
    @endforeach
</x-form.select>
