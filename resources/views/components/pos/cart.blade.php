 @props(['items'])
 <div class="flex-grow-1" style="height: calc(100vh - 600px); overflow:auto">
    @foreach ($items as $i => $item)
        <x-pos.basket-item :item="$item" />
    @endforeach
</div>
