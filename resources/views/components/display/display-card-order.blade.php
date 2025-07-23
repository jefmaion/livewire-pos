@props(['order', 'status'])
<div class="card flex-fill ">
    <div class="card-body d-flex text-{{ $status }} justify-content-center flex-column align-items-center h1 text-center">
        <div><strong>{{ $order->orderCode() }}</strong></div>
        <div>
            @if (!empty($order->customer))
                <div class="text-sm"><span>{{ $order->customer }}</span></div>
            @endif

            @if (!empty($order->table))
                <div class="text-sm"><span>Mesa {{ $order->table }}</span></div>
            @endif

        </div>
    </div>
</div>
