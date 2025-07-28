@props(['name'])
<x-form.select :name="$name" {{ $attributes }}>
    <option value="">-- Selecione --</option>
    @foreach($payments as $payment)
        <option value="{{ $payment->id }}">
            {{ $payment->name }}
        </option>
    @endforeach
</x-form.select>
