<x-customer-layout>
    @push('styles')
        @vite('resources/css/order.css')
    @endpush
    <div>
        <p>Nomor pesanan: {{ $order->id }}</p>
        <p>Nama: {{ $order->customer_name }}</p>
        <p>Status pesanan: {{ $order->status }}</p>
        @if ($order->status !== 'finished' && $order->status !== 'canceled')
            <form action="/order/{{ $order->id }}/cancel" method="post">
                @csrf
                @method('put')
                <button>Batalkan pesanan</button>
            </form>
            <p>*Silahkan lakukan pembayaran melalui kasir</p>
        @endif
    </div>
</x-customer-layout>
