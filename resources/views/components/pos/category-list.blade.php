@props(['categories', 'id'])
<a href="#" wire:click="category()" class="mr-1 mb-1 btn {{ empty($id) ? 'bg-'.color().'' : 'btn-light border' }}">(TUDO)</a>
@foreach ($categories as $category)
    <a href="#" wire:click="category({{ $category->id }})"
        class="mr-1 mb-1 btn {{ $id == $category->id ? 'bg-'.color().'' : 'btn-light border' }}">{{ $category->name }} ({{ $category->activeProducts->count(); }})</a>
@endforeach
