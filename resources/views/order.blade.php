<x-customer-layout>
    @push('styles')
        @vite('resources/css/order.css')
    @endpush
    <div>
        <p>Nomor pesanan: {{ $order->id }}</p>
        <p>Nama: {{ $order->customer_name }}</p>
        <p>Status pesanan: {{ $order->status }}</p>
        <p>*Silahkan lakukan pembayaran melalui kasir</p>
    </div>
</x-customer-layout>
